<!DOCTYPE HTML>
<?php
    require '../php/gerenciaBd.php';
    require '../php/conexao.php';
    require '../php/validarSessao.php';
    
    $conexao = abrirConexao();
    $solicitacao = selectSolicitacoes('solicitacao', 'usuario', 'id_usuario = "'.$_SESSION['id'].'"');
    fecharConexao($conexao);
    foreach($solicitacao as $soli){ 
        $id_solicitacao = $soli['id_solicitacao'];
        $nome = $soli['nome_usuario'];
        $sobrenome = $soli['sobrenome_usuario'];
        $registro = $soli['registro_usuario'];
        $email = $soli['email_usuario'];
        $data = $soli['data_solicitacao'];
        $pontuacaopretendida = $soli['pontuacao_total_solicitacao'];
        $pontuacaofinal = $soli['pontuacao_final_solicitacao'];
    }

    $conexao = abrirConexao();
    $arquivos = selectArquivos('solicitacao', 'arquivo', 'id_solicitacao = '.$id_solicitacao);
    $qtdArquivos = selectQtdArquivos('solicitacao', 'arquivo', 'id_solicitacao = '.$id_solicitacao);
    $qtdSolicitacoes = selectQtdSolicitacoes('solicitacao', 'usuario', 'login_usuario != "'.$_SESSION['login'].'" AND status_solicitacao = "ANALISE"');
    fecharConexao($conexao);
?>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Docente - Vendo pedido</title>
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
                <p>Olá <?php echo $_SESSION['nome']; ?></p>
                    <a href="index.php">Início</a>
                    <a href="help.php">Ajuda</a>
                    <button class="dropdown-btn">Processo de E.F 
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-container">
                        <a href="analisar-pedidos.php">Analisar pedidos <span class="badge" style="background-color: #fff;"><?php  echo ($qtdSolicitacoes['total']);?></span></a>
                        <a href="enviar-arquivos.php">Solicitar pedido</a>
                        <a href="meu-pedido.php">Meu pedido</a>
                    </div>
                    <a href="../php/logout.php">Logout</a>
        </div>
        <div class="col-md-10" style="position: relative; float: left; padding-top: 1%; margin-left: 1%;">
            <div class="card">
                <div class="card-header">
                    <h4>Informações da solicitação #<u><?php echo $id_solicitacao;?></u></h4>
                </div>
                <div class="card-content">
                    <div class="row" style="padding-left: 1%; padding-top: 1%;">
                        <div class="col-sm-2">
                            <figure class="foto-docente">
                                <img class="img-fluid" src="../images/user-circle-solid.svg" alt="Foto 3x4 do docente">
                            </figure>
                        </div>
                        <div class="col-sm-5">
                            <span class="p-label"><strong>Docente:</strong> <?php echo $nome.' '.$sobrenome?></span>
                            <br>
                            <span class="p-label"><strong>Registro:</strong> <?php echo $registro ?></span>
                            <br>
                            <span class="p-label"><strong>E-mail:</strong> <?php echo $email ?></span>
                        </div>
                        <div class="col-sm-4">
                            <span class="p-label"><strong>Data:</strong> <?php echo $data ?></span>
                            <br>
                            <span class="p-label"><strong>Pontuação pretendida:</strong> <?php echo $pontuacaopretendida ?> </span>
                            <br>
                            <span class="p-label"><strong>Pontuação final:</strong> <?php echo $pontuacaofinal ?> </span>
                        </div>
                    </div>
                </div>
                <div id="card-header" class="card-header card-footer">
                    <h4>Documentos anexados: <u><?php echo $qtdArquivos['total'];?></u> arquivos</h4>
                </div>
                <div class="card-content">
                    <div id="table-responsive" class="table-responsive" style="text-align: center;">
                        <table class="table table-hover table-bordered">
                            <thead class="thead-light">    
                                <tr>
                                    <th>Tipo</th>
                                    <th>Título</th>
                                    <th>Descrição</th>
                                    <th>Pontuação pretendida</th>
                                    <th>Pontuação final</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if (!$arquivos){
                                        echo ('<tr >');
                                            echo('<td colspan="5">Esse docente ainda não enviou arquivos.</td>');
                                        echo ("</tr>");
                                            
                                    }
                                    else{
                                        foreach($arquivos as $a){
                                            if ($a['status_arquivo']=='ANALISADO'){
                                                echo ('<tr class="table-success">');
                                            }
                                            else{
                                                echo ("<tr>");
                                            }
                                                echo("<td>".$a['tipo_arquivo']);
                                                echo("<td>".$a['titulo_arquivo']);
                                                echo("<td>".$a['descricao_arquivo']);
                                                echo("<td>".$a['pontuacao_arquivo']);
                                                echo ("<td>".$a['pontuacao_final_arquivo']);
                                                if ($a['status_arquivo']=='ANALISADO'){
                                                    echo ('<td><i style="color: green;" class="fas fa-check-circle"></i></td>');
                                                }
                                                else{
                                                    echo ('<td><i style="color: red;" class="fas fa-times-circle"></i></td>');
                                                }
                                            echo ("</tr>");
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>    
                    </div>
                </div>
            </div>
            <br>
        </div>
        <br><br>
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