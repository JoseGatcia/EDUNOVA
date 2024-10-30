<?php
include('../Bd_Edunova/conexion.php');

# Captura de variables:
$codUsuario = $_POST['codUsuario'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$edad = $_POST['edad'];
$direccion = $_POST['direccion'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$contrasena = $_POST['contrasena'];

$sql = "UPDATE usuario SET
        Nombre='$nombre',
        Apellido='$apellido',
        Edad='$edad',
        Direccion='$direccion',
        Correo='$correo',
        Telefono='$telefono',
        Contrasena='$contrasena'
        WHERE codigo_usuario='$codUsuario'";

$eje = $conexion->query($sql);

if($eje){
    echo "<script>
        alert('La actualización de datos ha sido exitosa.');
        location.href='../../Vista/UsuariosAdmin/usuariosAdmin.php';
    </script>";
} else {
    echo "<script>
        alert('La actualización de datos no ha sido exitosa, \n favor intentar nuevamente.');
        location.href='../../Vista/UsuariosAdmin/usuariosAdmin.php';
    </script>";
}
?>
