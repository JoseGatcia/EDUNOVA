<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NOSOTROS</title>
    <link rel="stylesheet" href="nosotros.css" href="header.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
</head>
<body>
<header>
    <div class="Edunova">
        <img src="../img/EDUKI-LOGO.png" alt="">
    </div>
    <nav>
        <ul class="navegacion">
            <li><a href="../Inicio/inicio.php">INICIO</a></li>
                    <li><a href="../Nosotros/nosotros.php">NOSOTROS</a></li>
                    <li><a href="../Servicios/servicios.php">SERVICIOS</a></li>
                    <?php
                        if(session_status() === PHP_SESSION_ACTIVE && $_SESSION['usuario'] != null) {
                            ?>
                            <li>
                                <a href="../Inicio_Sesion/inicio_sesion.php" id="logout-button" title="Cerrar sesión">
                                    <img src="../img/user_4461325.png" alt="Cerrar sesión">
                                </a>
                            </li>
                            <?php
                        } else {
                            ?>
                                <li><a href="../Inicio_Sesion/inicio_sesion.php">INGRESAR</a></li>
                            <?php
                        }
                    ?>
        </ul>
    </nav>
</header>
<main>
        <section class="sectionabout">
            <h1> ACERCA SOBRE LOS CREADORES DE EDUNOVA </h1>
        </section>
        <section class="card">
            <div>
                <a href="../Hojas_De_Vida/Hoja de vida Juan P.pdf" download>
                    <img class="imagen" src="../img/IMG_0796.jpeg" alt="">
                </a>
                <div class="nombres">
                    <h2 class="Juan">Juan José Prisco</h2>
                </div>
            </div>
            <div>
                <a href="../Hojas_De_Vida/HOJA DE VIDA - JOSE GARCIA.pdf" download>
                    <img class="imagen" src="../img/IMG-20240203-WA0028.jpg" alt="">
                </a>
                <div class="nombres">
                    <h2 class="Jose">Jose Gacía</h2>
                </div>
            </div>
            <div>
                <a href="../Hojas_De_Vida/hoja-de-vida-mamh.pdf" download>
                    <img class="imagen" src="../img/DSC_0130.JPG" alt="">
                </a>
                <div class="nombres">
                    <h2 class="Miguel">Miguel Muñoz</h2>
                </div>
            </div>
        </section>
        <script>
            document.getElementById('logout-button').addEventListener('click', function(event) {
                event.preventDefault();
            
                const confirmLogout = confirm('¿Estás segur@ de cerrar sesión?');
            
                if (confirmLogout) { 
                    window.location.href = '../../../Control/ADMIN/CerrarSesion.php';            }
            });
            </script>
</main>
</body>
</html>
