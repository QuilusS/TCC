<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/PRIMUS/CSS/styleNavebar.css">
    <link rel="stylesheet" href="../CSS/styleRodape.css">
    <link rel="stylesheet" href="../CSS/styleNotic.css">
    <link rel="shortcut icon" href="../IMGS/favicon.ico" type="image/x-icon">
    <title>Notícias | Primu's Auto Peças</title>
</head>
<body>
    <?php
    session_start();
    include '../PHP/navebar.php';

    // Número de notícias por página
    $noticiasPorPagina = 6;

    // Página atual (obtida via GET)
    $paginaAtual = isset($_GET['pagina']) ? intval($_GET['pagina']) : 1;

    // Calcula o índice inicial para a consulta
    $indiceInicial = ($paginaAtual - 1) * $noticiasPorPagina;

    // Consulta para contar o total de notícias
    $sqlTotal = "SELECT COUNT(*) AS total FROM noticias";
    $resultTotal = $conn->query($sqlTotal);
    $totalNoticias = $resultTotal->fetch_assoc()['total'];

    // Calcula o número total de páginas
    $totalPaginas = ceil($totalNoticias / $noticiasPorPagina);

    // Consulta para buscar as notícias da página atual
    $sql = "SELECT * FROM noticias ORDER BY data_publicacao DESC LIMIT ?, ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $indiceInicial, $noticiasPorPagina);
    $stmt->execute();
    $result = $stmt->get_result();
    ?>

    <img src="../IMGS/AbaNoticias2.png" alt="Loja" class="ImgNoticias">

    <br><br>

    <?php if (isset($_SESSION['id_usuario'])): ?>
        <div class="btn-container">
            <input type="button" class="btnCriar" value="Criar Notícias" onclick="window.location.href='noticiasEditar.php'">
        </div>
    <?php endif; ?>

    <br><br>


    <h2></h2>

    <div class="noticias-container">
       <?php
        if ($result->num_rows > 0):
            $temNoticias = true;
            while ($noticia = $result->fetch_assoc()):
        ?>
            <a href="NoticiaDetalhes.php?id=<?php echo $noticia['id']; ?>" class="noticia-card" data-id="<?php echo $noticia['id']; ?>">
                <?php if (isset($_SESSION['id_usuario'])): ?>
                    <button type="button" class="btnExcluir" data-id="<?php echo $noticia['id']; ?>">
                        <i class="fas fa-trash"></i>
                    </button>
                    <button type="button" class="btnEditarNoticia" onclick="event.preventDefault(); window.location.href='NoticiasEditar.php?id=<?php echo $noticia['id']; ?>';">
                        <i class="fas fa-pen-to-square"></i>
                    </button>
                <?php endif; ?>
                <img src="../<?php echo htmlspecialchars($noticia['imagemCapa']); ?>" alt="Imagem da capa" class="noticia-img">
                <div class="noticia-conteudo">
                    <span class="categoria"><?php echo htmlspecialchars($noticia['categoria']); ?></span>

                    <h3 class="noticia-titulo">
                        <?php 
                        echo strlen($noticia['titulo']) > 70 
                            ? htmlspecialchars(substr($noticia['titulo'], 0, 70)) . '...' 
                            : htmlspecialchars($noticia['titulo']); 
                        ?>
                    </h3>
                    
                    <p class="noticia-descricao"><?php echo htmlspecialchars($noticia['descricao']); ?></p>
                    <p class="noticia-link">Ler mais</p>
                </div>
            </a>
    <?php
            endwhile;
        endif;
    ?>
    </div>

    <?php if (!$temNoticias): ?>
        <p class="AvisoNoticias">Sem notícias no momento. Volte em breve! ツ</p>
    <?php endif; ?>

    <div class="paginacao">
        <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
            <a href="?pagina=<?php echo $i; ?>" class="pagina-link <?php echo $i === $paginaAtual ? 'active' : ''; ?>">
                <?php echo $i; ?>
            </a>
        <?php endfor; ?>
    </div>
            
    <br><br><br><br><hr style="width: 80%; margin: 0 auto;border-bottom:1px solid black;"><br>

    
    <?php
    include '../PHP/rodape.php';
    ?>
    
    <script src="../JAVASCRIPT/jsNotic.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/d3aca5478d.js" crossorigin="anonymous"></script>
</body>
</html>