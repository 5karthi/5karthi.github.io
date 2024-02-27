<?php
require 'PHPMailer/PHPMailerAutoload.php';

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$feedback = $_POST['feedback'];

$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host = 'smtp.example.com'; // Replace with your email provider's SMTP server
$mail->SMTPAuth = true;
$mail->Username = 'your-email@example.com'; // Replace with your email address
$mail->Password = 'your-email-password'; // Replace with your email password
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

$mail->setFrom($email, "$fname $lname");
$mail->addAddress('your-email@example.com'); // Replace with your email address
$mail->isHTML(true);

$mail->Subject = 'Feedback from your website';
$mail->Body    = "Name: $fname $lname\nEmail: $email\nFeedback:\n$feedback";

if(!$mail->send()) {
    echo 'There was an error sending your feedback.';
} else {
    echo 'Thank you for your feedback!';
}
?>