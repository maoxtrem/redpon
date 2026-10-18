<?php
// Carga la configuración de sesión.
require_once __DIR__ . '/../redpon.com/redpon/sesion/config.php';

// Si el usuario ya inició sesión, envíalo al panel.
if (isset($_SESSION['logueado']) && $_SESSION['logueado'] === true) {
    header('Location: /home/index.php');
    exit;
}

// Permite que las vistas comprueben que se cargaron desde esta página.
define('REDPON_INDEX_PAGE', true);

// Carga las funciones privadas que preparan los datos de la página.
require_once __DIR__ . '/../redpon.com/redpon/index/back-end/cabecera.php';
require_once __DIR__ . '/../redpon.com/redpon/index/back-end/cuerpo.php';
require_once __DIR__ . '/../redpon.com/redpon/index/back-end/pie.php';
require_once __DIR__ . '/../redpon.com/redpon/index/back-end/whatsapp.php';

// Obtiene los datos que usarán las vistas.
$datosCabecera = redponIndexDatosCabecera();
$urlInicioSesionGoogle = redponIndexUrlInicioSesionGoogle();
$anio = redponIndexAnioActual();
$enlaceWhatsapp = redponIndexEnlaceWhatsApp();

// Ubicación de los componentes visuales PHP.
$directorioVistas = __DIR__ . '/index/front-end/';
$vistas = [
    'cabecera.php',
    'whatsapp.php',
    'cuerpo.php',
    'pie.php',
];

// Comprueba que todos los componentes estén disponibles antes de imprimir.
foreach ($vistas as $nombreVista) {
    $rutaVista = $directorioVistas . $nombreVista;
    if (!is_file($rutaVista) || !is_readable($rutaVista)) {
        http_response_code(500);
        exit;
    }
}

// Envía el tipo de contenido antes de que las vistas generen salida.
header('Content-Type: text/html; charset=UTF-8');

// Las vistas PHP se ejecutan y reciben las variables definidas arriba.
require $directorioVistas . 'cabecera.php';
require $directorioVistas . 'whatsapp.php';
require $directorioVistas . 'cuerpo.php';
require $directorioVistas . 'pie.php';
