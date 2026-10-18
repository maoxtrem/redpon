<?php
if (!defined('REDPON_MENU_VIEW')) {
    http_response_code(403);
    exit;
}
?>
<aside class="barra-lateral" id="barraLateral">
<nav class="menu-lateral" id="menuLateral" aria-label="Navegación principal">
    <div class="menu-superior">
        <a href="<?= $menuValores['INICIO']['url'] ?>" class="menu-enlace<?= $menuValores['INICIO']['activo'] ?>"<?= $menuValores['INICIO']['aria'] ?>><span class="icono" aria-hidden="true">🏠</span> Inicio</a>
        <a href="<?= $menuValores['INGRESOS']['url'] ?>" class="menu-enlace<?= $menuValores['INGRESOS']['activo'] ?>"<?= $menuValores['INGRESOS']['aria'] ?>><span class="icono" aria-hidden="true">📄</span> Ingresos</a>
        <a href="<?= $menuValores['CONTACTOS']['url'] ?>" class="menu-enlace<?= $menuValores['CONTACTOS']['activo'] ?>"<?= $menuValores['CONTACTOS']['aria'] ?>><span class="icono" aria-hidden="true">👥</span> Contactos</a>
        <a href="<?= $menuValores['ITEMS']['url'] ?>" class="menu-enlace<?= $menuValores['ITEMS']['activo'] ?>"<?= $menuValores['ITEMS']['aria'] ?>><span class="icono" aria-hidden="true">📦</span> Ítems de venta</a>
        <a href="<?= $menuValores['REPORTES']['url'] ?>" class="menu-enlace<?= $menuValores['REPORTES']['activo'] ?>"<?= $menuValores['REPORTES']['aria'] ?>><span class="icono" aria-hidden="true">📈</span> Reportes</a>
        <a href="<?= $menuValores['CONFIGURACION']['url'] ?>" class="menu-enlace<?= $menuValores['CONFIGURACION']['activo'] ?>"<?= $menuValores['CONFIGURACION']['aria'] ?>><span class="icono" aria-hidden="true">⚙️</span> Configuración</a>
    </div>
    <div class="menu-inferior">
        <a href="<?= $menuValores['CERRAR_SESION']['url'] ?>" class="menu-enlace<?= $menuValores['CERRAR_SESION']['activo'] ?>"<?= $menuValores['CERRAR_SESION']['aria'] ?>><span class="icono" aria-hidden="true">🚪</span> Cerrar sesión</a>
    </div>
</nav>
</aside>
<div class="capa-menu" id="capaMenu" aria-hidden="true"></div>
