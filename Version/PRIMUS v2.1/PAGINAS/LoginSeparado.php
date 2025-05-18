<!--<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/styleLoginSeparado.css">
    <link rel="shortcut icon" href="../IMGS/favicon.ico" type="image/x-icon">
    <title>Login | Primu's Auto Peças</title>
</head>
<body>
    <?php
    session_start();

    include '../PHP/ProcessoFormLogin.php';

    if (isset($_SESSION['erro_login'])) {
        $erro_login = $_SESSION['erro_login'];
        unset($_SESSION['erro_login']); // Limpa a mensagem de erro após exibi-la
    } else {
        $erro_login = "";
    }
    ?>
        <br><br><br><br>
        <form action="" method="POST" id="MyForm">
            <div class="TelaLogin">
                <button type="button" onclick="window.location.href='/PRIMUS/PAGINAS/Cadastro.php';"><i class="fa-solid fa-backward-step"></i></button>
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
                    <i class="fa-solid fa-eye" id="IconeEye" onclick="BotaoSenha()"></i>
                </div>
                <p id="MensagemErro2" style="display: none;"><i class="fa-solid fa-triangle-exclamation"></i>&nbsp;Campo obrigatório. Coloque sua senha.</p>

                <a href="/PRIMUS/PAGINAS/RedefinirSenha.php" target="_blank"><p class="Esqueceu">Esqueceu a senha?</p></a>
                <br />
                <div id="MensagemFinal" style="display: none;"><i class="fa-solid fa-triangle-exclamation"></i>&nbsp;</div>

                <h4><i class="fa-solid fa-lock"></i>&nbsp;<strong>Acesso Restrito</strong></h4>
                <p class="TextoAviso">O login deste sistema é exclusivo para administradores e desenvolvedores autorizados.</p>

                <div class="flex"><input type="submit" value="Avançar" class="btnAvancar" id="btnAvancar" /></div>
            </div>
        </form>

        <br><br>
        <hr style="width: 70%; margin: 0 auto; border: 1px solid #000;">
        <br>
        <p class="TextoCopy">Copyright &copy; 2024-2025 Primu's Auto Peças | Todos os direitos reservados</p>
        <br>
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

        //Função para mostrar a senha
        function BotaoSenha() {
            const senhaInput = document.getElementById('senha');
            const toggleIcon = document.getElementById('IconeEye');

            if (senhaInput.type === 'password') {
                senhaInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                senhaInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }


        //função para validar o campo de email
        function validarCampo(input, messagemErro) {

            if(input.value.trim() == ""){

                messagemErro.style.display = 'block';
                return false;
            }
            else {
                messagemErro.style.display = 'none';
                return true;
            }
        }   
        //Apos perder o foco dos inputs 
        document.getElementById("emailLogin").addEventListener("blur", function() {
            validarCampo(this, document.getElementById("MensagemErro"));
        });
        
        document.getElementById("senha").addEventListener("blur", function() {
            validarCampo(this, document.getElementById("MensagemErro2"));
        });

        // Valida ao enviar o formulário
        document.getElementById("MyForm").addEventListener("submit", function(event) {
            var email = document.getElementById("emailLogin");
            var senha = document.getElementById("senha");
            var emailValido = validarCampo(email, document.getElementById("MensagemErro"));
            var senhaValida = validarCampo(senha, document.getElementById("MensagemErro2"));

            // Exibe erros no cliente e permite o envio para o servidor
            if (!emailValido || !senhaValida) {
                event.preventDefault(); // Apenas exibe a mensagem no cliente, sem enviar o formulário
            } else {
                console.log("Formulário enviado para o servidor!"); // Confirma que o envio vai acontecer
            }
        });

        //Efeito do texto aparecendo e sumindo na tela

        const Texto = document.querySelectorAll('.TextoLogin');

        window.addEventListener('DOMContentLoaded', () => {
            Texto.forEach(el => {
                el.classList.add('ativa');
            });

            setTimeout(() => {
                Texto.forEach(el => {
                    el.remove();
                });
            }, 6000); 
        });

    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/d3aca5478d.js" crossorigin="anonymous"></script>
</body>
</html>-->