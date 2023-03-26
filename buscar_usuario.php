<?php
include("conecta.php");
$bd = conectar();
$nombre = $_POST["nombre"];
$cedula = $_POST["cedula"];

if (!empty($nombre && empty($cedula))) {
    $sql = 'select nom_usu,ced_usu,genero_usu from usuarios where nom_usu like("%' . $nombre . '%")order by 1';
} else if (!empty($cedula) && empty($nombre)) {
    $sql = 'select nom_usu,ced_usu,genero_usu from usuarios where ced_usu like("' . $cedula . '%")order by 1';
} else if (!empty($nombre) && !empty($cedula)) {
    $sql = 'select nom_usu,ced_usu,genero_usu from usuarios where nom_usu like("' . $nombre . '%") and ced_usu like("' . $cedula . '%") order by 1';
}


$datos = mysqli_query($bd, $sql);

$json = '[';
while ($arr = mysqli_fetch_array($datos)) {
    $json = $json . '{"nombre":"' . $arr[0] . '", ';
    $json = $json . '"cedula":"' . $arr[1] . '", ';
    $json = $json . '"genero":"' . $arr[2] . '"}, ';
}
$json = $json . '{"nombre":false, "cedula":false, "genero":false}]';
$stringj = json_encode($json);
echo $json;
//echo $stringj;

mysqli_close($bd);
