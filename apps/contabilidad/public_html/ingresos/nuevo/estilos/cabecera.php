<?php
header('Content-Type: text/css; charset=UTF-8');
?>
/* Estilos de la cabecera de la pantalla de Ingresos. */
.pagina-ingresos .encabezado-panel h1 {
    color: var(--verde-oscuro);
}

.pagina-ingresos .encabezado-panel p {
    max-width: 680px;
    line-height: 1.5;
}

@media (max-width: 760px) {
    .pagina-ingresos .encabezado-panel .boton-principal {
        display: inline-block;
        margin-top: 16px;
    }
}
