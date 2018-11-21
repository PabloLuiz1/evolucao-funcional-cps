<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Docente - Solicitar EF</title>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/style-sidebar-dropdown.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <link rel="shortcut icon" type="image/png" href="../images/Favicon.png"/>
    </head>
<body>
    <div class="container-fluid">
        <header>
            <figure class="figure-header">
                <a href="index.php">
                    <img class="img-responsive-logo-cps" src="../images/logo-cps.png" 
                    title="Página inicial" alt="Logo do Centro Paula Souza e Brasão do Governo do Estado de São Paulo">
                </a>
            </figure>
            <h2 class="title-header">SISTEMA DE EVOLUÇÃO FUNCIONAL</h2>
        </header>
        <div class="col-md-12" style="position: relative; float: left; padding: 0px;">
                <div class="sidenav">
                <p>Olá $Fulano</p>
                    <a href="index.php">Início</a>
                    <a href="help.php">Ajuda</a>
                    <button class="dropdown-btn">Processo de E.F 
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-container">
                        <a href="analisar-pedidos">Analisar pedidos <span class="badge" style="background-color: #fff;">5</span></a>
                        <a href="#">Solicitar pedido</a>
                        <a href="meu-pedido.php">Meu pedido</a>
                    </div>
                    <a href="#contact">Logout</a>
        </div>
        <div class="col-md-5" style="position: relative; float: left; margin-left: 18%;">
            <form action="#" method="POST" class="form-arquivo">
                <div class="title-form">
                    Enviando documentos para a solicitação <i style="margin-left: 1%; cursor: pointer;" class="fas fa-question-circle" title="Modal"></i>
                </div>
                <div class="form-group">
                    <label for="cbTipo" class="control-label col-sm-2">Tipo: </label>
                    <div class="col-sm-12">
                        <select class="form-control" id="cbTipo" name="cbTipo" required>
                            <option value="">Selecione</option>
                            <option value="#">Opção 2</option>
                            <option value="#">Opção 3</option>
                            <option value="#">Opção 4</option>
                            <option value="#">Opção 5</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtTitulo" class="control-label col-sm-2">Título: </label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="txtTitulo" name="txtTitulo" required/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtDescricao" class="control-label col-sm-2">Descrição: </label>
                    <div class="col-sm-12">
                        <textarea class="form-control" id="txtDescricao" name="txtDescricao" rows="4" required></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtPontuacao" class="control-label col-sm-2">Pontuação: </label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control" id="txtPontuacao" name="txtPontuacao" max="30" min="5" required/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="upload" class="control-label col-sm-4">Upar arquivo: </label>
                    <div class="col-sm-12">
                        <input type="file" class="form-control-file" id="upload" name="upload" required/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-11">
                        <input type="submit" class="btn btn-success pull-right" value=" Adicionar "/>
                    </div>
                </div>
                <br>
                <br>
            </form>
            <br><br><br><br><br><br><br><br><br><br><br>
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
    <script type="text/javascript">
        var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;

        for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
            dropdownContent.style.display = "none";
            } else {
            dropdownContent.style.display = "block";
            }
        });
        }
    </script>
</body>