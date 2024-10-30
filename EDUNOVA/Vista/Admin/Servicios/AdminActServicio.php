<?php

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

<?php

// Objeto de conexión a la base de datos:
include('../../../Control/Bd_Edunova/conexion.php');
$servicio = null;

if (isset($_GET['id'])) {
    // Obtener el valor del parámetro 'id'
    $id = $_GET['id'];
    $sql = "SELECT CodigoServicio, NombreServicios, DescripcionServicio, Precio FROM servicios WHERE CodigoServicio = '" . $id . "'";
    $consulta = $conexion->query($sql);
    
    // Ejecutar la consulta
    if ($consulta != null) {
        $servicio = $consulta->fetch_row();
    } else {
        header('Location: ./Servicios.php');
        exit;
    }

    // Cerrar conexión
    $conexion->close();
} else {
    header('Location: ./Servicios.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Servicio</title>
    <link rel="stylesheet" href="estilosServicios.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.3/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.1.3/js/dataTables.js"></script>
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
        <h1>Actualizar Servicio</h1>
        <form id="updateServiceForm" action="../../../Control/ADMIN/ActualizarServicioAdmin.php" method="post">
            <label for="CodigoServicio">Código</label>
            <input value="<?php echo $servicio[0] ?>" type="number" id="CodigoServicio" name="CodigoServicio" required readonly>

            <label for="NombreServicios">Nombre Producto:</label>
            <input value="<?php echo $servicio[1] ?>" type="text" id="NombreServicios" name="NombreServicios" required>

            <label for="DescripcionServicio">Descripción Producto:</label>
            <input value="<?php echo $servicio[2] ?>" type="text" id="DescripcionServicio" name="DescripcionServicio" required>

            <label for="Precio">Precio:</label>
            <input value="<?php echo $servicio[3] ?>" type="number" id="Precio" name="Precio" required>

            <button type="submit">Actualizar Servicio</button>
        </form>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>
