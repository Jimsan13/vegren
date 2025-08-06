<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
/>

<div class="custom-main-content">
  <h2 class="custom-title">{{ isset($carga) ? 'Editar carga' : 'Nueva carga' }}</h2>

  <form id="editCargaForm" method="POST"
        action="{{ isset($carga) ? route('admin.cargas.update', $carga->id) : route('admin.cargas.store') }}">
    @csrf
    @if(isset($carga))
      @method('PUT')
    @endif

    <input type="hidden" id="edit-id" name="id" value="{{ $carga->id ?? '' }}">

    <!-- 1 -->
    <div class="form-row">
      <div class="form-group">
        <label for="edit-fecha" class="form-label">Fecha</label>
        <div class="custom-input-group">
          <input type="date" class="custom-input" id="edit-fecha" name="fecha" required
                 value="{{ old('fecha', $carga->fecha ?? '') }}">
          <span class="custom-input-icon"><i class="fas fa-calendar-alt"></i></span>
        </div>
      </div>
      <div class="form-group">
        <label for="edit-lote" class="form-label">Lote</label>
        <div class="custom-input-group">
          <input type="text" class="custom-input" id="edit-lote" name="lote" placeholder="Ingrese el lote" required
                 value="{{ old('lote', $carga->lote ?? '') }}">
          <span class="custom-input-icon"><i class="fas fa-cubes"></i></span>
        </div>
      </div>
      <div class="form-group">
        <label for="edit-cliente" class="form-label">Cliente</label>
        <div class="custom-input-group">
          <input type="text" class="custom-input" id="edit-cliente" name="cliente" placeholder="Seleccione cliente" required
                 value="{{ old('cliente', $carga->cliente ?? '') }}">
          <span class="custom-input-icon"><i class="fas fa-user"></i></span>
        </div>
      </div>
    </div>

    <!-- 2 -->
    <div class="form-row mt-3">
      <div class="form-group">
        <label for="edit-bultos" class="form-label">Bultos de caja</label>
        <div class="custom-input-group">
          <input type="number" min="0" class="custom-input" id="edit-bultos" name="bultos" placeholder="Cantidad de bultos" required
                 value="{{ old('bultos', $carga->bultosCaja ?? '') }}">
          <span class="custom-input-icon"><i class="fas fa-box"></i></span>
        </div>
      </div>
      <div class="form-group">
        <label for="edit-precio" class="form-label">Precio por unidad</label>
        <div class="custom-input-group">
          <span class="custom-input-icon">$</span>
          <input type="number" min="0" step="0.01" class="custom-input" id="edit-precio" name="precio" placeholder="Precio unitario" required
                 value="{{ old('precio', $carga->precioUnidad ?? '') }}">
        </div>
      </div>
      <div class="form-group">
        <label for="edit-anticipo-recibido-bool" class="form-label">Anticipo recibido</label>
        <div class="custom-input-group">
          <select class="custom-input" id="edit-anticipo-recibido-bool" name="anticipo_recibido_bool">
            <option value="true" {{ old('anticipo_recibido_bool', ($carga->anticipo_recibido_bool ?? '')) === 'true' ? 'selected' : '' }}>Sí</option>
            <option value="false" {{ old('anticipo_recibido_bool', ($carga->anticipo_recibido_bool ?? '')) === 'false' ? 'selected' : '' }}>No</option>
          </select>
          <span class="custom-input-icon"><i class="fas fa-hand-holding-usd"></i></span>
        </div>
      </div>
    </div>

    <!-- 3 -->
    <div class="form-row mt-3">
      <div class="form-group">
        <label for="edit-anticipo" class="form-label">Monto Anticipo</label>
        <div class="custom-input-group">
          <span class="custom-input-icon">$</span>
          <input type="number" min="0" step="0.01" class="custom-input" id="edit-anticipo" name="anticipo" placeholder="Monto del anticipo" required
                 value="{{ old('anticipo', $carga->anticipo ?? 0) }}">
          <span class="custom-input-icon"><i class="fas fa-cash-register"></i></span>
        </div>
      </div>
      <div class="form-group">
        <label for="edit-total-envio" class="form-label">Total del envío</label>
        <div class="custom-input-group">
          <span class="custom-input-icon">$</span>
          <input type="number" step="0.01" class="custom-input" id="edit-total-envio" name="total_envio" placeholder="Cálculo automático" readonly
                 value="{{ old('total_envio', $carga->totalEnvio ?? '') }}">
          <span class="custom-input-icon"><i class="fas fa-calculator"></i></span>
        </div>
      </div>
      <div class="form-group">
        <label for="edit-remate" class="form-label">Remate</label>
        <div class="custom-input-group">
          <span class="custom-input-icon">$</span>
          <input type="number" min="0" step="0.01" class="custom-input" id="edit-remate" name="remate" placeholder="Monto de remate"
                 value="{{ old('remate', $carga->remate ?? 0) }}">
          <span class="custom-input-icon"><i class="fas fa-balance-scale"></i></span>
        </div>
      </div>
    </div>

    <!-- 4 -->
    <div class="form-row mt-3">
      <div class="form-group">
        <label for="edit-descuento-aplicado" class="form-label">Descuento aplicado</label>
        <div class="custom-input-group">
          <input type="number" min="0" step="0.01" class="custom-input" id="edit-descuento-aplicado" name="descuento_aplicado" placeholder="Monto o porcentaje"
                 value="{{ old('descuento_aplicado', $carga->descuentoAplicado ?? 0) }}">
          <span class="custom-input-icon"><i class="fas fa-percent"></i></span>
        </div>
      </div>
      <div class="form-group">
        <label for="edit-facturacion" class="form-label">Facturación</label>
        <div class="custom-input-group">
          <select class="custom-input" id="edit-facturacion" name="facturacion">
            <option value="pendiente" {{ old('facturacion', $carga->facturacion ?? '') === 'pendiente' ? 'selected' : '' }}>Pendiente</option>
            <option value="facturada" {{ old('facturacion', $carga->facturacion ?? '') === 'facturada' ? 'selected' : '' }}>Facturada</option>
          </select>
          <span class="custom-input-icon"><i class="fas fa-file-invoice"></i></span>
        </div>
      </div>
      <div class="form-group">
        <label for="edit-saldo" class="form-label">Saldo de carga</label>
        <div class="custom-input-group">
          <span class="custom-input-icon">$</span>
          <input type="number" step="0.01" class="custom-input" id="edit-saldo" name="saldo" placeholder="Cálculo automático" readonly
                 value="{{ old('saldo', $carga->saldoCarga ?? '') }}">
          <span class="custom-input-icon"><i class="fas fa-wallet"></i></span>
        </div>
      </div>
    </div>

    <!-- 5 -->
    <div class="form-row mt-3">
      <div class="form-group">
        <label for="edit-cinta-transporte" class="form-label">Cinta de Transporte</label>
        <div class="custom-input-group">
          <input type="text" class="custom-input" id="edit-cinta-transporte" name="cinta_transporte" placeholder="Ingrese cinta"
                 value="{{ old('cinta_transporte', $carga->cintaTransporte ?? '') }}">
          <span class="custom-input-icon"><i class="fas fa-truck"></i></span>
        </div>
      </div>
      <div class="form-group">
        <label for="edit-facturas-pagadas" class="form-label">Facturas pagadas</label>
        <div class="custom-input-group">
          <select class="custom-input" id="edit-facturas-pagadas" name="facturas_pagadas">
            <option value="true" {{ old('facturas_pagadas', ($carga->facturasPagadas ?? false)) ? 'selected' : '' }}>Sí</option>
            <option value="false" {{ !old('facturas_pagadas', ($carga->facturasPagadas ?? false)) ? 'selected' : '' }}>No</option>
          </select>
          <span class="custom-input-icon"><i class="fas fa-check-circle"></i></span>
        </div>
      </div>
      <div class="form-group">
        <label for="edit-caja-extra" class="form-label">Caja extra</label>
        <div class="custom-input-group" style="display: flex; align-items: center;">
          <span class="custom-input-icon">$</span>
          <input type="number" min="0" step="0.01" class="custom-input" id="edit-caja-extra" name="caja_extra" placeholder="Monto extra (opcional)"
                 value="{{ old('caja_extra', $carga->cajaExtra ?? 0) }}" style="flex-grow:1;">
        </div>
      </div>
    </div>

    <!-- 6 -->
    <div class="form-row mt-3">
      <div class="form-group full-width">
        <label for="edit-representante-responsable" class="form-label">Representante responsable</label>
        <div class="custom-input-group">
          <input type="text" class="custom-input" id="edit-representante-responsable" name="representante_responsable" placeholder="Seleccione representante"
                 value="{{ old('representante_responsable', $carga->representanteResponsable ?? '') }}">
          <span class="custom-input-icon"><i class="fas fa-user-tie"></i></span>
        </div>
      </div>
    </div>

    <div class="mt-4 text-center">
      <a href="{{ route('admin.cargas') }}" class="btn btn-cancel me-2" style="text-decoration:none; display:inline-block; margin-right: 8px;">Cancelar</a>
      <button type="submit" class="btn btn-save">Guardar</button>
    </div>
  </form>
</div>
<style>
.custom-main-content {
  max-width: 900px;
  margin: 30px auto;
  background: #fff;
  padding: 30px 40px;
  border-radius: 12px;
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  color: #2c3e50;
}

.custom-title {
  font-size: 2rem;
  margin-bottom: 25px;
  font-weight: 700;
  text-align: center;
  color: #1a2935; /* Azul oscuro para título */
}

.form-row {
  display: flex;
  gap: 25px;
  flex-wrap: wrap;
  justify-content: space-between;
}

.form-group {
  flex: 1 1 280px;
  display: flex;
  flex-direction: column;
  margin-bottom: 18px;
}

.form-group.full-width {
  flex: 1 1 100%;
}

.form-label {
  font-weight: 600;
  margin-bottom: 8px;
  color: #394253; /* Gris oscuro para etiquetas */
  user-select: none;
}

.custom-input-group {
  position: relative;
  display: flex;
  align-items: center;
}

.custom-input {
  width: 100%;
  padding: 10px 38px 10px 38px;
  border: 2px solid #ccc; /* Gris claro borde */
  border-radius: 8px;
  font-size: 1rem;
  transition: border-color 0.3s ease;
  color: #2c3e50;
  background-color: #fff; /* fondo blanco */
}

.custom-input::placeholder {
  color: #8a8a8a;
}

.custom-input:focus {
  outline: none;
  border-color: #2c3e50; /* Azul oscuro borde foco */
  background-color: #f5f7fa;
  box-shadow: 0 0 6px #2c3e50aa;
}

.custom-input[readonly] {
  background-color: #f0f0f0;
  cursor: not-allowed;
  color: #7a7a7a;
}

/* Iconos a la izquierda */
.custom-input-icon {
  position: absolute;
  left: 12px;
  color: #2c3e50; /* Azul oscuro iconos */
  font-size: 1.15rem;
  pointer-events: none;
  user-select: none;
  display: flex;
  align-items: center;
  height: 100%;
}

/* Para el input con icono dólar a la izquierda */
.custom-input-group > span.custom-input-icon:first-child {
  left: 10px;
  top: 50%;
  transform: translateY(-50%);
  font-weight: 600;
  color: #2c3e50;
  pointer-events: none;
}

/* Botones */
.btn {
  padding: 12px 32px;
  border-radius: 50px;
  font-size: 1.1rem;
  font-weight: 700;
  cursor: pointer;
  border: none;
  transition: background-color 0.3s ease, color 0.3s ease;
  user-select: none;
}

.btn-cancel {
  background-color: transparent;
  color: #6b6b6b;
  border: 2px solid #6b6b6b;
}

.btn-cancel:hover {
  background-color: #6b6b6b;
  color: white;
}

.btn-save {
  background-color: #2c3e50;
  color: white;
  border: 2px solid #2c3e50;
  box-shadow: 0 5px 12px #2c3e5080;
}

.btn-save:hover {
  background-color: #1a2935;
  border-color: #1a2935;
  box-shadow: 0 7px 16px #1a293580;
}

/* Espaciado para el contenedor de botones */
.mt-4.text-center {
  margin-top: 30px;
  text-align: center;
}

/* Responsive */
@media (max-width: 720px) {
  .form-row {
    flex-direction: column;
  }
  .form-group {
    flex: 1 1 100%;
  }
}

/* Quitar spinner en number inputs para Webkit */
input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}


</style>


<script>
  // Función para actualizar los cálculos automáticos: total_envio y saldo
  function actualizarCalculos() {
    // Obtener valores numéricos, parseando y manejando posibles NaN
    const bultos = parseFloat(document.getElementById('edit-bultos').value) || 0;
    const precio = parseFloat(document.getElementById('edit-precio').value) || 0;
    const remate = parseFloat(document.getElementById('edit-remate').value) || 0;
    const descuento = parseFloat(document.getElementById('edit-descuento-aplicado').value) || 0;
    const anticipo = parseFloat(document.getElementById('edit-anticipo').value) || 0;
    const cajaExtra = parseFloat(document.getElementById('edit-caja-extra').value) || 0;

    // Calcular total envío = (bultos * precio) + remate + cajaExtra - descuento
    let totalEnvio = (bultos * precio) + remate + cajaExtra - descuento;
    if (totalEnvio < 0) totalEnvio = 0;

    // Saldo = totalEnvio - anticipo
    let saldo = totalEnvio - anticipo;
    if (saldo < 0) saldo = 0;

    // Actualizar inputs readonly con 2 decimales
    document.getElementById('edit-total-envio').value = totalEnvio.toFixed(2);
    document.getElementById('edit-saldo').value = saldo.toFixed(2);
  }

  // Asociar eventos a inputs que afectan los cálculos
  document.addEventListener('DOMContentLoaded', function() {
    const camposCalculo = [
      'edit-bultos', 'edit-precio', 'edit-remate', 'edit-descuento-aplicado', 'edit-anticipo', 'edit-caja-extra'
    ];

    camposCalculo.forEach(id => {
      const el = document.getElementById(id);
      if (el) {
        el.addEventListener('input', actualizarCalculos);
      }
    });

    // Ejecutar cálculo inicial para cargar valores si ya existen
    actualizarCalculos();
  });
</script>
