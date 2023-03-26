<?php
    
    include("verificar_sesion_usuario.php.php");
    include("conecta.php");
    $bd = conectar();
    $id_terapia = $_POST['id_terapia'];
    $multimedia = $_POST['multimedia'];

    $sql = "UPDATE actividades SET actividad_vista='SI' WHERE  id_terapia LIKE('".$id_terapia."') AND multimedia LIKE('".$multimedia."')";

    $datos = mysqli_query($bd,$sql);

    mysqli_close($bd);


?>