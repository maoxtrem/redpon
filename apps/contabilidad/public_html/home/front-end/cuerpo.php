<?php
if (!defined('REDPON_HOME_PAGE')) {
    http_response_code(404);
    exit;
}
?>
<main class="contenido-principal">
    <div class="mensaje-bienvenida" <?= $mostrarMensajeBienvenida ? '' : 'hidden' ?>>
        ✅ Bienvenido, <?= $nombreUsuarioHtml ?>. Tu sesión está activa.
    </div>

    <section class="tarjetas-resumen" aria-label="Resumen del negocio">
        <article class="tarjeta-resumen ingresos">
            <span class="etiqueta">Ingresos</span>
            <strong><?= htmlspecialchars($valoresPanel['ingresos'], ENT_QUOTES, 'UTF-8') ?></strong>
            <small>Ingresos registrados</small>
        </article>
        <article class="tarjeta-resumen gastos">
            <span class="etiqueta">Gastos</span>
            <strong><?= htmlspecialchars($valoresPanel['gastos'], ENT_QUOTES, 'UTF-8') ?></strong>
            <small>Gastos registrados</small>
        </article>
        <article class="tarjeta-resumen clientes">
            <span class="etiqueta">Clientes</span>
            <strong><?= htmlspecialchars($valoresPanel['clientes'], ENT_QUOTES, 'UTF-8') ?></strong>
            <small>Clientes registrados</small>
        </article>
        <article class="tarjeta-resumen saldo">
            <span class="etiqueta">Saldo</span>
            <strong><?= htmlspecialchars($valoresPanel['saldo'], ENT_QUOTES, 'UTF-8') ?></strong>
            <small>Resultado actual</small>
        </article>
    </section>

    <section class="paneles">
        <article class="panel">
            <h2>Acciones rápidas</h2>
            <p class="panel-descripcion">Administra las operaciones más importantes desde aquí.</p>
            <div class="acciones">
                <a class="accion" href="<?= htmlspecialchars($urlsAcciones['ingreso'], ENT_QUOTES, 'UTF-8') ?>"><strong>Registrar ingreso</strong><span>Agrega un nuevo ingreso.</span></a>
                <a class="accion" href="<?= htmlspecialchars($urlsAcciones['gasto'], ENT_QUOTES, 'UTF-8') ?>"><strong>Registrar gasto</strong><span>Registra un gasto del negocio.</span></a>
                <a class="accion" href="<?= htmlspecialchars($urlsAcciones['cliente'], ENT_QUOTES, 'UTF-8') ?>"><strong>Nuevo cliente</strong><span>Guarda la información de un cliente.</span></a>
                <a class="accion" href="<?= htmlspecialchars($urlsAcciones['servicio'], ENT_QUOTES, 'UTF-8') ?>"><strong>Nuevo servicio</strong><span>Registra un servicio para tu empresa.</span></a>
            </div>
        </article>
        <article class="panel">
            <h2>Actividad reciente</h2>
            <p class="panel-descripcion">Aquí aparecerán tus últimos movimientos.</p>
            <div class="actividad-vacia">Todavía no hay movimientos registrados.</div>
            <p class="pie-panel">Los datos se mostrarán cuando conectemos las tablas administrativas.</p>
        </article>
    </section>
</main>
