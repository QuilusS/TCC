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

const ElementosEfeito = document.querySelectorAll('.hidden, .hidden2, .hidden3');


const valor = 400;

function OnScroll() {

    ElementosEfeito.forEach (el => {
        const rect = el.getBoundingClientRect();
        if (rect.top < innerHeight - valor) {
            el.classList.add('show');
        }
    });
}

window.addEventListener('scroll', OnScroll)

/*var video = document.querySelector('#danceImg');

function Parar(){

 if(video.paused)
 {
    video.play();
 }
 else{
    video.pause();
 }

}*/
