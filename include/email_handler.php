<?php

require_once 'db_handler.php';
require_once 'forgot-password.handler.php';
require './libraries/PHPMailer/src/Exception.php';
require './libraries/PHPMailer/src/SMTP.php';
require './libraries/PHPMailer/src/PHPMailer.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
function sendMail($token){
try {
    $mail = new PHPMailer();
    $mail->isSMTP();
$mail->Host = 'smtp.mailtrap.io';
$mail->SMTPAuth = true;
$mail->Username = '8a9420838f0721'; //paste one generated by Mailtrap
$mail->Password = 'f1c5406a673342';//paste one generated by Mailtrap
$mail->SMTPSecure = 'tls';
$mail->Port = 2525;

$e_subject = "Reset your website on test.com";
$e_msg = "Hi there, click on this <a href=\"new_password.php?token=".$token."\">link</a>to reset your password.";
$e_msg = wordwrap($e_msg,70);//split it to new line if too long
$e_header = "From: info@yum.com";

$mail->setFrom('info@mailtrap.io', 'Mailtrap');
$mail->addReplyTo('info@mailtrap.io', 'Mailtrap');
$mail->addAddress('recipient1@mailtrap.io', 'Tim');
$mail->Subject = 'Test Email via Mailtrap SMTP using PHPMailer';
$mail->isHTML(true);


$mail->Body = $e_msg;
$mail->send();
echo 'Message has been sent';
} catch (\Throwable $th) {
    echo "Message was not sent. Mailer Error: {$mail->ErrorInfo}";
}}