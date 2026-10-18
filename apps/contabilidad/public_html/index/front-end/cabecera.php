<?php
if (!defined('REDPON_INDEX_PAGE')) {
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
    <meta name="description" content="REDPON: software administrativo para controlar tu negocio de forma sencilla.">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <title>REDPON | Administración para tu negocio</title>
    <link rel="manifest" href="/manifest.json">
    <link rel="icon" type="image/png" href="/Logo.png">
    <link rel="stylesheet" href="/index/estilos/cabecera.php">
    <link rel="stylesheet" href="/index/estilos/cuerpo.php">
    <link rel="stylesheet" href="/index/estilos/pie.php">
    <link rel="stylesheet" href="/index/estilos/whatsapp.php">
</head>
<body>
    <header class="cabecera-publica">
    <div class="cabecera-publica-grid">
        <a class="marca" href="/">
            <img src="<?= htmlspecialchars($datosCabecera['logo'], ENT_QUOTES, 'UTF-8') ?>" alt="<?= htmlspecialchars($datosCabecera['nombre'], ENT_QUOTES, 'UTF-8') ?>">
            <span class="marca-texto"><?= htmlspecialchars($datosCabecera['nombre'], ENT_QUOTES, 'UTF-8') ?></span>
        </a>
        <div class="cabecera-acciones">
            <button id="botonInstalar" class="boton-instalar" type="button" hidden>Instalar Web</button>
        </div>
    </div>
</header>
<script>
(() => {
    let eventoInstalacion = null;
    const botonInstalar = document.getElementById('botonInstalar');
    if (!botonInstalar) return;

    window.addEventListener('beforeinstallprompt', (evento) => {
        evento.preventDefault();
        eventoInstalacion = evento;
        botonInstalar.hidden = false;
    });

    botonInstalar.addEventListener('click', async () => {
        if (!eventoInstalacion) return;
        eventoInstalacion.prompt();
        await eventoInstalacion.userChoice;
        eventoInstalacion = null;
        botonInstalar.hidden = true;
    });

    if (window.matchMedia('(display-mode: standalone)').matches || window.navigator.standalone === true) {
        botonInstalar.hidden = true;
    }
})();
</script>
