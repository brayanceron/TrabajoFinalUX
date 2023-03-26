<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Home</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/bootstrap.min.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/style.css'>
    <link rel="icon" href="src/icono_app.png">
</head>

<body>

<a href="cerrar_sesion_usu.php"><img src="src/btn_cerar_sesion_user.png" class="icon_opt_user"></a>
                <a href="perfil_user.php"><img src="src/btn_perfil_user.png" class="icon_opt_user"></a>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">

                <br><br>
                <h1 class="text-center"> Escoge Una Terapia</h1>
                <br><br>                

            </div>
            
            
            <?php
                include("verificar_sesion_usuario.php");
                $cedula_usuario = $_SESSION["cedula_usuario"];
                //include("nav_user.php");
                include("conecta.php");
                $bd = conectar();



                $sql = 'SELECT DISTINCT id_terapia,nombre_terapia,nom_terapeuta FROM terapias JOIN terapeutas USING(ced_terapeuta) WHERE ced_usu LIKE("' . $cedula_usuario . '")';

                $datos = mysqli_query($bd, $sql);


                while ($arr = mysqli_fetch_array($datos)) {

                    echo '<div class="col-auto ">';
                    echo '<div class="cont_terapias">';
                    echo '  <div class="terapias_usu">';
                    echo '      <form action="terapia_usu.php" method="POST">';
                    echo '          <input type="hidden" name="id_terapia" value="' . $arr[0] . '">';
                    echo '          <input type="hidden" name="cedula_usu" value="' . $cedula_usuario . '">';
                    echo '          <input type="image" src="src/default_terapias.jpg" width="200px" alt="" class="img_red_terapia">';
                    echo '      </form>';
                    echo '  </div>';
                    echo '  <p class="text-center"> ' . $arr[1] . '</p>';
                    echo ' </div>';
                    echo ' </div>';
                }

                /*
                if (!$datos) {
                    echo "<div class='container'><div class='alert alert-danger' role='alert'><b>Error</b><br> Error Inesperado, Debe existir por lo menos un participante en la terapia, transacción abortada<br>" . mysqli_error($bd) . "</div></div>";
                    echo '<div class="container text-center"><a class="btn btn-danger" href="addterapia.php">Volver</a><div><div>';
                } else {
                    echo "<div class='container'><div class='alert alert-success' role='alert'><b>Información</b><br>Terapia registrada exitosamente!!</div></div>";
                    echo '<div class="container text-center"><a class="btn btn-success" href="addterapia.php">Volver</a><div><div>';
                }*/
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