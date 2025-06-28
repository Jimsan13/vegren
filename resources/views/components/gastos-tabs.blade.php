<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gastos por Categoría</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: sans-serif;
            background-color: #f8f9fa;
        }
        .gastos-tabs .nav-link {
            color: #495057;
            border: 1px solid transparent;
            border-top-left-radius: .25rem;
            border-top-right-radius: .25rem;
        }
        .gastos-tabs .nav-link.active {
            color: #495057;
            background-color: #fff;
            border-color: #dee2e6 #dee2e6 #fff;
            font-weight: bold;
        }
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,.05);
            margin-top: 20px;
        }
        .table thead.thead-dark th {
            background-color:#28a745;
            color: #fff;
            border-color: #454d55;
        }
        .table-responsive {
            margin-top: 20px;
        }
        .total-amount {
            font-size: 1.2em;
            font-weight: bold;
            margin-top: 20px;
            color: #333;
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
        }
        .btn-add:hover {
            background-color: #218838;
        }
        .action-buttons .btn {
            padding: 5px 8px;
            font-size: 0.8em;
            margin-left: 5px;
        }
        .delete-btn {
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 4px;
        }
        .edit-btn {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
        }
    </style>
</head>
<body>

<div class="container mt-5">

    <ul class="nav nav-tabs mb-4 gastos-tabs" id="gastosTabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="maquinaria-tab" data-toggle="tab" href="#maquinaria" role="tab" aria-controls="maquinaria" aria-selected="true">
                Maquinaria y Transporte
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="extras-tab" data-toggle="tab" href="#extras" role="tab" aria-controls="extras" aria-selected="false">
                Gastos extras
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="gasolina-tab" data-toggle="tab" href="#gasolina" role="tab" aria-controls="gasolina" aria-selected="false">
                Gasolina
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="deudores-tab" data-toggle="tab" href="#deudores" role="tab" aria-controls="deudores" aria-selected="false">
                Deudores
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="nomina-tab" data-toggle="tab" href="#nomina" role="tab" aria-controls="nomina" aria-selected="false">
                Nómina
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pagonotas-tab" data-toggle="tab" href="#pagonotas" role="tab" aria-controls="pagonotas" aria-selected="false">
                Pago de notas
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="utilidades-tab" data-toggle="tab" href="#utilidades" role="tab" aria-controls="utilidades" aria-selected="false">
                Repartición de utilidades
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="campo-tab" data-toggle="tab" href="#campo" role="tab" aria-controls="campo" aria-selected="false">
                Campo
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="cliente-tab" data-toggle="tab" href="#cliente" role="tab" aria-controls="cliente" aria-selected="false">
                Gastos del cliente
            </a>
        </li>
    </ul>

    <div class="tab-content" id="gastosTabsContent">
        <div class="tab-pane fade show active" id="maquinaria" role="tabpanel" aria-labelledby="maquinaria-tab">
            <h4>Adquisición de Maquinaria y Transporte</h4>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Fecha</th>
                            <th>Monto</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>10/06/2024</td>
                            <td>$12,000</td>
                            <td>Compra de montacargas</td>
                            <td class="action-buttons">
                                <button class="delete-btn">🗑️</button>
                                <button class="edit-btn">✏️</button>
                            </td>
                        </tr>
                        <tr>
                            <td>12/06/2024</td>
                            <td>$2,500</td>
                            <td>Transporte maquinaria</td>
                            <td class="action-buttons">
                                <button class="delete-btn">🗑️</button>
                                <button class="edit-btn">✏️</button>
                            </td>
                        </tr>
                        </tbody>
                </table>
            </div>
            <div class="total-amount">
                Total: $14,500
            </div>
            <button class="btn-add">Agregar</button>
        </div>

        <div class="tab-pane fade" id="extras" role="tabpanel" aria-labelledby="extras-tab">
            <h4>Gastos Extras</h4>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Fecha</th>
                            <th>Monto</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>01/05/2024</td>
                            <td>$500</td>
                            <td>Gastos de oficina</td>
                            <td class="action-buttons">
                                <button class="delete-btn">🗑️</button>
                                <button class="edit-btn">✏️</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="total-amount">
                Total: $500
            </div>
            <button class="btn-add">Agregar</button>
        </div>

        <div class="tab-pane fade" id="gasolina" role="tabpanel" aria-labelledby="gasolina-tab">
            <h4>Gastos de Gasolina</h4>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Fecha</th>
                            <th>Monto</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>05/06/2024</td>
                            <td>$300</td>
                            <td>Gasolina camioneta reparto</td>
                            <td class="action-buttons">
                                <button class="delete-btn">🗑️</button>
                                <button class="edit-btn">✏️</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="total-amount">
                Total: $300
            </div>
            <button class="btn-add">Agregar</button>
        </div>

        <div class="tab-pane fade" id="deudores" role="tabpanel" aria-labelledby="deudores-tab">
            <h4>Deudores</h4>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Fecha</th>
                            <th>Monto</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>15/06/2024</td>
                            <td>$1,000</td>
                            <td>Pago a proveedor X</td>
                            <td class="action-buttons">
                                <button class="delete-btn">🗑️</button>
                                <button class="edit-btn">✏️</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="total-amount">
                Total: $1,000
            </div>
            <button class="btn-add">Agregar</button>
        </div>

        <div class="tab-pane fade" id="nomina" role="tabpanel" aria-labelledby="nomina-tab">
            <h4>Gastos de Nómina</h4>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Fecha</th>
                            <th>Monto</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>30/05/2024</td>
                            <td>$8,000</td>
                            <td>Nómina quincenal empleados</td>
                            <td class="action-buttons">
                                <button class="delete-btn">🗑️</button>
                                <button class="edit-btn">✏️</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="total-amount">
                Total: $8,000
            </div>
            <button class="btn-add">Agregar</button>
        </div>

        <div class="tab-pane fade" id="pagonotas" role="tabpanel" aria-labelledby="pagonotas-tab">
            <h4>Pago de Notas</h4>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Fecha</th>
                            <th>Monto</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>20/06/2024</td>
                            <td>$700</td>
                            <td>Pago nota materiales</td>
                            <td class="action-buttons">
                                <button class="delete-btn">🗑️</button>
                                <button class="edit-btn">✏️</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="total-amount">
                Total: $700
            </div>
            <button class="btn-add">Agregar</button>
        </div>

        <div class="tab-pane fade" id="utilidades" role="tabpanel" aria-labelledby="utilidades-tab">
            <h4>Repartición de Utilidades</h4>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Fecha</th>
                            <th>Monto</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>10/06/2024</td>
                            <td>$2,000</td>
                            <td>Repartición anual</td>
                            <td class="action-buttons">
                                <button class="delete-btn">🗑️</button>
                                <button class="edit-btn">✏️</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="total-amount">
                Total: $2,000
            </div>
            <button class="btn-add">Agregar</button>
        </div>

        <div class="tab-pane fade" id="campo" role="tabpanel" aria-labelledby="campo-tab">
            <h4>Gastos de Campo</h4>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Fecha</th>
                            <th>Monto</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>08/06/2024</td>
                            <td>$400</td>
                            <td>Insumos agrícolas</td>
                            <td class="action-buttons">
                                <button class="delete-btn">🗑️</button>
                                <button class="edit-btn">✏️</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="total-amount">
                Total: $400
            </div>
            <button class="btn-add">Agregar</button>
        </div>

        <div class="tab-pane fade" id="cliente" role="tabpanel" aria-labelledby="cliente-tab">
            <h4>Gastos del Cliente</h4>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Fecha</th>
                            <th>Monto</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>25/06/2024</td>
                            <td>$150</td>
                            <td>Envío a cliente A</td>
                            <td class="action-buttons">
                                <button class="delete-btn">🗑️</button>
                                <button class="edit-btn">✏️</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="total-amount">
                Total: $150
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