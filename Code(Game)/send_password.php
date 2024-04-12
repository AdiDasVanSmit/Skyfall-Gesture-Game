<?php

 require 'vendor/autoload.php';

 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\SMTP;
 use PHPMailer\PHPMailer\Exception;

$email = $_POST["mail"];

$token = bin2hex(random_bytes(16));   // Create a 16 digit hexadecimal token code.

$token_hash = hash("sha256", $token);    // To save real token valure from attackers use hash function and in password too.

$expiry = date("Y-m-d H:i:s",time() + 60 * 5);    // 60 represents seconds and 5 represents minutes i.e 60s per min

// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "project");

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Using mysqli Prepared Statement to prevent SQL injection

$query = "UPDATE register
            SET reset_token_hash= ?,
            reset_token_expires_at= ?
            WHERE Email= ?";

$stmt = mysqli_prepare($conn , $query);

$stmt -> bind_param("sss" , $token_hash , $expiry , $email);

$stmt -> execute();

// Fetch the username associated with the provided email from the database
$query = "SELECT User_name FROM register WHERE Email = '$email'";
$result = mysqli_query($conn, $query);

// Check if the email exists in the database
if (mysqli_num_rows($result) > 0) 
{
    $row = mysqli_fetch_assoc($result);
    $uname = $row['User_name'];

    if ($stmt->affected_rows)
    {
       // Instantiation and passing `true` enables exceptions
       $mail = new PHPMailer(true);
        try{
            //Enable verbose debug output
           // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
 
            //Send using SMTP
            $mail->isSMTP();

            //Set the SMTP server to send through
            $mail->Host = 'smtp.gmail.com';

            //Enable SMTP authentication
            $mail->SMTPAuth = true;
        
            //SMTP username
            $mail->Username = 'help.accts.skyfall@gmail.com';

            //SMTP password
            $mail->Password = 'qaxt gprb wjys qplf';

            //Enable TLS encryption;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

            //TCP port to connect to, use 587 for `PHPMailer::ENCRYPTION_STARTTLS` above
            $mail->Port = 465;

            //Recipients
            $mail->setFrom('help.accts.skyfall@gmail.com', 'Skyfall');
        
            //Add a recipient
            $mail->addAddress($email, $uname);

            // Set email format to HTML
            $mail->isHTML(true);

             // Include username in the email body
             $mail->Subject = 'Password Reset';
             $mail->Body = '<p>Hello ' . $uname . ',</p>';
             $mail->Body .= '<p>Click below the link to reset your password of Skyfall Account.</p>
                                 <a href="http://localhost/Main%20Project/reset_password.php?token='.$token.'">Reset Password</a>';
 
             $mail->send();
 
             echo '<form method="post" action="send_password.php">
             <div class="login-box">
             <p class="msg" id="msg">A reset password link has been sent to your ' . $email . '. Please check your inbox. NOTE: Link will expire in 5 minutes</p>
             </div>
         </form>';
         } catch (Exception $e) {
             echo '<form method="post" action="send_password.php">
             <div class="login-box">
             <div class="msg" id="msg1">Message could not be sent.Please try again. Mailer Error: {$mail->ErrorInfo}</div>
             </div>
         </form>';
         }
     }
 } else {
    echo '<form method="post" action="send_password.php">
             <div class="login-box">
             <div class="msg" id="msg1">Email not found</div>
             </div>
         </form>';
 }
 
 mysqli_close($conn);
 ?>
 <html>
<head>
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
        .msg {
        color: white;
    }
    </style>
</head>
<body background="Imgs/CoarseBothInvisiblerail.webp">
 <script>
     setTimeout(function () {
         var successMessage = document.getElementById('msg');
         if (successMessage) {
             successMessage.style.display = 'none';
             window.location.href = "login.php"; // Redirect to the login page
         }
     }, 3000); // Redirect after 3 seconds

     setTimeout(function () {
         var successMessage1 = document.getElementById('msg1');
         if (successMessage1) {
             successMessage1.style.display = 'none';
             window.location.href = "forget.php"; // Redirect to the login page
         }
     }, 3000);
 </script>
 </body>
 </html>