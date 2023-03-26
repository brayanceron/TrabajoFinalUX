<?php
    session_start();
    $_SESSION["cedula_terapeuta"]="";
    $_SESSION["nombre_terapeuta"]="";
    
    session_destroy();
    session_destroy();
    header("Location: login.php");
?>