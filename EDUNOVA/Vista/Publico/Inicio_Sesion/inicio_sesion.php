<?php
error_reporting(0);
session_start();

if (session_status() === PHP_SESSION_ACTIVE && $_SESSION['usuario'] != null) {
    if ($_SESSION['usuario']['cod_tip_usuaFK'] == 2) {
        header('Location: ../../Publico/Inicio/inicio.php');
        exit;
    }

    header('Location: ../../Admin/Inicio/inicio.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="inicio_sesion.css?v=?php echo time(); ?>">
    <title>Inicio De Sesion</title>
</head>
<body>

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form action="../../../Control/ADMIN/RegistroPublico.php" method="post">
                <h1>Crear Cuenta</h1>
                <input name="Nombre" type="text" placeholder="Nombre" required />
                <input name="Apellido" type="text" placeholder="Apellido" required />
                <input name="Edad" type="number" placeholder="Edad" required />
                <input name="Direccion" type="text" placeholder="Dirección" required />
                <input name="codigo_usuario" type="number" placeholder="Documento" required />
                <input name="Correo" type="email" placeholder="Correo electrónico" required />
                <input name="Telefono" type="tel" placeholder="Número de Teléfono" required />
                <input name="Contrasena" type="password" placeholder="Nueva Contraseña" required />
                <button name="btn_add">Registrarse</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form action="../../../Control/ADMIN/InicioSesion.php" method="post" id="login-form">
                <h1>Iniciar Sesion</h1>
                <input name="Correo" type="email" id="email" placeholder="Correo" required />
                <input name="Contrasena" type="password" id="password" placeholder="Contraseña" required />
                <button name="btn_login" type="submit">Iniciar Sesion</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Ya tienes una cuenta?</h1>
                    <p>La empresa Edunova ayudará a las instituciones educativas, ya sean públicas o privadas, a mantener un orden virtual acerca de sus estudiantes, trabajos y seguimiento educativo.

                        Inicia sesión para acceder a todas las herramientas y recursos que necesitas para gestionar de manera eficiente y organizada.
                    </p>
                    <button class="hidden" id="login">Iniciar Sesion</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Eres nuev@ en Edunova?</h1>
                    <p>¿Eres parte de una institución educativa y buscas una solución para mantener un orden virtual? Edunova es la plataforma perfecta para ti. Con nosotros, podrás gestionar a tus estudiantes, sus trabajos y el seguimiento educativo de manera eficiente y organizada.

                        Registrarse es fácil y rápido. Únete a Edunova hoy y comienza a disfrutar de todas las ventajas que ofrecemos. ¡Te esperamos!</p>
                    <button class="hidden" id="register">registrate</button>
                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>
