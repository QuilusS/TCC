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
    document.getElementById("formOverlay").classList.add("active");
    document.getElementById("productForm").classList.add("active");
    loadCategoriesIntoSelect();
}
function closeForm() {
    document.getElementById("formOverlay").classList.remove("active");
    document.getElementById("productForm").classList.remove("active");
    currentProduct = null;
}

function loadCategoriesIntoSelect() {
    const categories = JSON.parse(localStorage.getItem("categories")) || [];
    const categorySelect = document.getElementById("productCategory");
    categorySelect.innerHTML = ""; // Limpa as opções existentes

    categories.forEach(category => {
        const option = document.createElement("option");
        option.value = category;
        option.textContent = category;
        categorySelect.appendChild(option);
    });
}

function saveProduct(event) {
    event.preventDefault();

    const productName = document.getElementById("productName").value;
    const productDescription = document.getElementById("productDescription").value;
    const productPrice = document.getElementById("productPrice").value;
    const productCategory = document.getElementById("productCategory").value;
    const productUnit = document.getElementById("productUnit").value;
    const productImage = document.getElementById("productImage").files[0];

    if (currentProduct) {
        updateProduct(currentProduct, productName, productDescription, productPrice, productCategory, productUnit, productImage);
    } else {
        addProduct(productName, productDescription, productPrice, productCategory, productUnit, productImage);
    }

    closeForm();
}

function addProduct(productName, productDescription, productPrice, productCategory, productUnit, productImage) {
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

        // Criar contêiner de informações
        const infoContainer = document.createElement("div");
        infoContainer.className = "product-info";

        const price = document.createElement("p");
        price.className = "product-price";
        price.innerText = `Preço: ${productPrice}`;

        const category = document.createElement("p");
        category.className = "product-category";
        category.innerText = `Categoria: ${productCategory}`;
        
        const unit = document.createElement("p");
        unit.className = "product-unit";
        unit.innerText = `Medida: ${productUnit}`;

        // Adicionar informações ao contêiner
        infoContainer.appendChild(price);
        infoContainer.appendChild(category);
        infoContainer.appendChild(unit);

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

        // Criando um contêiner para os botões
        const buttonContainer = document.createElement("div");
        buttonContainer.style.display = "flex";
        buttonContainer.style.justifyContent = "space-between";
        buttonContainer.style.width = "100%";
        buttonContainer.style.gap = "5px";
        
        // Adicionando os botões ao contêiner
        buttonContainer.appendChild(modifyButton);
        buttonContainer.appendChild(deleteButton);

        productDisplay.appendChild(img);
        productDisplay.appendChild(name);
        productDisplay.appendChild(description);
        productDisplay.appendChild(infoContainer);
        productDisplay.appendChild(buttonContainer);

        productContainer.appendChild(productDisplay);

        saveProductToLocalStorage(productName, productDescription, productPrice, productCategory, productUnit, e.target.result);
    }
    reader.readAsDataURL(productImage);
}

function updateProduct(productDisplay, productName, productDescription, productPrice, productCategory, productUnit, productImage) {
    productDisplay.querySelector("h3").innerText = productName;
    productDisplay.querySelector("p").innerText = productDescription;
    
    // Atualizar informações no contêiner de informações
    const infoContainer = productDisplay.querySelector(".product-info") || document.createElement("div");
    
    if (!productDisplay.querySelector(".product-info")) {
        // Se não existir o contêiner de informações, criar um novo
        infoContainer.className = "product-info";
        
        // Mover os elementos existentes para o novo contêiner
        const price = productDisplay.querySelector("p:nth-of-type(2)");
        const category = productDisplay.querySelector("p:nth-of-type(3)");
        const unit = productDisplay.querySelector("p:nth-of-type(4)");
        
        if (price) {
            price.className = "product-price";
            price.innerText = `Preço: ${productPrice}`;
            infoContainer.appendChild(price);
        } else {
            const newPrice = document.createElement("p");
            newPrice.className = "product-price";
            newPrice.innerText = `Preço: ${productPrice}`;
            infoContainer.appendChild(newPrice);
        }
        
        if (category) {
            category.className = "product-category";
            category.innerText = `Categoria: ${productCategory}`;
            infoContainer.appendChild(category);
        } else {
            const newCategory = document.createElement("p");
            newCategory.className = "product-category";
            newCategory.innerText = `Categoria: ${productCategory}`;
            infoContainer.appendChild(newCategory);
        }
        
        if (unit) {
            unit.className = "product-unit";
            unit.innerText = `Medida: ${productUnit}`;
            infoContainer.appendChild(unit);
        } else {
            const newUnit = document.createElement("p");
            newUnit.className = "product-unit";
            newUnit.innerText = `Medida: ${productUnit}`;
            infoContainer.appendChild(newUnit);
        }
        
        // Inserir o contêiner antes do contêiner de botões
        const buttonContainer = productDisplay.querySelector("div[style*='display: flex']");
        productDisplay.insertBefore(infoContainer, buttonContainer);
    } else {
        // Se já existir o contêiner, atualizar os elementos
        const price = infoContainer.querySelector(".product-price");
        const category = infoContainer.querySelector(".product-category");
        const unit = infoContainer.querySelector(".product-unit");
        
        if (price) price.innerText = `Preço: ${productPrice}`;
        if (category) category.innerText = `Categoria: ${productCategory}`;
        if (unit) unit.innerText = `Medida: ${productUnit}`;
    }

    if (productImage) {
        const reader = new FileReader();
        reader.onload = function(e) {
            productDisplay.querySelector("img").src = e.target.result;
            updateProductInLocalStorage(productDisplay, productName, productDescription, productPrice, productCategory, productUnit, e.target.result);
        }
        reader.readAsDataURL(productImage);
    } else {
        updateProductInLocalStorage(productDisplay, productName, productDescription, productPrice, productCategory, productUnit);
    }
}

function modifyProduct(productDisplay) {
    currentProduct = productDisplay;

    const productName = productDisplay.querySelector("h3").innerText;
    const productDescription = productDisplay.querySelector("p").innerText;
    
    let productPrice = "";
    let productCategory = "";
    let productUnit = "";
    
    // Verificar se existe o contêiner de informações
    const infoContainer = productDisplay.querySelector(".product-info");
    if (infoContainer) {
        const priceElement = infoContainer.querySelector(".product-price");
        const categoryElement = infoContainer.querySelector(".product-category");
        const unitElement = infoContainer.querySelector(".product-unit");
        
        if (priceElement) productPrice = priceElement.innerText.replace('Preço: ', '');
        if (categoryElement) productCategory = categoryElement.innerText.replace('Categoria: ', '');
        if (unitElement) productUnit = unitElement.innerText.replace('Medida: ', '');
    } else {
        // Fallback para o formato antigo
        productPrice = productDisplay.querySelector("p:nth-of-type(2)").innerText.replace('Preço: ', '');
        productCategory = productDisplay.querySelector("p:nth-of-type(3)").innerText.replace('Categoria: ', '');
        productUnit = productDisplay.querySelector("p:nth-of-type(4)")?.innerText.replace('Medida: ', '') || "Unidade";
    }

    document.getElementById("productName").value = productName;
    document.getElementById("productDescription").value = productDescription;
    document.getElementById("productPrice").value = productPrice;
    document.getElementById("productCategory").value = productCategory;
    document.getElementById("productUnit").value = productUnit;

    openForm();
}

function deleteProduct(productDisplay) {
    if (confirm("Tem certeza que deseja excluir este produto?")) {
        const index = Array.from(productDisplay.parentNode.children).indexOf(productDisplay);
        productDisplay.remove();
        deleteProductFromLocalStorage(index);
    }
}

function saveProductToLocalStorage(name, description, price, category, unit, image) {
    const products = JSON.parse(localStorage.getItem('products')) || [];
    products.push({ name, description, price, category, unit, image });
    localStorage.setItem('products', JSON.stringify(products));
}

function updateProductInLocalStorage(productDisplay, name, description, price, category, unit, image) {
    const products = JSON.parse(localStorage.getItem('products')) || [];
    const index = Array.from(productDisplay.parentNode.children).indexOf(productDisplay);
    products[index] = { 
        name, 
        description, 
        price, 
        category, 
        unit, 
        image: image || products[index].image 
    };
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

        // Criar contêiner de informações
        const infoContainer = document.createElement("div");
        infoContainer.className = "product-info";

        const price = document.createElement("p");
        price.className = "product-price";
        price.innerText = `Preço: ${product.price}`;

        const category = document.createElement("p");
        category.className = "product-category";
        category.innerText = `Categoria: ${product.category}`;
        
        const unit = document.createElement("p");
        unit.className = "product-unit";
        unit.innerText = `Medida: ${product.unit || "Unidade"}`;

        // Adicionar informações ao contêiner
        infoContainer.appendChild(price);
        infoContainer.appendChild(category);
        infoContainer.appendChild(unit);

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

        // Criando um contêiner para os botões
        const buttonContainer = document.createElement("div");
        buttonContainer.style.display = "flex";
        buttonContainer.style.justifyContent = "space-between";
        buttonContainer.style.width = "100%";
        buttonContainer.style.gap = "5px";
        
        // Adicionando os botões ao contêiner
        buttonContainer.appendChild(modifyButton);
        buttonContainer.appendChild(deleteButton);

        productDisplay.appendChild(img);
        productDisplay.appendChild(name);
        productDisplay.appendChild(description);
        productDisplay.appendChild(infoContainer);
        productDisplay.appendChild(buttonContainer);

        productContainer.appendChild(productDisplay);
    });
}

function openCategoryManager() {
    document.getElementById("categoryManager").classList.add("active");
    document.getElementById("formOverlay").classList.add("active");
    loadCategories();
}

function closeCategoryManager() {
    document.getElementById("categoryManager").classList.remove("active");
    document.getElementById("formOverlay").classList.remove("active");
}

function addCategory(event) {
    event.preventDefault();
    const categoryName = document.getElementById("categoryName").value.trim();
    if (!categoryName) return;

    const categories = JSON.parse(localStorage.getItem("categories")) || [];
    categories.push(categoryName);
    localStorage.setItem("categories", JSON.stringify(categories));

    document.getElementById("categoryName").value = "";
    loadCategories();
}

function deleteCategory(index) {
    const categories = JSON.parse(localStorage.getItem("categories")) || [];
    categories.splice(index, 1);
    localStorage.setItem("categories", JSON.stringify(categories));
    loadCategories();
}

function loadCategories() {
    const categories = JSON.parse(localStorage.getItem("categories")) || [];
    const categoryList = document.getElementById("categories");
    categoryList.innerHTML = "";

    categories.forEach((category, index) => {
        const li = document.createElement("li");
        
        const categoryText = document.createElement("span");
        categoryText.textContent = category;
        li.appendChild(categoryText);

        const deleteButton = document.createElement("button");
        deleteButton.textContent = "X";
        deleteButton.className = "btn delete";
        deleteButton.onclick = () => deleteCategory(index);

        li.appendChild(deleteButton);
        categoryList.appendChild(li);
    });
}

function closeAllPopups() {
    closeForm();
    closeCategoryManager();
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


