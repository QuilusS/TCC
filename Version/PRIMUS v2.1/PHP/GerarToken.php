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
    $stmt = $conn->prepare("SELECT gmail FROM cadastro WHERE gmail = ?");
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

            $mail->CharSet = 'UTF-8'; // Define a codificação como UTF-8

            $mail->setFrom('lu.saiyasin@gmail.com', 'Primu\'s Auto Peças');
            $mail->addAddress($email); // E-mail do destinatário
            $mail->Subject = 'Redefinição de Senha';
            $mail->isHTML(true); // Define o formato do e-mail como HTML
            $mail->Body = '
                <html>
                    <body>
                        <div style="background-color: #e6e6e6; width: 90%; max-width: 600px; margin: 0 auto; color: black; padding: 20px;">

                            <br>

                            <img style="width: 100%; max-width: 300px; display: block; margin: 0 auto;" src="https://i.imgur.com/VnvoR7N.png" alt="Img Logo">
                            
                            <br>

                            <p style="font-size: 24px; color: #000000; text-align: left; padding-left: 20px; font-family: Arial, Helvetica, sans-serif;"><strong>Redefinir Senha</strong></p>

                            <p style="font-size: 20px; color: #000000; text-align: left; padding-left: 20px; font-family: Arial, Helvetica, sans-serif;">Recebemos sua solicitação para redefinir a senha. <br>Clique no botão abaixo para criar uma nova senha:</p>
                            
                            <a href="http://localhost/PRIMUS/PAGINAS/FormularioSenhas.php?token=' . $token . '" 
                                style="display: block; background-color: rgb(38, 80, 143); color: white; padding: 10px 30px; border-radius: 5px; text-decoration: none; font-size: 16px; text-align: center; margin: 0 auto; width: 200px;">Definir nova senha
                            </a>
                            
                            <p style="font-size: 18px; color: #000000; text-align: left; padding-left: 20px; font-family: Arial, Helvetica, sans-serif;">Se você não solicitou a redefinição de senha, ignore este e-mail.</p>

                            <br>

                            <hr style="border: 1px solid black;">

                            <br>

                            <p style="font-size: 14px; font-family: Arial, Helvetica, sans-serif; text-align: left; padding-left: 20px">Copyright &copy; 2024-2025 Primus Auto Peças | Todos os direitos reservados</p>

                            <a href="http://localhost/PRIMUS/PAGINAS/Termos.php" style="font-size: 14px; font-family: Arial, Helvetica, sans-serif; color: black; text-align: left;padding-left: 20px; display: block;">Política e Termos</a>
                        </div>

                    </body>
                </html>';

            $mail->send();
            echo "O link para redefinição de senha foi enviado ao seu e-mail cadastrado!;<br>Verifique sua caixa de entrada.";
        } catch (Exception $e) {
            echo "Erro ao enviar o e-mail: {$mail->ErrorInfo}";
        }
    } else {
        echo "E-mail não encontrado.";
    }
}
?>