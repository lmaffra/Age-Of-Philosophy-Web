<?php
    include ("../backend/ClassAluno.php");
    $class = new ClassAluno();
    
    $id = $_REQUEST;
    
    if($class->excluirAluno($id)){
        $result = true;
        echo $result;
    }else{
        $result = false;
        echo $result;
    }
?>