<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/PRIMUS/CSS/styleNavebar.css">
    <link rel="stylesheet" href="../CSS/styleRodape.css">
    <link rel="stylesheet" href="../CSS/styleTelaIni.css">
    <link rel="shortcut icon" href="../IMGS/favicon.ico" type="image/x-icon">
    <title>Início | Primu's Auto Peças</title>
</head>
<body>
    <?php
    session_start();
    include '../PHP/navebar.php';
    ?>
    
    <main>
        <img src="../IMGS/PrimusEntrada.jpeg" alt="entrada" style="width: 100%; height:650px; border-bottom: 30px solid #E6E6E6; padding-top: 70px;">

        <hr>
        
        <br><br>
        
        <div class="Empresa hidden4">
            <div class="empresa-row">
                <div class="empresa-img hidden2"></div>
                <div class="empresa-texto">
                    <h1 class="hidden">Sobre Empresa</h1>
                    <h2 class="hidden">
                        <span style="color:white;"><strong>Primus Auto Peças</strong></span>, uma empresa que coloca a sua satisfação em primeiro lugar, oferecendo peças de alta
                        qualidade e um atendimento excelente.
                        <br><br>
                        Desde 2015, trabalhando no fornecimento de peças para motor, suspensão, direção, freio, câmbio e muito mais para seu 
                        carro, garantindo o desempenho e a confiaça do seu veículo.
                        <br><br>    
                        Confie em quem entende do assunto. Confie na <span style="color:white;font-size: 1.2rem;"><strong>Primu's Auto Peças.</strong></span>
                        <br><br>
                        <input type="button" value="Saiba mais" class="btnPrima" onclick="location.href='/PRIMUS/PAGINAS/Sobre.php'">
                    </h2>
                </div>
            </div>
        </div>

        <br><br><br>
        <div class="Principais">
            <div class="container">
                
                <div class="row g-0">
                    <div class="col-6 hidden4 back"  style="background-color: white;">
                        <br>
                        <h3 class="hidden3">Agencia<br><span>Mercado Livre</span></h3>
                        <br><br>
                        <h4 class="hidden2">Somos também uma agência autorizada <br>do <strong><span>Mercado Livre</span></strong>. 
                            <br><br>
                            Retire, devolva ou envie seus produtos com<br> total facilidade
                            em alguns minutos!!<br><br><strong>Estamos esperamos por você ^^</strong></span>
                        </h4>
                        <br>
                    </div>
                    <div class="col-6 hidden"><img src="../IMGS/MLNovo.png" alt="Foto De Frente" class="SeguImg"></div>
                </div>
    
                <br><br>
    
                <div class="row g-0">
                    <div class="col-6 hidden2"><img src="../IMGS/EquipeSorrindo.png" alt="Foto De Frente" class="TerciImg" ></div>
                    
                    <div class="col-6 hidden4 back" style="background-color: white;">
                        <br><br>
                        <h5 class="hidden3">Atendimento</h5>
                        <br>
                        <h6 class="hidden">Tem alguma dúvida ou precisa de assistência?<br><strong>Entre em contato conosco!</strong><br>
                            Estamos aqui para esclarecer suas perguntas e <br>fornecer o suporte que você precisa.
                        </h6>
                        <br>
                        <input type="button" value="Fale Conosco" class="btnSegu" onclick="location.href='/PRIMUS/PAGINAS/Contato.php'">
                    </div>
                </div>
            </div>
        </div>
        <br>    
        <br><br>
        <hr style="width: 1200px; margin: 0 auto; border: 1px solid;">
        <br><br>

        <p class="Trabalho">TRABALHAMOS COM AS<br><strong><span>MELHORES</span></strong> MARCAS</p>

        <br><br>

            <div class="Allogos">
                <div class="container">
                    <div class="row g-5 justify-content-center align-items-center">
                        <div class="TamanhosIni"><img src="../IMGS/Logos/Tecfil1.png" alt="Tecfil"></div>
                        <div class="TamanhosIni"><img src="../IMGS/Logos/Continental1.png" alt="Continental"></div>
                        <div class="TamanhosIni"><img src="../IMGS/Logos/Perfect.png" alt="Perfect"></div>
                        <div class="TamanhosIni"><img src="../IMGS/Logos/Driveway2.png" alt="Driveway"></div>
                        <div class="TamanhosIni"><img src="../IMGS/Logos/Skf2.png" alt="Skf"></div>
                        <div class="TamanhosIni"><img src="../IMGS/Logos/Taranto.png" alt="Taranto"></div>
                        <div class="TamanhosIni"><img src="../IMGS/Logos/Mahle2.png" alt="Mahle"></div>
                        <div class="TamanhosIni"><img src="../IMGS/Logos/3rh01.png" alt="3rh0"></div>
                        <div class="TamanhosIni"><img src="../IMGS/Logos/VAleo.png" alt="VAleo"></div>
                        <div class="TamanhosIni"><img src="../IMGS/Logos/MagnetiMarelli2.png" alt="MagnetiMarelli"></div>
                        <div class="TamanhosIni"><img src="../IMGS/Logos/Ngk2.png" alt="Ngk"></div>
                        <div class="TamanhosIni"><img src="../IMGS/Logos/Anroi.png" alt="Ngk"></div>
                    </div>
                </div>
            </div>
        <br>

        <p style="text-align: center; font-family: MontserratBold; font-size: 22px; color: #202a81;">E muito mais!</p><br><br>

        <div class="FundoAva">
            <br><br>
            <p class="Feedb">Feedback dos nossos clientes no Google</p>
            <br>
            
            <div class="fundoCarossel">
                <div id="carossel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                                <img src="../IMGS/Avaliações/1.png" class="w-100 d-block" style="height: 150px;" alt="Avaliaçao1">
                        </div>
                        <div class="carousel-item">
                                <img src="../IMGS/Avaliações/2.png" class="w-100 d-block" style="height: 150px;" alt="Avaliaçao2">
                        </div>
                        <div class="carousel-item">
                                <img src="../IMGS/Avaliações/3.png" class="w-100 d-block" style="height: 150px;" alt="Avaliaçao3">
                        </div>
                        <div class="carousel-item">
                                <img src="../IMGS/Avaliações/4.png" class="w-100 d-block" style="height: 150px;" alt="Avaliaçao4">
                        </div>
                        <div class="carousel-item">
                                <img src="../IMGS/Avaliações/5.png" class="w-100 d-block" style="height: 150px;" alt="Avaliaçao5">
                        </div>
                        <div class="carousel-item">
                                <img src="../IMGS/Avaliações/6.png" class="w-100 d-block" style="height: 150px;" alt="Avaliaçao6">
                        </div>
                        <div class="carousel-item">
                                <img src="../IMGS/Avaliações/7.png" class="w-100 d-block" style="height: 150px;" alt="Avaliaçao7">
                        </div>
                        <div class="carousel-item">
                                <img src="../IMGS/Avaliações/8.png" class="w-100 d-block" style="height: 150px;" alt="Avaliaçao8">
                        </div>
                        <div class="carousel-item">
                                <img src="../IMGS/Avaliações/9.png" class="w-100 d-block" style="height: 150px;" alt="Avaliaçao9">
                        </div>
                        <div class="carousel-item">
                                <img src="../IMGS/Avaliações/10.png" class="w-100 d-block" style="height: 150px;" alt="Avaliaçao10">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carossel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Próximo</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carossel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Próximo</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="EfeitoSubindo" id="Subindo">
            <i class="fa-solid fa-arrow-up fa-beat"></i>
            <button onclick="Subir()"><img src="../IMGS/roda.png" alt="roda"></button>
        </div>
    </main>

    <?php
    include '../PHP/rodape.php';
    ?>

    <script src="../JAVASCRIPT/jsTelaIni.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/d3aca5478d.js" crossorigin="anonymous"></script>
</body>
</html>