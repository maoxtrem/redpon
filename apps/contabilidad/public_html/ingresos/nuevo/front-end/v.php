<?php
if (!defined('REDPON_INGRESO_NUEVO_PAGE')) {
    http_response_code(404);
    exit;
}
?>
<button class="boton-flotante-mas" type="button" aria-label="<?= htmlspecialchars($etiquetaBotonV, ENT_QUOTES, 'UTF-8') ?>" title="<?= htmlspecialchars($etiquetaBotonV, ENT_QUOTES, 'UTF-8') ?>">
    <span aria-hidden="true">+</span>
</button>
