<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/PRIMUS/CSS/styleNavebar.css">
    <link rel="stylesheet" href="../CSS/styleRodape.css">
    <link rel="stylesheet" href="../CSS/styleLoca.css">
    <link rel="shortcut icon" href="../IMGS/favicon.ico" type="image/x-icon">
    <title>Localização | Primu's Auto Peças</title>
</head>
<body>
    <?php
    session_start();
    include '../PHP/navebar.php';
    ?>
    
    <main>

        <div><img src="../IMGS/Loja.png" alt="Loja" class="ImgLocalizacao">
        <h2>Localização</h2>
        </div>

        <br><br><br><br>

        <div class="Back">
            <h1>Primu's Auto Peças</h1>
            <br>
            <h3>Somos uma empresa operando por 10 anos no mercado de Auto Peças, <br>com mais de 5.000 itens no estoque e parceria com 100 fornecedores.</h3>
                
            <br><br>
    
            <div class="container">
                <div class="row">
    
                    <div class="Horario col-lg-6 col-12">
                        <p class="TextoHora">HORÁRIO DE ATENDIMENTO</p>
                        <br>
                        <div class="Tabela">
                            <table>
                                <tr class="cinza">
                                    <td>Domingo</td>
                                    <td>Fechado</td>
                                </tr>
                                <tr>
                                    <td>Segunda-Feira</td>
                                    <td><i class="fa-regular fa-clock"></i>&nbsp;&nbsp;  08:00 - 18:00</td>
                                </tr>
                                <tr>
                                    <td>Terça-Feira</td>
                                    <td><i class="fa-regular fa-clock"></i>&nbsp;&nbsp;  08:00 - 18:00</td>
                                </tr>
                                <tr>
                                    <td>Quarta-feira</td>
                                    <td><i class="fa-regular fa-clock"></i>&nbsp;&nbsp;  08:00 - 18:00</td>
                                </tr>
                                <tr>
                                    <td>Quinta-feira</td>
                                    <td><i class="fa-regular fa-clock"></i>&nbsp;&nbsp;  08:00 - 18:00</td>
                                </tr>
                                <tr>
                                    <td>Sexta-feira</td>
                                    <td><i class="fa-regular fa-clock"></i>&nbsp;&nbsp;  08:00 - 18:00</td>
                                </tr>
                                <tr>
                                    <td>Sábado</td>
                                    <td><i class="fa-regular fa-clock"></i>&nbsp;&nbsp;  08:00 - 13:00</td>
                                </tr>
                            </table>
                        </div>
                    </div>
    
                    <div class="Caixa col-lg-6 col-12">
                        <div class="BordaP"><h5>ATIBAIA-SP</h5></div>
                            <div class="FundoCaixa">
                                <img src="../IMGS/PrimusEntrada.jpeg" alt="PrimusDi">
                            <br>
                            <div class="TextosPrimus">
                                <div class="Endereco">
                                    <p><i class="fa-solid fa-location-dot"></i>&nbsp; ENDEREÇO</p>
                                    <br>
                                    <h4>Atibaia - SP</h4>
                                    <h4>Av. Imperial, 1576</h4>
                                    <h4>Jardim Imperial</h4>
                                    <h4>CEP 12950-000</h4>
                                </div>
                                
                                <div class="Telefones">
                                    <p><i class="fa-solid fa-phone"></i>&nbsp; TELEFONES</p>
                                    <br>
                                    <h6> +55 (11) 2493-4441</h6>
                                    <h6> +55 (11) 4260-0669</h6>
                                    <h6> +55 (11) 99824-2660</h6>
                                    <h6> +55 (11) 96913-7461</h6>
                                </div>
                            </div>
                        </div>
                    </div>
    
                </div>
            </div>

        </div>

        <br><br><br>
        
        <hr style="border: 1px solid black; width: 70%; margin: 0 auto;">

        <br><br><br><br>

        <div class="container">
            <div class="row">
                <div class="backGratu"></div>
                <div class="backGratu"></div>
                <div class="backGratu"></div>
            </div>
        </div>


        <div class="fundoMid">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3668.8946484393723!2d-46.586414488365904!3d-23.137525779006204!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cec1659951a8e7%3A0x30bfa596186f1129!2sPrimu&#39;s%20auto%20pe%C3%A7as!5e0!3m2!1spt-BR!2sbr!4v1732241803098!5m2!1spt-BR!2sbr" 
            width="950" height="600" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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

    <script src="../JAVASCRIPT/jsLoca.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/d3aca5478d.js" crossorigin="anonymous"></script>
</body>
</html>