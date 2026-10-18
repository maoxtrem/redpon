<?php
if (!defined('REDPON_INGRESOS_PAGE')) {
    http_response_code(404);
    exit;
}
?>
<a class="boton-flotante-mas" href="/ingresos/nuevo/index.php" aria-label="<?= htmlspecialchars($etiquetaBotonV, ENT_QUOTES, 'UTF-8') ?>" title="<?= htmlspecialchars($etiquetaBotonV, ENT_QUOTES, 'UTF-8') ?>">
    <span aria-hidden="true">+</span>
</a>
