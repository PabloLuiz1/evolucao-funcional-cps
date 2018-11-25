<?php
    require 'conexao.php';
    require 'gerenciaBd.php';
    
    function upload($arquivo){
        if (isset($arquivo)){
            $estensao = explode('.',$_FILES['arquivo']['name']);
            $estensao = strtolower(end($estensao));
            $novo_nome = md5(time()) . '.' . $estensao;
            $diretorio = "../uploaded/";
        
            move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome);
        
            $conexao = abrirConexao();
            $arquivo = array(
                    'id_solicitacao_arquivo' => 1,
                    'pontuacao_arquivo' => $_POST ['txtPontuacao'],
                    'pontuacao_final_arquivo' => $_POST ['txtPontuacao'],
                    'nome_arquivo' => $novo_nome,
                    'tipo_arquivo' => $_POST ['cbTipo'],
                    'titulo_arquivo' => $_POST ['txtTitulo'],
                    'descricao_arquivo' => $_POST ['txtDescricao']
                );
            if (insert('arquivo', $arquivo)){
                echo ('<script> alert ("Sucesso!"); location.href="enviar-arquivos.php";</script>');
            }
            else{
                echo '<script> alert ("Error"); </script>';
            }
            fecharConexao($conexao);
        }
    }
?>
<!--<h1>Upload de arquivos</h1>
<?php /*if($msg != false) echo "<p> $msg </p>"; */?>
<form action="upload.php" method="POST" enctype="multipart/form-data">
    Arquivo: <input type="file" required name="arquivo">
    <input type="submit" value="Salvar">
</form>-->