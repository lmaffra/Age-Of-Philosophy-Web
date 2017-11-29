<?php
	include '../menu.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="/TISIV/bootstrap-3.3.5-dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/TISIV/sweetalert-master/dist/sweetalert.css">
	<link rel="stylesheet" type="text/css" href="/TISIV/css/bootstrap_input.css">
	<link rel="stylesheet" type="text/css" href="/TISIV/css/style.css">

</head>

<body onBeforeUnload="loadOut()">
	<div class="container" style="min-width: 900px;">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading" >
						<h4>Estatísticas</h4>
					</div>
					<br />
					<p>
						<label id="pergunta-errada" class="control-label" style="margin-left: 10px;"></label>
					</p>
					<p>
						<label id="pergunta-certa" class="control-label" style="margin-left: 10px;"></label>
					</p>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script type="text/javascript" src="/TISIV/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/TISIV/js/jquery.maskedinput.min.js"></script>
	<script type="text/javascript" src="/TISIV/sweetalert-master/dist/sweetalert.min.js"></script>
	<script src="/TISIV/js/estatisticas.js"></script>	
	<script src="/TISIV/js/autenticacao.js"></script>
</body>

</html>