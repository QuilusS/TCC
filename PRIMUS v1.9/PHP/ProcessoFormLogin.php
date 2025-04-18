<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = isset($_POST["emailLogin"]) ? trim($_POST["emailLogin"]) : '';
    $senha = isset($_POST["senha"]) ? trim($_POST["senha"]) : '';

    if (!empty($email) && !empty($senha)) {
        $sql = "SELECT * FROM logins WHERE gmail = ? AND senha = MD5(?)";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("ss", $email, $senha);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result && $result->num_rows > 0) {
                $usuario = $result->fetch_assoc();
                $_SESSION['id_usuario'] = $usuario['id_nome'];
                $_SESSION['nome_usuario'] = $usuario['nome'];
                $_SESSION['email_usuario'] = $usuario['gmail'];
                unset($_SESSION['erro_login']); // Limpa a mensagem de erro
            } else {
                $_SESSION['erro_login'] = "E-mail ou senha incorretos!";
            }

            $stmt->close();
        } else {
            $_SESSION['erro_login'] = "Erro ao consultar o banco de dados: " . $conn->error;
        }
    } 
}
?>