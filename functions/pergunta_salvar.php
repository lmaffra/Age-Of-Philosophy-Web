<?php
    include ("../backend/ClassPergunta.php");
    $class = new ClassPergunta();
	
	$pergunta = $_REQUEST;
    
    if($class->editarPergunta($pergunta)){
        $result = true;
        echo $result;
    }else{
        $result = false;
        echo $result;
    }
?>