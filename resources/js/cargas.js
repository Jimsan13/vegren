$(document).ready(function() {
    // Función para calcular Total Envío y Saldo
    function calcularTotales() {
        var bultos = parseFloat($('#edit-bultos').val()) || 0;
        var precio = parseFloat($('#edit-precio').val()) || 0;
        var anticipoRecibidoBool = $('#edit-anticipo-recibido-bool').val() === 'true'; // Obtener el booleano
        var anticipo = anticipoRecibidoBool ? (parseFloat($('#edit-anticipo').val()) || 0) : 0; // Si no hay anticipo recibido, el monto es 0
        var remate = parseFloat($('#edit-remate').val()) || 0;
        var descuento = parseFloat($('#edit-descuento-aplicado').val()) || 0;
        var cajaExtra = parseFloat($('#edit-caja-extra').val()) || 0;

        // Calcular Total del envío: Bultos * Precio por unidad
        let totalEnvioCalculado = (bultos * precio);

        // Los cálculos de remate, descuento y caja extra deben afectar el total_envio
        // y luego el saldo se calcula sobre ese total_envio ajustado.
        // Asegúrate de que esta lógica coincida con la que tienes en tu controlador de Laravel.
        // En tu controlador Laravel, calculaste saldo como:
        // saldo = totalEnvio - anticipoReal - remate - descuento_aplicado - caja_extra;
        // Así que aquí ajustamos totalEnvioCalculado para que el saldo se derive correctamente de él.

        // Simplemente ajustamos el saldo directamente
        let saldoCalculado = totalEnvioCalculado - anticipo - remate - descuento - cajaExtra;


        $('#edit-total-envio').val(totalEnvioCalculado.toFixed(2));
        $('#edit-saldo').val(saldoCalculado.toFixed(2));
    }

    // Listener para los campos que afectan el cálculo
    $('#edit-bultos, #edit-precio, #edit-anticipo, #edit-remate, #edit-descuento-aplicado, #edit-caja-extra, #edit-anticipo-recibido-bool').on('input change', calcularTotales);

    // Al abrir el modal
    $('#cargaEditModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Botón que activó el modal
        var modalType = button.data('modal-type'); // 'edit' o 'add'
        var modal = $(this);
        var form = modal.find('#editCargaForm');

        // Limpiar formulario y reiniciar _method input al abrirlo
        form[0].reset();
        modal.find('#edit-id').val('');
        modal.find('#edit-modal-type').val(modalType);

        // Remover el campo _method si existe (para evitar problemas en el modo 'add')
        form.find('input[name="_method"]').remove();

        // Ajustar título del modal
        if (modalType === 'edit') {
            modal.find('.modal-title').text('Editar Datos de Carga');

            var row = button.closest('.details-item');
            var cargaId = row.data('id');
            modal.find('#edit-id').val(cargaId);

            // Añadir el campo oculto para el método PUT
            form.append('<input type="hidden" name="_method" value="PUT">');

            // **AJAX para obtener los datos de la carga individual**
            // Es mucho más robusto que depender de data-attributes, ya que los data-attributes
            // pueden no contener todos los campos o ser sensibles a formato.
            fetch(`/admin/cargas/${cargaId}/edit-data`, {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok ' + response.statusText);
                }
                return response.json();
            })
            .then(cargaData => {
                // Poblar el formulario con los datos recibidos del backend
                modal.find('#edit-fecha').val(cargaData.fecha); // La fecha ya viene en formato YYYY-MM-DD
                modal.find('#edit-lote').val(cargaData.lote);
                modal.find('#edit-cliente').val(cargaData.cliente);
                modal.find('#edit-bultos').val(cargaData.bultos);
                modal.find('#edit-precio').val(cargaData.precio);
                modal.find('#edit-anticipo-recibido-bool').val(cargaData.anticipo_recibido_bool ? 'true' : 'false');
                modal.find('#edit-anticipo').val(cargaData.anticipo);
                modal.find('#edit-remate').val(cargaData.remate);
                modal.find('#edit-descuento-aplicado').val(cargaData.descuento_aplicado);
                modal.find('#edit-facturacion').val(cargaData.facturacion);
                modal.find('#edit-cinta-transporte').val(cargaData.cinta_transporte);
                modal.find('#edit-facturas-pagadas').val(cargaData.facturas_pagadas ? 'true' : 'false');
                modal.find('#edit-caja-extra').val(cargaData.caja_extra);
                modal.find('#edit-representante-responsable').val(cargaData.representante_responsable);

                // Después de poblar, recalcular los totales para asegurar que se muestren correctamente
                calcularTotales();
            })
            .catch(error => {
                console.error('Error al obtener los datos de la carga:', error);
                alert('Hubo un error al cargar los datos de la carga. Intenta de nuevo.');
                modal.modal('hide'); // Cierra el modal si hay un error
            });

        } else { // modalType === 'add'
            modal.find('.modal-title').text('Agregar Nueva Carga');
            // Establecer valores por defecto para un nuevo registro
            modal.find('#edit-fecha').val(new Date().toISOString().substring(0, 10)); // Fecha actual
            modal.find('#edit-anticipo-recibido-bool').val('false');
            modal.find('#edit-anticipo').val('0.00');
            modal.find('#edit-remate').val('0.00');
            modal.find('#edit-descuento-aplicado').val('0.00');
            modal.find('#edit-facturacion').val('pendiente');
            modal.find('#edit-cinta-transporte').val('');
            modal.find('#edit-facturas-pagadas').val('false');
            modal.find('#edit-caja-extra').val('0.00');
            modal.find('#edit-representante-responsable').val('');
            modal.find('#edit-total-envio').val('0.00');
            modal.find('#edit-saldo').val('0.00');

            calcularTotales(); // Cálculo inicial para agregar
        }
    });

    // Manejar envío del formulario
    $('#editCargaForm').on('submit', function(e) {
        e.preventDefault(); // Evita el envío por defecto del formulario

        var form = $(this);
        var formData = new FormData(form[0]); // Usar FormData para enviar archivos y datos correctamente
        var modalType = $('#edit-modal-type').val();
        var cargaId = $('#edit-id').val();

        let url = '';
        let method = 'POST'; // Siempre POST para Laravel con _method

        if (modalType === 'add') {
            url = '/admin/cargas'; // Ruta para almacenar nueva carga
        } else { // 'edit'
            url = `/admin/cargas/${cargaId}`; // Ruta para actualizar carga existente
            // El _method=PUT ya se agregó en el evento show.bs.modal
        }

        // Añadir el token CSRF
        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

        fetch(url, {
            method: method,
            body: formData,
            // ¡ESTE ERA EL ERROR! FALTABA UN CORCHETE DE CIERRE AQUÍ PARA EL OBJETO fetch options
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        }) // <<-- ¡CORREGIDO! Cierre del objeto de configuración de fetch
        .then(response => {
            if (!response.ok) {
                return response.json().then(errorData => {
                    throw { status: response.status, data: errorData };
                }).catch(() => {
                    throw new Error('Error de servidor: ' + response.statusText);
                });
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                alert(data.message);
                $('#cargaEditModal').modal('hide');
                location.reload(); // Recarga la página para ver los cambios actualizados
                // Opcional: Implementar lógica para actualizar solo la fila de la tabla sin recargar toda la página
            } else {
                alert('Error: ' + (data.message || 'Error desconocido.'));
            }
        })
        .catch(error => {
            console.error('Error en la solicitud AJAX:', error);
            if (error.status && error.data && error.data.errors) {
                let errorMessage = 'Errores de validación:\n';
                for (let field in error.data.errors) {
                    errorMessage += `- ${error.data.errors[field].join(', ')}\n`;
                }
                alert(errorMessage);
            } else {
                alert('Ocurrió un error al procesar la solicitud: ' + (error.message || 'Desconocido'));
            }
        });
    });

    // Manejar clic en el botón de eliminar
    $('.details-section').on('click', '.btn-delete', function() {
        if (confirm('¿Estás seguro de que quieres eliminar esta carga?')) {
            var row = $(this).closest('.details-item');
            var cargaId = row.data('id');

            fetch(`/admin/cargas/${cargaId}`, {
                method: 'POST', // Envía como POST para que Laravel procese _method
                body: new URLSearchParams({
                    '_method': 'DELETE', // Campo para simular DELETE
                    '_token': $('meta[name="csrf-token"]').attr('content') // Token CSRF
                }),
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Content-Type': 'application/x-www-form-urlencoded' // Necesario para URLSearchParams
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok ' + response.statusText);
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    row.remove(); // Elimina la fila de la tabla inmediatamente
                    // También podrías recargar la página si necesitas recalcular los indicadores
                    // location.reload();
                } else {
                    alert('Error al eliminar: ' + (data.message || 'Error desconocido.'));
                }
            })
            .catch(error => {
                console.error('Error al eliminar la carga:', error);
                alert('Ocurrió un error al eliminar la carga.');
            });
        }
    });
});