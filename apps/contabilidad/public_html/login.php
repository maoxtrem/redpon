<?php
require_once __DIR__ . '/../redpon.com/redpon/sesion/config.php';

if (!empty($_SESSION['logueado'])) {
    header('Location: /home/index.php');
    exit;
}

$mensaje = '';
$correo = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = strtolower(trim((string)($_POST['correo'] ?? '')));
    $clave = (string)($_POST['clave'] ?? '');

    if (!filter_var($correo, FILTER_VALIDATE_EMAIL) || $clave === '') {
        $mensaje = 'Ingresa un correo válido y tu contraseña.';
    } else {
        require_once __DIR__ . '/../redpon.com/redpon/sesion/credenciales.php';
        $stmt = $conex->prepare('SELECT id, nombre, correo, clave FROM Usuarios WHERE correo = ? LIMIT 1');

        if ($stmt) {
            $stmt->bind_param('s', $correo);
            $stmt->execute();
            $resultado = $stmt->get_result();
            $usuario = $resultado ? $resultado->fetch_assoc() : null;
            $stmt->close();
        }

        if (!empty($usuario) && password_verify($clave, (string)$usuario['clave'])) {
            session_regenerate_id(true);
            $_SESSION['usuario_id'] = (int)$usuario['id'];
            $_SESSION['usuario_nombre'] = (string)$usuario['nombre'];
            $_SESSION['usuario_correo'] = (string)$usuario['correo'];
            $_SESSION['usuario'] = (string)$usuario['nombre'];
            $_SESSION['logueado'] = true;
            header('Location: /home/index.php');
            exit;
        }

        $mensaje = 'El correo o la contraseña no son correctos.';
    }
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iniciar sesión</title>
    <style>
        body { margin: 0; font-family: system-ui, sans-serif; background: #111827; color: #f9fafb; }
        main { max-width: 28rem; margin: 8vh auto; padding: 2rem; }
        form { display: grid; gap: 1rem; padding: 2rem; border-radius: 1rem; background: #1f2937; }
        label { display: grid; gap: .35rem; }
        input { padding: .75rem; border: 1px solid #4b5563; border-radius: .5rem; color: #111827; }
        button, a { padding: .75rem 1rem; border: 0; border-radius: .5rem; text-align: center; font-weight: 700; }
        button { color: white; background: #059669; cursor: pointer; }
        a { color: #a7f3d0; }
        .error { color: #fca5a5; }
    </style>
</head>
<body>
<main>
    <h1>Iniciar sesión</h1>
    <?php if ($mensaje !== ''): ?><p class="error"><?= htmlspecialchars($mensaje, ENT_QUOTES, 'UTF-8') ?></p><?php endif; ?>
    <form method="post" action="/login.php">
        <label>Correo
            <input type="email" name="correo" value="<?= htmlspecialchars($correo, ENT_QUOTES, 'UTF-8') ?>" autocomplete="email" required>
        </label>
        <label>Contraseña
            <input type="password" name="clave" autocomplete="current-password" required>
        </label>
        <button type="submit">Ingresar</button>
        <a href="/registro.php">Crear una cuenta</a>
        <a href="/index.php">Volver</a>
    </form>
</main>
</body>
</html>
