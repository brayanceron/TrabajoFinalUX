<?php
    function conectar(){
        $bd = mysqli_connect("localhost","root","","agenda");
        if (!$bd){
            echo "<h3>Error de conexión</h3>Base de datos agenda no diponible";
            return NULL;
        }
        else{
            return $bd;
        }
    }
?>