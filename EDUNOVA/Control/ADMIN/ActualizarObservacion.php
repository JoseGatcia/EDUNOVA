<?php
include('../Bd_Edunova/conexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $codObservacion = $_POST['codObservacion'];
    $observacion = $_POST['observacion'];
    $descargos = $_POST['descargos'];
    $idEstudiante = $_POST['idEstudiante'];
    $idProfesor = $_POST['idProfesor'];
    $firma = $_FILES['firma']['name'];
    $firma_tmp = $_FILES['firma']['tmp_name'];

    // Mover la firma a una carpeta específica
    if (move_uploaded_file($firma_tmp, "../../../uploads/" . $firma)) {
        $sql = "UPDATE observaciones SET observacion='$observacion', descargos='$descargos', idEstudiante='$idEstudiante', idProfesor='$idProfesor', firma='../../../uploads/$firma' WHERE codObservacion='$codObservacion'";

        if ($conexion->query($sql) === TRUE) {
            header('Location: ../../Vista/Admin/Observaciones/observaciones.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conexion->error;
        }
    } else {
        echo "Lo siento, hubo un error al subir tu archivo.";
    }
}
?>
