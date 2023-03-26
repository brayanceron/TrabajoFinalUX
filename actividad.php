<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad</title>
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

            $id_actividad = $_POST["id_actividad"];
            $id_terapia = $_POST["id_terapia"];


            $sql = 'SELECT DISTINCT nombre_actividad,fecha_actividad,nombre_terapia,multimedia,descripcion_actividad FROM actividades JOIN terapias using(id_terapia) WHERE id_actividad LIKE(' . $id_actividad . ') AND id_terapia like(' . $id_terapia . ')';
            $datos = mysqli_query($bd, $sql);

            $actividad = "";
            $fecha = "";
            $terapia = "";
            $descripcion_actividad="";
            $b = true;
            while ($arr = mysqli_fetch_array($datos)) {
                $actividad = $arr[0];
                $fecha = $arr[1];
                $terapia = $arr[2];
                $descripcion_actividad=$arr[4];
                if ($b == true) {
                    echo '<div class="col-12">';
                    echo '<h3 class="text-center">Actividad: ' . $actividad . ' </h3>';
                    echo '<p>Fecha:  ' . $fecha . '</p>';
                    echo '<p>Terapia: ' . $terapia . '</p>';
                    //echo '' . $id_actividad . ',' . $id_terapia;
                    echo '</div>';
                    echo '<div class="col-12">Documentos cargados: </div>';
                    $b = false;
                }


                if (!empty($arr[3])) {
                    echo '<div class="col-auto archivo" id="'.substr($arr[3], 27).'">';
                    if (stristr($arr[3], ".") == '.txt') {
                        echo '<img src="src/iconos_archivos/icon_txt.png" class="cont_actividad">';
                    } else if (stristr($arr[3], ".") == '.docx') {
                        echo '<img src="src/iconos_archivos/icon_word.png" class="cont_actividad">';
                    } else if (stristr($arr[3], ".") == '.xlsx' or stristr($arr[3], ".") == '.xls') {
                        echo '<img src="src/iconos_archivos/icon_exel.png" class="cont_actividad">';
                    } else if (stristr($arr[3], ".") == '.pptx' or stristr($arr[3], ".") == '.pptx') {
                        echo '<img src="src/iconos_archivos/icon_power.png" class="cont_actividad">';
                    } else if (
                        stristr($arr[3], ".") == '.mp3' or stristr($arr[3], ".") == '.m4a' or
                        stristr($arr[3], ".") == '.waz' or stristr($arr[3], ".") == '.wma'
                    ) {
                        echo '<img src="src/iconos_archivos/icon_musica.png" class="cont_actividad">';
                    } else if (stristr($arr[3], ".") == '.pdf') {
                        echo '<img src="src/iconos_archivos/icon_pdf.png" class="cont_actividad">';
                    } else if (
                        stristr($arr[3], ".") == '.png' or stristr($arr[3], ".") == '.jpg' or
                        stristr($arr[3], ".") == '.jpeg' or stristr($arr[3], ".") == '.gif' or
                        stristr($arr[3], ".") == '.bmp'
                    ) {
                        echo '<img src="' . $arr[3] . '" class="cont_actividad">';
                    } else if (
                        stristr($arr[3], ".") == '.avi' or
                        stristr($arr[3], ".") == '.mp4' or stristr($arr[3], ".") == '.avi' or
                        stristr($arr[3], ".") == '.wmv'
                    ) {
                        echo '<img src="src/iconos_archivos/icon_video.png" class="cont_actividad">';
                    } else {
                        echo '<img src="src/iconos_archivos/icon_archivo.png" class="cont_actividad">';
                    }

                    echo '<br><p class="nombre_archivo">' . substr($arr[3], 27).'</p>';
                    echo '<form method="POST" action="eliminar_multimedia.php">';
                    echo '<img src="src/icono_cerrar.png" alt="" id="c_usu_integrado" onclick="boton_default_eliminar_archivo(\''.$id_actividad.'\',\''.$id_terapia.'\',\''.substr($arr[3], 27).'\');">';
                    echo '</form>';
                    echo '</div>';
                }
            }
            mysqli_close($bd);
            ?>

            <div class="col-12">
                <hr>
            </div>


        </div>


        <div class="row">
            <div class="col-4">
                <div>
                    <h4>Subir Más Contenido</h4>
                    <form method="POST" action="cargar_mas_multimedia_actividad.php" enctype="multipart/form-data">
                        <input type="hidden" name="id_terapia" value="<?php echo $id_terapia; ?>">
                        <input type="hidden" name="id_actividad" value="<?php echo $id_actividad; ?>">
                        <input type="hidden" name="descripcion_actividad" value="<?php echo $descripcion_actividad; ?>">
                        <input type="hidden" name="nombre_actividad" value="<?php echo $actividad; ?>">
                        <div class="mb-3">
                            <label for="formFileMultiple" class="form-label">Subir Más Contenido</label>
                            <input class="form-control" type="file" name="mas_archivos[]" id="mas_archivos[]" multiple="" required>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Cargar" id="btn_buscar_usu">
                    </form>
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