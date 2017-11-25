<?php

class ClassRank {
    
    public function rankTempo($idTurma) {
        include_once ("ClassDB.php");
        $db = new ClassDB();
        
        $conn = new mysqli($db->servername, $db->username, $db->password, $db->dbname);
        if ($conn->connect_error) {
            return "Erro";
        }
        
        $sql = "SELECT u.nome, t.turma, u.ano, j.dt_jogada, j.tempo
                    FROM tbl_usuario u 
                        JOIN tbl_turma t ON u.id_turma = t.id 
                        JOIN tbl_jogada j ON u.id = j.id_aluno 
                    WHERE t.id = ".$idTurma."
                    ORDER BY j.tempo";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $nome = utf8_encode($row["nome"]);
                $turma = utf8_encode($row["turma"]);
                $ano = $row["ano"];
                $dt_jogada = $row["dt_jogada"];
                $tempo = $row["tempo"];
                
                $resultado[] = array(
                    "nome" => $nome,
                    "turma" => $turma,
                    "ano" => $ano,
                    "dt_jogada" => $dt_jogada,
                    "tempo" => $tempo
                );
            }
            return $resultado;
        }
        else {
            return 0;
        }
    }
    
    public function rankPonto($idTurma) {
        include_once ("ClassDB.php");
        $db = new ClassDB();
        
        $conn = new mysqli($db->servername, $db->username, $db->password, $db->dbname);
        if ($conn->connect_error) {
            return "Erro";
        }
        
        $sql = "SELECT u.nome, t.turma, u.ano, j.dt_jogada, j.pont_quiz
                    FROM tbl_usuario u 
                        JOIN tbl_turma t ON u.id_turma = t.id 
                        JOIN tbl_jogada j ON u.id = j.id_aluno 
                    WHERE t.id = ".$idTurma."
                    ORDER BY j.pont_quiz DESC";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $nome = utf8_encode($row["nome"]);
                $turma = utf8_encode($row["turma"]);
                $ano = $row["ano"];
                $dt_jogada = $row["dt_jogada"];
                $pont_quiz = $row["pont_quiz"];
                
                $resultado[] = array(
                    "nome" => $nome,
                    "turma" => $turma,
                    "ano" => $ano,
                    "dt_jogada" => $dt_jogada,
                    "pont_quiz" => $pont_quiz
                );
            }
            return $resultado;
        }else {
            return 0;
        }
    }
    
    public function rankPontoMedia($idTurma) {
        include_once ("ClassDB.php");
        $db = new ClassDB();
        
        $conn = new mysqli($db->servername, $db->username, $db->password, $db->dbname);
        if ($conn->connect_error) {
            return "Erro";
        }
        
        $sql = "SELECT truncate(AVG(j.pont_quiz),2) AS media
                    FROM tbl_usuario u 
                        JOIN tbl_turma t ON u.id_turma = t.id 
                        JOIN tbl_jogada j ON u.id = j.id_aluno 
                    WHERE t.id = ".$idTurma."
                    ORDER BY j.pont_quiz DESC";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                return $row["media"];
            }
            return $resultado;
        }else {
            return 0;
        }
    }
    
    public function rankTempoMedia($idTurma) {
        include_once ("ClassDB.php");
        $db = new ClassDB();
        
        $conn = new mysqli($db->servername, $db->username, $db->password, $db->dbname);
        if ($conn->connect_error) {
            return "Erro";
        }
        
        $sql = "SELECT time(AVG(j.tempo)) AS media
                    FROM tbl_usuario u 
                        JOIN tbl_turma t ON u.id_turma = t.id 
                        JOIN tbl_jogada j ON u.id = j.id_aluno 
                    WHERE t.id = ".$idTurma."
                    ORDER BY j.tempo";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                return $row["media"];
            }
            return $resultado;
        }else {
            return 0;
        }
    }
    
}

?>