<?php
if (!defined('ACCESO_PERMITIDO')) {
    http_response_code(403);
    exit;
}

$anioActual = (int) date('Y');
