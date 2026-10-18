<?php
if (!defined('ACCESO_PERMITIDO')) {
    require_once __DIR__ . '/../verificarsesion.php';
}

$seccionActivaMenu = isset($menuSeccionActiva) ? (string) $menuSeccionActiva : (string) ($_GET['seccion'] ?? '');
$seccionesPermitidas = ['inicio', 'ingresos', 'contactos', 'items', 'reportes', 'configuracion'];
if (!in_array($seccionActivaMenu, $seccionesPermitidas, true)) {
    $seccionActivaMenu = '';
}

require_once __DIR__ . '/../../redpon.com/redpon/home/back-end/cabecera.php';
if (!headers_sent()) {
    header('Content-Type: text/html; charset=UTF-8');
}
echo redpon_renderizar_menu($rutasMenu, $seccionActivaMenu);
