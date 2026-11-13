<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$rolesPermitidos = ['root', 'app'];

$nuevoRol = $_POST['rol'] ?? 'app';

if (in_array($nuevoRol, $rolesPermitidos, true)) {
    $_SESSION['rol'] = $nuevoRol;
}

header('Location: index.php');
exit;