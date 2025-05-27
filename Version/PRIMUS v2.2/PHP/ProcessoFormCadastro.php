<?php
session_start(); // Inicia a sessão
require_once 'conexao.php';

// Função para validar os requisitos da senha
function validarSenha($senha) {
    // A senha deve ter entre 5 e 12 caracteres e pelo menos um número
    if (strlen($senha) < 5 || strlen($senha) > 12) {
        return "A senha deve ter entre 5 e 12 caracteres.";
    }
    if (!preg_match('/\d/', $senha)) {
        return "A senha deve conter pelo menos um número.";
    }
    return true;
}

$response = ["success" => false, "message" => ""]; // Estrutura padrão da resposta

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nomeCompleto = trim($_POST['nameCadas']);
    $gmail = trim($_POST['emailCadas']);
    $telefone = isset($_POST['numberCadas']) ? trim($_POST['numberCadas']) : null; // Opcional
    $genero = isset($_POST['sexo']) ? trim($_POST['sexo']) : null; // Opcional
    $senha = trim($_POST['senhaCadas']);

    // Valida o formato do e-mail
    if (!filter_var($gmail, FILTER_VALIDATE_EMAIL)) {
        $response["message"] = "O e-mail fornecido é inválido.";
        echo json_encode($response);
        exit();
    }

    // Valida os requisitos da senha
    $validacaoSenha = validarSenha($senha);
    if ($validacaoSenha !== true) {
        $response["message"] = $validacaoSenha;
        echo json_encode($response);
        exit();
    }
    // Criptografa a senha
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    try {
        // Insere na tabela cadastro
        $stmtCadastro = $conn->prepare("INSERT INTO cadastro (nomeCompleto, gmail, telefone, genero) VALUES (?, ?, ?, ?)");
        if (!$stmtCadastro) {
            $response["message"] = "Erro na preparação da consulta: " . $conn->error;
            echo json_encode($response);
            exit();
        }

        $stmtCadastro->bind_param("ssss", $nomeCompleto, $gmail, $telefone, $genero);
        if ($stmtCadastro->execute()) {
            $idUsuario = $stmtCadastro->insert_id; // Obtém o ID gerado na tabela cadastro

            // Insere na tabela login
            $stmtLogin = $conn->prepare("INSERT INTO logins (id_usuario, senha) VALUES (?, ?)");
            if (!$stmtLogin) {
                $response["message"] = "Erro ao preparar a consulta de login: " . $conn->error;
                echo json_encode($response);
                exit();
            }

            $stmtLogin->bind_param("is", $idUsuario, $senhaHash);
            if ($stmtLogin->execute()) {
                $response["success"] = true;
                $response["message"] = "Conta do $nomeCompleto foi criada com sucesso!!<br><br>Agora ele(a) já pode fazer login e explorar <br>a plataforma. Redirecionando...";
                echo json_encode($response);
                exit();
            } else {
                $response["message"] = "Erro ao cadastrar login: " . $conn->error;
                echo json_encode($response);
                exit();
            }
        } else {
            if ($conn->errno === 1062) {
                $response["message"] = "O e-mail fornecido já está cadastrado.";
            } else {
                $response["message"] = "Erro ao cadastrar: " . $conn->error;
            }
            echo json_encode($response);
            exit();
        }
    } catch (Exception $e) {
        $response["message"] = "Erro ao cadastrar: " . $e->getMessage();
        echo json_encode($response);
        exit();
    }
}
?>