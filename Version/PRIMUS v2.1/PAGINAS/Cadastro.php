<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/styleCadastro.css">
    <link rel="shortcut icon" href="../IMGS/favicon.ico" type="image/x-icon">
    <title>Cadastro | Primu's Auto Peças</title>
</head>
<body>

        

    <form action="../PHP/ProcessoFormCadastro.php" method="POST" id="MyForm">
        <div class="TelaCadastro">
            <button type="button" onclick="window.location.href ='/PRIMUS/PAGINAS/TelaInicial.php';"><i class="fa-solid fa-backward-step"></i></button>
            <div class="flex">
                <img src="../IMGS/Logoreal.png" alt="LogoPrimus" width="220px" height="80px">
            </div>
            <p class="CriarText">Criar uma conta é simples <br>e prático</p>
            <label for="nameCadas">Nome e Sobrenome</label>
            <input type="text" name="nameCadas" id="nameCadas" placeholder="Digite seu nome e sobrenome">
            <p id="MensagemErro" style="display: none;"><i class="fa-solid fa-triangle-exclamation"></i>&nbsp;Campo obrigatório. Coloque sua nome e sobrenome.</p>


            <label for="emailCadas">Email</label>
            <input type="text" name="emailCadas" id="emailCadas" placeholder="Digite seu Email">
            <p id="MensagemErro2" style="display: none;"><i class="fa-solid fa-triangle-exclamation"></i>&nbsp;Campo obrigatório. Coloque sua email.</p>


            <label for="numberCadas">Nº de Celular</label>
            <input type="tel" name="numberCadas" id="numberCadas" placeholder="Digite seu número de celular" maxlength="12">


            <p>Gênero</p>
            <div class="Todas">
                <div class="Genero" style="border-top-left-radius: 5px; border-bottom-left-radius: 5px;">
                    <input type="radio" name="sexo" id="feminino" value="feminino">
                    <label for="feminino">&nbsp;Feminino</label>
                </div> 
    
                <div class="Genero">
                    <input type="radio" name="sexo" id="masculino" value="masculino">
                    <label for="masculino">&nbsp;Masculino</label>
                </div>
    
                <div class="Genero" style="border-top-right-radius: 5px; border-bottom-right-radius: 5px;">
                    <input type="radio" name="sexo" id="Outros" value="NãoOutros">
                    <label for="Outros">&nbsp;Outros</label>
                </div>
            </div>


            <label for="senhaCadas">Senha</label>
            <label class="Check"><input type="checkbox" id="MostrarSenha">&nbsp;Mostrar Senha </label>
            <input type="password" name="senhaCadas" id="senhaCadas" placeholder="Digite sua senha" maxlength="12">
            <p id="MensagemErro3" style="display: none;"><i class="fa-solid fa-triangle-exclamation"></i>&nbsp;Campo obrigatório. Coloque sua senha.</p>

            <p id="Avisos" style="display: none;"></p>

            <p class="Concorda">Ao clicar em cadastrar, você concordar com os <a href="/PRIMUS/PAGINAS/Termos.php">"Termos <br>de Uso"</a> e a <a href="/PRIMUS/PAGINAS/Termos.php"> "Política de Privacidade"</a>.</p>
            <br>
            <input type="submit" value="Cadastrar" class="btnCadastrar" id="btnCadastrar">

            <br><br>
        </div>
    </form>

    <br><br>
    <hr style="width: 70%; margin: 0 auto; border: 1px solid #000;">
    <br>
    <p class="TextoCopy">Copyright &copy; 2024-2025 Primu's Auto Peças | Todos os direitos reservados</p>
    <br>

    <script src="../JAVASCRIPT/jsCadastro.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/d3aca5478d.js" crossorigin="anonymous"></script>
</body>
</html>