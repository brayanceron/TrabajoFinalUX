<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terapia</title>
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
    $nombre_terapia = $_POST["nombre_terapia"];
    $id_terapia = $_POST['id_terapia'];

    $usuario = "";
    $cedula_usuario = "";

    ?>



    <div class="container">
        <div class="row ">

            <div class="col-12">
                <h1 class="text-center"><?php echo $nombre_terapia; ?></h1>
            </div>


            <?php
            $sql = "SELECT DISTINCT nombre_actividad,nom_terapeuta,descripcion_actividad,id_actividad,terapias.id_terapia FROM actividades JOIN terapias on actividades.id_terapia=terapias.id_terapia JOIN terapeutas on terapias.ced_terapeuta=terapeutas.ced_terapeuta
                where actividades.id_terapia like('" . $id_terapia . "') ORDER BY fecha_actividad";
            $datos = mysqli_query($bd, $sql);
            $i = true;
            while ($arr = mysqli_fetch_array($datos)) {
                echo '<div class="col-10 actividad">';
                echo '  <h5>Actvidad: ' . $arr[0] . '</h5>';
                echo '  <h6>Terapeuta: ' . $arr[1] . '</h6>';
                //echo '  <h6 class="card-text">Fecha: ' . $arr[1] . '</h6><br>';
                echo '  <br><p>' . $arr[2] . '</p>';
                echo '  <form action="actividad.php" method="POST" class="act_enlinea"><input type="hidden" name="id_actividad" value="' . $arr[3] . '">';
                echo '  <input type="hidden" name="id_terapia" value="' . $arr[4] . '">';
                echo '  <input type="image" src="src/ver_mas_actividad.png" alt="" ></form>';
                echo '  <form action="eliminar_actividad.php" method="POST" class="act_enlinea"><input type="hidden" name="id_actividad" value="' . $arr[3] . '"><input type="image" src="src/eliminar_actividad.png" width="20px" alt="" id="btn_eliminar_actividad" value="HOLA"></form>';
                echo '</div>';

                if ($i == true) {
                    echo '<div class="col-12" id="menu_actividad">';
                    echo '  <h5>Menú</h5>';
                    echo '   <a href="#" data-bs-toggle="modal" data-bs-target="#diag_actividad" ><img src="src/icono_crear.png" alt=""> </a> <span>Nueva Actividad</span><br>';
                    echo '   <a href="#" data-bs-toggle="modal" data-bs-target="#diag_participantes" ><img src="src/icono_usuarios.png" alt=""> </a> <span>Miembros</span><br>';
                    echo '   <a href="#" data-bs-toggle="modal" data-bs-target="#diag_adicionar_usuario" ><img src="src/icono_addusuario.png" alt=""> </a> <span>Agregar</span><br>';

                    echo '  </div>';
                    $i = false;
                }
            }
            mysqli_close($bd);
            ?>





            <!---------------------------------------Modal Ventana de dialogo Nueva actividad---------------------------------------->
            <div class="modal" tabindex="-1" id="diag_actividad">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Nueva Actividad</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <?php
                            echo '<form method="POST" action="cargar_multimedia_actividad.php" enctype="multipart/form-data">';
                            echo '  <input type="hidden" name="id_terapia" value="' . $id_terapia . '">';
                            include("diag_actividad.php");
                            echo '</form>';
                            ?>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!---------------------------------------Modal Ventana de dialogo Participantes---------------------------------------->
            <div class="modal" tabindex="-1" id="diag_participantes">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"> <?php echo $nombre_terapia ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">


                            <div class="container">
                                <div class="row justify-content-md-center">
                                    <div class="col-10">

                                        <h5 class="text-center">Miembros</h5>


                                        <div id="integrantes_terapia">
                                            <?php

                                            $bd = conectar();
                                            $sql = "SELECT  usuarios.ced_usu,nom_usu FROM terapias JOIN usuarios USING(ced_usu) WHERE id_terapia LIKE('" . $id_terapia . "')";
                                            $datos = mysqli_query($bd, $sql);
                                            $i = true;
                                            while ($arr = mysqli_fetch_array($datos)) {

                                                echo '<div class="usu_integrado" id="' . $arr[0] . '" >';
                                                echo '   <img src="src/img_p1.jpg" alt="" id="img_usu_integrado">';
                                                echo '   <p id="n_usu_integrado">' . $arr[1] . '</p>';
                                                echo '   <a href="#"><img src="src/icono_cerrar.png" alt="" id="c_usu_integrado" data-bs-toggle="modal" data-bs-target="#diag_resultado_eliminar" onclick="boton_default_eliminar_usuario(\'' . $arr[0] . '\',\''.$arr[1].'\',\''.$id_terapia.'\');"></a>';
                                                echo '   <input type="hidden" name="' . $arr[1] . '" value="' .  $arr[0] . '">';
                                                echo ' </div>';
                                            }
                                            mysqli_close($bd);
                                            ?>

                                        </div>


                                    </div>
                                </div>
                            </div>

                      

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!---------------------------------------Modal Ventana de dialogo adicionar usuario---------------------------------------->
            <div class="modal" tabindex="-1" id="diag_adicionar_usuario">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Añadir Nuevos Miembros</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">


                            <div class="container">
                                <div class="row justify-content-md-center">
                                    <div class="col-10">

                                        <h5 class="text-center">Buscar Usuario</h5>

                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Buscar por nombre</label>
                                            <input type="text" class="form-control" id="txt_busc_nombre_nuevo_usu" minlength="5" maxlength="50" placeholder="Digite almenos 5 letras">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Buscar por cedula</label>
                                            <input type="number" class="form-control" id="txt_busc_cedula_nuevo_usu" minlength="3" maxlength="10" min="3" placeholder="Digite almenos 3 digitos">
                                        </div>

                                        <input type="hidden" id="id_terapia_nuevo_usuario" value="<?php echo  $id_terapia; ?>">

                                        <input type="button" class="btn btn-primary" value="Buscar" id="btn_buscar_nuevo_usu">

                                        <br><br>
                                        <div id="div_busqueda_nuevo_usuarios">

                                        </div>


                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
            <!---------------------------------------Resultado Agregacion---------------------------------------->
            <div class="modal" tabindex="-1" id="diag_resultado_agregar">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content" id="resp_diag_resultado_agregar">

                        

                    </div>
                </div>
            </div>
            <!---------------------------------------Resultado Eliminar---------------------------------------->
            <div class="modal" tabindex="-1" id="diag_resultado_eliminar">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content" id="resp_diag_resultado_eliminar">

                        

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