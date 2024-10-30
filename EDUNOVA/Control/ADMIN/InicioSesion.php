<?php

// Objeto de conexión a la base de datos:
require '../Bd_Edunova/conexion.php';
$usuario = null;

// Validación de obturación del botón:
if (isset($_POST['btn_login'])) {
    // Captura de variables:
    $Contrasena = $_POST['Contrasena'];
    $Correo = $_POST['Correo'];

    // Crear consulta SQL con variables escapadas
    $sql = "SELECT codigo_usuario, Nombre, Apellido, Edad, Direccion, Correo, Telefono, Contrasena, cod_tip_usuaFK
            FROM usuario WHERE Correo = '" . $Correo . "' AND Contrasena = '" . $Contrasena . "'";

    $consulta = $conexion->query($sql);

    // Ejecutar la consulta
    if ($consulta != null) {
        $usuario = $consulta->fetch_assoc();
        
        if ($usuario == null) {
            // Si no se encuentra el usuario, redirigir de nuevo a la página de inicio de sesión
            header('Location: ../../Vista/Publico/Inicio_Sesion/inicio_sesion.php');
            exit;
        }

        // Iniciar sesión
        session_start();

        $_SESSION['usuario'] = $usuario;
        
        // Redirigir a la página de bienvenida o el dashboard
        if($_SESSION['usuario']['cod_tip_usuaFK'] == 2) {
            header('Location: ../../Vista/Publico/Inicio/inicio.php');
            exit;
        }

        // Es admin
        header('Location: ../../Vista/Admin/Inicio/inicio.php');
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
