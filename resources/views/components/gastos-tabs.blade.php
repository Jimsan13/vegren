<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gastos por Categoría</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
      @section('styles')
<link rel="stylesheet" href="{{ asset('css/gastos.css') }}">
@endsection
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
                            <th>Proveedor</th> <th>Monto</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="pagonotas-table-body">
                        <tr data-id="p1" data-fecha="20/06/2024" data-concepto="Materiales de oficina" data-folio-nombre="FACT-2024-001" data-monto="700" data-proveedor="Office Depot">
                            <td>20/06/2024</td>
                            <td>Materiales de oficina</td>
                            <td>FACT-2024-001</td>
                            <td>Office Depot</td>
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
                         <div class="form-group" id="form-group-proveedor" style="display:none;">
                            <label for="gasto-proveedor" class="form-label">Proveedor</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="gasto-proveedor" name="proveedor" placeholder="Nombre del proveedor">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
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

<div class="modal fade" id="proveedorAddModal" tabindex="-1" role="dialog" aria-labelledby="proveedorAddModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="proveedorAddModalLabel">Agregar Nuevo Proveedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addProveedorForm">
                    <div class="form-group">
                        <label for="proveedor-nombre" class="form-label">Nombre del Proveedor</label>
                        <input type="text" class="form-control" id="proveedor-nombre" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="proveedor-contacto" class="form-label">Contacto (Teléfono/Email)</label>
                        <input type="text" class="form-control" id="proveedor-contacto" name="contacto">
                    </div>
                    <div class="form-group">
                        <label for="proveedor-direccion" class="form-label">Dirección</label>
                        <input type="text" class="form-control" id="proveedor-direccion" name="direccion">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" form="addProveedorForm" class="btn btn-primary">Guardar Proveedor</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
$(document).ready(function() {
    // Function to hide all specific fields in the gastoEditModal
    function hideAllSpecificFields() {
        $('#maquinaria-fields').hide();
        $('#entrega-recibe-fields').hide();
        $('#gasolina-fields').hide();
        $('#nomina-fields').hide();
        $('#concepto-folio-nombre-fields').hide();
        $('#form-group-total-cliente').hide();
        $('#form-group-descripcion').hide();
        $('#form-group-proveedor').hide(); // Ocultar el nuevo campo de proveedor
    }

    // Event listener for when the gastoEditModal is about to be shown
    $('#gastoEditModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var modalType = button.data('modal-type'); // 'add' or 'edit'
        var category = button.closest('.tab-pane').attr('id'); // Get category from the parent tab-pane ID

        var modal = $(this);
        modal.find('.modal-title').text(modalType === 'add' ? 'Registrar Gasto' : 'Editar Gasto');
        $('#gasto-modal-type').val(modalType);
        $('#gasto-categoria').val(category); // Set the category in a hidden field

        // Reset form and hide all fields first
        $('#editGastoForm')[0].reset();
        hideAllSpecificFields();

        // Show fields based on category
        if (category === 'maquinaria') {
            $('#maquinaria-fields').show();
            // If editing, populate fields
            if (modalType === 'edit') {
                var row = button.closest('tr');
                $('#gasto-id').val(row.data('id'));
                $('#gasto-fecha').val(row.data('fecha-raw')); // Assuming a raw date format in data-attribute
                $('#gasto-monto').val(row.data('monto'));
                $('#gasto-pagos-realizados').val(row.data('pagos-realizados'));
                $('#gasto-total-acumulado').val(row.data('total-acumulado'));
            }
        } else if (category === 'extras' || category === 'deudores') {
            $('#entrega-recibe-fields').show();
            $('#form-group-descripcion').show();
            $('#concepto-folio-nombre-fields').show(); // Mostrar concepto
            $('#form-group-folio-nombre').hide(); // Ocultar folio/nombre si no es relevante aquí
            if (modalType === 'edit') {
                var row = button.closest('tr');
                $('#gasto-id').val(row.data('id'));
                $('#gasto-fecha').val(row.data('fecha-raw'));
                $('#gasto-monto').val(row.data('monto'));
                $('#gasto-entrega').val(row.data('entrega'));
                $('#gasto-recibe').val(row.data('recibe'));
                $('#gasto-descripcion').val(row.data('descripcion'));
                $('#gasto-concepto').val(row.data('concepto')); // Populate concepto
            }
        } else if (category === 'gasolina') {
            $('#gasolina-fields').show();
            $('#entrega-recibe-fields').show(); // Recibe field
            if (modalType === 'edit') {
                var row = button.closest('tr');
                $('#gasto-id').val(row.data('id'));
                $('#gasto-fecha').val(row.data('fecha-raw'));
                $('#gasto-monto').val(row.data('monto'));
                $('#gasto-recibe').val(row.data('recibe'));
                $('#gasto-metodo-pago').val(row.data('metodo-pago'));
                $('#gasto-unidad').val(row.data('unidad'));
            }
        } else if (category === 'nomina') {
            $('#nomina-fields').show();
            if (modalType === 'edit') {
                var row = button.closest('tr');
                $('#gasto-id').val(row.data('id'));
                $('#gasto-fecha').val(row.data('fecha-raw'));
                $('#gasto-monto').val(row.data('monto')); // Monto general de la nómina
                $('#gasto-numero-semana').val(row.data('numero-semana'));
                $('#gasto-total-semanal').val(row.data('total-semanal'));
            }
        } else if (category === 'pagonotas') {
            $('#concepto-folio-nombre-fields').show();
            $('#form-group-proveedor').show(); // Mostrar campo de proveedor
            if (modalType === 'edit') {
                var row = button.closest('tr');
                $('#gasto-id').val(row.data('id'));
                $('#gasto-fecha').val(row.data('fecha-raw'));
                $('#gasto-monto').val(row.data('monto'));
                $('#gasto-concepto').val(row.data('concepto'));
                $('#gasto-folio-nombre').val(row.data('folio-nombre'));
                $('#gasto-proveedor').val(row.data('proveedor')); // Populate proveedor
            }
        } else if (category === 'cliente') {
            $('#concepto-folio-nombre-fields').show(); // Concepto y Folio/Nombre pueden ser útiles aquí
            $('#form-group-total-cliente').show(); // Mostrar el campo de "Total" para el cliente
            $('#entrega-recibe-fields').show(); // Mostrar recibe para el cliente
            if (modalType === 'edit') {
                var row = button.closest('tr');
                $('#gasto-id').val(row.data('id'));
                $('#gasto-fecha').val(row.data('fecha-raw'));
                $('#gasto-monto').val(row.data('monto')); // Esto sería el "total" del cliente
                $('#gasto-concepto').val(row.data('concepto'));
                $('#gasto-recibe').val(row.data('recibe'));
                $('#gasto-total-cliente').val(row.data('total')); // Asignar al campo total_cliente
            }
        }
    });

    // Handle form submission (simulated for demonstration)
    $('#editGastoForm').on('submit', function(e) {
        e.preventDefault();
        var formData = $(this).serializeArray();
        console.log("Datos del formulario:", formData);
        alert('Gasto guardado/editado exitosamente (simulación)');
        $('#gastoEditModal').modal('hide');
        // In a real application, you would send this data to your backend
        // and then dynamically update the table or reload the data.
    });

    // Handle submission for adding a new provider (simulated)
    $('#addProveedorForm').on('submit', function(e) {
        e.preventDefault();
        var formData = $(this).serializeArray();
        console.log("Nuevo Proveedor:", formData);
        alert('Proveedor agregado exitosamente (simulación)');
        $('#proveedorAddModal').modal('hide');
        // In a real application, you might refresh a dropdown list of providers
        // or add the new provider to a database.
    });
});
</script>
</body>
</html>