<?php
include 'entorno.php';

define("PROTOCOLO", "http");

// Constantes rutas en disco duro
define("APACHE_ROOT_PATH", $_SERVER['DOCUMENT_ROOT']);
define("APP_FOLDER", "bankitoweb");
define("APP_ROOT_PATH", APACHE_ROOT_PATH . '/' . APP_FOLDER);

define("RESOURCES_PATH", APP_ROOT_PATH . '/resources');
define("LIBRARY_PATH", RESOURCES_PATH . '/library');
define("TEMPLATES_PATH", RESOURCES_PATH . '/templates');

define("VENDOR_PATH", APP_ROOT_PATH . '/vendor');

// Constantes de comportamiento de la aplicación
define("MINUTOS_CADUCA_TOKEN", 30);


// Configuración del intérprete de PHP según en nivel de errores
if (ERROR_LEVEL == "DEPURACION") {
    ini_set("error_reporting", "true");
    error_reporting(E_ALL | E_STRICT);
} else { //Producción u otro caso no especificado (el más escricto)
    ini_set("error_reporting", "false");
}

// Variables para la construcción del array config
$dbName = "";
$username = "";
$password = "";
$host = "";

if (ENTORNO == "DESARROLLO") {
    $dbName = "bankito";
    $userName = "bankitoadmin";
    $password = "admin";
    $host = "localhost";
} else if (ENTORNO == "PRODUCCION") {
    $dbName = "bankito";
    $userName = "kike";
    $password = "Pavjclob.101";
    $host = "localhost";
}

define("BASE_URL", PROTOCOLO . '://' . $host . '/' . APP_FOLDER . '/');

$dbConexion = mysqli_connect($host, $userName, $password, $dbName);
mysqli_query($dbConexion, "SET NAMES 'utf8'");

// Iniciar la sesión
session_start();
?>