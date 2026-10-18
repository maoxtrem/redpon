<?php
require_once __DIR__ . '/config_sesion.php';

if (!defined('ACCESO_PERMITIDO')) {
    define('ACCESO_PERMITIDO', true);
}

// Si no hay sesión activa, volver al inicio.
if (!isset($_SESSION['logueado']) || $_SESSION['logueado'] !== true) {
    header('Location: /index.php');
    exit;
}

// Evitar que la página protegida quede guardada en caché.
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Pragma: no-cache');

$nombreUsuario = htmlspecialchars(
    $_SESSION['usuario_nombre'] ?? $_SESSION['usuario'] ?? 'Usuario',
    ENT_QUOTES,
    'UTF-8'
);
