//Função para cobrir/mostrar a senha
document.getElementById("MostrarSenha").addEventListener("change", function() {
    let senhaInput = document.getElementById("senha");
    senhaInput.type = this.checked ? "text" : "password";
});

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
document.getElementById("name").addEventListener("blur", function() {
    validarCampo(this, document.getElementById("MensagemErro"));
});
  
document.getElementById("email").addEventListener("blur", function() {
    validarCampo(this, document.getElementById("MensagemErro2"));
});

document.getElementById("senha").addEventListener("blur", function() {
    validarCampo(this, document.getElementById("MensagemErro3"));
});

// Valida ao enviar o formulário
document.getElementById("MyForm").addEventListener("submit", function(event) {
    var nome = document.getElementById("name");
    var email = document.getElementById("email");
    var senha = document.getElementById("senha");
    
    var nomeValida = validarCampo(nome, document.getElementById("MensagemErro"));
    var emailValida = validarCampo(email, document.getElementById("MensagemErro2"));
    var senhaValida = validarCampo(senha, document.getElementById("MensagemErro3"));


    if (!emailValida || !senhaValida || !nomeValida) {
      event.preventDefault();
    }
});

// Permite apenas números e adiciona espaço após o DDD
document.getElementById("number").addEventListener("input", function() {

    let valor = this.value.replace(/\D/g, "");

    if (valor.length > 2) {
        valor = valor.replace(/^(\d{2})(\d+)/, "$1 $2");
    }

    this.value = valor;
});