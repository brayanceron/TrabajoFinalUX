<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
    <link rel='stylesheet' type='text/css' media='screen' href='css/bootstrap.min.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/style.css'>
    <link rel="icon" href="src/icono_app.png">
</head>

<body>


    
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-5">


                <form action="registrar2.php" method="POST" enctype="multipart/form-data">

                    <div id="div_form_login">
                        <br>
                        <h3 class="text-center">Registrar</h3><br>
                        <div class="mb-3">
                            <label for="" class="form-label">Número de Cédula</label>
                            <input type="number" class="form-control" id="txt_cedula" name="txt_cedula" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Nombres y apellidos</label>
                            <input type="text" class="form-control" id="txt_nombres" name="txt_nombres" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Fecha Nacimiento</label>
                            <input type="date" class="form-control" id="txr_fecha" name="txr_fecha" required>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Teléfono</label>
                            <input type="number" class="form-control" id="txt_telefono" name="txt_telefono" required>
                        </div>

                        <div class="mb-3">
                        <label for="slt_rol" class="form-label">Rol</label>
                        <select class="form-select" aria-label="Default select example" name="slt_rol" required> 
                            <option selected value="u">Usuario</option>
                            <option value="t">Terapeuta</option>
                        </select>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Género</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="rbt_genero" id="rbt_genero" value="M">
                                <label class="form-check-label" for="rbt_genero">Masculino</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="rbt_genero" id="rbt_genero" value="F" checked>
                                <label class="form-check-label" for="rbt_genero">Femenino</label>
                            </div>
                        </div>

                        <br>
                        <div class="mb-3">
                            <label for="txt_archivo" class="form-label">Imagen</label>
                            <input type="file" class="form-control" id="fle_archivo" name="fle_archivo" required>
                        </div>




                        <div class="mb-3">
                            <label for="" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="txt_pass" name="txt_pass" required>
                        </div>
                        

                        <button type="submit" class="btn btn-primary">Registrar</button><br><br>
                    </div>
                </form>
                <br><br>


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