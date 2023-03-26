<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Actividad</title>
    <link rel='stylesheet' type='text/css' media='screen' href='css/bootstrap.min.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/style.css'>
    <link rel="icon" href="src/icono_app.png">
</head>

<body>
    <?php
    include("verificar_sesion_terapeuta.php");
    include("nav_ter.php");
    include("conecta.php");
    $bd = conectar();
    ?>


    <div class="container">
        <div class="row" id="archivos">


            <?php

            $id_actividad = $_POST["id_actividad"];
            

            $sql = 'DELETE FROM actividades WHERE id_actividad LIKE("'.$id_actividad.'")';


            $res = false;
            try {
                $res = mysqli_query($bd, $sql);
                if (!$res) {
                    echo "<div class='container'><div class='alert alert-danger' role='alert'><b>Error1 :</b><br>Actividad No Eliminada!, transacción abortada<br>" . mysqli_error($bd) . "</div></div>";
                } else {
                    echo "<div class='container'><div class='alert alert-success' role='alert'><b>Información</b><br>Actividad Eliminada con éxito!!</div></div>";
                    echo '<div class="container text-center"><a class="btn btn-success" href="listar_terapias_ter.php">Volver</a><div><div>';
                }
            } catch (Exception $e) {
                echo "<div class='container'><div class='alert alert-danger' role='alert'><b>Error2 :</b><br>Actividad No Eliminada!, transacción abortada<br>" . $e->getMessage() . "</div></div>";
                echo '<div class="container text-center"><a class="btn btn-danger" href="terapia.php">Cancelar</a><div><div>';
            }
            
            mysqli_close($bd);
            ?>


        </div>

    </div>







    <script src='js/popper.min.js'></script>
    <script src='js/bootstrap.min.js'></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src='js/script.js'></script>
</body>

</html>