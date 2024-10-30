<?php

session_start();

if(session_status() === PHP_SESSION_ACTIVE) {
    session_destroy();
    $_SESSION = [];
}

header('Location: ../../Vista/Publico/Inicio_Sesion/inicio_sesion.php');