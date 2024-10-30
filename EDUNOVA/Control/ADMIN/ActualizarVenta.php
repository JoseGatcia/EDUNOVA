<?php
// Objeto de conexión a la base de datos:
require '../Bd_Edunova/conexion.php';

// Validación de obturación del botón:
if (isset($_POST['btn_update']) && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Captura de variables:
    $correoFK = $_POST['correoFK'];
    $cod_venta = $_POST['cod_venta'];
    $fecha = $_POST['fecha'];
    $cantidad = $_POST['cantidad'];
    $cod_producto = $_POST['cod_producto'];
    $total = $_POST['total'];

    // Crear consulta SQL con variables escapadas
    $sql = "
        UPDATE ventas
        SET 
            correoFK = '" . $correoFK . "',
            cod_venta = '" . $cod_venta . "',
            fecha = '" . $fecha . "',
            cantidad = '" . $cantidad . "',
            cod_producto = '" . $cod_producto . "',
            total = '" . $total . "'
        WHERE 
            cod_venta = '" . $id . "';
    ";

    // Ejecutar la consulta
    if ($conexion->query($sql) === TRUE) {
        // Redirigir después de la actualización exitosa
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
