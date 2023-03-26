<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel='stylesheet' type='text/css' media='screen' href='css/bootstrap.min.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/style.css'>
    <link rel="icon" href="src/icono_app.png">
</head>

<body>


    <br><br><br><br><br><br><br><br><br>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-4">


                <form action="login2.php" method="POST">

                    <div id="div_form_login">
                        <br>
                        <h3 class="text-center">Iniciar Sesión</h3><br>
                        <div class="mb-3">
                            <label for="" class="form-label">Cédula</label>
                            <input type="number" class="form-control" id="txt_cedula" name="txt_cedula">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="txt_pass" name="txt_pass">
                        </div>
                        <button type="submit" class="btn btn-primary">Entrar</button> <a href="registrar.php">Abrir una cuenta</a>
                        <br><br>
                    </div>
                </form>
                <?php
                if (isset($_GET["ban"])) { //ban existe
                    if ($_GET["ban"] == 1) {
                        echo "<p class='text-danger'>Credenciales Incorrectas</p>";
                    }
                    if ($_GET["ban"] == 2) {
                        echo "<p class='text-danger'>Acceso Restringido</p>";
                    }
                    if ($_GET["ban"] == 3) {
                        echo "<p class='text-danger'>Usuario ambiguo, Contactese con soporte</p>";
                    }
                    //else {
                    //    echo "<p class='text-danger'>Acceso no autorizado!!</p>";
                    //}
                }
                ?>

            </div>
        </div>
    </div>




    <script src='js/popper.min.js'></script>
    <script src='js/bootstrap.min.js'></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src='js/script.js'></script>

</body>

</html>