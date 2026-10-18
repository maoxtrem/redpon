<?php
// Evita acceso directo si es necesario
if (!defined('ACCESO_PERMITIDO')) {
    header('Content-Type: text/css; charset=utf-8');
}
?>
:root {
    --verde: #087f5b;
    --verde-oscuro: #045a42;
    --verde-claro: #dff7ed;
    --verde-suave: #f1fbf7;
    --texto: #12332c;
    --gris: #637870;
    --blanco: #ffffff;
    --borde: #dcebe4;
    --rojo: #c0392b;
    --amarillo: #b7791f;
    --sombra: 0 12px 30px rgba(4, 90, 66, .10);
}
* { box-sizing: border-box; }
body {
    min-height: 100vh;
    margin: 0;
    color: var(--texto);
    background: var(--verde-suave);
    font-family: Arial, Helvetica, sans-serif;
    overflow-x: hidden;
}
a { color: inherit; text-decoration: none; }
.barra-superior {
    position: sticky;
    top: 0;
    z-index: 20;
    min-height: 72px;
    padding: 13px 25px;
    display: flex;
    align-items: center;
    gap: 18px;
    background: var(--blanco);
    border-bottom: 1px solid var(--borde);
}
.boton-menu {
    width: 42px; height: 42px;
    display: flex; align-items: center; justify-content: center;
    border: 1px solid var(--borde); border-radius: 12px;
    color: var(--verde-oscuro); background: var(--verde-suave);
    font-size: 22px; cursor: pointer; transition: .2s ease;
}
.boton-menu:hover { color: var(--blanco); background: var(--verde); }
.marca {
    display: flex; align-items: center; gap: 11px;
    color: var(--verde-oscuro); font-size: 20px; font-weight: 800;
    letter-spacing: .12em;
}
.marca img {
    width: 45px; height: 45px; display: block; border-radius: 50%;
    object-fit: contain; background: transparent; mix-blend-mode: multiply;
}
.titulo-superior { flex: 1; color: var(--gris); font-size: 14px; font-weight: 700; }
.zona-usuario { display: flex; align-items: center; gap: 18px; }
.usuario-sesion { color: var(--texto); font-size: 14px; font-weight: 700; }
.boton-salir {
    padding: 10px 17px; border: 1px solid #e6aaa3; border-radius: 999px;
    color: var(--rojo); background: #fff7f6; font-size: 13px; font-weight: 800;
}
.boton-salir:hover { color: var(--blanco); background: var(--rojo); }
.estructura { min-height: calc(100vh - 72px); display: flex; }
.barra-lateral {
    width: 250px; flex-shrink: 0; padding: 25px 16px; overflow: hidden;
    background: var(--verde-oscuro);
    transition: width .25s ease, padding .25s ease, transform .25s ease;
}
body.menu-oculto .barra-lateral { width: 0; padding-right: 0; padding-left: 0; }
.titulo-menu {
    margin: 0 12px 15px; color: #a9d8c9; font-size: 11px; font-weight: 800;
    letter-spacing: .14em; text-transform: uppercase; white-space: nowrap;
}
.menu-lateral { display: flex; flex-direction: column; gap: 5px; }
.menu-lateral a, .barra-lateral nav a {
    display: block; padding: 12px 14px; border-radius: 10px;
    color: #d9f0e8; font-size: 14px; font-weight: 600; white-space: nowrap;
    transition: .2s ease;
}
.menu-lateral a:hover, .menu-lateral a.activo, .barra-lateral nav a:hover {
    color: var(--verde-oscuro); background: var(--verde-claro);
}
.barra-lateral ul { margin: 0; padding: 0; list-style: none; }
.barra-lateral li { margin-bottom: 5px; }
.contenido-principal { min-width: 0; width: 100%; padding: 34px; transition: width .25s ease; }
.encabezado-panel {
    display: flex; align-items: end; justify-content: space-between; gap: 25px;
    margin-bottom: 28px;
}
.encabezado-panel h1 {
    margin: 0 0 8px; color: var(--texto);
    font-size: clamp(28px, 4vw, 43px); line-height: 1.05; letter-spacing: -.06em;
}
.encabezado-panel p { margin: 0; color: var(--gris); font-size: 15px; }
.boton-principal {
    display: inline-block; padding: 13px 20px; border: 1px solid var(--verde);
    border-radius: 999px; color: var(--blanco); background: var(--verde);
    font-size: 14px; font-weight: 800; white-space: nowrap;
}
.boton-principal:hover { background: var(--verde-oscuro); }
.tarjetas-resumen { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; margin-bottom: 28px; }
.tarjeta-resumen {
    padding: 21px; border: 1px solid var(--borde); border-radius: 18px;
    background: var(--blanco); box-shadow: var(--sombra);
}
.tarjeta-resumen .etiqueta {
    display: block; margin-bottom: 15px; color: var(--gris);
    font-size: 12px; font-weight: 800; letter-spacing: .08em; text-transform: uppercase;
}
.tarjeta-resumen strong { display: block; margin-bottom: 8px; color: var(--texto); font-size: 27px; }
.tarjeta-resumen small { color: var(--gris); font-size: 13px; }
.ingresos strong { color: var(--verde); }
.gastos strong { color: var(--rojo); }
.clientes strong { color: #2563eb; }
.saldo strong { color: var(--amarillo); }
.paneles { display: grid; grid-template-columns: 1.25fr .75fr; gap: 20px; }
.panel { padding: 25px; border: 1px solid var(--borde); border-radius: 20px; background: var(--blanco); box-shadow: var(--sombra); }
.panel h2 { margin: 0 0 8px; color: var(--texto); font-size: 22px; letter-spacing: -.03em; }
.panel-descripcion { margin: 0 0 23px; color: var(--gris); font-size: 14px; }
.acciones { display: grid; grid-template-columns: repeat(2, 1fr); gap: 12px; }
.accion {
    padding: 18px; border: 1px solid var(--borde); border-radius: 15px;
    background: var(--verde-suave); transition: .2s ease;
}
.accion:hover { border-color: var(--verde); background: var(--verde-claro); transform: translateY(-2px); }
.accion strong { display: block; margin-bottom: 6px; color: var(--verde-oscuro); font-size: 15px; }
.accion span { color: var(--gris); font-size: 13px; }
.actividad-vacia {
    padding: 30px 15px; border: 1px dashed var(--borde); border-radius: 14px;
    color: var(--gris); font-size: 14px; text-align: center;
}
.pie-panel { margin-top: 24px; color: var(--gris); font-size: 12px; }
.capa-menu { display: none; }
.mensaje-bienvenida {
    background: #e6f9e9;
    padding: 15px;
    border-radius: 10px;
    margin-bottom: 20px;
}
@media (max-width: 1050px) {
    .tarjetas-resumen { grid-template-columns: repeat(2, 1fr); }
    .paneles { grid-template-columns: 1fr; }
}
@media (max-width: 760px) {
    .barra-superior { padding: 12px 16px; }
    .titulo-superior { display: none; }
    .zona-usuario { gap: 10px; margin-left: auto; }
    .usuario-sesion { display: none; }
    .estructura { display: block; }
    .barra-lateral {
        position: fixed; top: 72px; bottom: 0; left: 0; z-index: 15;
        width: 250px; padding: 25px 16px; transform: translateX(-105%);
        box-shadow: 12px 0 30px rgba(0, 0, 0, .16);
    }
    body.menu-abierto .barra-lateral { transform: translateX(0); }
    body.menu-oculto .barra-lateral { width: 250px; padding: 25px 16px; }
    body.menu-abierto .capa-menu {
        position: fixed; inset: 72px 0 0; z-index: 14; display: block;
        background: rgba(0, 0, 0, .35);
    }
    .contenido-principal { padding: 25px 16px 35px; }
    .encabezado-panel { display: block; }
    .encabezado-panel .boton-principal { margin-top: 20px; }
}
@media (max-width: 500px) {
    .marca span { display: none; }
    .boton-salir { padding: 9px 12px; font-size: 12px; }
    .tarjetas-resumen { grid-template-columns: 1fr 1fr; gap: 10px; }
    .tarjeta-resumen { padding: 16px; }
    .tarjeta-resumen strong { font-size: 22px; }
    .acciones { grid-template-columns: 1fr; }
}