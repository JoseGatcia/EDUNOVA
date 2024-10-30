<?php
// Objeto de conexión a la base de datos:
require '../Bd_Edunova/conexion.php';

// Validación de obturación del botón:
if (isset($_POST['btn_save'])) {
    // Captura de variables:
    $CodigoServicio = $_POST['CodigoServicio'];
    $NombreServicios = $_POST['NombreServicios'];
    $DescripcionServicio = $_POST['DescripcionServicio'];
    $Precio = $_POST['Precio'];

    // Crear consulta SQL con variables escapadas
    $sql = "
        INSERT INTO servicios(CodigoServicio, NombreServicios, DescripcionServicio, Precio) 
        VALUES ('" . $CodigoServicio . "', '" . $NombreServicios . "', '" . $DescripcionServicio . "', '" . $Precio . "');
    ";

    // Ejecutar la consulta
    if ($conexion->query($sql) === TRUE) {
        // Redirigir después de la inserción exitosa
        header('Location: ../../Vista/Admin/Servicios/Servicios.php');
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
        exit;
    }

    // Cerrar conexión
    $conexion->close();
} else {
    // Si no se presionó el botón, redirigir
    header('Location: ../../Vista/Admin/Servicios/Servicios.php');
    exit;
}
?>
