<?php
	include '../menu.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/TISIV/bootstrap-3.3.5-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/TISIV/sweetalert-master/dist/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="/TISIV/css/bootstrap_input.css">
    <link rel="stylesheet" type="text/css" href="/TISIV/css/style.css">
	
	<script>
		var id_pergunta = <?php echo json_encode($_GET['idpergunta']); ?>;
		$('#certa-sel-pergunta').selectpicker('render');
	</script>
</head>

<body onBeforeUnload="loadOut();">
	<div class="container" style="min-width: 700px;">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading" >
                    <label for="nova-pergunta" class="control-label">Adicionar Nova Pergunta:</label>
				</div>
				<fieldset>
					<table class="table header-fixed" center>
						<tr>
							<td class="col-xs-1" style="width: 80%;">
								<label for="enunciado-nova-pergunta" class="control-label">Enunciado:</label>
								<div class="form-group" id="enunciado-nova-pergunta-form">
									<input type="text" class="form-control" id="enunciado-nova-pergunta">
								</div>
							</td>
							<td class="col-xs-1" style="width: 20%;">
								<label for="dificuldade-nova-pergunta" class="control-label">Dificuldade</label>
								<div class="form-group" id="dificuldade-nova-pergunta-form">
									<select class="form-control" id="dificuldade-nova-pergunta">
										<option value="0"></option>
										<option value="F">Fácil</option>
										<option value="M">Médio</option>
										<option value="D">Difícil</option>
									</select>
								</div>
							</td>
						</tr>
					<table class="table header-fixed" center>
						<tr>
							<td class="col-xs-1" style="width: 29%;">
								<label for="tipo-resposta-correta" class="control-label">Nova/Existente</label>
								<select class="form-control" id="tipo-resposta-correta">
									<option value="0">Nova Resposta Correta</option>
									<option value="1">Resposta Correta Existente</option>
								</select>
							</td>
							<td class="col-xs-1" style="width: 70%;">
								<label for="certa-nova-pergunta" class="control-label">Resposta Correta:</label>
								<div class="form-group" id="certa-nova-pergunta-form" hidden="true">
									<input type="text" class="form-control" id="certa-nova-pergunta">
								</div>
								<div class="form-group" id="certa-sel-pergunta-form">
									<select class="form-control" id="certa-sel-pergunta">
										<option value="0">Selecionar...</option>
									</select>
								</div>
							</td>
						</tr>
					</table>
					<table center>
						<tr>
							<td class="col-xs-1" style="width: 80%;">
								<label for="resposta-errada-nova-pergunta" class="control-label">Adicionar nova resposta errada:</label>
								<div class="form-group" id="resposta-errada-nova-pergunta-form">
									<input type="text" class="form-control" id="resposta-errada-nova-pergunta">
								</div>
							</td>
							<td class="col-xs-1" style="width: 20%;">
								<button type="button"
										class="btn btn-primary"
										id="Nova_Resposta_Errada"
										style="display: inline-block; margin-top: 8px;">
									Adicionar
								</button>
							</td>
						</tr>
						<tr>
							<td class="col-xs-1" style="width: 100%;">
								<label for="sel2">Respotas Erradas:</label>
								<div class="form-group" id="erradas-nova-pergunta-form">
									<select multiple class="form-control" id="erradas-nova-pergunta">
									</select>
								</div>
							</td>
						</tr>
						
					</table>
					
					<table class="table header-fixed" center>
						<button type="button"
								class="btn btn-primary"
								id="Salvar_Pergunta_Cancelar"
								style="margin-left: 10px; margin-right: 15px; float: right; display: block;">
							Cancelar
						</button>
	
						<button type="button"
								class="btn btn-primary"
								id="Salvar_Pergunta"
								style="float: right; display: block; margin-right: 15px;">
							Salvar Pergunta
						</button>
					</table>
				</fieldset>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script type="text/javascript" src="/TISIV/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/TISIV/sweetalert-master/dist/sweetalert.min.js"></script>
	<script src="/TISIV/js/perguntaEditar.js"></script>	
</body>

</html>