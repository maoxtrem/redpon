<?php
require_once __DIR__ . '/../redpon.com/redpon/sesion/config.php';

if (!empty($_SESSION['logueado'])) {
    header('Location: /home/index.php');
    exit;
}

$mensaje = '';
$nombre = '';
$correo = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim((string)($_POST['nombre'] ?? ''));
    $correo = strtolower(trim((string)($_POST['correo'] ?? '')));
    $clave = (string)($_POST['clave'] ?? '');
    $confirmacion = (string)($_POST['confirmacion'] ?? '');

    if (strlen($nombre) < 2 || strlen($nombre) > 240) {
        $mensaje = 'El nombre debe tener entre 2 y 120 caracteres.';
    } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $mensaje = 'Ingresa un correo válido.';
    } elseif (strlen($clave) < 8) {
        $mensaje = 'La contraseña debe tener al menos 8 caracteres.';
    } elseif ($clave !== $confirmacion) {
        $mensaje = 'Las contraseñas no coinciden.';
    } else {
        require_once __DIR__ . '/../redpon.com/redpon/sesion/credenciales.php';
        $stmt = $conex->prepare('SELECT id FROM Usuarios WHERE correo = ? LIMIT 1');

        if (!$stmt) {
            $mensaje = 'No se pudo validar el correo.';
        } else {
            $stmt->bind_param('s', $correo);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $mensaje = 'Ya existe una cuenta con ese correo.';
                $stmt->close();
            } else {
                $stmt->close();
                $hash = password_hash($clave, PASSWORD_DEFAULT);
                $stmt = $conex->prepare('INSERT INTO Usuarios (nombre, correo, clave) VALUES (?, ?, ?)');

                if (!$stmt) {
                    $mensaje = 'No se pudo crear la cuenta.';
                } else {
                    $stmt->bind_param('sss', $nombre, $correo, $hash);
                    if ($stmt->execute()) {
                        session_regenerate_id(true);
                        $_SESSION['usuario_id'] = $conex->insert_id;
                        $_SESSION['usuario_nombre'] = $nombre;
                        $_SESSION['usuario_correo'] = $correo;
                        $_SESSION['usuario'] = $nombre;
                        $_SESSION['logueado'] = true;
                        $stmt->close();
                        header('Location: /home/index.php');
                        exit;
                    }
                    $mensaje = 'No se pudo crear la cuenta.';
                    $stmt->close();
                }
            }
        }
    }
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crear cuenta</title>
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
    <h1>Crear cuenta</h1>
    <?php if ($mensaje !== ''): ?><p class="error"><?= htmlspecialchars($mensaje, ENT_QUOTES, 'UTF-8') ?></p><?php endif; ?>
    <form method="post" action="/registro.php">
        <label>Nombre
            <input type="text" name="nombre" value="<?= htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8') ?>" autocomplete="name" required>
        </label>
        <label>Correo
            <input type="email" name="correo" value="<?= htmlspecialchars($correo, ENT_QUOTES, 'UTF-8') ?>" autocomplete="email" required>
        </label>
        <label>Contraseña
            <input type="password" name="clave" autocomplete="new-password" minlength="8" required>
        </label>
        <label>Confirmar contraseña
            <input type="password" name="confirmacion" autocomplete="new-password" minlength="8" required>
        </label>
        <button type="submit">Registrarme</button>
        <a href="/login.php">Ya tengo una cuenta</a>
    </form>
</main>
</body>
</html>
