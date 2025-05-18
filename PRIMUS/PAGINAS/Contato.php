<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/PRIMUS/CSS/styleNavebar.css">
    <link rel="stylesheet" href="../CSS/styleRodape.css">
    <link rel="stylesheet" href="../CSS/styleCont.css">
    <link rel="shortcut icon" href="../IMGS/favicon.ico" type="image/x-icon">
    <title>Atendimento | Primu's Auto Peças</title>
</head>
<body>
    <?php
    session_start();
    include '../PHP/navebar.php';
    ?>

    <main>
        <div><img src="../IMGS/loja.png" alt="Loja" class="ImgContato">
            <h2>Atendimento</h2>
        </div>
        <br>
        <h1>Fale Conosco</h1>
        <br>
        <h3>Se precisar entrar em contato, fique à vontade para nos enviar uma mensagem pelo formulário ou pelos meios de comunicação abaixo.
            <br><span>Responderemos o mais rápido possível!</span><br><br>Todos os nossos telefones também atendem via <span class="CorZap">WhatsApp.</span>

</h3>
            
        <br><br><br>

        <div class="container">
            <div class="row">
                <div class="inf col-lg-6 col-12">
                    <div class="Contatos">
                        <p>Contatos</p>
                        <ul>
                            <li><i class="fa-solid fa-phone"></i> +55 (11) 2493-4441 | <i class="fa-solid fa-phone"></i> +55 (11) 99824-2660</li>
                            <li><i class="fa-solid fa-phone"></i> +55 (11) 4260-0669 | <i class="fa-solid fa-phone"></i> +55 (11) 96913-7461</li>
                            <li><i class="fa-solid fa-envelope"></i>&nbsp; primusautopecas2015@gmail.com</li>
                        </ul>
                    </div>
                    
                    <div class="Endereco">
                        <p>Endereço</p>
                             <ul>
                                  <li><i class="fa-solid fa-road "></i> &nbsp;Avenida Imperial 1576</li>
                                  <li><i class="fa-solid fa-map-marker-alt"></i> &nbsp;Jardim Imperial, Atibaia - SP</li>
                                  <li><i class="fa-solid fa-mail-bulk"></i> &nbsp;Cep: 12950-000</li>
                           </ul>
                    </div>
                    
                    <div class="Redes">
                        <p>Redes Socias</p>
                        <div class="FundoRedes">
                            <a href="https://www.facebook.com/primusautopecas15" target="_blank"><i class="fa-brands fa-facebook iconesP"></i></a>
                            <a href="https://wa.me/5511970766083?text=Olá%20Mundo,%20Tudo%20bem%3F" target="_blank"><i class="fa-brands fa-whatsapp iconesP"></i></a>
                            <a href="https://www.instagram.com/primus.auto.pecas/" target="_blank"><i class="fa-brands fa-instagram iconesP"></i></a>
                        </div>
                    </div>
                </div>

                <div class="Formulario col-lg-6 col-12">

                    <p>Formulário</p>
                    <br><br><br>
        
                    <form id="MyFormulario" autocomplete="off">
        
                        <input type="text" name="nomeCompleto" id="name" placeholder="Nome Completo" maxlength="100">
                        <p id="MensagemErroCont" style="display: none;"><i class="fa-solid fa-triangle-exclamation"></i>&nbsp;Campo obrigatório. Coloque seu nome completo.</p>

                        <input type="text" id="emailAtendi" name="emailContato" placeholder="Email" maxlength="320">
                        <p id="MensagemErro2Cont" style="display: none;"><i class="fa-solid fa-triangle-exclamation"></i>&nbsp;Campo obrigatório. Coloque seu email.</p>
        
                        <input type="text"  id="telefone" name='telefone' placeholder="Telefone: __*_________" maxlength="12">
                        <p id="MensagemErro3" style="display: none;"><i class="fa-solid fa-triangle-exclamation"></i>&nbsp;Campo obrigatório. Coloque seu telefone.</p>

                        <select name="selecao" id="selecao" placeholder="Selecione uma opção">
                            <option value="" disabled selected>Selecione uma opção</option>
                            <option value="Orçamento">&nbsp;•&nbsp;Orçamento</option>
                            <option value="Reclamações">&nbsp;•&nbsp;Reclamações</option>
                            <option value="Dúvidas">&nbsp;•&nbsp;Dúvidas</option>
                            <option value="Sugestões">&nbsp;•&nbsp;Sugestões</option>
                            <option value="Outros">&nbsp;•&nbsp;Outros</option>
                        </select>
                        <p id="MensagemErro5" style="display: none;"><i class="fa-solid fa-triangle-exclamation"></i>&nbsp;Campo obrigatório. Coloque sua seleção.</p>

                        <textarea name="mensagem" id="caixatexto" placeholder="Sua mensagem..."></textarea>
                        <p id="MensagemErro4" style="display: none;"><i class="fa-solid fa-triangle-exclamation"></i>&nbsp;Campo obrigatório. Coloque sua mensagem.</p>

                        <p id="AvisoLoading" style="display: none;"></p>


                        <input type="submit" value="Enviar Mensagem">
                    </form>

                    <div id="MyAviso"></div>

                </div>
                
            </div>
        </div>    
        
    </main>

    <br><br><br><br><br>

    <div class="EfeitoSubindo" id="Subindo">
        <i class="fa-solid fa-arrow-up fa-beat"></i>
        <button onclick="Subir()"><img src="../IMGS/roda.png" alt="roda"></button>
    </div>

    <?php
    include '../PHP/rodape.php';
    ?>

    <script src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>
    <script src="../JAVASCRIPT/jsCont.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/d3aca5478d.js" crossorigin="anonymous"></script>
</body>
</html>