<?php
if (!defined('REDPON_INGRESO_NUEVO_PAGE')) {
    http_response_code(404);
    exit;
}
?>
<main class="contenido-principal">
        <div class="formulario-ingreso">
            <form id="formularioIngreso" autocomplete="off">
                <section class="bloque-formulario">
                    <h2>Documento</h2>
                    <div class="rejilla-campos">
                        <div class="campo campo-ancho">
                            <label>Tipo de documento</label>
                            <div class="tipo-documento">
                                <label class="opcion-documento"><input type="radio" name="tipo_documento" value="factura" checked> Factura</label>
                                <label class="opcion-documento"><input type="radio" name="tipo_documento" value="cuenta_cobro"> Cuenta de cobro</label>
                            </div>
                        </div>
                        <div class="campo">
                            <label for="numero_documento">Número o consecutivo</label>
                            <input id="numero_documento" name="numero_documento" type="text" placeholder="Se asignará según el prefijo configurado">
                        </div>
                        <div class="campo">
                            <label for="fecha_documento">Fecha del documento</label>
                            <input id="fecha_documento" name="fecha_documento" type="date" value="<?= htmlspecialchars($fechaActual, ENT_QUOTES, 'UTF-8') ?>">
                        </div>
                    </div>
                </section>

                <section class="bloque-formulario">
                    <h2>Datos del cliente</h2>
                    <div class="rejilla-campos">
                        <div class="campo">
                            <label for="tipo_identificacion">Tipo de identificación</label>
                            <select id="tipo_identificacion" name="tipo_identificacion">
                                <option value="">Selecciona una opción</option>
                                <option value="CC">Cédula de ciudadanía</option>
                                <option value="NIT">NIT</option>
                                <option value="CE">Cédula de extranjería</option>
                                <option value="pasaporte">Pasaporte</option>
                                <option value="otro">Otro</option>
                            </select>
                        </div>
                        <div class="campo">
                            <label for="numero_identificacion">Número de identificación</label>
                            <input id="numero_identificacion" name="numero_identificacion" type="text" autocomplete="off">
                        </div>
                        <div class="campo">
                            <label for="nombre_cliente">Nombre o razón social</label>
                            <input id="nombre_cliente" name="nombre_cliente" type="text" autocomplete="name">
                        </div>
                        <div class="campo">
                            <label for="correo_cliente">Correo electrónico</label>
                            <input id="correo_cliente" name="correo_cliente" type="email" autocomplete="email">
                        </div>
                    </div>
                </section>

                <section class="bloque-formulario">
                    <h2>Forma y medio de pago</h2>
                    <div class="rejilla-campos">
                        <div class="campo">
                            <label for="forma_pago">Forma de pago</label>
                            <select id="forma_pago" name="forma_pago">
                                <option value="">Selecciona una opción</option>
                                <option value="contado">Contado</option>
                                <option value="credito">Crédito</option>
                            </select>
                        </div>
                        <div class="campo">
                            <label for="medio_pago">Medio de pago</label>
                            <select id="medio_pago" name="medio_pago">
                                <option value="">Selecciona una opción</option>
                                <option value="efectivo">Efectivo</option>
                                <option value="transferencia">Transferencia</option>
                                <option value="tarjeta">Tarjeta</option>
                                <option value="otro">Otro</option>
                            </select>
                        </div>
                    </div>
                </section>

                <section class="bloque-formulario">
                    <h2>Productos o servicios</h2>
                    <div class="contenedor-tabla">
                        <table class="tabla-items">
                            <thead>
                                <tr>
                                    <th>Ítem</th>
                                    <th>Referencia</th>
                                    <th>Precio</th>
                                    <th>Descuento (%)</th>
                                    <th>Descripción</th>
                                    <th>Cantidad</th>
                                    <th>Total del renglón</th>
                                    <th class="col-eliminar"></th>
                                </tr>
                            </thead>
                            <tbody id="renglonesIngreso"></tbody>
                        </table>
                    </div>
                    <button class="boton-agregar-linea" id="agregarRenglon" type="button">+ Agregar renglón</button>
                    <div class="totales" aria-live="polite">
                        <div class="fila-total"><span>Subtotal</span><strong id="subtotal">$0</strong></div>
                        <div class="fila-total"><span>Descuento</span><strong id="descuentoTotal">$0</strong></div>
                        <div class="fila-total fila-total-final"><span>Total</span><strong id="totalDocumento">$0</strong></div>
                    </div>
                </section>

                <section class="bloque-formulario">
                    <h2>Información adicional</h2>
                    <div class="rejilla-campos">
                        <div class="campo campo-ancho">
                            <label for="terminos">Términos y condiciones</label>
                            <textarea id="terminos" name="terminos"></textarea>
                        </div>
                        <div class="campo campo-ancho">
                            <label for="notas">Notas</label>
                            <textarea id="notas" name="notas"></textarea>
                        </div>
                    </div>
                </section>

                <div class="acciones-formulario">
                    <a class="boton-secundario-form" href="/home/index.php">Cancelar</a>
                    <button class="boton-guardar" type="button" disabled>Guardar documento (pendiente)</button>
                </div>
            </form>
        </div>
    </main>

<script>
const cuerpoRenglones = document.getElementById('renglonesIngreso');
let contadorRenglones = 0;
const formatoCOP = new Intl.NumberFormat('es-CO', {
    style: 'currency',
    currency: 'COP',
    maximumFractionDigits: 2
});

function agregarRenglon() {
    const indice = contadorRenglones++;
    const fila = document.createElement('tr');
    fila.innerHTML = `
        <td><input type="text" name="items[${indice}][item]" aria-label="Ítem o producto/servicio"></td>
        <td><input type="text" name="items[${indice}][referencia]" aria-label="Referencia"></td>
        <td><input type="number" min="0" step="0.01" value="0" name="items[${indice}][precio]" data-campo="precio" aria-label="Precio"></td>
        <td><input type="number" min="0" max="100" step="0.01" value="0" name="items[${indice}][descuento]" data-campo="descuento" aria-label="Descuento porcentual"></td>
        <td><textarea name="items[${indice}][descripcion]" aria-label="Descripción"></textarea></td>
        <td><input type="number" min="0.01" step="0.01" value="1" name="items[${indice}][cantidad]" data-campo="cantidad" aria-label="Cantidad"></td>
        <td><input type="text" value="$0" data-campo="total-linea" aria-label="Total del renglón" readonly></td>
        <td><button class="boton-quitar" type="button" aria-label="Quitar renglón">×</button></td>
    `;
    cuerpoRenglones.appendChild(fila);
    fila.addEventListener('input', calcularTotales);
    fila.querySelector('.boton-quitar').addEventListener('click', function () {
        fila.remove();
        calcularTotales();
    });
    calcularTotales();
}

function calcularTotales() {
    let subtotal = 0;
    let descuento = 0;

    cuerpoRenglones.querySelectorAll('tr').forEach(function (fila) {
        const precio = Math.max(0, Number(fila.querySelector('[data-campo="precio"]').value) || 0);
        const cantidad = Math.max(0, Number(fila.querySelector('[data-campo="cantidad"]').value) || 0);
        const porcentaje = Math.min(100, Math.max(0, Number(fila.querySelector('[data-campo="descuento"]').value) || 0));
        const base = precio * cantidad;
        const descuentoLinea = base * porcentaje / 100;
        const totalLinea = base - descuentoLinea;

        subtotal += base;
        descuento += descuentoLinea;
        fila.querySelector('[data-campo="total-linea"]').value = formatoCOP.format(totalLinea);
    });

    document.getElementById('subtotal').textContent = formatoCOP.format(subtotal);
    document.getElementById('descuentoTotal').textContent = formatoCOP.format(descuento);
    document.getElementById('totalDocumento').textContent = formatoCOP.format(subtotal - descuento);
}

document.getElementById('agregarRenglon').addEventListener('click', agregarRenglon);
agregarRenglon();
</script>
