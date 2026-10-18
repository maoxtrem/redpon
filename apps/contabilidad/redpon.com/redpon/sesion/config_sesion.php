<?php
// Duración de la sesión: 15 días.
$duracionSesion = 15 * 24 * 60 * 60;

// Endurecimiento de la cookie y del identificador de sesión.
ini_set('session.use_strict_mode', '1');
ini_set('session.use_only_cookies', '1');
ini_set('session.use_trans_sid', '0');
ini_set('session.cookie_httponly', '1');
ini_set('session.cookie_secure', '1');
ini_set('session.cookie_samesite', 'Lax');
ini_set('session.cookie_path', '/');
ini_set('session.cookie_lifetime', (string)$duracionSesion);
ini_set('session.gc_maxlifetime', (string)$duracionSesion);

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
