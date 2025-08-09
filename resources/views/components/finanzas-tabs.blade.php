<div class="finanzas-tabs-container">
    <ul class="nav nav-tabs mb-4 finanzas-tabs" id="finanzasTabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link {{ request()->is('finanzas') || request()->is('finanzas/estado-financiero') ? 'active' : '' }}"
                id="estado-financiero-tab" data-toggle="tab" href="#estadoFinanciero" role="tab"
                aria-controls="estadoFinanciero" aria-selected="{{ request()->is('finanzas') || request()->is('finanzas/estado-financiero') ? 'true' : 'false' }}">
                Estado Financiero
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('finanzas/ingresos') ? 'active' : '' }}"
                id="ingresos-tab" data-toggle="tab" href="#ingresos" role="tab"
                aria-controls="ingresos" aria-selected="{{ request()->is('finanzas/ingresos') ? 'true' : 'false' }}">
                Ingresos
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('finanzas/egresos') ? 'active' : '' }}"
                id="egresos-tab" data-toggle="tab" href="#egresos" role="tab"
                aria-controls="egresos" aria-selected="{{ request()->is('finanzas/egresos') ? 'true' : 'false' }}">
                Egresos
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('finanzas/pagos') ? 'active' : '' }}"
                id="pagos-tab" data-toggle="tab" href="#pagos" role="tab"
                aria-controls="pagos" aria-selected="{{ request()->is('finanzas/pagos') ? 'true' : 'false' }}">
                Pagos
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('finanzas/facturacion') ? 'active' : '' }}"
                id="facturacion-tab" data-toggle="tab" href="#facturacion" role="tab"
                aria-controls="facturacion" aria-selected="{{ request()->is('finanzas/facturacion') ? 'true' : 'false' }}">
                Facturación
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('finanzas/utilidades') ? 'active' : '' }}"
                id="utilidades-tab" data-toggle="tab" href="#utilidades" role="tab"
                aria-controls="utilidades" aria-selected="{{ request()->is('finanzas/utilidades') ? 'true' : 'false' }}">
                Utilidades
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('finanzas/deudas') ? 'active' : '' }}"
                id="deudas-tab" data-toggle="tab" href="#deudas" role="tab"
                aria-controls="deudas" aria-selected="{{ request()->is('finanzas/deudas') ? 'true' : 'false' }}">
                Deudas
            </a>
        </li>
    </ul>

    <div class="tab-content" id="finanzasTabsContent">
        {{-- Estado Financiero Tab Content (image_33fc37.png, image_33fc17.png) --}}
        <div class="tab-pane fade {{ request()->is('finanzas') || request()->is('finanzas/estado-financiero') ? 'show active' : '' }}"
             id="estadoFinanciero" role="tabpanel" aria-labelledby="estado-financiero-tab">

            <h4 class="fw-bold text-success mb-4">Estado Financiero General</h4> {{-- Changed to h4 as h3 is in the parent layout --}}

            <div class="row">
                <div class="col-md-4">
                    <div class="card-summary available-balance">
                        <i class="fas fa-money-bill-wave icon"></i>
                        <div>
                            <div class="title">Saldo disponible</div>
                            <div class="value">$124,500</div>
                            <div class="description">Fondos actuales en caja</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-summary net-profit">
                        <i class="fas fa-chart-line icon"></i>
                        <div>
                            <div class="title">Ganancia neta</div>
                            <div class="value">$18,200</div>
                            <div class="description">Resultado del mes actual</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-summary accumulated-debt">
                        <i class="fas fa-exclamation-triangle icon"></i>
                        <div>
                            <div class="title">Deudas acumuladas</div>
                            <div class="value">$32,000</div>
                            <div class="description">Insumos, nómina y proveedores</div>
                        </div>
                    </div>
                </div>
            </div>

            <h4 class="mt-4">Movimientos Recientes</h4>
            <div class="details-section">
                {{-- Headers --}}
                <div class="details-item fw-bold text-muted" style="border-bottom: 2px solid #ddd;">
                    <div class="icon"></div>
                    <div class="info col-date">Fecha</div>
                    <div class="info col-info">Descripción</div>
                    <div class="info col-amount text-right">Monto</div>
                    <div class="info col-status text-right">Tipo</div>
                    <div class="col-action-icon"></div>
                </div>
                {{-- Movement Examples from image_33fc37.png --}}
                <div class="details-item">
                    <i class="fas fa-calendar-alt icon"></i>
                    <div class="info col-date">2024-06-10</div>
                    <div class="info col-info">Venta de tomates - Lote 12 - Caja 3</div>
                    <div class="info col-amount text-success">$2,500</div>
                    <div class="info col-status">Ingreso</div>
                    <div class="col-action-icon"><i class="fas fa-info-circle"></i></div>
                </div>
                <div class="details-item">
                    <i class="fas fa-calendar-alt icon"></i>
                    <div class="info col-date">2024-06-09</div>
                    <div class="info col-info">Compra fertilizante - Lote 8</div>
                    <div class="info col-amount text-danger">$1,000</div>
                    <div class="info col-status">Egreso</div>
                    <div class="col-action-icon"><i class="fas fa-info-circle"></i></div>
                </div>
                <div class="details-item">
                    <i class="fas fa-calendar-alt icon"></i>
                    <div class="info col-date">2024-06-08</div>
                    <div class="info col-info">Pago nómina - Lote 5</div>
                    <div class="info col-amount text-danger">$3,200</div>
                    <div class="info col-status">Egreso</div>
                    <div class="col-action-icon"><i class="fas fa-info-circle"></i></div>
                </div>
            </div>

            <h4 class="mt-4">Reporte de Ingresos</h4>
            <div class="chart-container">
                <ul class="nav chart-nav">
                    <li class="nav-item">
                        <a class="nav-link active" id="mes-actual-tab" data-toggle="tab" href="#mesActual" role="tab" aria-controls="mesActual" aria-selected="true">Mes actual</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="mes-anterior-tab" data-toggle="tab" href="#mesAnterior" role="tab" aria-controls="mesAnterior" aria-selected="false">Mes anterior</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="mesActual" role="tabpanel" aria-labelledby="mes-actual-tab">
                        <div class="placeholder-bar-chart">Gráfica de Ingresos (Mes Actual)</div>
                    </div>
                    <div class="tab-pane fade" id="mesAnterior" role="tabpanel" aria-labelledby="mes-anterior-tab">
                        <div class="placeholder-chart">Gráfica de Ingresos (Mes Anterior)</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Ingresos Tab Content (image_1c7a3a.png) --}}
        <div class="tab-pane fade {{ request()->is('finanzas/ingresos') ? 'show active' : '' }}"
             id="ingresos" role="tabpanel" aria-labelledby="ingresos-tab">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold text-success m-0">Resumen de Ingresos</h4>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addIngresoModal">
                    <i class="fas fa-plus-circle me-2"></i> Agregar Ingreso
                </button>
            </div>

            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card-summary">
                        <div class="title">Total Ingresos</div>
                        <div class="value text-success">$12,500.00</div>
                        <div class="description"><i class="fas fa-arrow-up text-success"></i> 15.2% este mes</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-summary">
                        <div class="title">Ingresos Promedio Mensual</div>
                        <div class="value">$4,166.67</div>
                        <div class="description">Últimos 3 meses</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-summary">
                        <div class="title">Ingresos Pendientes</div>
                        <div class="value text-warning">$1,200.00</div>
                        <div class="description">2 facturas</div>
                    </div>
                </div>
            </div>

            <div class="chart-container mb-4">
                <div class="placeholder-chart">Gráfico de Ingresos (Placeholder)</div>
            </div>

            <div class="table-responsive">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="input-group search-filter-group">
                        <input type="text" class="form-control" placeholder="Buscar ingreso..." aria-label="Buscar ingreso">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                    </div>
                    <div class="d-flex">
                        <select class="form-control me-2">
                            <option>Categoría</option>
                            <option>Ventas</option>
                            <option>Servicios</option>
                            <option>Inversiones</option>
                            <option>Otros</option>
                        </select>
                        <select class="form-control me-2">
                            <option>Estado</option>
                            <option>Recibido</option>
                            <option>Pendiente</option>
                        </select>
                        <select class="form-control">
                            <option>Ordenar por</option>
                            <option>Fecha (reciente)</option>
                            <option>Monto (mayor)</option>
                        </select>
                    </div>
                </div>

                <table class="table table-hover finanzas-table">
                    <thead>
                        <tr>
                            <th>FECHA</th>
                            <th>DESCRIPCIÓN</th>
                            <th>CATEGORÍA</th>
                            <th>MONTO</th>
                            <th>ESTADO</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2023-10-26</td>
                            <td>Venta de Producto X</td>
                            <td>Ventas</td>
                            <td>$3,000.00</td>
                            <td><span class="badge badge-success">Recibido</span></td>
                            <td class="action-buttons">
                                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editIngresoModal" data-id="1"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteIngresoModal" data-id="1"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>2023-10-25</td>
                            <td>Servicio de Consultoría</td>
                            <td>Servicios</td>
                            <td>$1,500.00</td>
                            <td><span class="badge badge-success">Recibido</span></td>
                            <td class="action-buttons">
                                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editIngresoModal" data-id="2"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteIngresoModal" data-id="2"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>2023-10-24</td>
                            <td>Reembolso de Gastos</td>
                            <td>Otros</td>
                            <td>$200.00</td>
                            <td><span class="badge badge-success">Recibido</span></td>
                            <td class="action-buttons">
                                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editIngresoModal" data-id="3"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteIngresoModal" data-id="3"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>2023-10-23</td>
                            <td>Factura Cliente A</td>
                            <td>Ventas</td>
                            <td>$800.00</td>
                            <td><span class="badge badge-warning">Pendiente</span></td>
                            <td class="action-buttons">
                                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editIngresoModal" data-id="4"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteIngresoModal" data-id="4"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>2023-10-22</td>
                            <td>Intereses de Inversión</td>
                            <td>Inversiones</td>
                            <td>$50.00</td>
                            <td><span class="badge badge-success">Recibido</span></td>
                            <td class="action-buttons">
                                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editIngresoModal" data-id="5"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteIngresoModal" data-id="5"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Egresos Tab Content (image_1c7773.png) --}}
        <div class="tab-pane fade {{ request()->is('finanzas/egresos') ? 'show active' : '' }}"
             id="egresos" role="tabpanel" aria-labelledby="egresos-tab">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold text-danger m-0">Resumen de Egresos</h4>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addEgresoModal">
                    <i class="fas fa-plus-circle me-2"></i> Agregar Egreso
                </button>
            </div>

            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card-summary">
                        <div class="title">Total Egresos</div>
                        <div class="value text-danger">$8,200.00</div>
                        <div class="description"><i class="fas fa-arrow-down text-danger"></i> -3.5% este mes</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-summary">
                        <div class="title">Egresos Promedio Mensual</div>
                        <div class="value">$2,733.33</div>
                        <div class="description">Últimos 3 meses</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-summary">
                        <div class="title">Pagos Pendientes</div>
                        <div class="value text-warning">$950.00</div>
                        <div class="description">3 facturas</div>
                    </div>
                </div>
            </div>

            <div class="chart-container mb-4">
                <div class="placeholder-chart">Gráfico de Egresos (Placeholder)</div>
            </div>

            <div class="table-responsive">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="input-group search-filter-group">
                        <input type="text" class="form-control" placeholder="Buscar egreso..." aria-label="Buscar egreso">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                    </div>
                    <div class="d-flex">
                        <select class="form-control me-2">
                            <option>Categoría</option>
                            <option>Operaciones</option>
                            <option>Materiales</option>
                            <option>Servicios</option>
                            <option>Marketing</option>
                        </select>
                        <select class="form-control me-2">
                            <option>Estado</option>
                            <option>Pagado</option>
                            <option>Pendiente</option>
                        </select>
                        <select class="form-control">
                            <option>Ordenar por</option>
                            <option>Fecha (reciente)</option>
                            <option>Monto (mayor)</option>
                        </select>
                    </div>
                </div>

                <table class="table table-hover finanzas-table">
                    <thead>
                        <tr>
                            <th>FECHA</th>
                            <th>DESCRIPCIÓN</th>
                            <th>CATEGORÍA</th>
                            <th>MONTO</th>
                            <th>ESTADO</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2023-10-26</td>
                            <td>Alquiler de Oficina</td>
                            <td>Operaciones</td>
                            <td>$2,500.00</td>
                            <td><span class="badge badge-success">Pagado</span></td>
                            <td class="action-buttons">
                                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editEgresoModal" data-id="1"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteEgresoModal" data-id="1"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>2023-10-25</td>
                            <td>Suministros de Oficina</td>
                            <td>Materiales</td>
                            <td>$150.00</td>
                            <td><span class="badge badge-success">Pagado</span></td>
                            <td class="action-buttons">
                                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editEgresoModal" data-id="2"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteEgresoModal" data-id="2"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>2023-10-24</td>
                            <td>Servicio de Internet</td>
                            <td>Servicios</td>
                            <td>$80.00</td>
                            <td><span class="badge badge-success">Pagado</span></td>
                            <td class="action-buttons">
                                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editEgresoModal" data-id="3"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteEgresoModal" data-id="3"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>2023-10-23</td>
                            <td>Factura de Electricidad</td>
                            <td>Servicios</td>
                            <td>$220.00</td>
                            <td><span class="badge badge-warning">Pendiente</span></td>
                            <td class="action-buttons">
                                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editEgresoModal" data-id="4"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteEgresoModal" data-id="4"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>2023-10-22</td>
                            <td>Campaña de Marketing</td>
                            <td>Marketing</td>
                            <td>$500.00</td>
                            <td><span class="badge badge-success">Pagado</span></td>
                            <td class="action-buttons">
                                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editEgresoModal" data-id="5"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteEgresoModal" data-id="5"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Pagos Tab Content (image_1c7752.png) --}}
        <div class="tab-pane fade {{ request()->is('finanzas/pagos') ? 'show active' : '' }}"
             id="pagos" role="tabpanel" aria-labelledby="pagos-tab">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold text-info m-0">Resumen de Pagos</h4>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addPagoModal">
                    <i class="fas fa-plus-circle me-2"></i> Agregar Pago
                </button>
            </div>

            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card-summary">
                        <div class="title">Total Pagado</div>
                        <div class="value text-success">$8,500.00</div>
                        <div class="description"><i class="fas fa-check-circle text-success"></i> Pagado este mes</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-summary">
                        <div class="title">Pagos Pendientes</div>
                        <div class="value text-warning">$1,500.00</div>
                        <div class="description">5 pagos</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-summary">
                        <div class="title">Pagos Atrasados</div>
                        <div class="value text-danger">$500.00</div>
                        <div class="description">1 pago</div>
                    </div>
                </div>
            </div>

            <div class="chart-container mb-4">
                <div class="placeholder-chart">Gráfico de Pagos (Placeholder)</div>
            </div>

            <div class="table-responsive">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="input-group search-filter-group">
                        <input type="text" class="form-control" placeholder="Buscar pago..." aria-label="Buscar pago">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                    </div>
                    <div class="d-flex">
                        <select class="form-control me-2">
                            <option>Categoría</option>
                            <option>Materiales de Oficina</option>
                            <option>Hosting y Dominio</option>
                            <option>Alquiler Oficina</option>
                            <option>Limpieza Mensual</option>
                            <option>Cuota Préstamo</option>
                        </select>
                        <select class="form-control me-2">
                            <option>Estado</option>
                            <option>Pagado</option>
                            <option>Pendiente</option>
                            <option>Atrasado</option>
                        </select>
                        <select class="form-control">
                            <option>Ordenar por</option>
                            <option>Fecha (reciente)</option>
                            <option>Monto (mayor)</option>
                        </select>
                    </div>
                </div>

                <table class="table table-hover finanzas-table">
                    <thead>
                        <tr>
                            <th>FECHA DE PAGO</th>
                            <th>BENEFICIARIO</th>
                            <th>CONCEPTO</th>
                            <th>MONTO</th>
                            <th>ESTADO</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2023-10-26</td>
                            <td>Proveedor A</td>
                            <td>Materiales de Oficina</td>
                            <td>$300.00</td>
                            <td><span class="badge badge-success">Pagado</span></td>
                            <td class="action-buttons">
                                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editPagoModal" data-id="1"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deletePagoModal" data-id="1"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>2023-10-25</td>
                            <td>Servicios Web S.A.</td>
                            <td>Hosting y Dominio</td>
                            <td>$150.00</td>
                            <td><span class="badge badge-success">Pagado</span></td>
                            <td class="action-buttons">
                                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editPagoModal" data-id="2"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deletePagoModal" data-id="2"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>2023-10-24</td>
                            <td>Arrendador Inmueble</td>
                            <td>Alquiler Oficina</td>
                            <td>$1,000.00</td>
                            <td><span class="badge badge-warning">Pendiente</span></td>
                            <td class="action-buttons">
                                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editPagoModal" data-id="3"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deletePagoModal" data-id="3"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>2023-10-23</td>
                            <td>Servicio de Limpieza</td>
                            <td>Limpieza Mensual</td>
                            <td>$120.00</td>
                            <td><span class="badge badge-success">Pagado</span></td>
                            <td class="action-buttons">
                                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editPagoModal" data-id="4"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deletePagoModal" data-id="4"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>2023-10-22</td>
                            <td>Banco XYZ</td>
                            <td>Cuota Préstamo</td>
                            <td>$500.00</td>
                            <td><span class="badge badge-danger">Atrasado</span></td>
                            <td class="action-buttons">
                                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editPagoModal" data-id="5"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deletePagoModal" data-id="5"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Facturación Tab Content (image_1c771d.png) --}}
        <div class="tab-pane fade {{ request()->is('finanzas/facturacion') ? 'show active' : '' }}"
             id="facturacion" role="tabpanel" aria-labelledby="facturacion-tab">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold text-primary m-0">Resumen de Facturación</h4>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addFacturaModal">
                    <i class="fas fa-plus-circle me-2"></i> Agregar Factura
                </button>
            </div>

            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card-summary">
                        <div class="title">Total Facturado</div>
                        <div class="value text-success">$12,500.00</div>
                        <div class="description"><i class="fas fa-dollar-sign text-success"></i> Este mes</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-summary">
                        <div class="title">Facturas Pendientes</div>
                        <div class="value text-warning">$3,200.00</div>
                        <div class="description">5 facturas</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-summary">
                        <div class="title">Facturas Vencidas</div>
                        <div class="value text-danger">$800.00</div>
                        <div class="description">2 facturas</div>
                    </div>
                </div>
            </div>

            <div class="chart-container mb-4">
                <div class="placeholder-chart">Gráfico de Facturación (Placeholder)</div>
            </div>

            <div class="table-responsive">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="input-group search-filter-group">
                        <input type="text" class="form-control" placeholder="Buscar factura..." aria-label="Buscar factura">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                    </div>
                    <div class="d-flex">
                        <select class="form-control me-2">
                            <option>Cliente</option>
                            <option>Cliente A</option>
                            <option>Cliente B</option>
                            <option>Cliente C</option>
                            <option>Cliente D</option>
                            <option>Cliente E</option>
                        </select>
                        <select class="form-control me-2">
                            <option>Estado</option>
                            <option>Pagada</option>
                            <option>Pendiente</option>
                            <option>Vencida</option>
                        </select>
                        <select class="form-control">
                            <option>Ordenar por</option>
                            <option>Fecha (reciente)</option>
                            <option>Monto (mayor)</option>
                        </select>
                    </div>
                </div>

                <table class="table table-hover finanzas-table">
                    <thead>
                        <tr>
                            <th>FECHA DE EMISIÓN</th>
                            <th>CLIENTE</th>
                            <th>CONCEPTO</th>
                            <th>MONTO</th>
                            <th>ESTADO</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2023-10-26</td>
                            <td>Cliente A</td>
                            <td>Desarrollo WEB</td>
                            <td>$2,500.00</td>
                            <td><span class="badge badge-success">Pagada</span></td>
                            <td class="action-buttons">
                                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editFacturaModal" data-id="1"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteFacturaModal" data-id="1"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>2023-10-25</td>
                            <td>Cliente B</td>
                            <td>Consultoría SEO</td>
                            <td>$800.00</td>
                            <td><span class="badge badge-warning">Pendiente</span></td>
                            <td class="action-buttons">
                                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editFacturaModal" data-id="2"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteFacturaModal" data-id="2"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>2023-10-24</td>
                            <td>Cliente C</td>
                            <td>Mantenimiento Mensual</td>
                            <td>$300.00</td>
                            <td><span class="badge badge-success">Pagada</span></td>
                            <td class="action-buttons">
                                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editFacturaModal" data-id="3"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteFacturaModal" data-id="3"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>2023-10-23</td>
                            <td>Cliente D</td>
                            <td>Diseño Gráfico</td>
                            <td>$500.00</td>
                            <td><span class="badge badge-danger">Vencida</span></td>
                            <td class="action-buttons">
                                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editFacturaModal" data-id="4"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteFacturaModal" data-id="4"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>2023-10-22</td>
                            <td>Cliente E</td>
                            <td>Soporte Técnico</td>
                            <td>$150.00</td>
                            <td><span class="badge badge-success">Pagada</span></td>
                            <td class="action-buttons">
                                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editFacturaModal" data-id="5"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteFacturaModal" data-id="5"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Utilidades Tab Content (image_1c76fd.png) --}}
        <div class="tab-pane fade {{ request()->is('finanzas/utilidades') ? 'show active' : '' }}"
             id="utilidades" role="tabpanel" aria-labelledby="utilidades-tab">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold text-success m-0">Resumen de Utilidades</h4>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#generateReportModal">
                    <i class="fas fa-file-export me-2"></i> Generar Reporte
                </button>
            </div>

            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card-summary">
                        <div class="title">Ganancia Neta</div>
                        <div class="value text-success">$9,300.00</div>
                        <div class="description"><i class="fas fa-arrow-up text-success"></i> 15% este mes</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-summary">
                        <div class="title">Margen de Utilidad</div>
                        <div class="value">35%</div>
                        <div class="description">% Objetivo: 40%</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-summary">
                        <div class="title">Proyección Anual</div>
                        <div class="value">$110,000.00</div>
                        <div class="description">Basado en tendencias</div>
                    </div>
                </div>
            </div>

            <div class="chart-container mb-4">
                <div class="placeholder-chart">Gráfico de Utilidades (Placeholder)</div>
            </div>

            <div class="table-responsive">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="input-group search-filter-group">
                        <input type="text" class="form-control" placeholder="Buscar transacción..." aria-label="Buscar transacción">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                    </div>
                    <div class="d-flex">
                        <select class="form-control me-2">
                            <option>Categoría</option>
                            <option>Ventas</option>
                            <option>Gastos Operativos</option>
                            <option>Servicios</option>
                        </select>
                        <select class="form-control me-2">
                            <option>Tipo</option>
                            <option>Ingreso</option>
                            <option>Egreso</option>
                        </select>
                        <select class="form-control">
                            <option>Período</option>
                            <option>Este mes</option>
                            <option>Últimos 3 meses</option>
                            <option>Este año</option>
                        </select>
                    </div>
                </div>

                <table class="table table-hover finanzas-table">
                    <thead>
                        <tr>
                            <th>FECHA</th>
                            <th>CONCEPTO</th>
                            <th>CATEGORÍA</th>
                            <th>TIPO</th>
                            <th>MONTO</th>
                            <th>ESTADO</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2023-10-26</td>
                            <td>Venta de Producto X</td>
                            <td>Ventas</td>
                            <td><span class="badge badge-success">Ingreso</span></td>
                            <td>$2,500.00</td>
                            <td><span class="badge badge-secondary">Completado</span></td>
                            <td class="action-buttons">
                                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editUtilidadModal" data-id="1"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteUtilidadModal" data-id="1"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>2023-10-25</td>
                            <td>Pago de Alquiler</td>
                            <td>Gastos Operativos</td>
                            <td><span class="badge badge-danger">Egreso</span></td>
                            <td>$800.00</td>
                            <td><span class="badge badge-secondary">Completado</span></td>
                            <td class="action-buttons">
                                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editUtilidadModal" data-id="2"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteUtilidadModal" data-id="2"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>2023-10-24</td>
                            <td>Servicio de Consultoría</td>
                            <td>Servicios</td>
                            <td><span class="badge badge-success">Ingreso</span></td>
                            <td>$1,200.00</td>
                            <td><span class="badge badge-secondary">Completado</span></td>
                            <td class="action-buttons">
                                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editUtilidadModal" data-id="3"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteUtilidadModal" data-id="3"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>2023-10-23</td>
                            <td>Compra de Suministros</td>
                            <td>Gastos Operativos</td>
                            <td><span class="badge badge-danger">Egreso</span></td>
                            <td>$150.00</td>
                            <td><span class="badge badge-secondary">Completado</span></td>
                            <td class="action-buttons">
                                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editUtilidadModal" data-id="4"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteUtilidadModal" data-id="4"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>2023-10-22</td>
                            <td>Reembolso de Cliente</td>
                            <td>Ventas</td>
                            <td><span class="badge badge-success">Ingreso</span></td>
                            <td>$50.00</td>
                            <td><span class="badge badge-secondary">Completado</span></td>
                            <td class="action-buttons">
                                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editUtilidadModal" data-id="5"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteUtilidadModal" data-id="5"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Deudas Tab Content (image_33fb3b.png) --}}
        <div class="tab-pane fade {{ request()->is('finanzas/deudas') ? 'show active' : '' }}"
             id="deudas" role="tabpanel" aria-labelledby="deudas-tab">

            <h4 class="mb-3">Resumen de Deudas</h4>
            <div class="row">
                <div class="col-md-4">
                    <div class="card-summary total-debt">
                        <i class="fas fa-hand-holding-usd icon"></i>
                        <div>
                            <div class="title">Total Deuda</div>
                            <div class="value">$45,000</div>
                            <div class="description">Saldo pendiente</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-summary pending-payments">
                        <i class="fas fa-hourglass-half icon"></i>
                        <div>
                            <div class="title">Pagos Vencidos</div>
                            <div class="value">$8,500</div>
                            <div class="description">Al día de hoy</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-summary paid-payments">
                        <i class="fas fa-check-circle icon"></i>
                        <div>
                            <div class="title">Último Pago</div>
                            <div class="value">$2,000</div>
                            <div class="description">15 Jun 2024</div>
                        </div>
                    </div>
                </div>
            </div>

            <h4 class="mt-4">Historial de Pagos</h4>
            <div class="details-section">
                {{-- Headers for Historial de Pagos --}}
                <div class="details-item fw-bold text-muted" style="border-bottom: 2px solid #ddd;">
                    <div class="icon"></div>
                    <div class="info col-date">Fecha</div>
                    <div class="info">Banco / Proveedor</div>
                    <div class="info">Concepto</div>
                    <div class="info col-amount text-right">Monto</div>
                    <div class="info col-amount-due text-right">Saldo Anterior</div>
                    <div class="col-action-icon-debt">ACCIONES</div>
                </div>
                {{-- Payment History Examples from image_33fb3b.png --}}
                <div class="details-item debt-item">
                    <i class="fas fa-calendar-check icon"></i>
                    <div class="info col-date">2024-06-16</div>
                    <div class="info">Banco Rural</div>
                    <div class="info">Compra insumos</div>
                    <div class="info col-amount text-success">$2,500</div>
                    <div class="info col-amount-due">$3,000</div>
                    <div class="col-action-icon-debt">
                        <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editDeudaHistorialModal" data-id="1"><i class="fas fa-pencil-alt"></i></button>
                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteDeudaHistorialModal" data-id="1"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </div>
                <div class="details-item debt-item">
                    <i class="fas fa-calendar-check icon"></i>
                    <div class="info col-date">2024-06-10</div>
                    <div class="info">Banco Rural</div>
                    <div class="info">Compra fertilizante</div>
                    <div class="info col-amount text-success">$3,000</div>
                    <div class="info col-amount-due">$3,000</div>
                    <div class="col-action-icon-debt">
                        <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editDeudaHistorialModal" data-id="2"><i class="fas fa-pencil-alt"></i></button>
                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteDeudaHistorialModal" data-id="2"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </div>
            </div>

            <h4 class="mt-4">Próximos Vencimientos</h4>
            <div class="details-section">
                {{-- Headers for Próximos Vencimientos --}}
                <div class="details-item fw-bold text-muted" style="border-bottom: 2px solid #ddd;">
                    <div class="icon"></div>
                    <div class="info col-date">Fecha Vencimiento</div>
                    <div class="info">Proveedor / Concepto</div>
                    <div class="info">Monto Original</div>
                    <div class="info col-status text-right">Estado</div>
                    <div class="info col-amount text-right">Monto a Pagar</div>
                    <div class="col-pay-button">ACCIONES</div>
                </div>
                {{-- Upcoming Due Dates Examples from image_33fb3b.png --}}
                <div class="details-item debt-item">
                    <i class="fas fa-exclamation-circle icon text-danger"></i>
                    <div class="info col-date">2024-06-25</div>
                    <div class="info">Proveedor Agua - Compra fertilizante</div>
                    <div class="info">$2,000</div>
                    <div class="info col-status text-warning">Pendiente</div>
                    <div class="info col-amount">$2,000</div>
                    <div class="col-pay-button">
                        <button class="btn btn-sm btn-success">Pagar</button>
                        <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editDeudaVencimientoModal" data-id="1"><i class="fas fa-pencil-alt"></i></button>
                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteDeudaVencimientoModal" data-id="1"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </div>
                <div class="details-item debt-item">
                    <i class="fas fa-exclamation-circle icon text-warning"></i>
                    <div class="info col-date">2024-07-01</div>
                    <div class="info">Banco Rural</div>
                    <div class="info">$4,000</div>
                    <div class="info col-status text-warning">Pendiente</div>
                    <div class="info col-amount">$4,000</div>
                    <div class="col-pay-button">
                        <button class="btn btn-sm btn-success">Pagar</button>
                        <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editDeudaVencimientoModal" data-id="2"><i class="fas fa-pencil-alt"></i></button>
                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteDeudaVencimientoModal" data-id="2"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('styles')
<link rel="stylesheet" href="{{ asset('css/finanzas.css') }}">
<style>
    /* Custom Styles for Finanzas Dashboard - Add to finanzas.css */
    .finanzas-tabs .nav-link {
        color: #6c757d; /* Default tab text color */
        border: none;
        border-bottom: 2px solid transparent;
        padding-bottom: 0.75rem;
    }

    .finanzas-tabs .nav-link.active {
        color: #28a745; /* Active tab text color */
        border-color: #28a745; /* Active tab underline color */
        font-weight: bold;
    }

    .finanzas-tabs .nav-link:hover {
        border-color: #e2e6ea;
    }

    .card-summary {
        background-color: #fff;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .card-summary .icon {
        font-size: 2.5rem;
        color: #6c757d;
    }

    .card-summary .title {
        font-size: 1rem;
        color: #6c757d;
        margin-bottom: 5px;
    }

    .card-summary .value {
        font-size: 1.8rem;
        font-weight: bold;
        color: #343a40;
    }

    .card-summary .description {
        font-size: 0.85rem;
        color: #6c757d;
    }

    /* Specific card colors if needed */
    .card-summary.available-balance .icon { color: #007bff; }
    .card-summary.net-profit .icon { color: #28a745; }
    .card-summary.accumulated-debt .icon { color: #dc3545; }
    .card-summary.total-debt .icon { color: #17a2b8; }
    .card-summary.pending-payments .icon { color: #ffc107; }
    .card-summary.paid-payments .icon { color: #28a745; }

    .chart-container {
        background-color: #fff;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        min-height: 250px; /* Placeholder height */
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .placeholder-chart, .placeholder-bar-chart {
        color: #6c757d;
        font-style: italic;
        text-align: center;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .finanzas-table thead th {
        background-color: #f8f9fa;
        color: #495057;
        font-weight: bold;
    }

    .finanzas-table tbody tr:hover {
        background-color: #f2f2f2;
    }

    .badge-success { background-color: #28a745; color: #fff; }
    .badge-warning { background-color: #ffc107; color: #212529; }
    .badge-danger { background-color: #dc3545; color: #fff; }
    .badge-secondary { background-color: #6c757d; color: #fff; }

    .action-buttons button {
        margin-right: 5px;
    }

    .search-filter-group {
        max-width: 300px;
    }

    /* Styles for the "details-section" if you want to mimic the clean table-like layout from "Estado Financiero" and "Deudas" */
    .details-section {
        background-color: #fff;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
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
        width: 30px;
        text-align: center;
        font-size: 1.2rem;
        color: #6c757d;
    }

    .details-item .info {
        flex-grow: 1;
        padding: 0 10px;
    }

    .details-item .col-date {
        flex-basis: 120px; /* Fixed width for date column */
        flex-shrink: 0;
    }

    .details-item .col-info {
        flex-basis: 250px; /* Fixed width for description */
        flex-shrink: 0;
    }

    .details-item .col-amount {
        flex-basis: 100px; /* Fixed width for amount */
        flex-shrink: 0;
        text-align: right;
        font-weight: bold;
    }

    .details-item .col-status {
        flex-basis: 80px; /* Fixed width for status */
        flex-shrink: 0;
        text-align: right;
    }

    .details-item .col-action-icon, .details-item .col-action-icon-debt {
        width: 80px; /* Space for action icons */
        text-align: right;
    }
    .details-item .col-pay-button {
        width: 150px;
        text-align: right;
    }

    .debt-item .info {
        flex-grow: 1;
        padding: 0 10px;
    }
    .debt-item .col-amount-due {
        flex-basis: 120px;
        flex-shrink: 0;
        text-align: right;
    }
    .debt-item .col-date {
        flex-basis: 150px;
    }
    .debt-item .col-pay-button .btn {
        margin-left: 5px;
    }
    .btn-sm-pay {
        background-color: #28a745;
        color: white;
        border: none;
        padding: 5px 10px;
        border-radius: 5px;
        font-size: 0.8rem;
    }
</style>
@endsection

{{-- All the Modals (Add, Edit, Delete) --}}

{{-- Generic Add Modal Structure (Adapt for each section) --}}
<div class="modal fade" id="addIngresoModal" tabindex="-1" role="dialog" aria-labelledby="addIngresoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addIngresoModalLabel">Agregar Nuevo Ingreso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="ingresoFecha" class="form-label">Fecha</label>
                        <input type="date" class="form-control" id="ingresoFecha" required>
                    </div>
                    <div class="mb-3">
                        <label for="ingresoDescripcion" class="form-label">Descripción</label>
                        <input type="text" class="form-control" id="ingresoDescripcion" placeholder="Ej: Venta de Producto Z" required>
                    </div>
                    <div class="mb-3">
                        <label for="ingresoCategoria" class="form-label">Categoría</label>
                        <select class="form-control" id="ingresoCategoria" required>
                            <option value="">Seleccione una categoría</option>
                            <option>Ventas</option>
                            <option>Servicios</option>
                            <option>Inversiones</option>
                            <option>Otros</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="ingresoMonto" class="form-label">Monto</label>
                        <input type="number" step="0.01" class="form-control" id="ingresoMonto" placeholder="Ej: 500.00" required>
                    </div>
                    <div class="mb-3">
                        <label for="ingresoEstado" class="form-label">Estado</label>
                        <select class="form-control" id="ingresoEstado" required>
                            <option value="">Seleccione un estado</option>
                            <option>Recibido</option>
                            <option>Pendiente</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Guardar Ingreso</button>
            </div>
        </div>
    </div>
</div>

{{-- Generic Edit Modal Structure (Adapt for each section) --}}
<div class="modal fade" id="editIngresoModal" tabindex="-1" role="dialog" aria-labelledby="editIngresoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editIngresoModalLabel">Editar Ingreso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" id="editIngresoId">
                    <div class="mb-3">
                        <label for="editIngresoFecha" class="form-label">Fecha</label>
                        <input type="date" class="form-control" id="editIngresoFecha" required>
                    </div>
                    <div class="mb-3">
                        <label for="editIngresoDescripcion" class="form-label">Descripción</label>
                        <input type="text" class="form-control" id="editIngresoDescripcion" required>
                    </div>
                    <div class="mb-3">
                        <label for="editIngresoCategoria" class="form-label">Categoría</label>
                        <select class="form-control" id="editIngresoCategoria" required>
                            <option>Ventas</option>
                            <option>Servicios</option>
                            <option>Inversiones</option>
                            <option>Otros</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editIngresoMonto" class="form-label">Monto</label>
                        <input type="number" step="0.01" class="form-control" id="editIngresoMonto" required>
                    </div>
                    <div class="mb-3">
                        <label for="editIngresoEstado" class="form-label">Estado</label>
                        <select class="form-control" id="editIngresoEstado" required>
                            <option>Recibido</option>
                            <option>Pendiente</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>

{{-- Generic Delete Confirmation Modal Structure (Adapt for each section) --}}
<div class="modal fade" id="deleteIngresoModal" tabindex="-1" role="dialog" aria-labelledby="deleteIngresoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteIngresoModalLabel">Confirmar Eliminación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Está seguro que desea eliminar este ingreso?</p>
                <input type="hidden" id="deleteIngresoId">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger">Eliminar</button>
            </div>
        </div>
    </div>
</div>

{{-- Repeat the Add, Edit, Delete modal structures for Egresos, Pagos, Facturacion, Utilidades, and Deudas sections,
    adjusting IDs, labels, and form fields as per their respective data. --}}

@section('scripts')
<script>
    // Ensure Bootstrap's JS is loaded *before* this script runs for proper tab functionality
    document.addEventListener('DOMContentLoaded', function() {
        // Handle initial tab activation based on URL
        var currentPath = window.location.pathname;
        var tabs = document.querySelectorAll('.finanzas-tabs .nav-link');
        var anyTabActive = false;

        tabs.forEach(function(tab) {
            var tabHref = tab.getAttribute('href'); // e.g., #estadoFinanciero, #ingresos
            var tabName = tabHref.replace('#', ''); // e.g., estadoFinanciero, ingresos

            // Determine if this tab should be active
            var shouldBeActive = false;
            if (tabName === 'estadoFinanciero' && (currentPath === '/finanzas' || currentPath.includes('/finanzas/estado-financiero'))) {
                shouldBeActive = true;
            } else if (currentPath.includes('/finanzas/' + tabName)) {
                shouldBeActive = true;
            }

            if (shouldBeActive) {
                tab.classList.add('active');
                tab.setAttribute('aria-selected', 'true');
                var tabPane = document.querySelector(tabHref);
                if (tabPane) {
                    tabPane.classList.add('show', 'active');
                }
                anyTabActive = true;
            } else {
                tab.classList.remove('active');
                tab.setAttribute('aria-selected', 'false');
                var tabPane = document.querySelector(tabHref);
                if (tabPane) {
                    tabPane.classList.remove('show', 'active');
                }
            }
        });

        // Fallback: If no specific tab matches (e.g., direct access to /finanzas and no sub-route matched), activate 'Estado Financiero' by default
        if (!anyTabActive) {
            var defaultTab = document.getElementById('estado-financiero-tab');
            if (defaultTab) {
                defaultTab.classList.add('active');
                defaultTab.setAttribute('aria-selected', 'true');
                var defaultTabPane = document.querySelector(defaultTab.getAttribute('href'));
                if (defaultTabPane) {
                    defaultTabPane.classList.add('show', 'active');
                }
            }
        }
    });

    // Re-initialize Bootstrap tab switching functionality
    // This assumes jQuery is available, as indicated in your initial script.
    // If you are using Bootstrap 5+, replace jQuery with native JS tab API.
    if (typeof jQuery !== 'undefined') {
        $(document).ready(function() {
            // Main Finanzas Tabs
            $('#finanzasTabs a').on('click', function (e) {
                e.preventDefault();
                $(this).tab('show');
            });
            // Nested Chart Tabs
            $('.chart-nav a').on('click', function (e) {
                e.preventDefault();
                $(this).tab('show');
            });

            // Handle Edit/Delete button clicks for modals (Example for Ingresos)
            $(document).on('click', '.finanzas-table .btn-warning', function() {
                const id = $(this).data('id');
                // In a real application, you'd fetch data for this ID and populate the modal
                $('#editIngresoId').val(id);
                // Example of populating: $('#editIngresoDescripcion').val('Fetched Description');
                // Open the modal
                $($(this).data('target')).modal('show');
            });

            $(document).on('click', '.finanzas-table .btn-danger', function() {
                const id = $(this).data('id');
                $('#deleteIngresoId').val(id);
                // Open the modal
                $($(this).data('target')).modal('show');
            });

            // You would need similar handlers for Egresos, Pagos, Facturacion, Utilidades, Deudas
        });
    } else {
        // Fallback for non-jQuery Bootstrap tab activation for Finanzas Tabs
        document.querySelectorAll('#finanzasTabs a').forEach(function(tabLink) {
            tabLink.addEventListener('click', function(e) {
                e.preventDefault();
                var targetId = this.getAttribute('href').substring(1);
                var targetPane = document.getElementById(targetId);

                document.querySelectorAll('.tab-content .tab-pane').forEach(function(pane) {
                    pane.classList.remove('show', 'active');
                });
                document.querySelectorAll('.finanzas-tabs .nav-link').forEach(function(link) {
                    link.classList.remove('active');
                    link.setAttribute('aria-selected', 'false');
                });

                targetPane.classList.add('show', 'active');
                this.classList.add('active');
                this.setAttribute('aria-selected', 'true');
            });
        });

        // Fallback for non-jQuery Bootstrap tab activation for Chart Tabs (Mes actual/anterior)
        document.querySelectorAll('.chart-nav a').forEach(function(tabLink) {
            tabLink.addEventListener('click', function(e) {
                e.preventDefault();
                var targetId = this.getAttribute('href').substring(1);
                var targetPane = document.getElementById(targetId);

                // Find the parent tab-content that contains these chart tabs
                var parentTabContent = this.closest('.chart-container').querySelector('.tab-content');
                if (parentTabContent) {
                    parentTabContent.querySelectorAll('.tab-pane').forEach(function(pane) {
                        pane.classList.remove('show', 'active');
                    });
                }

                // Deactivate all chart tab links
                this.closest('.chart-nav').querySelectorAll('.nav-link').forEach(function(link) {
                    link.classList.remove('active');
                    link.setAttribute('aria-selected', 'false');
                });

                // Show target pane and activate link
                if (targetPane) {
                    targetPane.classList.add('show', 'active');
                }
                this.classList.add('active');
                this.setAttribute('aria-selected', 'true');
            });
        });

        // Native JS for modal handling (example for Ingresos)
        document.querySelectorAll('.finanzas-table .btn-warning').forEach(function(button) {
            button.addEventListener('click', function() {
                const id = this.dataset.id;
                document.getElementById('editIngresoId').value = id;
                // You would fetch and populate data here
                var modalId = this.dataset.target;
                var modal = new bootstrap.Modal(document.querySelector(modalId));
                modal.show();
            });
        });

        document.querySelectorAll('.finanzas-table .btn-danger').forEach(function(button) {
            button.addEventListener('click', function() {
                const id = this.dataset.id;
                document.getElementById('deleteIngresoId').value = id;
                var modalId = this.dataset.target;
                var modal = new bootstrap.Modal(document.querySelector(modalId));
                modal.show();
            });
        });
    }
</script>
@endsection