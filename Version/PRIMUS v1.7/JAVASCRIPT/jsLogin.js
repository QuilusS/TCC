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
    }
});
    