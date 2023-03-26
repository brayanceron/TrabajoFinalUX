<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
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
                <br><br>

                <?php
                $sql = 'SELECT nom_terapeuta,fech_nacimiento_terapeuta,especializacion,genero,telefono FROM terapeutas WHERE ced_terapeuta LIKE("' . $cedula_tera . '")';
                $datos = mysqli_query($bd, $sql);


                if (!$datos) {
                    echo "<div class='container'><div class='alert alert-danger' role='alert'><b>Error</b><br> Error Inesperado, Debe existir por lo menos un participante en la terapia, transacción abortada<br>" . mysqli_error($bd) . "</div></div>";
                    echo '<div class="container text-center"><a class="btn btn-danger" href="addterapia.php">Volver</a><div><div>';
                }
                mysqli_close($bd);
                $arr = mysqli_fetch_array($datos)

                ?>

                <div class="row justify-content-md-center">
                    <div class="col-3">
                        <div id="foto_perfil">
                            <img src="src/fotos_usuarios/<?php echo $cedula_tera.".jpg";?>" alt="">
                        </div>
                    </div>
                    <div class="col-6">
                        <div id="infor_perfil">
                            <table>
                                <tr>
                                    <td>
                                        <h5>Nombre: </h5>
                                    </td>
                                    <td><?php echo $arr[0]; ?></td>
                                    <td><input type="image" src="src/icon_modificar.png" id="btn_editar_nombre" class="btn btn-warning btn-sm" alt="" data-bs-toggle="modal" data-bs-target="#diag_nombre"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>Género: </h5>
                                    </td>
                                    <td><?php echo $arr[3]; ?></td>
                                    <td><input type="image" src="src/icon_modificar.png" id="btn_editar_sexo" class="btn btn-warning btn-sm" alt="" data-bs-toggle="modal" data-bs-target="#diag_sexo"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>Fecha Nacimiento: </h5>
                                    </td>
                                    <td><?php echo $arr[1]; ?></td>
                                    <td><input type="image" src="src/icon_modificar.png" id="btn_editar_fecha" class="btn btn-warning btn-sm" alt="" data-bs-toggle="modal" data-bs-target="#diag_fecha"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>Teléfono: </h5>
                                    </td>
                                    <td><?php echo $arr[4]; ?></td>
                                    <td><input type="image" src="src/icon_modificar.png" id="btn_editar_telefono" class="btn btn-warning btn-sm" alt="" data-bs-toggle="modal" data-bs-target="#diag_nombre"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>Especializacion: </h5>
                                    </td>
                                    <td><?php echo $arr[2]; ?></td>
                                    <td><input type="image" src="src/icon_modificar.png" id="btn_editar_espc" class="btn btn-warning btn-sm" alt="" data-bs-toggle="modal" data-bs-target="#diag_nombre"></td>
                                </tr>
                                <!--<tr>
                                    <td>
                                        <h5>Actualizar </h5>
                                    </td>
                                    <td>Fotografia</td>
                                    <td><input type="image" src="src/icon_modificar.png" id="btn_editar_espc" class="btn btn-warning btn-sm" alt="" data-bs-toggle="modal" data-bs-target="#diag_foto"></td>
                                </tr>-->
                            </table>

                        </div>
                    </div>
                </div>
















                <!---------------------------------------Modal Ventana de dialogo---------------------------------------->
                <div class="modal" tabindex="-1" id="diag_nombre">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Actualizar Valor</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <div class="container">
                                    <div class="row justify-content-md-center">
                                        <div class="col-10">


                                            <input type="hidden" name="atributo_modificar" id="atributo_modificar">
                                            <div class="mb-3">
                                                <label for="txt_busc_nombre" class="form-label" id="lbl_atributo"> </label>
                                                <input type="text" class="form-control" id="txt_valor_actializar">
                                            </div>
                                            <div class="mb-3">
                                                <input type="button" class="btn btn-primary" value="Actualizar" id="btn_actualizar">
                                            </div>

                                            <div class="mb-3">
                                                <label for="txt_busc_nombre" class="form-label" id="lbl_respuesta"> </label>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <!---------------------------------------Modal Ventana de dialogo genero---------------------------------------->
                <div class="modal" tabindex="-1" id="diag_sexo">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Actualizar Valor</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <div class="container">
                                    <div class="row justify-content-md-center">
                                        <div class="col-10">



                                            <input type="hidden" name="atributo_modificar_s" id="atributo_modificar_s">
                                            <div class="mb-3">

                                                <div class="mb-3">
                                                    <label for="txt_busc_nombre" class="form-label" id="lbl_atributo_s"> </label>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Genero</label>
                                                    <select class="form-select" aria-label="Default select example" id="slt_editar_sexo">
                                                        <option selected value="M">Masculino</option>
                                                        <option value="F">Femenino</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <input type="button" class="btn btn-primary" value="Actualizar" id="btn_actualizar_s">
                                        </div>

                                        <div class="mb-3">
                                            <label for="txt_busc_nombre" class="form-label" id="lbl_respuesta_s"> </label>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <!---------------------------------------Modal Ventana de dialogo fecha---------------------------------------->
                <div class="modal" tabindex="-1" id="diag_fecha">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Actualizar Valor</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <div class="container">
                                    <div class="row justify-content-md-center">
                                        <div class="col-10">



                                            <input type="hidden" name="atributo_modificar_f" id="atributo_modificar_f">
                                            <div class="mb-3">

                                                <div class="mb-3">
                                                    <label for="txt_busc_nombre" class="form-label" id="lbl_atributo_f"> </label>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Fecha</label>
                                                    <input type="date" name="slt_editar_fecha" id="slt_editar_fecha">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <input type="button" class="btn btn-primary" value="Actualizar" id="btn_actualizar_f">
                                        </div>

                                        <div class="mb-3">
                                            <label for="txt_busc_nombre" class="form-label" id="lbl_respuesta_f"> </label>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <!---------------------------------------Modal Ventana de dialogo fotogracia---------------------------------------->
                <div class="modal" tabindex="-1" id="diag_foto">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Actualizar Valor</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <div class="container">
                                    <div class="row justify-content-md-center">
                                        <div class="col-10">
                                            <div class="mb-3">

                                                <div class="mb-3">
                                                    <label for="txt_busc_nombre" class="form-label" id="lbl_atributo_f"> </label>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Fotografia</label>
                                                    <input type="file" class="form-control" name="slt_editar_fecha" id="slt_editar_fecha">
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <input type="button" class="btn btn-primary" value="Actualizar" id="btn_actualizar_foto">
                                            </div>

                                            <div class="mb-3">
                                                <label for="txt_busc_nombre" class="form-label" id="lbl_respuesta_foto"> </label>
                                            </div>

                                        </div>


                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>




















            </div>












        </div>
    </div>
    </div>







    <script src='js/popper.min.js'></script>
    <script src='js/bootstrap.min.js'></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src='js/script.js'></script>
</body>

</html>