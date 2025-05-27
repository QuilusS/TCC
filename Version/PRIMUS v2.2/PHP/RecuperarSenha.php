<?php

$conn = new mysqli("localhost", "root", "", "primus_bd");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $nova_senha = $_POST['senha'];
    $confirmar_senha = $_POST['confirmar_senha'];

    if ($nova_senha !== $confirmar_senha) {
        die("As senhas não coincidem.");
    }

    $nova_senha_hash = password_hash($nova_senha, PASSWORD_BCRYPT);

    // Atualiza a senha do usuário na tabela logins
    $stmt = $conn->prepare("
        UPDATE logins 
        SET senha = ? 
        WHERE id_usuario = (SELECT id_nome FROM cadastro WHERE gmail = ?)
    ");

    if (!$stmt) {
        die("Erro na preparação da consulta: " . $conn->error);
    }

    $stmt->bind_param("ss", $nova_senha_hash, $email);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        // Remove o token usado
        $stmt = $conn->prepare("DELETE FROM tokens_recuperacao WHERE email = ?");
        if (!$stmt) {
            die("Erro na preparação da consulta para deletar o token: " . $conn->error);
        }
        $stmt->bind_param("s", $email);
        $stmt->execute();

        echo "Senha alterada com sucesso!";
    } else {
        echo "Erro ao alterar a senha. Verifique se o e-mail está correto.";
    }
}
?>