window.addEventListener('DOMContentLoaded', () => {
    const links = document.querySelectorAll('.nav-link'); // seleciona todos os elementos na página que têm a classe nav-link.
    const currentFile = window.location.pathname.split('/').pop(); // Pega o nome do arquivo atual, como Notícias.html

    console.log("Página atual: ", currentFile); 

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

    loadProducts();

});

let currentProduct = null;

function openForm() {
    document.getElementById("productForm").style.display = "block";
}

function closeForm() {
    document.getElementById("productForm").style.display = "none";
    currentProduct = null;
}

function saveProduct(event) {
    event.preventDefault();

    const productName = document.getElementById("productName").value;
    const productDescription = document.getElementById("productDescription").value;
    const productPrice = document.getElementById("productPrice").value;
    const productImage = document.getElementById("productImage").files[0];

    if (currentProduct) {
        updateProduct(currentProduct, productName, productDescription, productPrice, productImage);
    } else {
        addProduct(productName, productDescription, productPrice, productImage);
    }

    closeForm();
}

function addProduct(productName, productDescription, productPrice, productImage) {
    const reader = new FileReader();
    reader.onload = function(e) {
        const productContainer = document.getElementById("productContainer");

        const productDisplay = document.createElement("div");
        productDisplay.className = "product-display";

        const img = document.createElement("img");
        img.src = e.target.result;
        img.alt = "Product Image";

        const name = document.createElement("h3");
        name.innerText = productName;

        const description = document.createElement("p");
        description.innerText = productDescription;

        const price = document.createElement("p");
        price.innerText = `Preço: ${productPrice}`;

        const modifyButton = document.createElement("button");
        modifyButton.className = "btn modify";
        modifyButton.innerText = "Modificar";
        modifyButton.onclick = function() {
            modifyProduct(productDisplay);
        };

        const deleteButton = document.createElement("button");
        deleteButton.className = "btn delete";
        deleteButton.innerText = "Excluir";
        deleteButton.onclick = function() {
            deleteProduct(productDisplay);
        };

        productDisplay.appendChild(img);
        productDisplay.appendChild(name);
        productDisplay.appendChild(description);
        productDisplay.appendChild(price);
        productDisplay.appendChild(modifyButton);
        productDisplay.appendChild(deleteButton);

        productContainer.appendChild(productDisplay);

        saveProductToLocalStorage(productName, productDescription, productPrice, e.target.result);
    }
    reader.readAsDataURL(productImage);
}

function updateProduct(productDisplay, productName, productDescription, productPrice, productImage) {
    productDisplay.querySelector("h3").innerText = productName;
    productDisplay.querySelector("p").innerText = productDescription;
    productDisplay.querySelector("p:nth-of-type(2)").innerText = `Preço: ${productPrice}`;

    if (productImage) {
        const reader = new FileReader();
        reader.onload = function(e) {
            productDisplay.querySelector("img").src = e.target.result;
            updateProductInLocalStorage(productDisplay, productName, productDescription, productPrice, e.target.result);
        }
        reader.readAsDataURL(productImage);
    } else {
        updateProductInLocalStorage(productDisplay, productName, productDescription, productPrice);
    }
}

function modifyProduct(productDisplay) {
    currentProduct = productDisplay;

    const productName = productDisplay.querySelector("h3").innerText;
    const productDescription = productDisplay.querySelector("p").innerText;
    const productPrice = productDisplay.querySelector("p:nth-of-type(2)").innerText.replace('Preço: ', '');

    document.getElementById("productName").value = productName;
    document.getElementById("productDescription").value = productDescription;
    document.getElementById("productPrice").value = productPrice;

    openForm();
}

function deleteProduct(productDisplay) {
    if (confirm("Tem certeza que deseja excluir este produto?")) {
        const index = Array.from(productDisplay.parentNode.children).indexOf(productDisplay);
        productDisplay.remove();
        deleteProductFromLocalStorage(index);
    }
}

function saveProductToLocalStorage(name, description, price, image) {
    const products = JSON.parse(localStorage.getItem('products')) || [];
    products.push({ name, description, price, image });
    localStorage.setItem('products', JSON.stringify(products));
}

function updateProductInLocalStorage(productDisplay, name, description, price, image) {
    const products = JSON.parse(localStorage.getItem('products')) || [];
    const index = Array.from(productDisplay.parentNode.children).indexOf(productDisplay);
    products[index] = { name, description, price, image: image || products[index].image };
    localStorage.setItem('products', JSON.stringify(products));
}

function deleteProductFromLocalStorage(index) {
    const products = JSON.parse(localStorage.getItem('products')) || [];
    products.splice(index, 1);
    localStorage.setItem('products', JSON.stringify(products));
}

function loadProducts() {
    const products = JSON.parse(localStorage.getItem('products')) || [];
    const productContainer = document.getElementById("productContainer");

    products.forEach(product => {
        const productDisplay = document.createElement("div");
        productDisplay.className = "product-display";

        const img = document.createElement("img");
        img.src = product.image;
        img.alt = "Product Image";

        const name = document.createElement("h3");
        name.innerText = product.name;

        const description = document.createElement("p");
        description.innerText = product.description;

        const price = document.createElement("p");
        price.innerText = `Preço: ${product.price}`;

        const modifyButton = document.createElement("button");
        modifyButton.className = "btn modify";
        modifyButton.innerText = "Modificar";
        modifyButton.onclick = function() {
            modifyProduct(productDisplay);
        };

        const deleteButton = document.createElement("button");
        deleteButton.className = "btn delete";
        deleteButton.innerText = "Excluir";
        deleteButton.onclick = function() {
            deleteProduct(productDisplay);
        };

        productDisplay.appendChild(img);
        productDisplay.appendChild(name);
        productDisplay.appendChild(description);
        productDisplay.appendChild(price);
        productDisplay.appendChild(modifyButton);
        productDisplay.appendChild(deleteButton);

        productContainer.appendChild(productDisplay);
    });
}
