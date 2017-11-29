<?php

class ClassEstatisticas {
    
    public function carregarEstatisticas() {
        include_once ("ClassDB.php");
        $db = new ClassDB();
        
        $conn = new mysqli($db->servername, $db->username, $db->password, $db->dbname);
        if ($conn->connect_error) {
            return "Erro";
        }
        
        $sql = "SELECT jp.id_pergunta, COUNT(jp.id_pergunta) AS erros, p.enunciado
            FROM tbl_jogada_pergunta jp JOIN tbl_pergunta p ON jp.id_pergunta = p.id
            WHERE ind_acerto = 0 GROUP BY id_pergunta ORDER BY COUNT(id_pergunta) DESC LIMIT 1 ";
            
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $id = $row["id_pergunta"];
                $erros = $row["erros"];
                $enunciado = utf8_encode($row["enunciado"]);
                
                $resultado[] = array(
                    "id" => $id,
                    "erros" => $erros,
                    "enunciado" => $enunciado
                );
            }
        }

        $sql = "SELECT jp.id_pergunta, COUNT(jp.id_pergunta) AS acertos, p.enunciado
            FROM tbl_jogada_pergunta jp JOIN tbl_pergunta p ON jp.id_pergunta = p.id
            WHERE ind_acerto = 1 GROUP BY id_pergunta ORDER BY COUNT(id_pergunta) DESC LIMIT 1 ";
        
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $id = $row["id_pergunta"];
                $acertos = $row["acertos"];
                $enunciado = utf8_encode($row["enunciado"]);
                
                $resultado[] = array(
                    "id" => $id,
                    "acertos" => $acertos,
                    "enunciado" => $enunciado
                );
            }
        }
        return $resultado;
    }
}

?>