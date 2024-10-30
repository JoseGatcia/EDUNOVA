<?php
echo "<h1> Nos encontramos en el archivo para manipular la info de los tipos usuarios </h1>";

# Metodo para el tratamiento de notificaciones:
#error_reporting (0);
# Objeto conexion a la base de datos:
include('../Bd_Edunova/conexion.php');

# Validacion de obturacion del boton:
if (isset($_POST['Btn_tipo_Usua'])) {
    # Captura de variables:
    $codTipUser = $_POST['codTipUser'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    # Definimos las constantes del procedimiento:
    if (empty($tipo)) {
        # Para el caso del tipo de usuario, si no lo enviamos, Definiremos nuestro tipo de usuario:
        $tipo = 2; //En este caso el tipo del usuario es 2, porque es el que se ha definido como cliente
    } else {
        $tipo = $_POST['tipousua'];
    }

    $sql = "INSERT INTO usuario(codTipUser, nombre, descripcion) VALUES (?, ?, ?)";

    $eje = $conexion->prepare($sql);

    // Verificar si la preparación fue exitosa
    if ($eje === false) {
        die("Error en la preparación de la consulta: " . $conexion->error);
    }

    // Enlazar los parámetros
    $eje->bind_param("iss", $codTipUser, $nombre, $descripcion);

    // Ejecutar la consulta
    if ($eje->execute()) {
        echo "Datos guardados correctamente.";
    } else {
        echo "Error al guardar los datos: " . $eje->error;
    }

    // Cerrar conexión
    $eje->close();
    $conexion->close();
}
?>
