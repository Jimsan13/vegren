<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VEGGREEN - Registro de Carga</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
   @section('styles')
<link rel="stylesheet" href="{{ asset('css/cargas.css') }}">
@endsection

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
            <div class="details-item" style="font-weight: bold; background-color:rgb(255, 255, 255); border-bottom: 2px solid #ddd;">
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


</body>
</html>