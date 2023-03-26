<?php
include("verificar_sesion_terapeuta.php");
    include("conecta.php");
    $bd = conectar();
    $id_Actividad=$_POST["id_actividad"];
    $id_terapia=$_POST["id_terapia"];
    $multimedia=$_POST["multimedia"];

    $sql = 'DELETE FROM actividades WHERE id_actividad LIKE("'.$id_Actividad.'") AND  id_terapia LIKE("'.$id_terapia.'") AND multimedia LIKE("src/multimedia_actividades/'.$multimedia.'")';
    
    $res = mysqli_query($bd,$sql);
    
    

    if (!$res){
        echo "<div class='alert alert-danger' role='alert'><b>Error</b><br>Registro no eliminado!!<br>" . mysqli_errno($bd) ." - " . mysqli_error($bd) . "</div>";
    }
    else {
        echo "<div class='alert alert-success' role='alert'><b>Información</b><br>Registro Eliminado con éxito!!</div>";
    }

    mysqli_close($bd);

?>