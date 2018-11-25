<!DOCTYPE HTML>
<?php
    require '../php/gerenciaBd.php';
    $solicitacao = selectSolicitacoes('solicitacao', 'usuario', 'registro_usuario = '.$_GET['r']);
    foreach($solicitacao as $soli){ 
        $id_solicitacao = $soli['id_solicitacao'];
        $nome = $soli['nome_usuario'];
        $sobrenome = $soli['sobrenome_usuario'];
        $registro = $soli['registro_usuario'];
        $email = $soli['email_usuario'];
        $data = $soli['data_solicitacao'];
        $pontuacaototal = $soli['pontuacao_total_solicitacao'];
    }
    $arquivos = selectArquivos('solicitacao', 'arquivo', 'id_solicitacao = '.$id_solicitacao);
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
                <p>Olá $Fulano</p>
                    <a href="index.php">Início</a>
                    <a href="#">Ajuda</a>
                    <button class="dropdown-btn">Processo de E.F 
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-container">
                        <a href="analisar-pedidos.php">Analisar pedidos <span class="badge" style="background-color: #fff;">5</span></a>
                        <a href="enviar-arquivos.php">Solicitar pedido</a>
                        <a href="meu-pedido.php">Meu pedido</a>
                    </div>
                    <a href="#contact">Logout</a>
        </div>
        <div class="col-md-10" style="position: relative; float: left; padding-top: 1%; margin-left: 1%;">
            <h4>Você está vendo a solicitação #<?php echo $id_solicitacao; ?></h4>
            <br>
            <div class="card">
                <div class="card-header">
                    <h4>Informações da solicitação</h4>
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
                            <!--<div class="table-responsive" style="text-align: center;">
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
                                        <tr>
                                        <td>DD/MM/AAAA</td>
                                        <td>NOME + SOBRENOME</td>
                                        <td>123456789</td>
                                        <td>50</td>
                                        <td>
                                            <a href="ver-pedido.php" title="Analisar pedido" alt="Link que redireciona a análise de pedido a evolução funcional de um docente">
                                            <i class="fas fa-external-link-alt"></i>Ver</a>
                                        </td>
                                    </tbody>
                                </table>
                            </div>
                            -->
                        </div>
                        <div class="col-sm-4">
                            <span class="p-label"><strong>Data:</strong> <?php echo $data ?></span>
                            <br>
                            <span class="p-label"><strong>Pontuação total:</strong> <?php echo $pontuacaototal ?> </span>
                        </div>
                    </div>
                </div>
                <div class="card-header card-footer">
                    <h4>Documentos anexados: 1 de 5</h4>
                </div>
                <div class="card-content">
                    <div class="row" style="padding-left: 1%; padding-top: 1%;">
                        <div class="col-sm-12">
                            <?php 
                                foreach ($arquivos as $arqui){
                                    $arrayArquivos = array (
                                        'tipo' => $arqui['tipo_arquivo'],
                                        'titulo' => $arqui['titulo_arquivo'],
                                        'descricao' => $arqui['descricao_arquivo'],
                                        'pontuacao' => $arqui['pontuacao_arquivo'],
                                        'arquivo' => $arqui['nome_arquivo']
                                    );
                                }
                            ?>
                            <span class="p-label"><strong>Tipo:</strong> <?php echo $arrayArquivos['tipo'];?></span>
                            <br>
                            <span class="p-label"><strong>Título:</strong> <?php echo $arrayArquivos['titulo'];?></span>
                            <br>
                            <span class="p-label"><strong>Descrição:</strong> <?php echo $arrayArquivos['descricao'];?></span>
                            <br>
                            <span class="p-label"><strong>Pontuação pretendida:</strong> <?php echo $arrayArquivos['pontuacao'];?></span>
                            <iframe class="frame-arquivos" src="../uploaded/<?php echo $arrayArquivos['arquivo'];?>"></iframe>
                            <form action="#" method="POST">
                                <div class="form-group">
                                    <label for="numPontuacao" class="control-label col-sm-2">Pontuação final: </label>
                                    <div class="col-sm-2">
                                        <input type="number" name="numPontuacao" id="numPontuacao" class="form-control" max="30" min="5" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="txtComentario" class="control-label col-sm-4">Comentário/justificativa: </label>
                                    <div class="col-sm-6">
                                        <textarea name="txtComentario" id="txtComentario" class="form-control" rows="4"></textarea>
                                    </div>
                                </div>
                                <button class="btn btn-primary pull-left">Voltar</button>
                                <input type="submit" class="btn btn-success pull-right" style="margin-right: 2%;" value=" Okay "/>
                            </form>
                            <div class="col-sm-3" style="margin: 0 auto;">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--<div class="table-responsive" style="text-align: center;">
                        <table class="table table-hover table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th>Tipo</th>
                                    <th>Título</th>
                                    <th>Descrição</th>
                                    <th>Pontuação pretendida</th>
                                    <th>Abrir</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <td>Artigo publicado</td>
                                <td>A tecnologia da IA nos Games</td>
                                <td style="text-align: justify;">Um artigo publicado na revista blablasbla no ano de 2018 em sua edição taatata. O artigo aborda sobre aatatatata nos games atatatata blabla
                                blalblalbla lblalblalblalba blalbalbabalbababa.</td>
                                <td>30</td>
                                <td>
                                    <a href="#" target="_blank" title="Analisar pedido" alt="Link que redireciona a análise de pedido a evolução funcional de um docente">
                                    <i class="fas fa-external-link-alt"></i>Abrir</a>
                                </td>
                            </tbody>
                        </table>
                    </div>
                    -->
                </div>
            </div>
            <br>
            
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