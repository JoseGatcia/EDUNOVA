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
    <title>Administración de Servicios</title>
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
        <h1>Formulario para Ingresar Servicios</h1>
        <form id="serviceForm" action="../../../Control/ADMIN/ServicioAdmin.php" method="post">
            <label for="CodigoServicio">Código Producto:</label>
            <input type="text" id="CodigoServicio" name="CodigoServicio" required>

            <label for="NombreServicios">Nombre Producto:</label>
            <input type="text" id="NombreServicios" name="NombreServicios" required>

            <label for="DescripcionServicio">Descripción Producto:</label>
            <input type="text" id="DescripcionServicio" name="DescripcionServicio" required>

            <label for="Precio">Precio:</label>
            <input type="number" id="Precio" name="Precio" required>

            <button name="btn_save" type="submit">Agregar Servicio</button>
        </form>
    </section>
    <section class="tabla">
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>Código Producto</th>
                    <th>Nombre Producto</th>
                    <th>Descripción Producto</th>
                    <th>Precio</th>
                    <th>Accion Eliminar</th>
                    <th>Accion Actualizar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('../../../Control/Bd_Edunova/conexion.php');
                $result = $conexion->query("SELECT CodigoServicio, NombreServicios, DescripcionServicio, Precio FROM servicios");
                while ($row = $result->fetch_row()) {
                    echo "<tr>";
                    echo "<td>" . $row[0] . "</td>";
                    echo "<td>" . $row[1] . "</td>";
                    echo "<td>" . $row[2] . "</td>";
                    echo "<td>" . $row[3] . "</td>";
                    echo "<td><a href='../../../Control/ADMIN/EliminarServicio.php?id=" . $row[0] . "' class='delete-btn'>Eliminar</a></td>";
                    echo "<td><a href='AdminActServicio.php?id=" . $row[0] . "' class='update-btn'>Actualizar</a></td>";
                    echo "</tr>";
                }
                $conexion->close();
                ?>
            </tbody>
        </table>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>
