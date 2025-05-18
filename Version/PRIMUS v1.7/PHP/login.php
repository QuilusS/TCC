<?php
include 'conexao.php'; // Certifique-se de que este arquivo conecta ao banco corretamente

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar se os campos existem antes de acessá-los
    $email = isset($_POST["email"]) ? $_POST["email"] : '';
    $senha = isset($_POST["senha"]) ? $_POST["senha"] : '';

    // Se algum campo estiver vazio, exibe um erro
    if (empty($email) || empty($senha)) {
        die("Preencha todos os campos!");
    }

    // Usa prepared statement para evitar SQL Injection
    $sql = "SELECT * FROM logins WHERE gmail = ? AND senha = MD5(?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ss", $email, $senha);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            echo "Login realizado com sucesso!";
            header("Location: dashboard.php");
            exit();
        } else {
            echo "E-mail ou senha incorretos!";
        }

        $stmt->close();
    } else {
        die("Erro na preparação da consulta: " . $conn->error);
    }
}
?>