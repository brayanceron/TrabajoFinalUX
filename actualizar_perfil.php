<?php
include("verificar_sesion_terapeuta.php");
include("conecta.php");

$bd = conectar();
$atributo = $_POST['atributo'];
$valor = $_POST['valor'];

$sql = 'UPDATE terapeutas SET '.$atributo.'="'.$valor.'" WHERE ced_terapeuta LIKE("'.$_SESSION["cedula_terapeuta"].'")';
$datos = mysqli_query($bd, $sql);

 mysqli_close($bd);
//$arr = mysqli_fetch_array($datos)


?>