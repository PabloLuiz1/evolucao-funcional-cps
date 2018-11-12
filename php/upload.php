<?php
    require 'conexao.php';
    require 'gerenciaBd.php';
    
    $msg = false;
    function upload($arquivo)
    {
    if (isset($_FILES['arquivo'])){

        $estensao = explode('.',$_FILES['arquivo']['name']);
        $estensao = strtolower(end($estensao));
        $novo_nome = md5(time()) . '.' . $estensao;
        $diretorio = "../uploaded/";

        move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome);

        $arquivo = array('id_solicitacao_arquivo' => 1,
                        'pontuacao_arquivo' => 30,
                        'documento_arquivo' => $novo_nome);
        
        if(insert('arquivo', $arquivo)){
            $msg = "Arquivo enviado com sucesso!";
        }
        else{
            $msg = "Falha ao enviar o arquivo.";
        }
    }
}
?>
<!--<h1>Upload de arquivos</h1>
<?php /*if($msg != false) echo "<p> $msg </p>"; */?>
<form action="upload.php" method="POST" enctype="multipart/form-data">
    Arquivo: <input type="file" required name="arquivo">
    <input type="submit" value="Salvar">
</form>-->