<?php
require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$name    = $_POST["name"];
$email   = $_POST["email"];
$message = $_POST["message"];
$telefone = $_POST["telefone"];

$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->CharSet = "UTF-8";

$mail->Host       = 'smtp.gmail.com';
$mail->SMTPAuth   = true;
$mail->Username   = 'gustavocontijesuino4@gmail.com';
$mail->Password   = 'mccu qlmv waho rbak';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port       = 587;

$mail->SMTPDebug = 2;

$mail->setFrom('gustavocontijesuino4@gmail.com', 'Site');
$mail->addReplyTo($email, $name);
$mail->addAddress('gustavocontijesuino4@gmail.com');

$mail->isHTML(true);
$mail->Subject = 'Email do Site';
$mail->Body    = $name."<br>".$email."<br>".$telefone."<br>".nl2br($message);
$mail->AltBody = $message;

$mail->send();

if (!$mail->send()) {
    echo "Erro: " . $mail->ErrorInfo;
} else {
    echo "Mensagem enviada com sucesso!";
}
