<?php
// Inclui o arquivo com o sistema de seguran�a
require_once ("seguranca.php");

// Verifica se um formulário foi enviado
if ($_SERVER ['REQUEST_METHOD'] == 'POST') {

	if (isset($_POST['action']) && $_POST ['action'] == 'logout') {
		
		logout();
		
	} else if (isset($_POST['action'])  && $_POST ['action'] == 'timeout') {
		
		$tst = expulsaVerificandoTimeout ();
		echo json_encode($tst);
		
	} else {
		$usuario = (isset ( $_POST ['usuario'] )) ? $_POST ['usuario'] : '';
		$senha = (isset ( $_POST ['senha'] )) ? $_POST ['senha'] : '';
		
		// Utiliza uma função criada no seguranca.php pra validar os dados digitados
		$validacao = validaUsuario ( $usuario, $senha );
		if ($validacao != false) {
			if($validacao == "cli") {
				header ( "Location: index.php" );
			}
			else if($validacao == "fun") {
				header ( "Location: index.php" );
			}
			else if($validacao == "adm") {
				header ( "Location: index.php" );
			}
			else if($validacao == "erro") {
				header ( "Location: pagina_erro_vc.php" );
			}
		} else {
			expulsaVisitante ();
		}
	}
} else {
	$usrData = getUserData ();
	echo $usrData;
}