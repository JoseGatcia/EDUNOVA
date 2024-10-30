<?php
session_start();

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

// Incluir el archivo de conexión a la base de datos
include('../../../Control/Bd_Edunova/conexion.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración de Observaciones</title>
    <link rel="stylesheet" href="estilosObservaciones.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" />
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
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
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>
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
        <h1>Formulario para Ingresar Observaciones</h1>
        <form id="observationForm" action="../../../Control/ADMIN/Observaciones.php" method="post" enctype="multipart/form-data">
            <label for="codObservacion">Código Observación:</label>
            <input type="text" id="codObservacion" name="codObservacion" required>

            <label for="observacion">Observación:</label>
            <input type="text" id="observacion" name="observacion" required>

            <label for="descargos">Descargos:</label>
            <input type="text" id="descargos" name="descargos" required>

            <label for="idEstudiante">ID Estudiante:</label>
            <input type="text" id="idEstudiante" name="idEstudiante" required>

            <label for="idProfesor">ID Profesor:</label>
            <input type="text" id="idProfesor" name="idProfesor" required>

            <label for="firma">Firma:</label>
            <input type="file" id="firma" name="firma" accept="image/*" required>

            <button type="submit">Agregar Observación</button>
        </form>
    </section>
    <section class="tabla">
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>Código Observación</th>
                    <th>Observación</th>
                    <th>Descargos</th>
                    <th>ID Estudiante</th>
                    <th>ID Profesor</th>
                    <th>Firma</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $consulta = $conexion->query("SELECT codObservacion, observacion, descargos, idEstudiante, idProfesor, firma FROM observaciones");
                

                while ($row = $consulta->fetch_row()) {
                    echo "<tr>";
                    echo "<td>" . $row[0] . "</td>";
                    echo "<td>" . $row[1] . "</td>";
                    echo "<td>" . $row[2] . "</td>";
                    echo "<td>" . $row[3] . "</td>";
                    echo "<td>" . $row[4] . "</td>";
                    echo "<td><img src='../../../uploads" . $row[5] . "' alt='Firma' width='50'></td>";
                    echo "<td><a href='../../../Control/ADMIN/EliminarObservacion.php?id=" . $row[0] . "' class='delete-btn'>Eliminar</a> | <a href='ActualizarObservacion.php?id=" . $row[0] . "' class='update-btn'>Actualizar</a></td>";
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
