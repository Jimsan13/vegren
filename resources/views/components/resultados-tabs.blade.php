<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estado de Resultados</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Estilos generales */
        body {
            font-family: sans-serif;
            background-color: #f0fff0; /* Light green background */
            color: #343a40;
        }
        .container-fluid {
            padding: 30px;
        }
        h3 {
            font-weight: bold;
            color: #28a745; /* Green color for main headings */
        }
        h4 {
            color: #343a40;
            margin-bottom: 20px;
        }

        /* Estilos de las tarjetas de resumen */
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
            color: #28a745; /* Default green */
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
        /* Colores de iconos específicos para las tarjetas de Resultados */
        .card-summary.sales-summary .icon { color: #28a745; } /* Green */
        .card-summary.cost-summary .icon { color: #dc3545; } /* Red */
        .card-summary.profit-summary .icon { color: #17a2b8; } /* Info blue */
        .card-summary.profit-before-tax .icon { color: #ffc107; } /* Yellow */


        /* Estilos para la sección de detalles (Gastos) */
        .details-section {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,.05);
            margin-bottom: 20px;
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
            font-size: 1.2em;
            margin-right: 15px;
            color: #6c757d;
            width: 25px; /* Adjust icon width for alignment */
            text-align: center;
        }
        .details-item .col-concept { /* Similar to col-info in finanzas-tabs */
            flex: 1.5;
            padding: 0 5px;
            font-size: 0.95em;
        }
        .details-item .col-amount {
            flex: 1; /* Adjust flex for amount column */
            text-align: right;
            font-weight: bold;
        }
        .text-success { color: #28a745 !important; }
        .text-danger { color: #dc3545 !important; }
    </style>
</head>
<body>

<div class="container-fluid mt-5"> <div class="resultados-container">
        <h3 class="fw-bold text-success mb-4">Estado de Resultados</h3>

        <h4 class="mt-4">Resumen</h4>
        <div class="row">
            <div class="col-md-4">
                <div class="card-summary sales-summary">
                    <i class="fas fa-shopping-cart icon"></i>
                    <div>
                        <div class="title">Total Ventas</div>
                        <div class="value">$1,200,000</div>
                        <div class="description"></div> {{-- Description is empty in the image --}}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-summary cost-summary">
                    <i class="fas fa-dollar-sign icon"></i>
                    <div>
                        <div class="title">Costos Producto</div>
                        <div class="value">$800,000</div>
                        <div class="description"></div> {{-- Description is empty in the image --}}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-summary profit-summary">
                    <i class="fas fa-money-bill-alt icon"></i>
                    <div>
                        <div class="title">Utilidad Bruta</div>
                        <div class="value">$400,000</div>
                        <div class="description"></div> {{-- Description is empty in the image --}}
                    </div>
                </div>
            </div>
        </div>

        <h4 class="mt-4">Gastos</h4>
        <div class="details-section">
            <div class="details-item">
                <i class="fas fa-users icon"></i>
                <div class="info col-concept">Nómina</div>
                <div class="info col-amount text-right">$120,000</div>
            </div>
            <div class="details-item">
                <i class="fas fa-tag icon"></i>
                <div class="info col-concept">Ventas</div>
                <div class="info col-amount text-right">$60,000</div>
            </div>
            <div class="details-item">
                <i class="fas fa-truck icon"></i>
                <div class="info col-concept">Fletes</div>
                <div class="info col-amount text-right">$30,000</div>
            </div>
            <div class="details-item">
                <i class="fas fa-list icon"></i>
                <div class="info col-concept">Varios</div>
                <div class="info col-amount text-right">$10,000</div>
            </div>
            <div class="details-item">
                <i class="fas fa-gas-pump icon"></i>
                <div class="info col-concept">Gasolina</div>
                <div class="info col-amount text-right">$10,000</div>
            </div>
            <div class="details-item">
                <i class="fas fa-share-alt icon"></i>
                <div class="info col-concept">Reparticiones</div>
                <div class="info col-amount text-right">$8,000</div>
            </div>
        </div>

        <h4 class="mt-4">Utilidad antes de impuestos</h4>
        <div class="row">
            <div class="col-md-4">
                <div class="card-summary profit-before-tax">
                    <i class="fas fa-calculator icon"></i>
                    <div>
                        <div class="title">Utilidad antes de impuestos</div>
                        <div class="value">$157,000</div>
                        <div class="description"></div> {{-- Description is empty in the image --}}
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