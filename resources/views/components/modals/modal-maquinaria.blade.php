<!-- Modal para Maquinaria -->
<div class="modal fade" id="modalMaquinaria" tabindex="-1">
  <div class="modal-dialog">
    <form method="POST" action="{{ route('gastos.store') }}">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Agregar Gasto de Maquinaria</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <!-- Campos del formulario -->
          <input type="hidden" name="categoria" value="maquinaria">
          <div class="mb-3">
            <label>Fecha</label>
            <input type="date" name="fecha" class="form-control">
          </div>
          <div class="mb-3">
            <label>Monto</label>
            <input type="number" name="monto" class="form-control">
          </div>
          <div class="mb-3">
            <label>Descripción</label>
            <textarea name="descripcion" class="form-control"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </div>
    </form>
  </div>
</div>
