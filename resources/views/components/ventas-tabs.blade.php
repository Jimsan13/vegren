<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumen de Ventas y Estado Financiero</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: sans-serif;
            background-color: #f0fff0;
        }
        .container-fluid {
            padding: 30px;
        }

        :root {
            --primary-green: #28a745;
            --secondary-green: #218838;
            --yellow-highlight: #ffc107;
            --red-alert: #dc3545;
            --blue-info: #17a2b8;
            --gray-text: #6c757d;
            --dark-text: #343a40;
            --light-border: #eee;
            --medium-border: #ddd;
        }

        .ventas-tabs .nav-link {
            color: var(--gray-text);
            border: 1px solid transparent;
            border-top-left-radius: .25rem;
            border-top-right-radius: .25rem;
            padding: .5rem 1rem;
        }
        .ventas-tabs .nav-link.active {
            color: var(--primary-green);
            background-color: #fff;
            border-color: var(--medium-border) var(--medium-border) #fff;
            font-weight: bold;
        }

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
            color: var(--primary-green);
        }
        .card-summary .icon.income { color: var(--primary-green); }
        .card-summary .icon.expense { color: var(--red-alert); }
        .card-summary .icon.profit { color: var(--blue-info); }
        .card-summary .icon.debt { color: var(--yellow-highlight); }
        .card-summary .icon.balance { color: var(--primary-green); }

        .card-summary .title {
            font-size: 0.9em;
            color: var(--gray-text);
            margin-bottom: 5px;
        }
        .card-summary .value {
            font-size: 1.5em;
            font-weight: bold;
            color: var(--dark-text);
        }
        .card-summary .description {
            font-size: 0.8em;
            color: var(--gray-text);
        }

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
            border-bottom: 1px solid var(--light-border);
            flex-wrap: nowrap;
        }
        .details-item:last-child {
            border-bottom: none;
        }
        .details-item .icon {
            font-size: 1.5em;
            margin-right: 15px;
            color: var(--gray-text);
            width: 30px;
            text-align: center;
            flex-shrink: 0;
        }
        .details-item .info {
            flex-grow: 1;
            padding: 0 5px;
        }
        .details-item .info.description {
            flex-grow: 2;
            min-width: 150px;
        }
        .details-item .col-date,
        .details-item .col-lote,
        .details-item .col-caja,
        .details-item .col-costo,
        .details-item .col-proveedor,
        .details-item .col-ingreso,
        .details-item .col-egreso,
        .details-item .col-ganancia,
        .details-item .col-deuda,
        .details-item .col-saldo {
            flex-basis: 120px;
            min-width: 80px;
            text-align: right;
            white-space: nowrap;
            flex-shrink: 0;
        }
        .details-item .col-actions {
            flex-basis: 90px;
            min-width: 70px;
            text-align: right;
            display: flex;
            justify-content: flex-end;
            flex-shrink: 0;
            padding-left: 5px;
        }
        .details-item .col-actions .btn {
            font-size: 0.9em;
            padding: .3em .6em;
            margin-left: 5px;
        }

        .btn-add {
            background-color: var(--primary-green);
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
            background-color: var(--secondary-green);
        }

        /* Modal styles */
        .modal-header {
            background-color: var(--primary-green);
            color: white;
            border-bottom: none;
        }
        .modal-header .close {
            color: white;
            opacity: 1;
        }
        .modal-body .form-group label {
            font-weight: bold;
            color: var(--dark-text);
        }
        .modal-footer .btn-primary {
            background-color: var(--primary-green);
            border-color: var(--primary-green);
        }
        .modal-footer .btn-primary:hover {
            background-color: var(--secondary-green);
            border-color: var(--secondary-green);
        }

        @media (max-width: 992px) {
            .details-item .info.description {
                flex-basis: 120px;
                min-width: 120px;
            }
            .details-item .col-date,
            .details-item .col-lote,
            .details-item .col-caja,
            .details-item .col-costo,
            .details-item .col-proveedor,
            .details-item .col-ingreso,
            .details-item .col-egreso,
            .details-item .col-ganancia,
            .details-item .col-deuda,
            .details-item .col-saldo {
                flex-basis: 90px;
                min-width: 70px;
            }
        }

        @media (max-width: 767px) {
            .details-item {
                flex-wrap: wrap;
                align-items: flex-start;
            }
            .details-item .icon {
                margin-top: 5px;
                margin-bottom: 5px;
            }
            .details-item .info.description {
                flex-basis: calc(100% - 45px);
                min-width: unset;
                order: 1;
            }
            .details-item .col-date,
            .details-item .col-lote,
            .details-item .col-caja,
            .details-item .col-costo,
            .details-item .col-proveedor,
            .details-item .col-ingreso,
            .details-item .col-egreso,
            .details-item .col-ganancia,
            .details-item .col-deuda,
            .details-item .col-saldo {
                flex-basis: 48%;
                text-align: left;
                white-space: normal;
                min-width: unset;
                margin-bottom: 5px;
                order: 2;
            }
            .details-item .col-actions {
                flex-basis: 100%;
                justify-content: flex-start;
                margin-top: 5px;
                order: 3;
            }
            .details-item .info:empty {
                display: none;
            }
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <h3 class="fw-bold text-success mb-4">Resumen de Ventas y Estado Financiero</h3>

    <ul class="nav nav-tabs mb-4 ventas-tabs" id="ventasEstadoTabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="resumen-tab" data-toggle="tab" href="#resumen" role="tab" aria-controls="resumen" aria-selected="true">
                Resumen General
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="detalles-tab" data-toggle="tab" href="#detalles" role="tab" aria-controls="detalles" aria-selected="false">
                Detalle de Operaciones
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="reportes-tab" data-toggle="tab" href="#reportes" role="tab" aria-controls="reportes" aria-selected="false">
                Reportes Mensuales
            </a>
        </li>
    </ul>

    <div class="tab-content" id="ventasEstadoTabsContent">
        {{-- Contenido para la pestaña "Resumen General" --}}
        <div class="tab-pane fade show active" id="resumen" role="tabpanel" aria-labelledby="resumen-tab">
            <h4 class="mb-3">Indicadores Clave</h4>
            <div class="row">
                <div class="col-md-4">
                    <div class="card-summary">
                        <i class="fas fa-money-bill-alt icon income"></i>
                        <div>
                            <div class="title">Ingresos Totales (Mes Actual)</div>
                            <div class="value">$2,500,000</div>
                            <div class="description">Ventas y otros ingresos acumulados</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-summary">
                        <i class="fas fa-hand-holding-usd icon expense"></i>
                        <div>
                            <div class="title">Egresos Totales (Mes Actual)</div>
                            <div class="value">$1,800,000</div>
                            <div class="description">Costos y gastos operativos</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-summary">
                        <i class="fas fa-chart-line icon profit"></i>
                        <div>
                            <div class="title">Ganancia Neta (Mes Actual)</div>
                            <div class="value">$700,000</div>
                            <div class="description">Ingresos - Egresos</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-summary">
                        <i class="fas fa-coins icon balance"></i>
                        <div>
                            <div class="title">Saldos Disponibles</div>
                            <div class="value">$1,500,000</div>
                            <div class="description">Efectivo + Bancos</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-summary">
                        <i class="fas fa-file-invoice-dollar icon debt"></i>
                        <div>
                            <div class="title">Deudas Acumuladas</div>
                            <div class="value">$350,000</div>
                            <div class="description">Insumos, Nómina, Proveedores</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Contenido para la pestaña "Detalle de Operaciones" --}}
        <div class="tab-pane fade" id="detalles" role="tabpanel" aria-labelledby="detalles-tab">
            <h4 class="mb-3">Registro de Operaciones Detallado</h4>
            <div class="details-section">
                {{-- Encabezados de la tabla --}}
                <div class="details-item fw-bold text-muted" style="border-bottom: 2px solid var(--medium-border);">
                    <div class="icon"></div>
                    <div class="info col-date">Fecha</div>
                    <div class="info col-lote">Lote</div>
                    <div class="info col-caja">Caja</div>
                    <div class="info description">Descripción</div>
                    <div class="info col-costo">Costo Prod/Mano Obra</div>
                    <div class="info col-proveedor">Proveedor</div>
                    <div class="info col-ingreso">Ingreso</div>
                    <div class="info col-egreso">Egreso</div>
                    <div class="info col-ganancia">Ganancia</div>
                    <div class="col-actions">Acciones</div>
                </div>
                {{-- Ejemplos de datos --}}
                <div class="details-item">
                    <i class="fas fa-seedling icon"></i>
                    <div class="info col-date">28/06/2024</div>
                    <div class="info col-lote">L-005</div>
                    <div class="info col-caja">C-01</div>
                    <div class="info description">Venta de Tomate Roma</div>
                    <div class="info col-costo">$1,200</div>
                    <div class="info col-proveedor">N/A</div>
                    <div class="info col-ingreso text-success">$15,000</div>
                    <div class="info col-egreso text-danger">$0</div>
                    <div class="info col-ganancia text-primary">$13,800</div>
                    <div class="col-actions">
                        <button class="btn btn-info btn-sm" title="Editar"><i class="fas fa-pencil-alt"></i></button>
                        <button class="btn btn-danger btn-sm" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </div>
                <div class="details-item">
                    <i class="fas fa-tractor icon"></i>
                    <div class="info col-date">27/06/2024</div>
                    <div class="info col-lote">N/A</div>
                    <div class="info col-caja">N/A</div>
                    <div class="info description">Pago de Jornaleros</div>
                    <div class="info col-costo">$0</div>
                    <div class="info col-proveedor">N/A</div>
                    <div class="info col-ingreso text-success">$0</div>
                    <div class="info col-egreso text-danger">$5,000</div>
                    <div class="info col-ganancia text-primary">-$5,000</div>
                    <div class="col-actions">
                        <button class="btn btn-info btn-sm" title="Editar"><i class="fas fa-pencil-alt"></i></button>
                        <button class="btn btn-danger btn-sm" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </div>
                <div class="details-item">
                    <i class="fas fa-box-open icon"></i>
                    <div class="info col-date">26/06/2024</div>
                    <div class="info col-lote">L-004</div>
                    <div class="info col-caja">C-03</div>
                    <div class="info description">Venta de Chile Serrano</div>
                    <div class="info col-costo">$800</div>
                    <div class="info col-proveedor">N/A</div>
                    <div class="info col-ingreso text-success">$10,000</div>
                    <div class="info col-egreso text-danger">$0</div>
                    <div class="info col-ganancia text-primary">$9,200</div>
                    <div class="col-actions">
                        <button class="btn btn-info btn-sm" title="Editar"><i class="fas fa-pencil-alt"></i></button>
                        <button class="btn btn-danger btn-sm" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </div>
                <div class="details-item">
                    <i class="fas fa-dolly icon"></i>
                    <div class="info col-date">25/06/2024</div>
                    <div class="info col-lote">N/A</div>
                    <div class="info col-caja">N/A</div>
                    <div class="info description">Compra de Fertilizante</div>
                    <div class="info col-costo">$0</div>
                    <div class="info col-proveedor">Agro S.A.</div>
                    <div class="info col-ingreso text-success">$0</div>
                    <div class="info col-egreso text-danger">$3,500</div>
                    <div class="info col-ganancia text-primary">-$3,500</div>
                    <div class="col-actions">
                        <button class="btn btn-info btn-sm" title="Editar"><i class="fas fa-pencil-alt"></i></button>
                        <button class="btn btn-danger btn-sm" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </div>
            </div>
            <button class="btn-add" data-toggle="modal" data-target="#addSaleMovementModal">Agregar Operación</button>
        </div>

        {{-- Contenido para la pestaña "Reportes Mensuales" --}}
        <div class="tab-pane fade" id="reportes" role="tabpanel" aria-labelledby="reportes-tab">
            <h4 class="mb-3">Reporte de Ingresos por Mes</h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="card-summary">
                        <i class="fas fa-calendar-alt icon income"></i>
                        <div>
                            <div class="title">Ingresos Mes Actual (Julio 2025)</div>
                            <div class="value">$2,500,000</div>
                            <div class="description">Total de ingresos hasta la fecha</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-summary">
                        <i class="fas fa-calendar-check icon income"></i>
                        <div>
                            <div class="title">Ingresos Mes Anterior (Junio 2025)</div>
                            <div class="value">$3,100,000</div>
                            <div class="description">Ingresos totales del mes pasado</div>
                        </div>
                    </div>
                </div>
            </div>
            <h4 class="mb-3">Deudas Acumuladas por Tipo</h4>
            <div class="details-section">
                <div class="details-item fw-bold text-muted" style="border-bottom: 2px solid var(--medium-border);">
                    <div class="icon"></div>
                    <div class="info description">Tipo de Deuda</div>
                    <div class="info col-deuda">Monto Adeudado</div>
                </div>
                <div class="details-item">
                    <i class="fas fa-hand-holding-usd icon"></i>
                    <div class="info description">Insumos Pendientes</div>
                    <div class="info col-deuda text-danger">$120,000</div>
                </div>
                <div class="details-item">
                    <i class="fas fa-users icon"></i>
                    <div class="info description">Nómina por Pagar</div>
                    <div class="info col-deuda text-danger">$80,000</div>
                </div>
                <div class="details-item">
                    <i class="fas fa-truck-loading icon"></i>
                    <div class="info description">Proveedores Crédito</div>
                    <div class="info col-deuda text-danger">$100,000</div>
                </div>
                <div class="details-item">
                    <i class="fas fa-exchange-alt icon"></i>
                    <div class="info description">Transferencias Pendientes</div>
                    <div class="info col-deuda text-danger">$50,000</div>
                </div>
            </div>
            <button class="btn-add" data-toggle="modal" data-target="#addDebtModal">Registrar Nueva Deuda</button>
        </div>
    </div>
</div>

<div class="modal fade" id="addSaleMovementModal" tabindex="-1" aria-labelledby="addSaleMovementModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSaleMovementModalLabel">Agregar Nueva Operación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="saleMovementForm">
                    <div class="form-group">
                        <label for="operationDate">Fecha:</label>
                        <input type="date" class="form-control" id="operationDate" required>
                    </div>
                    <div class="form-group">
                        <label for="operationDescription">Descripción:</label>
                        <input type="text" class="form-control" id="operationDescription" placeholder="Ej: Venta de Maíz, Compra de Semillas" required>
                    </div>
                    <div class="form-group">
                        <label for="operationType">Tipo de Operación:</label>
                        <select class="form-control" id="operationType" required>
                            <option value="">Selecciona...</option>
                            <option value="ingreso">Ingreso (Venta)</option>
                            <option value="egreso">Egreso (Gasto/Costo)</option>
                        </select>
                    </div>
                    <div class="form-group" id="loteCajaGroup">
                        <label for="operationLote">Lote:</label>
                        <input type="text" class="form-control" id="operationLote" placeholder="Ej: L-001">
                        <label for="operationCaja">Caja:</label>
                        <input type="text" class="form-control" id="operationCaja" placeholder="Ej: C-05">
                    </div>
                    <div class="form-group" id="costoProductoGroup">
                        <label for="operationCostoProducto">Costo del Producto / Mano de Obra:</label>
                        <input type="number" class="form-control" id="operationCostoProducto" step="0.01" value="0">
                    </div>
                    <div class="form-group">
                        <label for="operationProveedor">Proveedor (si aplica):</label>
                        <input type="text" class="form-control" id="operationProveedor" placeholder="Ej: Agro Semillas, Transportes Carga">
                    </div>
                    <div class="form-group" id="montoIngresoGroup" style="display: none;">
                        <label for="operationIngreso">Monto de Ingreso:</label>
                        <input type="number" class="form-control" id="operationIngreso" step="0.01" value="0">
                    </div>
                    <div class="form-group" id="montoEgresoGroup" style="display: none;">
                        <label for="operationEgreso">Monto de Egreso:</label>
                        <input type="number" class="form-control" id="operationEgreso" step="0.01" value="0">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary" form="saleMovementForm">Guardar Operación</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addDebtModal" tabindex="-1" aria-labelledby="addDebtModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDebtModalLabel">Registrar Nueva Deuda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="debtForm">
                    <div class="form-group">
                        <label for="debtDescription">Descripción de la Deuda:</label>
                        <input type="text" class="form-control" id="debtDescription" required placeholder="Ej: Factura de insumos, Nómina segunda quincena">
                    </div>
                    <div class="form-group">
                        <label for="debtAmount">Monto Adeudado:</label>
                        <input type="number" class="form-control" id="debtAmount" step="0.01" required>
                    </div>
                    <div class="form-group">
                        <label for="debtDueDate">Fecha de Vencimiento:</label>
                        <input type="date" class="form-control" id="debtDueDate">
                    </div>
                    <div class="form-group">
                        <label for="debtStatus">Estado:</label>
                        <select class="form-control" id="debtStatus">
                            <option value="Pendiente">Pendiente</option>
                            <option value="Pagada">Pagada</option>
                            <option value="Vencida">Vencida</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="debtCategory">Categoría:</label>
                        <select class="form-control" id="debtCategory">
                            <option value="Insumos">Insumos</option>
                            <option value="Nomina">Nómina</option>
                            <option value="Proveedores">Proveedores</option>
                            <option value="Transferencias">Transferencias</option>
                            <option value="Otro">Otro</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary" form="debtForm">Guardar Deuda</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    // Script para activar la pestaña correcta al cargar la página (similar al anterior)
    document.addEventListener('DOMContentLoaded', function() {
        var tabs = document.querySelectorAll('.ventas-tabs .nav-link');
        var defaultTab = document.getElementById('resumen-tab');
        var defaultTabPane = document.querySelector(defaultTab.getAttribute('href'));

        // Desactivar todas las pestañas y paneles al inicio
        tabs.forEach(function(tab) {
            tab.classList.remove('active');
            tab.setAttribute('aria-selected', 'false');
            var tabPaneId = tab.getAttribute('href');
            if (document.querySelector(tabPaneId)) {
                document.querySelector(tabPaneId).classList.remove('show', 'active');
            }
        });

        // Activar la pestaña por defecto (Resumen General)
        if (defaultTab) {
            defaultTab.classList.add('active');
            defaultTab.setAttribute('aria-selected', 'true');
            if (defaultTabPane) {
                defaultTabPane.classList.add('show', 'active');
            }
        }
    });

    // Manejar el cambio de pestañas de Bootstrap
    $('#ventasEstadoTabs a').on('click', function (e) {
        e.preventDefault();
        $(this).tab('show');
    });

    // Lógica para el Modal de Agregar Operación de Venta/Gasto
    $('#addSaleMovementModal').on('show.bs.modal', function (event) {
        var modal = $(this);
        var operationTypeSelect = modal.find('#operationType');
        var montoIngresoGroup = modal.find('#montoIngresoGroup');
        var montoEgresoGroup = modal.find('#montoEgresoGroup');
        var loteCajaGroup = modal.find('#loteCajaGroup');
        var costoProductoGroup = modal.find('#costoProductoGroup');

        // Limpiar formulario y ocultar campos condicionales
        $('#saleMovementForm')[0].reset();
        montoIngresoGroup.hide();
        montoEgresoGroup.hide();
        loteCajaGroup.show(); // Lote y Caja siempre visibles para operaciones
        costoProductoGroup.show(); // Costo Producto siempre visible

        // Mostrar u ocultar campos de monto según el tipo de operación seleccionada
        operationTypeSelect.off('change').on('change', function() {
            if ($(this).val() === 'ingreso') {
                montoIngresoGroup.show();
                montoEgresoGroup.hide();
                $('#operationEgreso').val(0); // Asegurar que el egreso sea 0
            } else if ($(this).val() === 'egreso') {
                montoEgresoGroup.show();
                montoIngresoGroup.hide();
                $('#operationIngreso').val(0); // Asegurar que el ingreso sea 0
            } else {
                montoIngresoGroup.hide();
                montoEgresoGroup.hide();
                $('#operationIngreso').val(0);
                $('#operationEgreso').val(0);
            }
        });
    });

    // Manejar el envío del formulario del Modal de Agregar Operación
    $('#saleMovementForm').on('submit', function(e) {
        e.preventDefault();

        var operationData = {
            fecha: $('#operationDate').val(),
            descripcion: $('#operationDescription').val(),
            tipo: $('#operationType').val(),
            lote: $('#operationLote').val(),
            caja: $('#operationCaja').val(),
            costo: $('#operationCostoProducto').val(),
            proveedor: $('#operationProveedor').val(),
            ingreso: $('#operationIngreso').val(),
            egreso: $('#operationEgreso').val()
        };

        console.log("Datos de la nueva operación:", operationData);
        alert('Operación de venta/gasto registrada (simulado)! Revisa la consola.');
        $('#addSaleMovementModal').modal('hide');
    });

    // Lógica para el Modal de Registrar Nueva Deuda
    $('#addDebtModal').on('show.bs.modal', function (event) {
        // Limpiar el formulario cada vez que se abre
        $('#debtForm')[0].reset();
    });

    // Manejar el envío del formulario del Modal de Registrar Nueva Deuda
    $('#debtForm').on('submit', function(e) {
        e.preventDefault();

        var debtData = {
            descripcion: $('#debtDescription').val(),
            monto: $('#debtAmount').val(),
            fechaVencimiento: $('#debtDueDate').val(),
            estado: $('#debtStatus').val(),
            categoria: $('#debtCategory').val()
        };

        console.log("Nueva deuda registrada:", debtData);
        alert('Deuda registrada (simulado)! Revisa la consola.');
        $('#addDebtModal').modal('hide');
    });
</script>

</body>
</html>