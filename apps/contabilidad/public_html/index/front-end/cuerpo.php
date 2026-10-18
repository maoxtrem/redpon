<?php
if (!defined('REDPON_INDEX_PAGE')) {
    http_response_code(404);
    exit;
}
?>
<div class="contenedor">
    <h1 class="titulo">Empieza a administrar mejor tu negocio, más claro y bajo control, todo lo importante, en un solo lugar.</h1>
    <p class="parrafo">Comienza a organizar toda la información de tu negocio de manera fácil, rápida y eficiente.</p>
    <p class="parrafo">Una herramienta clara para que puedas administrar tus operaciones sin complicaciones innecesarias.</p>
    <p class="parrafo">Lleva el control administrativo de las operaciones sin depender de facturación electrónica.</p>
    <p class="parrafo">Registra los servicios y la información de cada cliente dentro de tu negocio.</p>
    <p class="parrafo">Software administrativo para organizar negocios, clientes, servicios, ingresos, gastos y operaciones desde un solo lugar.</p>
    <div class="botones-centro">
        <a class="boton boton-principal" href="/login.php">Iniciar sesión</a>
        <a class="boton boton-principal" href="/registro.php">Crear cuenta</a>
        <a class="boton boton-principal" href="<?= htmlspecialchars($urlInicioSesionGoogle, ENT_QUOTES, 'UTF-8') ?>">
            <svg width="20" height="20" viewBox="0 0 24 24" style="display:inline-block; vertical-align:middle; margin-right:8px;" aria-hidden="true">
                <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.03 9.33 0 11.83 0 14.5s1.03 5.17 2.18 7.43l3.66-2.84z"/>
                <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
            </svg>
            Continuar con Google
        </a>
    </div>
</div>
