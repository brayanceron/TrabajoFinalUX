<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
    <link rel='stylesheet' type='text/css' media='screen' href='css/bootstrap.min.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/style.css'>
    <link rel="icon" href="src/icono_app.png">
</head>
<body>
    
<br><br><br>
    <div class="container">
        <div class=" row justify-content-md-center">
        <?php
                //include("nav_user.php");
                include("conecta.php");
                $bd = conectar();

                $cedula=$_POST["txt_cedula"];
                $nombre=$_POST["txt_nombres"];
                $fecha=$_POST["txr_fecha"];
                $telefono=$_POST["txt_telefono"];
                $rol=$_POST["slt_rol"];
                
                $genero=$_POST["rbt_genero"];
                
                $contrasena=$_POST["txt_pass"];
                //$contrasena_r=$_POST["txt_pass_r"];


                
                $tmp = $_FILES["fle_archivo"]["tmp_name"];
                //$name = $_FILES["fle_archivo"]["name"];
                //$size = $_FILES["fle_archivo"]["size"];
                //$type = $_FILES["fle_archivo"]["type"];
                $error = $_FILES["fle_archivo"]["error"];

                    if ($error==0){
                            //echo "<p>Archivo cargado satisfactoriamente<br>";
                            move_uploaded_file($tmp,"src/fotos_usuarios/" . $cedula . ".jpg");

                            if($rol=="u"){
                    
                                $sql = "INSERT INTO usuarios(ced_usu,nom_usu,genero_usu,fech_nacimiento,tel_usu,contrasena) VALUES('$cedula','$nombre','$genero','$fecha','$telefono',md5($contrasena))";
                                
                                try{
                                    $datos = mysqli_query($bd, $sql);
                                    if ($datos) {
                                        echo "<div class='container'><div class='alert alert-success' role='alert'><b>Correcto</b><br> Registro Exitoso, vuelva a iniciar sesión<br>" . mysqli_error($bd) . "</div></div>";
                                        echo '<div class="container text-center"><a class="btn btn-success" href="login.php">Iniciar Sesión</a><div><div>';
                                        
                                    }
                                }
                                catch(Exception $e) {
                                    echo "<div class='container'><div class='alert alert-danger' role='alert'><b>Error</b><br> Error Inesperado, transacción abortada<br>" . $e->getMessage() . "</div></div>";
                                    echo '<div class="container text-center"><a class="btn btn-danger" href="registrar.php">Volver</a><div><div>';
                                }
                                
                               
                            
                                mysqli_close($bd);
            
                            }
                            elseif($rol=="t"){
                                $sql = "INSERT INTO terapeutas(ced_terapeuta,nom_terapeuta,genero,fech_nacimiento_terapeuta,telefono,contrasena) VALUES('$cedula','$nombre','$genero','$fecha','$telefono',md5($contrasena))";
                                //$datos = mysqli_query($bd, $sql);
                                
                                try{
                                    $datos = mysqli_query($bd, $sql);
                                    if ($datos) {
                                        echo "<div class='container'><div class='alert alert-success' role='alert'><b>Correcto</b><br> Registro Exitoso, vuelva a iniciar sesión<br>" . mysqli_error($bd) . "</div></div>";
                                        echo '<div class="container text-center"><a class="btn btn-success" href="login.php">Iniciar Sesión</a><div><div>';
                                        
                                    }
                                }
                                catch(Exception $e) {
                                    echo "<div class='container'><div class='alert alert-danger' role='alert'><b>Error</b><br> Error Inesperado, transacción abortada<br>" . $e->getMessage() . "</div></div>";
                                    echo '<div class="container text-center"><a class="btn btn-danger" href="registrar.php">Volver</a><div><div>';
                                }



                            
                                mysqli_close($bd);
                                
                            }
                    }
                    else{
                        echo "<p>Problemas con la carga del archivo, transaccion abortada</p>";
                    }






                


                



                ?>
        </div>
    </div>
    <script src='js/popper.min.js'></script>
    <script src='js/bootstrap.min.js'></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src='js/script.js'></script>

</body>
</html>