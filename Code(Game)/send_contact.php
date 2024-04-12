<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$email = $_POST["mail"];

$name = $_POST['name'];
$email = $_POST['email'];
$msg = $_POST['message'];
$app_password = $_POST['app_password'];

// Connect to the database
$conn = mysqli_connect("localhost", "myadmin", "charan123", "awt");

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
try
{
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
    $mail->Body = "Name: $name\nEmail: $email\nMessage: $message";

    // Send the email
    $mail->send();

    echo '<div class="msg" id="msg">Message has been sent</div>';
} 
catch (Exception $e) 
{
    // Echo error message with CSS
    echo '<div style="background-color: #f8d7da; color: #721c24; padding: 10px; border: 1px solid #f5c6cb; border-radius: 5px;">Message could not be sent. Mailer Error: ' . $mail->ErrorInfo . '</div>';
}
?>
<style>
    .msg {
        color: white;
    }
</style>