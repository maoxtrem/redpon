<?php
if (!defined('REDPON_OAUTH_ENDPOINT')) { http_response_code(403); exit; }
require_once __DIR__ . '/../../sesion/config.php';

require_once __DIR__ . '/../../sesion/credenciales.php';
$client_id = "381243423874-c4ughntomi1vi9qmltj907ubvihvq4sm.apps.googleusercontent.com";
$client_secret = (string) getenv('GOOGLE_CLIENT_SECRET');
if ($client_secret === '') {
    http_response_code(500);
    exit('Configuración de Google incompleta.');
}
$redirect_uri = "https://redpon.com/index/google_procesar.php";
if (!isset($_GET['code'])) {
    header("Location: index.php");
    exit;
}
$code = $_GET['code'];
$token_url = "https://oauth2.googleapis.com/token";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $token_url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
    'code' => $code,
    'client_id' => $client_id,
    'client_secret' => $client_secret,
    'redirect_uri' => $redirect_uri,
    'grant_type' => 'authorization_code'
]));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
$resp = curl_exec($ch);
$error_curl = curl_error($ch);
curl_close($ch);
if ($error_curl) {
    header("Location: index.php?mensaje=error_google");
    exit;
}
$datos = json_decode($resp, true);
if (!isset($datos['id_token'])) {
    header("Location: index.php?mensaje=error_google");
    exit;
}
$partes = explode(".", $datos['id_token']);
if (count($partes) < 2) {
    header("Location: index.php?mensaje=error_google");
    exit;
}
$info = json_decode(base64_decode(str_replace(['-', '_'], ['+', '/'], $partes[1])), true);
if (!isset($info['email'])) {
    header("Location: index.php?mensaje=error_google");
    exit;
}
$correo = $info['email'];
$nombre = $info['name'] ?? explode('@', $correo)[0];
// Verificar si ya existe
$rev = $conex->prepare("SELECT id, nombre FROM Usuarios WHERE correo = ? LIMIT 1");
if (!$rev) {
    die("Error en consulta: " . $conex->error);
}
$rev->bind_param("s", $correo);
$rev->execute();
$rev->store_result();
if ($rev->num_rows > 0) {
    $rev->bind_result($usuario_id, $nombre_bd);
    $rev->fetch();
    $rev->close();
    
    // Todas las variables que espera el panel
    $_SESSION['usuario_id'] = $usuario_id;
    $_SESSION['usuario_nombre'] = $nombre_bd;
    $_SESSION['usuario_correo'] = $correo;
    $_SESSION['logueado'] = true;          
    $_SESSION['usuario'] = $nombre_bd;      
    
    header("Location: ../home/index.php");
    exit;
}
$rev->close();
// Crear cuenta nueva
$clave_hash = password_hash(bin2hex(random_bytes(8)), PASSWORD_DEFAULT);
$stmt = $conex->prepare("INSERT INTO Usuarios (nombre, correo, clave) VALUES (?, ?, ?)");
if (!$stmt) {
    die("Error al preparar inserción: " . $stmt->error);
}
$stmt->bind_param("sss", $nombre, $correo, $clave_hash);
if ($stmt->execute()) {
    $usuario_id = $conex->insert_id;
    $stmt->close();
    
    // Todas las variables para cuenta nueva
    $_SESSION['usuario_id'] = $usuario_id;
    $_SESSION['usuario_nombre'] = $nombre;
    $_SESSION['usuario_correo'] = $correo;
    $_SESSION['logueado'] = true;
    $_SESSION['usuario'] = $nombre;
    
    header("Location: ../home/index.php?mensaje=bienvenido");
    exit;
} else {
    die("Error al guardar: " . $stmt->error);
}
