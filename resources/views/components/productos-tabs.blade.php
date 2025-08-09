<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cotizaciones y Recepción de Brócoli</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    @section('styles')
<link rel="stylesheet" href="{{ asset('css/productos.css') }}">
@endsection
</head>
<body>

    <div class="container">
        <h2></h2>
        <h3>Resumen de Cotizaciones</h3>

        <table class="table">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Total de cajas</th>
                    <th>Total de kilos</th>
                    <th>Precio por kilo</th>
                    <th>Nombre del proveedor</th>
                    <th>Total a pagar</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>2024-06-10</td>
                    <td>120</td>
                    <td>1800</td>
                    <td>$1.20</td>
                    <td>AgroFresco S.A.</td>
                    <td>$2160.00</td>
                    <td class="actions-cell">
                        <button class="action-btn delete-btn"><i class="fas fa-times"></i></button>
                        <button class="action-btn edit-btn"><i class="fas fa-pencil-alt"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>2024-06-09</td>
                    <td>95</td>
                    <td>1425</td>
                    <td>$1.18</td>
                    <td>CampoVerde S. de R.L.</td>
                    <td>$1681.50</td>
                    <td class="actions-cell">
                        <button class="action-btn delete-btn"><i class="fas fa-times"></i></button>
                        <button class="action-btn edit-btn"><i class="fas fa-pencil-alt"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>2024-06-08</td>
                    <td>110</td>
                    <td>1650</td>
                    <td>$1.22</td>
                    <td>Hortalizas MX</td>
                    <td>$2013.00</td>
                    <td class="actions-cell">
                        <button class="action-btn delete-btn"><i class="fas fa-times"></i></button>
                        <button class="action-btn edit-btn"><i class="fas fa-pencil-alt"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="add-button-container">
            <button class="btn add-new-btn" data-toggle="modal" data-target="#nuevaCotizacionModal">
                <i class="fas fa-plus"></i> Agregar
            </button>
        </div>
    </div>

    <div class="modal fade" id="nuevaCotizacionModal" tabindex="-1" role="dialog" aria-labelledby="nuevaCotizacionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="nuevaCotizacionModalLabel">Nueva Cotización de Brócoli</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="nuevaCotizacionForm">
                        <div class="form-group">
                            <label for="fecha">Fecha</label>
                            <input type="date" class="form-control" id="fecha" name="fecha" required>
                        </div>
                        <div class="form-group">
                            <label for="total_cajas">Total de cajas</label>
                            <input type="number" class="form-control" id="total_cajas" name="total_cajas" min="0" required>
                        </div>
                        <div class="form-group">
                            <label for="total_kilos">Total de kilos</label>
                            <input type="number" class="form-control" id="total_kilos" name="total_kilos" min="0" required>
                        </div>
                        <div class="form-group">
                            <label for="precio_kilo">Precio por kilo</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="number" step="0.01" class="form-control" id="precio_kilo" name="precio_kilo" min="0" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="proveedor">Nombre del proveedor</label>
                            <input type="text" class="form-control" id="proveedor" name="proveedor" required>
                        </div>
                        <div class="form-group">
                            <label for="total_pagar">Total a pagar</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="text" class="form-control" id="total_pagar" name="total_pagar" readonly>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" form="nuevaCotizacionForm" class="btn btn-primary-custom">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            // Función para calcular el total a pagar
            function calcularTotalPagar() {
                var totalKilos = parseFloat($('#total_kilos').val()) || 0;
                var precioKilo = parseFloat($('#precio_kilo').val()) || 0;
                var totalPagar = totalKilos * precioKilo;
                $('#total_pagar').val(totalPagar.toFixed(2));
            }

            // Detectar cambios en los campos que afectan el cálculo del total
            $('#total_kilos, #precio_kilo').on('input', calcularTotalPagar);

            // Limpiar el formulario y el total a pagar al mostrar el modal
            $('#nuevaCotizacionModal').on('show.bs.modal', function () {
                $('#nuevaCotizacionForm')[0].reset(); // Restablece todos los campos del formulario
                $('#total_pagar').val(''); // Asegura que el campo de total esté vacío
            });

            // Manejo del envío del formulario (simulado)
            $('#nuevaCotizacionForm').on('submit', function(e) {
                e.preventDefault(); // Evita el envío tradicional del formulario
                
                // Aquí iría la lógica para enviar los datos a tu backend (usando AJAX, fetch, etc.)
                var formData = {
                    fecha: $('#fecha').val(),
                    total_cajas: $('#total_cajas').val(),
                    total_kilos: $('#total_kilos').val(),
                    precio_kilo: $('#precio_kilo').val(),
                    proveedor: $('#proveedor').val(),
                    total_pagar: $('#total_pagar').val()
                };
                console.log("Datos a guardar:", formData);

                // Cierra el modal después de "guardar"
                $('#nuevaCotizacionModal').modal('hide');
                alert('Cotización guardada exitosamente (simulación)');

                // En una aplicación real, aquí recargarías la tabla o agregarías la nueva fila dinámicamente
            });

            // Acciones para los botones de editar y borrar (ejemplo)
            $('.edit-btn').on('click', function() {
                alert('Funcionalidad de editar aún no implementada.');
                // Aquí iría la lógica para abrir un modal de edición o navegar a una página de edición
            });

            $('.delete-btn').on('click', function() {
                if (confirm('¿Estás seguro de que quieres eliminar esta cotización?')) {
                    alert('Funcionalidad de borrar aún no implementada.');
                    // Aquí iría la lógica para enviar una solicitud de eliminación al backend
                    // y luego eliminar la fila de la tabla si la eliminación es exitosa.
                }
            });
        });
    </script>
</body>
</html>