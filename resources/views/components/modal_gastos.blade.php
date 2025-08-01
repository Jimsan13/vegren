<div class="modal fade" id="gastoEditModal" tabindex="-1" aria-labelledby="gastoEditModalLabel" aria-hidden>
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <form id="gastoForm">
        <div class="modal-header">
          <h5 class="modal-title" id="gastoEditModalLabel">Agregar Gasto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="gastoId" name="gastoId" value="">
          <input type="hidden" id="gastoCategoria" name="categoria" value="">

          <div class="form-group">
            <label for="fecha">Fecha</label>
            <input type="date" id="fecha" name="fecha" class="form-control" required>
          </div>

          {{-- Aquí agregamos campos según la categoría, puedes crear un div por cada una y mostrar/ocultar con JS --}}
          <div id="fields-maquinaria" class="categoria-fields d-none">
            <div class="form-group">
              <label for="monto">Monto</label>
              <input type="number" id="monto" name="monto" class="form-control" step="0.01" min="0" required>
            </div>
            <div class="form-group">
              <label for="pagos_realizados">Pagos realizados</label>
              <input type="number" id="pagos_realizados" name="pagos_realizados" class="form-control" step="0.01" min="0" required>
            </div>
            <div class="form-group">
              <label for="total_acumulado">Total acumulado</label>
              <input type="number" id="total_acumulado" name="total_acumulado" class="form-control" step="0.01" min="0" readonly>
            </div>
          </div>

          <div id="fields-extras" class="categoria-fields d-none">
            <div class="form-group">
              <label for="entrega">Entrega</label>
              <input type="text" id="entrega" name="entrega" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="recibe">Recibe</label>
              <input type="text" id="recibe" name="recibe" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="descripcion">Descripción</label>
              <textarea id="descripcion" name="descripcion" class="form-control" rows="3" required></textarea>
            </div>
            <div class="form-group">
              <label for="monto_extras">Monto</label>
              <input type="number" id="monto_extras" name="monto" class="form-control" step="0.01" min="0" required>
            </div>
          </div>

          <div id="fields-gasolina" class="categoria-fields d-none">
            <div class="form-group">
              <label for="recibe_gasolina">Recibe</label>
              <input type="text" id="recibe_gasolina" name="recibe" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="metodo_pago">Método de pago</label>
              <input type="text" id="metodo_pago" name="metodo_pago" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="monto_gasolina">Monto</label>
              <input type="number" id="monto_gasolina" name="monto" class="form-control" step="0.01" min="0" required>
            </div>
            <div class="form-group">
              <label for="unidad">Unidad</label>
              <input type="text" id="unidad" name="unidad" class="form-control" required>
            </div>
          </div>

          <div id="fields-deudores" class="categoria-fields d-none">
            <div class="form-group">
              <label for="entrega_deudores">Entrega</label>
              <input type="text" id="entrega_deudores" name="entrega" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="recibe_deudores">Recibe</label>
              <input type="text" id="recibe_deudores" name="recibe" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="descripcion_deudores">Descripción</label>
              <textarea id="descripcion_deudores" name="descripcion" class="form-control" rows="3" required></textarea>
            </div>
            <div class="form-group">
              <label for="monto_deudores">Monto</label>
              <input type="number" id="monto_deudores" name="monto" class="form-control" step="0.01" min="0" required>
            </div>
          </div>

          <div id="fields-nomina" class="categoria-fields d-none">
            <div class="form-group">
              <label for="numero_semana">Número de semana</label>
              <input type="number" id="numero_semana" name="numero_semana" class="form-control" min="1" required>
            </div>
            <div class="form-group">
              <label for="total_semanal">Total semanal</label>
              <input type="number" id="total_semanal" name="total_semanal" class="form-control" step="0.01" min="0" required>
            </div>
          </div>

          <div id="fields-pagonotas" class="categoria-fields d-none">
            <div class="form-group">
              <label for="concepto">Concepto</label>
              <input type="text" id="concepto" name="concepto" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="folio_nombre">Folio / Nombre</label>
              <input type="text" id="folio_nombre" name="folio_nombre" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="proveedor">Proveedor</label>
              <input type="text" id="proveedor" name="proveedor" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="monto_pagonotas">Monto</label>
              <input type="number" id="monto_pagonotas" name="monto" class="form-control" step="0.01" min="0" required>
            </div>
          </div>

          <div id="fields-cliente" class="categoria-fields d-none">
            <div class="form-group">
              <label for="concepto_cliente">Concepto</label>
              <input type="text" id="concepto_cliente" name="concepto" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="recibe_cliente">Recibe</label>
              <input type="text" id="recibe_cliente" name="recibe" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="total_cliente">Total</label>
              <input type="number" id="total_cliente" name="total" class="form-control" step="0.01" min="0" required>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>
