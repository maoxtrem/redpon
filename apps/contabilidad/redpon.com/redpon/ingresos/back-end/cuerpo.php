<?php
if (!defined('INGRESOS_COMPONENTE') || !defined('ACCESO_PERMITIDO')) {
    http_response_code(403);
    exit;
}

/*
 * La vista queda lista para recibir los registros cuando se integre la consulta
 * de ingresos. No se muestran datos de ejemplo para evitar confundirlos con reales.
 */
$filasTabla = '<tr><td colspan="6"><div class="estado-vacio"><strong>Ingresos</strong>El listado se conectará con tus registros en el siguiente paso.</div></td></tr>';
$listaMovil = '<div class="estado-vacio"><strong>Ingresos</strong>El listado se conectará con tus registros en el siguiente paso.</div>';
$infoPaginacion = '0 documentos';
