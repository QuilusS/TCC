<?php
include '../PHP/ProcessoFormLogin.php';
?>

<link rel="stylesheet" href="../CSS/styleFormulario.css">

<body>

    <div class="overlay" id="overlay">
        <form action="" method="POST" id="MyForm">
            <div class="TelaLogin">
                <div class="x" onclick="SairLogin()"><i class="fa-solid fa-xmark fa-xl"></i></div>
                        <div class="flex">
                            <img src="../IMGS/Logoreal.png" alt="LogoPrimus" width="220px" height="80px">
                        </div>
                        <br>
                        <p class="PLogin">Login</p>
                        <label for="emailLogin">Email</label>
                        <input type="text" id="emailLogin" name="emailLogin" placeholder="Digite seu email">
                        <p id="MensagemErro" style="display: none;"><i class="fa-solid fa-triangle-exclamation"></i>&nbsp;Campo obrigatório. Coloque seu email.</p>
            
                        <label for="senha">Senha</label>
                        <label class="Check"><input type="checkbox" id="MostrarSenha">&nbsp;Mostrar Senha</label>
                        <input type="password" id="senha" name="senha" placeholder="Digite sua senha">
                        <p id="MensagemErro2" style="display: none;"><i class="fa-solid fa-triangle-exclamation"></i>&nbsp;Campo obrigatório. Coloque sua senha.</p>
            
                        <a href="#" target="_blank"><p class="Esqueceu">Esqueceu a senha?</p></a>
                        <br><br>
                        
                        <h4>Não possui uma conta?<br><span><a href="Cadastro.php">Cadastre aqui!</a></span></h4>
                        <div class="flex"><input type="submit" value="Avançar" class="btnAvancar" id="btnAvancar"></div>
                        <br>
            </div>
        </form>
    </div>
</body>



