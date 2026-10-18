<?php
// Configuración central de sesión para REDPON.
if (!function_exists('redpon_cargar_entorno_local')) {
    function redpon_cargar_entorno_local(): void {
        $archivo = dirname(__DIR__, 3) . '/.env.local';
        if (!is_readable($archivo)) {
            return;
        }

        foreach (file($archivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $linea) {
            $linea = trim($linea);
            if ($linea === '' || $linea[0] === '#' || strpos($linea, '=') === false) {
                continue;
            }

            [$clave, $valor] = explode('=', $linea, 2);
            $clave = trim($clave);
            $valor = trim($valor);
            if ($clave !== '' && getenv($clave) === false) {
                putenv($clave . '=' . $valor);
                $_ENV[$clave] = $valor;
            }
        }
    }
}

redpon_cargar_entorno_local();

if (!function_exists('redpon_iniciar_sesion')) {
    function redpon_iniciar_sesion() {
        $duracionSesion = 15 * 24 * 60 * 60;

        ini_set('session.use_strict_mode', '1');
        ini_set('session.use_only_cookies', '1');
        ini_set('session.use_trans_sid', '0');
        ini_set('session.cookie_httponly', '1');
        ini_set('session.cookie_secure', '1');
        ini_set('session.cookie_samesite', 'Lax');
        ini_set('session.cookie_path', '/');
        ini_set('session.cookie_lifetime', (string) $duracionSesion);
        ini_set('session.gc_maxlifetime', (string) $duracionSesion);

        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
    }
}

redpon_iniciar_sesion();

if (!function_exists('redpon_verificar_sesion')) {
    function redpon_verificar_sesion() {
        if (!defined('ACCESO_PERMITIDO')) {
            define('ACCESO_PERMITIDO', true);
        }

        if (!isset($_SESSION['logueado']) || $_SESSION['logueado'] !== true) {
            header('Location: /index.php');
            exit;
        }

        header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
        header('Pragma: no-cache');

        $GLOBALS['nombreUsuario'] = htmlspecialchars(
            $_SESSION['usuario_nombre'] ?? $_SESSION['usuario'] ?? 'Usuario',
            ENT_QUOTES,
            'UTF-8'
        );
    }
}
