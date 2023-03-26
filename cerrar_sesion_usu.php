<?php
    session_start();
    $_SESSION["cedula_usuario"]="";
    $_SESSION["nombre_usuario"]="";
    
    session_destroy();
    session_destroy();
    header("Location: login.php");
?>