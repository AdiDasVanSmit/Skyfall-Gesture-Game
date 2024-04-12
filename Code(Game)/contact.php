<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $msg = $_POST['message'];
    $app_password = $_POST['app_password'];

    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);
    try {
        //Send using SMTP
        $mail->isSMTP();

        //Set the SMTP server to send through
        $mail->Host = 'smtp.gmail.com';

        //Enable SMTP authentication
        $mail->SMTPAuth = true;

        //SMTP username
        $mail->Username = $email;

        //SMTP password
        $mail->Password = $app_password;

        //Enable TLS encryption;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

        //TCP port to connect to, use 587 for `PHPMailer::ENCRYPTION_STARTTLS` above
        $mail->Port = 465;

        //Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress('contact.skyfallgame@gmail.com', 'Skyfall');

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body = "Name: $name\nEmail: $email\nMessage: $msg";

        // Send the email
        $mail->send();

        echo '<div class="msg" id="msg">Your Response has been sent to our email, We will contact you as soon as possible. You can close this Tab now.</div>';
    echo '<script>document.getElementById("contactForm").style.display = "none";</script>';
    } catch (Exception $e) {
        echo '<div class="msg" id="msg">Message could not be sent. Mailer Error: ' . $mail->ErrorInfo . '</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
  <link rel="icon" type="image/png" href="Imgs/skyfall-high-resolution-logo-color-on-transparent-background.png">

    <title>Contact Form</title>
    <style>
        body {
            display: flex;
            justify-content: center; /* Centers the content horizontally */
            align-items: center; /* Centers the content vertically */
            height: 100vh;
            background-image: url('Imgs/CoarseBothInvisiblerail.webp');
        }

        form {
            max-width: 400px;
            flex-direction: column;
            background-color: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 10px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: white;
        }

        input,
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 15px;
            background-color: transparent;
            color: white;
            outline: none;
        }

        input:focus,
        textarea:focus {
            border-color: #555;
        }

        .button {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #555;
        }

        .button:active{
            background-color: #222;
        }
    .msg {
        color: white;
        font-size: 20px;
    }
    a{
        text-decoration: none;
    }
    img{
        margin-bottom: -5px;
        width: 20px;
        height: 20px;
        margin-left: 5px;
    }
    </style>
</head>
<body>

<div>
    <form id="contactForm" action="contact.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="email">App-Password: <a href="https://support.google.com/mail/answer/185833?hl=en"><img src="Imgs/question.png"></a></label>
        <input type="password" id="email" name="app_password" required>

        <label for="message">Message:</label>
        <textarea id="message" name="message" rows="4" required></textarea>

        <input class="button" type="submit" value="Submit">
    </form>
</div>

<script>
    // JavaScript code to hide the form when the success message appears
    var msgElement = document.getElementById("msg");
    if (msgElement) {
        document.getElementById("contactForm").style.display = "none";
    }
</script>

</body>
</html>
