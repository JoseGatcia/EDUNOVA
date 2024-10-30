<?php
session_start();
include('../Bd_Edunova/conexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $codObservacion = $_POST['codObservacion'];
    $observacion = $_POST['observacion'];
    $descargos = $_POST['descargos'];
    $idEstudiante = $_POST['idEstudiante'];
    $idProfesor = $_POST['idProfesor'];

    // Manejo de la subida de archivos
    $target_dir = "../../../uploads/";
    $target_file = $target_dir . basename($_FILES["firma"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Verificar si el archivo es una imagen real
    $check = getimagesize($_FILES["firma"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "El archivo no es una imagen.";
        $uploadOk = 0;
    }
    // Verificar el tamaño del archivo
    if ($_FILES["firma"]["size"] > 500000) {
        echo "Lo siento, tu archivo es demasiado grande.";
        $uploadOk = 0;
    }

    // Permitir ciertos formatos de archivo
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Lo siento, solo se permiten archivos JPG, JPEG, PNG y GIF.";
        $uploadOk = 0;
    }

    // Verificar si $uploadOk está configurado a 0 por un error
    if ($uploadOk == 0) {
        echo "Lo siento, tu archivo no fue subido.";
    } else {
        if (move_uploaded_file($_FILES["firma"]["tmp_name"], $target_file)) {
            echo "El archivo ". htmlspecialchars(basename($_FILES["firma"]["name"])). " ha sido subido.";

            // Guardar la información en la base de datos
            $sql = "INSERT INTO observaciones (codObservacion, observacion, descargos, idEstudiante, idProfesor, firma) VALUES ('$codObservacion', '$observacion', '$descargos', '$idEstudiante', '$idProfesor', '$target_file')";

            if ($conexion->query($sql) === TRUE) {
                echo "Observación agregada correctamente.";
            } else {
                echo "Error: " . $sql . "<br>" . $conexion->error;
            }
        } else {
            echo "Lo siento, hubo un error al subir tu archivo.";
        }
    }
}
?>
