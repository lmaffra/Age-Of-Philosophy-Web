<?php
    include ("../backend/ClassTurma.php");
    $class = new ClassTurma();
	
    $resultado = $class->todosTurmas();
    echo json_encode($resultado);
?>