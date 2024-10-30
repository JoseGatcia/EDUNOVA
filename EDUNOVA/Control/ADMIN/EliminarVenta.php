<?php
// Objeto de conexión a la base de datos:
require '../Bd_Edunova/conexion.php';

if (isset($_GET['id'])) {
    // Obtener el valor del parámetro 'id'
    $id = $_GET['id'];
    $sql = "DELETE FROM ventas WHERE cod_venta = '" . $id . "'";

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
    header('Location: ../../Vista/Admin/Ventas/Ventas.php');
    exit;
}
?>
