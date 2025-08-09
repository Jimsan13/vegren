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

    <div class="tab-content" id="gastosMovimientosTabsContent">
        {{-- Content for "Efectivo" tab (image_35677f.png, image_356760.png, image_356742.png) --}}
        <div class="tab-pane fade {{ request()->is('gastos/efectivo') ? 'show active' : '' }}" id="efectivo" role="tabpanel" aria-labelledby="efectivo-tab">
            <h4 class="mb-3">Resumen de Efectivo</h4>
            <div class="row">
                <div class="col-md-4">
                    <div class="card-summary">
                        <i class="fas fa-money-bill-wave icon total-cash"></i>
                        <div>
                            <div class="title">Total de Efectivo</div>
                            <div class="value">$1,500,000</div>
                            <div class="description">Saldo actual en efectivo</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-summary">
                        <i class="fas fa-arrow-alt-circle-down icon income"></i>
                        <div>
                            <div class="title">Total Cobros</div>
                            <div class="value">$800,000</div>
                            <div class="description">Entradas de efectivo este mes</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-summary">
                        <i class="fas fa-arrow-alt-circle-up icon expense"></i>
                        <div>
                            <div class="title">Total Pagos</div>
                            <div class="value">$300,000</div>
                            <div class="description">Salidas de efectivo este mes</div>
                        </div>
                    </div>
                </div>
            </div>

            <h4 class="mb-3">Detalle de Movimientos</h4>
            <div class="details-section">
                {{-- Headers for columns --}}
                <div class="details-item fw-bold text-muted" style="border-bottom: 2px solid var(--medium-border);">
                    <div class="icon"></div> {{-- Placeholder for icon alignment --}}
                    <div class="info description">Descripción</div>
                    <div class="info col-beneficiary">Persona / Factura</div> {{-- Campo adicional sugerido --}}
                    <div class="info col-date">Fecha</div>
                    <div class="info col-type">Tipo</div>
                    <div class="info col-amount">Monto</div>
                    <div class="info col-status-text">Estado</div>
                    <div class="col-actions">Acciones</div>
                </div>
                {{-- Example movements (matching image_356760.png and image_356742.png) --}}
                <div class="details-item">
                    <i class="fas fa-money-check-alt icon"></i>
                    <div class="info description">Venta de Cosecha Maíz</div>
                    <div class="info col-beneficiary">Cliente A / Fact. 001</div> {{-- Ejemplo de uso --}}
                    <div class="info col-date">25/06/2024</div>
                    <div class="info col-type text-success">Cobro</div>
                    <div class="info col-amount">$150,000</div>
                    <div class="info col-status-text text-success">Pagado</div>
                    <div class="col-actions">
                        <button class="btn btn-info btn-sm" title="Editar"><i class="fas fa-pencil-alt"></i></button>
                        <button class="btn btn-danger btn-sm" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </div>
                <div class="details-item">
                    <i class="fas fa-hand-holding-usd icon"></i>
                    <div class="info description">Pago de Nómina Quincenal</div>
                    <div class="info col-beneficiary">Equipo / Nómina 2024</div> {{-- Ejemplo de uso --}}
                    <div class="info col-date">20/06/2024</div>
                    <div class="info col-type text-danger">Pago</div>
                    <div class="info col-amount">$45,000</div>
                    <div class="info col-status-text text-success">Pagado</div>
                    <div class="col-actions">
                        <button class="btn btn-info btn-sm" title="Editar"><i class="fas fa-pencil-alt"></i></button>
                        <button class="btn btn-danger btn-sm" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </div>
                <div class="details-item">
                    <i class="fas fa-truck-moving icon"></i>
                    <div class="info description">Compra de Fertilizante</div>
                    <div class="info col-beneficiary">Agro S.A. / Fact. F-005</div> {{-- Ejemplo de uso --}}
                    <div class="info col-date">18/06/2024</div>
                    <div class="info col-type text-danger">Pago</div>
                    <div class="info col-amount">$20,000</div>
                    <div class="info col-status-text text-success">Pagado</div>
                    <div class="col-actions">
                        <button class="btn btn-info btn-sm" title="Editar"><i class="fas fa-pencil-alt"></i></button>
                        <button class="btn btn-danger btn-sm" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </div>
                <div class="details-item">
                    <i class="fas fa-leaf icon"></i>
                    <div class="info description">Venta de Hortalizas</div>
                    <div class="info col-beneficiary">Mercado Local / Rem. 120</div> {{-- Ejemplo de uso --}}
                    <div class="info col-date">15/06/2024</div>
                    <div class="info col-type text-success">Cobro</div>
                    <div class="info col-amount">$8,500</div>
                    <div class="info col-status-text text-success">Pagado</div>
                    <div class="col-actions">
                        <button class="btn btn-info btn-sm" title="Editar"><i class="fas fa-pencil-alt"></i></button>
                        <button class="btn btn-danger btn-sm" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </div>
                {{-- Add more example movements as needed --}}
            </div>
            <button class="btn-add" data-toggle="modal" data-target="#addMovementModal" data-movement-type="efectivo">Agregar Movimiento</button>
        </div>

        {{-- Content for "Transferencia" tab --}}
        <div class="tab-pane fade {{ request()->is('gastos/transferencia') ? 'show active' : '' }}" id="transferencia" role="tabpanel" aria-labelledby="transferencia-tab">
            <h4 class="mb-3">Resumen de Transferencias</h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="card-summary">
                        <i class="fas fa-exchange-alt icon movement"></i>
                        <div>
                            <div class="title">Total de Transferencias Recibidas</div>
                            <div class="value">$1,200,000</div>
                            <div class="description">Entradas por transferencia este mes</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-summary">
                        <i class="fas fa-paper-plane icon expense"></i>
                        <div>
                            <div class="title">Total de Transferencias Enviadas</div>
                            <div class="value">$700,000</div>
                            <div class="description">Salidas por transferencia este mes</div>
                        </div>
                    </div>
                </div>
            </div>
            <h4 class="mb-3">Detalle de Transferencias</h4>
            <div class="details-section">
                {{-- Headers for columns --}}
                <div class="details-item fw-bold text-muted" style="border-bottom: 2px solid var(--medium-border);">
                    <div class="icon"></div> {{-- Placeholder for icon alignment --}}
                    <div class="info description">Descripción</div>
                    <div class="info col-beneficiary">Originador / Destino</div> {{-- Campo adicional sugerido --}}
                    <div class="info col-date">Fecha</div>
                    <div class="info col-type">Tipo</div>
                    <div class="info col-amount">Monto</div>
                    <div class="info col-status-text">Cuenta</div>
                    <div class="col-actions">Acciones</div>
                </div>
                <div class="details-item">
                    <i class="fas fa-university icon"></i>
                    <div class="info description">Pago a Proveedor Químicos</div>
                    <div class="info col-beneficiary">Químicos Global S.A.</div> {{-- Ejemplo de uso --}}
                    <div class="info col-date">24/06/2024</div>
                    <div class="info col-type text-danger">Envío</div>
                    <div class="info col-amount">$120,000</div>
                    <div class="info col-status-text">Banco Azteca</div>
                    <div class="col-actions">
                        <button class="btn btn-info btn-sm" title="Editar"><i class="fas fa-pencil-alt"></i></button>
                        <button class="btn btn-danger btn-sm" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </div>
                <div class="details-item">
                    <i class="fas fa-piggy-bank icon"></i>
                    <div class="info description">Depósito de Cliente</div>
                    <div class="info col-beneficiary">Cliente B</div> {{-- Ejemplo de uso --}}
                    <div class="info col-date">22/06/2024</div>
                    <div class="info col-type text-success">Recepción</div>
                    <div class="info col-amount">$250,000</div>
                    <div class="info col-status-text">BBVA</div>
                    <div class="col-actions">
                        <button class="btn btn-info btn-sm" title="Editar"><i class="fas fa-pencil-alt"></i></button>
                        <button class="btn btn-danger btn-sm" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </div>
            </div>
            <button class="btn-add" data-toggle="modal" data-target="#addMovementModal" data-movement-type="transferencia">Agregar Transferencia</button>
        </div>

        {{-- Content for "Cheque" tab --}}
        <div class="tab-pane fade {{ request()->is('gastos/cheque') ? 'show active' : '' }}" id="cheque" role="tabpanel" aria-labelledby="cheque-tab">
            <h4 class="mb-3">Resumen de Cheques</h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="card-summary">
                        <i class="fas fa-money-check icon total-cash"></i>
                        <div>
                            <div class="title">Cheques Emitidos</div>
                            <div class="value">5</div>
                            <div class="description">Número de cheques emitidos este mes</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-summary">
                        <i class="fas fa-file-invoice-dollar icon expense"></i>
                        <div>
                            <div class="title">Valor de Cheques Emitidos</div>
                            <div class="value">$180,000</div>
                            <div class="description">Suma total de cheques emitidos</div>
                        </div>
                    </div>
                </div>
            </div>
            <h4 class="mb-3">Detalle de Cheques</h4>
            <div class="details-section">
                {{-- Headers for columns --}}
                <div class="details-item fw-bold text-muted" style="border-bottom: 2px solid var(--medium-border);">
                    <div class="icon"></div> {{-- Placeholder for icon alignment --}}
                    <div class="info description">Concepto</div>
                    <div class="info col-beneficiary">Beneficiario</div> {{-- Campo adicional sugerido --}}
                    <div class="info col-date">Fecha</div>
                    <div class="info col-type">No. Cheque</div>
                    <div class="info col-amount">Monto</div>
                    <div class="info col-status-text">Estado</div>
                    <div class="col-actions">Acciones</div>
                </div>
                <div class="details-item">
                    <i class="fas fa-clipboard-check icon"></i>
                    <div class="info description">Pago de servicios de agua</div>
                    <div class="info col-beneficiary">Comisión de Agua</div> {{-- Ejemplo de uso --}}
                    <div class="info col-date">10/06/2024</div>
                    <div class="info col-type">001234</div>
                    <div class="info col-amount">$5,000</div>
                    <div class="info col-status-text text-success">Cobrado</div>
                    <div class="col-actions">
                        <button class="btn btn-info btn-sm" title="Editar"><i class="fas fa-pencil-alt"></i></button>
                        <button class="btn btn-danger btn-sm" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </div>
                <div class="details-item">
                    <i class="fas fa-times-circle icon"></i>
                    <div class="info description">Pago a contratista (Pendiente)</div>
                    <div class="info col-beneficiary">Ing. Obras S.A.</div> {{-- Ejemplo de uso --}}
                    <div class="info col-date">05/06/2024</div>
                    <div class="info col-type">001235</div>
                    <div class="info col-amount">$15,000</div>
                    <div class="info col-status-text text-warning">Pendiente</div>
                    <div class="col-actions">
                        <button class="btn btn-info btn-sm" title="Editar"><i class="fas fa-pencil-alt"></i></button>
                        <button class="btn btn-danger btn-sm" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </div>
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
                <form id="movementForm">
                    <div class="form-group">
                        <label for="movementDescription">Descripción:</label>
                        <input type="text" class="form-control" id="movementDescription" required>
                    </div>
                    <div class="form-group">
                        <label for="movementBeneficiary">Persona / Entidad:</label>
                        <input type="text" class="form-control" id="movementBeneficiary" placeholder="Ej: Cliente A, Agro S.A.">
                    </div>
                    <div class="form-group">
                        <label for="movementAmount">Monto:</label>
                        <input type="number" class="form-control" id="movementAmount" step="0.01" required>
                    </div>
                    <div class="form-group">
                        <label for="movementDate">Fecha:</label>
                        <input type="date" class="form-control" id="movementDate" required>
                    </div>
                    <div class="form-group" id="movementTypeGroup">
                        <label for="movementType">Tipo:</label>
                        <select class="form-control" id="movementType" required>
                            </select>
                    </div>
                    <div class="form-group" id="movementStatusGroup">
                        <label for="movementStatus">Estado:</label>
                        <select class="form-control" id="movementStatus">
                            <option value="Pagado">Pagado</option>
                            <option value="Pendiente">Pendiente</option>
                            <option value="Anulado">Anulado</option>
                        </select>
                    </div>
                    <div class="form-group" id="movementAccountGroup" style="display: none;">
                        <label for="movementAccount">Cuenta Bancaria:</label>
                        <input type="text" class="form-control" id="movementAccount" placeholder="Ej: BBVA, Banco Azteca">
                    </div>
                    <div class="form-group" id="movementCheckNumberGroup" style="display: none;">
                        <label for="movementCheckNumber">Número de Cheque:</label>
                        <input type="text" class="form-control" id="movementCheckNumber" placeholder="Ej: 001234">
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
    // Manually activate tab based on URL if coming directly to a specific tab route
    document.addEventListener('DOMContentLoaded', function() {
        var currentPath = window.location.pathname;
        var tabs = document.querySelectorAll('.gastos-tabs .nav-link');

        // Check if any tab matches the current URL path
        var anyTabActive = false;
        tabs.forEach(function(tab) {
            tab.classList.remove('active');
            tab.setAttribute('aria-selected', 'false');

            var tabHref = tab.getAttribute('href');
            // Check if the current path contains the tab's href, allowing for base paths like /gastos
            if (currentPath.includes(tabHref)) {
                tab.classList.add('active');
                tab.setAttribute('aria-selected', 'true');
                var tabPaneId = tab.getAttribute('href');
                document.querySelector(tabPaneId).classList.add('show', 'active');
                anyTabActive = true;
            } else {
                var tabPaneId = tab.getAttribute('href');
                if (document.querySelector(tabPaneId)) { // Check if pane exists before removing classes
                    document.querySelector(tabPaneId).classList.remove('show', 'active');
                }
            }
        });

        // Fallback: If no specific tab matches (e.g., just /gastos), activate the 'Efectivo' tab by default
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

    // Handle Bootstrap's tab switching logic via data-toggle
    $('#gastosMovimientosTabs a').on('click', function (e) {
        e.preventDefault();
        $(this).tab('show');
    });

    // Script para manejar el modal y sus campos según la pestaña activa
    $('#addMovementModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Botón que activó el modal
        var movementType = button.data('movement-type'); // Extrae la información de data-movement-type

        var modal = $(this);
        var modalTitle = modal.find('.modal-title');
        var movementTypeSelect = modal.find('#movementType');
        var movementAccountGroup = modal.find('#movementAccountGroup');
        var movementCheckNumberGroup = modal.find('#movementCheckNumberGroup');

        // Limpiar campos del formulario
        $('#movementForm')[0].reset();
        movementAccountGroup.hide();
        movementCheckNumberGroup.hide();
        movementTypeSelect.empty(); // Limpiar opciones de tipo

        // Personalizar el modal según el tipo de movimiento
        if (movementType === 'efectivo') {
            modalTitle.text('Agregar Nuevo Movimiento de Efectivo');
            movementTypeSelect.append('<option value="Cobro">Cobro</option>');
            movementTypeSelect.append('<option value="Pago">Pago</option>');
            // Ocultar campos específicos de otras pestañas
        } else if (movementType === 'transferencia') {
            modalTitle.text('Agregar Nueva Transferencia');
            movementTypeSelect.append('<option value="Envío">Envío</option>');
            movementTypeSelect.append('<option value="Recepción">Recepción</option>');
            movementAccountGroup.show(); // Mostrar campo de cuenta
        } else if (movementType === 'cheque') {
            modalTitle.text('Emitir Nuevo Cheque');
            movementTypeSelect.append('<option value="Emitido">Emitido</option>');
            movementCheckNumberGroup.show(); // Mostrar campo de número de cheque
        }
    });

    // Manejar el envío del formulario del modal (solo ejemplo, la lógica real iría aquí)
    $('#movementForm').on('submit', function(e) {
        e.preventDefault(); // Prevenir el envío real del formulario

        // Aquí podrías capturar los datos del formulario:
        var description = $('#movementDescription').val();
        var beneficiary = $('#movementBeneficiary').val();
        var amount = $('#movementAmount').val();
        var date = $('#movementDate').val();
        var type = $('#movementType').val();
        var status = $('#movementStatus').val();
        var account = $('#movementAccount').val(); // Solo si es transferencia
        var checkNumber = $('#movementCheckNumber').val(); // Solo si es cheque

        console.log("Datos del movimiento:", {
            description,
            beneficiary,
            amount,
            date,
            type,
            status,
            account,
            checkNumber
        });

        // En una aplicación real, aquí enviarías estos datos a tu backend
        // o los añadirías dinámicamente a la tabla (requiere más JS/manejo de DOM).

        // Cerrar el modal
        $('#addMovementModal').modal('hide');

        // Opcional: Mostrar un mensaje de éxito o actualizar la tabla
        alert('Movimiento guardado (simulado)! Revisa la consola para ver los datos.');
    });
</script>

</body>
</html>