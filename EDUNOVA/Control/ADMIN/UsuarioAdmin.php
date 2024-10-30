<?php
// Objeto de conexión a la base de datos:
require '../Bd_Edunova/conexion.php';

// Validación de obturación del botón:
if (isset($_POST['Btn_Crear_Usua'])) {
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
    $sql = "INSERT INTO usuario (codigo_usuario, Nombre, Apellido, Edad, Direccion, Correo, Telefono, Contrasena, cod_tip_usuaFK) 
            VALUES ('$cod_usua', '$nombre', '$apellido', '$edad', '$direccion', '$correo', '$telefono', '$contrasena', '$cod_tip_usuaFK')";

    // Ejecutar la consulta
    if ($conexion->query($sql) === TRUE) {
        // Redirigir después de la inserción exitosa
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
