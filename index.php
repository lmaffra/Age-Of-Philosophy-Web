<?php
	include ("seguranca.php"); // Inclui o arquivo com o sistema de segurança
	protegePagina (); // Chama a função que protege a página

	include 'menu.php';
?>

<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="bootstrap-3.3.5-dist/css/bootstrap.min.css">
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.maskedinput.min.js"></script>
<script src="sweetalert-master/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap_input.css">
<link rel="stylesheet" type="text/css" href="/TISIV/css/style.css">

<!--
<script src="autenticacao.js"></script>
-->
</head>

<body onBeforeUnload="loadOut()">
	<div class="container" style="min-width: 900px;">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading" >
					<h4>Age of Philosophy</h4>
				</div>
				<p>
					<h5 style="margin-left: 10px;">Painel de gerenciamento do jogo Age of Philosophy.</h5>
				</p>
			</div>
		</div>
	</div>
	
</body>

	<script src="/TISIV/js/autenticacao.js"></script>

</html>