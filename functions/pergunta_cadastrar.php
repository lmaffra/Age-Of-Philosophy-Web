<?php
    include ("../backend/ClassPergunta.php");
    $class = new ClassPergunta();
	
	$pergunta = $_REQUEST;
    
    if($class->cadastrarPergunta($pergunta)){
        $result = true;
        echo $result;
    }else{
        $result = false;
        echo $result;
    }
?>