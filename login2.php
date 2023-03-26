<?php
    session_start();
    $cedula = $_POST["txt_cedula"];
    $pass = $_POST["txt_pass"];

    include ("conecta.php");
    $bd = conectar();



    $usu=false;

    $sql1 = "select ced_usu, nom_usu from usuarios where ced_usu='$cedula' and contrasena = md5('$pass')";
    $datos1 = mysqli_query($bd,$sql1);
    $c1 = $datos1->num_rows;

    $sql2 = "select ced_terapeuta, nom_terapeuta from terapeutas where ced_terapeuta='$cedula' and contrasena = md5('$pass')";
    $datos2 = mysqli_query($bd,$sql2);
    $c2 = $datos2->num_rows;



    

    if ($c1==0 and $c2==0){
        mysqli_close($bd);
        header("Location: login.php?ban=1");
    }
    else if($c1>0 and $c2==0){

        $arr = mysqli_fetch_array($datos1);
        $_SESSION["nombre_usuario"]=$arr[1];
        $_SESSION["cedula_usuario"]=$arr[0];

        mysqli_close($bd);
        header("Location: home_user.php");
    }
    else if($c1==0 and $c2>0){
        $arr = mysqli_fetch_array($datos2);

        $_SESSION["nombre_terapeuta"]=$arr[1];
        $_SESSION["cedula_terapeuta"]=$arr[0];

        mysqli_close($bd);
        header("Location: home_ter.php");
    }
    else if($c1==0 and $c2>0){
        mysqli_close($bd);
        header("Location: login.php?ban=3");
    }
?>