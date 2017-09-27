<?php

class ClassTurma {
    
    public function todosTurmas() {
        include_once ("ClassDB.php");
        $db = new ClassDB();
        
        $conn = new mysqli($db->servername, $db->username, $db->password, $db->dbname);
        if ($conn->connect_error) {
            return "Erro";
        }
        
        $sql = "SELECT T.id, T.turma FROM tbl_turma T ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $id = $row["id"];
                $turma = utf8_encode($row["turma"]);
                
                $resultado[] = array(
                    "id" => $id,
                    "turma" => $turma
                );
            }
            return $resultado;
        }
        else {
            return 0;
        }
    }
    
    public function cadastrarTurma($turma) {
        include_once ("ClassDB.php");
        $db = new ClassDB();
        
        $conn = new mysqli($db->servername, $db->username, $db->password, $db->dbname);
        if ($conn->connect_error){
            return "Erro";
        }
        $sql = "INSERT INTO tbl_turma VALUES (null, '".utf8_encode($turma['turma'])."');";

        $result = $conn->query($sql);
        if($result){
            return true;
        }else{
            return false;
        }
    }
    
    public function editarTurma($turma) {
        include_once ("ClassDB.php");
        $db = new ClassDB();
        
        $conn = new mysqli($db->servername, $db->username, $db->password, $db->dbname);
        if ($conn->connect_error){
            return "Erro";
        }
        $sql = "UPDATE tbl_turma SET turma = '".utf8_encode($turma['turma'])."' ";

        $result = $conn->query($sql);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function excluirTurma($id) {
        include_once ("ClassDB.php");
        $db = new ClassDB();
        
        $conn = new mysqli($db->servername, $db->username, $db->password, $db->dbname);
        if ($conn->connect_error) {
            return "Erro";
        }
        
        $sql = "DELETE FROM tbl_turma WHERE id = ".$id['id'].";";
        $result = $conn->query($sql);
        if($result){
            return true;
        }else{
            return false;
        }
    }
}

?>