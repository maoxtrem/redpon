<?php
declare(strict_types=1);

if (!defined('ACCESO_PERMITIDO')) exit;

$nombreEmpresa = 'Empresa';

if (!empty($_SESSION['usuario'])) {
    // Busca configuracion.php en la carpeta de arriba de menu/ (nivel home/)
    $configFile = dirname(__DIR__) . '/configuracion.php';
    
    // Solo intenta leerlo SI el archivo existe
    if (file_exists($configFile) && is_readable($configFile)) {
        $config = include $configFile;
        if (
            is_array($config) &&
            isset(
                $config['servidor'],
                $config['base'],
                $config['usuario'],
                $config['clave']
            )
        ) {
            mysqli_report(MYSQLI_REPORT_OFF);
            $conexion = mysqli_connect(
                $config['servidor'],
                $config['usuario'],
                $config['clave'],
                $config['base']
            );
            if ($conexion) {
                mysqli_set_charset($conexion, 'utf8mb4');
                $sql = '
                    SELECT e.nombre_comercial
                    FROM Usuarios u
                    INNER JOIN Empresas e ON e.id = u.empresa_id
                    WHERE u.usuario = ?
                    LIMIT 1
                ';
                $stmt = mysqli_prepare($conexion, $sql);
                if ($stmt) {
                    $usuarioActual = (string)$_SESSION['usuario'];
                    mysqli_stmt_bind_param($stmt, 's', $usuarioActual);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                    if (mysqli_stmt_num_rows($stmt) === 1) {
                        mysqli_stmt_bind_result($stmt, $empresaConsultada);
                        mysqli_stmt_fetch($stmt);
                        if (!empty($empresaConsultada)) {
                            $nombreEmpresa = (string)$empresaConsultada;
                            $_SESSION['nombre_empresa'] = $nombreEmpresa;
                        }
                    }
                    mysqli_stmt_close($stmt);
                }
                mysqli_close($conexion);
            }
        }
    }
}

$nombreEmpresa = htmlspecialchars($nombreEmpresa, ENT_QUOTES, 'UTF-8');
?>

<aside class="barra-lateral">
    <p class="titulo-menu">Menú — <?= $nombreEmpresa ?></p>
    <nav class="menu-lateral">
        <a class="activo" href="../index.php">Inicio</a>
        <a href="#">Ventas</a>
        <a href="#">Ingresos</a>
        <a href="#">Gastos</a>
        <a href="#">Clientes</a>
        <a href="#">Servicios</a>
        <a href="#">Reportes</a>
        <a href="#">Configuración</a>
    </nav>
</aside>
