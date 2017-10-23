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

</head>

<body onBeforeUnload="loadOut();">
	<div class="container" style="min-width: 700px;">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading" >
					<h4>Turmas</h4>	
                    <button type="button" 
                        class="btn btn-info btn"
                        data-toggle="modal" 
                        data-target="#novaTurmaModal" 
                        style="display: inline-block; float: right; display: block;">
                        Nova Turma
                    </button>	
					<table class="table table-striped table-hover header-fixed" id="turmas_table" center>
						<thead>
							<tr>
								<th class="col-xs-1" style="width: 10%;">ID</th>
								<th class="col-xs-1" style="width: 80%;">Turma</th>
								<th class="col-xs-1" style="width: 10%;">Editar</th>
								<th class="col-xs-1" style="width: 10%;">Excluir</th>
							</tr>
						</thead>
						<tbody>
							<!-- repetição turma javascrit -->
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script type="text/javascript" src="/TISIV/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/TISIV/sweetalert-master/dist/sweetalert.min.js"></script>
	<script src="/TISIV/js/turma.js"></script>	
</body>

</html>

<!-- Modal Nova Turma  -->
<div id="novaTurmaModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cadastro de Turma</h4>
            </div>
            <div class="modal-body">
                <label for="nomeNovaTurma">Turma:</label>
                <div class="form-group" id="nomeNovaTurma-form">
                    <input type="text" id="nomeNovaTurma" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" id="salvarNovaTurma">Salvar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<!-- Modal Editar Turma  -->
<div id="editarTurmaModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="tituloEditarTurma">Editar Turma</h4>
            </div>
            <div class="modal-body">
                <label for="nomeEditarTurma">Turma:</label>
                <div class="form-group" id="nomeEditarTurma-form">
                    <input type="text" id="nomeEditarTurma" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" id="salvarEditarTurma">Salvar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>