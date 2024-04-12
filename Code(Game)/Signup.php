<!DOCTYPE html>
<html>
<head>
    <link rel="icon" type="image/png" href="Imgs/skyfall-high-resolution-logo-color-on-transparent-background.png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">

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

        .log {
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

        .log:hover {
            background: wheat;
            color: black;
            border-radius: 5px;
            box-shadow: 0 0 10px white,
                        0 0 25px bisque,
                        0 0 25px powderblue,
                        0 0 65px skyblue;
        }

        .log span {
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

        .log span:nth-child(1) {
            bottom: 2px;
            left: -100%;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, transparent, whitesmoke);
            animation: btn-anim1 2s linear infinite;
        }

        .welcome {
            color: white;
        }

        .text-login {
            color: white;
            font-size: 17px;
        }

        .show--pass {
            margin-left: 290px;
            margin-top: -55px;
        }

        .acc {
            color: white;
            font-size: 17px;
        }

        .reg {
            text-decoration: none;
            color: blue;
        }

        .data {
            color: red;      
        }

        .signup {
            text-decoration: none;
            color: white;
        }
        .show-pass{
          cursor:pointer;
        }
        h1{
            color: #ffffff;
            font-family: 'Press Start 2P', cursive;
            font-size:50px;
        }
    </style>
</head>
<body background="Imgs/CoarseBothInvisiblerail.webp">
    <center>
        <h1>SKYFALL</h1>
    </center>
    <form method="post" action="Signup.php">
        <div class="login-box">
<?php
    require 'vendor/autoload.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
        
    if (isset($_POST["uname"])) 
{
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $pass = $_POST['password'];

    //Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Enable verbose debug output
            $mail->SMTPDebug = 0;//SMTP::DEBUG_SERVER;
 
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
 
            //Set email format to HTML
            $mail->isHTML(true);

        $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

        $mail->Subject = 'Email verification';
        $mail->Body = '<p>Hey <b>'. $uname. '</b>,

        Welcome to Skyfall! We’re excited to have you on board. To complete your account setup, please use the verification code below:<br>
        
        <b> Verification Code: ' .$verification_code . 
        
        '</b>.<br> Please enter this code in the verification section of your account settings to activate your account. If you didn’t sign up for Skyfall, you can ignore this email.<br><br>
        
        Thank you for choosing Skyfall!<br><br>
        
        Best Regards, <b>'.$uname.'</b></p>';

        $mail->send();

        // connect with database
        $conn = mysqli_connect("localhost", "root", "", "project");

        // Check if the username already exists in the database
        $check_query = "SELECT * FROM register WHERE User_name = '$uname'";
        $result = $conn->query($check_query);

        if ($result->num_rows > 0) {
            // Username already exists
            $error_message = "This Username already exists";
        } else {
            // Username is unique, insert it into the database
            $sql = "INSERT INTO register(User_name, Email, Pass, verifiy_code, verified_at) VALUES ('$uname', '$email', '$pass', '$verification_code', NULL)";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                // Verification 
                header("Location: verification.php?success=1&email=$email");
                exit();
            } else {
                // Error occurred
                header("Location: verification.php?success=0");
                exit();
            }
        }

    } catch (Exception $e) {
        echo "Verification Code could not be sent. Please Try After Few Minutes Later. Mailer Error: {$mail->ErrorInfo}";
    }
}

// Display error message if it exists
if (isset($error_message)) {
    echo '<span id="my-message" class="data">' . $error_message . '</span>';
}

?>

            <h2 class="welcome" id="welcome">Sign Up</h2>
            <p class="text-login" id="text-login">Create an Account to continue!</p><br>
            <div class="user-box">
                <input type="text" name="uname" id="uname" class="uname" required="">
                <label>Username</label>
            </div>
            <div class="user-box">
                <input type="email" name="email" id="mail" class="mail" required="">
                <label>Email</label>
            </div>
            <div class="user-box">
                <input type="password" id="password" name="password" class="password" required="">
                <label>Password</label>
                <div class="show--pass">
                    <input class="show-pass" onclick="ShowPassword1()" type="checkbox"> 
                </div>
            </div>
            <center>
                <button id="log" class="log">
                    Signup
                    <span></span>
                </button>
            </center>
            <p class="acc" id="acc">Already have an Account? <a id="reg" class="reg" href="login.php"> Login Here!</a></p>
        </div>
    </form>
    <script>
        setTimeout(function() {
            var message = document.getElementById('my-message');
            message.style.display = 'none';
        }, 4000); // 5000 milliseconds = 5 seconds

        function ShowPassword1() 
        {
            var passwordInput1 = document.getElementById("password");
            if (passwordInput1.type === "password") {
                passwordInput1.type = "text";
            } else {
                passwordInput1.type = "password";
            }
        }
    </script>
</body>
</html>