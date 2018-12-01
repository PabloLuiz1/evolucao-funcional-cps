<?php

    function execute($query){
        $link = abrirConexao();
        $result = @mysqli_query($link, $query) or die (mysqli_error($link));
        fecharConexao($link);
        return $result;
    }
    
    function insert($tabela, array $dados){
        $table = DB_PREFIX.$tabela;
        $dados = escape($dados);
        $campos = implode(', ', array_keys($dados));
        $valores = "'".implode("', '", $dados)."'";
        $query = "INSERT INTO {$table} ({$campos}) VALUES ({$valores})";
        
        return execute($query);
    }
    
    function select($tabela, $where = null, $campos = '*'){
        $tabela = DB_PREFIX.$tabela;
        $where = ($where) ? " WHERE {$where}" : null;
        $query = "SELECT {$campos} FROM {$tabela}{$where}";
        $result = execute($query);
        if(!mysqli_num_rows($result)){
            return false;
        }
        else{
            while($res = mysqli_fetch_assoc($result)){
                $dados[] = $res;
            }
            return $dados;
        }
        
    }

    function selectSolicitacoes($tabela1, $tabela2, $where = null, $campos = '*'){
        $tabela1 = DB_PREFIX.$tabela1;
        $tabela2 = DB_PREFIX.$tabela2;
        $where = ($where) ? " WHERE {$where}" : null;
        $query = "SELECT {$campos} FROM {$tabela1} INNER JOIN {$tabela2} ON {$tabela1}.id_usuario_solicitacao = {$tabela2}.id_usuario {$where}";
        $result = execute($query);
        if(!mysqli_num_rows($result)){
            return false;
        }
        else{
            while($res = mysqli_fetch_assoc($result)){
                $dados[] = $res;
            }
            return $dados;
        }
        
    }

    function selectArquivos($tabela1, $tabela2, $where = null, $campos = '*'){
        $tabela1 = DB_PREFIX.$tabela1;
        $tabela2 = DB_PREFIX.$tabela2;
        $where = ($where) ? " WHERE {$where}" : null;
        $query = "SELECT {$campos} FROM {$tabela1} INNER JOIN {$tabela2} ON {$tabela2}.id_solicitacao_arquivo = {$tabela1}.id_solicitacao {$where}";
        $result = execute($query);
        if(!mysqli_num_rows($result)){
            return false;
        }
        else{
            while($res = mysqli_fetch_assoc($result)){
                $dados[] = $res;
            }
            return $dados;
        }
        
    }

    function selectQtdSolicitacoes($tabela1, $tabela2, $where = null, $campos = 'id_solicitacao'){
        $tabela1 = DB_PREFIX.$tabela1;
        $tabela2 = DB_PREFIX.$tabela2;
        $where = ($where) ? " WHERE {$where}" : null;
        $query = "SELECT COUNT({$campos}) as total FROM {$tabela1} INNER JOIN {$tabela2} ON {$tabela1}.id_usuario_solicitacao = {$tabela2}.id_usuario {$where}";
        $result = execute($query);
        if(!mysqli_num_rows($result)){
            return false;
        }
        else{
            $res = mysqli_fetch_assoc($result);
            return $res;
        }
        
    }

    function selectQtdArquivos($tabela1, $tabela2, $where = null, $campos = 'id_arquivo'){
        $tabela1 = DB_PREFIX.$tabela1;
        $tabela2 = DB_PREFIX.$tabela2;
        $where = ($where) ? " WHERE {$where}" : null;
        $query = "SELECT COUNT({$campos}) as total FROM {$tabela1} INNER JOIN {$tabela2} ON {$tabela2}.id_solicitacao_arquivo = {$tabela1}.id_solicitacao {$where}";
        $result = execute($query);
        if(!mysqli_num_rows($result)){
            return false;
        }
        else{
            $res = mysqli_fetch_assoc($result);
            return $res;
        }
        
    }

    function update($tabela, array $dados, $where = null){
        foreach ($dados as $key => $value){
            $campos[] = "{$key} = '{$value}'";
        }
        $campos = implode(', ', $campos);
        $tabela = DB_PREFIX.$tabela;
        $where = ($where) ? " WHERE {$where}" : null;
        $query = "UPDATE {$tabela} SET {$campos}{$where}";
        return execute($query);
    }

    function updatePontuacaoSoliciacao($id_solicitacao){
    $query = "UPDATE tbsolicitacao SET pontuacao_total_solicitacao = (SELECT SUM(pontuacao_arquivo) FROM tbarquivo WHERE id_solicitacao_arquivo = {$id_solicitacao}) WHERE id_solicitacao = {$id_solicitacao}";
        return execute($query);
    }

    function updatePontuacaoFinalSolicitacao($id_solicitacao){
    $query = "UPDATE tbsolicitacao SET pontuacao_final_solicitacao = (SELECT SUM(pontuacao_final_arquivo) FROM tbarquivo WHERE id_solicitacao_arquivo = {$id_solicitacao}) WHERE id_solicitacao = {$id_solicitacao}";
        return execute($query);
    }

    function delete($tabela, $where = null){
        $tabela = DB_PREFIX.$tabela;
        $where = ($where) ? " WHERE {$where}" : null;
        $query = "DELETE FROM {$table}{$where}";
        return execute($query);
    }
    /* SQL SELECT nome_usuario, sobrenome_usuario, registro_usuario, data_solicitacao, pontuacao_total_solicitacao, status_solicitacao, pontuacao_arquivo, tipo_arquivo, nome_arquivo, descricao_arquivo FROM tbusuario 
INNER JOIN tbsolicitacao ON id_usuario = id_usuario_solicitacao
INNER JOIN tbarquivo ON id_solicitacao = id_solicitacao_arquivo; */
?>
