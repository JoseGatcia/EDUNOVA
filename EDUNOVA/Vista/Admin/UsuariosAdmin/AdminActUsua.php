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
$usuario = null;

if (isset($_GET['id'])) {
    // Obtener el valor del parámetro 'id'
    $id = $_GET['id'];
    $sql = "SELECT codigo_usuario, Nombre, Apellido, Edad, Direccion, Correo, Telefono, Contrasena, cod_tip_usuaFK FROM usuario WHERE codigo_usuario = '" . $id . "'";
    $consulta = $conexion->query($sql);
    
    // Ejecutar la consulta
    if ($consulta != null) {
        $usuario = $consulta->fetch_row();
    } else {
        header('Location: ./usuariosAdmin.php');
        exit;
    }
} else {
    header('Location: ./usuariosAdmin.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizacion de Usuarios</title>
    <link rel="stylesheet" href="estilosUsuaAdmin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
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
        <h1>Formulario para Actualizar Usuarios</h1>
        <form id="userForm" action="../../../Control/ADMIN/ActualizarUsuario.php?id=<?php echo $usuario[0] ?>" method="post">
            <label for="codigo_usuario">Código Usuario:</label>
            <input value="<?php echo $usuario[0] ?>" type="number" id="codigo_usuario" name="codigo_usuario" required>

            <label for="Nombre">Nombre:</label>
            <input value="<?php echo $usuario[1] ?>" type="text" id="Nombre" name="Nombre" required>

            <label for="Apellido">Apellido:</label>
            <input value="<?php echo $usuario[2] ?>" type="text" id="Apellido" name="Apellido" required>

            <label for="Edad">Edad:</label>
            <input value="<?php echo $usuario[3] ?>" type="number" id="Edad" name="Edad" required>

            <label for="Direccion">Dirección:</label>
            <input value="<?php echo $usuario[4] ?>" type="text" id="Direccion" name="Direccion" required>

            <label for="Correo">Correo:</label>
            <input value="<?php echo $usuario[5] ?>" type="email" id="Correo" name="Correo" required readonly>

            <label for="Telefono">Telefono:</label>
            <input value="<?php echo $usuario[6] ?>" type="number" id="Telefono" name="Telefono" required>

            <label for="Contrasena">Contraseña:</label>
            <input value="<?php echo $usuario[7] ?>" type="text" id="Contrasena" name="Contrasena" required>

            <label for="cod_tip_usuaFK">Tipo de Usuario:</label>
            <select name="cod_tip_usuaFK" id="cod_tip_usuaFK" required>
                <?php
                // Consulta para obtener los tipos de usuario
                $consulta = $conexion->query("SELECT cod_tip_usua, nombre_tip_usua FROM tip_usua");
                
                // Bucle para crear las opciones del select
                while ($row = $consulta->fetch_row()) {
                    // Comparamos el valor del tipo de usuario con el valor del usuario actual
                    $selected = ($row[0] == $usuario[8]) ? 'selected' : '';
                    
                    // Generamos la opción con el valor seleccionado por defecto si coincide
                    echo "<option value=\"" . $row[0] . "\" $selected>" . $row[1] . "</option>";
                }
                ?>
            </select>

            <button type="submit" name="Btn_Actualizar_Usua">Actualizar Usuario</button>
        </form>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>
