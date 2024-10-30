<?php
// Objeto de conexión a la base de datos:
require '../Bd_Edunova/conexion.php';

if (isset($_GET['id'])) {
    // Obtener el valor del parámetro 'id'
    $id = $_GET['id'];
    $sql = "DELETE FROM tip_usua WHERE cod_tip_usua = '" . $id . "'";

    // Ejecutar la consulta
    if ($conexion->query($sql) === TRUE) {
        // Redirigir después de la inserción exitosa
        header('Location: ../../Vista/Admin/TipoUsuarios/TipoUsuario.php');
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }

    // Cerrar conexión
    $conexion->close();
} else {
    header('Location: ../../Vista/Admin/TipoUsuarios/TipoUsuario.php');
    exit;
}
?>
