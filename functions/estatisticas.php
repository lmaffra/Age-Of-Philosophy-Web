<?php
    include ("../backend/ClassEstatisticas.php");
    $class = new ClassEstatisticas();
	
    $resultado = $class->carregarEstatisticas();
    echo json_encode($resultado);
?>