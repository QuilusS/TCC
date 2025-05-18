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

//-------------------------------------//

//Valida os campos do formulário
function validarCampo(input, mensagemErro) {

    if(input.value.trim() == ""){

        mensagemErro.style.display = 'block';
        return false;
    }
    else {
        mensagemErro.style.display = 'none';
        return true;
    }
}

// Valida o formato do e-mail
function validarEmail(input, mensagemErro) {
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Regex para validar e-mails
    if (input.value.trim() === "") {
        mensagemErro.style.display = 'block';
        return false;
    } else if (!regex.test(input.value.trim())) {
        mensagemErro.style.display = 'block';
        mensagemErro.textContent = "Email inválido. Por favor, insira um email válido.";
        return false;
    } else {
        mensagemErro.style.display = 'none';
        return true;
    }
}

// Apos perder o foco dos inputs
document.getElementById("name").addEventListener("blur", function() {
    validarCampo(this, document.getElementById("MensagemErroCont"));
});
document.getElementById("emailAtendi").addEventListener("blur", function() {
    validarEmail(this, document.getElementById("MensagemErro2Cont"));
});
document.getElementById("telefone").addEventListener("blur", function() {
    validarCampo(this, document.getElementById("MensagemErro3"));
});
document.getElementById("caixatexto").addEventListener("blur", function() {
    validarCampo(this, document.getElementById("MensagemErro4"));
});
document.getElementById("selecao").addEventListener("blur", function() {
    validarCampo(this, document.getElementById("MensagemErro5"));
});

// Inicializa o EmailJS com seu userID
    emailjs.init("DjX5EyyCmVafEbn0C");

// Envia o formulário
let form = document.getElementById('MyFormulario');
let Aviso = document.getElementById('MyAviso');

form.addEventListener('submit', function(event) {
    event.preventDefault();

    var nome = document.getElementById("name");
    var email = document.getElementById("emailAtendi");
    var telefone = document.getElementById("telefone");
    var caixatexto = document.getElementById("caixatexto");
    var selecao = document.getElementById("selecao");

    var nomeValido = validarCampo(nome, document.getElementById("MensagemErroCont"));
    var emailValido = validarEmail(email, document.getElementById("MensagemErro2Cont"));
    var telefoneValido = validarCampo(telefone, document.getElementById("MensagemErro3"));
    var caixatextoValido = validarCampo(caixatexto, document.getElementById("MensagemErro4"));
    var selecaoValido = validarCampo(selecao, document.getElementById("MensagemErro5"));


    if (!nomeValido || !emailValido || !telefoneValido || !caixatextoValido || !selecaoValido) {
        return;
    }


    // Exibe a nova mensagem
    const AvisoLoading = document.getElementById("AvisoLoading");
    AvisoLoading.style.display = "block";
    AvisoLoading.textContent = "Mandando Formulário...";


    emailjs.sendForm("service_7sujpvb", "template_f1q3xea", this)
        .then(() => {
            Aviso.textContent= "✔️ Mensagem enviada com sucesso!";
            Aviso.className = "sucesso";
            form.reset();
        })
        .catch(() => {
            Aviso.textContent = "❌ Erro ao enviar. Tente novamente!";
            Aviso.className = "erro";
        })
        .finally(() => {
            Aviso.style.display = "block";
            AvisoLoading.style.display = "none";
            setTimeout(() => {
                Aviso.style.display = "none"; // Esconde a mensagem após 5s
            }, 5000);
    });
});
// Apenas números no campo de telefone e adiciona espaço após o DDD
document.getElementById("telefone").addEventListener("input", function() {
    let valor = this.value.replace(/\D/g, "");

    if (valor.length > 2) {
        valor = valor.replace(/^(\d{2})(\d+)/, "$1 $2");
    }

    this.value = valor;
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