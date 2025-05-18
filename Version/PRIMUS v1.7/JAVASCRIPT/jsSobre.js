window.addEventListener('DOMContentLoaded', () => {
    const links = document.querySelectorAll('.nav-link'); // seleciona todos os elementos na página que têm a classe nav-link.
    const currentFile = window.location.pathname.split('/').pop(); // Pega o nome do arquivo atual, como Notícias.html

    console.log("Página atual: ", currentFile); // Exibe o nome do arquivo atual no console, como Notícias.html

    links.forEach(link => {
        const linkFile = link.getAttribute('href').split('/').pop(); // Pega o nome do arquivo do link

        // Verifica se o nome do arquivo do link é igual ao nome da página atual
        if (linkFile === currentFile) {
            link.classList.add('active');
        }

        // Evento de clique para marcar o link como ativo
        link.addEventListener('click', () => {
            links.forEach(link => link.classList.remove('active'));
            link.classList.add('active');
        });
    });
});

//Funcao apos clicar imagem
function ImagemMaior() {
    document.getElementById("EfeitoOverlay").style.display = "flex";
}
function ImagemMaior2() {
    document.getElementById("EfeitoOverlay2").style.display = "flex";
}
function ImagemMaior3() {
    document.getElementById("EfeitoOverlay3").style.display = "flex";
}
function ImagemMaior4() {
    document.getElementById("EfeitoOverlay4").style.display = "flex";
}

//Funcao apos mouse sair da imagem

document.getElementById("EfeitoOverlay").addEventListener("click", function () {
    this.style.display = "none";
});
document.getElementById("EfeitoOverlay2").addEventListener("click", function () {
    this.style.display = "none";
});
document.getElementById("EfeitoOverlay3").addEventListener("click", function () {
    this.style.display = "none";
});
document.getElementById("EfeitoOverlay4").addEventListener("click", function () {
    this.style.display = "none";
});

//------------------------------------------------------
// FUNÇÕES DA TELA LOGIN

function BarraVertical() {

    const barra = document.getElementById("Barra");

    barra.style.display = barra.style.display == "flex" ? "none" : "flex";

}

function Login() {

    const login = document.getElementById("overlay");

    login.style.display = login.style.display == "flex" ? "none" : "flex";

}

function SairLogin() {

    document.getElementById("overlay").style.display = "none";
}

//Função para mostrar a senha
document.getElementById("MostrarSenha").addEventListener("change", function() {
    let senhaInput = document.getElementById("senha");
    senhaInput.type = this.checked ? "text" : "password";
});

//função apos apertar o botão o mouse muda para o cursor de carregamento
function Loading() {

    document.body.style.cursor = 'wait';

    setTimeout(() => {
        document.body.style.cursor = 'default';
    }, 1000);

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
document.getElementById("email").addEventListener("blur", function() {
    validarCampo(this, document.getElementById("MensagemErro"));
});
  
document.getElementById("senha").addEventListener("blur", function() {
    validarCampo(this, document.getElementById("MensagemErro2"));
});

// Valida ao enviar o formulário
document.getElementById("MyForm").addEventListener("submit", function(event) {
    var email = document.getElementById("email");
    var senha = document.getElementById("senha");
    var emailValido = validarCampo(email, document.getElementById("MensagemErro"));
    var senhaValida = validarCampo(senha, document.getElementById("MensagemErro2"));

    if (!emailValido || !senhaValida) {
      event.preventDefault();
    }   else {
        console.log("Formulário enviado para o servidor!"); // Confirma que o envio vai acontecer
    }
});

//Efeito de Scroll
document.addEventListener("DOMContentLoaded", () => {
    const botaoSubir = document.getElementById('Subindo'); // Seleciona o div com o ID 'Subindo'
    const valor = 150;

    window.addEventListener("scroll", () => {
        if (window.scrollY > valor) {
            botaoSubir.classList.add('show');

        } else {
            botaoSubir.classList.remove('show');

        }
    });
});

function Subir() {
    window.scrollTo({ top: 0, behavior: "smooth" });
}


