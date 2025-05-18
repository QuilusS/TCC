document.getElementById("MostrarSenha").addEventListener("change", function() {
    let senhaInput = document.getElementById("senha");
    senhaInput.type = this.checked ? "text" : "password";
});