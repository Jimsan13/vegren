// public/js/cargas.js
$(document).ready(function () {
$('.btn-edit').click(function () {
    const data = $(this).closest('.details-item').data();
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
    $('#edit-cinta').val(data.cinta);
    $('#edit-caja-extra').val(data.cajaextra);
    $('#edit-representante').val(data.representante);
    $('#edit-facturas-pagadas').prop('checked', data.facturaspagadas);
});

    });

    $('#edit-bultos, #edit-precio').on('input', function () {
        const bultos = parseFloat($('#edit-bultos').val()) || 0;
        const precio = parseFloat($('#edit-precio').val()) || 0;
        const total = bultos * precio;
        $('#edit-total-envio').val(total.toFixed(2));
    });

