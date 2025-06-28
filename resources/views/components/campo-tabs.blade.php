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
            <div class="details-section">
                <div class="details-item">
                    <i class="fas fa-seedling icon"></i>
                    <div class="info description">Fertilizante</div>
                    <div class="info col-date">05/06/2024</div>
                    <div class="info col-amount">$8,000</div>
                    <div class="info col-type">Compra</div>
                </div>
                <div class="details-item">
                    <i class="fas fa-tint icon"></i>
                    <div class="info description">Riego</div>
                    <div class="info col-date">03/06/2024</div>
                    <div class="info col-amount">$2,500</div>
                    <div class="info col-type">Servicio</div>
                </div>
                <div class="details-item">
                    <i class="fas fa-cut icon"></i>
                    <div class="info description">Poda</div>
                    <div class="info col-date">01/06/2024</div>
                    <div class="info col-amount">$1,200</div>
                    <div class="info col-type">Mano de obra</div>
                </div>
            </div>
            <button class="btn-add">Agregar</button>
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
            <div class="details-section">
                <div class="details-item">
                    <i class="fas fa-user icon"></i>
                    <div class="info col-name">Juan Pérez</div>
                    <div class="info col-date">05/06/2024</div>
                    <div class="info col-amount">$4,000</div>
                    <div class="info col-type">Pago quincenal</div>
                </div>
                <div class="details-item">
                    <i class="fas fa-user icon"></i>
                    <div class="info col-name">Ana López</div>
                    <div class="info col-date">03/06/2024</div>
                    <div class="info col-amount">$3,800</div>
                    <div class="info col-type">Pago semanal</div>
                </div>
                <div class="details-item">
                    <i class="fas fa-user icon"></i>
                    <div class="info col-name">Carlos Ruiz</div>
                    <div class="info col-date">01/06/2024</div>
                    <div class="info col-amount">$4,200</div>
                    <div class="info col-type">Pago quincenal</div>
                </div>
            </div>
            <button class="btn-add">Agregar</button>
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
            <div class="details-section">
                <div class="details-item">
                    <i class="fas fa-seedling icon"></i>
                    <div class="info description">Fertilizante NPK</div>
                    <div class="info col-date">04/06/2024</div>
                    <div class="info col-amount">$2,500</div>
                    <div class="info col-type">Compra</div>
                </div>
                <div class="details-item">
                    <i class="fas fa-flask icon"></i>
                    <div class="info description">Herbicida Selectivo</div>
                    <div class="info col-date">02/06/2024</div>
                    <div class="info col-amount">$1,200</div>
                    <div class="info col-type">Compra</div>
                </div>
                <div class="details-item">
                    <i class="fas fa-cereal icon"></i>
                    <div class="info description">Semillas Maíz</div>
                    <div class="info col-date">30/05/2024</div>
                    <div class="info col-amount">$3,000</div>
                    <div class="info col-type">Entrada</div>
                </div>
            </div>
            <button class="btn-add">Agregar</button>
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
            <div class="details-section">
                <div class="details-item">
                    <i class="fas fa-tractor icon"></i>
                    <div class="info description">Reparación tractor</div>
                    <div class="info col-date">01/06/2024</div>
                    <div class="info col-amount">$2,000</div>
                    <div class="info col-type">Servicio</div>
                </div>
                <div class="details-item">
                    <i class="fas fa-gas-pump icon"></i>
                    <div class="info description">Combustible</div>
                    <div class="info col-date">28/05/2024</div>
                    <div class="info col-amount">$1,500</div>
                    <div class="info col-type">Compra</div>
                </div>
                <div class="details-item">
                    <i class="fas fa-pump-medical icon"></i>
                    <div class="info description">Mantenimiento bomba</div>
                    <div class="info col-date">25/05/2024</div>
                    <div class="info col-amount">$700</div>
                    <div class="info col-type">Servicio</div>
                </div>
            </div>
            <button class="btn-add">Agregar</button>
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
            <div class="details-section">
                <div class="details-item">
                    <i class="fas fa-seedling icon"></i>
                    <div class="info description">Preparación de suelo</div>
                    <div class="info col-date">20/06/2024</div>
                    <div class="info col-amount">$5,000</div>
                    <div class="info col-type">Servicio</div>
                </div>
                <div class="details-item">
                    <i class="fas fa-water icon"></i>
                    <div class="info description">Sistema de riego</div>
                    <div class="info col-date">18/06/2024</div>
                    <div class="info col-amount">$7,500</div>
                    <div class="info col-type">Mantenimiento</div>
                </div>
                <div class="details-item">
                    <i class="fas fa-tractor icon"></i>
                    <div class="info description">Alquiler de tractor</div>
                    <div class="info col-date">15/06/2024</div>
                    <div class="info col-amount">$3,000</div>
                    <div class="info col-type">Servicio</div>
                </div>
                <div class="details-item">
                    <i class="fas fa-hand-holding-usd icon"></i>
                    <div class="info description">Jornaleros</div>
                    <div class="info col-date">10/06/2024</div>
                    <div class="info col-amount">$3,000</div>
                    <div class="info col-type">Mano de obra</div>
                </div>
            </div>
            <button class="btn-add">Agregar</button>
        </div>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>