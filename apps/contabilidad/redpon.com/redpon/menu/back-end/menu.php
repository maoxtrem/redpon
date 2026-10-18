<?php
if (!defined('ACCESO_PERMITIDO')) {
    http_response_code(403);
    exit;
}

if (!function_exists('redpon_renderizar_menu')) {
    function redpon_renderizar_menu(array $rutasMenu, string $seccionActiva = ''): string
    {
        $directorioRaizCuenta = dirname(__DIR__, 4);
        $archivoVista = $directorioRaizCuenta . '/public_html/menu/front-end/menu.php';
        if (!is_file($archivoVista) || !is_readable($archivoVista)) {
            error_log('No se pudo cargar la vista PHP compartida del menú REDPON.');
            return '';
        }

        $secciones = [
            'inicio' => 'INICIO',
            'ingresos' => 'INGRESOS',
            'contactos' => 'CONTACTOS',
            'items' => 'ITEMS',
            'reportes' => 'REPORTES',
            'configuracion' => 'CONFIGURACION',
            'cerrar_sesion' => 'CERRAR_SESION',
        ];
        $menuValores = [];
        foreach ($secciones as $clave => $token) {
            $url = isset($rutasMenu[$clave]) ? (string) $rutasMenu[$clave] : '#';
            $activo = ($seccionActiva === $clave);
            $menuValores[$token] = [
                'url' => htmlspecialchars($url, ENT_QUOTES, 'UTF-8'),
                'activo' => $activo ? ' activo' : '',
                'aria' => $activo ? ' aria-current="page"' : '',
            ];
        }

        if (!defined('REDPON_MENU_VIEW')) {
            define('REDPON_MENU_VIEW', true);
        }
        ob_start();
        require $archivoVista;
        $vista = ob_get_clean();
        if (!is_string($vista)) {
            error_log('No se pudo renderizar la vista PHP compartida del menú REDPON.');
            return '';
        }

        return $vista . "\n" . redpon_menu_script();
    }
}

if (!function_exists('redpon_menu_script')) {
    function redpon_menu_script(): string
    {
        return <<<'HTML'
<script>
(() => {
    const cuerpo = document.body;
    const botonActual = () => document.getElementById('botonMenu');
    const capaActual = () => document.getElementById('capaMenu');
    const estaAbierto = () => cuerpo.classList.contains('menu-abierto');
    const cambiarEstado = (abierto) => {
        cuerpo.classList.toggle('menu-abierto', abierto);
        cuerpo.classList.toggle('menu-oculto', !abierto);
        const boton = botonActual();
        const capa = capaActual();
        if (boton) boton.setAttribute('aria-expanded', String(abierto));
        if (capa) capa.setAttribute('aria-hidden', String(!abierto));
    };

    if (!cuerpo.classList.contains('menu-abierto') && !cuerpo.classList.contains('menu-oculto')) {
        cuerpo.classList.add('menu-oculto');
    }
    const botonInicial = botonActual();
    const capaInicial = capaActual();
    if (botonInicial) botonInicial.setAttribute('aria-expanded', String(estaAbierto()));
    if (capaInicial) capaInicial.setAttribute('aria-hidden', String(!estaAbierto()));

    document.addEventListener('click', (evento) => {
        const objetivo = evento.target;
        if (!(objetivo instanceof Element)) return;
        if (objetivo.closest('#botonMenu')) {
            evento.preventDefault();
            evento.stopImmediatePropagation();
            cambiarEstado(!estaAbierto());
            return;
        }
        if (objetivo.closest('#capaMenu')) {
            evento.preventDefault();
            evento.stopImmediatePropagation();
            cambiarEstado(false);
        }
    }, true);

    document.addEventListener('keydown', (evento) => {
        if (evento.key === 'Escape' && estaAbierto()) cambiarEstado(false);
    });
})();
</script>
HTML;
    }
}
