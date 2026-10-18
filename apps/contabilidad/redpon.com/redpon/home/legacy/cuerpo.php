<?php if (!defined('ACCESO_PERMITIDO')) exit; ?>
<main class="contenido-principal">
    <?php if (isset($_GET['mensaje']) && $_GET['mensaje'] === 'bienvenido'): ?>
        <div class="mensaje-bienvenida">
            ✅ Bienvenido, <?= htmlspecialchars($_SESSION['usuario_nombre'] ?? $_SESSION['usuario'] ?? 'Usuario', ENT_QUOTES, 'UTF-8') ?>. Tu sesión está activa.
        </div>
    <?php endif; ?>

   

    <section class="tarjetas-resumen">
        <article class="tarjeta-resumen ingresos">
            <span class="etiqueta">Ingresos</span>
            <strong>$0</strong>
            <small>Ingresos registrados</small>
        </article>
        <article class="tarjeta-resumen gastos">
            <span class="etiqueta">Gastos</span>
            <strong>$0</strong>
            <small>Gastos registrados</small>
        </article>
        <article class="tarjeta-resumen clientes">
            <span class="etiqueta">Clientes</span>
            <strong>0</strong>
            <small>Clientes registrados</small>
        </article>
        <article class="tarjeta-resumen saldo">
            <span class="etiqueta">Saldo</span>
            <strong>$0</strong>
            <small>Resultado actual</small>
        </article>
    </section>

    <section class="paneles">
        <article class="panel">
            <h2>Acciones rápidas</h2>
            <p class="panel-descripcion">Administra las operaciones más importantes desde aquí.</p>
            <div class="acciones">
                <a class="accion" href="#">
                    <strong>Registrar ingreso</strong>
                    <span>Agrega un nuevo ingreso.</span>
                </a>
                <a class="accion" href="#">
                    <strong>Registrar gasto</strong>
                    <span>Registra un gasto del negocio.</span>
                </a>
                <a class="accion" href="#">
                    <strong>Nuevo cliente</strong>
                    <span>Guarda la información de un cliente.</span>
                </a>
                <a class="accion" href="#">
                    <strong>Nuevo servicio</strong>
                    <span>Registra un servicio para tu empresa.</span>
                </a>
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