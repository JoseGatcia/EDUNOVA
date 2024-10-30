<?php session_start();
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INICIO</title>
    <link rel="stylesheet" href="../Inicio/inicio.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="contenedor">
        <div class="izquierda">
            <div class="logo">
                
                <img src="../images/logo.png" alt="Logo de la empresa">
            </div>
        </div>
        <div class="linea-separadora"></div>
        <div class="derecha">
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
            <div class="bienvenido">
                <h2>Bienvenido</h2>
            </div>
            <div class="subtexto">
                <h2>Bienvenido a nuestra plataforma educativa, diseñada para impulsar tu aprendizaje y el de tus estudiantes a nuevas alturas. Estamos emocionados de ofrecerte una variedad de planes adaptados a tus necesidades, cada uno lleno de características y herramientas útiles para mejorar tu experiencia educativa. ¡Explora nuestros planes y descubre todo lo que tenemos para ofrecer!</h2>
            </div>
        </div>
        <br>
        <br>
        <footer>
            <h2 class="contacto">
                <a class="correo" href="https://mail.google.com/mail/?view=cm&fs=1&to=edukiii007@gmail.com" target="_blank">edunovax@gmail.com</a>
            </h2>
            </p>
            <div class="redes">
                <a href="https://www.instagram.com/eduki0/" target="_blank">
                    <img src="../images/instagram_1384015.png" alt="Logo instagram">
                </a>
                <a href="https://www.facebook.com/profile.php?id=61562756261460" target="_blank">
                    <img src="../images/facebook.png" alt="Logo facebook">
                </a>
                <a href="https://www.whatsapp.com" target="_blank">
                    <img src="../images/whatsapp_254409.png" alt="Logo whatsapp">
                </a>
            </div>
        </footer>
        <script>
            document.getElementById('logout-button').addEventListener('click', function(event) {
                event.preventDefault();

                const confirmLogout = confirm('¿Estás segur@ de cerrar sesión?');

                if (confirmLogout) { 
                    window.location.href = '../../../Control/ADMIN/CerrarSesion.php';            }
            });
        </script>
    </div>
</body>
</html>
