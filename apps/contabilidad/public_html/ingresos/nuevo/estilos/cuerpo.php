<?php
header('Content-Type: text/css; charset=UTF-8');
?>
.formulario-ingreso { max-width: 1180px; margin: 0 auto; }
        .aviso-formulario {
            margin: 0 0 20px; padding: 14px 17px; border: 1px solid #b7dfce;
            border-radius: 12px; color: #245843; background: #edf9f3; font-size: 14px;
        }
        .bloque-formulario {
            margin-bottom: 20px; padding: 24px; border: 1px solid var(--borde);
            border-radius: 18px; background: var(--blanco); box-shadow: var(--sombra);
        }
        .bloque-formulario h2 {
            margin: 0 0 18px; color: var(--texto); font-size: 19px;
        }
        .rejilla-campos {
            display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 16px;
        }
        .campo { min-width: 0; }
        .campo-ancho { grid-column: 1 / -1; }
        .campo label { display: block; margin-bottom: 7px; color: var(--texto); font-size: 13px; font-weight: 700; }
        .campo input, .campo select, .campo textarea {
            width: 100%; min-height: 43px; padding: 10px 12px; border: 1px solid var(--borde);
            border-radius: 10px; color: var(--texto); background: #fff; font: inherit; font-size: 14px;
        }
        .campo textarea { min-height: 92px; resize: vertical; }
        .campo input:focus, .campo select:focus, .campo textarea:focus {
            outline: 3px solid rgba(8, 127, 91, .13); border-color: var(--verde);
        }
        .tipo-documento { display: flex; gap: 10px; flex-wrap: wrap; }
        .opcion-documento {
            display: inline-flex; align-items: center; gap: 8px; padding: 11px 15px;
            border: 1px solid var(--borde); border-radius: 10px; background: var(--verde-suave);
            color: var(--texto); font-size: 14px; font-weight: 700;
        }
        .opcion-documento input { accent-color: var(--verde); }
        .contenedor-tabla { overflow-x: auto; }
        .tabla-items { width: 100%; min-width: 900px; border-collapse: collapse; }
        .tabla-items th {
            padding: 11px 8px; border-bottom: 1px solid var(--borde); color: var(--gris);
            font-size: 12px; text-align: left; white-space: nowrap;
        }
        .tabla-items td { padding: 9px 6px; border-bottom: 1px solid #edf3ef; vertical-align: top; }
        .tabla-items input, .tabla-items textarea {
            width: 100%; min-width: 75px; padding: 9px; border: 1px solid var(--borde);
            border-radius: 8px; color: var(--texto); font: inherit; font-size: 13px;
        }
        .tabla-items textarea { min-width: 145px; min-height: 39px; resize: vertical; }
        .tabla-items input[readonly] { border-color: transparent; background: var(--verde-suave); font-weight: 700; }
        .col-eliminar { width: 36px; }
        .boton-quitar {
            width: 30px; height: 34px; border: 0; border-radius: 8px; color: #a43128;
            background: #fff0ee; font-size: 18px; cursor: pointer;
        }
        .boton-agregar-linea {
            margin-top: 14px; padding: 10px 14px; border: 1px solid var(--verde);
            border-radius: 10px; color: var(--verde-oscuro); background: #fff; font-weight: 700; cursor: pointer;
        }
        .boton-agregar-linea:hover { background: var(--verde-claro); }
        .totales { width: min(100%, 360px); margin: 22px 0 0 auto; }
        .fila-total { display: flex; justify-content: space-between; gap: 20px; padding: 8px 0; color: var(--gris); font-size: 14px; }
        .fila-total-final { margin-top: 7px; padding-top: 14px; border-top: 1px solid var(--borde); color: var(--texto); font-size: 19px; font-weight: 800; }
        .acciones-formulario { display: flex; justify-content: flex-end; gap: 12px; flex-wrap: wrap; margin: 22px 0 0; }
        .boton-secundario-form, .boton-guardar {
            padding: 12px 18px; border: 1px solid var(--borde); border-radius: 999px;
            font: inherit; font-size: 14px; font-weight: 700;
        }
        .boton-secundario-form { color: var(--texto); background: #fff; }
        .boton-guardar { color: #fff; border-color: var(--verde); background: var(--verde); }
        .boton-guardar:disabled { opacity: .55; cursor: not-allowed; }
        @media (max-width: 650px) {
            .bloque-formulario { padding: 18px; }
            .rejilla-campos { grid-template-columns: 1fr; }
            .campo-ancho { grid-column: auto; }
            .acciones-formulario > * { flex: 1; text-align: center; }
        }
