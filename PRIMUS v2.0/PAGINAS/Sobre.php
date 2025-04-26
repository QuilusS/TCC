<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/PRIMUS/CSS/styleNavebar.css">
    <link rel="stylesheet" href="../CSS/styleRodape.css">
    <link rel="stylesheet" href="../CSS/styleSobre.css">
    <link rel="shortcut icon" href="../IMGS/favicon.ico" type="image/x-icon">
    <title>Sobre | Primu's Auto Peças</title>
</head>
<body>
    <?php
    session_start();
    include '../PHP/navebar.php';
    ?>

    <main>
        <div><img src="../IMGS/loja.png" alt="Loja" class="ImgSobre">
        <h2>A Empresa</h2>
        </div>
        <br><br>
        <hr style="width: 100%; margin: 0 auto;">
        <br><br><br>
        <br><br>
        <div class="container">
            <div class="row g-5">
                <div class="Secao1 col-lg-6 col-12">
                    <h1>PRIMU'S<br>AUTO PEÇAS</h1>
                    <h4 id="Mercado">ORIGEM E TRAJETÓRIA</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta reprehenderit error quas nihil magnam aliquid, tempora commodi? Quisquam ab quidem aut tempora 
                        ratione ea odio. Earum repudiandae voluptatibus quas tempore?Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis, eaque nemo. Suscipit reiciendis 
                        consequatur veritatis cupiditate quis nemo deleniti aperiam dolorum velit, nisi error quam, ut in animi, sapiente magni!
                    </p>
                </div>

                <div class="Secao2 col-lg-6 col-12">
                    <img src="../IMGS/Primus antiga.jpg" alt="FotoPrimusAntiga" class="img-fluid" onclick="ImagemMaior()">
                </div>

                <div id="EfeitoOverlay" class="overlay">
                    <img src="../IMGS/Primus antiga.jpg" alt="FotoPrimusAntiga" class="img-fluid Tamanhos">
                </div>
                
            </div>

            <br>

            <div class="row g-5">
                <div class="Secao1 col-lg-6 col-12">
                    <h1>AGENCIA<br>MERCADO LIVRE</h1>
                    <h4>NOSSA OPERAÇÃO NO <br>MERCADO LIVRE</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta reprehenderit error quas nihil magnam aliquid, tempora commodi? Quisquam ab quidem aut tempora 
                        ratione ea odio. Earum repudiandae voluptatibus quas tempore?Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis, eaque nemo. Suscipit reiciendis 
                        consequatur veritatis.
                    </p>
                </div>

                <div class="Secao2 col-lg-6 col-12" >
                    <img src="../IMGS/ML.jpeg" alt="MercadoLivre" class="img-fluid" onclick="ImagemMaior2()">
                </div>
                
                <div id="EfeitoOverlay2" class="overlay">
                    <img src="../IMGS/ML.jpeg" alt="MercadoLivre" class="img-fluid Tamanhos">
                </div>

            </div>

            <br>

            <div class="row g-5">
                <div class="Secao1 col-lg-6 col-12">
                    <h1>NOSSA EQUIPE</h1>
                    <h4>QUADRO DA FAMÍLIA PRIMU'S</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta reprehenderit error quas nihil magnam aliquid, tempora commodi? Quisquam ab quidem aut tempora 
                        ratione ea odio. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nostrum porro modi architecto hic. Nulla iure incidunt aliquam dolore ut reiciendis! 
                        Possimus odio explicabo quam nostrum tenetur cumque temporibus quia ratione. Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                    </p>
                </div>

                <div class="Secao2 col-lg-6 col-12">
                    <img src="../IMGS/Equipe Primu's Cortada.png" alt="Equipe" class="img-fluid" onclick="ImagemMaior3()">
                </div>

                <div id="EfeitoOverlay3" class="overlay">
                    <img src="../IMGS/Equipe Primu's.jpeg" alt="Equipe" class="img-fluid Tamanhos">
                </div>
                
            </div>

            <br>

            <div class="row g-5">
                <div class="Secao1 col-lg-6 col-12">
                    <h1>COMPROMETIMENDO</h1>
                    <h4>RESPONSABILIDADES E DEVERES</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta reprehenderit error quas nihil magnam aliquid, tempora commodi? Quisquam ab quidem aut tempora 
                        ratione ea odio. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nostrum porro modi architecto hic. Nulla iure incidunt aliquam dolore ut reiciendis! 
                        Possimus odio explicabo quam nostrum tenetur cumque temporibus quia ratione. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam neque magni culpa 
                        nihil vel illo modi aspernatur eveniet, placeat pariatur possimus facilis error magnam.
                    </p>
                </div>

                <div class="Secao2 col-lg-6 col-12">
                    <img src="../IMGS/FrentePrimus.jpg" alt="FrentePrimus" class="img-fluid" onclick="ImagemMaior4()">
                </div>

                <div id="EfeitoOverlay4" class="overlay">
                    <img src="../IMGS/FrentePrimus.jpg" alt="FrentePrimus" class="img-fluid Tamanhos">
                </div>
                
            </div>

        </div>

        <br><br><br><br>

        <div class="EfeitoSubindo" id="Subindo">
            <i class="fa-solid fa-arrow-up fa-beat"></i>
            <button onclick="Subir()"><img src="../IMGS/roda.png" alt="roda"></button>
        </div>
    </main>

    <?php
    include '../PHP/rodape.php';
    ?>

    <script src="../JAVASCRIPT/jsSobre.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/d3aca5478d.js" crossorigin="anonymous"></script>
</body>
</html>