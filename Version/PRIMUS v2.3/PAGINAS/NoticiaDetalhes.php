<?php
include '../PHP/conexao.php';

// Obtém o ID da notícia da URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Consulta SQL para buscar os detalhes da notícia e o nome do autor
$sql = "SELECT * FROM noticias WHERE id = ?";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Erro na preparação da consulta: " . $conn->error);
}
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $noticia = $result->fetch_assoc();
} else {
    echo "Notícia não encontrada.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/PRIMUS/CSS/styleNavebar.css">
    <link rel="stylesheet" href="../CSS/styleRodape.css">
    <link rel="stylesheet" href="../CSS/styleDetalhes.css">
    <link rel="shortcut icon" href="../IMGS/favicon.ico" type="image/x-icon">
    <title><?php echo htmlspecialchars($noticia['titulo']); ?> | Primu's Auto Peças</title>
</head>
<body>
    <?php 
        session_start();
        include '../PHP/navebar.php'; 
    ?>

    <img src="../IMGS/loja.png" alt="Loja" class="ImgNoticias">
    <h1 class="TextoNotImg">Notícias</h1>

    <div class="Voltar">
        <a href="./TelaInicial.php"><i class="fa-solid fa-house-chimney"></i>&nbsp;&nbsp;Tela Inicial</a>
        <p><i class="fa-solid fa-greater-than"></i></p>
        <a href="./Noticias.php">Noticias</a>
        <p><i class="fa-solid fa-greater-than"></i></p>
        <p style="color:#666; padding-left: 15px"><?php echo htmlspecialchars($noticia['titulo'] ?? 'Título não disponível'); ?></p>
    </div>

    <div class="noticia-detalhes">
        <p class="noticia-data"><?php echo date('d/m/Y', strtotime($noticia['data_publicacao'])); ?></p>
        <h1 class="noticia-titulo"><?php echo htmlspecialchars($noticia['titulo'] ?? 'Título não disponível'); ?></h1>
        <p class="noticia-autor">Autor: <span><?php echo htmlspecialchars($noticia['nomeCompleto'] ?? ' Anônimo'); ?></span></p>
        <img src="../<?php echo htmlspecialchars($noticia['imagem']); ?>" alt="Imagem da notícia" class="noticia-img-detalhes">
        <p class="noticia-conteudo"><?php echo nl2br(htmlspecialchars($noticia['descricao'])); ?></p>
        <br>
        <hr>
    </div>

    <br><br>

    

    <?php include '../PHP/rodape.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/d3aca5478d.js" crossorigin="anonymous"></script>
</body>
</html>