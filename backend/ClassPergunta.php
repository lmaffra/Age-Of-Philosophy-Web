<?php

class ClassPergunta {
    
    public function todasPerguntas() {
        include_once ("ClassDB.php");
        $db = new ClassDB();
        
        $conn = new mysqli($db->servername, $db->username, $db->password, $db->dbname);
        if ($conn->connect_error) {
            return "Erro";
        }
        
        $sql = "SELECT P.id, P.enunciado, P.dificuldade FROM tbl_pergunta P ORDER BY P.id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $id = $row["id"];
                $enunciado = utf8_encode($row["enunciado"]);
                $dificuldade = utf8_encode($row["dificuldade"]);
                
                $resultado[] = array(
                    "id" => $id,
                    "enunciado" => $enunciado,
                    "dificuldade" => $dificuldade
                );
            }
            return $resultado;
        }
        else {
            return 0;
        }
    }

    public function cadastrarPergunta($pergunta){
        include_once ("ClassDB.php");
        $db = new ClassDB();
        
        $conn = new mysqli($db->servername, $db->username, $db->password, $db->dbname);
        if ($conn->connect_error){
            return "Erro";
        }
        
        $sql = "INSERT INTO tbl_resposta VALUES (null, '".htmlentities($pergunta['correta'])."');";
        $result = $conn->query($sql);
        if($result){
            $sql = "INSERT INTO tbl_pergunta VALUES (null, '".htmlentities($pergunta['enunciado'])."', '".$pergunta['dificuldade']."', (SELECT MAX(id) FROM tbl_resposta));";
            $result = $conn->query($sql);
            if($result){
                foreach ($pergunta['erradas'] as $errada) {
                    $sql = "INSERT INTO tbl_pergunta_resposta VALUES ((SELECT MAX(id) FROM tbl_pergunta), ".$errada.");";
                    $result = $conn->query($sql);
                }
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    
    public function excluirPergunta($id) {
        include_once ("ClassDB.php");
        $db = new ClassDB();
        
        $conn = new mysqli($db->servername, $db->username, $db->password, $db->dbname);
        if ($conn->connect_error) {
            return "Erro";
        }
        
        $sql = "DELETE FROM tbl_pergunta_resposta WHERE id_pergunta = ".$id['id'].";";
        $result = $conn->query($sql);
        $sql = "DELETE FROM tbl_jogada_pergunta WHERE id_pergunta = ".$id['id'].";";
        $result = $conn->query($sql);
        $sql = "DELETE FROM tbl_pergunta WHERE id = ".$id['id'].";";
        $result = $conn->query($sql);
        if($result){
            return true;
        }else{
            return false;
        }
    }
    
}

?>