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

document.addEventListener('DOMContentLoaded', () => {
    const productContainer = document.getElementById('productContainer');
    const products = JSON.parse(localStorage.getItem('products')) || [];

    products.forEach(product => {
        const productDisplay = document.createElement('div');
        productDisplay.className = 'product-display';

        const img = document.createElement('img');
        img.src = product.image;
        img.alt = 'Product Image';

        const name = document.createElement('h3');
        name.innerText = product.name;

        const description = document.createElement('p');
        description.innerText = product.description;

        const price = document.createElement('p');
        price.innerText = `R$  ${product.price}`;

        productDisplay.appendChild(img);
        productDisplay.appendChild(name);
        productDisplay.appendChild(description);
        productDisplay.appendChild(price);

        productContainer.appendChild(productDisplay);
    });
});

function deleteProductFromLocalStorage(index) {
    const products = JSON.parse(localStorage.getItem('products')) || [];
    products.splice(index, 1);
    localStorage.setItem('products', JSON.stringify(products));
}

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


