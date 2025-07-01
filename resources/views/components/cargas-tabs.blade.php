<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VEGGREEN - Registro de Carga</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Variables CSS (adaptadas al estilo de tu código) */
        :root {
            --primary-green:rgb(3, 3, 3);
            --text-dark: #343a40;
            --light-green-bg:rgb(0, 0, 0);
        }

        body {
            font-family: sans-serif;
            background-color: var(--light-green-bg);
        }
        .container-fluid {
            padding: 30px;
        }
        .main-content {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,.05);
            margin-bottom: 20px; /* Added for consistency */
        }
        h2 {
            margin-bottom: 20px;
            color: var(--text-dark);
        }
        .table-header {
            font-size: 1.2em;
            font-weight: bold;
            margin-bottom: 15px;
            color: var(--text-dark);
            display: flex; /* Flexbox for title and button */
            justify-content: space-between; /* Space between title and button */
            align-items: center; /* Vertically align */
        }
        .details-section {
            background-color: #fff;
            border-radius: 8px;
            padding: 10px 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.84); /* Added shadow for consistency */
        }
        .details-item {
            display: flex;
            align-items: center;
            padding: 10px 15px; /* Added horizontal padding */
            border-bottom: 1px solid #eee;
        }
        .details-item:last-child {
            border-bottom: none;
        }
        .details-item .info {
            padding: 0 5px; /* Reduced internal padding */
            text-align: left;
            color: var(--text-dark);
            white-space: nowrap; /* Prevent wrapping for small columns */
            overflow: hidden; /* Hide overflow */
            text-overflow: ellipsis; /* Add ellipsis for overflow */
        }
        /* Specific column widths for the "Tabla de cargas" to ensure alignment */
        .details-item .col-fecha { flex-basis: 120px; min-width: 120px; font-weight: bold; }
        .details-item .col-lote { flex-basis: 100px; min-width: 100px; font-weight: bold; }
        .details-item .col-cliente { flex-basis: 120px; min-width: 120px; font-weight: bold; }
        .details-item .col-bultos { flex-basis: 70px; min-width: 70px; text-align: center; }
        .details-item .col-precio { flex-basis: 90px; min-width: 90px; text-align: left; }
        .details-item .col-anticipo { flex-basis: 100px; min-width: 100px; text-align: left; }
        .details-item .col-total-envio { flex-basis: 100px; min-width: 100px; text-align: left; }
        .details-item .col-saldo { flex-basis: 100px; min-width: 100px; text-align: right; font-weight: bold; }

        .details-item .action-buttons {
            display: flex;
            gap: 5px;
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
            background-color: var(--primary-green);
            color: white;
            border: none;
            padding: 8px 15px; /* Adjusted padding to match other add buttons */
            border-radius: 5px;
            font-size: 0.9em; /* Adjusted font size */
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn-add:hover {
            background-color:rgb(0, 140, 19);
        }

        .indicators-section {
            margin-top: 30px;
        }
        .card-indicator {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(255, 255, 255, 0.97);
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            height: 100%; /* Ensure cards have same height */
        }
        .card-indicator .icon {
            font-size: 2.5em;
            margin-right: 15px;
            color: var(--primary-green);
        }
        .card-indicator .icon.orange {
            color: #ffc107;
        }
        .card-indicator .icon.red {
            color: #dc3545;
        }
        .card-indicator .title {
            font-size: 0.9em;
            color: #6c757d;
            margin-bottom: 5px;
        }
        .card-indicator .value {
            font-size: 1.5em;
            font-weight: bold;
            color: var(--text-dark);
        }
        .card-indicator .description {
            font-size: 0.8em;
            color: #6c757d;
        }

        /* Modal specific styles */
        .modal-header {
            background-color: var(--primary-green);
            color: #fff;
            border-bottom: none;
        }
        .modal-header .close { /* For Bootstrap 4, use .close for the button */
            color: #fff;
            opacity: 1;
        }
        .modal-footer .btn-primary {
            background-color: var(--primary-green);
            border-color: var(--primary-green);
        }
        .modal-footer .btn-primary:hover {
            background-color:rgb(33, 157, 42);
            border-color:rgb(12, 173, 33);
        }

        /* Input Group with icon alignment */
        .input-group-append .input-group-text,
        .input-group-prepend .input-group-text {
            background-color: #e9ecef; /* Light gray background for icon */
            border-color: #ced4da;
        }
        .input-group-append .btn-outline-secondary {
            background-color: #f8f9fa; /* Light background for the + button */
            border-color: #ced4da;
        }
        .input-group-append .btn-outline-secondary:hover {
            background-color: #e2e6ea;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="main-content">
        
        <p>Complete los datos para registrar o editar una operación de carga.</p>

        <div class="table-header">
            Tabla de cargas
            <button class="btn btn-add" data-toggle="modal" data-target="#cargaEditModal" data-modal-type="add">
                <i class="fas fa-plus-circle me-2"></i> Agregar
            </button>
        </div>

        <div class="details-section">
            <div class="details-item" style="font-weight: bold; background-color:rgb(137, 137, 137); border-bottom: 2px solid #ddd;">
                <div class="info col-fecha">Fecha</div>
                <div class="info col-lote">Lote</div>
                <div class="info col-cliente">Cliente</div>
                <div class="info col-bultos">Bultos</div>
                <div class="info col-precio">Precio/U.</div>
                <div class="info col-anticipo">Anticipo</div>
                <div class="info col-total-envio">Total Envío</div>
                <div class="info col-saldo text-right">Saldo</div>
                <div class="action-buttons" style="flex-basis: 70px; min-width: 70px;">Acciones</div>
            </div>

            <div class="details-item" data-id="1" data-fecha="12/06/2024" data-lote="LT-001" data-cliente="Cliente A" data-bultos="10" data-precio="120" data-anticipo-recibido-bool="true" data-total-envio="1200" data-remate="0" data-descuento-aplicado="0" data-facturacion="pendiente" data-cinta-transporte="XYZ123" data-facturas-pagadas="false" data-caja-extra="0" data-representante-responsable="Juan Pérez">
                <div class="info col-fecha">12/06/2024</div>
                <div class="info col-lote">LT-001</div>
                <div class="info col-cliente">Cliente A</div>
                <div class="info col-bultos">10</div>
                <div class="info col-precio">$120</div>
                <div class="info col-anticipo">$400 (Sí)</div>
                <div class="info col-total-envio">$1,200</div>
                <div class="info col-saldo text-right">$800.00</div>
                <div class="action-buttons">
                    <button class="btn btn-danger btn-delete"><i class="fas fa-times"></i></button>
                    <button class="btn btn-info btn-edit" data-toggle="modal" data-target="#cargaEditModal" data-modal-type="edit">
                        <i class="fas fa-pencil-alt"></i>
                    </button>
                </div>
            </div>
            <div class="details-item" data-id="2" data-fecha="13/06/2024" data-lote="LT-002" data-cliente="Cliente B" data-bultos="8" data-precio="150" data-anticipo-recibido-bool="false" data-total-envio="1200" data-remate="50" data-descuento-aplicado="10" data-facturacion="facturada" data-cinta-transporte="ABC456" data-facturas-pagadas="true" data-caja-extra="20" data-representante-responsable="María Gómez">
                <div class="info col-fecha">13/06/2024</div>
                <div class="info col-lote">LT-002</div>
                <div class="info col-cliente">Cliente B</div>
                <div class="info col-bultos">8</div>
                <div class="info col-precio">$150</div>
                <div class="info col-anticipo">$0 (No)</div>
                <div class="info col-total-envio">$1,200</div>
                <div class="info col-saldo text-right">$1,200.00</div>
                <div class="action-buttons">
                    <button class="btn btn-danger btn-delete"><i class="fas fa-times"></i></button>
                    <button class="btn btn-info btn-edit" data-toggle="modal" data-target="#cargaEditModal" data-modal-type="edit">
                        <i class="fas fa-pencil-alt"></i>
                    </button>
                </div>
            </div>
            <div class="details-item" data-id="3" data-fecha="14/06/2024" data-lote="LT-003" data-cliente="Cliente C" data-bultos="12" data-precio="100" data-anticipo-recibido-bool="true" data-total-envio="1200" data-remate="0" data-descuento-aplicado="0" data-facturacion="pendiente" data-cinta-transporte="DEF789" data-facturas-pagadas="false" data-caja-extra="0" data-representante-responsable="Carlos Ruíz">
                <div class="info col-fecha">14/06/2024</div>
                <div class="info col-lote">LT-003</div>
                <div class="info col-cliente">Cliente C</div>
                <div class="info col-bultos">12</div>
                <div class="info col-precio">$100</div>
                <div class="info col-anticipo">$500 (Sí)</div>
                <div class="info col-total-envio">$1,200</div>
                <div class="info col-saldo text-right">$700.00</div>
                <div class="action-buttons">
                    <button class="btn btn-danger btn-delete"><i class="fas fa-times"></i></button>
                    <button class="btn btn-info btn-edit" data-toggle="modal" data-target="#cargaEditModal" data-modal-type="edit">
                        <i class="fas fa-pencil-alt"></i>
                    </button>
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

<div class="modal fade" id="cargaEditModal" tabindex="-1" role="dialog" aria-labelledby="cargaEditModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document"> <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cargaEditModalLabel">Datos de carga</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editCargaForm">
                    <input type="hidden" id="edit-id" name="id">
                    <input type="hidden" id="edit-modal-type" name="modal_type">

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="edit-fecha" class="form-label">Fecha</label>
                            <div class="input-group">
                                <input type="date" class="form-control" id="edit-fecha" name="fecha" required>
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="edit-lote" class="form-label">Lote</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="edit-lote" name="lote" placeholder="Ingrese el lote" required>
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-cubes"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="edit-cliente" class="form-label">Cliente</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="edit-cliente" name="cliente" placeholder="seleccione cliente" required>
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="edit-bultos" class="form-label">Bultos de caja</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="edit-bultos" name="bultos" placeholder="cantidad de bultos" required>
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-box"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="edit-precio" class="form-label">Precio por unidad</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="number" step="0.01" class="form-control" id="edit-precio" name="precio" placeholder="precio unitario" required>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="edit-anticipo-recibido" class="form-label">Anticipo recibido (Sí/No)</label>
                            <div class="input-group">
                                <select class="form-control" id="edit-anticipo-recibido-bool" name="anticipo_recibido_bool">
                                    <option value="true">Sí</option>
                                    <option value="false">No</option>
                                </select>
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-hand-holding-usd"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                         <div class="col-md-4 mb-3">
                            <label for="edit-anticipo" class="form-label">Monto Anticipo</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="number" step="0.01" class="form-control" id="edit-anticipo" name="anticipo" placeholder="monto del anticipo" value="0" required>
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-cash-register"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="edit-total-envio" class="form-label">Total del envío</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="number" step="0.01" class="form-control" id="edit-total-envio" name="total_envio" placeholder="cálculo automático" readonly>
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-calculator"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="edit-remate" class="form-label">Remate</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="number" step="0.01" class="form-control" id="edit-remate" name="remate" placeholder="monto de remate" value="0">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-balance-scale"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="edit-descuento-aplicado" class="form-label">Descuento aplicado</label>
                            <div class="input-group">
                                <input type="number" step="0.01" class="form-control" id="edit-descuento-aplicado" name="descuento_aplicado" placeholder="monto o porcentaje" value="0">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-percent"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="edit-facturacion" class="form-label">Facturación</label>
                            <div class="input-group">
                                <select class="form-control" id="edit-facturacion" name="facturacion">
                                    <option value="pendiente">Pendiente</option>
                                    <option value="facturada">Facturada</option>
                                </select>
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-file-invoice"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="edit-saldo" class="form-label">Saldo de carga</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="number" step="0.01" class="form-control" id="edit-saldo" name="saldo" placeholder="cálculo automático" readonly>
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-wallet"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="edit-cinta-transporte" class="form-label">Cinta de Transporte</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="edit-cinta-transporte" name="cinta_transporte" placeholder="ingrese cinta">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-truck"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="edit-facturas-pagadas" class="form-label">Facturas pagadas</label>
                            <div class="input-group">
                                <select class="form-control" id="edit-facturas-pagadas" name="facturas_pagadas">
                                    <option value="true">Sí</option>
                                    <option value="false">No</option>
                                </select>
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-check-circle"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="edit-caja-extra" class="form-label">Caja extra</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="number" step="0.01" class="form-control" id="edit-caja-extra" name="caja_extra" placeholder="monto extra (opcional)" value="0">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button"><i class="fas fa-plus"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="edit-representante-responsable" class="form-label">Representante responsable</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="edit-representante-responsable" name="representante_responsable" placeholder="seleccione representante">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" form="editCargaForm" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        // Función para calcular Total Envío y Saldo
        function calcularTotales() {
            var bultos = parseFloat($('#edit-bultos').val()) || 0;
            var precio = parseFloat($('#edit-precio').val()) || 0;
            var anticipo = parseFloat($('#edit-anticipo').val()) || 0;
            var remate = parseFloat($('#edit-remate').val()) || 0;
            var descuento = parseFloat($('#edit-descuento-aplicado').val()) || 0;
            var cajaExtra = parseFloat($('#edit-caja-extra').val()) || 0;

            // Calcular Total del envío: Bultos * Precio por unidad
            let totalEnvioCalculado = (bultos * precio);

            // Aplicar remate (si es un valor a restar del total)
            totalEnvioCalculado -= remate;

            // Aplicar descuento (si es un valor a restar del total)
            totalEnvioCalculado -= descuento;

            // Sumar caja extra
            totalEnvioCalculado += cajaExtra;


            $('#edit-total-envio').val(totalEnvioCalculado.toFixed(2));

            // Calcular Saldo de carga: Total del envío - Anticipo recibido
            var saldo = totalEnvioCalculado - anticipo;
            $('#edit-saldo').val(saldo.toFixed(2));
        }

        // Listener para los campos que afectan el cálculo
        $('#edit-bultos, #edit-precio, #edit-anticipo, #edit-remate, #edit-descuento-aplicado, #edit-caja-extra').on('input', calcularTotales);

        // Al abrir el modal
        $('#cargaEditModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Botón que activó el modal
            var modalType = button.data('modal-type'); // 'edit' o 'add'
            var modal = $(this);
            var form = modal.find('#editCargaForm');

            // Limpiar formulario al abrirlo
            form[0].reset();
            modal.find('#edit-id').val('');
            modal.find('#edit-modal-type').val(modalType);

            // Ajustar título del modal
            if (modalType === 'edit') {
                modal.find('.modal-title').text('Editar Datos de Carga');

                // Obtener datos de la fila y poblar el formulario
                var row = button.closest('.details-item');
                modal.find('#edit-id').val(row.data('id'));
                modal.find('#edit-fecha').val(new Date(row.data('fecha').split('/').reverse().join('-')).toISOString().substring(0, 10)); // Formato YYYY-MM-DD
                modal.find('#edit-lote').val(row.data('lote'));
                modal.find('#edit-cliente').val(row.data('cliente'));
                modal.find('#edit-bultos').val(row.data('bultos'));
                modal.find('#edit-precio').val(row.data('precio'));
                modal.find('#edit-anticipo-recibido-bool').val(row.data('anticipo-recibido-bool').toString()); // 'true' o 'false'
                modal.find('#edit-total-envio').val(row.data('total-envio'));
                modal.find('#edit-remate').val(row.data('remate'));
                modal.find('#edit-descuento-aplicado').val(row.data('descuento-aplicado'));
                modal.find('#edit-facturacion').val(row.data('facturacion'));
                modal.find('#edit-saldo').val(row.data('saldo')); // Mantener el saldo de la tabla para edición si se maneja desde backend
                modal.find('#edit-cinta-transporte').val(row.data('cinta-transporte'));
                modal.find('#edit-facturas-pagadas').val(row.data('facturas-pagadas').toString()); // 'true' o 'false'
                modal.find('#edit-caja-extra').val(row.data('caja-extra'));
                modal.find('#edit-representante-responsable').val(row.data('representante-responsable'));

                // El campo "Monto Anticipo" no existía como data attribute. Lo inicializamos desde la tabla o a 0
                // Asumiendo que el valor del anticipo se muestra en la columna "Anticipo" como "$X (Sí/No)"
                // Necesitamos extraer solo el monto numérico.
                // En el HTML de ejemplo de la tabla, se lee "$1,200" o "$0 (No)". Ajustamos para extraer solo el número.
                var anticipoText = row.find('.col-anticipo').text();
                var anticipoValue = parseFloat(anticipoText.replace(/[^0-9.-]+/g,"")) || 0; // Extrae solo el número
                modal.find('#edit-anticipo').val(anticipoValue);


            } else { // modalType === 'add'
                modal.find('.modal-title').text('Agregar Nueva Carga');
                // Dejar los campos vacíos para un nuevo registro y establecer valores por defecto para selects
                modal.find('#edit-anticipo-recibido-bool').val('false');
                modal.find('#edit-facturacion').val('pendiente');
                modal.find('#edit-facturas-pagadas').val('false');
                modal.find('#edit-anticipo').val('0');
                modal.find('#edit-remate').val('0');
                modal.find('#edit-descuento-aplicado').val('0');
                modal.find('#edit-caja-extra').val('0');
                modal.find('#edit-total-envio').val('0.00'); // Establecer a 0.00 al agregar
                modal.find('#edit-saldo').val('0.00'); // Establecer a 0.00 al agregar
            }

            // Ejecutar el cálculo una vez al abrir el modal para asegurarse que el saldo inicial sea correcto
            calcularTotales();
        });

        // Manejar el envío del formulario del modal (ejemplo simple, en Laravel sería AJAX)
        $('#editCargaForm').on('submit', function(event) {
            event.preventDefault(); // Prevenir el envío normal del formulario

            const id = $('#edit-id').val();
            const modalType = $('#edit-modal-type').val();
            const fecha = $('#edit-fecha').val();
            const lote = $('#edit-lote').val();
            const cliente = $('#edit-cliente').val();
            const bultos = $('#edit-bultos').val();
            const precio = $('#edit-precio').val();
            const anticipoRecibidoBool = $('#edit-anticipo-recibido-bool').val() === 'true'; // Convertir a booleano
            const anticipo = $('#edit-anticipo').val();
            const totalEnvio = $('#edit-total-envio').val();
            const remate = $('#edit-remate').val();
            const descuentoAplicado = $('#edit-descuento-aplicado').val();
            const facturacion = $('#edit-facturacion').val();
            const saldo = $('#edit-saldo').val();
            const cintaTransporte = $('#edit-cinta-transporte').val();
            const facturasPagadas = $('#edit-facturas-pagadas').val() === 'true'; // Convertir a booleano
            const cajaExtra = $('#edit-caja-extra').val();
            const representanteResponsable = $('#edit-representante-responsable').val();


            console.log(`Guardando cambios para ${modalType} (ID: ${id}):`);
            console.log({
                id, fecha, lote, cliente, bultos, precio, anticipoRecibido: anticipoRecibidoBool ? 'Sí' : 'No', anticipo,
                totalEnvio, remate, descuentoAplicado, facturacion, saldo,
                cintaTransporte, facturasPagadas: facturasPagadas ? 'Sí' : 'No', cajaExtra, representanteResponsable
            });

            // Aquí normalmente harías una llamada AJAX para enviar estos datos al servidor
            // fetch('/api/carga/update', {
            //     method: 'POST',
            //     headers: {
            //         'Content-Type': 'application/json',
            //         'X-CSRF-TOKEN': 'tu-token-csrf' // En Laravel
            //     },
            //     body: JSON.stringify({
            //         id, fecha, lote, cliente, bultos, precio, anticipoRecibidoBool, anticipo,
            //         totalEnvio, remate, descuentoAplicado, facturacion, saldo,
            //         cintaTransporte, facturasPagadas, cajaExtra, representanteResponsable
            //     })
            // })
            // .then(response => response.json())
            // .then(data => {
            //     console.log('Datos guardados:', data);
            //     $('#cargaEditModal').modal('hide');
            //     // Aquí podrías recargar la tabla o actualizar la fila específica en el DOM
            // })
            // .catch(error => console.error('Error al guardar:', error));

            // Por ahora, solo cerramos el modal
            $('#cargaEditModal').modal('hide');
            alert('Datos "guardados" (revisa la consola para verlos). En una aplicación real, esto se enviaría al servidor.');

            // Opcional: Recargar la página o actualizar la tabla para reflejar los cambios
            location.reload(); // Para fines de demostración, recarga la página. En producción, actualiza solo la tabla.
        });

        // Lógica para el botón de borrar (ejemplo, requeriría confirmación real y backend)
        $('.btn-delete').on('click', function() {
            if (confirm('¿Estás seguro de que quieres eliminar este registro?')) {
                const row = $(this).closest('.details-item');
                const idToDelete = row.data('id');
                console.log('Eliminando registro con ID:', idToDelete);
                // Aquí iría la llamada AJAX para eliminar el registro
                row.remove(); // Eliminación visual inmediata (en una app real, esperarías la respuesta del servidor)
            }
        });
    });
</script>

</body>
</html>