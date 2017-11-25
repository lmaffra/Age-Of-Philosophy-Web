<?php
    include ("../backend/ClassPergunta.php");
    $class = new ClassPergunta();
	
    $id = $_GET ['idpergunta'];
    
    $resultado = $class->carregarPergunta($id);
    echo json_encode($resultado);
?>