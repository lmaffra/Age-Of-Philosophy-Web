<?php
    include ("../backend/ClassResposta.php");
    $class = new ClassResposta();
	
	$resposta = $_REQUEST;
    
    if($class->cadastrarResposta($resposta)){
        $result = true;
        echo $result;
    }else{
        $result = false;
        echo $result;
    }
?>