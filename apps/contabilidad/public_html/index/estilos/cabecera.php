<?php
header('Content-Type: text/css; charset=UTF-8');
?>
/* Base visual y cabecera pública REDPON. */
:root {
    --verde: #087f5b;
    --verde-oscuro: #045a42;
    --verde-claro: #dff7ed;
    --lima: #c8f36b;
    --texto: #12332c;
    --gris: #637870;
    --fondo: #f6fbf8;
    --blanco: #ffffff;
    --borde: #dcebe4;
}

* { box-sizing: border-box; }
html { scroll-behavior: smooth; }
body {
    margin: 0;
    color: var(--texto);
    background: var(--fondo);
    font-family: "Inter", "Segoe UI", Arial, sans-serif;
    line-height: 1.5;
}

.cabecera-publica { padding: 18px 20px; background: var(--fondo); }
.cabecera-publica-grid {
    display: grid;
    grid-template-columns: minmax(0, 1fr) auto;
    align-items: center;
    gap: 20px;
    max-width: 1280px;
    margin: 0 auto;
}
.marca {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    width: fit-content;
    color: var(--verde-oscuro);
    text-decoration: none;
    font-weight: 800;
    letter-spacing: .14em;
}
.marca img {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    object-fit: contain;
    mix-blend-mode: multiply;
}
.marca-texto { font-size: 1rem; }
.cabecera-acciones { display: flex; justify-content: flex-end; }
.boton-instalar {
    border: 0;
    border-radius: 8px;
    padding: 9px 16px;
    background: var(--verde);
    color: var(--blanco);
    font-size: 14px;
    font-weight: 700;
    cursor: pointer;
}
.boton-instalar:hover { background: var(--verde-oscuro); }
.boton-instalar:focus-visible, .marca:focus-visible {
    outline: 3px solid var(--lima);
    outline-offset: 3px;
}

@media (max-width: 600px) {
    .cabecera-publica { padding: 14px 16px; }
    .cabecera-publica-grid { gap: 12px; }
    .marca img { width: 42px; height: 42px; }
    .boton-instalar { padding: 8px 12px; }
}
