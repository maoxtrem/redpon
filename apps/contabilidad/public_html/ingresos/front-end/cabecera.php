<?php
if (!defined('REDPON_INGRESOS_PAGE')) {
    http_response_code(404);
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#087f5b">
    <title><?= htmlspecialchars($tituloPagina, ENT_QUOTES, 'UTF-8') ?> | REDPON</title>
    <link rel="icon" type="image/png" href="/Logo.png">
    <link rel="stylesheet" href="/home/estilos/cabecera.php">
    <link rel="stylesheet" href="estilos/cabecera.php">
    <link rel="stylesheet" href="estilos/cuerpo.php">
    <link rel="stylesheet" href="estilos/pie.php">
    <link rel="stylesheet" href="estilos/v.php?v=20261010-2">
    <link rel="stylesheet" href="/menu/estilos/menu.php">
</head>
<body class="pagina-ingresos menu-oculto">
<header class="barra-superior">
    <button class="boton-menu" id="botonMenu" type="button" aria-label="Mostrar u ocultar menú" aria-controls="barraLateral" aria-expanded="false">☰</button>
    <div class="titulo-superior"><span><?= htmlspecialchars($tituloPagina, ENT_QUOTES, 'UTF-8') ?></span></div>
    <div class="zona-usuario">
        <span class="usuario-sesion">Hola, <?= $nombreUsuarioHtml ?></span>
        <a class="marca" href="/home/index.php" aria-label="Inicio REDPON"><img src="/Logo.png" alt="Logo REDPON"></a>
    </div>
</header>
<div class="estructura">
<?= $menuLateralHtml ?>
