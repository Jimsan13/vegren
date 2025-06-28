<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Módulo de Almacén</title>
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
        .almacen-tabs .nav-link { /* Changed class from gastos-tabs to almacen-tabs */
            color: #495057;
            border: 1px solid transparent;
            border-top-left-radius: .25rem;
            border-top-right-radius: .25rem;
            padding: .5rem 1rem;
        }
        .almacen-tabs .nav-link.active { /* Changed class from gastos-tabs to almacen-tabs */
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
            color: #17a2b8; /* Blue-green for movements */
        }
        .card-summary .icon.employees {
            color: #28a745; /* Green for employees icon (retained from your example) */
        }
        /* Specific icon color for Credito acumulado card in Almacén */
        .card-summary .icon.credit { /* Added for credit icon in Almacén */
             color: #ffc107; /* Yellowish for credit, like in your image */
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
            /* Added min-width to ensure alignment, adjust as needed */
            min-width: 120px; /* For date/amount/type columns */
        }
        .details-item .info.description {
            flex-grow: 2; /* Make description column wider */
            min-width: 180px;
        }
        .details-item .col-name {
            width: 150px; /* Fixed width for name column */
        }
        .details-item .col-date, .details-item .col-amount, .details-item .col-type {
            width: 120px; /* Fixed width for date, amount, type */
            text-align: right;
        }
        /* Specific widths for "Insumo por Proveedor" list to match image */
        .details-item .col-proveedor { /* New column for Proveedor tab */
            flex-grow: 1;
            min-width: 150px;
            font-weight: bold;
        }
        .details-item .col-credit { /* New column for Crédito */
            width: 150px;
            text-align: right;
        }
        .details-item .col-status { /* New column for Status */
            width: 100px;
            text-align: right;
            font-weight: bold;
        }
        .details-item .col-actions { /* For edit/delete buttons */
            width: 80px;
            text-align: right;
            display: flex;
            justify-content: flex-end;
        }
        .details-item .col-actions .btn {
            font-size: 0.9em;
            padding: .3em .6em;
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

        /* Specific styles for input groups in "Compra de Insumos" tab */
        .form-label {
            font-weight: bold;
            color: #343a40;
        }
        .input-group-text {
            background-color: #e9ecef;
            border: 1px solid #ced4da;
        }
        .input-group .form-control {
            border-right: none;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <h3 class="fw-bold text-success mb-4">Módulo de Almacén</h3>

    <ul class="nav nav-tabs mb-4 almacen-tabs" id="almacenTabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link {{ request()->is('almacen/compra-insumos') ? 'active' : '' }}" id="compraInsumos-tab" data-toggle="tab" href="#compraInsumos" role="tab" aria-controls="compraInsumos" aria-selected="{{ request()->is('almacen/compra-insumos') ? 'true' : 'false' }}">
                Compra de Insumos
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('almacen/resumen') ? 'active' : '' }}" id="resumen-tab" data-toggle="tab" href="#resumen" role="tab" aria-controls="resumen" aria-selected="{{ request()->is('almacen/resumen') ? 'true' : 'false' }}">
                Resumen
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('almacen/insumo-por-proveedor') ? 'active' : '' }}" id="insumoProveedor-tab" data-toggle="tab" href="#insumoProveedor" role="tab" aria-controls="insumoProveedor" aria-selected="{{ request()->is('almacen/insumo-por-proveedor') ? 'true' : 'false' }}">
                Insumo por Proveedor
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('almacen/historico') ? 'active' : '' }}" id="historico-tab" data-toggle="tab" href="#historico" role="tab" aria-controls="historico" aria-selected="{{ request()->is('almacen/historico') ? 'true' : 'false' }}">
                Histórico
            </a>
        </li>
    </ul>

    <div class="tab-content" id="almacenTabsContent">
        {{-- Content for "Compra de Insumos" tab (image_346c3d.png) --}}
        <div class="tab-pane fade {{ request()->is('almacen/compra-insumos') ? 'show active' : '' }}" id="compraInsumos" role="tabpanel" aria-labelledby="compraInsumos-tab">
            <div class="card shadow-sm border-0 p-4 mb-4">
                <h5 class="mb-3 fw-bold">Compra de Insumos</h5>
                <div class="row g-3 mb-4">
                    <div class="col-md-6 col-lg-4">
                        <label for="fechaInsumo" class="form-label">Fecha</label>
                        <div class="input-group">
                            <input type="date" class="form-control" id="fechaInsumo" placeholder="Selecciona fecha">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <label for="numeroNota" class="form-label">Nota</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="numeroNota" placeholder="Número de nota">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-receipt"></i></span>
                            </div>
                        </div>
                    </div>
                </div>

                <h6 class="fw-bold mb-3">Detalle de insumos</h6>
                <div class="details-section">
                    {{-- Example item 1 for "Detalle de insumos" --}}
                    <div class="details-item">
                        <i class="fas fa-box-open icon"></i>
                        <div class="info description">Fertilizante Premium</div>
                        <div class="info col-date">15/06/2024</div>
                        <div class="info col-amount">$5,000.00</div>
                        <div class="info col-type">Compra</div>
                         <div class="col-actions">
                            <button class="btn btn-info btn-sm me-1"><i class="fas fa-pencil-alt"></i></button>
                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                        </div>
                    </div>
                    {{-- Example item 2 --}}
                    <div class="details-item">
                        <i class="fas fa-seedling icon"></i>
                        <div class="info description">Semillas de Maíz Híbrido</div>
                        <div class="info col-date">10/06/2024</div>
                        <div class="info col-amount">$8,200.00</div>
                        <div class="info col-type">Compra</div>
                         <div class="col-actions">
                            <button class="btn btn-info btn-sm me-1"><i class="fas fa-pencil-alt"></i></button>
                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                        </div>
                    </div>
                    {{-- Example item 3 --}}
                    <div class="details-item">
                        <i class="fas fa-flask icon"></i>
                        <div class="info description">Herbicida No Selectivo</div>
                        <div class="info col-date">08/06/2024</div>
                        <div class="info col-amount">$3,100.00</div>
                        <div class="info col-type">Compra</div>
                         <div class="col-actions">
                            <button class="btn btn-info btn-sm me-1"><i class="fas fa-pencil-alt"></i></button>
                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                        </div>
                    </div>
                    {{-- You would loop through your actual insumo data here --}}
                </div>
                <button class="btn-add">Agregar Insumo</button>
            </div>
        </div>

        {{-- Content for "Resumen" tab --}}
        <div class="tab-pane fade {{ request()->is('almacen/resumen') ? 'show active' : '' }}" id="resumen" role="tabpanel" aria-labelledby="resumen-tab">
            <div class="card shadow-sm border-0 p-4">
                <h5 class="mb-3 fw-bold">Resumen General de Almacén</h5>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-summary">
                            <i class="fas fa-boxes icon"></i>
                            <div>
                                <div class="title">Total de Insumos en Stock</div>
                                <div class="value">1,500 Unidades</div>
                                <div class="description">Cantidad total de productos en almacén</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-summary">
                            <i class="fas fa-dollar-sign icon movement"></i>
                            <div>
                                <div class="title">Valor Total del Inventario</div>
                                <div class="value">$2,500,000</div>
                                <div class="description">Valor estimado de todos los insumos</div>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="text-muted">Aquí se podría integrar un gráfico de existencias por categoría o un listado de los insumos más críticos.</p>
            </div>
        </div>

        {{-- Content for "Insumo por Proveedor" tab (image_346c1a.png, image_346bfb.png) --}}
        <div class="tab-pane fade {{ request()->is('almacen/insumo-por-proveedor') ? 'show active' : '' }}" id="insumoProveedor" role="tabpanel" aria-labelledby="insumoProveedor-tab">
            <div class="card shadow-sm border-0 p-4 mb-4">
                <h5 class="mb-3 fw-bold">Insumo por Proveedor</h5>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-summary">
                            <i class="fas fa-money-check-alt icon credit"></i> {{-- Changed icon and added credit class --}}
                            <div>
                                <div class="title">Crédito Acumulado</div>
                                <div class="value">$1,250,000</div>
                                <div class="description">Suma total de créditos con proveedores</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-summary">
                            <i class="fas fa-people-carry icon movement"></i> {{-- Changed icon --}}
                            <div>
                                <div class="title">Proveedores Activos</div>
                                <div class="value">15</div>
                                <div class="description">Número de proveedores con los que trabajas</div>
                            </div>
                        </div>
                    </div>
                </div>
                <h6 class="fw-bold mb-3">Detalle por Proveedor</h6>
                <div class="details-section">
                    {{-- Headers for columns --}}
                    <div class="details-item fw-bold text-muted" style="border-bottom: 2px solid #ddd;">
                        <div class="icon"></div>
                        <div class="info col-proveedor">Proveedor</div>
                        <div class="info col-credit">Crédito</div>
                        <div class="info col-status">Estado</div>
                        <div class="col-actions">Acciones</div>
                    </div>
                    {{-- Example item 1 for "Detalle por Proveedor" --}}
                    <div class="details-item">
                        <i class="fas fa-industry icon"></i>
                        <div class="info col-proveedor">Agro Suministros S.A.</div>
                        <div class="info col-credit">$500,000.00</div>
                        <div class="info col-status text-success">Activo</div>
                        <div class="col-actions">
                            <button class="btn btn-info btn-sm me-1"><i class="fas fa-pencil-alt"></i></button>
                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                        </div>
                    </div>
                    {{-- Example item 2 --}}
                    <div class="details-item">
                        <i class="fas fa-building icon"></i>
                        <div class="info col-proveedor">Fertiliza MX</div>
                        <div class="info col-credit">$350,000.00</div>
                        <div class="info col-status text-warning">Pendiente</div>
                        <div class="col-actions">
                            <button class="btn btn-info btn-sm me-1"><i class="fas fa-pencil-alt"></i></button>
                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                        </div>
                    </div>
                    {{-- Example item 3 --}}
                    <div class="details-item">
                        <i class="fas fa-truck-loading icon"></i>
                        <div class="info col-proveedor">Insumos del Campo S.A. de C.V.</div>
                        <div class="info col-credit">$400,000.00</div>
                        <div class="info col-status text-success">Activo</div>
                        <div class="col-actions">
                            <button class="btn btn-info btn-sm me-1"><i class="fas fa-pencil-alt"></i></button>
                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                        </div>
                    </div>
                    {{-- You would loop through your actual supplier data here --}}
                </div>
                <button class="btn-add">Agregar Proveedor</button>
            </div>
        </div>

        {{-- Content for "Histórico" tab --}}
        <div class="tab-pane fade {{ request()->is('almacen/historico') ? 'show active' : '' }}" id="historico" role="tabpanel" aria-labelledby="historico-tab">
            <div class="card shadow-sm border-0 p-4">
                <h5 class="mb-3 fw-bold">Histórico de Movimientos de Almacén</h5>
                <p class="text-muted">Aquí se mostraría el historial detallado de todos los movimientos de insumos y proveedores a lo largo del tiempo, quizás con opciones de filtrado por fecha o tipo de movimiento.</p>
                {{-- Example of historical details --}}
                <div class="details-section">
                    <div class="details-item">
                        <i class="fas fa-clock icon"></i>
                        <div class="info description">Recepción: Fertil. Premium</div>
                        <div class="info col-date">14/06/2024</div>
                        <div class="info col-amount">+500kg</div>
                        <div class="info col-type text-success">Entrada</div>
                    </div>
                    <div class="details-item">
                        <i class="fas fa-history icon"></i>
                        <div class="info description">Salida: Semillas Maíz</div>
                        <div class="info col-date">12/06/2024</div>
                        <div class="info col-amount">-200kg</div>
                        <div class="info col-type text-danger">Salida</div>
                    </div>
                    <div class="details-item">
                        <i class="fas fa-sync-alt icon"></i>
                        <div class="info description">Ajuste: Inventario Herbicida</div>
                        <div class="info col-date">09/06/2024</div>
                        <div class="info col-amount">0kg</div>
                        <div class="info col-type text-info">Ajuste</div>
                    </div>
                </div>
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
        var tabs = document.querySelectorAll('.almacen-tabs .nav-link');

        tabs.forEach(function(tab) {
            // Remove active from all
            tab.classList.remove('active');
            tab.setAttribute('aria-selected', 'false');

            // Find the tab that matches the current URL path
            var tabHref = tab.getAttribute('href');
            if (currentPath.includes(tabHref)) {
                tab.classList.add('active');
                tab.setAttribute('aria-selected', 'true');
                var tabPaneId = tab.getAttribute('href');
                document.querySelector(tabPaneId).classList.add('show', 'active');
            } else {
                var tabPaneId = tab.getAttribute('href');
                document.querySelector(tabPaneId).classList.remove('show', 'active');
            }
        });

        // Fallback: If no specific tab matches (e.g., just /almacen), activate the first tab
        if (!document.querySelector('.almacen-tabs .nav-link.active')) {
             var firstTab = document.querySelector('.almacen-tabs .nav-link');
             var firstTabPane = document.querySelector(firstTab.getAttribute('href'));
             firstTab.classList.add('active');
             firstTab.setAttribute('aria-selected', 'true');
             firstTabPane.classList.add('show', 'active');
        }
    });

    // Handle Bootstrap's tab switching logic via data-toggle
    $('#almacenTabs a').on('click', function (e) {
        e.preventDefault();
        $(this).tab('show');
    })
</script>

</body>
</html>