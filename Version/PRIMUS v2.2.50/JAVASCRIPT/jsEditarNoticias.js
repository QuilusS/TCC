document.getElementById('btnImagemCapa').onclick = function() {
    document.getElementById('imagemCapa').click();
};
document.getElementById('btnImagem').onclick = function() {
    document.getElementById('imagem').click();
};

document.getElementById('imagemCapa').addEventListener('change', function(){
    const label = document.getElementById('btnImagemCapa');
    if (this.files.length) {
        label.textContent = this.files[0].name;
        label.style.color = "black";
    } else {
        label.textContent = "Imagem";
        label.style.color = "rgb(108, 117, 125)";
    }
    label.style.fontSize = "17px";
    label.style.fontFamily = "Arial, sans-serif";
});

document.getElementById('imagem').addEventListener('change', function(){
    const label = document.getElementById('btnImagem');
    if (this.files.length) {
        label.textContent = this.files[0].name;
        label.style.color = "black";
    } else {
        label.textContent = "Imagem";
        label.style.color = "rgb(108, 117, 125)";
    }
    label.style.fontSize = "17px";
    label.style.fontFamily = "Arial, sans-serif";
});

window.addEventListener('DOMContentLoaded', function() {
    const labelCapa = document.getElementById('btnImagemCapa');
    const labelImg = document.getElementById('btnImagem');

    // Usa as variáveis JS vindas do PHP
    if (typeof nomeImagemCapa !== "undefined" && nomeImagemCapa) {
        labelCapa.textContent = nomeImagemCapa;
        labelCapa.style.color = "black";
    } else {
        labelCapa.textContent = "Imagem";
        labelCapa.style.color = "rgb(108, 117, 125)";
    }
    labelCapa.style.fontSize = "17px";
    labelCapa.style.fontFamily = "Arial, sans-serif";

    if (typeof nomeImagem !== "undefined" && nomeImagem) {
        labelImg.textContent = nomeImagem;
        labelImg.style.color = "black";
    } else {
        labelImg.textContent = "Imagem";
        labelImg.style.color = "rgb(108, 117, 125)";
    }
    labelImg.style.fontSize = "17px";
    labelImg.style.fontFamily = "Arial, sans-serif";
});