<?php
include("verificar_sesion_usuario.php");
include("conecta.php");
$bd = conectar();
$id_terapia = $_POST['id_terapia'];
$cedula_usu = $_POST['cedula_uso'];

$sql = "SELECT DISTINCT multimedia,fecha_actividad FROM actividades JOIN terapias USING(id_terapia) WHERE terapias.id_terapia LIKE('" . $id_terapia . "') AND ced_usu LIKE('" . $cedula_usu . "')  AND 
    (multimedia LIKE('%.mp4') OR multimedia LIKE('%.avi') OR multimedia LIKE('%.mkv') OR multimedia LIKE('%.flv') OR multimedia LIKE('%.mov') OR multimedia LIKE('%.wmv') OR multimedia LIKE('%.divx') OR multimedia LIKE('%.xvid') OR multimedia LIKE('%.rm')) ORDER BY actividad_vista, fecha_actividad DESC";

$datos = mysqli_query($bd, $sql);

$json = '[';
while ($arr = mysqli_fetch_array($datos)) {
    //$json=$json.'{"nombre":"'.$arr[0].'", ';
    //$json=$json.'"cedula":"'.$arr[1].'", ';
    //$json=$json.'"genero":"'.$arr[2].'"}, ';

    //$json=$json.'{"multimedia":"'.$arr[0].'"}, ';

    $json = $json . '{"multimedia":"' . $arr[0] . '", ';
    $json = $json . '"fecha":"' . $arr[1] . '"}, ';
}
$json = $json . '{"multimedia": false, "fecha": false }]';
$stringj = json_encode($json);
echo $json;
//echo $stringj;

mysqli_close($bd);
?>