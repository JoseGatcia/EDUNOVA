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
$venta = null;

if (isset($_GET['id'])) {
    // Obtener el valor del parámetro 'id'
    $id = $_GET['id'];
    $sql = "SELECT correoFK, cod_venta, fecha, cantidad, cod_producto, total FROM ventas WHERE cod_venta = '" . $id . "'";
    $consulta = $conexion->query($sql);
    
    // Ejecutar la consulta
    if ($consulta != null) {
        $venta = $consulta->fetch_row();
    } else {
        header('Location: ./Ventas.php');
        exit;
    }
} else {
    header('Location: ./Ventas.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración de Ventas</title>
    <link rel="stylesheet" href="estilosVentas.css">
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
        <h1>Formulario para Actualizar Ventas</h1>
        <form id="salesForm" action="../../../Control/ADMIN/ActualizarVenta.php?id=<?php echo $venta[1] ?>" method="post">
            <label for="correoFK">Cliente:</label>
            <select value="<?php echo $venta[0] ?>" name="correoFK" id="correoFK" required>
                <?php
                $consulta = $conexion->query("SELECT Nombre, Apellido, Correo FROM usuario");
                
                // Bucle para crear las opciones del select
                while ($row = $consulta->fetch_row()) {
                    $selected = ($row[2] == $venta[0]) ? 'selected' : '';
                    
                    echo "<option value=\"" . $row[2] . "\" $selected>" . $row[2] . " - " . $row[0] . " " . $row[1] . "</option>";
                }
                ?>
            </select>

            <label for="cod_venta">Código de Venta:</label>
            <input value="<?php echo $venta[1] ?>" type="number" id="cod_venta" name="cod_venta" required readonly>

            <label for="fecha">Fecha:</label>
            <input value="<?php echo $venta[2] ?>" type="date" id="fecha" name="fecha" required>

            <label for="cantidad">Cantidad:</label>
            <input value="<?php echo $venta[3] ?>" type="number" id="cantidad" name="cantidad" required>

            <label for="cod_producto">Producto:</label>
            <select value="<?php echo $venta[4] ?>" name="cod_producto" id="cod_producto" required>
                <option></option>
                <?php
                $consulta = $conexion->query("SELECT CodigoServicio, NombreServicios, DescripcionServicio, Precio FROM servicios");

                while ($row = $consulta->fetch_row()) {
                    $selected = ($row[0] == $venta[4]) ? 'selected' : '';

                    echo "<option price=\"" . $row[3] . "\" value=\"" . $row[0] . "\" $selected>" . $row[1] . " - " . $row[2] . "</option>";
                }
                ?>
            </select>

            <label for="total">Total:</label>
            <input value="<?php echo $venta[5] ?>" type="number" id="total" name="total" required readonly>

            <button name="btn_update" type="submit">Actualizar Venta</button>
        </form>
    </section>
    <script>
        const selectProduct = document.getElementById('cod_producto');
        const totalInput = document.getElementById('total');
        const cantidadInput = document.getElementById('cantidad');

        let price = 0;

        selectProduct.addEventListener('change', function() {
            // Obtiene el valor de la opción seleccionada
            const selectedOption = selectProduct.options[selectProduct.selectedIndex];
            price = selectedOption.getAttribute('price');
            totalInput.value = cantidadInput.value * price;
        });

        cantidadInput.addEventListener('change', function() {
            totalInput.value = cantidadInput.value * price;
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>
