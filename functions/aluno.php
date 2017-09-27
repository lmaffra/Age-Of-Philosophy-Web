<?php
    include ("../backend/ClassAluno.php");
    $class = new ClassAluno();
	
    $resultado = $class->todosAlunos();
    echo json_encode($resultado);
?>