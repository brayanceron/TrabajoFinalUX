<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista terapia</title>
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
    $usuario="";
    $cedula_tera=$_SESSION["cedula_terapeuta"];

    ?>
    
    <div class="container">
        <div class="row justify-content-md-center">


            <div class="col-12">
                <h3 class="text-center">Mis Terapias</h3>
            </div>
            <br><br><br>




            <?php
            $sql = "select distinct id_terapia,nombre_terapia,descripcion_terapia,ced_terapeuta,estado_terapia from terapias where ced_terapeuta like('".$cedula_tera."%')";
            $datos = mysqli_query($bd, $sql);
            while ($arr = mysqli_fetch_array($datos)) {
                echo '<div class="col-4">';
                echo '<div class="card mb-3" style="max-width: 540px;">';
                echo '   <div class="row g-0">';
                echo '        <div class="col-md-4">';
                echo '            <img src="./src/default_terapias.jpg" class="img-fluid rounded-start foto_listar_terapias" alt="...">';
                echo '       </div>';
                echo '        <div class="col-md-8">';
                echo '            <div class="card-body">';
                echo '              <form  action="terapia.php" method="POST" class="act_enlinea">';
                echo '                <h5 class="card-title">' . $arr[1] . '</h5>';
                echo '                <p class="card-text">' . $arr[2] . '</p>';
                echo '                <p class="card-text"><small class="text-muted">'.$arr[4].'</p>';
                echo '                <input type="hidden" name="id_terapia" value="'.$arr[0].'">';
                echo '                <input type="hidden" name="nombre_terapia" value="'.$arr[1].'">';
                echo '                <button class="btn btn-info btn-sm">Ver</button> <a href="#"> </a>';
                echo '              </form> <form action="eliminar_terapia.php" method="POST" class="act_enlinea"><input type="hidden" name="id_terapia" value="' . $arr[0] . '"><input type="image" src="src/eliminar_actividad.png"  alt="" id="btn_eliminar_actividad"></form>';
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