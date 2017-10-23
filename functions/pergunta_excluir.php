<?php
    include ("../backend/ClassPergunta.php");
    $class = new ClassPergunta();

    $id = $_REQUEST;
    
    if($class->excluirPergunta($id)){
        $result = true;
        echo $result;
    }else{
        $result = false;
        echo $result;
    }
?>