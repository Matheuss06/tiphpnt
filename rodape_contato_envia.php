<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Instância da classe
$mail = new PHPMailer(true);
try
{
    // Configurações do servidor
    $mail->isSMTP();        //Devine o uso de SMTP no envio
    $mail->SMTPAuth = true; //Habilita a autenticação SMTP
    $mail->Username   = 'churrasfornalha@outlook.com';
    $mail->Password   = '1234churras';
    // Criptografia do envio SSL também é aceito
    $mail->SMTPSecure = 'STARTTLS';
    // Informações específicadas pelo Google
    $mail->Host = 'smtp.office365.com';
    $mail->Port = 587;
    // Define o remetente
    $mail->setFrom('churrasfornalha@outlook.com', 'Churrascaria Fornalha');
    // Define o destinatário
    $mail->addAddress('churrasfornalha@outlook.com', 'Churrascaria Fornalha');
    // Conteúdo da mensagem
    $mail->isHTML(true);  // Seta o formato do e-mail para aceitar conteúdo HTML
    $mail->Subject = "Email de ". $_POST['email_contato']. " Nome: " .$_POST['nome_contato'];
    $mail->Body    = $_POST['comentario_contato'];
    $mail->AltBody = 'Este é o corpo da mensagem para clientes de e-mail que não reconhecem HTML';
    // Enviar
    $mail->send();
    echo 'A mensagem foi enviada!';
}
catch (Exception $e)
{
    echo "A mensagem não pôde ser enviada. Erro do Mailer:  {$mail->ErrorInfo}";
}

?>