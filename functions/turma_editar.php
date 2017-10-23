<?php
    include ("../backend/ClassTurma.php");
    $class = new ClassTurma();

    $turma = $_REQUEST;
    
    if($class->editarTurma($turma)){
        $result = true;
        echo $result;
    }else{
        $result = false;
        echo $result;
    }
?>