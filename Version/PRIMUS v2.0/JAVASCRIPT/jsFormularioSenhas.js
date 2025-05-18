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

//Função para mostrar a senha no input de confirmação
function BotaoSenha2() {
    const senhaInput = document.getElementById('confirmar_senha');
    const toggleIcon = document.getElementById('IconeEye2');

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

let avisoTimeout;

// Função para exibir mensagens no ID "AvisoSenha" com reset do timeout
function exibirAvisoSenha(mensagem, classe = "") {
    const avisoSenha = document.getElementById("AvisoSenha");

    // Limpa o timeout anterior, se existir
    if (avisoTimeout) {
        clearTimeout(avisoTimeout);
    }

    // Exibe a nova mensagem
    avisoSenha.style.display = "block";
    avisoSenha.textContent = mensagem;
    avisoSenha.className = classe;

    // Inicia um novo timeout para esconder a mensagem após 7 segundos
    avisoTimeout = setTimeout(() => {
        avisoSenha.style.display = "none";
    }, 7000);
}


// Valida os campos do formulário
function validarCampo(input, mensagemErro, mensagem) {
    if (input.value.trim() === "") {
        mensagemErro.style.display = "block";
        mensagemErro.textContent = mensagem;
        return false;
    } else {
        mensagemErro.style.display = "none";
        return true;
    }
}

// Valida se a senha atende aos critérios de segurança
function validarSenhaRequisitos(senha) {
    const regex = /^(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{5,12}$/;
    return regex.test(senha);
}

// Valida se as senhas coincidem e atendem aos requisitos
function validarSenhas() {
    const senha = document.getElementById("senha").value.trim();
    const confirmarSenha = document.getElementById("confirmar_senha").value.trim();
    const avisoSenha = document.getElementById("AvisoSenha");

    // Verifica se a senha atende aos requisitos
    if (!validarSenhaRequisitos(senha)) {
        avisoSenha.style.display = "block";
        avisoSenha.textContent = "Requisitos de senhas não cumpridos.";
        setTimeout(() => {
            avisoSenha.style.display = "none"; // Esconde a mensagem após 7 segundos
        }, 7000);
        return false;
    }

    // Verifica se as senhas coincidem
    if (senha !== confirmarSenha) {
        avisoSenha.style.display = "block";
        avisoSenha.textContent = "Os campos de senha não coincidem.";
        setTimeout(() => {
            avisoSenha.style.display = "none"; // Esconde a mensagem após 7 segundos
        }, 7000);
        return false;
    }

    avisoSenha.style.display = "none";
    return true;
}

// Evento de validação ao perder o foco nos campos de senha
document.getElementById("senha").addEventListener("blur", function () {
    validarCampo(this, document.getElementById("MensagemErroSenha"), "O campo de senha é obrigatório.");
});

document.getElementById("confirmar_senha").addEventListener("blur", function () {
    validarCampo(this, document.getElementById("MensagemErroSenha2"), "O campo de confirmar a senha é obrigatório.");
});

// Redireciona para a página inicial com a flag ?showOverlay=true
function redirecionarComOverlay() {
    window.location.href = "/PRIMUS/PAGINAS/TelaInicial.php?showOverlay=true";
}

// Envia o formulário via fetch
let form = document.querySelector("form");
form.addEventListener("submit", function (event) {
    event.preventDefault(); // Impede o envio padrão do formulário

    const senha = document.getElementById("senha");
    const confirmarSenha = document.getElementById("confirmar_senha");
    const mensagemErroSenha = document.getElementById("MensagemErroSenha");
    const mensagemErroSenha2 = document.getElementById("MensagemErroSenha2");

    // Valida os campos de senha
    const senhaValida = validarCampo(senha, mensagemErroSenha, "O campo de senha é obrigatório.");
    const confirmarSenhaValida = validarCampo(confirmarSenha, mensagemErroSenha2, "O campo de confirmar a senha é obrigatório.");
    const senhasCoincidemERequisitos = validarSenhas();

    // Só envia o formulário se todos os campos forem válidos
    if (!senhaValida || !confirmarSenhaValida || !senhasCoincidemERequisitos) {
        return;
    }

    // Exibe a mensagem "Carregando..." antes de enviar o formulário
    const aviso = document.getElementById("AvisoSenha");
    aviso.style.display = "block";
    aviso.textContent = "...";
    aviso.className = "";


    // Envia o formulário via fetch
    fetch(form.action, {
        method: "POST",
        body: new FormData(form),
    })
        .then((response) => response.text())
        .then((data) => {
            aviso.style.display = "block";
            aviso.textContent = data; // Mostra a resposta do servidor
            aviso.className = data.includes("sucesso") ? "sucesso" : "erro";

            // Redireciona para a página inicial com o overlay ativo
            if (data.includes("Senha alterada com sucesso!")) {
                setTimeout(() => {
                    redirecionarComOverlay();
                }, 3000); // Redireciona após 3 segundos
            }

            setTimeout(() => {
                aviso.style.display = "none"; // Esconde a mensagem após 7 segundos
            }, 7000);
        })
        .catch(() => {
            aviso.style.display = "block";
            aviso.textContent = "❌ Erro ao enviar. Tente novamente!";
            aviso.className = "erro";
            setTimeout(() => {
                aviso.style.display = "none"; // Esconde a mensagem após 7 segundos
            }, 7000);
        });
});