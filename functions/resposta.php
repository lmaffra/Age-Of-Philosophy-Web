<?php
    include ("../backend/ClassResposta.php");
    $class = new ClassResposta();
	
    $resultado = $class->todasRespostas();
    echo json_encode($resultado);
?>