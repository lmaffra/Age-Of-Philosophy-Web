<?php
include ("backend/ClassSistemaUser.php");

$_SG ['abreSessao'] = true;
$_SG ['validaSempre'] = true;
$_SG ['paginaLogin'] = 'login.php';

// Verifica se precisa iniciar a sessão
if ($_SG ['abreSessao'] == true) {
	session_start ();
}
function validaUsuario($usuario, $senha) {
	$class = new ClassSistemaUser ();
	$result = $class->validaUser ( $usuario, $senha );
	
	global $_SG;
	if ($result ["logincode"] == 0) {
		return false;
	} else {
		$perm = $result["permissions"];
		$permissionCount = count($perm);
		if($permissionCount > 0) {
			$_SESSION ['usuario'] = json_encode ( $result );
			$_SESSION ['date'] = time ();
			return $perm[0];
		}
		else {
			return "erro";
		}
	}
}
function getUserData() {
	return $_SESSION ['usuario'];
}
function protegePagina() {
	global $_SG;
	
	if (! isset ( $_SESSION ['usuario'] )) {
		// Não há usuário logado, manda pra página de login
		expulsaVisitante ();
	}
}
function isTimeOuted() {
	if (! isset ( $_SESSION ['date'] )) {
		// Não há usuário logado, manda pra página de login
		return true;
	} else {
		$now = time ();
		$diff = $now - $_SESSION ['date'];
		
		if ($diff > 36000) {
			return true;
		} else
			return false;
	}
}
function expulsaVisitante() {
	global $_SG;
	// Remove as variáveis da sessão (caso elas existam)
	unset ( $_SESSION ['usuario'] );
	unset ( $_SESSION ['date'] );
	// Manda pra tela de login
	header ( "Location: " . $_SG ['paginaLogin'] );
}

function logout() {
	global $_SG;
	// Remove as variáveis da sessão (caso elas existam)
	unset ( $_SESSION ['usuario'] );
	unset ( $_SESSION ['date'] );
	// Manda pra tela de login
	header ( "Location:" . $_SG ['paginaLogin'] );
}

function expulsaVerificandoTimeout() {
	if (isTimeOuted () == true) {
		expulsaVisitante();
		return 1;
	}
	return 9;
}