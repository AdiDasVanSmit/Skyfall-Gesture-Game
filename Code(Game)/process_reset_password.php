<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';  // Include the PHPMailer autoloader

$token = $_POST["token"];
$new_password = $_POST["new_password"];

$token_hash = hash("sha256", $token);

// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "project");

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM register WHERE reset_token_hash = ?";

$stmt = $conn->prepare($query);
$stmt->bind_param("s", $token_hash);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user === null) {
    echo '<div id="msg">Link has been expired.Please Try again</div>'; //Token has expired
}

if (strtotime($user["reset_token_expires_at"]) <= time()) {
    echo '<div id="msg">Link has been expired.Please Try again</div>'; 
}

// Fetch user's name and email from the 'register' table
$user_info_query = "SELECT User_name, Email FROM register WHERE id = ?";
$user_info_stmt = $conn->prepare($user_info_query);
$user_info_stmt->bind_param("s", $user["id"]);
$user_info_stmt->execute();
$user_info_result = $user_info_stmt->get_result();
$user_info_row = $user_info_result->fetch_assoc();

if ($user_info_row === null) {
    die("User not found");
}

$user_name = $user_info_row["Uname"];
$user_email = $user_info_row["Email"];

// Update the 'pass' column with the new password
$update_query = "UPDATE register SET Pass = ?, reset_token_hash = NULL, reset_token_expires_at = NULL WHERE id = ?";
$update_stmt = $conn->prepare($update_query);
$update_stmt->bind_param("ss", $new_password, $user["id"]);
$update_stmt->execute();

// Send email to the user that password has been updated
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; 
    $mail->SMTPAuth = true;
    $mail->Username = 'help.accts.skyfall@gmail.com';
    $mail->Password = 'qaxt gprb wjys qplf';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;

    // Recipients
    $mail->setFrom('no-reply@skyfall.com', 'No Reply');
    $mail->addAddress($user_email);  // Use the fetched user's email address

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Password Updated';
    $mail->Body = 'Dear User,<br><br>Your password has been successfully updated.';

    $mail->send();
    echo '<form method="post" action="send_password.php">
             <div class="login-box">
             <p class="msg" id="msg">Your password has been updated successfully! You can now re-login to your Account.You can close this tab now.</p>
             </div>
         </form>';
} catch (Exception $e) {
    echo '<div class="msg"> An Error Occured while updating your password , please try again later. Mailer Error: {$mail->ErrorInfo}</div>';
}
?>

<html>
    <head>
    <link rel="icon" type="image/png" href="Imgs/skyfall-high-resolution-logo-color-on-transparent-background.png">

<title>SKYFALL</title>
<style> 
        .login-box {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 400px;
            padding: 40px;
            transform: translate(-50%, -50%);
            background: rgba(24, 20, 20, 0.987);
            box-sizing: border-box;
            box-shadow: 0 15px 25px rgba(0,0,0,.6);
            border-radius: 10px;
        }

        .login-box .user-box {
            position: relative;
        }

        .login-box .user-box input {
            width: 100%;
            padding: 10px 0;
            font-size: 16px;
            color: #fff;
            margin-bottom: 30px;
            border: none;
            border-bottom: 1px solid #fff;
            outline: none;
            background: transparent;
        }

        .login-box .user-box label {
            position: absolute;
            top: 0;
            left: 0;
            padding: 10px 0;
            font-size: 16px;
            color: #fff;
            pointer-events: none;
            transition: .5s;
        }

        .login-box .user-box input:focus ~ label,
        .login-box .user-box input:valid ~ label {
            top: -20px;
            left: 0;
            color: #bdb8b8;
            font-size: 12px;
        }

        .set-pass {
            position: relative;
            display: inline-block;
            padding: 10px 20px;
            color: #ffffff;
            font-size: 16px;
            text-decoration: none;
            text-transform: uppercase;
            overflow: hidden;
            transition: .5s;
            margin-top: 40px;
            letter-spacing: 4px;
            background: none;
            border: none;
        }

        .set-pass:hover {
            background: wheat;
            color: black;
            border-radius: 5px;
            box-shadow: 0 0 10px white,
                        0 0 25px bisque,
                        0 0 25px powderblue,
                        0 0 75px skyblue;
        }

        .set-pass span {
            position: absolute;
            display: block;
        }

        @keyframes btn-anim1 {
            0% {
                left: -100%;
            }

            50%,100% {
                left: 100%;
            }
        }

        .set-pass span:nth-child(1) {
            bottom: 2px;
            left: -100%;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, transparent, whitesmoke);
            animation: btn-anim1 2s linear infinite;
        }
        .welcome{
            color: white;
        }
        .text-login{
            color: white;
            font-size: 17px;
        }
        .show--pass{
            margin-left: 290px;
            margin-top: -55px;
        }
        .acc{
            color: white;
            font-size: 17px;
        }
        .reg{
            text-decoration: none;
        }
        .forget{
            text-decoration: none;
            margin-left: 205px;
        }
        .show-pass{
            cursor: pointer;
        }
        .data{
            color: red;
        }
        .msg{
            color: white;
        }
        h1{
            color: #ffffff;
            font-family: 'Press Start 2P', cursive;
            font-size:50px;
            margin-top: 150px;
        }
    </style>
    </head>
    <body background="Imgs/CoarseBothInvisiblerail.webp">
    <center>
        <h1>SKYFALL</h1>
    </center>
    </body>
</html>

