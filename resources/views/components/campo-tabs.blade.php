<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gastos y Movimientos</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: sans-serif;
            background-color: #f0fff0; /* Light green background to match image */
        }
        .container-fluid {
            padding: 30px;
        }
        .gastos-tabs .nav-link {
            color: #495057;
            border: 1px solid transparent;
            border-top-left-radius: .25rem;
            border-top-right-radius: .25rem;
            padding: .5rem 1rem;
        }
        .gastos-tabs .nav-link.active {
            color: #28a745; /* Green for active tab */
            background-color: #fff;
            border-color: #dee2e6 #dee2e6 #fff;
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
            color: #28a745; /* Green icon */
        }
        .card-summary .icon.movement {
            color: #17a2b8; /* Blue-green for movements */
        }
        .card-summary .icon.employees {
            color: #28a745; /* Green for employees icon */
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
            cursor: pointer; /* Make rows clickable for editing */
        }
        .details-item:hover {
            background-color: #f8f9fa; /* Highlight on hover */
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

        /* Modal specific styles */
        .modal-content {
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .modal-header {
            background-color: #28a745; /* Green header */
            color: white;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            border-bottom: none;
        }

        .modal-header .close {
            color: white;
            opacity: 0.8;
        }

        .modal-title {
            font-weight: 600;
        }

        .modal-body .form-group {
            margin-bottom: 15px;
        }

        .modal-body .form-label {
            font-weight: 500;
            color: #495057;
        }

        .modal-body .input-group-text {
            background-color: #e9ecef;
            border-color: #ced4da;
            color: #495057;
        }

        .modal-footer {
            border-top: 1px solid #e9ecef;
            padding: 15px;
            justify-content: flex-end;
        }

        .modal-footer .btn {
            padding: 8px 18px;
            border-radius: 5px;
        }

        .modal-footer .btn-primary {
            background-color: #28a745;
            border-color: #28a745;
        }

        .modal-footer .btn-primary:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
    </style>
</head>
<body>

<div class="container-fluid">

    <ul class="nav nav-tabs mb-4 gastos-tabs" id="gastosMovimientosTabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link" id="planta-tab" data-toggle="tab" href="#planta" role="tab" aria-controls="planta" aria-selected="false">
                Planta
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="nomina-tab" data-toggle="tab" href="#nomina" role="tab" aria-controls="nomina" aria-selected="false">
                Nómina
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" id="insumos-tab" data-toggle="tab" href="#insumos" role="tab" aria-controls="insumos" aria-selected="true">
                Insumos
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="gastosextras-tab" data-toggle="tab" href="#gastosextras" role="tab" aria-controls="gastosextras" aria-selected="false">
                Gastos extras
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="campo-tab" data-toggle="tab" href="#campo" role="tab" aria-controls="campo" aria-selected="false">
                Campo
            </a>
        </li>
    </ul>

    <div class="tab-content" id="gastosMovimientosTabsContent">
        <div class="tab-pane fade" id="planta" role="tabpanel" aria-labelledby="planta-tab">
            <h4>Resumen de Planta</h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="card-summary">
                        <i class="fas fa-dollar-sign icon"></i>
                        <div>
                            <div class="title">Total Gastos</div>
                            <div class="value">$120,000</div>
                            <div class="description">Gastos acumulados en planta este mes</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-summary">
                        <i class="fas fa-chart-line icon movement"></i>
                        <div>
                            <div class="title">Movimientos</div>
                            <div class="value">34</div>
                            <div class="description">Movimientos registrados en planta</div>
                        </div>
                    </div>
                </div>
            </div>
            <h4>Detalle de Movimientos</h4>
            <div class="details-section" id="planta-details-section">
                <div class="details-item" data-id="p1" data-fecha="05/06/2024" data-descripcion="Fertilizante" data-monto="8000" data-tipo="Compra">
                    <i class="fas fa-seedling icon"></i>
                    <div class="info description">Fertilizante</div>
                    <div class="info col-date">05/06/2024</div>
                    <div class="info col-amount">$8,000</div>
                    <div class="info col-type">Compra</div>
                    <button class="btn btn-sm btn-info edit-item-btn" data-toggle="modal" data-target="#movimientoEditModal" data-modal-type="edit"><i class="fas fa-pencil-alt"></i></button>
                </div>
                <div class="details-item" data-id="p2" data-fecha="03/06/2024" data-descripcion="Riego" data-monto="2500" data-tipo="Servicio">
                    <i class="fas fa-tint icon"></i>
                    <div class="info description">Riego</div>
                    <div class="info col-date">03/06/2024</div>
                    <div class="info col-amount">$2,500</div>
                    <div class="info col-type">Servicio</div>
                    <button class="btn btn-sm btn-info edit-item-btn" data-toggle="modal" data-target="#movimientoEditModal" data-modal-type="edit"><i class="fas fa-pencil-alt"></i></button>
                </div>
                <div class="details-item" data-id="p3" data-fecha="01/06/2024" data-descripcion="Poda" data-monto="1200" data-tipo="Mano de obra">
                    <i class="fas fa-cut icon"></i>
                    <div class="info description">Poda</div>
                    <div class="info col-date">01/06/2024</div>
                    <div class="info col-amount">$1,200</div>
                    <div class="info col-type">Mano de obra</div>
                    <button class="btn btn-sm btn-info edit-item-btn" data-toggle="modal" data-target="#movimientoEditModal" data-modal-type="edit"><i class="fas fa-pencil-alt"></i></button>
                </div>
            </div>
            <button class="btn-add" data-toggle="modal" data-target="#movimientoEditModal" data-modal-type="add">Agregar</button>
        </div>

        <div class="tab-pane fade" id="nomina" role="tabpanel" aria-labelledby="nomina-tab">
            <h4>Resumen de Nómina</h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="card-summary">
                        <i class="fas fa-money-bill-alt icon"></i>
                        <div>
                            <div class="title">Total Nómina</div>
                            <div class="value">$45,000</div>
                            <div class="description">Pagos acumulados este mes</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-summary">
                        <i class="fas fa-users icon employees"></i>
                        <div>
                            <div class="title">Empleados</div>
                            <div class="value">12</div>
                            <div class="description">Empleados activos en nómina</div>
                        </div>
                    </div>
                </div>
            </div>
            <h4>Detalle de Pagos</h4>
            <div class="details-section" id="nomina-details-section">
                <div class="details-item" data-id="n1" data-fecha="05/06/2024" data-nombre="Juan Pérez" data-monto="4000" data-tipo="Pago quincenal">
                    <i class="fas fa-user icon"></i>
                    <div class="info col-name">Juan Pérez</div>
                    <div class="info col-date">05/06/2024</div>
                    <div class="info col-amount">$4,000</div>
                    <div class="info col-type">Pago quincenal</div>
                    <button class="btn btn-sm btn-info edit-item-btn" data-toggle="modal" data-target="#movimientoEditModal" data-modal-type="edit"><i class="fas fa-pencil-alt"></i></button>
                </div>
                <div class="details-item" data-id="n2" data-fecha="03/06/2024" data-nombre="Ana López" data-monto="3800" data-tipo="Pago semanal">
                    <i class="fas fa-user icon"></i>
                    <div class="info col-name">Ana López</div>
                    <div class="info col-date">03/06/2024</div>
                    <div class="info col-amount">$3,800</div>
                    <div class="info col-type">Pago semanal</div>
                    <button class="btn btn-sm btn-info edit-item-btn" data-toggle="modal" data-target="#movimientoEditModal" data-modal-type="edit"><i class="fas fa-pencil-alt"></i></button>
                </div>
                <div class="details-item" data-id="n3" data-fecha="01/06/2024" data-nombre="Carlos Ruiz" data-monto="4200" data-tipo="Pago quincenal">
                    <i class="fas fa-user icon"></i>
                    <div class="info col-name">Carlos Ruiz</div>
                    <div class="info col-date">01/06/2024</div>
                    <div class="info col-amount">$4,200</div>
                    <div class="info col-type">Pago quincenal</div>
                    <button class="btn btn-sm btn-info edit-item-btn" data-toggle="modal" data-target="#movimientoEditModal" data-modal-type="edit"><i class="fas fa-pencil-alt"></i></button>
                </div>
            </div>
            <button class="btn-add" data-toggle="modal" data-target="#movimientoEditModal" data-modal-type="add">Agregar</button>
        </div>

        <div class="tab-pane fade show active" id="insumos" role="tabpanel" aria-labelledby="insumos-tab">
            <h4>Resumen de Insumos</h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="card-summary">
                        <i class="fas fa-dollar-sign icon"></i>
                        <div>
                            <div class="title">Total Insumos</div>
                            <div class="value">$18,500</div>
                            <div class="description">Gasto acumulado este mes</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-summary">
                        <i class="fas fa-chart-line icon movement"></i>
                        <div>
                            <div class="title">Movimientos</div>
                            <div class="value">8</div>
                            <div class="description">Entradas y salidas registradas</div>
                        </div>
                    </div>
                </div>
            </div>
            <h4>Detalle de Insumos</h4>
            <div class="details-section" id="insumos-details-section">
                <div class="details-item" data-id="i1" data-fecha="04/06/2024" data-descripcion="Fertilizante NPK" data-monto="2500" data-tipo="Compra">
                    <i class="fas fa-seedling icon"></i>
                    <div class="info description">Fertilizante NPK</div>
                    <div class="info col-date">04/06/2024</div>
                    <div class="info col-amount">$2,500</div>
                    <div class="info col-type">Compra</div>
                    <button class="btn btn-sm btn-info edit-item-btn" data-toggle="modal" data-target="#movimientoEditModal" data-modal-type="edit"><i class="fas fa-pencil-alt"></i></button>
                </div>
                <div class="details-item" data-id="i2" data-fecha="02/06/2024" data-descripcion="Herbicida Selectivo" data-monto="1200" data-tipo="Compra">
                    <i class="fas fa-flask icon"></i>
                    <div class="info description">Herbicida Selectivo</div>
                    <div class="info col-date">02/06/2024</div>
                    <div class="info col-amount">$1,200</div>
                    <div class="info col-type">Compra</div>
                    <button class="btn btn-sm btn-info edit-item-btn" data-toggle="modal" data-target="#movimientoEditModal" data-modal-type="edit"><i class="fas fa-pencil-alt"></i></button>
                </div>
                <div class="details-item" data-id="i3" data-fecha="30/05/2024" data-descripcion="Semillas Maíz" data-monto="3000" data-tipo="Entrada">
                    <i class="fas fa-cereal icon"></i>
                    <div class="info description">Semillas Maíz</div>
                    <div class="info col-date">30/05/2024</div>
                    <div class="info col-amount">$3,000</div>
                    <div class="info col-type">Entrada</div>
                    <button class="btn btn-sm btn-info edit-item-btn" data-toggle="modal" data-target="#movimientoEditModal" data-modal-type="edit"><i class="fas fa-pencil-alt"></i></button>
                </div>
            </div>
            <button class="btn-add" data-toggle="modal" data-target="#movimientoEditModal" data-modal-type="add">Agregar</button>
        </div>

        <div class="tab-pane fade" id="gastosextras" role="tabpanel" aria-labelledby="gastosextras-tab">
            <h4>Resumen de Gastos Extras</h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="card-summary">
                        <i class="fas fa-dollar-sign icon"></i>
                        <div>
                            <div class="title">Total Gastos</div>
                            <div class="value">$4,200</div>
                            <div class="description">Gasto acumulado este mes</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-summary">
                        <i class="fas fa-chart-line icon movement"></i>
                        <div>
                            <div class="title">Movimientos</div>
                            <div class="value">3</div>
                            <div class="description">Pagos y ajustes registrados</div>
                        </div>
                    </div>
                </div>
            </div>
            <h4>Detalle de Gastos Extras</h4>
            <div class="details-section" id="gastosextras-details-section">
                <div class="details-item" data-id="ge1" data-fecha="01/06/2024" data-descripcion="Reparación tractor" data-monto="2000" data-tipo="Servicio">
                    <i class="fas fa-tractor icon"></i>
                    <div class="info description">Reparación tractor</div>
                    <div class="info col-date">01/06/2024</div>
                    <div class="info col-amount">$2,000</div>
                    <div class="info col-type">Servicio</div>
                    <button class="btn btn-sm btn-info edit-item-btn" data-toggle="modal" data-target="#movimientoEditModal" data-modal-type="edit"><i class="fas fa-pencil-alt"></i></button>
                </div>
                <div class="details-item" data-id="ge2" data-fecha="28/05/2024" data-descripcion="Combustible" data-monto="1500" data-tipo="Compra">
                    <i class="fas fa-gas-pump icon"></i>
                    <div class="info description">Combustible</div>
                    <div class="info col-date">28/05/2024</div>
                    <div class="info col-amount">$1,500</div>
                    <div class="info col-type">Compra</div>
                    <button class="btn btn-sm btn-info edit-item-btn" data-toggle="modal" data-target="#movimientoEditModal" data-modal-type="edit"><i class="fas fa-pencil-alt"></i></button>
                </div>
                <div class="details-item" data-id="ge3" data-fecha="25/05/2024" data-descripcion="Mantenimiento bomba" data-monto="700" data-tipo="Servicio">
                    <i class="fas fa-pump-medical icon"></i>
                    <div class="info description">Mantenimiento bomba</div>
                    <div class="info col-date">25/05/2024</div>
                    <div class="info col-amount">$700</div>
                    <div class="info col-type">Servicio</div>
                    <button class="btn btn-sm btn-info edit-item-btn" data-toggle="modal" data-target="#movimientoEditModal" data-modal-type="edit"><i class="fas fa-pencil-alt"></i></button>
                </div>
            </div>
            <button class="btn-add" data-toggle="modal" data-target="#movimientoEditModal" data-modal-type="add">Agregar</button>
        </div>

        <div class="tab-pane fade" id="campo" role="tabpanel" aria-labelledby="campo-tab">
            <h4>Resumen de Campo</h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="card-summary">
                        <i class="fas fa-dollar-sign icon"></i>
                        <div>
                            <div class="title">Total Gastos</div>
                            <div class="value">$18,500</div>
                            <div class="description">Gastos acumulados en campo este mes</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-summary">
                        <i class="fas fa-chart-line icon movement"></i>
                        <div>
                            <div class="title">Movimientos</div>
                            <div class="value">12</div>
                            <div class="description">Movimientos registrados en campo</div>
                        </div>
                    </div>
                </div>
            </div>
            <h4>Detalle de Movimientos</h4>
            <div class="details-section" id="campo-details-section">
                <div class="details-item" data-id="c1" data-fecha="20/06/2024" data-descripcion="Preparación de suelo" data-monto="5000" data-tipo="Servicio">
                    <i class="fas fa-seedling icon"></i>
                    <div class="info description">Preparación de suelo</div>
                    <div class="info col-date">20/06/2024</div>
                    <div class="info col-amount">$5,000</div>
                    <div class="info col-type">Servicio</div>
                    <button class="btn btn-sm btn-info edit-item-btn" data-toggle="modal" data-target="#movimientoEditModal" data-modal-type="edit"><i class="fas fa-pencil-alt"></i></button>
                </div>
                <div class="details-item" data-id="c2" data-fecha="18/06/2024" data-descripcion="Sistema de riego" data-monto="7500" data-tipo="Mantenimiento">
                    <i class="fas fa-water icon"></i>
                    <div class="info description">Sistema de riego</div>
                    <div class="info col-date">18/06/2024</div>
                    <div class="info col-amount">$7,500</div>
                    <div class="info col-type">Mantenimiento</div>
                    <button class="btn btn-sm btn-info edit-item-btn" data-toggle="modal" data-target="#movimientoEditModal" data-modal-type="edit"><i class="fas fa-pencil-alt"></i></button>
                </div>
                <div class="details-item" data-id="c3" data-fecha="15/06/2024" data-descripcion="Alquiler de tractor" data-monto="3000" data-tipo="Servicio">
                    <i class="fas fa-tractor icon"></i>
                    <div class="info description">Alquiler de tractor</div>
                    <div class="info col-date">15/06/2024</div>
                    <div class="info col-amount">$3,000</div>
                    <div class="info col-type">Servicio</div>
                    <button class="btn btn-sm btn-info edit-item-btn" data-toggle="modal" data-target="#movimientoEditModal" data-modal-type="edit"><i class="fas fa-pencil-alt"></i></button>
                </div>
                <div class="details-item" data-id="c4" data-fecha="10/06/2024" data-descripcion="Jornaleros" data-monto="3000" data-tipo="Mano de obra">
                    <i class="fas fa-hand-holding-usd icon"></i>
                    <div class="info description">Jornaleros</div>
                    <div class="info col-date">10/06/2024</div>
                    <div class="info col-amount">$3,000</div>
                    <div class="info col-type">Mano de obra</div>
                    <button class="btn btn-sm btn-info edit-item-btn" data-toggle="modal" data-target="#movimientoEditModal" data-modal-type="edit"><i class="fas fa-pencil-alt"></i></button>
                </div>
            </div>
            <button class="btn-add" data-toggle="modal" data-target="#movimientoEditModal" data-modal-type="add">Agregar</button>
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
                <form id="editMovimientoForm">
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

                    <div id="nomina-modal-fields" style="display:none;">
                        <div class="form-group">
                            <label for="movimiento-nombre-empleado" class="form-label">Nombre del Empleado</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="movimiento-nombre-empleado" name="nombre_empleado" placeholder="Nombre completo del empleado">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="movimiento-monto-nomina" class="form-label">Monto</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="number" step="0.01" class="form-control" id="movimiento-monto-nomina" name="monto_nomina" placeholder="0.00">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="movimiento-tipo-nomina" class="form-label">Tipo de Pago</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="movimiento-tipo-nomina" name="tipo_nomina" placeholder="Ej: Pago quincenal, Pago semanal">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-file-invoice-dollar"></i></span>
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

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
$(document).ready(function() {
    // Function to hide all specific modal fields
    function hideAllModalFields() {
        $('#general-movimiento-fields').hide();
        $('#nomina-modal-fields').hide();
    }

    // Function to update modal fields based on category
    function updateModalFields(category) {
        hideAllModalFields(); // Hide all fields first

        if (category === 'nomina') {
            $('#nomina-modal-fields').show();
            $('#movimientoEditModalLabel').text('Registrar Pago de Nómina');
        } else {
            $('#general-movimiento-fields').show();
            $('#movimientoEditModalLabel').text('Registrar Movimiento de ' + category.charAt(0).toUpperCase() + category.slice(1));
        }
    }

    // Handle tab change
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        let activeTabId = $(e.target).attr('id');
        let category = activeTabId.replace('-tab', '');
        // Update the hidden input for category in the modal
        $('#movimiento-categoria').val(category);
        // Update modal fields immediately when tab changes
        updateModalFields(category);
    });

    // Handle modal show event for 'Add' button
    $('.btn-add').on('click', function() {
        let modalType = $(this).data('modal-type');
        let currentTabId = $('ul.nav-tabs li a.active').attr('id');
        let category = currentTabId.replace('-tab', '');

        $('#movimiento-modal-type').val(modalType);
        $('#movimiento-categoria').val(category);

        // Reset form and set current date for 'add'
        $('#editMovimientoForm')[0].reset();
        let today = new Date();
        let dd = String(today.getDate()).padStart(2, '0');
        let mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        let yyyy = today.getFullYear();
        $('#movimiento-fecha').val(yyyy + '-' + mm + '-' + dd);

        updateModalFields(category);
    });

    // Handle modal show event for 'Edit' buttons
    $('.details-section').on('click', '.edit-item-btn', function(event) {
        event.stopPropagation(); // Prevent the parent .details-item click from firing
        let button = $(this);
        let modalType = button.data('modal-type');
        let row = button.closest('.details-item');
        let currentTabId = $('ul.nav-tabs li a.active').attr('id');
        let category = currentTabId.replace('-tab', '');

        $('#movimiento-modal-type').val(modalType);
        $('#movimiento-categoria').val(category);

        updateModalFields(category); // Update fields before populating

        // Populate fields based on category
        $('#movimiento-id').val(row.data('id'));
        $('#movimiento-fecha').val(row.data('fecha').split('/').reverse().join('-')); // Format date for input type="date"

        if (category === 'nomina') {
            $('#movimiento-nombre-empleado').val(row.data('nombre'));
            $('#movimiento-monto-nomina').val(row.data('monto'));
            $('#movimiento-tipo-nomina').val(row.data('tipo'));
        } else {
            $('#movimiento-descripcion').val(row.data('descripcion'));
            $('#movimiento-monto').val(row.data('monto'));
            $('#movimiento-tipo').val(row.data('tipo'));
        }
    });

    // Handle modal submission (for demonstration)
    $('#editMovimientoForm').on('submit', function(e) {
        e.preventDefault(); // Prevent default form submission

        let formData = {};
        $(this).find(':input').each(function() {
            let name = $(this).attr('name');
            let value = $(this).val();
            if (name && value !== undefined) { // Only add if name exists and value is not undefined
                formData[name] = value;
            }
        });

        console.log("Form data submitted:", formData);
        alert("Movimiento guardado/actualizado (ver consola). Implementa tu lógica de backend aquí.");
        $('#movimientoEditModal').modal('hide'); // Hide modal after submission
        // In a real application, you would send this data to a server
        // and then update the table dynamically or reload the page.
    });

    // Initial setup on page load for the active tab (Insumos by default)
    let initialActiveTabId = $('ul.nav-tabs li a.active').attr('id');
    if (initialActiveTabId) {
        let initialCategory = initialActiveTabId.replace('-tab', '');
        updateModalFields(initialCategory);
    }
});
</script>

</body>
</html>