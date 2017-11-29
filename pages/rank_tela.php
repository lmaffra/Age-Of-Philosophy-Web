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
	<div class="container" style="min-width: 700px;">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading" >
					<h4>Placar</h4>
					
					<table center>
						<tr>
							<td style="width: 250px;">
								<label for="turmas-select" class="control-label">Turma:</label>
								<select class="form-control" id="turmas-select">
									<option value="0">Selecionar...</option>
							</td>
							<td style="width: 30px;"></td>
							<td style="width: 250px;">
								<label for="tipo-select" class="control-label">Tempo/Ponto:</label>
								<select class="form-control" id="tipo-select">
									<option value="0">Tempo</option>
									<option value="1">Rank</option>
							</td>
							<td style="width: 30px;"></td>
							<td style="width: 250px;">
								<label id="media-turma" class="control-label" style="margin-top: 27px;"></label>
							</td>
						</tr>
					</table>
					
					<table class="table table-striped table-hover header-fixed" id="rank_tempo_table" center>
						<thead>
							<tr>
								<th class="col-xs-1" style="width: 30%;">Nome</th>
								<th class="col-xs-1" style="width: 20%;">Turma</th>
								<th class="col-xs-1" style="width: 10%;">Ano</th>
								<th class="col-xs-1" style="width: 20%;">Data Jogada</th>
								<th class="col-xs-1" id="tipo-titulo" style="width: 20%;">Tempo</th>
							</tr>
						</thead>
						<tbody>
							<!-- repetição alunos javascrit -->
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script type="text/javascript" src="/TISIV/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/TISIV/js/jquery.maskedinput.min.js"></script>
	<script type="text/javascript" src="/TISIV/sweetalert-master/dist/sweetalert.min.js"></script>
	<script src="/TISIV/js/rank.js"></script>	
	<script src="/TISIV/js/autenticacao.js"></script>
</body>

</html>