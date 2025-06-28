<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros de Proveedores</title>
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
        .nav-tabs .nav-link {
            color: #495057;
            border: 1px solid transparent;
            border-top-left-radius: .25rem;
            border-top-right-radius: .25rem;
            padding: .5rem 1rem;
        }
        .nav-tabs .nav-link.active {
            color: #28a745; /* Green for active tab */
            background-color: #fff;
            border-color: #dee2e6 #dee2e6 #fff;
            font-weight: bold;
        }
        .list-header {
            font-size: 1.2em;
            font-weight: bold;
            margin-bottom: 15px;
            color: #343a40;
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
            padding-right: 10px; /* Add some padding between columns */
        }
        .details-item .info.col-supplier {
            flex-basis: 150px; /* Adjust width for supplier name */
            min-width: 150px;
            font-weight: bold;
            color: #343a40;
        }
        .details-item .info.col-quantity {
            flex-basis: 80px; /* Width for quantity */
            min-width: 80px;
            text-align: left;
        }
        .details-item .info.col-date {
            flex-basis: 120px; /* Width for date */
            min-width: 120px;
            text-align: left;
            color: #6c757d;
        }
        .details-item .info.col-status {
            flex-basis: 100px; /* Width for status */
            min-width: 100px;
            text-align: left;
            font-weight: bold;
        }
        .details-item .info.col-amount {
            flex-basis: 90px; /* Width for amount */
            min-width: 90px;
            text-align: right;
            font-weight: bold;
            color: #28a745;
        }
        .details-item .info.col-invoice {
            flex-basis: 100px;
            min-width: 100px;
            text-align: left;
            font-weight: bold;
        }
         .details-item .action-buttons {
            display: flex;
            gap: 5px; /* Space between buttons */
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
        .content-section {
            display: none; /* Hide all content sections by default */
        }
        .content-section.active {
            display: block; /* Show active content section */
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="main-content">
        

        <ul class="nav nav-tabs mb-4" id="proveedoresTabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="todos-tab" data-toggle="tab" href="#todos" role="tab" aria-controls="todos" aria-selected="true">
                    Todos
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="activos-tab" data-toggle="tab" href="#activos" role="tab" aria-controls="activos" aria-selected="false">
                    Activos
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="facturados-tab" data-toggle="tab" href="#facturados" role="tab" aria-controls="facturados" aria-selected="false">
                    Facturados
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pendientes-tab" data-toggle="tab" href="#pendientes" role="tab" aria-controls="pendientes" aria-selected="false">
                    Pendientes
                </a>
            </li>
        </ul>

        <div class="tab-content" id="proveedoresTabsContent">
            <div class="tab-pane fade show active" id="todos" role="tabpanel" aria-labelledby="todos-tab">
                <div class="list-header">Lista de registros</div>
                <div class="details-section">
                    <div class="details-item">
                        <i class="fas fa-user-circle icon"></i>
                        <div class="info col-supplier">Proveedor A</div>
                        <div class="info col-quantity">10 cajas</div>
                        <div class="info col-date">12/06/2024</div>
                        <div class="info col-status" style="color: #28a745;">Facturado</div>
                        <div class="info col-amount text-right">$1,200</div>
                        <div class="action-buttons">
                            <button class="btn btn-danger btn-delete"><i class="fas fa-times"></i></button>
                            <button class="btn btn-info btn-edit"><i class="fas fa-pencil-alt"></i></button>
                        </div>
                    </div>
                    <div class="details-item">
                        <i class="fas fa-user-circle icon"></i>
                        <div class="info col-supplier">Proveedor B</div>
                        <div class="info col-quantity">8 cajas</div>
                        <div class="info col-date">11/06/2024</div>
                        <div class="info col-status" style="color: #ffc107;">Pendiente</div>
                        <div class="info col-amount text-right">$950</div>
                        <div class="action-buttons">
                            <button class="btn btn-danger btn-delete"><i class="fas fa-times"></i></button>
                            <button class="btn btn-info btn-edit"><i class="fas fa-pencil-alt"></i></button>
                        </div>
                    </div>
                    <div class="details-item">
                        <i class="fas fa-user-circle icon"></i>
                        <div class="info col-supplier">Proveedor C</div>
                        <div class="info col-quantity">15 cajas</div>
                        <div class="info col-date">10/06/2024</div>
                        <div class="info col-status" style="color: #28a745;">Facturado</div>
                        <div class="info col-amount text-right">$1,800</div>
                        <div class="action-buttons">
                            <button class="btn btn-danger btn-delete"><i class="fas fa-times"></i></button>
                            <button class="btn btn-info btn-edit"><i class="fas fa-pencil-alt"></i></button>
                        </div>
                    </div>
                </div>
                <button class="btn-add"><i class="fas fa-plus-circle"></i> Agregar</button>
            </div>

            <div class="tab-pane fade" id="activos" role="tabpanel" aria-labelledby="activos-tab">
                <div class="list-header">Proveedores Activos</div>
                <div class="details-section">
                    <div class="details-item">
                        <i class="fas fa-user-circle icon"></i>
                        <div class="info col-supplier">Proveedor A</div>
                        <div class="info col-status" style="color: #28a745;">Activo</div>
                        <div class="info col-quantity">Cajas: 120</div>
                        <div class="info col-date">Última entrega: 10/06</div>
                        <div class="action-buttons">
                            <button class="btn btn-danger btn-delete"><i class="fas fa-times"></i></button>
                            <button class="btn btn-info btn-edit"><i class="fas fa-pencil-alt"></i></button>
                        </div>
                    </div>
                    <div class="details-item">
                        <i class="fas fa-user-circle icon"></i>
                        <div class="info col-supplier">Proveedor C</div>
                        <div class="info col-status" style="color: #28a745;">Activo</div>
                        <div class="info col-quantity">Cajas: 80</div>
                        <div class="info col-date">Última entrega: 08/06</div>
                        <div class="action-buttons">
                            <button class="btn btn-danger btn-delete"><i class="fas fa-times"></i></button>
                            <button class="btn btn-info btn-edit"><i class="fas fa-pencil-alt"></i></button>
                        </div>
                    </div>
                </div>
                <button class="btn-add"><i class="fas fa-plus-circle"></i> Agregar</button>
            </div>

            <div class="tab-pane fade" id="facturados" role="tabpanel" aria-labelledby="facturados-tab">
                <div class="list-header">Facturación</div>
                <div class="details-section">
                    <div class="details-item">
                        <i class="fas fa-file-invoice icon"></i>
                        <div class="info col-supplier">Proveedor A</div>
                        <div class="info col-invoice">Factura #123</div>
                        <div class="info col-amount text-right">$1,200</div>
                        <div class="info col-status" style="color: #28a745;">Pagado</div>
                        <div class="action-buttons">
                            <button class="btn btn-danger btn-delete"><i class="fas fa-times"></i></button>
                            <button class="btn btn-info btn-edit"><i class="fas fa-pencil-alt"></i></button>
                        </div>
                    </div>
                    <div class="details-item">
                        <i class="fas fa-file-invoice icon"></i>
                        <div class="info col-supplier">Proveedor B</div>
                        <div class="info col-invoice">Factura #124</div>
                        <div class="info col-amount text-right">$950</div>
                        <div class="info col-status" style="color: #ffc107;">Pendiente</div>
                        <div class="action-buttons">
                            <button class="btn btn-danger btn-delete"><i class="fas fa-times"></i></button>
                            <button class="btn btn-info btn-edit"><i class="fas fa-pencil-alt"></i></button>
                        </div>
                    </div>
                </div>
                <button class="btn-add"><i class="fas fa-plus-circle"></i> Agregar</button>
            </div>

            <div class="tab-pane fade" id="pendientes" role="tabpanel" aria-labelledby="pendientes-tab">
                <div class="list-header">Pendientes</div>
                <div class="details-section">
                    <div class="details-item">
                        <i class="fas fa-user-circle icon"></i>
                        <div class="info col-supplier">Proveedor B</div>
                        <div class="info col-quantity">8 cajas</div>
                        <div class="info col-date">14/06/2024</div>
                        <div class="info col-status" style="color: #ffc107;">Pendiente</div>
                        <div class="info col-amount text-right">$950</div>
                        <div class="action-buttons">
                            <button class="btn btn-danger btn-delete"><i class="fas fa-times"></i></button>
                            <button class="btn btn-info btn-edit"><i class="fas fa-pencil-alt"></i></button>
                        </div>
                    </div>
                    <div class="details-item">
                        <i class="fas fa-user-circle icon"></i>
                        <div class="info col-supplier">Proveedor D</div>
                        <div class="info col-quantity">20 cajas</div>
                        <div class="info col-date">13/06/2024</div>
                        <div class="info col-status" style="color: #ffc107;">Pendiente</div>
                        <div class="info col-amount text-right">$2,400</div>
                        <div class="action-buttons">
                            <button class="btn btn-danger btn-delete"><i class="fas fa-times"></i></button>
                            <button class="btn btn-info btn-edit"><i class="fas fa-pencil-alt"></i></button>
                        </div>
                    </div>
                </div>
                <button class="btn-add"><i class="fas fa-plus-circle"></i> Agregar</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>