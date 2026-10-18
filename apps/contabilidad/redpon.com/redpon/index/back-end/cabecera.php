<?php
if (!defined('REDPON_INDEX_PAGE')) {
    http_response_code(404);
    exit;
}

function redponIndexDatosCabecera(): array
{
    return [
        'nombre' => 'REDPON',
        'logo' => '/Logo.png',
    ];
}
