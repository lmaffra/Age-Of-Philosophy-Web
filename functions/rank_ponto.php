<?php
    include ("../backend/ClassRank.php");
    $class = new ClassRank();
	
    $idTurma= $_GET ['idturma'];
    
    $resultado = $class->rankPonto($idTurma);
    echo json_encode($resultado);
?>