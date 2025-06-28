<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Carga</title>
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
        .main-content {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,.05);
        }
        h2 {
            margin-bottom: 20px;
            color: #343a40;
        }
        .table-header {
            font-size: 1.2em;
            font-weight: bold;
            margin-bottom: 15px;
            color: #343a40;
        }
        .details-section {
            background-color: #fff;
            border-radius: 8px;
            padding: 10px 0; /* Adjusted padding for table items */
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
        .details-item .info {
            flex-grow: 1;
            padding: 0 10px; /* Padding for columns */
            text-align: left; /* Default text align */
            color: #343a40;
        }
        /* Specific column widths for the "Tabla de cargas" to ensure alignment */
        .details-item .col-fecha {
            flex-basis: 150px;
            min-width: 150px;
            font-weight: bold;
        }
        .details-item .col-lote {
            flex-basis: 120px;
            min-width: 120px;
            font-weight: bold;
        }
        .details-item .col-cliente {
            flex-basis: 120px;
            min-width: 120px;
            font-weight: bold;
        }
        .details-item .col-bultos {
            flex-basis: 80px;
            min-width: 80px;
            text-align: center;
        }
        .details-item .col-precio {
            flex-basis: 80px;
            min-width: 80px;
            text-align: left;
        }
        .details-item .col-anticipo {
            flex-basis: 120px;
            min-width: 120px;
            text-align: left;
        }
        .details-item .col-total-envio {
            flex-basis: 120px;
            min-width: 120px;
            text-align: left;
        }
        .details-item .col-saldo {
            flex-basis: 100px;
            min-width: 100px;
            text-align: right;
            font-weight: bold;
        }
         .details-item .action-buttons {
            display: flex;
            gap: 5px; /* Space between buttons */
            flex-basis: 70px;
            min-width: 70px;
            justify-content: flex-end;
        }
        .details-item .action-buttons .btn {
            width: 30px;
            height: 30px;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 4px;
        }
        .btn-delete {
            background-color: #dc3545;
            color: white;
            border: none;
        }
        .btn-edit {
            background-color: #007bff;
            color: white;
            border: none;
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
            margin-left: auto; /* Aligns to the right */
            width: fit-content;
        }
        .btn-add:hover {
            background-color: #218838;
        }

        .indicators-section {
            margin-top: 30px;
        }
        .card-indicator {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,.05);
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .card-indicator .icon {
            font-size: 2.5em;
            margin-right: 15px;
            color: #28a745; /* Green */
        }
        .card-indicator .icon.orange {
            color: #ffc107; /* Orange for Pendiente */
        }
        .card-indicator .icon.red {
            color: #dc3545; /* Red for Adeudos */
        }
        .card-indicator .title {
            font-size: 0.9em;
            color: #6c757d;
            margin-bottom: 5px;
        }
        .card-indicator .value {
            font-size: 1.5em;
            font-weight: bold;
            color: #343a40;
        }
        .card-indicator .description {
            font-size: 0.8em;
            color: #6c757d;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="main-content">
     
        <p>Complete los datos para registrar o editar una operación de carga.</p>

        <div class="table-header">Tabla de cargas</div>
        <button class="btn-add" style="margin-right: 0; margin-left: unset; float: right; margin-top: -50px;"><i class="fas fa-plus-circle"></i> Agregar</button>

        <div class="details-section">
            <div class="details-item">
                <div class="info col-fecha">12/06/2024</div>
                <div class="info col-lote">LT-001</div>
                <div class="info col-cliente">Cliente A</div>
                <div class="info col-bultos">10</div>
                <div class="info col-precio">$120 Sí</div>
                <div class="info col-anticipo">$1,200</div>
                <div class="info col-total-envio">$800</div>
                <div class="info col-saldo text-right">$800.00</div>
                <div class="action-buttons">
                    <button class="btn btn-danger btn-delete"><i class="fas fa-times"></i></button>
                    <button class="btn btn-info btn-edit"><i class="fas fa-pencil-alt"></i></button>
                </div>
            </div>
            <div class="details-item">
                <div class="info col-fecha">13/06/2024</div>
                <div class="info col-lote">LT-002</div>
                <div class="info col-cliente">Cliente B</div>
                <div class="info col-bultos">8</div>
                <div class="info col-precio">$150 No</div>
                <div class="info col-anticipo">$1,200</div>
                <div class="info col-total-envio">$1,200</div>
                <div class="info col-saldo text-right">$1,200.00</div>
                <div class="action-buttons">
                    <button class="btn btn-danger btn-delete"><i class="fas fa-times"></i></button>
                    <button class="btn btn-info btn-edit"><i class="fas fa-pencil-alt"></i></button>
                </div>
            </div>
            <div class="details-item">
                <div class="info col-fecha">14/06/2024</div>
                <div class="info col-lote">LT-003</div>
                <div class="info col-cliente">Cliente C</div>
                <div class="info col-bultos">12</div>
                <div class="info col-precio">$100 Sí</div>
                <div class="info col-anticipo">$1,200</div>
                <div class="info col-total-envio">$900</div>
                <div class="info col-saldo text-right">$900.00</div>
                <div class="action-buttons">
                    <button class="btn btn-danger btn-delete"><i class="fas fa-times"></i></button>
                    <button class="btn btn-info btn-edit"><i class="fas fa-pencil-alt"></i></button>
                </div>
            </div>
        </div>

        <div class="indicators-section row">
            <div class="col-md-4">
                <div class="card-indicator">
                    <i class="fas fa-chart-line icon"></i>
                    <div>
                        <div class="title">Ventas mensuales</div>
                        <div class="value">$120,000</div>
                        <div class="description">Total ventas este mes</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-indicator">
                    <i class="fas fa-hourglass-half icon orange"></i>
                    <div>
                        <div class="title">Estado de pago</div>
                        <div class="value">Pendiente</div>
                        <div class="description">Pagos por recibir</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-indicator">
                    <i class="fas fa-exclamation-triangle icon red"></i>
                    <div>
                        <div class="title">Adeudos</div>
                        <div class="value">$8,500</div>
                        <div class="description">Saldo pendiente</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>