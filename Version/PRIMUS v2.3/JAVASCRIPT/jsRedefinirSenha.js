// Valida os campos do formulário
function validarCampo(input, mensagemErro) {
    if (input.value.trim() === "") {
        mensagemErro.style.display = 'block';
        mensagemErro.textContent = "O campo de e-mail é obrigatório.";
        return false;
    } else {
        mensagemErro.style.display = 'none';
        return true;
    }
}

// Evento de validação ao perder o foco no campo de e-mail
document.getElementById("email").addEventListener("blur", function () {
    validarCampo(this, document.getElementById("MensagemErroEmail"));
});

let form = document.querySelector("form");
let aviso = document.getElementById("Aviso");

form.addEventListener("submit", function (event) {
    event.preventDefault(); // Impede o envio padrão do formulário

    let email = document.getElementById("email");
    let mensagemErroEmail = document.getElementById("MensagemErroEmail");

    // Valida o campo de e-mail
    let emailValido = validarCampo(email, mensagemErroEmail);

    if (!emailValido) {
        return;
    }

    // Exibe a mensagem "Carregando..." antes de enviar o formulário
    aviso.style.display = "block";
    aviso.textContent = "Carregando...";
    aviso.className = ""; 

    // Envia o formulário via fetch
    fetch(form.action, {
        method: "POST",
        body: new FormData(form),
    })
        .then((response) => response.text())
        .then((data) => {
            
            aviso.style.display = "block";
            aviso.innerHTML = data; // Substitua textContent por innerHTML
            aviso.className = data.includes("sucesso") ? "sucesso" : "erro";
        })
        .catch(() => {
            aviso.style.display = "block";
            aviso.textContent = "Erro ao enviar. Tente novamente!";
            aviso.className = "erro";
        })
        .finally(() => {
            setTimeout(() => {
                aviso.style.display = "none"; 
            }, 7000);
        });
});