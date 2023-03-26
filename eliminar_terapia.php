<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Terapia</title>
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

            $id_terapia = $_POST["id_terapia"];
            

            $sql0 = 'DELETE FROM actividades WHERE id_terapia LIKE("'.$id_terapia.'")';
            $sql1 = 'DELETE FROM terapias WHERE id_terapia LIKE("'.$id_terapia.'")';

            $res0 = false;
            $res1 = false;
            try {
                $res0 = mysqli_query($bd, $sql0);
                $res1 = mysqli_query($bd, $sql1);
                if (!$res0) {
                    echo "<div class='container'><div class='alert alert-danger' role='alert'><b>Error1 :</b><br>Actividades de la terapia No Eliminadas!, transacción abortada<br>" . mysqli_error($bd) . "</div></div>";
                } else {
                    echo "<div class='container'><div class='alert alert-success' role='alert'><b>Información</b><br>Actividades Eliminadas con éxito!!</div></div>";
                    echo '<div class="container text-center"><a class="btn btn-success" href="listar_terapias_ter.php">Volver</a><div><div>';
                }
                if (!$res1) {
                    echo "<div class='container'><div class='alert alert-danger' role='alert'><b>Error1 :</b><br>Terapia No Eliminada!, transacción abortada<br>" . mysqli_error($bd) . "</div></div>";
                } else {
                    echo "<div class='container'><div class='alert alert-success' role='alert'><b>Información</b><br>Terapia Eliminada con éxito!!</div></div>";
                    echo '<div class="container text-center"><a class="btn btn-success" href="listar_terapias_ter.php">Volver</a><div><div>';
                }
            } catch (Exception $e) {
                echo "<div class='container'><div class='alert alert-danger' role='alert'><b>Error2 :</b><br>Terapia No Eliminada!, transacción abortada<br>" . $e->getMessage() . "</div></div>";
                echo '<div class="container text-center"><a class="btn btn-danger" href="listar_terapias_ter.php">Cancelar</a><div><div>';
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