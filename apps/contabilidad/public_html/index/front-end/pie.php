<?php
if (!defined('REDPON_INDEX_PAGE')) {
    http_response_code(404);
    exit;
}
?>
<footer class="centrar">
    <p>© <?= (int) $anio ?> REDPON</p>
</footer>
<script>if ("serviceWorker" in navigator) navigator.serviceWorker.register("/sw.js").catch(() => {});</script>
</body>
</html>
