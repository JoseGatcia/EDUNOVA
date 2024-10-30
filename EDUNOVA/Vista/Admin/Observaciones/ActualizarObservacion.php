<?php
session_start();
include('../../../Control/Bd_Edunova/conexion.php');

// Verificar si la sesión está activa y si el usuario está autenticado
if (session_status() === PHP_SESSION_ACTIVE && $_SESSION['usuario'] != null) {
    if ($_SESSION['usuario']['cod_tip_usuaFK'] == 2) {
        header('Location: ../../Publico/Inicio/inicio.php');
        exit;
    }
} else {
    header('Location: ../../Publico/Inicio_Sesion/inicio_sesion.php');
    exit;
}

$codObservacion = $_GET['id'];
$consulta = $conexion->query("SELECT * FROM observaciones WHERE codObservacion='$codObservacion'");
$row = $consulta->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Observación</title>
    <link rel="stylesheet" href="estilosObservaciones.css">
</head>
<body>
    <header>
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
    <section class="formulario">
        <h1>Actualizar Observación</h1>
        <form id="observationForm" action="../../../Control/ADMIN/ActualizarObservacion.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="codObservacion" value="<?php echo $row['codObservacion']; ?>">

            <label for="observacion">Observación:</label>
            <input type="text" id="observacion" name="observacion" value="<?php echo $row['observacion']; ?>" required>

            <label for="descargos">Descargos:</label>
            <input type="text" id="descargos" name="descargos" value="<?php echo $row['descargos']; ?>" required>

            <label for="idEstudiante">ID Estudiante:</label>
            <input type="text" id="idEstudiante" name="idEstudiante" value="<?php echo $row['idEstudiante']; ?>" required>

            <label for="idProfesor">ID Profesor:</label>
            <input type="text" id="idProfesor" name="idProfesor" value="<?php echo $row['idProfesor']; ?>" required>

            <label for="firma">Firma:</label>
            <input type="file" id="firma" name="firma" accept="image/*">

            <button type="submit">Actualizar Observación</button>
        </form>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>
