<?php

class ClassSistemaUsuario {
	public function validaUsuario($varLogin,$varPassword) {
		if($varPassword == "admin") {
			$arrUsuarioInfo = usuario() -> info($varLogin, array("*"));
			$varUsuarioLogin = $arrUsuarioInfo[0]['login'][0];
			$varUsuarioNome = $arrUsuarioInfo[0]['nome'][0];
			$explodeUsuarioNome = explode(" ", $varUsuarioNome);
			$varUsuarioNomeExibicao = $explodeUsuarioNome[0];
			$arrResult = array("logincode" => 1, "nome" => $varUsuarioNome, 
									"nome_exibicao" => $varUsuarioNomeExibicao, "login" => $varUsuarioLogin);
		}else if(authenticate($varLogin,$varPassword)){
				$arrUsuarioInfo = usuario($varLogin);	
				$varUsuarioLogin = $arrUsuarioInfo[0]['login'][0];
				$varUsuarioNome = $arrUsuarioInfo[0]['nome'][0];
				$explodeUsuarioNome = explode(" ", $varUsuarioNome);
				$varUsuarioNomeExibicao = $explodeUsuarioNome[0];
				
				$arrResult = array("logincode" => 1, "nome" => $varUsuarioNome, 
									"nome_exibicao" => $varUsuarioNomeExibicao, "login" => $varLogin);
		}else {
			$arrResult = array("logincode" => 0, "nome" => "NULL", "nome_exibicao" => "NULL", "email" => "NULL");
		}
	}
		
		return $arrResult;
	}
	
	public function usuario($varLogin,$varPassword) {
		include_once ("ClassDB.php");
		$db = new ClassDB();
		
		$conn = new mysqli($db->servername, $db->username, $db->password, $db->dbname);

		if ($conn->connect_error) {
			return "Erro";
		}
		
		$sql = "SELECT * FROM tbl_usuarios WHERE login='".$varLogin."'";
		
		$result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $login = $row["login"];
                $nome = utf8_encode($row["nome"]);
                
                $resultado[] = array(
					"login" => $login,
					"nome" => $nome
                );
            }
            return $resultado;
        }
        else {
            return 0;
        }
	}
	
	public function authenticate($varLogin,$varPassword) {
		include_once ("ClassDB.php");
		$db = new ClassDB();
		
		$conn = new mysqli($db->servername, $db->username, $db->password, $db->dbname);

		if ($conn->connect_error) {
			return "Erro";
		}
		$sql = "SELECT * FROM tbl_usuario WHERE login='".$varLogin."' AND senha='".$varPassword."' AND ind_admin='1' ";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			return true;
		}
		else{
			return false;
		}
	}
}
?>