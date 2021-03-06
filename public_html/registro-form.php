<?php
require_once '../resources/config.php';
include TEMPLATES_PATH . '/index-header.php';
include LIBRARY_PATH . '/maneja-sesion.php';
include LIBRARY_PATH . '/maneja-mensajes-form.php';

iniciaSesionSegura();
?>

<!-- Registro -->
<div class="w3-center w3-padding-64" id="registro">
    <span class="w3-xlarge w3-bottombar w3-border-dark-grey w3-padding-16">Regístrate en Bankito</span>
</div>


<?php
$nombre = "";
$apellido1 = "";
$apellido2 = "";
$nif = "";
$email = "";
$usuario = "";


if (isset($_SESSION['errores'])) {
    muestraMensajes(false);
    $nombre = $_SESSION['nombre'];
    $apellido1 = $_SESSION['apellido1'];
    $apellido2 = $_SESSION['apellido2'];
    $nif = $_SESSION['nif'];
    $email = $_SESSION['email'];
    $usuario = $_SESSION['usuario'];
}
?>

<form class="w3-container" method="post" action="registro-valida-form.php">
    <div class="w3-section">
        <label>Nombre</label>
        <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="text" name="nombre" required value="<?= $nombre ?>">
    </div>
    <div class="w3-section">
        <label>Primer apellido</label>
        <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="text" name="apellido1" required value="<?= $apellido1 ?>" >
    </div>
    <div class="w3-section">
        <label>Segundo apellido</label>
        <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="text" name="apellido2" value="<?= $apellido2 ?>" >
    </div>
    <div class="w3-section">
        <label>NIF/NIE</label>
        <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="text" name="nif" 
                      pattern="[0-9]{8}[A-Z]{1}" title="Formato: 8 dígitos seguidos de una letra mayúscula" placeholder="Formato 00000000A" value="<?= $nif ?>" required>
    </div>
    <div class="w3-section">
        <label>Email</label>
        <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="email" name="email" value="<?= $email ?>" required>
    </div>
    <div class="w3-section">
        <label>Nombre de usuario</label>
        <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="text" name="usuario" value="<?= $usuario ?>" required>
    </div>
    <div class="w3-section">
        <label>Contraseña</label>
        <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="password" name="password1" required>
    </div>
    <div class="w3-section">
        <label>Repita la contraseña</label>
        <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="password" name="password2" required>
    </div>
    <button type="submit" name="enviar" class="w3-button w3-block w3-black">Enviar</button>
</form>

<?php
if (isset($_SESSION['errores'])) {
    session_unset();
}
?>

<?php
include TEMPLATES_PATH . '/index-footer.php';
?>