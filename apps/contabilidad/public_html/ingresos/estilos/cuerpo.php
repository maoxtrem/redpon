<?php
header('Content-Type: text/css; charset=UTF-8');
?>
/* Vista adaptable: filas compactas en teléfono y tabla en PC. */
.lista-ingresos {
    width: min(1180px, 100%);
    margin: 0 auto;
    padding: 28px clamp(16px, 3vw, 34px) 36px;
    box-sizing: border-box;
}
.lista-ingresos .encabezado-panel {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    gap: 24px;
    margin-bottom: 22px;
}
.lista-ingresos .etiqueta-seccion {
    margin: 0 0 7px;
    color: #547166;
    font-size: .76rem;
    font-weight: 700;
    letter-spacing: .08em;
    text-transform: uppercase;
}
.lista-ingresos h1 {
    margin: 0;
    color: #17372d;
    font-size: clamp(1.55rem, 2.2vw, 2rem);
}
.lista-ingresos .encabezado-panel p:not(.etiqueta-seccion) {
    max-width: 650px;
    margin: 8px 0 0;
    color: #61736b;
    line-height: 1.5;
}
.boton-nuevo-ingreso {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    min-height: 44px;
    padding: 0 18px;
    border: 0;
    border-radius: 10px;
    background: #087f5b;
    color: #fff;
    font-weight: 700;
    text-decoration: none;
    white-space: nowrap;
    box-shadow: 0 4px 12px #087f5b22;
}
.boton-nuevo-ingreso:hover { background: #066c4d; }
.boton-nuevo-ingreso span { font-size: 1.25rem; line-height: 1; }
.controles-listado {
    display: flex;
    align-items: center;
    gap: 14px;
    margin: 0 0 16px;
}
.campo-busqueda {
    display: flex;
    align-items: center;
    gap: 9px;
    flex: 1 1 380px;
    min-width: 190px;
    height: 44px;
    padding: 0 13px;
    border: 1px solid #dce6e1;
    border-radius: 10px;
    background: #fff;
}
.icono-busqueda { color: #70867b; font-size: 1.3rem; }
.campo-busqueda input {
    width: 100%;
    border: 0;
    outline: 0;
    background: transparent;
    color: #263b32;
    font: inherit;
}
.campo-estado {
    display: flex;
    align-items: center;
    gap: 9px;
    min-height: 44px;
    padding: 0 12px;
    border: 1px solid #dce6e1;
    border-radius: 10px;
    background: #fff;
    color: #5c7067;
    font-size: .9rem;
}
.campo-estado select {
    max-width: 150px;
    border: 0;
    outline: 0;
    background: transparent;
    color: #263b32;
    font: inherit;
}
.contador-registros {
    margin: 0 0 0 auto;
    color: #718078;
    font-size: .88rem;
    white-space: nowrap;
}
.panel-listado {
    overflow: hidden;
    border: 1px solid #e2eae6;
    border-radius: 14px;
    background: #fff;
    box-shadow: 0 8px 24px #163c2c0a;
}
.tabla-escritorio { display: block; overflow-x: auto; }
.tabla-ingresos {
    width: 100%;
    border-collapse: collapse;
    color: #263b32;
    font-size: .94rem;
}
.tabla-ingresos th {
    padding: 15px 16px;
    border-bottom: 1px solid #e6ede9;
    background: #f7faf8;
    color: #60746a;
    font-size: .78rem;
    font-weight: 700;
    letter-spacing: .04em;
    text-align: left;
    text-transform: uppercase;
    white-space: nowrap;
}
.tabla-ingresos td {
    padding: 15px 16px;
    border-bottom: 1px solid #edf1ee;
    vertical-align: middle;
}
.tabla-ingresos tbody tr:last-child td { border-bottom: 0; }
.tabla-ingresos .columna-total { text-align: right; }
.tabla-ingresos td.total { text-align: right; font-weight: 700; white-space: nowrap; }
.tabla-ingresos .columna-acciones { width: 56px; }
.estado-etiqueta {
    display: inline-flex;
    align-items: center;
    min-height: 25px;
    padding: 0 9px;
    border-radius: 999px;
    background: #edf2ef;
    color: #53665c;
    font-size: .78rem;
    font-weight: 700;
    white-space: nowrap;
}
.estado-etiqueta.pendiente { background: #fff4d7; color: #8a6500; }
.estado-etiqueta.pagado { background: #e4f5eb; color: #17683f; }
.estado-etiqueta.anulado { background: #fde9e7; color: #a43e35; }
.accion-fila {
    display: inline-grid;
    width: 34px;
    height: 34px;
    place-items: center;
    border: 1px solid #dfe8e3;
    border-radius: 8px;
    background: #fff;
    color: #3c6251;
    text-decoration: none;
}
.accion-fila:hover { background: #f0f7f3; }
.lista-movil { display: none; }
.estado-vacio {
    padding: 36px 20px;
    color: #6b7b73;
    line-height: 1.5;
    text-align: center;
}
.estado-vacio strong { display: block; margin-bottom: 5px; color: #33483e; }
.sin-resultados {
    padding: 22px 16px;
    color: #6b7b73;
    text-align: center;
}
.paginacion {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    min-height: 58px;
    padding: 0 16px;
    border-top: 1px solid #e8eeea;
    color: #6d7e75;
    font-size: .88rem;
}
.controles-paginacion { display: flex; align-items: center; gap: 10px; }
.controles-paginacion button {
    min-height: 34px;
    padding: 0 11px;
    border: 1px solid #dce6e1;
    border-radius: 8px;
    background: #fff;
    color: #315b49;
    font: inherit;
    cursor: pointer;
}
.controles-paginacion button:disabled { color: #aab5af; cursor: default; }
#paginaActual { min-width: 18px; text-align: center; color: #344a3f; font-weight: 700; }
.sr-only {
    position: absolute;
    width: 1px;
    height: 1px;
    padding: 0;
    margin: -1px;
    overflow: hidden;
    clip: rect(0, 0, 0, 0);
    white-space: nowrap;
    border: 0;
}
@media (max-width: 760px) {
    .lista-ingresos { padding: 20px 14px 28px; }
    .lista-ingresos .encabezado-panel { align-items: flex-start; flex-direction: column; gap: 14px; margin-bottom: 18px; }
    .boton-nuevo-ingreso { width: 100%; box-sizing: border-box; }
    .controles-listado { align-items: stretch; flex-direction: column; gap: 10px; }
    .campo-busqueda { flex: auto; min-width: 0; }
    .campo-estado { justify-content: space-between; }
    .campo-estado select { flex: 1; max-width: none; text-align: right; }
    .contador-registros { margin: 0; }
    .tabla-escritorio { display: none; }
    .lista-movil { display: grid; gap: 9px; padding: 10px; }
    .fila-ingreso-movil {
        display: grid;
        grid-template-columns: minmax(0, 1fr) auto;
        gap: 7px 12px;
        padding: 13px;
        border: 1px solid #e5ece8;
        border-radius: 11px;
        background: #fff;
    }
    .fila-ingreso-movil[hidden] { display: none; }
    .fila-ingreso-movil .documento { color: #223b30; font-weight: 700; }
    .fila-ingreso-movil .cliente { min-width: 0; overflow: hidden; color: #61736a; text-overflow: ellipsis; white-space: nowrap; }
    .fila-ingreso-movil .fecha { color: #87958e; font-size: .82rem; }
    .fila-ingreso-movil .total { align-self: end; color: #1f4a37; font-weight: 700; text-align: right; white-space: nowrap; }
    .fila-ingreso-movil .estado-etiqueta { justify-self: start; }
    .fila-ingreso-movil .accion-fila { grid-column: 2; grid-row: 1; justify-self: end; }
    .estado-vacio { padding: 28px 12px; }
    .paginacion { align-items: flex-start; flex-direction: column; padding: 12px; }
    .controles-paginacion { align-self: flex-end; }
}
