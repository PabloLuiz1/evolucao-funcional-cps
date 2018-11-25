<!DOCTYPE HTML>
<?php 
    require '../php/gerenciaBd.php';

    $solicitacoes = selectSolicitacoes('solicitacao', 'usuario', null); #trocar null para "em analise"
?>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Docente - Analisar pedidos</title>
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
                    <a href="#">Ajuda</a>
                    <button class="dropdown-btn">Processo de E.F 
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-container">
                        <a href="#">Analisar pedidos <span class="badge" style="background-color: #fff;">5</span></a>
                        <a href="enviar-arquivos.php">Solicitar pedido</a>
                        <a href="meu-pedido.php">Meu pedido</a>
                    </div>
                    <a href="#contact">Logout</a>
        </div>
        <div class="col-md-8" style="position: relative; float: left; margin-left: 8%; padding-top: 1%;">
            <h3>Pedidos de E.F disponíveis para análise</h3>
            <br>
            <div class="table-responsive" style="text-align: center;">
                <table class="table table-hover table-bordered">
                    <thead class="thead-light">    
                        <tr>
                            <th>Data</th>
                            <th>Nome</th>
                            <th>Registro</th>
                            <th>Pontuação total</th>
                            <th>Analisar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            if (!$solicitacoes){
                                echo ('<tr >');
                                    echo('<td colspan="5">Não há solicitações.</td>');
                                echo ("</tr>");
                                    
                            }
                            else{
                                foreach($solicitacoes as $soli){
                                    echo ("<tr>");
                                        echo("<td>".$soli['data_solicitacao']);
                                        echo("<td>".$soli['nome_usuario'].' '.$soli['sobrenome_usuario']);
                                        echo("<td>".$soli['registro_usuario']);
                                        echo("<td>".$soli['pontuacao_total_solicitacao']);
                                        echo("<td>");
                                            echo ('<a href="ver-pedido.php?r='.$soli['registro_usuario'].'" title="Analisar pedido" alt="Link que redireciona a análise de pedido a evolução funcional de um docente">
                                            <i class="fas fa-external-link-alt"></i>Ver</a>');
                                        echo ("</td>");
                                    echo ("</tr>");
                                }
                            }
                        ?>
                        <!--<tr>
                            <td>DD/MM/AAAA</td>
                            <td>NOME + SOBRENOME</td>
                            <td>123456789</td>
                            <td>50</td>
                            <td>
                                <a href="ver-pedido.php" title="Analisar pedido" alt="Link que redireciona a análise de pedido a evolução funcional de um docente">
                                <i class="fas fa-external-link-alt"></i>Ver</a>
                            </td>
                        </tr>-->
                    </tbody>
                </table>    
            </div>
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