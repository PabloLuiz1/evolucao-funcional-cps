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
    
    function select($tabela, $parametros = null, $campos = '*'){
        $tabela = DB_PREFIX.$tabela;
        $parametros = ($parametros) ? " {$parametros}" : null;
        $query = "SELECT {$campos} FROM {$tabela}{$parametros}";
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

    function delete($tabela, $where = null){
        $tabela = DB_PREFIX.$tabela;
        $where = ($where) ? " WHERE {$where}" : null;
        $query = "DELETE FROM {$table}{$where}";
        return execute($query);
    }
?>
