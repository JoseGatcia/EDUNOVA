<?php
// Objeto de conexión a la base de datos:
require '../Bd_Edunova/conexion.php';

// Validación de obturación del botón:
if (isset($_POST['btn_add'])) {
    // Captura de variables:

    $cod_tip_usuaFK = 2; // ID del rol Cliente
    $Nombre = $_POST['Nombre'];
    $Apellido = $_POST['Apellido'];
    $Edad = $_POST['Edad'];
    $Direccion = $_POST['Direccion'];
    $codigo_usuario = $_POST['codigo_usuario'];
    $Correo = $_POST['Correo'];
    $Telefono = $_POST['Telefono'];
    $Contrasena = $_POST['Contrasena'];

    // Crear consulta SQL con variables escapadas
    $sql = "INSERT INTO usuario (codigo_usuario, Nombre, Apellido, Edad, Direccion, Correo, Telefono, Contrasena, cod_tip_usuaFK) 
            VALUES ('$codigo_usuario', '$Nombre', '$Apellido', '$Edad', '$Direccion', '$Correo', '$Telefono', '$Contrasena', '$cod_tip_usuaFK')";

    // Ejecutar la consulta
    if ($conexion->query($sql) === TRUE) {
        // Redirigir después de la inserción exitosa
        header('Location: ../../Vista/Publico/Inicio_Sesion/inicio_sesion.php');
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }

    // Cerrar conexión
    $conexion->close();
} else {
    // Si no se presionó el botón, redirigir
    header('Location: ../../Vista/Publico/Inicio_Sesion/inicio_sesion.php');
    exit;
}
?>
