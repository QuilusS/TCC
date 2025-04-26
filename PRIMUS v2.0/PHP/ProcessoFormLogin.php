<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = isset($_POST["emailLogin"]) ? trim($_POST["emailLogin"]) : '';
    $senha = isset($_POST["senha"]) ? trim($_POST["senha"]) : '';

    if (!empty($email) && !empty($senha)) {
        // Consulta apenas o e-mail no banco de dados
        $sql = "SELECT * FROM logins WHERE gmail = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result && $result->num_rows > 0) {
                $usuario = $result->fetch_assoc();
                $senha_hash = $usuario['senha']; // Hash da senha armazenada no banco

                // Verifica se a senha fornecida corresponde ao hash armazenado
                if (password_verify($senha, $senha_hash)) {
                    $_SESSION['id_usuario'] = $usuario['id'];
                    $_SESSION['nome_usuario'] = $usuario['nome'];
                    $_SESSION['email_usuario'] = $usuario['gmail'];
                    unset($_SESSION['erro_login']); // Limpa a mensagem de erro
                    
                    $_SESSION['mensagem_bem_vindo'] = "Bem-vindo, " . htmlspecialchars($usuario['nome']) . "!";

                    $paginaAnterior = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/PRIMUS/PAGINAS/TelaInicial.php';
                    header("Location: $paginaAnterior");
                    exit();
                } else {
                    $_SESSION['erro_login'] = "E-mail ou senha incorretos!";
                }
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