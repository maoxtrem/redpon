<?php
if (!defined('ACCESO_PERMITIDO')) {
    http_response_code(403);
    exit;
}

$mostrarMensajeBienvenida = isset($_GET['mensaje']) && $_GET['mensaje'] === 'bienvenido';

// Valores visuales temporales hasta conectar las tablas del panel.
$valoresPanel = [
    'ingresos' => '$0',
    'gastos' => '$0',
    'clientes' => '0',
    'saldo' => '$0',
];

// Se conservan los destinos actuales; no se asignan rutas de módulos sin validarlas.
$urlsAcciones = [
    'ingreso' => '#',
    'gasto' => '#',
    'cliente' => '#',
    'servicio' => '#',
];
