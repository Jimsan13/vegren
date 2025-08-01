<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Movimientos Financieros</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
      @section('styles')
<link rel="stylesheet" href="{{ asset('css/efectivo.css') }}">
@endsection
</head>
<body>

<div class="container-fluid">
    <h3 class="fw-bold text-success mb-4">Gestión de Movimientos Financieros</h3>

    <ul class="nav nav-tabs mb-4 gastos-tabs" id="gastosMovimientosTabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link {{ request()->is('gastos/efectivo') ? 'active' : '' }}" id="efectivo-tab" data-toggle="tab" href="#efectivo" role="tab" aria-controls="efectivo" aria-selected="{{ request()->is('gastos/efectivo') ? 'true' : 'false' }}">
                Efectivo
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('gastos/transferencia') ? 'active' : '' }}" id="transferencia-tab" data-toggle="tab" href="#transferencia" role="tab" aria-controls="transferencia" aria-selected="{{ request()->is('gastos/transferencia') ? 'true' : 'false' }}">
                Transferencia
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('gastos/cheque') ? 'active' : '' }}" id="cheque-tab" data-toggle="tab" href="#cheque" role="tab" aria-controls="cheque" aria-selected="{{ request()->is('gastos/cheque') ? 'true' : 'false' }}">
                Cheque
            </a>
        </li>
    </ul>
    @props([
        'totalEfectivo',
        'totalCobrosEfectivo',
        'totalPagosEfectivo',
        'efectivos',
        'totalTransferenciasRecibidas',
        'totalTransferenciasEnviadas',
        'transferencias',
        'totalChequesEmitidos',
        'valorTotalChequesEmitidos',
        'cheques',
    ])

    <div class="tab-content" id="gastosMovimientosTabsContent">
    {{-- Efectivo --}}
    <div class="tab-pane fade {{ request()->is('gastos/efectivo') ? 'show active' : '' }}" id="efectivo" role="tabpanel" aria-labelledby="efectivo-tab">
        <h4 class="mb-3">Resumen de Efectivo</h4>
        <div class="row">
            <div class="col-md-4">
                <div class="card-summary">
                    <i class="fas fa-money-bill-wave icon total-cash"></i>
                    <div>
                        <div class="title">Total de Efectivo</div>
                        <div class="value">${{ number_format($totalEfectivo, 2) }}</div>
                        <div class="description">Saldo actual en efectivo</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-summary">
                    <i class="fas fa-arrow-alt-circle-down icon income"></i>
                    <div>
                        <div class="title">Total Cobros</div>
                        <div class="value">${{ number_format($totalCobrosEfectivo, 2) }}</div>
                        <div class="description">Entradas de efectivo este mes</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-summary">
                    <i class="fas fa-arrow-alt-circle-up icon expense"></i>
                    <div>
                        <div class="title">Total Pagos</div>
                        <div class="value">${{ number_format($totalPagosEfectivo, 2) }}</div>
                        <div class="description">Salidas de efectivo este mes</div>
                    </div>
                </div>
            </div>
        </div>

        <h4 class="mb-3">Detalle de Movimientos</h4>
        <div class="details-section">
            <div class="details-item fw-bold text-muted" style="border-bottom: 2px solid var(--medium-border);">
                <div class="icon"></div>
                <div class="info description">Descripción</div>
                <div class="info col-beneficiary">Persona / Entidad</div>
                <div class="info col-date">Fecha</div>
                <div class="info col-type">Tipo</div>
                <div class="info col-amount">Monto</div>
                <div class="info col-status-text">Estado</div>
                <div class="col-actions">Acciones</div>
            </div>
            @foreach ($efectivos as $mov)
            <div class="details-item">
                <div class="info description">{{ $mov->descripcion }}</div>
                <div class="info col-beneficiary">{{ $mov->beneficiario }}</div>
                <div class="info col-date">{{ \Carbon\Carbon::parse($mov->fecha)->format('d/m/Y') }}</div>
                <div class="info col-type {{ $mov->tipo == 'Cobro' ? 'text-success' : 'text-danger' }}">{{ $mov->tipo }}</div>
                <div class="info col-amount">${{ number_format($mov->monto, 2) }}</div>
                <div class="info col-status-text text-success">{{ $mov->estado }}</div>
                <div class="col-actions">
                    {{-- Editar --}}
                    <button 
                        class="btn btn-info btn-sm edit-btn"
                        data-id="{{ $mov->id }}"
                        data-descripcion="{{ $mov->descripcion }}"
                        data-beneficiario="{{ $mov->beneficiario }}"
                        data-monto="{{ $mov->monto }}"
                        data-fecha="{{ $mov->fecha }}"
                        data-tipo="{{ $mov->tipo }}"
                        data-estado="{{ $mov->estado }}"
                        data-cuenta="{{ $mov->cuenta }}"
                        data-numero_cheque="{{ $mov->numero_cheque }}"
                        data-origen="{{ $mov->origen }}"
                        data-toggle="modal"
                        data-target="#addMovementModal"
                        title="Editar"
                    >
                        <i class="fas fa-pencil-alt"></i>
                    </button>

                    {{-- Eliminar --}}
                    <button 
                        class="btn btn-danger btn-sm delete-btn"
                        data-id="{{ $mov->id }}"
                        title="Eliminar"
                    >
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </div>
            </div>
            @endforeach


        </div>
        <button class="btn-add" data-toggle="modal" data-target="#addMovementModal" data-movement-type="efectivo">Agregar Movimiento</button>
    </div>

    {{-- Transferencia --}}
    <div class="tab-pane fade {{ request()->is('gastos/transferencia') ? 'show active' : '' }}" id="transferencia" role="tabpanel" aria-labelledby="transferencia-tab">
        <h4 class="mb-3">Resumen de Transferencias</h4>
        <div class="row">
            <div class="col-md-6">
                <div class="card-summary">
                    <i class="fas fa-exchange-alt icon movement"></i>
                    <div>
                        <div class="title">Total de Transferencias Recibidas</div>
                        <div class="value">${{ number_format($totalTransferenciasRecibidas, 2) }}</div>
                        <div class="description">Entradas por transferencia este mes</div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-summary">
                    <i class="fas fa-paper-plane icon expense"></i>
                    <div>
                        <div class="title">Total de Transferencias Enviadas</div>
                        <div class="value">${{ number_format($totalTransferenciasEnviadas, 2) }}</div>
                        <div class="description">Salidas por transferencia este mes</div>
                    </div>
                </div>
            </div>
        </div>
        <h4 class="mb-3">Detalle de Transferencias</h4>
        <div class="details-section">
            <div class="details-item fw-bold text-muted" style="border-bottom: 2px solid var(--medium-border);">
                <div class="icon"></div>
                <div class="info description">Descripción</div>
                <div class="info col-beneficiary">Persona / Entidad:</div>
                <div class="info col-date">Fecha</div>
                <div class="info col-type">Tipo</div>
                <div class="info col-amount">Monto</div>
                <div class="info col-status-text">Cuenta</div>
                <div class="col-actions">Acciones</div>
            </div>
            @foreach ($transferencias as $mov)
            <div class="details-item">
                <div class="info description">{{ $mov->descripcion }}</div>
                <div class="info col-beneficiary">{{ $mov->beneficiario }}</div>
                <div class="info col-date">{{ \Carbon\Carbon::parse($mov->fecha)->format('d/m/Y') }}</div>
                <div class="info col-type {{ $mov->tipo == 'Recepción' ? 'text-success' : 'text-danger' }}">{{ $mov->tipo }}</div>
                <div class="info col-amount">${{ number_format($mov->monto, 2) }}</div>
                <div class="info col-status-text">{{ $mov->estado }}</div>
                <div class="col-actions">
                    {{-- Editar --}}
                    <button 
                        class="btn btn-info btn-sm edit-btn"
                        data-id="{{ $mov->id }}"
                        data-descripcion="{{ $mov->descripcion }}"
                        data-beneficiario="{{ $mov->beneficiario }}"
                        data-monto="{{ $mov->monto }}"
                        data-fecha="{{ $mov->fecha }}"
                        data-tipo="{{ $mov->tipo }}"
                        data-estado="{{ $mov->estado }}"
                        data-cuenta="{{ $mov->cuenta }}"
                        data-numero_cheque="{{ $mov->numero_cheque }}"
                        data-origen="{{ $mov->origen }}"
                        data-toggle="modal"
                        data-target="#addMovementModal"
                        title="Editar"
                    >
                        <i class="fas fa-pencil-alt"></i>
                    </button>

                    {{-- Eliminar --}}
                    <button 
                        class="btn btn-danger btn-sm delete-btn"
                        data-id="{{ $mov->id }}"
                        title="Eliminar"
                    >
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </div>
            </div>
            @endforeach



        </div>
        <button class="btn-add" data-toggle="modal" data-target="#addMovementModal" data-movement-type="transferencia">Agregar Transferencia</button>
    </div>

    {{-- Cheque --}}
    <div class="tab-pane fade {{ request()->is('gastos/cheque') ? 'show active' : '' }}" id="cheque" role="tabpanel" aria-labelledby="cheque-tab">
        <h4 class="mb-3">Resumen de Cheques</h4>
        <div class="row">
            <div class="col-md-6">
                <div class="card-summary">
                    <i class="fas fa-money-check icon total-cash"></i>
                    <div>
                        <div class="title">Cheques Emitidos</div>
                        <div class="value">{{ $totalChequesEmitidos }}</div>
                        <div class="description">Número de cheques emitidos este mes</div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-summary">
                    <i class="fas fa-file-invoice-dollar icon expense"></i>
                    <div>
                        <div class="title">Valor de Cheques Emitidos</div>
                        <div class="value">${{ number_format($valorTotalChequesEmitidos, 2) }}</div>
                        <div class="description">Suma total de cheques emitidos</div>
                    </div>
                </div>
            </div>
        </div>
        <h4 class="mb-3">Detalle de Cheques</h4>
        <div class="details-section">
            <div class="details-item fw-bold text-muted" style="border-bottom: 2px solid var(--medium-border);">
                <div class="icon"></div>
                <div class="info description">Concepto</div>
                <div class="info col-beneficiary">Persona / Entidad:</div>
                <div class="info col-date">Fecha</div>
                <div class="info col-type">No. Cheque</div>
                <div class="info col-amount">Monto</div>
                <div class="info col-status-text">Estado</div>
                <div class="col-actions">Acciones</div>
            </div>

        @foreach ($cheques as $mov)
        <div class="details-item">
            <div class="info description">{{ $mov->descripcion }}</div>
            <div class="info col-beneficiary">{{ $mov->beneficiario }}</div>
            <div class="info col-date">{{ \Carbon\Carbon::parse($mov->fecha)->format('d/m/Y') }}</div>
            <div class="info col-type">{{ $mov->numero_cheque }}</div>
            <div class="info col-amount">${{ number_format($mov->monto, 2) }}</div>
            <div class="info col-status-text {{ $mov->estado == 'Cobrado' ? 'text-success' : 'text-warning' }}">{{ $mov->estado }}</div>
            <div class="col-actions">
                {{-- Editar --}}
                <button 
                    class="btn btn-info btn-sm edit-btn"
                    data-id="{{ $mov->id }}"
                    data-descripcion="{{ $mov->descripcion }}"
                    data-beneficiario="{{ $mov->beneficiario }}"
                    data-monto="{{ $mov->monto }}"
                    data-fecha="{{ $mov->fecha }}"
                    data-tipo="{{ $mov->tipo }}"
                    data-estado="{{ $mov->estado }}"
                    data-cuenta="{{ $mov->cuenta }}"
                    data-numero_cheque="{{ $mov->numero_cheque }}"
                    data-origen="{{ $mov->origen }}"
                    data-toggle="modal"
                    data-target="#addMovementModal"
                    title="Editar"
                >
                    <i class="fas fa-pencil-alt"></i>
                </button>

                {{-- Eliminar --}}
                <button 
                    class="btn btn-danger btn-sm delete-btn"
                    data-id="{{ $mov->id }}"
                    title="Eliminar"
                >
                    <i class="fas fa-trash-alt"></i>
                </button>
            </div>
        </div>
        @endforeach



        </div>
        <button class="btn-add" data-toggle="modal" data-target="#addMovementModal" data-movement-type="cheque">Emitir Cheque</button>
    </div>


    </div>
</div>

<div class="modal fade" id="addMovementModal" tabindex="-1" aria-labelledby="addMovementModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addMovementModalLabel">Agregar Nuevo Movimiento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="movementForm" method="POST" action="{{ route('movimientos.store') }}">
                    @csrf
                    <input type="hidden" name="origen" id="movementOrigin">

                    <div class="form-group">
                        <label for="movementDescription">Descripción:</label>
                        <input type="text" class="form-control" id="movementDescription" name="descripcion" required>
                    </div>
                    <div class="form-group">
                        <label for="movementBeneficiary">Persona / Entidad:</label>
                        <input type="text" class="form-control" id="movementBeneficiary" name="beneficiario" placeholder="Ej: Cliente A, Agro S.A.">
                    </div>
                    <div class="form-group">
                        <label for="movementAmount">Monto:</label>
                        <input type="number" class="form-control" id="movementAmount" name="monto" step="0.01" required>
                    </div>
                    <div class="form-group">
                        <label for="movementDate">Fecha:</label>
                        <input type="date" class="form-control" id="movementDate" name="fecha" required>
                    </div>
                    <div class="form-group" id="movementTypeGroup">
                        <label for="movementType">Tipo:</label>
                        <select class="form-control" id="movementType" name="tipo" required></select>
                    </div>
                    <div class="form-group" id="movementStatusGroup">
                        <label for="movementStatus">Estado:</label>
                        <select class="form-control" id="movementStatus" name="estado">
                            <option value="Pagado">Pagado</option>
                            <option value="Pendiente">Pendiente</option>
                            <option value="Anulado">Anulado</option>
                        </select>
                    </div>
                    <div class="form-group" id="movementAccountGroup" style="display: none;">
                        <label for="movementAccount">Cuenta Bancaria:</label>
                        <input type="text" class="form-control" id="movementAccount" name="cuenta" placeholder="Ej: BBVA, Banco Azteca">
                    </div>
                    <div class="form-group" id="movementCheckNumberGroup" style="display: none;">
                        <label for="movementCheckNumber">Número de Cheque:</label>
                        <input type="text" class="form-control" id="movementCheckNumber" name="numero_cheque" placeholder="Ej: 001234">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary" form="movementForm">Guardar Movimiento</button>
            </div>
        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        var currentPath = window.location.pathname;
        var tabs = document.querySelectorAll('.gastos-tabs .nav-link');

        var anyTabActive = false;
        tabs.forEach(function (tab) {
            tab.classList.remove('active');
            tab.setAttribute('aria-selected', 'false');

            var tabHref = tab.getAttribute('href');
            if (currentPath.includes(tabHref)) {
                tab.classList.add('active');
                tab.setAttribute('aria-selected', 'true');
                var tabPaneId = tab.getAttribute('href');
                document.querySelector(tabPaneId).classList.add('show', 'active');
                anyTabActive = true;
            } else {
                var tabPaneId = tab.getAttribute('href');
                if (document.querySelector(tabPaneId)) {
                    document.querySelector(tabPaneId).classList.remove('show', 'active');
                }
            }
        });

        if (!anyTabActive) {
            var defaultTab = document.getElementById('efectivo-tab');
            if (defaultTab) {
                defaultTab.classList.add('active');
                defaultTab.setAttribute('aria-selected', 'true');
                var defaultTabPane = document.querySelector(defaultTab.getAttribute('href'));
                if (defaultTabPane) {
                    defaultTabPane.classList.add('show', 'active');
                }
            }
        }
    });

    $('#gastosMovimientosTabs a').on('click', function (e) {
        e.preventDefault();
        $(this).tab('show');
    });

    // Abrir modal para crear nuevo movimiento (por botón "Agregar")
    $('#addMovementModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var movementType = button.data('movement-type');

        var modal = $(this);
        var modalTitle = modal.find('.modal-title');
        var movementTypeSelect = modal.find('#movementType');
        var movementAccountGroup = modal.find('#movementAccountGroup');
        var movementCheckNumberGroup = modal.find('#movementCheckNumberGroup');

        // Reset form al abrir
        $('#movementForm')[0].reset();
        movementAccountGroup.hide();
        movementCheckNumberGroup.hide();
        movementTypeSelect.empty();

        // Set hidden input para "origen"
        $('#movementOrigin').val(movementType);

        if (movementType === 'efectivo') {
            modalTitle.text('Agregar Nuevo Movimiento de Efectivo');
            movementTypeSelect.append('<option value="Cobro">Cobro</option>');
            movementTypeSelect.append('<option value="Pago">Pago</option>');
        } else if (movementType === 'transferencia') {
            modalTitle.text('Agregar Nueva Transferencia');
            movementTypeSelect.append('<option value="Envío">Envío</option>');
            movementTypeSelect.append('<option value="Recepción">Recepción</option>');
            movementAccountGroup.show();
        } else if (movementType === 'cheque') {
            modalTitle.text('Emitir Nuevo Cheque');
            movementTypeSelect.append('<option value="Emitido">Emitido</option>');
            movementCheckNumberGroup.show();
        }

        // Botón guardar para creación
        modal.find('button[type="submit"]').text('Guardar Movimiento');

        // Form action a ruta store
        $('#movementForm').attr('action', originalAction);

        // Quitar método PUT si existe
        $('#movementForm').find('input[name="_method"]').remove();
    });

    let originalAction = "{{ route('movimientos.store') }}";

    // Delegación para botón Editar (importante para carga dinámica)
    $(document).on('click', '.edit-btn', function () {
        const modal = $('#addMovementModal');
        const form = $('#movementForm');

        // Cambiar action y agregar _method PUT
        const id = $(this).data('id');
        form.attr('action', `/movimientos/${id}`);

        if (!form.find('input[name="_method"]').length) {
            form.append('<input type="hidden" name="_method" value="PUT">');
        } else {
            form.find('input[name="_method"]').val('PUT');
        }

        // Rellenar campos con datos del botón
        $('#movementDescription').val($(this).data('descripcion'));
        $('#movementBeneficiary').val($(this).data('beneficiario'));
        $('#movementAmount').val($(this).data('monto'));
        $('#movementDate').val($(this).data('fecha'));
        $('#movementStatus').val($(this).data('estado'));
        $('#movementAccount').val($(this).data('cuenta'));
        $('#movementCheckNumber').val($(this).data('numero_cheque'));
        $('#movementOrigin').val($(this).data('origen'));

        // Mostrar campos condicionales y llenar select tipo
        const origen = $(this).data('origen');
        const movementAccountGroup = $('#movementAccountGroup');
        const movementCheckNumberGroup = $('#movementCheckNumberGroup');
        const movementTypeSelect = $('#movementType');

        movementAccountGroup.hide();
        movementCheckNumberGroup.hide();
        movementTypeSelect.empty();

        if (origen === 'efectivo') {
            movementTypeSelect.append('<option value="Cobro">Cobro</option><option value="Pago">Pago</option>');
        } else if (origen === 'transferencia') {
            movementTypeSelect.append('<option value="Envío">Envío</option><option value="Recepción">Recepción</option>');
            movementAccountGroup.show();
        } else if (origen === 'cheque') {
            movementTypeSelect.append('<option value="Emitido">Emitido</option>');
            movementCheckNumberGroup.show();
        }

        movementTypeSelect.val($(this).data('tipo'));

        // Cambiar título y botón
        modal.find('.modal-title').text('Editar Movimiento');
        modal.find('button[type="submit"]').text('Actualizar Movimiento');

        // Mostrar modal explícitamente
        modal.modal('show');
    });

    // Reset modal al cerrar
    $('#addMovementModal').on('hidden.bs.modal', function () {
        const form = $('#movementForm');
        form.attr('action', originalAction);
        form.find('input[name="_method"]').remove();
        form[0].reset();

        $('#movementAccountGroup').hide();
        $('#movementCheckNumberGroup').hide();

        $(this).find('.modal-title').text('Agregar Nuevo Movimiento');
        $(this).find('button[type="submit"]').text('Guardar Movimiento');
    });

    // Eliminar Movimiento
    $(document).on('click', '.delete-btn', function () {
        if (confirm('¿Estás seguro de eliminar este movimiento?')) {
            const id = $(this).data('id');
            const form = $('<form>', {
                method: 'POST',
                action: `/movimientos/${id}`
            });

            const token = '{{ csrf_token() }}';

            form.append($('<input>', {
                type: 'hidden',
                name: '_token',
                value: token
            }));

            form.append($('<input>', {
                type: 'hidden',
                name: '_method',
                value: 'DELETE'
            }));

            $('body').append(form);
            form.submit();
        }
    });
</script>



</body>
</html>