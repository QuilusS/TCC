<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; // Certifique-se de que o PHPMailer está instalado via Composer

$mail = new PHPMailer(true);

try {
    // Configurações do servidor SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Servidor SMTP do Gmail
    $mail->SMTPAuth = true;
    $mail->Username = 'lu.saiyasin@gmail.com'; // Substitua pelo seu e-mail do Gmail
    $mail->Password = 'alyb gfrr qgua fvnq'; // Substitua pela senha de aplicativo gerada
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Tipo de criptografia
    $mail->Port = 587; // Porta SMTP do Gmail

    // Configurações do e-mail
    $mail->setFrom('lu.saiyasin@gmail.com', 'LUCAS'); // Remetente
    $mail->addAddress('luc.olivera0402@gmail.com'); // Destinatário
    $mail->Subject = 'Redefinir Senha'; // Assunto do e-mail
    $mail->Body = 'Este é o corpo do e-mail enviado pelo PHPMailer usando o Gmail.';

    // Envia o e-mail
    $mail->send();
    echo 'E-mail enviado com sucesso!';
} catch (Exception $e) {
    echo "Erro ao enviar o e-mail: {$mail->ErrorInfo}";
}
?>