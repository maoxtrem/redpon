<?php
if (!defined('INGRESOS_COMPONENTE') || !defined('ACCESO_PERMITIDO')) {
    http_response_code(403);
    exit;
}

$fechaActual = date('Y-m-d');
$formularioSoloVisual = true;
