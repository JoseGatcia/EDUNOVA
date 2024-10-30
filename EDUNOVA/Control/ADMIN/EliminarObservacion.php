<?php
include('../Bd_Edunova/conexion.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM observaciones WHERE codObservacion='$id'";

    if ($conexion->query($sql) === TRUE) {
        header('Location: ../../Vista/Admin/Observaciones/observaciones.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }
}
?>
