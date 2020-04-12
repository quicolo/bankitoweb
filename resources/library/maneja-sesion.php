<?php

function iniciaSesionSegura() {
    session_start();
    
    // Si no está definida la constante se toman 30 mintutos como valor por defecto
    $duracionMaxima = defined('MINUTOS_CADUCA_SESION') ?? 30;

    if (isset($_SESSION['ULTIMO_ACCESO']) && (time() - $_SESSION['ULTIMO_ACCESO'] > $duracionMaxima*60)) {
        cierraSesionSegura();
    }
    $_SESSION['ULTIMO_ACCESO'] = time();
}


function cierraSesionSegura() {
    if(isset($_SESSION)) {
        // Limpiamos las variables de sesión
        session_unset();

        // Borramos la cookie de sesión
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]
            );
        }

        // Finalmente, destruir la sesión.
        session_destroy();
    }
}
