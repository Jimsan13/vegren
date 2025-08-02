<div class="container-fluid mt-4">
<style>
  /* Contenedor principal más estrecho y centrado */
  .custom-main-content {
    max-width: 700px;
    margin: 30px auto;
    background: #f5f5f5; /* gris claro neutro */
    border-radius: 10px;
    padding: 25px 30px;
    box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }

  h2.custom-title {
    color: #333;
    font-weight: 700;
    font-size: 1.8rem;
    text-align: center;
    margin-bottom: 30px;
  }

  label.form-label {
    font-weight: 600;
    font-size: 1.1rem;
    color: #444;
    margin-bottom: 8px;
    display: block;
  }

  .input-group.custom-input-group {
    border-radius: 8px;
    overflow: hidden;
    background: white;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.07);
    transition: box-shadow 0.3s ease;
  }

  .input-group.custom-input-group:focus-within {
    box-shadow: 0 0 12px #999;
  }

  .custom-input {
    border: none;
    font-size: 1.2rem;
    padding: 18px 20px;
    color: #222;
    background-color: white;
    min-height: 52px;
    box-shadow: none;
    border-radius: 0;
  }

  .custom-input:focus {
    outline: none;
    background-color: #eef0f3;
    color: #111;
  }

  .input-group-text.custom-input-icon {
    background-color: #ddd;
    color: #555;
    font-size: 1.3rem;
    border: none;
    width: 48px;
    justify-content: center;
    padding: 0;
  }

  select.custom-input {
    appearance: none;
    background-image: none;
    padding-right: 18px;
  }

  /* Botones */
  .btn-cancel {
    background: transparent;
    border: 2px solid #555;
    color: #555;
    font-weight: 600;
    padding: 10px 32px;
    border-radius: 25px;
    transition: all 0.25s ease;
  }
  .btn-cancel:hover {
    background-color: #555;
    color: white;
  }

  .btn-save {
    background-color: #333;
    border: none;
    color: white;
    font-weight: 700;
    padding: 10px 32px;
    border-radius: 25px;
    box-shadow: 0 4px 14px rgba(0,0,0,0.3);
    transition: background-color 0.25s ease, box-shadow 0.25s ease;
  }
  .btn-save:hover {
    background-color: #111;
    box-shadow: 0 6px 20px rgba(0,0,0,0.6);
  }

  .btn-plus {
    background: #bbb;
    border: 1px solid #999;
    color: #444;
    border-radius: 0 8px 8px 0;
    padding: 0 14px;
    font-size: 1.1rem;
    transition: background-color 0.25s ease;
  }
  .btn-plus:hover {
    background-color: #999;
    color: #222;
  }

  /* Espaciados */
  .row.g-3 > div {
    margin-bottom: 20px;
  }

  /* Inputs readonly */
  input[readonly] {
    background-color: #e3e4e8 !important;
    color: #555 !important;
    font-weight: 600;
    cursor: not-allowed;
  }
</style>


  <div class="main-content custom-main-content">
    <div class="container mt-4">
      <h2 class="custom-title">{{ isset($carga) ? 'Editar carga' : 'Nueva carga' }}</h2>

      <form id="editCargaForm" method="POST" 
            action="{{ isset($carga) ? route('admin.cargas.update', $carga->id) : route('admin.cargas.store') }}">
        @csrf
        @if(isset($carga))
          @method('PUT')
        @endif

        <input type="hidden" id="edit-id" name="id" value="{{ $carga->id ?? '' }}">

        <!-- 1 -->
        <div class="row g-3">
          <div class="col-md-4">
            <label for="edit-fecha" class="form-label">Fecha</label>
            <div class="input-group custom-input-group">
              <input type="date" class="form-control custom-input" id="edit-fecha" name="fecha" required
                     value="{{ old('fecha', $carga->fecha ?? '') }}">
              <span class="input-group-text custom-input-icon"><i class="fas fa-calendar-alt"></i></span>
            </div>
          </div>
          <div class="col-md-4">
            <label for="edit-lote" class="form-label">Lote</label>
            <div class="input-group custom-input-group">
              <input type="text" class="form-control custom-input" id="edit-lote" name="lote" placeholder="Ingrese el lote" required
                     value="{{ old('lote', $carga->lote ?? '') }}">
              <span class="input-group-text custom-input-icon"><i class="fas fa-cubes"></i></span>
            </div>
          </div>
          <div class="col-md-4">
            <label for="edit-cliente" class="form-label">Cliente</label>
            <div class="input-group custom-input-group">
              <input type="text" class="form-control custom-input" id="edit-cliente" name="cliente" placeholder="Seleccione cliente" required
                     value="{{ old('cliente', $carga->cliente ?? '') }}">
              <span class="input-group-text custom-input-icon"><i class="fas fa-user"></i></span>
            </div>
          </div>
        </div>

        <!-- 2 -->
        <div class="row g-3 mt-3">
          <div class="col-md-4">
            <label for="edit-bultos" class="form-label">Bultos de caja</label>
            <div class="input-group custom-input-group">
              <input type="number" class="form-control custom-input" id="edit-bultos" name="bultos" placeholder="Cantidad de bultos" required
                     value="{{ old('bultos', $carga->bultosCaja ?? '') }}">
              <span class="input-group-text custom-input-icon"><i class="fas fa-box"></i></span>
            </div>
          </div>
          <div class="col-md-4">
            <label for="edit-precio" class="form-label">Precio por unidad</label>
            <div class="input-group custom-input-group">
              <span class="input-group-text custom-input-icon">$</span>
              <input type="number" step="0.01" class="form-control custom-input" id="edit-precio" name="precio" placeholder="Precio unitario" required
                     value="{{ old('precio', $carga->precioUnidad ?? '') }}">
            </div>
          </div>
          <div class="col-md-4">
            <label for="edit-anticipo-recibido-bool" class="form-label">Anticipo recibido</label>
            <div class="input-group custom-input-group">
              <select class="form-control custom-input" id="edit-anticipo-recibido-bool" name="anticipo_recibido_bool">
                <option value="true" {{ old('anticipo_recibido_bool', ($carga->anticipo_recibido_bool ?? '')) === 'true' ? 'selected' : '' }}>Sí</option>
                <option value="false" {{ old('anticipo_recibido_bool', ($carga->anticipo_recibido_bool ?? '')) === 'false' ? 'selected' : '' }}>No</option>
              </select>
              <span class="input-group-text custom-input-icon"><i class="fas fa-hand-holding-usd"></i></span>
            </div>
          </div>
        </div>

        <!-- 3 -->
        <div class="row g-3 mt-3">
          <div class="col-md-4">
            <label for="edit-anticipo" class="form-label">Monto Anticipo</label>
            <div class="input-group custom-input-group">
              <span class="input-group-text custom-input-icon">$</span>
              <input type="number" step="0.01" class="form-control custom-input" id="edit-anticipo" name="anticipo" placeholder="Monto del anticipo" required
                     value="{{ old('anticipo', $carga->anticipo ?? 0) }}">
              <span class="input-group-text custom-input-icon"><i class="fas fa-cash-register"></i></span>
            </div>
          </div>
          <div class="col-md-4">
            <label for="edit-total-envio" class="form-label">Total del envío</label>
            <div class="input-group custom-input-group">
              <span class="input-group-text custom-input-icon">$</span>
              <input type="number" step="0.01" class="form-control custom-input" id="edit-total-envio" name="total_envio" placeholder="Cálculo automático" readonly
                     value="{{ old('total_envio', $carga->totalEnvio ?? '') }}">
              <span class="input-group-text custom-input-icon"><i class="fas fa-calculator"></i></span>
            </div>
          </div>
          <div class="col-md-4">
            <label for="edit-remate" class="form-label">Remate</label>
            <div class="input-group custom-input-group">
              <span class="input-group-text custom-input-icon">$</span>
              <input type="number" step="0.01" class="form-control custom-input" id="edit-remate" name="remate" placeholder="Monto de remate"
                     value="{{ old('remate', $carga->remate ?? 0) }}">
              <span class="input-group-text custom-input-icon"><i class="fas fa-balance-scale"></i></span>
            </div>
          </div>
        </div>

        <!-- 4 -->
        <div class="row g-3 mt-3">
          <div class="col-md-4">
            <label for="edit-descuento-aplicado" class="form-label">Descuento aplicado</label>
            <div class="input-group custom-input-group">
              <input type="number" step="0.01" class="form-control custom-input" id="edit-descuento-aplicado" name="descuento_aplicado" placeholder="Monto o porcentaje"
                     value="{{ old('descuento_aplicado', $carga->descuentoAplicado ?? 0) }}">
              <span class="input-group-text custom-input-icon"><i class="fas fa-percent"></i></span>
            </div>
          </div>
          <div class="col-md-4">
            <label for="edit-facturacion" class="form-label">Facturación</label>
            <div class="input-group custom-input-group">
              <select class="form-control custom-input" id="edit-facturacion" name="facturacion">
                <option value="pendiente" {{ old('facturacion', $carga->facturacion ?? '') === 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="facturada" {{ old('facturacion', $carga->facturacion ?? '') === 'facturada' ? 'selected' : '' }}>Facturada</option>
              </select>
              <span class="input-group-text custom-input-icon"><i class="fas fa-file-invoice"></i></span>
            </div>
          </div>
          <div class="col-md-4">
            <label for="edit-saldo" class="form-label">Saldo de carga</label>
            <div class="input-group custom-input-group">
              <span class="input-group-text custom-input-icon">$</span>
              <input type="number" step="0.01" class="form-control custom-input" id="edit-saldo" name="saldo" placeholder="Cálculo automático" readonly
                     value="{{ old('saldo', $carga->saldoCarga ?? '') }}">
              <span class="input-group-text custom-input-icon"><i class="fas fa-wallet"></i></span>
            </div>
          </div>
        </div>

        <!-- 5 -->
        <div class="row g-3 mt-3">
          <div class="col-md-4">
            <label for="edit-cinta-transporte" class="form-label">Cinta de Transporte</label>
            <div class="input-group custom-input-group">
              <input type="text" class="form-control custom-input" id="edit-cinta-transporte" name="cinta_transporte" placeholder="Ingrese cinta"
                     value="{{ old('cinta_transporte', $carga->cintaTransporte ?? '') }}">
              <span class="input-group-text custom-input-icon"><i class="fas fa-truck"></i></span>
            </div>
          </div>
          <div class="col-md-4">
            <label for="edit-facturas-pagadas" class="form-label">Facturas pagadas</label>
            <div class="input-group custom-input-group">
              <select class="form-control custom-input" id="edit-facturas-pagadas" name="facturas_pagadas">
                <option value="true" {{ old('facturas_pagadas', ($carga->facturasPagadas ?? false)) ? 'selected' : '' }}>Sí</option>
                <option value="false" {{ !old('facturas_pagadas', ($carga->facturasPagadas ?? false)) ? 'selected' : '' }}>No</option>
              </select>
              <span class="input-group-text custom-input-icon"><i class="fas fa-check-circle"></i></span>
            </div>
          </div>
          <div class="col-md-4">
            <label for="edit-caja-extra" class="form-label">Caja extra</label>
            <div class="input-group custom-input-group">
              <span class="input-group-text custom-input-icon">$</span>
              <input type="number" step="0.01" class="form-control custom-input" id="edit-caja-extra" name="caja_extra" placeholder="Monto extra (opcional)"
                     value="{{ old('caja_extra', $carga->cajaExtra ?? 0) }}">
              <button class="btn btn-plus" type="button"><i class="fas fa-plus"></i></button>
            </div>
          </div>
        </div>

        <!-- 6 -->
        <div class="row g-3 mt-3">
          <div class="col-md-6">
            <label for="edit-representante-responsable" class="form-label">Representante responsable</label>
            <div class="input-group custom-input-group">
              <input type="text" class="form-control custom-input" id="edit-representante-responsable" name="representante_responsable" placeholder="Seleccione representante"
                     value="{{ old('representante_responsable', $carga->representanteResponsable ?? '') }}">
              <span class="input-group-text custom-input-icon"><i class="fas fa-user-tie"></i></span>
            </div>
          </div>
        </div>

        <div class="mt-4 text-center">
          <a href="{{ route('admin.cargas') }}" class="btn btn-cancel me-2">Cancelar</a>
          <button type="submit" class="btn btn-save">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>
