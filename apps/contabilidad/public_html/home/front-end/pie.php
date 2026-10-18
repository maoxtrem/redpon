<?php
if (!defined('REDPON_HOME_PAGE')) {
    http_response_code(404);
    exit;
}
?>
</div>
<footer class="pie-documento">© <?= (int) $anioActual ?> REDPON</footer>
<script>
if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('/sw.js').catch(() => {});
}
</script>
</body>
</html>
