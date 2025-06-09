<?php

include '../PHP/ProcessoFormLogin.php';

if (isset($_SESSION['erro_login'])) {
    $erro_login = $_SESSION['erro_login'];
    unset($_SESSION['erro_login']); // Limpa a mensagem de erro após exibi-la
} else {
    $erro_login = "";
}

?>

<link rel="stylesheet" href="../CSS/styleFormulario.css">

<body>

<div class="overlay" id="overlay">
	<form action="" method="POST" id="MyForm">
		<div class="TelaLogin">
			<div class="x" onclick="SairLogin()"><i class="fa-solid fa-xmark fa-xl"></i></div>
			<br/>
			<div class="flex">
				<img src="../IMGS/Logoreal.png" alt="LogoPrimus" width="220px" height="80px" />
			</div>
			<br/>
			<p class="PLogin">Login</p>
			<label for="emailLogin">Email</label>
			<input type="text" id="emailLogin" name="emailLogin" placeholder="Digite seu email" />
			<p id="MensagemErro" style="display: none;"><i class="fa-solid fa-triangle-exclamation"></i>&nbsp;Campo obrigatório. Coloque seu email.</p>

			<label for="senha">Senha</label>
			<div class="IconeSenha">
			<input type="password" id="senha" name="senha" placeholder="Digite sua senha">
			<i class="fa-solid fa-eye-slash" id="IconeEye" onclick="BotaoSenha()"></i>
			</div>
			<p id="MensagemErro2" style="display: none;"><i class="fa-solid fa-triangle-exclamation"></i>&nbsp;Campo obrigatório. Coloque sua senha.</p>

			<a href="/PRIMUS/PAGINAS/RedefinirSenha.php"><p class="Esqueceu">Esqueceu a senha?</p></a>
			<br />
			<div id="MensagemFinal" style="display: none;"><i class="fa-solid fa-triangle-exclamation"></i>&nbsp;</div>

			<h4><i class="fa-solid fa-lock"></i>&nbsp;<strong>Acesso Restrito</strong></h4>
			<p class="TextoAviso">O login deste sistema é exclusivo para administradores e desenvolvedores autorizados.</p>

			<div class="flex"><input type="submit" value="Avançar" class="btnAvancar" id="btnAvancar" /></div>
		</div>
	</form>
</div>

    <script>
    window.addEventListener('DOMContentLoaded', function () {
    const erroLogin = <?php echo json_encode($erro_login); ?>;

    if (erroLogin !== "") {
        const mensagemFinal = document.getElementById("MensagemFinal");
        const overlay = document.getElementById("overlay");

        mensagemFinal.innerHTML = erroLogin;
        mensagemFinal.style.display = "block";
        overlay.style.display = "flex";

        // Oculta a mensagem após 10 segundos
        setTimeout(() => {
            mensagemFinal.style.display = "none";
        }, 10000);
    }
});
    </script>
</body>



