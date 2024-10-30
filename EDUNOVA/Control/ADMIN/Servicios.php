<?php
include('../Bd_Edunova/conexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];

    $sql = "INSERT INTO servicios (CodigoServicio, NombreServicios, DescripcionServicio, Precio) VALUES ('$codigo', '$nombre', '$descripcion', '$precio')";

    if ($conexion->query($sql) === TRUE) {
        echo "Nuevo registro creado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }

    $conexion->close();
} else {
    echo "Método no permitido";
}
?>
