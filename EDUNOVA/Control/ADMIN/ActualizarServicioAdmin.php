<?php
include('../../Control/Bd_Edunova/conexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $CodigoServicio = $_POST['CodigoServicio'];
    $NombreServicios = $_POST['NombreServicios'];
    $DescripcionServicio = $_POST['DescripcionServicio'];
    $Precio = $_POST['Precio'];

    $sql = "
        UPDATE servicios
        SET 
            NombreServicios = '" . $NombreServicios . "',
            DescripcionServicio = '" . $DescripcionServicio . "',
            Precio = '" . $Precio . "'
        WHERE 
            CodigoServicio = '" . $CodigoServicio . "';
    ";

    // Ejecutar la consulta
    if ($conexion->query($sql) === TRUE) {
        // Redirigir después de la actualización exitosa
        header('Location: ../../Vista/Admin/Servicios/Servicios.php');
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
        exit;
    }

    // Cerrar conexión
    $conexion->close();
}
?>
