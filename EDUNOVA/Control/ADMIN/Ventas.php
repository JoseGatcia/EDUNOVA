<?php
// Objeto de conexión a la base de datos:
require '../Bd_Edunova/conexion.php';

// Validación de obturación del botón:
if (isset($_POST['btn_add'])) {
    // Captura de variables:
    $correoFK = $_POST['correoFK'];
    $cod_venta = $_POST['cod_venta'];
    $fecha = $_POST['fecha'];
    $cantidad = $_POST['cantidad'];
    $cod_producto = $_POST['cod_producto'];
    $total = $_POST['total'];

    // Crear consulta SQL con variables escapadas
    $sql = "INSERT INTO ventas (correoFK, cod_venta, fecha, cantidad, cod_producto, total) 
            VALUES ('$correoFK', '$cod_venta', '$fecha', '$cantidad', '$cod_producto', '$total')";

    // Ejecutar la consulta
    if ($conexion->query($sql) === TRUE) {
        // Redirigir después de la inserción exitosa
        header('Location: ../../Vista/Admin/Ventas/Ventas.php');
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }

    // Cerrar conexión
    $conexion->close();
} else {
    // Si no se presionó el botón, redirigir
    header('Location: ../../Vista/Admin/Ventas/Ventas.php');
    exit;
}
?>
