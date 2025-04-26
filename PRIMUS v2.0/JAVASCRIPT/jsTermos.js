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