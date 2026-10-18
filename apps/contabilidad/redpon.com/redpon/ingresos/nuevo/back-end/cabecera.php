<?php
if (!defined('INGRESOS_COMPONENTE') || !defined('ACCESO_PERMITIDO')) {
    http_response_code(403);
    exit;
}

require_once __DIR__ . '/../../../home/back-end/cabecera.php';
$tituloPagina = 'Nuevo documento de ingreso';
$menuSeccionActiva = 'ingresos';
$menuLateralHtml = redpon_renderizar_menu($rutasMenu, $menuSeccionActiva);
