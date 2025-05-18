<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/PRIMUS/CSS/styleNavebar.css">
    <link rel="stylesheet" href="../CSS/styleRodape.css">
    <link rel="stylesheet" href="../CSS/styleEdicao.css">
    <link rel="shortcut icon" href="../IMGS/favicon.ico" type="image/x-icon">
    <title>Edição dos Produtos| Primu's Auto Peças</title>
</head>
<body>
    <?php
    session_start();
    include '../PHP/navebar.php';
    ?>
    
    <main>
    <div class="button-group">
            <button class="criar-btn" onclick="openForm()">Editar ✏️</button>
            <button class="gerenciar-categorias-btn" onclick="openCategoryManager()">Gerenciar Categorias</button>
        </div>
        <div id="productForm" class="form-popup">
            <form class="form-container wide-form" onsubmit="saveProduct(event)">
                <h2>Adicionar Produto</h2>
                
                <div class="form-row">
                    <div class="form-column">
                        <label for="productName"><b>Nome do produto</b></label>
                        <input type="text" id="productName" name="productName" required>
                        
                        <label for="productPrice"><b>Preço do produto</b></label>
                        <input type="text" id="productPrice" name="productPrice" required>
                        
                        <label for="productCategory"><b>Categoria do produto</b></label>
                        <select id="productCategory" name="productCategory" required>
                            <!-- As categorias existentes serão carregadas aqui -->
                        </select>
                        
                        <label for="productImage"><b>Adicione uma imagem do produto</b></label>
                        <input type="file" id="productImage" name="productImage" accept="image/*">
                    </div>
                    
                    <div class="form-column">
                        <label for="productDescription"><b>Descrição do produto</b></label>
                        <textarea id="productDescription" name="productDescription" required></textarea>
                        
                        <label for="productUnit"><b>Medida do produto</b></label>
                        <select id="productUnit" name="productUnit" required>
                            <option value="Unidade">Unidade</option>
                            <option value="Par">Par</option>
                            <option value="Kit">Kit</option>
                            <option value="Jogo">Jogo</option>
                            <option value="Metros">Metros</option>
                            <option value="Litros">Litros</option>
                            <option value="Mililitros">Mililitros</option>
                            <option value="Centímetros">Centímetros</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-buttons">
                    <button type="submit" class="btn">Adicionar</button>
                    <button type="button" class="btn cancel" onclick="closeForm()">Fechar</button>
                </div>
            </form>
        </div>
        <!-- Modal para Gerenciar Categorias -->
        <div id="categoryManager" class="form-popup">
            <div class="category-layout">
                <div class="category-form-side">
                    <form class="form-container" onsubmit="addCategory(event)">
                        <h2>Gerenciar Categorias</h2>
                        <label for="categoryName"><b>Nova Categoria</b></label>
                        <input type="text" id="categoryName" name="categoryName" placeholder="Digite o nome da categoria" required>
                        <button type="submit" class="btn">Adicionar</button>
                        <button type="button" class="btn cancel" onclick="closeCategoryManager()">Fechar</button>
                    </form>
                </div>
                <div class="category-list-side">
                    <div id="categoryList">
                        <h3>Categorias Existentes</h3>
                        <ul id="categories">
                            <!-- Lista de categorias será carregada aqui -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="productContainer" class="product-container">
            <!-- Caixas de produto -->
        </div>
    </main>
    <script src="../JAVASCRIPT/jsEdicao.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/d3aca5478d.js" crossorigin="anonymous"></script>
</body>
</html>