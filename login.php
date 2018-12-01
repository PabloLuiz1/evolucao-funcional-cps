<!DOCTYPE HTML>
<?php 
    

?>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <link rel="shortcut icon" type="image/png" href="images/Favicon.png"/>
        <style>
            #dialogoverlay{
                display: none;
                opacity: .8;
                position: fixed;
                top: 0px;
                left: 0px;
                background: #FFF;
                width: 100%;
                z-index: 10;
            }
            #dialogbox{
                display: none;
                position: fixed;
                background: #000;
                border-radius:7px; 
                width:550px;
                z-index: 10;
            }
            #dialogbox > div{ background:#FFF; margin:3px; }
            #dialogbox > div > #dialogboxhead{ background: #dddddd; font-weight: 500; font-size:19px; padding:10px; color:#000; border-bottom: 1px solid black;}
            #dialogbox > div > #dialogboxbody{ background:#fff; padding:20px; color:#000; }
            #dialogbox > div > #dialogboxfoot{ background: #dddddd; padding:10px; text-align:right; border-top: 1px solid black;}
        </style>
        <script>
            function CustomAlert(){
                this.render = function(dialog){
                    var winW = window.innerWidth;
                    var winH = window.innerHeight;
                    var dialogoverlay = document.getElementById('dialogoverlay');
                    var dialogbox = document.getElementById('dialogbox');
                    dialogoverlay.style.display = "block";
                    dialogoverlay.style.height = winH+"px";
                    dialogbox.style.left = (winW/2) - (550 * .5)+"px";
                    dialogbox.style.top = "100px";
                    dialogbox.style.display = "block";
                    document.getElementById('dialogboxhead').innerHTML = "Ajuda - formulário de login";
                    document.getElementById('dialogboxbody').innerHTML = dialog;
                    document.getElementById('dialogboxfoot').innerHTML = '<button class="btn btn-info" onclick="Alert.ok()">OK</button>';
                }
                this.ok = function(){
                    document.getElementById('dialogbox').style.display = "none";
                    document.getElementById('dialogoverlay').style.display = "none";
                }
            }
            var Alert = new CustomAlert();
        </script>
    </head>
<body>
    <div id="dialogoverlay"></div>
        <div id="dialogbox">
            <div>
                <div id="dialogboxhead"></div>
                <div id="dialogboxbody"></div>
                <div id="dialogboxfoot"></div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <header>
            <figure class="figure-header">
                <a href="index.php">
                    <img class="img-responsive-logo-cps" src="images/logo-cps.png" 
                    title="Página inicial" alt="Logo do Centro Paula Souza e Brasão do Governo do Estado de São Paulo">
                </a>
            </figure>
            <h2 class="title-header">SISTEMA DE EVOLUÇÃO FUNCIONAL</h2>
            <nav class="navbar navbar-expand-sm bg-red navbar-dark justify-content-center">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link" href="index.php">Início</a>
                    </li>
                    <li class="nav-item active">
                    <a class="nav-link" href="login.php">Logar</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="help.php">Ajuda</a>
                    </li>
                </ul>
            </nav>
        </header>
<br>
<div class="container-fluid">
    <div class="col-md-5"></div>
    <div class="col-md-5">
        <form action="php/criarSessao.php" class="form-login" method="POST">
            <div class="title-form-login">
                Login <i style="margin-left: 1%; cursor: pointer;" onClick="Alert.render('Preencha o formulário de login com os mesmos dados utilizados para logar nos sistemas SIGA Professor/CPS.')" class="fas fa-question-circle" title="Ajuda"></i>
            </div>
            <div class="form-group" style="padding-left: 20%; padding-right: 20%; padding-top: 5%;">
                <div class="input-group mb-1">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" name="txtLogin" class="form-control" placeholder="Login" required>
                </div>
            </div>
            <div class="form-group" style="padding-left: 20%; padding-right: 20%;">
                <div class="input-group mb-1">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    </div>
                    <input type="password" name="txtSenha" class="form-control" placeholder="Senha" required>
                </div>
            </div>
            <div class="form-group" style="padding-left: 17%; padding-right: 17%;">
                <div class="col-sm-12">
                    <input type="submit" style="background-color: #b91000; border: #b91000; font-weight: 500;" onMouseOver="this.style.backgroundColor='#7f0b00'"
   onMouseOut="this.style.backgroundColor='#b91000'" class="btn btn-info pull-right" name="logar" value=" Logar ">
                    <a href="recuperacao_senha.php">Esqueci minha senha</a><br>
                </div>
            </div>
        </form>
    </div>
    </div>
</div>
        <footer>
            <div class="row">
                <div class="col-sm-4">Centro Paula Souza </div>
                <div class="col-sm-4"><i class="fas fa-map-marker-alt"></i> CPS – 
                    Administração Central. Rua dos Andradas, 140 - Santa Ifigênia CEP 01208-000 – São Paulo – SP.
                </div>
                <div class="col-sm-4"><i class="fas fa-phone"></i> +55 11 3324-3326</div>
            </div>
            <div class="row">
                <div class="col-sm-4">Sistema de Evolução Funcional</div>
                <div class="col-sm-4"> <a href="https://www.cps.sp.gov.br/" target="_blank" title="Site oficial do Centro Paula Souza" alt="Link externo que redireciona ao site oficial do Centro Paula Souza">
                    <i class="fas fa-external-link-alt"></i>cps.sp.gov.br</a>
                </div>
                <div class="col-sm-4"><a href="https://www.facebook.com/centropaulasouza/" target="_blank" title="Página oficial do CPS no Facebook" alt="Link externo que redireciona a página oficial do Centro Paula Souza na rede social Facebok">
                    <i class="fas fa-external-link-alt"></i>facebook.com/centropaulasouza</a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-8"><a href="https://github.com/PabloLuiz1/EvolucaoFuncional" target="_blank" title="Repositório Git deste projeto" alt="Link externo que redireciona ao projeto git deste site na plataforma online GitHub">
                    <i class="fas fa-code-branch"></i>Repositório git</a>
                </div>
            </div>
        </footer>
    </div>
    </div>
</body>