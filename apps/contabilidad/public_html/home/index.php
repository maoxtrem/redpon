<?php
require_once __DIR__ . '/../verificarsesion.php';
define('REDPON_HOME_PAGE', true);
require_once __DIR__ . '/../../redpon.com/redpon/home/back-end/cabecera.php';
require_once __DIR__ . '/../../redpon.com/redpon/home/back-end/cuerpo.php';
require_once __DIR__ . '/../../redpon.com/redpon/home/back-end/pie.php';
require_once __DIR__ . '/../../redpon.com/redpon/home/back-end/v.php';

$directorioVistas = __DIR__ . '/front-end/';
$vistas = ['cabecera.php', 'cuerpo.php', 'v.php', 'pie.php'];
foreach ($vistas as $nombreVista) {
    $rutaVista = $directorioVistas . $nombreVista;
    if (!is_file($rutaVista) || !is_readable($rutaVista)) {
        http_response_code(500);
        exit;
    }
}
header('Content-Type: text/html; charset=UTF-8');
require $directorioVistas . 'cabecera.php';
require $directorioVistas . 'cuerpo.php';
require $directorioVistas . 'v.php';
require $directorioVistas . 'pie.php';
