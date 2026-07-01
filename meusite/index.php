<!DOCTYPE html>
<html lang="pt">
	<head>	
        <meta charset="UTF-8">
		<title>Loja de livros</title>
		<link rel="icon" type="image/png" href="imagens/favicon.png"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="css/customize.css">
        <script type="text/javascript" src="js/script.js"></script>
	</head>
	<body >  
        <?php
            session_start();
            if (isset($_SESSION ['login'])) {                               // Se existe usuário logado 
                header("location: /LojaDeLivros/contatosListar.php");  // Vai para as funcionalidades do site
                exit();
            }
        ?>
        <?php
            session_start();
            if (isset($_SESSION['login'])) {
                header("location: /LojaDeLivros/contatosListar.php");
                exit();
            }
            ?>
            <!DOCTYPE html>
            <html lang="pt-BR">
            <head>
                <meta charset="UTF-8">
                <title>Loja de Livros</title>
                <link rel="icon" type="image/png" href="images/favicon.png"/>
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <!-- W3.CSS -->
                <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
            </head>
            <body class="w3-light-grey">

                <!-- Menu Superior -->
                <div class="w3-top w3-blue w3-bar w3-large" style="z-index:3;">
                    <a class="w3-bar-item w3-button w3-hide-large" href="javascript:void(0)" onclick="w3_open()">☰</a>
                    <a class="w3-bar-item w3-button" onclick="document.getElementById('id0L').style.display='block'">Login</a>
                    <a class="w3-bar-item w3-button" onclick="document.getElementById('id0C').style.display='block'">Cadastro</a>
                </div>

                <!-- Sidebar -->
                <div class="w3-sidebar w3-bar-block w3-card w3-white" style="width:220px; z-index:2;">
                    <a href="index.php" class="w3-bar-item w3-button w3-hover-blue">Home</a>
                    <a href="livrosListar.php" class="w3-bar-item w3-button w3-hover-blue">Livros</a>
                    <a href="contatosListar.php" class="w3-bar-item w3-button w3-hover-blue">Clientes</a>
                </div>

                <!-- Conteúdo Principal -->
                <div class="w3-main w3-container" style="margin-left:220px; margin-top:80px;">

                    <!-- Caixa branca com sombra -->
                    <div class="w3-panel w3-card w3-white w3-padding-large w3-center">
                        <h1 class="w3-xxlarge w3-text-blue">Loja de Livros</h1>
                        <!-- Logo maior -->
                        <img src="images/logo.png" alt="Loja de Livros" 
                            class="w3-image w3-round" style="max-width:300px; margin-bottom:20px;">
                    </div> 
                </div>

            </body>
            </html>
                          
                <!-- LOGIN FAIL MODAL: login incorreto ou cadastro incorreto --> 
                <?php
                    $msg        = "";
                    $msg_header = "";
                    if(isset($_SESSION['nao_autenticado'])){ 
                        $msg        = $_SESSION['mensagem'];
                        $msg_header = $_SESSION['mensagem_header'];
                ?>
                <div id="LF" class="w3-modal" style="display:block;">
                <?php 
                    }else{ 
                ?>
                <div id="LF" class="w3-modal" style="display:none;">
                <?php
                    unset($_SESSION['nao_autenticado']);
                    }
                ?>
                    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:400px">
                        <div class="w3-center"> 
                            <span onclick="document.getElementById('LF').style.display='none'" 
                                  class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
                            <h2 class="w3-center w3-xxlarge w3-text-red"><?php echo $msg_header; ?></h2>
                            <p class="w3-container w3-card-4 w3-pale-red w3-text-black w3-margin"><?php echo $msg; ?></p>
                        </div>
                    </div>
                </div>

                <!-- LOGIN MODAL -->
                <div id="id0L" class="w3-modal">
                    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:400px">
                        <div class="w3-center"> 
                            <span onclick="document.getElementById('id0L').style.display='none'" 
                                  class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
                        </div>
                        <h2 class="w3-center w3-xxlarge w3-text-blue">Login</h2>
                        <form action="login.php" method="POST" class="w3-container w3-card-4 w3-light-grey w3-margin">
                            <div class="w3-section">
                                <label class="w3-text-blue"><b>Login do usuário</b></label>
                                <input class="w3-input w3-border w3-round w3-margin-bottom" type="text" name="Login" placeholder="nome.sobrenome" required>
                                <label class="w3-text-blue"><b>Senha</b></label>
                                <input class="w3-input w3-border w3-round" name="Senha" id="Senha" type="password"  
                                      pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,8}" placeholder="sua senha" required>
                                <p>
                                    <input type="checkbox" onclick="mostrarOcultarSenhaLogin()"> <b>Mostrar senha</b>
                                </p>
                                <button class="w3-button w3-blue w3-round w3-block w3-hover-orange w3-section w3-padding" type="submit">Login</button>
                            </div>
                        </form>
                        <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                            <button onclick="document.getElementById('id0L').style.display='none'" type="button" class="w3-button w3-red w3-round">Cancelar</button>
                            <span class="w3-right w3-padding w3-hide-small"><a href="#">Esqueceu a senha?</a></span>
                        </div>
                    </div>
                </div>

                <!-- CADASTRO MODAL -->
                <div id="id0C" class="w3-modal">
                    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:400px">
                        <div class="w3-center"> 
                            <span onclick="document.getElementById('id0C').style.display='none'" 
                                  class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
                        </div>
                        <h2 class="w3-center w3-xxlarge w3-text-blue">Cadastrar</h2>
                        <form action="cadastro.php" method="POST" class="w3-container w3-card-4 w3-light-grey w3-margin">
                            <label class="w3-text-blue"><b>Nome de usuário</b>*</label>
                            <input class="w3-input w3-border w3-round" name="nome" type="text" placeholder="Nome" required>

                            <label class="w3-text-blue"><b>Login</b>*</label>
                            <input class="w3-input w3-border w3-round" name="Login" type="text" 
                                  pattern="[a-zA-Z]{2,20}\.[a-zA-Z]{2,20}" placeholder="nome.sobrenome" required>

                            <label class="w3-text-blue"><b>Celular</b>*</label>
                            <input class="w3-input w3-border w3-round" name="Celular" id="Celular" type="text" maxlength="15"
                                  placeholder="(XX)XXXXX-XXXX" required>

                            <label class="w3-text-blue"><b>Senha</b>*</label>
                            <input class="w3-input w3-border w3-round" name="Senha1" id="Senha1" type="password" required>

                            <label class="w3-text-blue"><b>Confirma Senha</b>*</label>
                            <input class="w3-input w3-border w3-round" name="Senha2" id="Senha2" type="password" onkeyup="validarSenha()" required>

                            <p>
                                <input type="checkbox" onclick="mostrarOcultarSenhaCadastro()"> <b>Mostrar senha</b>
                            </p>
                            <p class="w3-center">
                                <button class="w3-button w3-blue w3-round w3-block w3-hover-orange w3-section w3-padding" type="submit">Enviar</button>
                            </p>
                        </form>
                        <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                            <button onclick="document.getElementById('id0C').style.display='none'" type="button" class="w3-button w3-red w3-round">Cancelar</button>
                        </div>
                    </div>
                </div>

  </body>   