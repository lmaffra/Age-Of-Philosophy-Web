<?php
    include ("../backend/ClassPergunta.php");
    $class = new ClassPergunta();
	
    $resultado = $class->todasPerguntas();
    echo json_encode($resultado);
?>