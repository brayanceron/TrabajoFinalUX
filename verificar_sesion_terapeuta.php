<?php
    session_start();
    $usuario="";
    if (!isset($_SESSION["cedula_terapeuta"]) ){
         header("Location: login.php?ban=2");   
    }
    else{
        //$cedula_terapeuta=$_SESSION["cedula_terapeuta"];
        //$nombre_terapeuta=$_SESSION["nombre_terapeuta"];
    }
?>