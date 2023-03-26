<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Ver terapias</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
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

    <br>
    <div class="container">
        <div class="row justify-content-md-center" id="div_terapias">
            <div class="col-12">
                <h3 class="text-center" >Mis Terapias</h3> <br><br>
            </div>




            <?php
            $sql = "select nombre_terapia,descripcion_terapia,ced_usu,ced_terapeuta,ced_usu_copia,estado_terapia from terapias";
            $datos = mysqli_query($bd, $sql);
            while ($arr = mysqli_fetch_array($datos)) {
                echo '<div class="col-6">';
                echo '<div class="card mb-3" style="max-width: 540px;">';
                echo '   <div class="row g-0">';
                echo '        <div class="col-md-4">';
                echo '            <img src="./src/default_terapias.jpg" class="img-fluid rounded-start" alt="...">';
                echo '       </div>';
                echo '        <div class="col-md-8">';
                echo '            <div class="card-body">';
                echo '                <h5 class="card-title">'.$arr[0].'</h5>';
                echo '                <p class="card-text">'.$arr[1].'</p>';
                echo '                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>';
                echo '                <button class="btn btn-info">Ver</button>';
                echo '            </div>';
                echo '        </div>';
                echo '    </div>';
                echo '</div>';

                echo '</div>';



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