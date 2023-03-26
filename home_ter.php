<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Home</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/bootstrap.min.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/style.css'>
    <link rel="icon" href="src/icono_app.png">
</head>

<body>
    <?php    
        include("verificar_sesion_terapeuta.php");
        include("nav_ter.php");
        
    ?>
    <br><br><br>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-12">
                <h1 class="text-center" style="font-size: 6em;"> INTEGRANTES</h1>
            </div>
            
            <div class="col-12">
                <br><br><br>
                <h1 class="text-center"> BRAYAN DANIEL CERON</h1>
            </div>
            <div class="col-12">
                <br>
                <h1 class="text-center"> JHONATAN JUASPUEZAN</h1>
            </div>
        </div>
    </div>


    <script src='js/popper.min.js'></script>
    <script src='js/bootstrap.min.js'></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src='js/script.js'></script>
</body>

</html>