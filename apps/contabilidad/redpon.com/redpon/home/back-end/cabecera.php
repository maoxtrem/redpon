<?php
if (!defined('ACCESO_PERMITIDO')) {
    http_response_code(403);
    exit;
}

// Datos y destinos de navegación preparados para la cabecera visual.
$nombreUsuarioHtml = $nombreUsuario ?? 'Usuario';
$rutasMenu = [
    'inicio' => '/home/index.php',
    'ingresos' => '/ingresos/index.php',
    'contactos' => '#',
    'items' => '#',
    'reportes' => '#',
    'configuracion' => '#',
    'cerrar_sesion' => '/cerrar_sesion.php',
];

require_once __DIR__ . '/../../menu/back-end/menu.php';
$menuSeccionActiva = isset($menuSeccionActiva) ? $menuSeccionActiva : 'inicio';
$menuLateralHtml = redpon_renderizar_menu($rutasMenu, $menuSeccionActiva);
