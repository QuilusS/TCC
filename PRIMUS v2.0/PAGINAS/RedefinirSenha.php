<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/styleRedefinirSenha.css">
    <link rel="shortcut icon" href="../IMGS/favicon.ico" type="image/x-icon">
    <title>Redefinir senha | Primu's Auto Peças</title>
</head>
<body>
    <br>
    <form action="../PHP/GerarToken.php" method="POST">
        <div class="Caixa">
            <div class="BackRedifinir">
                <button type="button" onclick="window.location.href = document.referrer || '/PRIMUS/PAGINAS/TelaInicial.php';"><i class="fa-solid fa-backward-step"></i></button>
                <h1>Redefinir Senha</h1>

                <h3>Para proteger sua conta, enviaremos um <br>e-mail com um código de verificação. <br>Use-o para redefinir sua senha com segurança.</h3>

                <label for="email"><i class="fa-solid fa-envelope"></i>&nbsp; Endereço de Email</label>
                <div class="container">
                    <input type="text" id="email" name="email" placeholder="Digite seu e-mail cadastrado"/>
                </div>
                <p id="MensagemErroEmail" style="display: none;"></p>
                
                <p id="Aviso" style="display: none; text-align: center;"></p>

                <div class="container">
                    <button type="submit">PRÓXIMO</button>
                </div>
            </div>
        </div>
    </form>

    <br><br><br><br><br><br>
    <hr style="width: 70%; margin: 0 auto; border: 1px solid #000;">
    <br>
    <p class="TextoCopy">Copyright &copy; 2024-2025 Primu's Auto Peças | Todos os direitos reservados</p>
    <br>
    
    
    <script src="../JAVASCRIPT/jsRedefinirSenha.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/d3aca5478d.js" crossorigin="anonymous"></script>
</body>
</html>