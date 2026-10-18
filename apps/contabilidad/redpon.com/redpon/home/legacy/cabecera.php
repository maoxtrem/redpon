<?php if (!defined('ACCESO_PERMITIDO')) exit; ?>
<header class="barra-superior">
    <button class="boton-menu" id="botonMenu" type="button" aria-label="Mostrar u ocultar menú" aria-expanded="false">
        ☰
    </button>
    
    <div class="titulo-superior"></div>
    <div class="zona-usuario">
        <a> Hola, <?= $nombreUsuario ?></a>
        <a class="marca" href="/home/index.php">
        <img src="/Logo.png" alt="Logo REDPON">
        <!--
        <span class="nombre-empresa">
            <?= htmlspecialchars($_SESSION['nombre_empresa'] ?? 'REDPON', ENT_QUOTES, 'UTF-8') ?>
        </span>
        -->
    </a>
    </div>
</header>
<div class="capa-menu" id="capaMenu"></div>
<script>
const boton = document.getElementById('botonMenu');
const capa = document.getElementById('capaMenu');

// ✅ FORZAR CERRADO AL CARGAR LA PÁGINA
document.body.classList.remove('menu-abierto');
document.body.classList.add('menu-oculto');
boton.setAttribute('aria-expanded', 'false');

function alternarMenu() {
    const estaAbierto = document.body.classList.contains('menu-abierto');
    
    if (estaAbierto) {
        document.body.classList.remove('menu-abierto');
        document.body.classList.add('menu-oculto');
    } else {
        document.body.classList.add('menu-abierto');
        document.body.classList.remove('menu-oculto');
    }
    
    boton.setAttribute('aria-expanded', !estaAbierto);
}

if (boton) boton.addEventListener('click', alternarMenu);
if (capa) capa.addEventListener('click', alternarMenu);
</script>