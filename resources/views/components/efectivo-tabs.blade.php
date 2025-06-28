<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gastos y Movimientos</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Global styles based on your example */
        body {
            font-family: sans-serif;
            background-color: #f0fff0; /* Light green background to match image */
        }
        .container-fluid {
            padding: 30px;
        }

        /* Tabs styling from your example */
        .gastos-tabs .nav-link { /* Original class name retained */
            color: #495057;
            border: 1px solid transparent;
            border-top-left-radius: .25rem;
            border-top-right-radius: .25rem;
            padding: .5rem 1rem;
        }
        .gastos-tabs .nav-link.active { /* Original class name retained */
            color: #28a745; /* Green for active tab */
            background-color: #fff;
            border-color: #dee2e6 #dee2e6 #fff;
            font-weight: bold;
        }

        /* Summary Card styling from your example */
        .card-summary {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,.05);
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .card-summary .icon {
            font-size: 2.5em;
            margin-right: 15px;
            color: #28a745; /* Green icon */
        }
        .card-summary .icon.movement {
            color: #17a2b8; /* Blue-green for movements (e.g., total cobro/pagos) */
        }
        .card-summary .icon.total-cash { /* Specific for total efectivo */
            color: #ffc107; /* Yellow */
        }
        .card-summary .icon.income { /* Specific for Cobro */
            color: #28a745; /* Green */
        }
        .card-summary .icon.expense { /* Specific for Pago */
            color: #dc3545; /* Red */
        }
        .card-summary .title {
            font-size: 0.9em;
            color: #6c757d;
            margin-bottom: 5px;
        }
        .card-summary .value {
            font-size: 1.5em;
            font-weight: bold;
            color: #343a40;
        }
        .card-summary .description {
            font-size: 0.8em;
            color: #6c757d;
        }

        /* Details Section (Table-like list) styling from your example */
        .details-section {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,.05);
        }
        .details-item {
            display: flex;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }
        .details-item:last-child {
            border-bottom: none;
        }
        .details-item .icon {
            font-size: 1.5em;
            margin-right: 15px;
            color: #6c757d;
            width: 30px;
            text-align: center;
        }
        .details-item .info {
            flex-grow: 1;
        }
        .details-item .info.description {
            flex-grow: 2; /* Make description column wider */
            min-width: 180px;
        }
        .details-item .col-date, .details-item .col-amount, .details-item .col-type, .details-item .col-status-text {
            width: 120px; /* Fixed width for date, amount, type, status */
            text-align: right;
            white-space: nowrap; /* Prevent text wrapping */
        }
        .details-item .col-actions { /* For edit/delete buttons */
            width: 80px;
            text-align: right;
            display: flex;
            justify-content: flex-end;
            flex-shrink: 0;
        }
        .details-item .col-actions .btn {
            font-size: 0.9em;
            padding: .3em .6em;
            margin-left: 5px; /* Spacing between buttons */
        }

        /* Add button styling from your example */
        .btn-add {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1.1em;
            cursor: pointer;
            margin-top: 20px;
            display: block;
            margin-left: auto;
            width: fit-content;
        }
        .btn-add:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <h3 class="fw-bold text-success mb-4"></h3>

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
                <div class="details-item fw-bold text-muted" style="border-bottom: 2px solid #ddd;">
                    <div class="icon"></div> {{-- Placeholder for icon alignment --}}
                    <div class="info description">Descripción</div>
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
            <button class="btn-add">Agregar Movimiento</button>
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
                <div class="details-item fw-bold text-muted" style="border-bottom: 2px solid #ddd;">
                    <div class="icon"></div> {{-- Placeholder for icon alignment --}}
                    <div class="info description">Descripción</div>
                    <div class="info col-date">Fecha</div>
                    <div class="info col-type">Tipo</div>
                    <div class="info col-amount">Monto</div>
                    <div class="info col-status-text">Cuenta</div>
                    <div class="col-actions">Acciones</div>
                </div>
                <div class="details-item">
                    <i class="fas fa-university icon"></i>
                    <div class="info description">Pago a Proveedor Químicos</div>
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
            <button class="btn-add">Agregar Transferencia</button>
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
                <div class="details-item fw-bold text-muted" style="border-bottom: 2px solid #ddd;">
                    <div class="icon"></div> {{-- Placeholder for icon alignment --}}
                    <div class="info description">Beneficiario / Concepto</div>
                    <div class="info col-date">Fecha</div>
                    <div class="info col-type">No. Cheque</div>
                    <div class="info col-amount">Monto</div>
                    <div class="info col-status-text">Estado</div>
                    <div class="col-actions">Acciones</div>
                </div>
                <div class="details-item">
                    <i class="fas fa-clipboard-check icon"></i>
                    <div class="info description">Pago de servicios de agua</div>
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
            <button class="btn-add">Emitir Cheque</button>
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
</script>

</body>
</html>