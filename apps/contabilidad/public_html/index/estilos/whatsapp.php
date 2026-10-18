<?php
header('Content-Type: text/css; charset=UTF-8');
?>
/* Acceso flotante a WhatsApp, adaptable a celulares y ordenadores. */
.boton-whatsapp {
    position: fixed;
    right: max(16px, env(safe-area-inset-right, 0px));
    bottom: calc(16px + env(safe-area-inset-bottom, 0px));
    z-index: 1000;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 54px;
    height: 54px;
    border-radius: 50%;
    background: #25D366;
    box-shadow: 0 6px 18px rgba(0,0,0,.22);
}
.boton-whatsapp svg { width: 28px; height: 28px; fill: #fff; }
.boton-whatsapp:focus-visible { outline: 3px solid var(--verde-oscuro); outline-offset: 3px; }
