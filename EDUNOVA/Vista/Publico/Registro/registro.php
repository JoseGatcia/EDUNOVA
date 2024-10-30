<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edunova - Regístrate</title>
    <link rel="stylesheet" href="registro.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="titulo">Registrate en Edunova y da un paso más allá en los métodos educativos</h1>
        <div class="formulario">
            <form class="registro" action="../Inicio_Sesion/inicio_sesion.php" id="registroForm">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" class="form-control" name="Nombre" required>
                </div>
                <div class="form-group">
                    <label for="apellido">Apellido</label>
                    <input type="text" id="apellido" class="form-control" name="Apellido" required>
                </div>
                <div class="form-group">
                    <label for="direccion">Dirección</label>
                    <input type="text" id="direccion" class="form-control" name="Dirección" required>
                </div>
                <div class="form-group">
                    <label for="edad">Edad</label>
                    <input type="number" id="edad" class="form-control" name="Edad" required>
                </div>
                <div class="form-group">
                    <label for="correo">Correo electrónico o Número de Teléfono</label>
                    <input type="text" id="correo" class="form-control" name="Correo" required>
                </div>
                <div class="form-group">
                    <label for="contrasena1">Contraseña Nueva</label>
                    <input type="password" id="contrasena1" class="form-control" name="ContraseñaN" required>
                </div>
                <div class="form-group">
                    <label for="contrasena2">Confirmar Contraseña</label>
                    <input type="password" id="contrasena2" class="form-control" name="ContraseñaC" required>
                </div>
                <div class="form-group">
                    <label for="mostrar_contra">
                        <input type="checkbox" id="mostrar_contra" name="Btncontra">
                        Mostrar Contraseña
                    </label>
                </div>
                <button type="submit" class="btn-registro" name="btnregistro">Regístrarse</button>
            </form>
        </div>
    </div>
    <script>
        const checkbox = document.getElementById('mostrar_contra');
        const passwordInput1 = document.getElementById('contrasena1');
        const passwordInput2 = document.getElementById('contrasena2');
        const form = document.getElementById('registroForm');

        checkbox.addEventListener('change', () => {
            const type = checkbox.checked ? 'text' : 'password';
            passwordInput1.type = type;
            passwordInput2.type = type;
        });

        form.addEventListener('submit', (event) => {
            if (passwordInput1.value !== passwordInput2.value) {
                event.preventDefault();
                alert('Las contraseñas no coinciden. Por favor, inténtalo de nuevo.');
            }
        });
    </script>
</body>
</html>
