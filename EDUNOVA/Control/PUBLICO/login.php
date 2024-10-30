<?php //se incia una sesión en php 
session_start();
 // Se incluye el archivo de conexión a la BD
  include('Conexion.php');
  // Declaramos que este archivo es tipo html y contendrá caracteres especiales del español 
  header('Content-type: text/html; charset=UTF-8');
   
   //se crea una variable para almacenar el estado del boton 
   $btnInicio=$_POST['btn_login']; 
   if(isset($btnInicio)){ 
    $usuario=$_POST['usua']; $contra=$_POST['clave']; 
    
    $sql = "SELECT idUsuario, idTipoUsuario, concat(NombreUsuario,' ', ApellidoUsuario), ClaveUsua FROM usuario WHERE idUsuario = $usuario and ClaveUsua = $contra";


     $respuesta = $conexion->query($sql); 
     $fila = $respuesta->fetch_row(); 

     if($fila[0]==$usuario && $fila[3]==$contra){ 
        $_SESSION['correo'] = $fila[0]
        ; $_SESSION['tipo'] = $fila[1];
         $_SESSION['name'] = $fila[2]; 
         
         $msj = "Bienvenido al sistema"." ".$_SESSION['name']." "; 
         
         switch ($_SESSION['tipo']){ 
            case '1': header('location:../Vista/admin/Admin.php'); 
            break;
            
            case '2': header('location:../Vista/admin/usuarios_admin.php'); 
            break;
         }
         }
         } ?>
         