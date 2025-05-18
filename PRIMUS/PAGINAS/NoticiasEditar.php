<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/PRIMUS/CSS/styleNavebar.css">
    <link rel="stylesheet" href="../CSS/styleRodape.css">
    <link rel="stylesheet" href="../CSS/styleEditarNoticias.css">
    <link rel="shortcut icon" href="../IMGS/favicon.ico" type="image/x-icon">
    <title>Editar Noticias | Primu's Auto Peças</title>
</head>
<body>
    <?php
    session_start();
    include '../PHP/navebar.php';
    ?>
    
    <div class="container-fluid" style="padding-top: 100px;">
        <div class="row align-items-center g-0">
            <div class="col-4">
                <div class="FundoForm">
                    <form action="../PHP/ProcessoNoticia.php" method="POST" enctype="multipart/form-data">

                    <button type="button" class="Voltar" onclick="window.location.href='/PRIMUS/PAGINAS/Noticias.php';"><i class="fa-solid fa-backward-step"></i></button>

                    <h1>Criar ou Editar Notícia</h1>
                    <p>Preencha os campos abaixo para criar ou editar uma notícia.</p>

                    <label for="titulo">&nbsp;<i class="fa-solid fa-pen"></i>&nbsp;Título:</label>
                    <input type="text" id="titulo" name="titulo" required placeholder="A Importância do Óleo de Motor para a Vida Útil do Seu Carro">

                    <div class="container">
                        <div class="row justify-content-center align-items-end g-4">
                            <div class="col-4 d-flex flex-column align-items-center">
                                <label class="nowrap-label"><i class="fa fa-image"></i> Selecione a <br>Imagem da capa:</label>
                                <div style="position: relative; width: 100%;">
                                    <input type="file" id="imagemCapa" name="imagemCapa" accept="image/*" required>
                                    <label class="BotaoImagem" for="imagemCapa" id="btnImagemCapa"></label>
                                </div>  
                            </div>
                            <div class="col-4 d-flex flex-column align-items-center">
                                <label for="categoria"><i class="fa-solid fa-tags"></i> Categoria:</label>
                                <input type="categoria" id="categoria" name="categoria" placeholder="Dica" required>
                            </div>
                            <div class="col-4 d-flex flex-column align-items-center">
                                <label class="nowrap-label"><i class="fa fa-image"></i> Selecione a <br>imagem da notícia:</label>
                                <div style="position: relative; width: 100%;">
                                    <input type="file" id="imagem" name="imagem" accept="image/*" required>
                                    <label class="BotaoImagem" id="btnImagem"></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br>
                    <label for="texto">&nbsp;<i class="fa-solid fa-file-lines"></i>&nbsp;Texto:</label>
                    <br>
                    <textarea id="texto" name="texto" required placeholder="Manter o óleo do motor em dia é essencial para garantir o bom funcionamento do seu veículo. O óleo lubrifica as peças internas do motor, reduz o atrito e ajuda a evitar o desgaste prematuro, além de contribuir para a limpeza e refrigeração do sistema.
                    &#10;Para escolher o óleo certo, é importante verificar as recomendações do fabricante no manual do veículo, levando em consideração fatores como a viscosidade e a composição (sintético, semissintético ou mineral).
                    &#10;Lembre-se de verificar o nível de óleo regularmente e seguir o intervalo de troca recomendado para garantir o máximo desempenho e vida útil do seu motor."></textarea>

                    <div class="MidButton">
                        <button type="submit"><i class="fa-solid fa-upload"></i>&nbsp;Publicar</button>
                    </div>
                    </form>
                </div>
            </div>
            
            <div class="col-4 d-grid justify-content-center align-items-center">
                <div class="FundoMid">
                    <p>Pré-visualização da Notícia<br>Veja como ficará no site</p>
                </div>
                <img src="../IMGS/ImagemExemploFundo.png" alt="ImagemExemplo">
            </div>

            <div class="col-4">
                <div class="FundoTexto">
                    <h2>Como Criar uma Notícia</h2>
                    <p>
                        Adicione e edite conteúdos para a aba de notícias do seu site. Mantenha seus leitores informados com as últimas novidades e eventos importantes.
                    </p>

                    <ol>
                        <li><strong>Título:</strong> Insira um título claro e objetivo que descreva o tema principal da notícia.</li>
                        <li><strong>Imagem de Capa:</strong> Selecione uma imagem que represente bem o conteúdo da notícia e chame a atenção dos leitores.</li>
                        <li><strong>Categoria:</strong> Defina a categoria da notícia para facilitar a organização e a navegação no site.</li>
                        <li><strong>Imagem da Notícia:</strong> Escolha uma imagem adicional para ilustrar os detalhes da notícia, se necessário.</li>
                        <li><strong>Texto:</strong> Escreva o corpo da notícia com todas as informações relevantes, estruturando bem os parágrafos para facilitar a leitura.</li>
                        <li><strong>Publicar:</strong> Após preencher todos os campos, clique no botão Publicar para tornar a notícia visível no site.</li>
                    </ol>

                     <p>
                        <strong>Obs:</strong> Formato recomendado: JPG ou PNG. <br>Tamanho ideal: 1200x675 px (mínimo 800x450 px) 
                    </p>

                    <p style="margin:0;">Revise seu conteúdo para garantir que ele está claro e completo antes de publicar.</p>

                </div>
            </div>
        </div>
    </div>

    

    <br><br>

    <script>
    document.getElementById('btnImagemCapa').onclick = function() {
        document.getElementById('imagemCapa').click();
    };
    document.getElementById('btnImagem').onclick = function() {
        document.getElementById('imagem').click();
    };
    document.getElementById('imagemCapa').addEventListener('change', function(){
        document.getElementById('btnImagemCapa').textContent = this.files.length ? this.files[0].name : 'Selecione a imagem';
    });
    document.getElementById('imagem').addEventListener('change', function(){
        document.getElementById('btnImagem').textContent = this.files.length ? this.files[0].name : 'Selecione a imagem';
    });

    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/d3aca5478d.js" crossorigin="anonymous"></script>   
</body>
</html>