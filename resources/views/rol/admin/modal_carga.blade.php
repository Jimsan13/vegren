<div class="modal fade" id="cargaEditModal" tabindex="-1" role="dialog" aria-labelledby="cargaEditModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cargaEditModalLabel">Datos de carga</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editCargaForm" method="POST" action="/admin/cargas">
                    @csrf <input type="hidden" id="edit-id" name="id">
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