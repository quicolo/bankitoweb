<?php
require_once '../resources/config.php';
require LIBRARY_PATH . '/maneja-sesion.php';

cierraSesionSegura();

header('Location: index.php');