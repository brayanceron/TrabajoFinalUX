<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video</title>
    <link rel='stylesheet' type='text/css' media='screen' href='css/bootstrap.min.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/style.css'>
    <link rel="icon" href="src/icono_app.png">
</head>

<body id="reproduccion">


    <?php
    include("verificar_sesion_usuario.php");
    include("conecta.php");
    $bd = conectar();
    $id_terapia = $_POST['id_terapia'];
    $cedula_usu = $_POST['cedula_usu'];

    //$sql = "SELECT DISTINCT multimedia FROM actividades JOIN terapias USING(id_terapia) WHERE terapias.id_terapia LIKE('".$id_terapia."') AND ced_usu LIKE('".$cedula_usu."')";
    //$datos = mysqli_query($bd, $sql);
    //$i = true;
    //while ($arr = mysqli_fetch_array($datos)) {
    // echo '  <h5>Actvidad: ' . $arr[0] . '</h5>';
    //}
    ?>

    <input type="hidden" id="id_terapia" value="<?php echo $id_terapia; ?>">
    <input type="hidden" id="cedula_usu" value="<?php echo $cedula_usu; ?>">

    <div class="menu_opciones_usuario">
        <br><br>
        <div id="cont_btn_reproducir_nuevos">
            <img src="src/icono_reproducir_1.png" alt="" id="btn_reproducir_nuevos">
        </div>

        <br><br><br>
        <!--<div>
            <p class="text-center" id="text_brn_reproducir">Repasar Lecciones</p>
            <img src="src/icono_ver_videos.png" alt="" id="btn_reproducir_nuevos">
        </div>
    -->
    </div>


    <div class="panel_reproduccion">
        <video id="video_reproducir" src="" buffer>

        </video>
        <div id="opciones_reproduccion">
            <a href="#" id="anterior_video" class="opt_contoles">< anterior</a>
            <a href="#" id="pausar_reproducir" class="opt_contoles">Pausar/reproducir</a>
            <a href="#" id="siguiente_video" class="opt_contoles">Siguiente ></a>
            <a href="#"  id="btn_reiniciar"  class="opt_contoles" onclick="location.reload()">Repetir</a>
            <!--<input type="button" value="parar" id="btn_reiniciar">-->
        </div>
    </div>

    <script>
        document.getElementById("pausar_reproducir").style.animationPlayState = "paused";
        document.getElementById("anterior_video").style.animationPlayState = "paused";
        document.getElementById("siguiente_video").style.animationPlayState = "paused";
        document.getElementById("btn_reiniciar").style.animationPlayState = "paused";
    </script>
    <script src='js/popper.min.js'></script>
    <script src='js/bootstrap.min.js'></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src='js/script.js'></script>
</body>

</html>