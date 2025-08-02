$(document).ready(function() {

    // Cuando se da click en "Agregar"
    $('#btnAgregarCarga').click(function() {
        // Limpiar el formulario
        $('#editCargaForm')[0].reset();

        // Cambiar título modal
        $('#cargaEditModalLabel').text('Agregar Nueva Carga');

        // Limpiar campos ocultos y flags
        $('#edit-id').val('');
        $('#edit-modal-type').val('create');

        // Habilitar campos que puedan estar deshabilitados
        $('#edit-total-envio').prop('readonly', true);
        $('#edit-saldo').prop('readonly', true);
    });

    // Cuando se da click en "Editar" (botones con clase .btn-edit)
    $('.btn-edit').click(function() {
        const data = $(this).closest('.details-item').data();

        $('#cargaEditModalLabel').text('Editar Carga');

        $('#edit-id').val(data.id);
        $('#edit-modal-type').val('edit');

        $('#edit-fecha').val(data.fecha);
        $('#edit-lote').val(data.lote);
        $('#edit-cliente').val(data.cliente);
        $('#edit-bultos').val(data.bultos);
        $('#edit-precio').val(data.precio);
        $('#edit-total-envio').val(data.totalenvio);
        $('#edit-anticipo').val(data.anticipo);
        $('#edit-facturacion').val(data.facturacion);
        $('#edit-saldo').val(data.saldo);
        $('#edit-cinta-transporte').val(data.cintaTransporte);
        $('#edit-caja-extra').val(data.cajaExtra);
        $('#edit-representante-responsable').val(data.representanteResponsable);
        $('#edit-facturas-pagadas').val(data.facturasPagadas.toString());

        $('#cargaEditModal').modal('show');
    });

    // Calcular total envío al cambiar bultos o precio
    $('#edit-bultos, #edit-precio').on('input', function () {
        const bultos = parseFloat($('#edit-bultos').val()) || 0;
        const precio = parseFloat($('#edit-precio').val()) || 0;
        const total = bultos * precio;
        $('#edit-total-envio').val(total.toFixed(2));

        // También actualiza saldo si quieres (ejemplo simple)
        const anticipo = parseFloat($('#edit-anticipo').val()) || 0;
        const saldo = total - anticipo;
        $('#edit-saldo').val(saldo.toFixed(2));
    });

    // También actualizar saldo si cambia anticipo
    $('#edit-anticipo').on('input', function () {
        const total = parseFloat($('#edit-total-envio').val()) || 0;
        const anticipo = parseFloat($(this).val()) || 0;
        const saldo = total - anticipo;
        $('#edit-saldo').val(saldo.toFixed(2));
    });

});
