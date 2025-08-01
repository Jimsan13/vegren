document.addEventListener("DOMContentLoaded", function () {
    // Manejo de cambio de pestañas manual si se requiere lógica adicional
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        const categoria = $(e.target).data('categoria');
        console.log("Categoría activa:", categoria);
    });

    // Rellenar modal de edición con datos actuales del gasto
    $('.btn-edit-gasto').on('click', function () {
        const gasto = $(this).data('gasto');

        $('#editGastoForm').attr('action', `/admin/gastos/${gasto.id}`);
        $('#edit_id').val(gasto.id);
        $('#edit_categoria').val(gasto.categoria);
        $('#edit_descripcion').val(gasto.descripcion);
        $('#edit_monto').val(gasto.monto);
        $('#edit_fecha').val(gasto.fecha);
    });

    // Limpiar el formulario al cerrar el modal de edición
    $('#gastosEditModal').on('hidden.bs.modal', function () {
        const modal = document.getElementById('gastosEditModal');

        $('#editGastoForm')[0].reset();
    });

    // Limpiar formulario al abrir modal de nuevo gasto
    $('#nuevoGastoBtn').on('click', function () {
        $('#nuevoGastoForm')[0].reset();
        $('#categoria_input').val($(this).data('categoria'));
    });
});
