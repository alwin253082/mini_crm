<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$config = require __DIR__ . '/config.php';

$rol = $_SESSION['rol'] ?? 'app';

if (!isset($config[$rol])) {
    $rol = 'app';
    $_SESSION['rol'] = $rol;
}

$db = $config[$rol];

$conexion = new mysqli(
    $db['servidor'],
    $db['usuario'],
    $db['password'],
    $db['base_datos']
);

if ($conexion->connect_error) {
    die("❌ Error de conexión: " . $conexion->connect_error);
}

$conexion->set_charset("utf8");