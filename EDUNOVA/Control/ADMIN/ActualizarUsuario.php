<?php
// Objeto de conexión a la base de datos:
require '../Bd_Edunova/conexion.php';

// Validación de obturación del botón:
if (isset($_POST['Btn_Actualizar_Usua']) && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Captura de variables:
    $cod_usua = $_POST['codigo_usuario'];
    $nombre = $_POST['Nombre'];
    $apellido = $_POST['Apellido'];
    $edad = $_POST['Edad'];
    $direccion = $_POST['Direccion'];
    $correo = $_POST['Correo'];
    $telefono = $_POST['Telefono'];
    $contrasena = $_POST['Contrasena'];
    $cod_tip_usuaFK = $_POST['cod_tip_usuaFK'];

    // Crear consulta SQL con variables escapadas
    $sql = "
        UPDATE usuario
        SET 
            codigo_usuario = '" . $cod_usua . "',
            Nombre = '" . $nombre . "',
            Apellido = '" . $apellido . "',
            Edad = '" . $edad . "',
            Direccion = '" . $direccion . "',
            Correo = '" . $correo . "',
            Telefono = '" . $telefono . "',
            Contrasena = '" . $contrasena . "',
            cod_tip_usuaFK = '" . $cod_tip_usuaFK . "'
        WHERE 
            codigo_usuario = '" . $id . "';
    ";

    // Ejecutar la consulta
    if ($conexion->query($sql) === TRUE) {
        // Redirigir después de la actualización exitosa
        header('Location: ../../Vista/Admin/UsuariosAdmin/usuariosAdmin.php');
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }

    // Cerrar conexión
    $conexion->close();
} else {
    // Si no se presionó el botón, redirigir
    header('Location: ../../Vista/Admin/UsuariosAdmin/usuariosAdmin.php');
    exit;
}
?>
