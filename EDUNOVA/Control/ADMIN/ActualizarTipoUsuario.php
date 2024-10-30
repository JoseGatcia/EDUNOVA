<?php
// Objeto de conexión a la base de datos:
require '../Bd_Edunova/conexion.php';

// Validación de obturación del botón:
if (isset($_POST['Btn_tipo_Usua']) && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Captura de variables:
    $cod_tip_usua = $_POST['cod_tip_usua'];
    $nombre_tip_usua = $_POST['nombre_tip_usua'];
    $descrip_tip_usua = $_POST['descrip_tip_usua'];

    // Crear consulta SQL con variables escapadas
    $sql = "
        UPDATE tip_usua
        SET 
            cod_tip_usua = '" . $cod_tip_usua . "',
            nombre_tip_usua = '" . $nombre_tip_usua . "',
            descrip_tip_usua = '" . $descrip_tip_usua . "'
        WHERE 
            cod_tip_usua = '" . $id . "';
    ";

    // Ejecutar la consulta
    if ($conexion->query($sql) === TRUE) {
        // Redirigir después de la actualización exitosa
        header('Location: ../../Vista/Admin/TipoUsuarios/TipoUsuario.php');
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
        exit;
    }

    // Cerrar conexión
    $conexion->close();
} else {
    // Si no se presionó el botón, redirigir
    header('Location: ../../Vista/Admin/TipoUsuarios/TipoUsuario.php');
    exit;
}
?>
