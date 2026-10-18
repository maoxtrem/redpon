<?php
header('Content-Type: text/css; charset=UTF-8');
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
?>
/* Acción flotante para crear un ingreso. */
.pagina-ingresos .boton-flotante-mas {
    display: grid;
    place-items: center;
    position: fixed;
    right: 22px;
    bottom: 22px;
    z-index: 30;
    width: 54px;
    height: 54px;
    border: 0;
    border-radius: 50%;
    background: #087f5b;
    color: #fff;
    box-shadow: 0 6px 18px #063b2c40;
    font-size: 2rem;
    line-height: 1;
    text-decoration: none;
}
.pagina-ingresos .boton-flotante-mas:hover { background: #066c4d; }
