<?php
if (!defined('REDPON_INDEX_PAGE')) {
    http_response_code(404);
    exit;
}

function redponIndexAnioActual(): int
{
    return (int) date('Y');
}
