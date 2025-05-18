<?php
include 'conexao.php'; // Certifique-se de que este arquivo conecta ao banco corretamente

$mensagem = ""; // Inicializa a mensagem

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = isset($_POST["emailLogin"]) ? trim($_POST["emailLogin"]) : '';
    $senha = isset($_POST["senha"]) ? trim($_POST["senha"]) : '';

    if (empty($email) || empty($senha)) {
        $mensagem = "Preencha todos os campos!";
    } else {
        // Usa prepared statements para evitar SQL Injection
        $sql = "SELECT * FROM logins WHERE gmail = ? AND senha = MD5(?)";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("ss", $email, $senha);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result && $result->num_rows > 0) {
                // Dados do usuário encontrados
                $usuario = $result->fetch_assoc();

                // Salva os dados do usuário na sessão
                $_SESSION['id_usuario'] = $usuario['id_nome']; // Exemplo: coluna "id" na tabela
                $_SESSION['nome_usuario'] = $usuario['nome']; // Exemplo: coluna "nome" na tabela
                $_SESSION['email_usuario'] = $usuario['gmail']; // Exemplo: coluna "gmail" na tabela

                $mensagem = "Login realizado com sucesso!";
            } else {
                $mensagem = "E-mail ou senha incorretos!";
            }

            $stmt->close();
        } else {
            $mensagem = "Erro ao consultar o banco de dados: " . $conn->error;
        }
    }
}
?>
<body>

<div class="mensagem" style="text-align: center;">
    <?php if (!empty($mensagem)): ?>
        <p><?php echo $mensagem; ?></p>
    <?php endif; ?>
 </div>       

<style>
    .mensagem {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .mensagem p {
        font-size: 18px;
        color: red;
    }
</style>

</body>


