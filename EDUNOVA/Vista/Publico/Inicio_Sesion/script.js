const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});
function redirectToInicio() {
    // Obtener los valores de los campos del formulario
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    // Validar que los campos no estén vacíos
    if (email.trim() === '' || password.trim() === '') {
        alert('Por favor, rellena todos los campos.');
        return;
    }

    // Aquí puedes agregar la lógica de validación de inicio de sesión si es necesario
    // Por ejemplo, verificar el correo y la contraseña

    // Redirigir al usuario a ../Inicio/inicio.html
    window.location.href = '../Inicio/inicio.php';
}