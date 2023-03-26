<?php
include("verificar_sesion_usuario.php");
include("conecta.php");

$bd = conectar();
$atributo = $_POST['atributo'];
$valor = $_POST['valor'];

$sql = 'UPDATE usuarios SET '.$atributo.'="'.$valor.'" WHERE ced_usu LIKE("'.$_SESSION["cedula_usuario"].'")';
$datos = mysqli_query($bd, $sql);

 mysqli_close($bd);
//$arr = mysqli_fetch_array($datos)


?>