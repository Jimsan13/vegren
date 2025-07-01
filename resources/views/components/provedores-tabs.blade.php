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
            flex-basis: 120px; /* Adjust width for supplier name */
            min-width: 120px;
            font-weight: bold;
            color: #343a40;
        }
        .details-item .info.col-packer {
            flex-basis: 100px;
            min-width: 100px;
            color: #555;
        }
        .details-item .info.col-delivered-quantity {
            flex-basis: 90px; /* Width for delivered quantity */
            min-width: 90px;
            text-align: left;
        }
        .details-item .info.col-packed-total {
            flex-basis: 90px; /* Width for total packed */
            min-width: 90px;
            text-align: left;
        }
        .details-item .info.col-date {
            flex-basis: 100px; /* Width for date */
            min-width: 100px;
            text-align: left;
            color: #6c757d;
        }
        .details-item .info.col-status {
            flex-basis: 80px; /* Width for status */
            min-width: 80px;
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
        .total-summary {
            margin-top: 20px;
            padding-top: 15px;
            border-top: 1px solid #eee;
            font-size: 1.1em;
            font-weight: bold;
            text-align: right;
            color: #343a40;
        }
        .content-section {
            display: none; /* Hide all content sections by default */
        }
        .content-section.active {
            display: block; /* Show active content section */
        }
        /* Modal specific styles */
        .modal-header {
            background-color: #28a745;
            color: white;
            border-top-left-radius: .3rem;
            border-top-right-radius: .3rem;
        }
        .modal-header .close {
            color: white;
        }
        .modal-header .modal-title {
            display: flex;
            align-items: center;
        }
        .modal-header .modal-title i {
            margin-right: 10px;
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
                        <div class="info col-packer">Emp. Juan P.</div>
                        <div class="info col-delivered-quantity">10 cajas entregadas</div>
                        <div class="info col-packed-total">12 cajas empacadas</div>
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
                        <div class="info col-packer">Emp. María G.</div>
                        <div class="info col-delivered-quantity">8 cajas entregadas</div>
                        <div class="info col-packed-total">8 cajas empacadas</div>
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
                        <div class="info col-packer">Emp. Pedro R.</div>
                        <div class="info col-delivered-quantity">15 cajas entregadas</div>
                        <div class="info col-packed-total">15 cajas empacadas</div>
                        <div class="info col-date">10/06/2024</div>
                        <div class="info col-status" style="color: #28a745;">Facturado</div>
                        <div class="info col-amount text-right">$1,800</div>
                        <div class="action-buttons">
                            <button class="btn btn-danger btn-delete"><i class="fas fa-times"></i></button>
                            <button class="btn btn-info btn-edit"><i class="fas fa-pencil-alt"></i></button>
                        </div>
                    </div>
                     <div class="details-item">
                        <i class="fas fa-user-circle icon"></i>
                        <div class="info col-supplier">Proveedor D</div>
                        <div class="info col-packer">Emp. Ana L.</div>
                        <div class="info col-delivered-quantity">20 cajas entregadas</div>
                        <div class="info col-packed-total">25 cajas empacadas</div>
                        <div class="info col-date">13/06/2024</div>
                        <div class="info col-status" style="color: #ffc107;">Pendiente</div>
                        <div class="info col-amount text-right">$2,400</div>
                        <div class="action-buttons">
                            <button class="btn btn-danger btn-delete"><i class="fas fa-times"></i></button>
                            <button class="btn btn-info btn-edit"><i class="fas fa-pencil-alt"></i></button>
                        </div>
                    </div>
                </div>
                <div class="total-summary" id="totalCajasTodos"></div>
                <div class="total-summary" id="totalFacturadoTodos"></div>
                <button class="btn-add" data-toggle="modal" data-target="#addRecordModal"><i class="fas fa-plus-circle"></i> Agregar</button>
            </div>

            <div class="tab-pane fade" id="activos" role="tabpanel" aria-labelledby="activos-tab">
                <div class="list-header">Proveedores Activos</div>
                <div class="details-section">
                    <div class="details-item">
                        <i class="fas fa-user-circle icon"></i>
                        <div class="info col-supplier">Proveedor A</div>
                        <div class="info col-status" style="color: #28a745;">Activo</div>
                        <div class="info col-packed-total">Total empacado: 120 cajas</div>
                        <div class="info col-delivered-quantity">Total entregado: 100 cajas</div>
                        <div class="info col-date">Última entrega: 10/06/2024</div>
                        <div class="action-buttons">
                            <button class="btn btn-danger btn-delete"><i class="fas fa-times"></i></button>
                            <button class="btn btn-info btn-edit"><i class="fas fa-pencil-alt"></i></button>
                        </div>
                    </div>
                    <div class="details-item">
                        <i class="fas fa-user-circle icon"></i>
                        <div class="info col-supplier">Proveedor C</div>
                        <div class="info col-status" style="color: #28a745;">Activo</div>
                        <div class="info col-packed-total">Total empacado: 80 cajas</div>
                        <div class="info col-delivered-quantity">Total entregado: 75 cajas</div>
                        <div class="info col-date">Última entrega: 08/06/2024</div>
                        <div class="action-buttons">
                            <button class="btn btn-danger btn-delete"><i class="fas fa-times"></i></button>
                            <button class="btn btn-info btn-edit"><i class="fas fa-pencil-alt"></i></button>
                        </div>
                    </div>
                </div>
                <div class="total-summary" id="totalCajasActivos"></div>
                <button class="btn-add" data-toggle="modal" data-target="#addActiveProviderModal"><i class="fas fa-plus-circle"></i> Agregar</button>
            </div>

            <div class="tab-pane fade" id="facturados" role="tabpanel" aria-labelledby="facturados-tab">
                <div class="list-header">Facturación</div>
                <div class="details-section">
                    <div class="details-item">
                        <i class="fas fa-file-invoice icon"></i>
                        <div class="info col-supplier">Proveedor A</div>
                        <div class="info col-invoice">Factura #123</div>
                        <div class="info col-amount text-right">$1,200</div>
                        <div class="info col-date">Fecha: 12/06/2024</div>
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
                        <div class="info col-date">Fecha: 11/06/2024</div>
                        <div class="info col-status" style="color: #ffc107;">Pendiente</div>
                        <div class="action-buttons">
                            <button class="btn btn-danger btn-delete"><i class="fas fa-times"></i></button>
                            <button class="btn btn-info btn-edit"><i class="fas fa-pencil-alt"></i></button>
                        </div>
                    </div>
                    <div class="details-item">
                        <i class="fas fa-file-invoice icon"></i>
                        <div class="info col-supplier">Proveedor C</div>
                        <div class="info col-invoice">Factura #125</div>
                        <div class="info col-amount text-right">$1,800</div>
                        <div class="info col-date">Fecha: 10/06/2024</div>
                        <div class="info col-status" style="color: #28a745;">Pagado</div>
                        <div class="action-buttons">
                            <button class="btn btn-danger btn-delete"><i class="fas fa-times"></i></button>
                            <button class="btn btn-info btn-edit"><i class="fas fa-pencil-alt"></i></button>
                        </div>
                    </div>
                </div>
                <div class="total-summary" id="totalFacturadoFacturados"></div>
                <button class="btn-add" data-toggle="modal" data-target="#addInvoiceModal"><i class="fas fa-plus-circle"></i> Agregar</button>
            </div>

            <div class="tab-pane fade" id="pendientes" role="tabpanel" aria-labelledby="pendientes-tab">
                <div class="list-header">Pendientes</div>
                <div class="details-section">
                    <div class="details-item">
                        <i class="fas fa-user-circle icon"></i>
                        <div class="info col-supplier">Proveedor B</div>
                        <div class="info col-packer">Emp. María G.</div>
                        <div class="info col-delivered-quantity">8 cajas entregadas</div>
                        <div class="info col-packed-total">8 cajas empacadas</div>
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
                        <div class="info col-packer">Emp. Ana L.</div>
                        <div class="info col-delivered-quantity">20 cajas entregadas</div>
                        <div class="info col-packed-total">25 cajas empacadas</div>
                        <div class="info col-date">13/06/2024</div>
                        <div class="info col-status" style="color: #ffc107;">Pendiente</div>
                        <div class="info col-amount text-right">$2,400</div>
                        <div class="action-buttons">
                            <button class="btn btn-danger btn-delete"><i class="fas fa-times"></i></button>
                            <button class="btn btn-info btn-edit"><i class="fas fa-pencil-alt"></i></button>
                        </div>
                    </div>
                </div>
                <div class="total-summary" id="totalPendientes"></div>
                <button class="btn-add" data-toggle="modal" data-target="#addPendingModal"><i class="fas fa-plus-circle"></i> Agregar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addRecordModal" tabindex="-1" role="dialog" aria-labelledby="addRecordModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addRecordModalLabel"><i class="fas fa-clipboard-list"></i> Agregar Nuevo Registro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="supplierName">Nombre del Proveedor</label>
            <input type="text" class="form-control" id="supplierName" placeholder="Ej. Proveedor E">
          </div>
          <div class="form-group">
            <label for="packerName">Empacador</label>
            <input type="text" class="form-control" id="packerName" placeholder="Ej. Emp. Carlos S.">
          </div>
          <div class="form-group">
            <label for="deliveredBoxes">Número de Cajas Entregadas</label>
            <input type="number" class="form-control" id="deliveredBoxes" placeholder="Ej. 15">
          </div>
          <div class="form-group">
            <label for="packedTotalBoxes">Total de Cajas Empacadas</label>
            <input type="number" class="form-control" id="packedTotalBoxes" placeholder="Ej. 18">
          </div>
          <div class="form-group">
            <label for="recordDate">Fecha</label>
            <input type="date" class="form-control" id="recordDate">
          </div>
          <div class="form-group">
            <label for="recordStatus">Estado</label>
            <select class="form-control" id="recordStatus">
              <option>Facturado</option>
              <option>Pendiente</option>
            </select>
          </div>
          <div class="form-group">
            <label for="recordAmount">Monto</label>
            <input type="number" class="form-control" id="recordAmount" placeholder="Ej. 1500.00">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary">Guardar Registro</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="addActiveProviderModal" tabindex="-1" role="dialog" aria-labelledby="addActiveProviderModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addActiveProviderModalLabel"><i class="fas fa-user-plus"></i> Agregar Proveedor Activo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="activeSupplierName">Nombre del Proveedor</label>
            <input type="text" class="form-control" id="activeSupplierName" placeholder="Ej. Proveedor F">
          </div>
          <div class="form-group">
            <label for="activePackedTotal">Total de Cajas Empacadas (Histórico)</label>
            <input type="number" class="form-control" id="activePackedTotal" placeholder="Ej. 200">
          </div>
          <div class="form-group">
            <label for="activeDeliveredTotal">Total de Cajas Entregadas (Histórico)</label>
            <input type="number" class="form-control" id="activeDeliveredTotal" placeholder="Ej. 180">
          </div>
          <div class="form-group">
            <label for="lastDeliveryDate">Última Fecha de Entrega</label>
            <input type="date" class="form-control" id="lastDeliveryDate">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary">Guardar Proveedor</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="addInvoiceModal" tabindex="-1" role="dialog" aria-labelledby="addInvoiceModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addInvoiceModalLabel"><i class="fas fa-file-invoice-dollar"></i> Agregar Factura</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="invoiceSupplierName">Nombre del Proveedor</label>
            <input type="text" class="form-control" id="invoiceSupplierName" placeholder="Ej. Proveedor G">
          </div>
          <div class="form-group">
            <label for="invoiceNumber">Número de Factura</label>
            <input type="text" class="form-control" id="invoiceNumber" placeholder="Ej. #126">
          </div>
          <div class="form-group">
            <label for="invoiceAmount">Monto</label>
            <input type="number" class="form-control" id="invoiceAmount" placeholder="Ej. 2500.00">
          </div>
          <div class="form-group">
            <label for="invoiceDate">Fecha de Factura</label>
            <input type="date" class="form-control" id="invoiceDate">
          </div>
          <div class="form-group">
            <label for="invoiceStatus">Estado de Factura</label>
            <select class="form-control" id="invoiceStatus">
              <option>Pagado</option>
              <option>Pendiente</option>
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary">Guardar Factura</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="addPendingModal" tabindex="-1" role="dialog" aria-labelledby="addPendingModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addPendingModalLabel"><i class="fas fa-hourglass-half"></i> Agregar Pendiente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="pendingSupplierName">Nombre del Proveedor</label>
            <input type="text" class="form-control" id="pendingSupplierName" placeholder="Ej. Proveedor H">
          </div>
          <div class="form-group">
            <label for="pendingPacker">Empacador</label>
            <input type="text" class="form-control" id="pendingPacker" placeholder="Ej. Emp. David M.">
          </div>
          <div class="form-group">
            <label for="pendingDeliveredBoxes">Número de Cajas Entregadas (Pendiente)</label>
            <input type="number" class="form-control" id="pendingDeliveredBoxes" placeholder="Ej. 7">
          </div>
          <div class="form-group">
            <label for="pendingPackedTotal">Total de Cajas Empacadas (Pendiente)</label>
            <input type="number" class="form-control" id="pendingPackedTotal" placeholder="Ej. 10">
          </div>
          <div class="form-group">
            <label for="pendingDate">Fecha Esperada</label>
            <input type="date" class="form-control" id="pendingDate">
          </div>
          <div class="form-group">
            <label for="pendingAmount">Monto Estimado</label>
            <input type="number" class="form-control" id="pendingAmount" placeholder="Ej. 850.00">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary">Guardar Pendiente</button>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        function calculateTotals(tabId) {
            let totalCajasEntregadas = 0;
            let totalCajasEmpacadas = 0;
            let totalFacturado = 0;

            const tabElement = document.getElementById(tabId);
            const items = tabElement.querySelectorAll('.details-item');

            items.forEach(item => {
                const deliveredQuantityElement = item.querySelector('.col-delivered-quantity');
                if (deliveredQuantityElement) {
                    const deliveredText = deliveredQuantityElement.textContent;
                    const deliveredMatch = deliveredText.match(/(\d+)\s+cajas/);
                    if (deliveredMatch) {
                        totalCajasEntregadas += parseInt(deliveredMatch[1]);
                    }
                }

                const packedTotalElement = item.querySelector('.col-packed-total');
                if (packedTotalElement) {
                    const packedText = packedTotalElement.textContent;
                    const packedMatch = packedText.match(/(\d+)\s+cajas/);
                    if (packedMatch) {
                        totalCajasEmpacadas += parseInt(packedMatch[1]);
                    }
                }

                const amountElement = item.querySelector('.col-amount');
                if (amountElement) {
                    const amountText = amountElement.textContent;
                    const amountMatch = amountText.match(/\$([\d,]+)/);
                    if (amountMatch) {
                        totalFacturado += parseFloat(amountMatch[1].replace(/,/g, ''));
                    }
                }
            });

            if (tabId === 'todos') {
                document.getElementById('totalCajasTodos').textContent = `Total Cajas Entregadas: ${totalCajasEntregadas}, Total Cajas Empacadas: ${totalCajasEmpacadas}`;
                document.getElementById('totalFacturadoTodos').textContent = `Total Facturado: $${totalFacturado.toLocaleString('en-US')}`;
            } else if (tabId === 'activos') {
                document.getElementById('totalCajasActivos').textContent = `Total Cajas Activas Entregadas: ${totalCajasEntregadas}, Total Cajas Empacadas: ${totalCajasEmpacadas}`;
            } else if (tabId === 'facturados') {
                document.getElementById('totalFacturadoFacturados').textContent = `Total Facturado: $${totalFacturado.toLocaleString('en-US')}`;
            } else if (tabId === 'pendientes') {
                document.getElementById('totalPendientes').textContent = `Total Pendiente de Facturar: $${totalFacturado.toLocaleString('en-US')}`;
            }
        }

        // Calculate totals when tabs are shown
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            const targetTabId = $(e.target).attr('href').substring(1);
            calculateTotals(targetTabId);
        });

        // Initial calculation for the active tab on page load
        calculateTotals('todos'); // Assuming 'todos' is the initially active tab
    });
</script>
</body>
</html>