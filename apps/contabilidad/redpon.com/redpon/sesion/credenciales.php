<?php
$servidor = 'localhost';
$base     = 'redponco_redpon';
$usuario  = 'redponco_Administrador';
$passbd   = 'David196329$.';

// Conectar
$conex = new mysqli($servidor, $usuario, $passbd, $base);

// Verificar conexión
if ($conex->connect_error) {
    die("Error de conexión: " . $conex->connect_error);
}

// Codificación correcta
$conex->set_charset("utf8mb4");