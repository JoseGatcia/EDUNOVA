<?php session_start();
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SERVICIOS</title>
    <link rel="stylesheet" href="servicios.css" href="header.css">
</head>
<body>
    <header>
        <nav>
            <ul class="navegacion">
                <li><a href="../Inicio/inicio.php">INICIO</a></li>
                    <li><a href="../Nosotros/nosotros.php">NOSOTROS</a></li>
                    <li><a href="../Servicios/servicios.php">SERVICIOS</a></li>
                    <?php
                        if(session_status() === PHP_SESSION_ACTIVE && $_SESSION['usuario'] != null) {
                            ?>
                            <li>
                                <a href="../Inicio_Sesion/inicio_sesion.php" id="logout-button" title="Cerrar sesión">
                                    <img src="../img/user_4461325.png" alt="Cerrar sesión">
                                </a>
                            </li>
                            <?php
                        } else {
                            ?>
                                <li><a href="../Inicio_Sesion/inicio_sesion.php">INGRESAR</a></li>
                            <?php
                        }
                    ?>
            </ul>
        </nav>
        <img class="Edunova" src="../images/logo.png" alt="">
    </header>
    <section id="nuestros-programas">
        <div class="container">
            <div class="programas">
                <div class="carta">
                    <h3>PLAN BASICO:</h3>
                    <p class="parrafo">Este plan ofrece acceso exclusivo a nuestro servicio, aunque con disponibilidad limitada de anotaciones. ¡Aproveche y obtenga un mes de prueba gratuito para experimentar todas las ventajas que tenemos para ofrecer!</p>
                    <div class="contenedor-boton">
                        <button class="precio" data-modal-target="modal-basico">39.999 COP$</button>
                    </div>
                </div>
                <div class="carta">
                    <h3>PLAN PRO</h3>
                    <p class="parrafo">Con el Plan Pro, tendrás acceso completo a nuestro servicio, incluyendo anotaciones y un sistema de calificaciones. Además, podrás agregar hasta 200 estudiantes a nuestro sistema. ¡Mejora tu experiencia educativa hoy mismo!</p>
                    <div class="contenedor-boton">
                        <button class="precio" data-modal-target="modal-pro">50.999 COP$</button>
                    </div>
                </div>
                <div class="carta">
                    <h3>PLAN NOVA:</h3>
                    <p class="parrafo">Disfruta del acceso completo a nuestra plataforma, sin restricciones ni limitaciones. ¡Potencia tus capacidades y alcanza nuevas metas sin barreras! Con nuestro servicio, tendrás todas las herramientas necesarias para maximizar tu potencial.</p>
                    <div class="contenedor-boton">
                        <button class="precio" data-modal-target="modal-Edunova">99.99 COP$</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="modal-basico" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2>PLAN BASICO</h2>
            <p>Este plan es una opción de suscripción que le brinda acceso exclusivo a nuestro servicio. Esto significa que al adquirir este plan, usted tendrá la oportunidad de utilizar y disfrutar de las características y beneficios únicos que ofrecemos, los cuales están diseñados para facilitarle y mejorar su experiencia en el área de interés correspondiente.

                Sin embargo, es importante tener en cuenta que este plan tiene una disponibilidad limitada de anotaciones. Esto quiere decir que, en comparación con otros planes más avanzados o completos, el número de anotaciones que puede realizar o acceder está restringido a un cierto límite. Las anotaciones pueden referirse a notas, comentarios, marcadores o cualquier otra forma de información adicional que pueda agregar o visualizar en el contexto de nuestro servicio.
                
                A pesar de esta limitación, este plan es una excelente oportunidad para que conozca y se familiarice con nuestras herramientas y funcionalidades. Para que pueda probar y evaluar si nuestro servicio se adapta a sus necesidades y expectativas, le ofrecemos un mes de prueba gratuito. Durante este período, podrá experimentar todas las ventajas y beneficios que tenemos para ofrecer, sin costo alguno.</p>
            <button class="boton-comprar">Comprar</button>
            
        </div>
    </div>
    </div>
    <div id="modal-pro" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2>PLAN PRO</h2>
            <p>El Plan Pro es una suscripción que le brinda acceso completo a nuestro servicio, lo que significa que al adquirir este plan, tendrá la oportunidad de utilizar y disfrutar de todas las características y beneficios avanzados que ofrecemos, diseñados para mejorar su experiencia educativa.

                Con el Plan Pro, no solo tendrá acceso ilimitado a todas las funcionalidades de nuestra plataforma, sino que también podrá crear y guardar anotaciones en los materiales educativos, lo que le ayudará a estudiar y comprender mejor los contenidos. Además, nuestro sistema de calificaciones avanzado le permitirá realizar un seguimiento de su progreso académico y evaluar su desempeño en las diferentes actividades y evaluaciones.
                
                Si usted es un educador o tutor, el Plan Pro le permite agregar hasta 200 estudiantes a nuestro sistema, lo que le permitirá gestionar y monitorear su progreso académico de manera más eficiente. Podrá asignarles actividades y evaluaciones personalizadas, y acceder a informes detallados sobre su rendimiento.
                
                Es importante tener en cuenta que, a diferencia de otros planes más limitados, el Plan Pro no tiene restricciones en el número de anotaciones que puede realizar o acceder. Esto significa que tendrá la libertad de crear y guardar todas las anotaciones que necesite para mejorar su experiencia de aprendizaje.</p>
            <button class="boton-comprar">Comprar</button>

        </div>
    </div>
    <div id="modal-Edunova" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2>PLAN NOVA</h2>
            <p>El Plan Edunova es la opción de suscripción más completa y avanzada que ofrecemos, diseñada para aquellos que buscan aprovechar al máximo nuestra plataforma educativa y llevar su experiencia de aprendizaje al siguiente nivel.

                Con el Plan Edunova, disfrutarás del acceso completo a todas las funcionalidades y herramientas de nuestra plataforma, sin restricciones ni limitaciones. Esto significa que tendrás la libertad de explorar y utilizar todas las características y beneficios que ofrecemos, sin preocuparte por límites o barreras.
                
                Además, el Plan Edunova está diseñado para ayudarte a potenciar tus capacidades y alcanzar nuevas metas. Con nuestro servicio, tendrás todas las herramientas necesarias para maximizar tu potencial y lograr tus objetivos educativos de manera más efectiva y eficiente.
                
                Nuestro sistema de calificaciones avanzado te permitirá realizar un seguimiento de tu progreso académico y evaluar tu desempeño en las diferentes actividades y evaluaciones. Además, podrás crear y guardar anotaciones ilimitadas en los materiales educativos, lo que te ayudará a estudiar y comprender mejor los contenidos.
                
                Si eres un educador o tutor, el Plan Edunova te permite agregar una cantidad ilimitada de estudiantes a nuestro sistema, lo que te permitirá gestionar y monitorear su progreso académico de manera más eficiente. Podrás asignarles actividades y evaluaciones personalizadas, y acceder a informes detallados sobre su rendimiento.</p>
            <button class="boton-comprar">Comprar</button>

        </div>
    </div>

    <script>
        document.getElementById('logout-button').addEventListener('click', function(event) {
            event.preventDefault();

            const confirmLogout = confirm('¿Estás segur@ de cerrar sesión?');

            if (confirmLogout) { 
                window.location.href = '../../../Control/ADMIN/CerrarSesion.php';            }
        });

        document.querySelectorAll('.precio').forEach(button => {
            button.addEventListener('click', function()
{
document.getElementById(this.dataset.modalTarget).style.display = 'block';
});
});


document.querySelectorAll('.cerrar').forEach(button => {
        button.addEventListener('click', function() {
            document.getElementById(this.closest('.modal').id).style.display = 'none';
        });
    });

    window.addEventListener('click', function(event) {
        if (event.target.classList.contains('modal')) {
            event.target.style.display = 'none';
        }
    });
    </script>
</body>
</html>