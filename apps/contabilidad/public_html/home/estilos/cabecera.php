<?php
header('Content-Type: text/css; charset=UTF-8');
?>
/* Estructura global, cabecera y navegación del panel. */

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

.estructura {
    min-height: calc(100vh - 72px);
    display: flex;
}


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
    width: 42px;
    height: 42px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid var(--borde);
    border-radius: 12px;
    color: var(--verde-oscuro);
    background: var(--verde-suave);
    font-size: 22px;
    cursor: pointer;
    transition: .2s ease;
}

.boton-menu:hover,
.boton-menu:focus-visible {
    color: var(--blanco);
    background: var(--verde);
}

.boton-menu:focus-visible,
.marca:focus-visible {
    outline: 3px solid #78c8ab;
    outline-offset: 3px;
}

.marca {
    display: flex;
    align-items: center;
    gap: 11px;
    color: var(--verde-oscuro);
    font-size: 20px;
    font-weight: 800;
    letter-spacing: .12em;
}

.marca img {
    width: 45px;
    height: 45px;
    display: block;
    border-radius: 50%;
    object-fit: contain;
    background: transparent;
    mix-blend-mode: multiply;
}

.titulo-superior {
    flex: 1;
    color: var(--gris);
    font-size: 14px;
    font-weight: 700;
}

.zona-usuario {
    display: flex;
    align-items: center;
    gap: 18px;
}

.usuario-sesion {
    color: var(--texto);
    font-size: 14px;
    font-weight: 700;
}

@media (max-width: 760px) {
    .barra-superior { padding: 10px 12px; gap: 8px; }
    .titulo-superior { display: none; }
    .zona-usuario { gap: 8px; margin-left: auto; min-width: 0; }
    .usuario-sesion {
        display: block;
        min-width: 0;
        max-width: 38vw;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        font-size: 12px;
    }
    .marca { flex-shrink: 0; gap: 6px; font-size: 14px; letter-spacing: .08em; }
    .marca img { width: 36px; height: 36px; }
}


.barra-lateral {
    width: 250px;
    flex-shrink: 0;
    padding: 25px 16px;
    overflow: hidden;
    background: var(--verde-oscuro);
    transition: width .25s ease, padding .25s ease, transform .25s ease;
}

body.menu-oculto .barra-lateral {
    width: 0;
    padding-right: 0;
    padding-left: 0;
}

.titulo-menu {
    margin: 0 12px 15px;
    color: #a9d8c9;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: .14em;
    text-transform: uppercase;
    white-space: nowrap;
}

.menu-lateral,
.menu-lateral ul {
    margin: 0;
    padding: 0;
    list-style: none;
}

.menu-lateral { display: flex; flex-direction: column; gap: 5px; }
.menu-lateral li { margin-bottom: 5px; }

.menu-lateral a {
    display: block;
    padding: 12px 14px;
    border-radius: 10px;
    color: #d9f0e8;
    font-size: 14px;
    font-weight: 600;
    white-space: nowrap;
    transition: .2s ease;
}

.menu-lateral a:hover,
.menu-lateral a:focus-visible {
    color: var(--verde-oscuro);
    background: var(--verde-claro);
}

.menu-lateral a:focus-visible {
    outline: 3px solid #78c8ab;
    outline-offset: 2px;
}

.menu-lateral .icono { margin-right: 5px; }
.menu-lateral .menu-separador { height: 1px; margin: 8px 12px; background: rgba(217, 240, 232, .25); }
.capa-menu { display: none; }

@media (max-width: 760px) {
    .estructura { display: block; }

    .barra-lateral {
        position: fixed;
        top: 72px;
        bottom: 0;
        left: 0;
        z-index: 15;
        width: 250px;
        padding: 25px 16px;
        transform: translateX(-105%);
        box-shadow: 12px 0 30px rgba(0, 0, 0, .16);
    }

    body.menu-abierto .barra-lateral { transform: translateX(0); }
    body.menu-oculto .barra-lateral { width: 250px; padding: 25px 16px; }

    body.menu-abierto .capa-menu {
        position: fixed;
        inset: 72px 0 0;
        z-index: 14;
        display: block;
        background: rgba(0, 0, 0, .35);
    }
}
