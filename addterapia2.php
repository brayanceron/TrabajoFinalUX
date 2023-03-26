<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' type='text/css' media='screen' href='css/bootstrap.min.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/style.css'>
</head>
<body>
   




<?php
include("verificar_sesion_terapeuta.php");
include("conecta.php");
include("nav_ter.php");
$bd = conectar();
$nombre_terapia = $_POST['nombre_terapia'];
$descripcion_terapia = $_POST['descripcion_terapia'];
$cedula_terapeuta = $_POST['ced_tera'];
$id_t =date("dmhis");
$id=strval($id_t);
$datos="";
$datos2="";
    $i = 0;
    if (!empty($_POST)) {
        foreach ($_POST as $campo => $valor) {


            if ($i >= 3) {
                $sql = 'INSERT INTO terapias(id_terapia,nombre_terapia,descripcion_terapia,ced_usu,ced_terapeuta,estado_terapia) VALUES("'.$id.'","'.$nombre_terapia.'","'.$descripcion_terapia.'","'.$valor.'","'.$cedula_terapeuta.'","ACTIVA")';
                
                $datos = mysqli_query($bd, $sql);
                //echo " " . $campo . " = " . $valor . "<br>";
            }
            $i++;
        }
        $sql2 ='INSERT INTO actividades(id_actividad,id_terapia,descripcion_actividad,nombre_actividad) VALUES("'.$id.'","'.$id.'","Hola, Bienvenido a '.$nombre_terapia.', Toda es listo para empezar esperamos contar con tigo","Bienvenida")';
        $datos2 = mysqli_query($bd, $sql2);



        if (!$datos) {
            echo "<div class='container'><div class='alert alert-danger' role='alert'><b>Error</b><br> Error Inesperado, Debe existir por lo menos un participante en la terapia, transacción abortada<br>" . mysqli_error($bd) . "</div></div>";
            echo '<div class="container text-center"><a class="btn btn-danger" href="addterapia.php">Volver</a><div><div>';
        } else {
            echo "<div class='container'><div class='alert alert-success' role='alert'><b>Información</b><br>Terapia registrada exitosamente!!</div></div>";
            echo '<div class="container text-center"><a class="btn btn-success" href="addterapia.php">Volver</a><div><div>';
        }
        mysqli_close($bd);

    } else // $_POST is empty.
    {
        echo "No se han recibido datos";
        mysqli_close($bd);
    }
?>








<script src='js/popper.min.js'></script>
    <script src='js/bootstrap.min.js'></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src='js/script.js'></script>
</body>
</html>

