<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargar Multimedia</title>
    <link rel='stylesheet' type='text/css' media='screen' href='css/bootstrap.min.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/style.css'>
    <link rel="icon" href="src/icono_app.png">
</head>

<body>
    <?php
    include("verificar_sesion_terapeuta.php");
    include("conecta.php");
    include("nav_ter.php");
    $bd = conectar();

    $id_terapia = $_POST["id_terapia"];
    $id_nombre_actividad = $_POST["txt_nombreact"];
    $id_descripcion_Actividad = $_POST["txt_descripcionact"];
    $target_path = "No cargado";
    $id_u =date("dmhis");
    $id_unico=strval($id_u);

    foreach ($_FILES["archivos"]['tmp_name'] as $key => $tmp_name) {
        if ($_FILES["archivos"]["name"][$key]) {
            $filename = $_FILES["archivos"]["name"][$key];
            $source = $_FILES["archivos"]["tmp_name"][$key];

            $directorio = 'src/multimedia_actividades';


            $dir = opendir($directorio);
            $target_path = $directorio . '/' . $id_unico.$filename;


            if (move_uploaded_file($source, $target_path)) {
                //echo "El archivo $filename se ha almacenado en forma exitosa.<br>";
                $sql = 'INSERT INTO actividades(id_actividad,nombre_actividad,descripcion_actividad,id_terapia,multimedia) VALUES("'.$id_unico.'","' . $id_nombre_actividad . '","' . $id_descripcion_Actividad . '","' . $id_terapia . '","' . $target_path . '");';
                $datos = mysqli_query($bd, $sql);
                echo "<div class='container'><div class='alert alert-success' role='alert'><b>Información</b><br>Archivo $filename cargado satisfactoriamente!!</div></div>";
            } else {
                echo "<div class='container'><div class='alert alert-danger' role='alert'><b>Error</b><br> Error Inesperado, transacción abortada<br>" . mysqli_error($bd) . "</div></div>";
            }
            closedir($dir); //Cerramos el directorio de destino
        }
    }

    echo '<div class="container text-center"><a class="btn btn-primary" href="listar_terapias_ter.php">Volver</a><div><div>';
    mysqli_close($bd);
    ?>


<script src='js/popper.min.js'></script>
    <script src='js/bootstrap.min.js'></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src='js/script.js'></script>
</body>

</html>