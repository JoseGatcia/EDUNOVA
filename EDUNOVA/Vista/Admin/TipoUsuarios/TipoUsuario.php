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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración de Tipos de Usuarios</title>
    <link rel="stylesheet" href="estilosTipoUsua.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.3/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.1.3/js/dataTables.js"></script>
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
        <h1>Formulario para Ingresar Tipos de Usuarios</h1>
        <form id="tipUserForm" action="../../../Control/ADMIN/TipoUsuarioAdmin.php" method="post">
            <label for="cod_tip_usua">Código Tipo Usuario</label>
            <input type="number" id="cod_tip_usua" name="cod_tip_usua" required>

            <label for="nombre_tip_usua">Nombre:</label>
            <input type="text" id="nombre_tip_usua" name="nombre_tip_usua" required>

            <label for="descrip_tip_usua">Descripción:</label>
            <input type="text" id="descrip_tip_usua" name="descrip_tip_usua" required>

            <button type="submit" name="Btn_tipo_Usua">Agregar Tipo de Usuario</button>
        </form>
    </section>
    <section class="tabla">
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>Código Tipo de Usuario</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Accion Eliminar</th>
                    <th>Accion Actualizar</th>
                </tr>
            </thead>
            <tbody>
            <?php
                include('../../../Control/Bd_Edunova/conexion.php');
                $consulta = $conexion->query("SELECT cod_tip_usua, nombre_tip_usua, descrip_tip_usua FROM tip_usua WHERE 1");

                while ($row = $consulta->fetch_row()) {
                    echo "<tr>";
                    echo "<td>" . $row[0] . "</td>";
                    echo "<td>" . $row[1] . "</td>";
                    echo "<td>" . $row[2] . "</td>";
                    echo "<td><a href='../../../Control/ADMIN/EliminarTipoUsua.php?id=" . $row[0] . "' class='delete-btn'>Eliminar</a></td>";
                    echo "<td><a href='AdminActTipUsua.php?id=" . $row[0] . "' class='update-btn'>Actualizar</a></td>";
                    echo "</tr>";
                }
            ?>
            </tbody>
        </table>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>
