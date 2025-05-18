<?php
include '../PHP/FormularioLogin.php';
?>


<body>
    <header>
        <nav>
            <a href="#" class="LogoP"><img src="../IMGS/Logoreal.png" alt="Logo Primus" style="width: 200px; position: relative; top: -25px;"></a>
            <a href="TelaInicial.php" class="Inicio nav-link">Início</a>
            <a href="Sobre.php" class="Sobre nav-link">Sobre</a>
            <a href="Noticias.php" class="Noticias nav-link">Notícias</a>
            <a href="Contato.php" class="Contato nav-link">Atendimento</a>
            <a href="Localizacao.php" class="Localizacao nav-link">Localização</a>
            <a href="Produtos.php" class="Produtos nav-link">Produtos</a>
            <button onclick="BarraVertical()"><i class="fa-regular fa-user"></i></button>
        </nav>

        <div class="BarraVertical" id="Barra">
            <div style="width:100%;">
                <?php if (isset($_SESSION['id_usuario'])): ?>
                <!-- Caso o usuário esteja conectado -->

                    <div class="Usuario">
                        <img src="../IMGS/ImgUsuarioCinza.png" alt="Usuario">
                        <div style="margin: 0; padding: 0;">
                            <p style="margin: 0; padding: 0; white-space: nowrap; text-overflow: ellipsis;"><?php echo htmlspecialchars($_SESSION['nome_usuario']); ?></p>
                            <p style="margin: 0; padding: 0;font-size: 15px; color: gray;">Admin</p>    
                        </div>
                    </div>

                    <br>

                    <div style="display: grid; align-items: center; justify-content: center;">
                        <button class="btnBarra">Perfil</button>
                        <button class="btnBarra" style="height: 50px;" onclick="window.location.href='Cadastro.php'">Criar conta Admin</a></button>
                        <button class="btnBarra" onclick="window.location.href='Edicao.php'">Edicao</a></button>
                        <button class="btnBarra" style="height: 50px;" onclick="window.location.href='/PRIMUS/PAGINAS/Termos.php'">Termos e Condições</a></button>
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

        <?php if (isset($_SESSION['mensagem_bem_vindo'])): ?>
            <p class="TextoLogin"><?php echo $_SESSION['mensagem_bem_vindo']; ?></p>
            <?php unset($_SESSION['mensagem_bem_vindo']); // Remove a mensagem após exibi-la ?>
        <?php endif; ?>
    </header>

    <script src="../JAVASCRIPT/jsFormulario.js"></script>
</body>