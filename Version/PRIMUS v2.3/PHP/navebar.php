<?php
include '../PHP/FormularioLogin.php';
?>


<body>
    <header>
        <nav>
            <button onclick="BarraVerticalCell()" class="BarraCell"><i class="fa-solid fa-bars"></i></button>
            <a href="TelaInicial.php" class="ImgNav"><img src="../IMGS/Logoreal.png" alt="Logo Primus" class="ImgLogo"></a>
            <a href="TelaInicial.php" class="Inicio nav-link">Início</a>
            <a href="Sobre.php" class="Sobre nav-link">Sobre</a>
            <a href="Noticias.php" class="Noticias nav-link">Notícias</a>
            <a href="Contato.php" class="Contato nav-link">Atendimento</a>
            <a href="Localizacao.php" class="Localizacao nav-link">Localização</a>
            <a href="Produtos.php" class="Produtos nav-link">Produtos</a>
            <button onclick="BarraVertical()" class="BarraComum" ><i class="fa-regular fa-user"></i></button>
        </nav>

        <div class="BarraVertical" id="Barra">
            <div class="TamanhoBarra">
                <?php if (isset($_SESSION['id_usuario'])): ?>
                <!-- Caso o usuário esteja conectado -->

                    <div class="Usuario">
                        <img src="../IMGS/ImgUsuarioCinza.png" alt="Usuario">
                        <div style="margin: 0; padding: 0;">
                            <p style="margin: 0; padding: 0;">
                            <?php
                                $primeiro_nome = explode(' ', $_SESSION['nome_usuario'])[0];
                                echo htmlspecialchars($primeiro_nome);
                            ?></p>
                            <p style="margin: 0; padding: 0;font-size: 15px; color: gray;">Admin</p>    
                        </div>
                    </div>

                    <br>

                    <div style="display: grid; align-items: center; justify-content: center;">
                        <button class="btnBarra" style="display:none;">Perfil</button>
                        <button class="btnBarra TextG" onclick="window.location.href='Cadastro.php'">Criar conta Admin</a></button>
                        <button class="btnBarra" onclick="window.location.href='Edicao.php'">Edicao</a></button>
                        <button class="btnBarra TextG" onclick="window.location.href='/PRIMUS/PAGINAS/Termos.php'">Termos e Condições</a></button>
                        <button class="btnBarra" onclick="window.location.href='/PRIMUS/PHP/logout.php'">Sair</a></button>
                    </div>
                
                    <hr>
                    
                <?php else: ?>
                <!-- Caso o usuário NÃO esteja conectado -->

                    <div class="Usuario">
                        <img src="../IMGS/ImgUsuarioCinza.png" alt="Usuario">
                        <div style="margin: 0; padding: 0;">
                            <p style="margin: 0; padding: 0;">Usuario</p>
                            <p style="margin: 0; padding: 0;font-size: 15px; color: gray;"></p>    
                        </div>
                        
                    </div>
                    <br>

                    <div style="display: grid; align-items: center; justify-content: center;">
                        <button class="btnBarra" onclick="Login()">Login</button>
                        <button class="btnBarra" style="height: 50px;" onclick="window.location.href='/PRIMUS/PAGINAS/Termos.php'">Termos e Condições</a></button>
                    </div>
                
                    <hr>
                <?php endif; ?>
            </div>
        </div>

        <div class="Cell" id="Cell">
            <a href="TelaInicial.php" class="Inicio nav-link"><i class="fa-solid fa-house"></i>Início</a>
            <a href="Sobre.php" class="Sobre nav-link"><i class="fa-solid fa-circle-info"></i>Sobre</a>
            <a href="Noticias.php" class="Noticias nav-link"><i class="fa-solid fa-newspaper"></i>Notícias</a>
            <a href="Contato.php" class="Contato nav-link"><i class="fa-solid fa-headset"></i>Atendimento</a>
            <a href="Localizacao.php" class="Localizacao nav-link"><i class="fa-solid fa-location-dot"></i>Localização</a>
            <a href="Produtos.php" class="Produtos nav-link"><i class="fa-solid fa-box-open"></i>Produtos</a>
        </div>

        <?php if (isset($_SESSION['mensagem_bem_vindo'])): ?>
            <p class="TextoLogin"><?php echo $_SESSION['mensagem_bem_vindo']; ?></p>
            <?php unset($_SESSION['mensagem_bem_vindo']); // Remove a mensagem após exibi-la ?>
        <?php endif; ?>
    </header>

    <script src="../JAVASCRIPT/jsFormulario.js"></script>
</body>