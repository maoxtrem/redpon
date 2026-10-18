<?php
if (!defined('REDPON_INDEX_PAGE')) {
    http_response_code(404);
    exit;
}

function redponIndexUrlInicioSesionGoogle(): string
{
    // Se conserva la ruta pública actual para no interrumpir el flujo OAuth.
    return '/index/google_login.php';
}
