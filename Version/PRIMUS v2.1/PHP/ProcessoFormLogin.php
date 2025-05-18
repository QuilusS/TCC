<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = isset($_POST["emailLogin"]) ? trim($_POST["emailLogin"]) : '';
    $senha = isset($_POST["senha"]) ? trim($_POST["senha"]) : '';

    if (!empty($email) && !empty($senha)) {
        // Consulta o e-mail na tabela cadastro
        $sql = "SELECT c.id_nome, c.nomeCompleto, c.gmail, l.senha 
                FROM cadastro c 
                INNER JOIN logins l ON c.id_nome = l.id_usuario 
                WHERE c.gmail = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result && $result->num_rows > 0) {
                $usuario = $result->fetch_assoc();
                $senhaHash = $usuario['senha'];

                // Verifica a senha
                if (password_verify($senha, $senhaHash)) {
                    $_SESSION['id_usuario'] = $usuario['id_nome'];
                    $_SESSION['nome_usuario'] = $usuario['nomeCompleto'];
                    $_SESSION['email_usuario'] = $usuario['gmail'];
                    $_SESSION['mensagem_bem_vindo'] = "Bem-vindo, " . htmlspecialchars($usuario['nomeCompleto']) . "!";

                    $redirectUrl = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '../PAGINAS/TelaInicial.php';
                    header("Location: $redirectUrl");
                    exit();
                } else {
                    $_SESSION['erro_login'] = "Senha incorreta! Tente novamente.";
                }
            } else {
                $_SESSION['erro_login'] = "E-mail não encontrado!";
            }

            $stmt->close();
        } else {
            $_SESSION['erro_login'] = "Erro ao consultar o banco de dados: " . $conn->error;
        }
    }
    $redirectUrl = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '../PAGINAS/TelaInicial.php';
    header("Location: $redirectUrl");
    exit();
}
?>