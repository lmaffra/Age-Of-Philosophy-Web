<?php
    include ("../backend/ClassTurma.php");
    $class = new ClassTurma();

    $id = $_REQUEST;
    
    if($class->excluirTurma($id)){
        $result = true;
        echo $result;
    }else{
        $result = false;
        echo $result;
    }
?>