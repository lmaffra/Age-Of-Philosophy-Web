<?php

class ClassAluno {
    
    public function todosAlunos() {
        include_once ("ClassDB.php");
        $db = new ClassDB();
        
        $conn = new mysqli($db->servername, $db->username, $db->password, $db->dbname);
        if ($conn->connect_error) {
            return "Erro";
        }
        
        $sql = "SELECT A.id, A.login, A.nome, T.turma, A.ano
                FROM tbl_usuario A JOIN tbl_turma T ON A.id_turma = T.id
                WHERE A.ind_admin = '0' ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $id = $row["id"];
                $login = $row["login"];
                $nome = utf8_encode($row["nome"]);
                $turma = utf8_encode($row["turma"]);
                $ano = $row["ano"];
                
                $resultado[] = array(
                    "id" => $id,
                    "login" => $login,
                    "nome" => $nome,
                    "turma" => $turma,
                    "ano" => $ano
                );
            }
            return $resultado;
        }
        else {
            return 0;
        }
    }

    public function excluirAluno($id) {
        include_once ("ClassDB.php");
        $db = new ClassDB();
        
        $conn = new mysqli($db->servername, $db->username, $db->password, $db->dbname);
        if ($conn->connect_error) {
            return "Erro";
        }
        
        $sql = "DELETE FROM tbl_usuario WHERE id = ".$id['id'].";";
        $result = $conn->query($sql);
        if($result){
            return true;
        }else{
            return false;
        }
    }
}

?>