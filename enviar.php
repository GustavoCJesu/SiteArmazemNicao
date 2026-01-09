<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

  $nome = strip_tags($_POST['nome']);
  $email = strip_tags($_POST['email']);
  $telefone = strip_tags($_POST['telefone']);
  $mensagem = strip_tags($_POST['mensagem']);

  // SE estiver rodando localmente
  if ($_SERVER['SERVER_NAME'] === 'localhost') {
    header("Location: obrigado.html");
    exit;
  }

  // PRODUÇÃO
  $para = "contato@armazemnicao.com.br";
  $assunto = "Contato pelo site - Armazéns Nicão";

  $corpo = "
Nome: $nome
Email: $email
Telefone: $telefone

Mensagem:
$mensagem
";

  $headers = "From: $email\r\n";
  $headers .= "Reply-To: $email\r\n";

  if (mail($para, $assunto, $corpo, $headers)) {
    header("Location: obrigado.html");
  } else {
    echo "Erro ao enviar a mensagem.";
  }
}
?>
