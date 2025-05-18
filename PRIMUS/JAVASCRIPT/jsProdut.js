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
    const filterCategory = document.getElementById('filterCategory');

    // Carregar categorias no menu suspenso
    const categories = JSON.parse(localStorage.getItem('categories')) || [];
    categories.forEach(category => {
        const option = document.createElement('option');
        option.value = category;
        option.textContent = category;
        filterCategory.appendChild(option);
    });

    // Renderizar produtos
    products.forEach(product => {
        const productDisplay = document.createElement('div');
        productDisplay.className = 'product-display product-item';

        const img = document.createElement('img');
        img.src = product.image;
        img.alt = 'Product Image';

        const name = document.createElement('h3');
        name.className = 'product-name';
        name.innerText = product.name;

        const description = document.createElement('p');
        description.innerText = product.description;

        // Criar contêiner de informações
        const infoContainer = document.createElement('div');
        infoContainer.className = 'product-info';

        const price = document.createElement('p');
        price.className = 'product-price';
        price.innerHTML = `<b>Preço:</b> ${product.price}`;

        const category = document.createElement('p');
        category.className = 'product-category';
        category.innerHTML = `<b>Categoria:</b> ${product.category}`;
        
        // Adicionar a medida do produto
        const unit = document.createElement('p');
        unit.className = 'product-unit';
        unit.innerHTML = `<b>Medida:</b> ${product.unit || "Unidade"}`;

        // Adicionar elementos ao contêiner de informações
        infoContainer.appendChild(price);
        infoContainer.appendChild(category);
        infoContainer.appendChild(unit);

        // Adicionar elementos ao produto
        productDisplay.appendChild(img);
        productDisplay.appendChild(name);
        productDisplay.appendChild(description);
        productDisplay.appendChild(infoContainer);

        productContainer.appendChild(productDisplay);
    });
});

function filterProducts() {
    const searchInput = document.getElementById('searchInput').value.toLowerCase();
    const selectedCategory = document.getElementById('filterCategory').value;
    const productContainer = document.getElementById('productContainer');
    const products = productContainer.getElementsByClassName('product-item');

    for (let product of products) {
        const productName = product.querySelector('.product-name').textContent.toLowerCase();
        const productCategory = product.querySelector('.product-category').textContent.toLowerCase();

        // Verifica se o produto corresponde à pesquisa e à categoria selecionada
        if (
            (productName.includes(searchInput) || searchInput === '') &&
            (selectedCategory === '' || productCategory.includes(selectedCategory.toLowerCase()))
        ) {
            product.style.display = '';
        } else {
            product.style.display = 'none';
        }
    }
}

function filterByCategory() {
    filterProducts(); // Reutiliza a lógica de filtro para aplicar a categoria e a pesquisa
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


