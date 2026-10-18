<?php
if (!defined('REDPON_HOME_PAGE')) {
    http_response_code(404);
    exit;
}
?>
<button class="boton-v" id="botonAccionesRapidas" type="button" aria-label="<?= htmlspecialchars($etiquetaBotonV, ENT_QUOTES, 'UTF-8') ?>" title="<?= htmlspecialchars($etiquetaBotonV, ENT_QUOTES, 'UTF-8') ?>">
    <span aria-hidden="true">+</span>
</button>
