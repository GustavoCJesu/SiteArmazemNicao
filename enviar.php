<?php
require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

// Coleta de dados
$name       = $_POST["name"];
$email      = $_POST["email"];
$message    = $_POST["message"];
$telefone   = $_POST["telefone"];
$assunto    = $_POST["assunto"];

$mail = new PHPMailer(true);

try {
    // Configurações do Servidor
    $mail->isSMTP();
    $mail->CharSet = "UTF-8";
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'gustavocontijesuino4@gmail.com';
    $mail->Password   = 'mccu qlmv waho rbak'; // Lembre-se de manter isso em segredo!
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Se quiser que o alerta apareça limpo, recomendo desativar o Debug (0)
    $mail->SMTPDebug = 0; 

    // Destinatários
    $mail->setFrom('gustavocontijesuino4@gmail.com', 'Site');
    $mail->addReplyTo($email, $name);
    $mail->addAddress('gustavocontijesuino4@gmail.com');

    // Conteúdo
    $mail->isHTML(true);
    $mail->Subject = 'Email do Site';
    $mail->Body    = "<b>Nome:</b> $name <br> <b>E-mail:</b> $email <br> <b>Telefone:</b> $telefone <br><br> <b>Mensagem:</b><br>" . nl2br($message);
    $mail->AltBody = $message;

    // Envio
    if ($mail->send()) {
        echo "<script>
                alert('Mensagem enviada com sucesso!');
                window.location.href = 'index.html'; // Redireciona de volta para o formulário
              </script>";
    }

} catch (Exception $e) {
    echo "<script>
            alert('Erro ao enviar: {$mail->ErrorInfo}');
            window.history.back(); // Volta para a página anterior
          </script>";
}