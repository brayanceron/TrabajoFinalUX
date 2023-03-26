<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Terapia</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/bootstrap.min.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/style.css'>
    <link rel="icon" href="src/icono_app.png">
</head>

<body>
    <?php
    include("verificar_sesion_terapeuta.php");
    include("nav_ter.php");
    ?>
    <br>
    <div class="container">
        <form action="addterapia2.php" method="POST">
            <input type="hidden" name="ced_tera" value="<?php echo $_SESSION["cedula_terapeuta"];?>">
            <div class="row justify-content-md-center">

                <div class="col-4">

                    <h3>Registrar Nueva Terapia</h3>

                    <div class="mb-3">
                        <label for="nombre_terapia" class="form-label">Nombre de la terapia</label>
                        <input type="text" class="form-control" id="nombre_terapia" name="nombre_terapia" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion_terapia" class="form-label">Descripcion</label>
                        <input type="text" class="form-control" id="descripcion_terapia" name="descripcion_terapia" required>
                    </div>

                </div>




                <div class="col-9">
                    <h5 class="text-center"> Integrantes</h5>

                    <div id="div_integrantes">



                    </div>

                    <input type="button" class="btn btn-primary"   data-bs-toggle="modal" data-bs-target="#busc" value="Agregar Integrante" id="btn_adduser">



                    <!---------------------------------------Modal Ventana de dialogo---------------------------------------->
                    <div class="modal" tabindex="-1" id="busc">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Buscar Usuario</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">


                                    <div class="container">
                                        <div class="row justify-content-md-center">
                                            <div class="col-10">

                                                <h5 class="text-center">Integrante</h5>

                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Buscar por nombre</label>
                                                    <input type="text" class="form-control" id="txt_busc_nombre" minlength="5" maxlength="50" placeholder="Digite almenos 5 letras">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Buscar por cedula</label>
                                                    <input type="number" class="form-control" id="txt_busc_cedula" minlength="3" maxlength="10" min="3" placeholder="Digite almenos 3 digitos">
                                                </div>

                                                <input type="button" class="btn btn-primary" value="Buscar" id="btn_buscar_usu">

                                                <br><br>
                                                <div id="div_busqueda_usuarios">

                                                </div>


                                            </div>
                                        </div>
                                    </div>



                                </div>
                                
                            </div>
                        </div>
                    </div>


                </div>



                <div class="col-4 text-center" >
                    <button type="submit" class="btn btn-success">Registrar</button>
                </div>



            </div>








        </form>

    </div>

    </div>



    <script src='js/popper.min.js'></script>
    <script src='js/bootstrap.min.js'></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src='js/script.js'></script>
</body>

</html>