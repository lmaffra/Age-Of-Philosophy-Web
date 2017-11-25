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
        if($pergunta['novaExistente'] === "0"){
            $sql = "INSERT INTO tbl_resposta VALUES (null, '".htmlentities($pergunta['corretaNova'])."');";
            $result = $conn->query($sql);    
        }else{
            $result = true;
        }
        if($result){
            if($pergunta['novaExistente'] === "0"){
                $sql = "INSERT INTO tbl_pergunta VALUES (null, '".htmlentities($pergunta['enunciado'])."', '".$pergunta['dificuldade']."', (SELECT MAX(id) FROM tbl_resposta));";
            }else{
                $sql = "INSERT INTO tbl_pergunta VALUES (null, '".htmlentities($pergunta['enunciado'])."', '".$pergunta['dificuldade']."', ".$pergunta['corretaSel'].");";
            }
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

    public function editarPergunta($pergunta){
        include_once ("ClassDB.php");
        $db = new ClassDB();
        
        $conn = new mysqli($db->servername, $db->username, $db->password, $db->dbname);
        if ($conn->connect_error){
            return "Erro";
        }
        if($pergunta['novaExistente'] === "0"){
            $sql = "INSERT INTO tbl_resposta VALUES (null, '".htmlentities($pergunta['corretaNova'])."');";
            $result = $conn->query($sql);    
        }else{
            $result = true;
        }
        if($result){
            if($pergunta['novaExistente'] === "0"){
                $sql = "UPDATE tbl_pergunta SET enunciado = '".htmlentities($pergunta['enunciado'])."',
                                                dificuldade = '".$pergunta['dificuldade']."', id_resposta_certa = (SELECT MAX(id) FROM tbl_resposta) 
                            WHERE id = ".$pergunta['id'].";";
            }else{
                $sql = "UPDATE tbl_pergunta SET enunciado = '".htmlentities($pergunta['enunciado'])."',
                                                dificuldade = '".$pergunta['dificuldade']."', id_resposta_certa = ".$pergunta['corretaSel']." 
                            WHERE id = ".$pergunta['id'].";";
            }
            $result = $conn->query($sql);
            if($result){
                $sql = "DELETE FROM tbl_pergunta_resposta WHERE id_pergunta = ".$pergunta['id'].";";
                $result = $conn->query($sql);
                foreach ($pergunta['erradas'] as $errada) {
                    $sql = "INSERT INTO tbl_pergunta_resposta VALUES (".$pergunta['id'].", ".$errada.");";
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
    
    public function carregarPergunta($id) {
    include_once ("ClassDB.php");
        $db = new ClassDB();
        
        $conn = new mysqli($db->servername, $db->username, $db->password, $db->dbname);
        if ($conn->connect_error) {
            return "Erro";
        }
        $id_erradas = array();
        $sql = "SELECT PR.id_reposta FROM tbl_pergunta_resposta PR WHERE PR.id_pergunta = ".$id.";";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($id_erradas, $row["id_reposta"]);
            }
        }
        $sql = "SELECT P.id, P.enunciado, P.dificuldade, R.id as id_correta, R.resposta FROM tbl_pergunta P JOIN tbl_resposta R ON P.id_resposta_certa = R.id WHERE P.id = ".$id." ORDER BY P.id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $id = $row["id"];
                $enunciado = utf8_encode($row["enunciado"]);
                $dificuldade = utf8_encode($row["dificuldade"]);
                $id_correta = $row["id_correta"];
                $correta = utf8_encode($row["resposta"]);
                
                $resultado = array(
                    "id" => $id,
                    "enunciado" => $enunciado,
                    "dificuldade" => $dificuldade,
                    "id_correta" => $id_correta,
                    "correta" => $correta,
                    "erradas" => $id_erradas
                );
            }
            return $resultado;
        }
        else {
            return 0;
        }
    }
    
}

?>