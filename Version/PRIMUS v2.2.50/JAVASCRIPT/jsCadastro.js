//Função para cobrir/mostrar a senha
document.getElementById("MostrarSenha").addEventListener("change", function() {
    let senhaInput = document.getElementById("senhaCadas");
    senhaInput.type = this.checked ? "text" : "password";
});
// Valida se a senha atende aos critérios de segurança
function validarSenhaRequisitos(senha) {
    const regex = /^(?=.*\d)[A-Za-z\d]{5,12}$/;    
    return regex.test(senha);
}

//função para validar o campo de email
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
//Apos perder o foco dos inputs 
document.getElementById("nameCadas").addEventListener("blur", function() {
    validarCampo(this, document.getElementById("MensagemErro"));
});
  
document.getElementById("emailCadas").addEventListener("blur", function() {
    validarCampo(this, document.getElementById("MensagemErro2"));
});

document.getElementById("senhaCadas").addEventListener("blur", function() {
    validarCampo(this, document.getElementById("MensagemErro3"));
});
document.getElementById("senhaCadas").addEventListener("blur", function() {
    validarCampo(this, document.getElementById("MensagemErro3"));
});

// Permite apenas números e adiciona espaço após o DDD
document.getElementById("numberCadas").addEventListener("input", function() {

    let valor = this.value.replace(/\D/g, "");

    if (valor.length > 2) {
        valor = valor.replace(/^(\d{2})(\d+)/, "$1 $2");
    }

    this.value = valor;
});

/// Envia o formulário via AJAX e exibe mensagens sem recarregar a página
document.getElementById("MyForm").addEventListener("submit", function (event) {
    event.preventDefault(); // Impede o envio padrão do formulário

    const formData = new FormData(this); // Coleta os dados do formulário
    const avisos = document.getElementById("Avisos");

    // Valida os campos antes de enviar
    const nome = document.getElementById("nameCadas");
    const email = document.getElementById("emailCadas");
    const senha = document.getElementById("senhaCadas");

    const nomeValida = validarCampo(nome, document.getElementById("MensagemErro"));
    const emailValida = validarCampo(email, document.getElementById("MensagemErro2"));
    const senhaValida = validarCampo(senha, document.getElementById("MensagemErro3"));

    if (!nomeValida || !emailValida || !senhaValida) {
        avisos.style.display = "none";
        avisos.textContent = "";
        return; // Não envia o formulário se houver erros
    }

    // Envia os dados via AJAX
    fetch("../PHP/ProcessoFormCadastro.php", {
        method: "POST",
        body: formData,
    })
        .then((response) => response.json()) // Espera uma resposta JSON do servidor
        .then((data) => {
            if (data.success) {
                // Exibe mensagem de sucesso
                avisos.style.display = "block";
                avisos.innerHTML = data.message; // Usa innerHTML para interpretar o <br>


                // Redireciona após 3 segundos
                setTimeout(() => {
                    window.location.href = "../PAGINAS/TelaInicial.php";
                }, 6000);
            } else {
                // Exibe mensagens de erro
                avisos.style.display = "block";
                avisos.innerHTML = data.message; // Usa innerHTML para interpretar o <br>

            }
        })
        .catch((error) => {
            console.error("Erro:", error);
            avisos.style.display = "block";
            avisos.textContent = "Ocorreu um erro ao processar o cadastro.";
        });
});