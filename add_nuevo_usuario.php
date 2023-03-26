<?php
include("verificar_sesion_terapeuta.php");
include("conecta.php");
$bd = conectar();

$id_terapia = $_POST['id_terapia'];
$cedula = $_POST['cedula'];

if (!empty($_POST)) {

    $sql = "INSERT INTO terapias(id_terapia,nombre_terapia,descripcion_terapia,ced_usu,ced_terapeuta,estado_terapia) VALUES($id_terapia,(SELECT nombre_terapia FROM terapias AS t1 WHERE t1.id_terapia LIKE('$id_terapia') LIMIT 1),(SELECT descripcion_terapia FROM terapias AS t2 WHERE t2.id_terapia LIKE('$id_terapia') LIMIT 1),$cedula,(SELECT ced_terapeuta FROM terapias AS t3 WHERE t3.id_terapia LIKE('$id_terapia') LIMIT 1),'ACTIVA')";

 
    $res = false;
    try {
        $res = mysqli_query($bd, $sql);
        if (!$res) {
            echo "<div class='container'><div class='alert alert-danger' role='alert'><b>Error1 :</b><br>Usuario No agregado!, transacción abortada<br>" . mysqli_error($bd) . "</div></div>";
        } else {
            echo "<div class='container'><div class='alert alert-success' role='alert'><b>Información</b><br>Usuario agregado con éxito!!</div></div>";
            
        }
    } catch (Exception $e) {
        echo "<div class='container'><div class='alert alert-danger' role='alert'><b>Error2 :</b><br>Usuario No agregado!, transacción abortada<br>" . $e->getMessage() . "</div></div>";
        
    }










    mysqli_close($bd);
} else // $_POST is empty.
{
    echo "No se han recibido datos";
    mysqli_close($bd);
}
