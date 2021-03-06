<?php

require_once '../resources/config.php';
include LIBRARY_PATH . '/valida-entrada.php';
include LIBRARY_PATH . '/maneja-sesion.php';

iniciaSesionSegura();
// Recoger datos del formulario
if (isset($_POST)) {

    // Recogemos datos del formulario y saneamos las cadenas de entrada
    $usuarioForm = trim(filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $passwordForm = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS));

    // Borramos la sesión antigua, si la hubiera, para que tras un login
    // exitoso, el siguiente intento se compruebe debidamente y no aproveche
    // la sessión del anterior
    if (isset($_SESSION['usuario'])) {
        unset($_SESSION['usuario']);
    }

    // Verificamos los caracteres permitidos en el nombre de usuario así como 
    // el tamaño mínimo y máximo del nombre de usuario
    if (validaUsuario($usuarioForm)) {

        // Consulta para comprobar las credenciales del usuario
        $query = "SELECT * FROM usuario WHERE nombre = '$usuarioForm'";

        $resultado = mysqli_query($dbConexion, $query);

        if (isset($resultado) && mysqli_num_rows($resultado) == 1) {
            $arrayresult = mysqli_fetch_assoc($resultado);

            // Comprobar la contraseña
            $comprobacion = password_verify($passwordForm, $arrayresult['password']);

            if ($comprobacion) {
                // Guardamos el array asociativo del usuario en la sesión
                $_SESSION['usuario'] = $arrayresult;
            } else {
                // Si algo falla enviar una sesión con el fallo
                $_SESSION['error_login'] = "Usuario o contraseña incorrecto";
            }
        } else {
            $_SESSION['error_login'] = "Usuario o contraseña incorrecto";
        }
    } else {
        $_SESSION['error_login'] = "Usuario o contraseña incorrecto";
    }

    if (isset($_SESSION['usuario']))
        header('Location: '.POS_GLOBAL_PATH.'/principal-posicion-global.php');
    else
        header('Location: '.PUBLIC_HTML_PATH.'/login-form.php');
}

