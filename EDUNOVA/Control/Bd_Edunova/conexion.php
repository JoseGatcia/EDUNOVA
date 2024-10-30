<?php
//Defino las constantes de conexion=+
$server = "localhost"; 
$user = "root";
$basedatos = "EDUNOVA"; //Nombre de bd proyecto
$pass = "";
$msj = "No se ha encontrado enlace con el servidor o la base de datos";

//constructor de conexion, utilizamos el metodo mysqli () para realizar la conexion 

$conexion = new mysqli($server, $user, $pass,$basedatos) or die ($msj);
$acento = $conexion->query("SET NAMES 'utf8' " );
//Si no se puede conectar envia mensaje de error

if(mysqli_connect_errno()){
        echo 'conexion fallida : ', mysqli_connect_error();
        exit();
}

?>
