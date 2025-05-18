<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/PRIMUS/CSS/styleNavebar.css">
    <link rel="stylesheet" href="../CSS/styleRodape.css">
    <link rel="stylesheet" href="../CSS/styleEdicao.css">
    <link rel="shortcut icon" href="../IMGS/favicon.ico" type="image/x-icon">
    <title>Edição | Primu's Auto Peças</title>
</head>
<body>
    <?php
    session_start();
    include '../PHP/navebar.php';
    ?>
    
    <main>
        <button class="criar-btn" onclick="openForm()">Editar ✏️</button>
        <div class="center-content">
            <button class="criar-btn" onclick="openForm()">Editar ✏️</button>
        </div>
        <div id="productForm" class="form-popup">
            <form class="form-container" onsubmit="saveProduct(event)">
                <h2>Adicionar Produto</h2>

                <label for="productName"><b>Nome do produto</b></label>
                <input type="text" id="productName" name="productName" required>

                <label for="productDescription"><b>Descrição do produto</b></label>
                <textarea id="productDescription" name="productDescription" required></textarea>

                <label for="productPrice"><b>Preço do produto</b></label>
                <input type="text" id="productPrice" name="productPrice" required>

                <label for="productImage"><b>Adicione uma imagem do produto</b></label>
                <input type="file" id="productImage" name="productImage" accept="image/*">

                <button type="submit" class="btn">Adicionar</button>
                <button type="button" class="btn cancel" onclick="closeForm()">Fechar</button>
            </form>
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