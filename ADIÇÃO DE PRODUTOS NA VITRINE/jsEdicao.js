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

function openForm() {
    document.getElementById("productForm").style.display = "block";
}

function closeForm() {
    document.getElementById("productForm").style.display = "none";
}

function displayProduct(event) {
    event.preventDefault();

    const productName = document.getElementById("productName").value;
    const productDescription = document.getElementById("productDescription").value;
    const productPrice = document.getElementById("productPrice").value;
    const productImage = document.getElementById("productImage").files[0];

    const reader = new FileReader();
    reader.onload = function(e) {
        document.getElementById("displayImage").src = e.target.result;
    }
    reader.readAsDataURL(productImage);

    document.getElementById("displayName").innerText = productName;
    document.getElementById("displayDescription").innerText = productDescription;
    document.getElementById("displayPrice").innerText = `Preço: ${productPrice}`;

    document.getElementById("productDisplay").style.display = "block";
    closeForm();
}