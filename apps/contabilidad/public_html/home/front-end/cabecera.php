<?php
if (!defined('REDPON_HOME_PAGE')) {
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
    <meta name="description" content="Panel principal | REDPON">
    <title>Panel principal | REDPON</title>
    <link rel="manifest" href="/manifest.json">
    <link rel="icon" type="image/png" href="/Logo.png">
    <link rel="stylesheet" href="/home/estilos/cabecera.php">
    <link rel="stylesheet" href="/home/estilos/cuerpo.php">
    <link rel="stylesheet" href="/home/estilos/pie.php">
    <link rel="stylesheet" href="/home/estilos/v.php">
    <link rel="stylesheet" href="/menu/estilos/menu.php">
</head>
<body class="menu-oculto">
<header class="barra-superior">
    <button class="boton-menu" id="botonMenu" type="button" aria-label="Mostrar u ocultar menú" aria-controls="barraLateral" aria-expanded="false">☰</button>
    <div class="titulo-superior"></div>
    <div class="zona-usuario">
        <span class="usuario-sesion">Hola, <?= $nombreUsuarioHtml ?></span>
        <a class="marca" href="/home/index.php" aria-label="Inicio REDPON"><img src="/Logo.png" alt="Logo REDPON"></a>
    </div>
</header>
<div class="estructura">
<?= $menuLateralHtml ?>
