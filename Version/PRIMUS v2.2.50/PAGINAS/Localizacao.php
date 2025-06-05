<!DOCTYPE html>
<html lang="pt-br">
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

        <div><img src="../IMGS/AbaLocalizacao2.png" alt="Loja" class="ImgLocalizacao">
        </div>

        <br><br><br><br>

        <div class="container">
            <div class="row justify-content-center align-items-center display-flex text-center g-1">
                <div class="Horario col-lg-6 col-md-6 col-sm-12">
                    <p class="TextoHora">HORÁRIO DE ATENDIMENTO</p>
                    <br />
                    <div class="Tabela">
                        <table>
                            <tr class="cinza">
                                <td>Domingo</td>
                                <td>Fechado</td>
                            </tr>
                            <tr>
                                <td>Segunda-Feira</td>
                                <td><i class="fa-regular fa-clock"></i>&nbsp;&nbsp; 08:00 - 18:00</td>
                            </tr>
                            <tr>
                                <td>Terça-Feira</td>
                                <td><i class="fa-regular fa-clock"></i>&nbsp;&nbsp; 08:00 - 18:00</td>
                            </tr>
                            <tr>
                                <td>Quarta-feira</td>
                                <td><i class="fa-regular fa-clock"></i>&nbsp;&nbsp; 08:00 - 18:00</td>
                            </tr>
                            <tr>
                                <td>Quinta-feira</td>
                                <td><i class="fa-regular fa-clock"></i>&nbsp;&nbsp; 08:00 - 18:00</td>
                            </tr>
                            <tr>
                                <td>Sexta-feira</td>
                                <td><i class="fa-regular fa-clock"></i>&nbsp;&nbsp; 08:00 - 18:00</td>
                            </tr>
                            <tr>
                                <td>Sábado</td>
                                <td><i class="fa-regular fa-clock"></i>&nbsp;&nbsp; 08:00 - 13:00</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="Caixa col-lg-6 col-md-6 col-sm-12">
                    <div class="BordaP"><h5>ATIBAIA-SP</h5></div>
                    <div class="FundoCaixa">
                        <img src="../IMGS/PrimusEntrada.jpeg" alt="Primus" class="ImgCaixa"/>
                        <div class="Endereco">
                            <p><i class="fa-solid fa-location-dot" style="color:red;"></i>&nbsp; ENDEREÇO</p>
                            <h4></h4>
                            <h4>Av. Imperial, 1576 | Atibaia - SP</h4>
                            <h4 style="padding-bottom:20px">Jardim Imperial, CEP: 12950-000</h4>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
     
        <br><br>


        <h1>ESTAMOS ESPERANDO POR <span>VOCÊ!</span>&nbsp;<img src="../IMGS/mapa.png" alt="mapa"><br>USE O <span>MAPA</span> PARA PLANEJAR SUA VISITA</h1>
        
        <br><br><br>

        <div class="LocalizacaoIMG">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3668.8946484393723!2d-46.586414488365904!3d-23.137525779006204!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cec1659951a8e7%3A0x30bfa596186f1129!2sPrimu&#39;s%20auto%20pe%C3%A7as!5e0!3m2!1spt-BR!2sbr!4v1732241803098!5m2!1spt-BR!2sbr" 
            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <br><br><br>

        <hr style="border: 1px solid black; width: 70%; margin: 0 auto;">


        <p class="TextServi">SERVIÇOS <span>GRATUITOS</span></p>
        <p class="MiniTextServi">A Primu's Auto Peças vai além de vender produtos da mais alta qualidade. 
            Nosso compromisso está em apoiar nossos clientes em todas as suas etapas, desde a compra até o suporte pós-compra. 
            E, para tornar essa jornada ainda mais especial, oferecemos serviços gratuitos que reforçam nossa dedicação em garantir a melhor experiência. 
            Com suporte técnico especializado e assistência prática, estamos sempre ao seu lado para atender suas necessidades, tudo isso sem qualquer custo adicional.</p>

        <br><br><br>

        <div class="container">
            <div class="row justify-content-center align-items-center text-center g-4">

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="Servicos">
                        <img src="../IMGS/Icones/Bateria.png" alt="Bateria">
                        <p>Troca de baterias</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="Servicos">
                        <img src="../IMGS/Icones/lubrificante.png" alt="lubrificante">
                        <p>Troca de Óleo</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="Servicos">
                        <img src="../IMGS/Icones/Palhetas.png" alt="Palheta">
                        <p>Troca de Palhetas do <br>limpador de para-brisa</p>
                    </div>
                </div>

                <div class="w-100"></div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="Servicos">
                        <img src="../IMGS/Icones/AmortecedoresPortaMalas.png" alt="Amortecedor">
                        <p>Troca de Amortecedores do <br>porta-malas</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="Servicos">
                        <img src="../IMGS/Icones/lampada.png" alt="lampada">
                        <p>Troca de Lâmpadas</p>
                    </div>
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

    <script src="../JAVASCRIPT/jsLoca.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/d3aca5478d.js" crossorigin="anonymous"></script>
</body>
</html>