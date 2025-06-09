//Funcao para aparecer e sair a barra

function BarraVertical() {

    const barra = document.getElementById("Barra");

    barra.style.display = barra.style.display == "flex" ? "none" : "flex";

}

function BarraVerticalCell() {
    const cell = document.getElementById('Cell');
    cell.classList.toggle('active');
}

//FUNÇÕES DA TELA LOGIN

function Login() {

    const login = document.getElementById("overlay");

    login.style.display = login.style.display == "flex" ? "none" : "flex";

}

function SairLogin() {

    document.getElementById("overlay").style.display = "none";
}


//Função para mostrar a senha
function BotaoSenha() {
    const senhaInput = document.getElementById('senha');
    const toggleIcon = document.getElementById('IconeEye');

    // Verifica o estado atual do campo de senha
    if (senhaInput.type === 'password') {
        senhaInput.type = 'text'; // Mostra a senha
        toggleIcon.classList.remove('fa-eye-slash'); // Remove o ícone de "ocultar"
        toggleIcon.classList.add('fa-eye'); // Adiciona o ícone de "mostrar"
    } else {
        senhaInput.type = 'password'; // Oculta a senha
        toggleIcon.classList.remove('fa-eye'); // Remove o ícone de "mostrar"
        toggleIcon.classList.add('fa-eye-slash'); // Adiciona o ícone de "ocultar"
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