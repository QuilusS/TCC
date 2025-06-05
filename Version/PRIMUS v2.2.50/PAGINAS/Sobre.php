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
        <div class="flex">
            <img src="../IMGS/Empresa.png" alt="Loja" class="ImgSobre">
        </div>
        <br><br>
        <hr style="width: 100%; margin: 0 auto;">
        <br><br>
        <div class="container">
            <div class="row Prima g-5" >
                <div class="Secao1 col-lg-6 col-12">
                    <h1>PRIMU'S<br>AUTO PEÇAS</h1>
                    <h4 id="Mercado">ORIGEM E TRAJETÓRIA</h4>
                    <p>Fundada em 2015 na cidade de Atibaia, a Primus Auto Peças nasceu com o propósito de oferecer soluções de qualidade e 
                        confiança para o setor automotivo. Com uma trajetória marcada pelo comprometimento com o cliente e pelo 
                        conhecimento técnico do mercado, a Primus vem se consolidando como uma referência regional em peças automotivas.

                    </p>
                </div>

                <div class="Secao2 col-lg-6 col-12">
                    <img src="../IMGS/FrentePrimus.png" alt="FrentePrimus" class="img-fluid" onclick="ImagemMaior()">
                </div>

                <div id="EfeitoOverlay" class="overlay">
                    <img src="../IMGS/FrentePrimus.png" alt="FrentePrimus" class="img-fluid Tamanhos">
                </div>
                
            </div>

            <br>

            <div class="row g-5">
                <div class="Secao1 col-lg-6 col-12">
                    <h1>AGENCIA<br>MERCADO LIVRE</h1>
                    <h4>NOSSA OPERAÇÃO NO <br>MERCADO LIVRE</h4>
                    <p>Como agência do Mercado Livre, oferecemos retirada rápida e prática dos produtos, 
                        garantindo economia no frete e mais conveniência para os clientes. Ser uma agência oficial reforça nossa credibilidade, 
                        proporcionando uma experiência de compra segura e eficiente.
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
                    <p>Somos um grupo de 7 pessoas apaixonadas por oferecer um atendimento espetacular. 
                        Com dedicação e eficiência, garantimos que nossos serviços de entrega sejam ágeis e confiáveis. 
                        Estamos sempre prontos para atender você da melhor maneira possível, porque sua satisfação é a nossa prioridade!
                    </p>
                </div>

                <div class="Secao2 col-lg-6 col-12">
                    <img src="../IMGS/EquipePrimus.jpg" alt="EquipePrimus" class="img-fluid" onclick="ImagemMaior3()">
                </div>

                <div id="EfeitoOverlay3" class="overlay">
                    <img src="../IMGS/EquipePrimus.jpg" alt="EquipePrimus" class="img-fluid Tamanhos">
                </div>
                
            </div>

            <br>

            <div class="row g-5">
                <div class="Secao1 col-lg-6 col-12">
                    <h1>COMPROMETIMENDO</h1>
                    <h4>RESPONSABILIDADES E DEVERES</h4>
                    <p>Sob a direção dos sócios Caio Lucas Martins Guilherme e Rafael Augusto Pinheiro, a empresa mantém o foco no atendimento personalizado, 
                        na variedade de produtos e na excelência dos serviços prestados.<br><br>

                        A Primus Auto Peças acredita na construção de parcerias duradouras e no constante aperfeiçoamento para atender às 
                        necessidades de seus clientes com agilidade, transparência e profissionalismo.

                    </p>
                </div>

                <div class="Secao2 col-lg-6 col-12">
                    <img src="../IMGS/Prateleiras.jpg" alt="Prateleiras" class="img-fluid" onclick="ImagemMaior4()">
                </div>

                <div id="EfeitoOverlay4" class="overlay">
                    <img src="../IMGS/Prateleiras.jpg" alt="Prateleiras" class="img-fluid Tamanhos">
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