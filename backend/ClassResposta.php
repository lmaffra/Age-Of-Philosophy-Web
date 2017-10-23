<?php

class ClassResposta {
    
    public function todasRespostas() {
        include_once ("ClassDB.php");
        $db = new ClassDB();
        
        $conn = new mysqli($db->servername, $db->username, $db->password, $db->dbname);
        if ($conn->connect_error) {
            return "Erro";
        }
        
        $sql = "SELECT R.id, R.resposta FROM tbl_resposta R ORDER BY R.resposta";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $id = $row["id"];
                $resposta = utf8_encode($row["resposta"]);
                
                $resultado[] = array(
                    "id" => $id,
                    "resposta" => $resposta
                );
            }
            return $resultado;
        }
        else {
            return 0;
        }
    }
    
    public function cadastrarResposta($resposta) {
        include_once ("ClassDB.php");
        $db = new ClassDB();
        
        $conn = new mysqli($db->servername, $db->username, $db->password, $db->dbname);
        if ($conn->connect_error){
            return "Erro";
        }
        $sql = "INSERT INTO tbl_resposta VALUES (null, '".htmlentities($resposta['resposta'])."');";

        $result = $conn->query($sql);
        if($result){
            return true;
        }else{
            return false;
        }
    }
    
}

?>