<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gastos y Movimientos</title>

    

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @section('styles')
    <link rel="stylesheet" href="{{ asset('css/campo.css') }}">
    @endsection
</head>
<body>

<div class="container-fluid">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <ul class="nav nav-tabs mb-4 gastos-tabs" id="gastosMovimientosTabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="planta-tab" data-toggle="tab" href="#planta" role="tab" aria-controls="planta" aria-selected="true">Planta</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="insumos-tab" data-toggle="tab" href="#insumos" role="tab" aria-controls="insumos" aria-selected="false">Insumos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="gastosextras-tab" data-toggle="tab" href="#gastosextras" role="tab" aria-controls="gastosextras" aria-selected="false">Gastos extras</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="campo-tab" data-toggle="tab" href="#campo" role="tab" aria-controls="campo" aria-selected="false">Campo</a>
        </li>
    </ul>

    @props(['movimientos'])

<div class="tab-content" id="gastosMovimientosTabsContent">
        <!-- PLANTA -->
        <div class="tab-pane fade show active" id="planta" role="tabpanel" aria-labelledby="planta-tab">
            <h4>Resumen de Planta</h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="card-summary">
                        <i class="fas fa-dollar-sign icon"></i>
                        <div>
                            <div class="title">Total Gastos</div>
                            <div class="value">
                                ${{ number_format($movimientos->where('categoria', 'planta')->sum('monto'), 2) }}
                            </div>
                            <div class="description">Gastos acumulados en planta este mes</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-summary">
                        <i class="fas fa-chart-line icon movement"></i>
                        <div>
                            <div class="title">Movimientos</div>
                            <div class="value">
                                {{ $movimientos->where('categoria', 'planta')->count() }}
                            </div>
                            <div class="description">Movimientos registrados en planta</div>
                        </div>
                    </div>
                </div>
            </div>
            <h4>Detalle de Movimientos</h4>
            <div class="details-section" id="planta-details-section">
                @foreach($movimientos->where('categoria', 'planta') as $mov)
                    <div class="details-item"
                        data-id="{{ $mov->id }}"
                        data-fecha="{{ $mov->fecha }}"
                        data-descripcion="{{ $mov->descripcion }}"
                        data-monto="{{ $mov->monto }}"
                        data-tipo="{{ $mov->tipo }}"
                        data-categoria="planta">
                        <i class="fas fa-seedling icon"></i>
                        <div class="info description">{{ $mov->descripcion }}</div>
                        <div class="info col-date">{{ \Carbon\Carbon::parse($mov->fecha)->format('d/m/Y') }}</div>
                        <div class="info col-amount">${{ number_format($mov->monto, 2) }}</div>
                        <div class="info col-type">{{ $mov->tipo }}</div>
                        <div class="actions">
                        <a href="{{ route('gastos-movimientos.edit', $mov->id) }}" class="btn btn-sm btn-info">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                            <form action="{{ url('/gastos-movimientos/' . $mov->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este movimiento?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="btn-add" data-toggle="modal" data-target="#movimientoEditModal" data-modal-type="add" data-categoria="planta">Agregar</button>
        </div>

        <!-- INSUMOS -->
        <div class="tab-pane fade" id="insumos" role="tabpanel" aria-labelledby="insumos-tab">
            <h4>Resumen de Insumos</h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="card-summary">
                        <i class="fas fa-dollar-sign icon"></i>
                        <div>
                            <div class="title">Total Gastos</div>
                            <div class="value">
                                ${{ number_format($movimientos->where('categoria', 'insumos')->sum('monto'), 2) }}
                            </div>
                            <div class="description">Gasto acumulado este mes</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-summary">
                        <i class="fas fa-chart-line icon movement"></i>
                        <div>
                            <div class="title">Movimientos</div>
                            <div class="value">
                                {{ $movimientos->where('categoria', 'insumos')->count() }}
                            </div>
                            <div class="description">Entradas y salidas registradas</div>
                        </div>
                    </div>
                </div>
            </div>
            <h4>Detalle de Insumos</h4>
            <div class="details-section" id="insumos-details-section">
                @foreach($movimientos->where('categoria', 'insumos') as $mov)
                    <div class="details-item"
                        data-id="{{ $mov->id }}"
                        data-fecha="{{ $mov->fecha }}"
                        data-descripcion="{{ $mov->descripcion }}"
                        data-monto="{{ $mov->monto }}"
                        data-tipo="{{ $mov->tipo }}"
                        data-categoria="insumos">
                        <i class="fas fa-flask icon"></i>
                        <div class="info description">{{ $mov->descripcion }}</div>
                        <div class="info col-date">{{ \Carbon\Carbon::parse($mov->fecha)->format('d/m/Y') }}</div>
                        <div class="info col-amount">${{ number_format($mov->monto, 2) }}</div>
                        <div class="info col-type">{{ $mov->tipo }}</div>
                        <div class="actions">
                        <a href="{{ route('gastos-movimientos.edit', $mov->id) }}" class="btn btn-sm btn-info">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                            <form action="{{ url('/gastos-movimientos/' . $mov->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este movimiento?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="btn-add" data-toggle="modal" data-target="#movimientoEditModal" data-modal-type="add" data-categoria="insumos">Agregar</button>
        </div>

        <!-- GASTOS EXTRAS -->
        <div class="tab-pane fade" id="gastosextras" role="tabpanel" aria-labelledby="gastosextras-tab">
            <h4>Resumen de Gastos Extras</h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="card-summary">
                        <i class="fas fa-dollar-sign icon"></i>
                        <div>
                            <div class="title">Total Gastos</div>
                            <div class="value">
                                ${{ number_format($movimientos->where('categoria', 'gastosextras')->sum('monto'), 2) }}
                            </div>
                            <div class="description">Gasto acumulado este mes</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-summary">
                        <i class="fas fa-chart-line icon movement"></i>
                        <div>
                            <div class="title">Movimientos</div>
                            <div class="value">
                                {{ $movimientos->where('categoria', 'gastosextras')->count() }}
                            </div>
                            <div class="description">Pagos y ajustes registrados</div>
                        </div>
                    </div>
                </div>
            </div>
            <h4>Detalle de Gastos Extras</h4>
            <div class="details-section" id="gastosextras-details-section">
                @foreach($movimientos->where('categoria', 'gastosextras') as $mov)
                    <div class="details-item"
                        data-id="{{ $mov->id }}"
                        data-fecha="{{ $mov->fecha }}"
                        data-descripcion="{{ $mov->descripcion }}"
                        data-monto="{{ $mov->monto }}"
                        data-tipo="{{ $mov->tipo }}"
                        data-categoria="gastosextras">
                        <i class="fas fa-money-bill-wave icon"></i>
                        <div class="info description">{{ $mov->descripcion }}</div>
                        <div class="info col-date">{{ \Carbon\Carbon::parse($mov->fecha)->format('d/m/Y') }}</div>
                        <div class="info col-amount">${{ number_format($mov->monto, 2) }}</div>
                        <div class="info col-type">{{ $mov->tipo }}</div>
                        <div class="actions">
                        <a href="{{ route('gastos-movimientos.edit', $mov->id) }}" class="btn btn-sm btn-info">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                            <form action="{{ url('/gastos-movimientos/' . $mov->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este movimiento?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="btn-add" data-toggle="modal" data-target="#movimientoEditModal" data-modal-type="add" data-categoria="gastosextras">Agregar</button>
        </div>

        <!-- CAMPO -->
        <div class="tab-pane fade" id="campo" role="tabpanel" aria-labelledby="campo-tab">
            <h4>Resumen de Campo</h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="card-summary">
                        <i class="fas fa-dollar-sign icon"></i>
                        <div>
                            <div class="title">Total Gastos</div>
                            <div class="value">
                                ${{ number_format($movimientos->where('categoria', 'campo')->sum('monto'), 2) }}
                            </div>
                            <div class="description">Gastos acumulados en campo este mes</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-summary">
                        <i class="fas fa-chart-line icon movement"></i>
                        <div>
                            <div class="title">Movimientos</div>
                            <div class="value">
                                {{ $movimientos->where('categoria', 'campo')->count() }}
                            </div>
                            <div class="description">Movimientos registrados en campo</div>
                        </div>
                    </div>
                </div>
            </div>
            <h4>Detalle de Movimientos</h4>
            <div class="details-section" id="campo-details-section">
                @foreach($movimientos->where('categoria', 'campo') as $mov)
                    <div class="details-item"
                        data-id="{{ $mov->id }}"
                        data-fecha="{{ $mov->fecha }}"
                        data-descripcion="{{ $mov->descripcion }}"
                        data-monto="{{ $mov->monto }}"
                        data-tipo="{{ $mov->tipo }}"
                        data-categoria="campo">
                        <i class="fas fa-tractor icon"></i>
                        <div class="info description">{{ $mov->descripcion }}</div>
                        <div class="info col-date">{{ \Carbon\Carbon::parse($mov->fecha)->format('d/m/Y') }}</div>
                        <div class="info col-amount">${{ number_format($mov->monto, 2) }}</div>
                        <div class="info col-type">{{ $mov->tipo }}</div>
                        <div class="actions">
                        <a href="{{ route('gastos-movimientos.edit', $mov->id) }}" class="btn btn-sm btn-info">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <form action="{{ url('/gastos-movimientos/' . $mov->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este movimiento?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="btn-add" data-toggle="modal" data-target="#movimientoEditModal" data-modal-type="add" data-categoria="campo">Agregar</button>
        </div>
    </div>
</div>


<div class="modal fade" id="movimientoEditModal" tabindex="-1" role="dialog" aria-labelledby="movimientoEditModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="movimientoEditModalLabel">Registrar Movimiento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editMovimientoForm" method="POST" action="/gastos-movimientos">
                        @csrf
                    <input type="hidden" id="movimiento-id" name="id">
                    <input type="hidden" id="movimiento-modal-type" name="modal_type">
                    <input type="hidden" id="movimiento-categoria" name="categoria">

                    <div class="form-group">
                        <label for="movimiento-fecha" class="form-label">Fecha</label>
                        <div class="input-group">
                            <input type="date" class="form-control" id="movimiento-fecha" name="fecha" required>
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                            </div>
                        </div>
                    </div>

                    <div id="general-movimiento-fields">
                        <div class="form-group">
                            <label for="movimiento-descripcion" class="form-label">Descripción</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="movimiento-descripcion" name="descripcion" placeholder="Descripción del movimiento" required>
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-info-circle"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="movimiento-monto" class="form-label">Monto</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="number" step="0.01" class="form-control" id="movimiento-monto" name="monto" placeholder="0.00" required>
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="movimiento-tipo" class="form-label">Tipo</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="movimiento-tipo" name="tipo" placeholder="Ej: Compra, Servicio, Entrada, Salida">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-tag"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>

                   
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" form="editMovimientoForm" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
$(document).ready(function() {
    // Oculta todos los campos específicos del modal
    function hideAllModalFields() {
        $('#general-movimiento-fields').hide();
        $('#nomina-modal-fields').hide();
    }

    // Muestra/oculta campos y cambia el título según la categoría y tipo de acción
    function setupModal(category, modalType) {
        hideAllModalFields();

        if (category === 'nomina') {
            $('#nomina-modal-fields').show();
            if (modalType === 'add') {
                $('#movimientoEditModalLabel').text('Registrar Pago de Nómina');
            } else {
                $('#movimientoEditModalLabel').text('Editar Pago de Nómina');
            }
        } else {
            $('#general-movimiento-fields').show();
            if (modalType === 'add') {
                $('#movimientoEditModalLabel').text('Registrar Movimiento de ' + category.charAt(0).toUpperCase() + category.slice(1));
            } else {
                $('#movimientoEditModalLabel').text('Editar Movimiento de ' + category.charAt(0).toUpperCase() + category.slice(1));
            }
        }
    }

    // Botón "Agregar"
    $('.btn-add').on('click', function() {
        const category = $(this).data('categoria');
        $('#movimiento-modal-type').val('add');
        $('#movimiento-categoria').val(category);

        setupModal(category, 'add');

        // Limpia los campos del formulario
        $('#movimiento-id').val('');
        $('#movimiento-fecha').val('');
        $('#movimiento-descripcion').val('');
        $('#movimiento-monto').val('');
        $('#movimiento-tipo').val('');
        $('#movimiento-nombre-empleado').val('');
        $('#movimiento-monto-nomina').val('');
        $('#movimiento-tipo-nomina').val('');
    });

    // Botón "Editar"
    $('.edit-item-btn').on('click', function() {
        const item = $(this).closest('.details-item');
        const id = item.data('id');
        const fecha = item.data('fecha');
        const categoria = item.data('categoria');

        $('#movimiento-id').val(id);
        $('#movimiento-modal-type').val('edit');
        $('#movimiento-categoria').val(categoria);

        setupModal(categoria, 'edit');
        $('#movimiento-fecha').val(fecha);

        if (categoria === 'nomina') {
            $('#movimiento-nombre-empleado').val(item.data('nombre'));
            $('#movimiento-monto-nomina').val(item.data('monto'));
            $('#movimiento-tipo-nomina').val(item.data('tipo'));
        } else {
            $('#movimiento-descripcion').val(item.data('descripcion'));
            $('#movimiento-monto').val(item.data('monto'));
            $('#movimiento-tipo').val(item.data('tipo'));
        }
    });

 
    // Cambia el modal según la pestaña activa
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        const activeTabId = $(e.target).attr('id');
        const category = activeTabId.replace('-tab', '');
        setupModal(category, 'add');
    });
});
</script>


</body>
</html>