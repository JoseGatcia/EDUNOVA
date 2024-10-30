<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edunova - Recuperar Contraseña</title>
    <link rel="stylesheet" href="recuperar_contrasena.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <form id="recuperarForm" class="correo" action="#">
                <h1>Recuperar Contraseña</h1>
                <div class="texto_correo">
                    <h3 class="correo_texto">Correo Electrónico o Número de Teléfono</h3>
                </div>
                <input class="escribir_correo" type="text" id="emailInput" required>
                <button class="boton_inicio" type="submit">Enviar</button>
            </form>
            <div id="confirmacion" class="confirmacion" style="display: none;">
                <h3>Se ha enviado un correo a la dirección proporcionada.</h3>
                <button onclick="location.href='../Inicio_Sesion/inicio_sesion.php'" class="boton_volver">Volver al Inicio de Sesión</button>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('recuperarForm').addEventListener('submit', function(event) {
            event.preventDefault();
            document.getElementById('recuperarForm').style.display = 'none';
            document.getElementById('confirmacion').style.display = 'block';
        });
    </script>
</body>
</html>
