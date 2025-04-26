<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php'; // PHPMailer instalado pelo Composer

$conn = new mysqli("localhost", "root", "", "primus_bd");

// Verifica se houve erro na conexão com o banco de dados
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se o campo 'email' foi enviado
    if (!isset($_POST['email']) || empty(trim($_POST['email']))) {
        die("O campo de e-mail é obrigatório.");
    }

    $email = trim($_POST['email']);
    $token = bin2hex(random_bytes(32)); // Gera um token seguro
    $expiracao = date("Y-m-d H:i:s", strtotime("+1 hour")); // Define a expiração do token para 1 hora

    // Verifica se o e-mail existe no banco de dados
    $stmt = $conn->prepare("SELECT gmail FROM logins WHERE gmail = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Salva o token no banco de dados
        $stmt = $conn->prepare("INSERT INTO tokens_recuperacao (email, token, expiracao) VALUES (?, ?, ?)
                                ON DUPLICATE KEY UPDATE token = VALUES(token), expiracao = VALUES(expiracao)");
        $stmt->bind_param("sss", $email, $token, $expiracao);
        $stmt->execute();

        // Configura o PHPMailer
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'lu.saiyasin@gmail.com'; // Substitua pelo seu e-mail do Gmail
            $mail->Password = 'alyb gfrr qgua fvnq'; // Substitua pela senha de aplicativo gerada
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('lu.saiyasin@gmail.com', 'Suporte Primu\'s Auto Peças');
            $mail->addAddress($email); // E-mail do destinatário
            $mail->Subject = 'Redefinição de senha';
            $mail->Body = "Olá, clique no link abaixo para redefinir sua senha:\n\n" .
                          "http://localhost/PRIMUS/PAGINAS/FormularioSenhas.php?token=$token\n\n" .
                          "Este link é válido por 1 hora.";

            $mail->send();
            echo "E-mail enviado com sucesso!<br>Verifique sua caixa de entrada.";
        } catch (Exception $e) {
            echo "Erro ao enviar o e-mail: {$mail->ErrorInfo}";
        }
    } else {
        echo "E-mail não encontrado.";
    }
}
?>