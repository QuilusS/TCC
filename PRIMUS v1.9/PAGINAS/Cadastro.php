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
    <form action="" id="MyForm">
        <div class="TelaCadastro">
            <div class="flex">
                <img src="../IMGS/Logoreal.png" alt="LogoPrimus" width="220px" height="80px">
            </div>
            <p class="CriarText">Criar uma conta é simples <br>e prático</p>
            <label for="name">Nome e Sobrenome</label>
            <input type="text" name="name" id="name" placeholder="Digite seu nome e sobrenome">
            <p id="MensagemErro" style="display: none;"><i class="fa-solid fa-triangle-exclamation"></i>&nbsp;Campo obrigatório. Coloque sua nome e sobrenome.</p>


            <label for="email">Email</label>
            <input type="text" name="email" id="email" placeholder="Digite seu Email">
            <p id="MensagemErro2" style="display: none;"><i class="fa-solid fa-triangle-exclamation"></i>&nbsp;Campo obrigatório. Coloque sua email.</p>


            <label for="number">Nº de Celular</label>
            <input type="tel" name="number" id="number" placeholder="Digite seu número de celular">


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
                    <input type="radio" name="sexo" id="Naobinario" value="Não-Binario">
                    <label for="Não-Binario">&nbsp;Não-Binario</label>
                </div>
            </div>


            <label for="senha">Senha</label>
            <label class="Check"><input type="checkbox" id="MostrarSenha">&nbsp;Mostrar Senha </label>
            <input type="password" name="senha" id="senha" placeholder="Digite sua senha">
            <p id="MensagemErro3" style="display: none;"><i class="fa-solid fa-triangle-exclamation"></i>&nbsp;Campo obrigatório. Coloque sua senha.</p>

            <p class="Concorda">Ao clicar em cadastrar, você concordar com os <span>"Termos <br>de Uso"</span> e a <span>"Política de Privacidade"</span>.</p>
            <br>
            <input type="submit" value="Cadastrar" class="btnCadastrar">

            <br><br>
            <p class="UltimoTexto">Já tem uma conta?<br><a href="/PRIMUS/PAGINAS/TelaInicial.php">Faça Login!</a></p>
        </div>
    </form>

    <script src="../JAVASCRIPT/jsCadastro.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/d3aca5478d.js" crossorigin="anonymous"></script>
</body>
</html>