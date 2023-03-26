<?php
    session_start();
    $usuario="";
    if (!isset($_SESSION["cedula_usuario"]) ){
         header("Location: login.php?ban=2");   
    }
    else{
        //$cedula_usuario=$_SESSION["cedula_usuario"];
        //$nombre_usuario=$_SESSION["nombre_usuario"];
    }
?>