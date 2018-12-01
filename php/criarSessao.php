<?php
    require 'gerenciaBd.php';
    require 'conexao.php';

    $login = $_POST['txtLogin'];
    $senha = $_POST['txtSenha'];
    $conexao = abrirConexao();
    $usuario = select('usuario', "login_usuario = '$login' AND senha_usuario = '$senha'");
    if ($usuario){
        foreach ($usuario as $u){
            $nome_usuario = $u['nome_usuario'];
            $id_usuario = $u['id_usuario'];
        }
        $solicitacao = select('solicitacao', "id_usuario_solicitacao ='$id_usuario'", 'id_solicitacao');
        foreach ($solicitacao as $so){
            $id_solicitacao = $so['id_solicitacao'];
        }
        $dados = array(
                    'login_usuario' => $login,
                    'senha_usuario' => $senha,
                    'nome_usuario' => $nome_usuario,
                    'id_usuario' => $id_usuario,
                    'id_solicitacao' => $id_solicitacao
        );
        session_start();
        $_SESSION['login'] = $dados['login_usuario'];
        $_SESSION['senha'] = $dados['senha_usuario'];
        $_SESSION['nome'] = $dados['nome_usuario'];
        $_SESSION['id'] = $dados['id_usuario'];
        $_SESSION['solicitacao'] = $dados['id_solicitacao'];

        #setcookie('nome_usuario_logado', $usuario['nome_usuario'], time()+100);
        header ("Location: /docente/index.php");
    }
    else{
        echo ('<script> alert("Login ou senha inválidos."); location.href="../login.php";</script>');
    }
    fecharConexao($conexao);
?>