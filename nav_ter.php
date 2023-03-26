<?php
//include("verificar_sesion_terapeuta.php");
$nombre_terapeuta=$_SESSION["nombre_terapeuta"];
$cedula_terapeuta=$_SESSION["cedula_terapeuta"];  
?>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <img src="src/logo-udenar2.png" id="logo_udenar" alt="">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">


            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="home_ter.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pacientes.php">Pacientes</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Terapias
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="addterapia.php">Crear Terapia</a></li>
                        <li><a class="dropdown-item" href="listar_terapias_ter.php">Mis Terapias</a></li>
                    </ul>
                </li>

            </ul>


            <form class="d-flex">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">




                    <li class="nav-item dropdown">
<!--
                    <a class="nav-link dropdown-toggle-notificacion" href="#" id=""  data-bs-toggle="dropdown"  style="padding: 0;">                        
                            <img src="src/notificacion_desc.png" alt="" id="icono_notificacion">                        
                    </a>

                    
                    <li><a class="dropdown-item" href="#">Notificacion 1</a></li>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        
                        <li><a class="dropdown-item" href="#">Notificacion 2</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Notificacion 3</a></li>
                    </ul>
-->

                    </li>




                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="padding: 0;">
                            <?php echo $nombre_terapeuta; ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            
                            <li><a class="dropdown-item" href="perfil_ter.php">Perfil</a></li>
                            <li><a class="dropdown-item" href="cerrar_sesion_ter.php">Cerrar sesión</a></li>
                            
                            
                        </ul>

                    </li>

                    <li class="nav-item">
                        <img src="src/fotos_usuarios/<?php echo $cedula_terapeuta.".jpg";?>" alt="" id="icono_perfil">
                    </li>

                </ul>
            </form>

        </div>
    </div>
</nav>