<?php
session_start();
include '../PHP/conexao.php'; // Inclui a conexão com o banco de dados

// Consulta para buscar os produtos
$sql = "SELECT id, nome, descricao, preco, imagem FROM produtos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/PRIMUS/CSS/styleNavebar.css">
    <link rel="stylesheet" href="../CSS/styleRodape.css">
    <link rel="stylesheet" href="../CSS/styleProdut.css">
    <link rel="shortcut icon" href="../IMGS/favicon.ico" type="image/x-icon">
    <title>Produtos | Primu's Auto Peças</title>
</head>
<body>
    <?php include '../PHP/navebar.php'; ?>

    <main>
        <div class="Barra">
            <input type="text" id="btnPesquisar" placeholder="Pesquisar por produtos..." class="MyInput">
        </div>
        <br><br>
        
        <div id="productContainer" class="product-container">
            <?php
            // Verifica se há produtos no banco de dados
            if ($result->num_rows > 0):
                while ($produto = $result->fetch_assoc()):
            ?>
                <div class="product-card">
                    <img src="../IMGS/Produtos/<?php echo htmlspecialchars($produto['imagem']); ?>" alt="<?php echo htmlspecialchars($produto['nome']); ?>" class="product-image">
                    <h3 class="product-name"><?php echo htmlspecialchars($produto['nome']); ?></h3>
                    <p class="product-description"><?php echo htmlspecialchars($produto['descricao']); ?></p>
                    <p class="product-price">R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></p>
                </div>
            <?php
                endwhile;
            else:
            ?>
                <p>Nenhum produto encontrado.</p>
            <?php endif; ?>
        </div>

        <div class="EfeitoSubindo" id="Subindo">
            <i class="fa-solid fa-arrow-up fa-beat"></i>
            <button onclick="Subir()"><img src="../IMGS/roda.png" alt="roda"></button>
        </div>
    </main>

    <script src="../JAVASCRIPT/jsProdut.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/d3aca5478d.js" crossorigin="anonymous"></script>
</body>
</html>