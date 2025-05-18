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
// Apos perder o foco dos inputs
document.getElementById("name").addEventListener("blur", function() {
    validarCampo(this, document.getElementById("MensagemErro"));
});
document.getElementById("email").addEventListener("blur", function() {
    validarCampo(this, document.getElementById("MensagemErro2"));
});
document.getElementById("telefone").addEventListener("blur", function() {
    validarCampo(this, document.getElementById("MensagemErro3"));
});
document.getElementById("caixatexto").addEventListener("blur", function() {
    validarCampo(this, document.getElementById("MensagemErro4"));
});

// Inicializa o EmailJS com seu userID
    emailjs.init("DjX5EyyCmVafEbn0C");

// Envia o formulário
let form = document.getElementById('MyFormu');
let Aviso = document.getElementById('MyAviso');

form.addEventListener('submit', function(event) {
    event.preventDefault();

    var nome = document.getElementById("name");
    var email = document.getElementById("email");
    var telefone = document.getElementById("telefone");
    var caixatexto = document.getElementById("caixatexto");

    var nomeValido = validarCampo(nome, document.getElementById("MensagemErro"));
    var emailValido = validarCampo(email, document.getElementById("MensagemErro2"));
    var telefoneValido = validarCampo(telefone, document.getElementById("MensagemErro3"));
    var caixatextoValido = validarCampo(caixatexto, document.getElementById("MensagemErro4"));

    if (!nomeValido || !emailValido || !telefoneValido || !caixatextoValido) {
        return;
    }

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
            setTimeout(() => {
                Aviso.style.display = "none"; // Esconde a mensagem após 5s
            }, 5000);
    });
});
// Apenas números no campo de telefone
document.getElementById("telefone").addEventListener("input", function() {
    this.value = this.value.replace(/\D/g, "");
});

