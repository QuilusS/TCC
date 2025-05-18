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
