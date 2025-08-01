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
        <h3 class="mt-4">Resumen de Cotizaciones</h3>

        <div class="add-button-container mb-3">
            <button class="btn add-new-btn" data-toggle="modal" data-target="#nuevaCotizacionModal">
                <i class="fas fa-plus"></i> Agregar
            </button>
        </div>
        @props(['cotizaciones'])
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
                @forelse ($cotizaciones as $cotizacion)
                    <tr>
                        <td>{{ $cotizacion->fecha }}</td>
                        <td>{{ $cotizacion->total_cajas }}</td>
                        <td>{{ $cotizacion->total_kilos }}</td>
                        <td>${{ number_format($cotizacion->precio_kilo, 2) }}</td>
                        <td>{{ $cotizacion->proveedor }}</td>
                        <td>${{ number_format($cotizacion->total_pagar, 2) }}</td>
                        <td>
                        <a href="{{ route('cotizaciones.edit', $cotizacion->id) }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>

                            <form action="{{ route('cotizaciones.destroy', $cotizacion->id) }}" method="POST" style="display:inline;" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Eliminar">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No hay cotizaciones registradas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>

    <!-- Modal Nueva Cotización -->
    <div class="modal fade" id="nuevaCotizacionModal" tabindex="-1" role="dialog" aria-labelledby="nuevaCotizacionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="nuevaCotizacionModalLabel">Nueva Cotización de Brócoli</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="nuevaCotizacionForm" method="POST" action="{{ route('cotizaciones.store') }}">
                        @csrf
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
    $(document).ready(function () {
        // Función para calcular el total a pagar
        function calcularTotalPagar() {
            var totalKilos = parseFloat($('#total_kilos').val()) || 0;
            var precioKilo = parseFloat($('#precio_kilo').val()) || 0;
            var totalPagar = totalKilos * precioKilo;
            $('#total_pagar').val(totalPagar.toFixed(2));
        }

        // Detecta cambios en los campos para recalcular automáticamente
        $('#total_kilos, #precio_kilo').on('input', calcularTotalPagar);

        // Limpia el formulario y el total a pagar cuando se abre el modal
        $('#nuevaCotizacionModal').on('show.bs.modal', function () {
            $('#nuevaCotizacionForm')[0].reset();
            $('#total_pagar').val('');
        });

        // Opcional: mensaje de confirmación para eliminar (si implementas luego)
        $('.delete-btn').on('click', function () {
            if (confirm('¿Estás seguro de que quieres eliminar esta cotización?')) {
                alert('Funcionalidad de borrar aún no implementada.');
            }
        });
    });

        document.addEventListener('DOMContentLoaded', function () {
        const deleteForms = document.querySelectorAll('.delete-form');
        deleteForms.forEach(form => {
            form.addEventListener('submit', function (e) {
                if (!confirm('¿Estás seguro de que quieres eliminar esta cotización?')) {
                    e.preventDefault();
                }
            });
        });
    });
</script>

</body>
</html>
