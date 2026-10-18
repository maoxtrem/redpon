<?php
if (!defined('INGRESOS_COMPONENTE') || !defined('ACCESO_PERMITIDO')) {
    http_response_code(403);
    exit;
}

require_once __DIR__ . '/../../home/back-end/cabecera.php';
$rutasMenu['ingresos'] = '/ingresos/index.php';
$menuSeccionActiva = 'ingresos';
$menuLateralHtml = redpon_renderizar_menu($rutasMenu, $menuSeccionActiva);
$tituloPagina = 'Ingresos';
