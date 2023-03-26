<?php
include("verificar_sesion_terapeuta.php");
include("conecta.php");
$bd = conectar();

$id_terapia = $_POST['id_terapia'];
$cedula = $_POST['cedula'];

if (!empty($_POST)) {

    $sql = "DELETE FROM terapias WHERE ced_usu LIKE('".$cedula."') AND id_terapia LIKE('".$id_terapia."')";

 
    $res = false;
    try {
        $res = mysqli_query($bd, $sql);
        if (!$res) {
            echo "<div class='container'><div class='alert alert-danger' role='alert'><b>Error1 :</b><br>Usuario No Eliminado!, transacción abortada<br>" . mysqli_error($bd) . "</div></div>";
        } else {
            echo "<div class='container'><div class='alert alert-success' role='alert'><b>Información</b><br>Usuario Eliminado con éxito!!</div></div>";
            //echo '<div class="container text-center"><a class="btn btn-success" href="listar_clientes.php">Volver</a><div><div>';
        }
    } catch (Exception $e) {
        echo "<div class='container'><div class='alert alert-danger' role='alert'><b>Error2 :</b><br>Usuario No Eliminado!, transacción abortada<br>" . $e->getMessage() . "</div></div>";
        //echo '<div class="container text-center"><a class="btn btn-danger" href="listar_clientes.php">Cancelar</a><div><div>';
    }










    mysqli_close($bd);
} else // $_POST is empty.
{
    echo "No se han recibido datos";
    mysqli_close($bd);
}
