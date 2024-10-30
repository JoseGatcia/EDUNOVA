<?php
error_reporting(0);
session_start();

if (session_status() === PHP_SESSION_ACTIVE && $_SESSION['usuario'] != null) {
    if ($_SESSION['usuario']['cod_tip_usuaFK'] == 2) {
        header('Location: ../../Publico/Inicio/inicio.php');
        exit;
    }
} else {
    header('Location: ../../Publico/Inicio_Sesion/inicio_sesion.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <header>
        <h1></h1>
        <button id="toggle-nav">&#9776;</button>
    </header>
    <nav id="sidebar">
        <ul>
            <li><a href="../Inicio/inicio.php"> Inicio</a></li>
            <li><a href="../UsuariosAdmin/usuariosAdmin.php">Usuario</a></li>
            <li><a href="../TipoUsuarios/TipoUsuario.php">Tipo Usuario</a></li>
            <li><a href="../Servicios/Servicios.php">Servicios</a></li>
            <li><a href="../Ventas/Ventas.php">Ventas</a></li>
            <li><a href="../Observaciones/observaciones.php">Observaciones</a></li>
            <li><a href="../../../Control/ADMIN/CerrarSesion.php">Cerrar sesión</a></li>
        </ul>
    </nav>
    <main>
        <div class="image-container">
            <img src="../imgs/image-removebg-preview.png" alt="Imagen">
        </div>
    </main>
    <footer>
        <p>&copy; Edunova</p>
    </footer>
    <script>
    document.getElementById('toggle-nav').addEventListener('click', function() {
    var sidebar = document.getElementById('sidebar');
    if (sidebar.style.left === '-250px' || sidebar.style.left === '') {
        sidebar.style.left = '0';
    } else {
        sidebar.style.left = '-250px';
    }
});
    </script>
</body>
</html>