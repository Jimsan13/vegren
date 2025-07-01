<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gastos por Categoría</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
   <style>
    /* Estilos generales */
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f4f7f6;
        color: #333;
    }

    .container {
        background-color: #ffffff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        margin-top: 30px;
    }

    /* Estilos de las pestañas */
    .nav-tabs {
        border-bottom: 2px solid #218838;
    }

    .nav-tabs .nav-item .nav-link {
        color: #555;
        border: 1px solid transparent;
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
        padding: 12px 20px;
        transition: all 0.3s ease;
    }

    .nav-tabs .nav-item .nav-link.active {
        color: #fff;
        background-color:  #218838;
        border-color:rgb(7, 7, 7);
        border-radius: 5px 5px 0 0;
    }

    .nav-tabs .nav-item .nav-link:hover:not(.active) {
        background-color: #e9ecef;
        border-color: #e9ecef;
    }

    .gastos-tabs .nav-link {
        display: flex;
        align-items: center;
    }

    .gastos-tabs .nav-link i {
        font-size: 1.1em;
    }

    /* Contenido de las pestañas */
    .tab-content {
        padding: 20px 0;
    }

    .tab-pane h4 {
        color:rgb(0, 0, 0);
        margin-bottom: 20px;
        font-weight: 600;
    }

    /* Estilos de la tabla */
    .table {
        margin-bottom: 20px;
        border-collapse: separate;
        border-spacing: 0;
    }

    .table thead.thead-dark th {
        background-color: #343a40;
        color: #fff;
        border-color: #454d55;
        padding: 12px 15px;
        text-align: left;
    }

    .table tbody tr {
        background-color: #f8f9fa;
        transition: all 0.2s ease-in-out;
    }

    .table tbody tr:nth-child(even) {
        background-color: #e2e6ea;
    }

    .table tbody tr:hover {
        background-color: #d6eaff;
    }

    .table td, .table th {
        padding: 10px 15px;
        vertical-align: middle;
        border-top: 1px solid #dee2e6;
    }

    /* Botones de acción en la tabla */
    .action-buttons {
        white-space: nowrap;
    }

    .action-buttons .btn {
        padding: 5px 9px;
        font-size: 0.85em;
        margin-left: 5px;
        border-radius: 5px;
    }

    .delete-btn {
        background-color: #dc3545;
        color: white;
        border: none;
    }

    .delete-btn:hover {
        background-color: #c82333;
    }

    .edit-btn {
        background-color:rgb(7, 160, 255);
        color: white;
        border: none;
    }

    .edit-btn:hover {
        background-color:rgb(12, 155, 243);
    }

    /* Total amount display */
    .total-amount {
        font-size: 1.4em;
        font-weight: bold;
        color:rgb(10, 10, 10);
        text-align: right;
        margin-top: 15px;
        padding-top: 10px;
        border-top: 1px solid #eee;
    }

    /* Botón agregar */
    .btn-add {
        background-color: #218838;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        font-size: 1em;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: 20px;
        transition: background-color 0.3s ease;
    }

    .btn-add:hover {
        background-color: #0056b3;
        color: white;
    }

    .btn-add i {
        font-size: 1.2em;
    }

    /* Estilos del Modal */
    .modal-content {
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    }

    .modal-header {
        background-color: #007bff;
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
<div class="container mt-5">

    <ul class="nav nav-tabs mb-4 gastos-tabs" id="gastosTabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="maquinaria-tab" data-toggle="tab" href="#maquinaria" role="tab" aria-controls="maquinaria" aria-selected="true">
                <i class="fas fa-truck-moving mr-2"></i> Maquinaria y Transporte
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="extras-tab" data-toggle="tab" href="#extras" role="tab" aria-controls="extras" aria-selected="false">
                <i class="fas fa-ellipsis-h mr-2"></i> Gastos extras
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="gasolina-tab" data-toggle="tab" href="#gasolina" role="tab" aria-controls="gasolina" aria-selected="false">
                <i class="fas fa-gas-pump mr-2"></i> Gasolina
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="deudores-tab" data-toggle="tab" href="#deudores" role="tab" aria-controls="deudores" aria-selected="false">
                <i class="fas fa-hand-holding-usd mr-2"></i> Deudores
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="nomina-tab" data-toggle="tab" href="#nomina" role="tab" aria-controls="nomina" aria-selected="false">
                <i class="fas fa-users mr-2"></i> Nómina
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pagonotas-tab" data-toggle="tab" href="#pagonotas" role="tab" aria-controls="pagonotas" aria-selected="false">
                <i class="fas fa-file-invoice-dollar mr-2"></i> Pago de notas
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="cliente-tab" data-toggle="tab" href="#cliente" role="tab" aria-controls="cliente" aria-selected="false">
                <i class="fas fa-user-tag mr-2"></i> Gastos del cliente
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
                            <th>Pagos realizados</th>
                            <th>Total acumulado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="maquinaria-table-body">
                        <tr data-id="m1" data-fecha="10/06/2024" data-monto="12000" data-pagos-realizados="8000" data-total-acumulado="4000">
                            <td>10/06/2024</td>
                            <td>$12,000.00</td>
                            <td>$8,000.00</td>
                            <td>$4,000.00</td>
                            <td class="action-buttons">
                                <button class="btn delete-btn"><i class="fas fa-times"></i></button>
                                <button class="btn edit-btn" data-toggle="modal" data-target="#gastoEditModal" data-modal-type="edit"><i class="fas fa-pencil-alt"></i></button>
                            </td>
                        </tr>
                        <tr data-id="m2" data-fecha="12/06/2024" data-monto="2500" data-pagos-realizados="2500" data-total-acumulado="0">
                            <td>12/06/2024</td>
                            <td>$2,500.00</td>
                            <td>$2,500.00</td>
                            <td>$0.00</td>
                            <td class="action-buttons">
                                <button class="btn delete-btn"><i class="fas fa-times"></i></button>
                                <button class="btn edit-btn" data-toggle="modal" data-target="#gastoEditModal" data-modal-type="edit"><i class="fas fa-pencil-alt"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="total-amount" id="maquinaria-total">
                Total Acumulado General: $4,000.00
            </div>
            <button class="btn btn-add" data-toggle="modal" data-target="#gastoEditModal" data-modal-type="add">
                <i class="fas fa-plus-circle mr-2"></i> Agregar
            </button>
        </div>

        <div class="tab-pane fade" id="extras" role="tabpanel" aria-labelledby="extras-tab">
            <h4>Gastos Extras</h4>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Fecha</th>
                            <th>Entrega</th>
                            <th>Recibe</th>
                            <th>Descripción</th>
                            <th>Monto</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="extras-table-body">
                        <tr data-id="e1" data-fecha="01/05/2024" data-entrega="Proveedor X" data-recibe="Juan Pérez" data-descripcion="Gastos de oficina" data-monto="500">
                            <td>01/05/2024</td>
                            <td>Proveedor X</td>
                            <td>Juan Pérez</td>
                            <td>Gastos de oficina</td>
                            <td>$500.00</td>
                            <td class="action-buttons">
                                <button class="btn delete-btn"><i class="fas fa-times"></i></button>
                                <button class="btn edit-btn" data-toggle="modal" data-target="#gastoEditModal" data-modal-type="edit"><i class="fas fa-pencil-alt"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="total-amount" id="extras-total">
                Total: $500.00
            </div>
            <button class="btn btn-add" data-toggle="modal" data-target="#gastoEditModal" data-modal-type="add">
                <i class="fas fa-plus-circle mr-2"></i> Agregar
            </button>
        </div>

        <div class="tab-pane fade" id="gasolina" role="tabpanel" aria-labelledby="gasolina-tab">
            <h4>Gastos de Gasolina</h4>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Fecha</th>
                            <th>Recibe</th>
                            <th>Método de pago</th>
                            <th>Monto</th>
                            <th>Unidad</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="gasolina-table-body">
                        <tr data-id="g1" data-fecha="05/06/2024" data-recibe="Pedro Gómez" data-metodo-pago="Tarjeta" data-monto="300" data-unidad="Camioneta R-123">
                            <td>05/06/2024</td>
                            <td>Pedro Gómez</td>
                            <td>Tarjeta</td>
                            <td>$300.00</td>
                            <td>Camioneta R-123</td>
                            <td class="action-buttons">
                                <button class="btn delete-btn"><i class="fas fa-times"></i></button>
                                <button class="btn edit-btn" data-toggle="modal" data-target="#gastoEditModal" data-modal-type="edit"><i class="fas fa-pencil-alt"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="total-amount" id="gasolina-total">
                Total: $300.00
            </div>
            <button class="btn btn-add" data-toggle="modal" data-target="#gastoEditModal" data-modal-type="add">
                <i class="fas fa-plus-circle mr-2"></i> Agregar
            </button>
        </div>

        <div class="tab-pane fade" id="deudores" role="tabpanel" aria-labelledby="deudores-tab">
            <h4>Deudores</h4>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Fecha</th>
                            <th>Entrega</th>
                            <th>Recibe</th>
                            <th>Monto</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="deudores-table-body">
                        <tr data-id="d1" data-fecha="15/06/2024" data-entrega="Empresa XYZ" data-recibe="Juan Pérez" data-monto="1000" data-descripcion="Préstamo a empleado Juan">
                            <td>15/06/2024</td>
                            <td>Empresa XYZ</td>
                            <td>Juan Pérez</td>
                            <td>$1,000.00</td>
                            <td>Préstamo a empleado Juan</td>
                            <td class="action-buttons">
                                <button class="btn delete-btn"><i class="fas fa-times"></i></button>
                                <button class="btn edit-btn" data-toggle="modal" data-target="#gastoEditModal" data-modal-type="edit"><i class="fas fa-pencil-alt"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="total-amount" id="deudores-total">
                Total: $1,000.00
            </div>
            <button class="btn btn-add" data-toggle="modal" data-target="#gastoEditModal" data-modal-type="add">
                <i class="fas fa-plus-circle mr-2"></i> Agregar
            </button>
        </div>

        <div class="tab-pane fade" id="nomina" role="tabpanel" aria-labelledby="nomina-tab">
            <h4>Gastos de Nómina</h4>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Fecha</th>
                            <th>Número de semana</th>
                            <th>Total semanal</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="nomina-table-body">
                        <tr data-id="n1" data-fecha="30/05/2024" data-numero-semana="22" data-total-semanal="8000">
                            <td>30/05/2024</td>
                            <td>22</td>
                            <td>$8,000.00</td>
                            <td class="action-buttons">
                                <button class="btn delete-btn"><i class="fas fa-times"></i></button>
                                <button class="btn edit-btn" data-toggle="modal" data-target="#gastoEditModal" data-modal-type="edit"><i class="fas fa-pencil-alt"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="total-amount" id="nomina-total">
                Total: $8,000.00
            </div>
            <button class="btn btn-add" data-toggle="modal" data-target="#gastoEditModal" data-modal-type="add">
                <i class="fas fa-plus-circle mr-2"></i> Agregar
            </button>
        </div>

        <div class="tab-pane fade" id="pagonotas" role="tabpanel" aria-labelledby="pagonotas-tab">
            <h4>Pago de Notas</h4>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Fecha</th>
                            <th>Concepto</th>
                            <th>Folio / Nombre</th>
                            <th>Monto</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="pagonotas-table-body">
                        <tr data-id="p1" data-fecha="20/06/2024" data-concepto="Materiales de oficina" data-folio-nombre="FACT-2024-001" data-monto="700">
                            <td>20/06/2024</td>
                            <td>Materiales de oficina</td>
                            <td>FACT-2024-001</td>
                            <td>$700.00</td>
                            <td class="action-buttons">
                                <button class="btn delete-btn"><i class="fas fa-times"></i></button>
                                <button class="btn edit-btn" data-toggle="modal" data-target="#gastoEditModal" data-modal-type="edit"><i class="fas fa-pencil-alt"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="total-amount" id="pagonotas-total">
                Total: $700.00
            </div>
            <button class="btn btn-add" data-toggle="modal" data-target="#gastoEditModal" data-modal-type="add">
                <i class="fas fa-plus-circle mr-2"></i> Agregar
            </button>
        </div>

        <div class="tab-pane fade" id="cliente" role="tabpanel" aria-labelledby="cliente-tab">
            <h4>Gastos del Cliente</h4>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Fecha</th>
                            <th>Concepto</th>
                            <th>Recibe</th>
                            <th>Total</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="cliente-table-body">
                        <tr data-id="cl1" data-fecha="25/06/2024" data-concepto="Envío a cliente A" data-recibe="Cliente A" data-total="150">
                            <td>25/06/2024</td>
                            <td>Envío a cliente A</td>
                            <td>Cliente A</td>
                            <td>$150.00</td>
                            <td class="action-buttons">
                                <button class="btn delete-btn"><i class="fas fa-times"></i></button>
                                <button class="btn edit-btn" data-toggle="modal" data-target="#gastoEditModal" data-modal-type="edit"><i class="fas fa-pencil-alt"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="total-amount" id="cliente-total">
                Total: $150.00
            </div>
            <button class="btn btn-add" data-toggle="modal" data-target="#gastoEditModal" data-modal-type="add">
                <i class="fas fa-plus-circle mr-2"></i> Agregar
            </button>
        </div>
    </div>
</div>

<div class="modal fade" id="gastoEditModal" tabindex="-1" role="dialog" aria-labelledby="gastoEditModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="gastoEditModalLabel">Registrar Gasto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editGastoForm">
                    <input type="hidden" id="gasto-id" name="id">
                    <input type="hidden" id="gasto-modal-type" name="modal_type">
                    <input type="hidden" id="gasto-categoria" name="categoria">

                    <div class="form-group">
                        <label for="gasto-fecha" class="form-label">Fecha</label>
                        <div class="input-group">
                            <input type="date" class="form-control" id="gasto-fecha" name="fecha" required>
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group" id="form-group-monto">
                        <label for="gasto-monto" class="form-label">Monto</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                            </div>
                            <input type="number" step="0.01" class="form-control" id="gasto-monto" name="monto" placeholder="0.00" required>
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                            </div>
                        </div>
                    </div>

                    <div id="maquinaria-fields" style="display:none;">
                        <div class="form-group">
                            <label for="gasto-pagos-realizados" class="form-label">Pagos realizados</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="number" step="0.01" class="form-control" id="gasto-pagos-realizados" name="pagos_realizados" placeholder="0.00">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="gasto-total-acumulado" class="form-label">Total acumulado</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="number" step="0.01" class="form-control" id="gasto-total-acumulado" name="total_acumulado" placeholder="0.00">
                            </div>
                        </div>
                    </div>

                    <div id="entrega-recibe-fields" style="display:none;">
                        <div class="form-group">
                            <label for="gasto-entrega" class="form-label">Entrega</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="gasto-entrega" name="entrega" placeholder="¿Quién entrega?">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-truck"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="gasto-recibe" class="form-label">Recibe</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="gasto-recibe" name="recibe" placeholder="¿Quién recibe?">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-user-check"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="gasolina-fields" style="display:none;">
                        <div class="form-group">
                            <label for="gasto-metodo-pago" class="form-label">Método de pago</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="gasto-metodo-pago" name="metodo_pago" placeholder="Efectivo, Tarjeta, etc.">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-credit-card"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="gasto-unidad" class="form-label">Unidad</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="gasto-unidad" name="unidad" placeholder="Ej: Camioneta R-123">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-car"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="nomina-fields" style="display:none;">
                        <div class="form-group">
                            <label for="gasto-numero-semana" class="form-label">Número de semana</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="gasto-numero-semana" name="numero_semana" placeholder="Ej: 22">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-calendar-week"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="gasto-total-semanal" class="form-label">Total semanal</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="number" step="0.01" class="form-control" id="gasto-total-semanal" name="total_semanal" placeholder="0.00">
                            </div>
                        </div>
                    </div>

                    <div id="concepto-folio-nombre-fields" style="display:none;">
                        <div class="form-group">
                            <label for="gasto-concepto" class="form-label">Concepto</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="gasto-concepto" name="concepto" placeholder="Concepto del gasto">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-info-circle"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="form-group-folio-nombre">
                            <label for="gasto-folio-nombre" class="form-label">Folio / Nombre</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="gasto-folio-nombre" name="folio_nombre" placeholder="Folio o nombre de la nota/proveedor">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-file-invoice"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="form-group" id="form-group-total-cliente" style="display:none;">
                        <label for="gasto-total-cliente" class="form-label">Total</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                            </div>
                            <input type="number" step="0.01" class="form-control" id="gasto-total-cliente" name="total_cliente" placeholder="0.00">
                        </div>
                    </div>

                    <div class="form-group" id="form-group-descripcion" style="display:none;">
                        <label for="gasto-descripcion" class="form-label">Descripción</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="gasto-descripcion" name="descripcion" placeholder="Descripción del gasto">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-info-circle"></i></span>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" form="editGastoForm" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
$(document).ready(function() {
    // Function to hide all specific fields
    function hideAllSpecificFields() {
        $('#maquinaria-fields').hide();
        $('#entrega-recibe-fields').hide();
        $('#gasolina-fields').hide();
        $('#nomina-fields').hide();
        $('#concepto-folio-nombre-fields').hide();
        $('#form-group-total-cliente').hide();
        $('#form-group-monto').show(); // Show monto by default
        $('#form-group-descripcion').hide(); // Hide general description by default
    }

    // Function to show/hide fields based on category
    function updateModalFields(category) {
        hideAllSpecificFields(); // Start by hiding everything

        // Common fields to show for almost all categories
        $('#form-group-monto').show();
        $('#form-group-descripcion').show(); // Show general description by default, and hide if more specific description fields are present

        switch (category) {
            case 'maquinaria':
                $('#maquinaria-fields').show();
                $('#form-group-descripcion').hide(); // Hide general description for this category
                break;
            case 'extras':
                $('#entrega-recibe-fields').show();
                break;
            case 'gasolina':
                $('#entrega-recibe-fields').show(); // Re-using entrega/recibe for "Recibe"
                $('#gasolina-fields').show();
                $('#form-group-descripcion').hide(); // Hide general description, "Unidad" is the specific one
                break;
            case 'deudores':
                $('#entrega-recibe-fields').show();
                break;
            case 'nomina':
                $('#nomina-fields').show();
                $('#form-group-monto').hide(); // Monto is replaced by Total semanal
                $('#form-group-descripcion').hide(); // No general description for nomina
                break;
            case 'pagonotas':
                $('#concepto-folio-nombre-fields').show();
                $('#form-group-descripcion').hide(); // Concepto is the description
                break;
            case 'cliente':
                $('#concepto-folio-nombre-fields').show(); // Re-using concepto
                $('#form-group-folio-nombre').hide(); // Hide Folio / Nombre for cliente
                $('#entrega-recibe-fields').show(); // Re-using recibe
                $('#form-group-total-cliente').show(); // Show Total for cliente
                $('#form-group-monto').hide(); // Monto is replaced by Total
                $('#form-group-descripcion').hide(); // Concepto is the description
                break;
        }
    }

    // When a tab is shown (activated)
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        let activeTabId = $(e.target).attr('id');
        let category = activeTabId.replace('-tab', '');
        // Update the hidden input for category in the modal
        $('#gasto-categoria').val(category);
        // Initially hide all fields when tab changes
        hideAllSpecificFields();
    });


    // When the modal is about to be shown
    $('#gastoEditModal').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget); // Button that triggered the modal
        let modalType = button.data('modal-type'); // 'add' or 'edit'
        let currentTabId = $('ul.nav-tabs li a.active').attr('id');
        let category = currentTabId.replace('-tab', '');

        // Set modal type and category
        $('#gasto-modal-type').val(modalType);
        $('#gasto-categoria').val(category);

        // Update modal title
        if (modalType === 'add') {
            $('#gastoEditModalLabel').text('Registrar Gasto de ' + category.charAt(0).toUpperCase() + category.slice(1));
        } else {
            $('#gastoEditModalLabel').text('Editar Gasto de ' + category.charAt(0).toUpperCase() + category.slice(1));
        }

        // Hide all specific fields before populating
        hideAllSpecificFields();
        // Show/hide fields based on the current category
        updateModalFields(category);

        if (modalType === 'edit') {
            let row = button.closest('tr');
            $('#gasto-id').val(row.data('id'));
            $('#gasto-fecha').val(row.data('fecha').split('/').reverse().join('-')); // Format date for input type="date"

            // Populate common fields if they exist for the category
            if ($('#form-group-monto').is(':visible')) {
                $('#gasto-monto').val(row.data('monto'));
            }
            if ($('#form-group-descripcion').is(':visible')) {
                $('#gasto-descripcion').val(row.data('descripcion'));
            }

            // Populate specific fields based on category
            switch (category) {
                case 'maquinaria':
                    $('#gasto-pagos-realizados').val(row.data('pagos-realizados'));
                    $('#gasto-total-acumulado').val(row.data('total-acumulado'));
                    break;
                case 'extras':
                case 'deudores':
                    $('#gasto-entrega').val(row.data('entrega'));
                    $('#gasto-recibe').val(row.data('recibe'));
                    break;
                case 'gasolina':
                    $('#gasto-recibe').val(row.data('recibe')); // Recibe for gasolina
                    $('#gasto-metodo-pago').val(row.data('metodo-pago'));
                    $('#gasto-unidad').val(row.data('unidad'));
                    break;
                case 'nomina':
                    $('#gasto-numero-semana').val(row.data('numero-semana'));
                    $('#gasto-total-semanal').val(row.data('total-semanal'));
                    break;
                case 'pagonotas':
                    $('#gasto-concepto').val(row.data('concepto'));
                    $('#gasto-folio-nombre').val(row.data('folio-nombre'));
                    break;
                case 'cliente':
                    $('#gasto-concepto').val(row.data('concepto'));
                    $('#gasto-recibe').val(row.data('recibe')); // Recibe for cliente
                    $('#gasto-total-cliente').val(row.data('total'));
                    break;
            }
        } else { // 'add' mode
            // Clear form fields for 'add' mode
            $('#editGastoForm')[0].reset();
            // Set current date for new entries
            let today = new Date();
            let dd = String(today.getDate()).padStart(2, '0');
            let mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
            let yyyy = today.getFullYear();
            $('#gasto-fecha').val(yyyy + '-' + mm + '-' + dd);
        }
    });

    // When the modal is hidden, reset the form and hide all specific fields
    $('#gastoEditModal').on('hidden.bs.modal', function () {
        $('#editGastoForm')[0].reset();
        hideAllSpecificFields();
    });

    // Example for form submission (you'll need to implement actual data handling)
    $('#editGastoForm').on('submit', function(e) {
        e.preventDefault(); // Prevent default form submission

        let formData = {};
        $(this).find(':input').each(function() {
            let name = $(this).attr('name');
            let value = $(this).val();
            if (name) { // Only add if name exists
                formData[name] = value;
            }
        });

        console.log("Form data submitted:", formData);
        alert("Gasto guardado/actualizado (en consola). Implementa tu lógica de backend aquí.");
        $('#gastoEditModal').modal('hide'); // Hide modal after submission
        // In a real application, you would send this data to a server
        // and then update the table dynamically or reload the page.
    });

    // Initial setup on page load for the active tab
    let initialActiveTabId = $('ul.nav-tabs li a.active').attr('id');
    if (initialActiveTabId) {
        let initialCategory = initialActiveTabId.replace('-tab', '');
        // Initial update of modal fields for the currently active tab
        updateModalFields(initialCategory);
    }
});
</script>
</body>
</html>