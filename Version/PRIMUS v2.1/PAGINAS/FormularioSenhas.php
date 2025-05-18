<?php
$conn = new mysqli("localhost", "root", "", "primus_bd");

$token = $_GET['token'] ?? null;

// Verifica se o token é válido e ainda não expirou
$stmt = $conn->prepare("SELECT email FROM tokens_recuperacao WHERE token = ? AND expiracao > NOW()");
$stmt->bind_param("s", $token);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $email = $row['email'];
} else {
    die("Token inválido ou expirado.");
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/styleFormularioSenhas.css">
    <link rel="shortcut icon" href="../IMGS/favicon.ico" type="image/x-icon">
    <title>Alterar a senha | Primu's Auto Peças</title>
</head>
<body>
    <div class="Caixa">
        <div class="BackAlterar">
            <form method="Post" action="../PHP/RecuperarSenha.php">

                <h1>Alterar Senha</h1>
                <h2>A senha deve ter entre 5 e 12 caracteres, incluindo pelo menos um número</h2>
                <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>">

                <label>Nova senha</label>
                <div class="IconeSenha">
                    <input type="password" name="senha" id="senha" placeholder="Digite sua nova senha" maxlength="12">
                    <i class="fa-solid fa-eye" id="IconeEye" onclick="BotaoSenha()"></i>
                </div>
                <p id="MensagemErroSenha" style="display: none;"></p>

                <label>Confirme a nova senha</label>
                <div class="IconeSenha2">
                    <input type="password" name="confirmar_senha" id="confirmar_senha" placeholder="Digite novamente sua nova senha" maxlength="12">
                    <i class="fa-solid fa-eye" id="IconeEye2" onclick="BotaoSenha2()"></i>

                </div>
                <p id="MensagemErroSenha2" style="display: none;"></p>

                <p id="AvisoSenha" style="display: none; text-align: center;"></p>


                <button type="submit">REDEFINIR SENHA</button>
            </form>
        </div>
    </div>

    <br><br><br><br><br>
    <hr style="width: 70%; margin: 0 auto; border: 1px solid #000;">
    <br>
    <p class="TextoCopy">Copyright &copy; 2024-2025 Primu's Auto Peças | Todos os direitos reservados</p>
    <br>

    <script src="../JAVASCRIPT/jsFormularioSenhas.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/d3aca5478d.js" crossorigin="anonymous"></script>
</body>
</html>