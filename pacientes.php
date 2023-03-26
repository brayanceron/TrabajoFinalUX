<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pacientes</title>
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
    $usuario = "";
    $cedula_tera = $_SESSION["cedula_terapeuta"];

    ?>

    <div class="container">
        <div class="row justify-content-md-center">


            <div class="col-12">
                <h3 class="text-center">Mis Pacientes</h3>
            </div>
            <br><br><br>


            <table class="table table-success  table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Cédula</th>
                        <th scope="col">Género</th>
                        <th scope="col">Terapia</th>
                        <th scope="col">Fecha Nacimiento</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Detalles</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT DISTINCT ced_usu,nom_usu,genero_usu,fech_nacimiento,tel_usu,epicrisis,nombre_terapia from usuarios JOIN terapias USING(ced_usu) where ced_terapeuta like('" . $cedula_tera . "')";
                    $datos = mysqli_query($bd, $sql);
                    while ($arr = mysqli_fetch_array($datos)) {
                        echo "<tr>";
                        echo "  <td>$arr[1]</td>";
                        echo "  <td>$arr[0]</td>";                        
                        echo "  <td>$arr[2]</td>";
                        echo "  <td>$arr[6]</td>";
                        echo "  <td>$arr[3]</td>";                                       
                        echo "  <td>$arr[4]</td>";
                        echo "  <td>$arr[5]</td>";
                        echo "</tr>";
                    }
                    mysqli_close($bd);
                    ?>
                </tbody>
            </table>


                    <a href="rpt_usuarios.php">Generar PDF</a>













        </div>
    </div>






    <script src='js/popper.min.js'></script>
    <script src='js/bootstrap.min.js'></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src='js/script.js'></script>
</body>

</html>