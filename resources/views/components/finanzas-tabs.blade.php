<div class="finanzas-tabs-container">
    {{-- S U B  M E N U --}}
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
        {{-- Estado Financiero P R I N C I P A L--}}
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


@props([
    'saldoDisponible' => 0,
    'gananciaNeta' => 0,
    'deudasAcumuladas' => 0,
    'movimientosRecientes' => [],
    'ingresos' => [],
    'egresos' => [],
    'pagos' => [],
    'facturaciones' => [],
    'utilidades' => [],
    'deudas' => [],
    'totalIngresos' => 0,
    'promedioIngresos' => 0,
    'ingresosPendientes' => 0,
    'cantidadIngresosPendientes' => 0,
    'totalEgresos' => 0,
    'promedioEgresos' => 0,
    'egresosPendientes' => 0,
    'cantidadEgresosPendientes' => 0,
    'totalPagado' => 0,
    'pagosPendientes' => 0,
    'cantidadPagosPendientes' => 0,
    'pagosAtrasados' => 0,
    'cantidadPagosAtrasados' => 0,
    'totalFacturado' => 0,
    'facturasPendientes' => 0,
    'cantidadFacturasPendientes' => 0,
    'facturasVencidas' => 0,
    'cantidadFacturasVencidas' => 0,
    'gananciaNetaUtilidades' => 0,
    'margenUtilidad' => 0,
    'proyeccionAnual' => 0,
    'totalDeuda' => 0,
    'proximosVencimientos' => [],
    'ultimoPago' => 0,
    'fechaUltimoPago' => 'N/A',
    'variacionMensual' => 'N/A',
    'promedioMensual' => 'N/A',
    'montoPendiente' => 0,
    'totalPendientes' => 0,


])


        {{-- Ingresos C O N T E N I D O--}}
        <div class="tab-pane fade {{ request()->is('finanzas/ingresos') ? 'show active' : '' }}"
            id="ingresos" role="tabpanel" aria-labelledby="ingresos-tab">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold text-success m-0">Resumen de Ingresos</h4>
                <a href="{{ route('finanzas.ingresos.create') }}" class="btn btn-success">
                    <i class="fas fa-plus-circle me-2"></i> Agregar Ingreso
                </a>
            </div>

            {{-- Resumen --}}
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card-summary">
                        <div class="title">Total Ingresos</div>
                        <div class="value text-success">${{ number_format($totalIngresos, 2) }}</div>
                        <div class="description"><i class="fas fa-arrow-up text-success"></i> Este mes</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-summary">
                        <div class="title">Ingresos Promedio Mensual</div>
                        <div class="value">${{ number_format($promedioIngresos, 2) }}</div>
                        <div class="description">Últimos 3 meses</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-summary">
                        <div class="title">Ingresos Pendientes</div>
                        <div class="value text-warning">${{ number_format($ingresosPendientes, 2) }}</div>
                        <div class="description">{{ $cantidadIngresosPendientes }} facturas</div>
                    </div>
                </div>
            </div>
            {{-- Tabla de ingresos --}}
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
                            @foreach ($ingresos as $ingreso)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($ingreso->fecha)->format('Y-m-d') }}</td>
                                    <td>{{ $ingreso->descripcion }}</td>
                                    <td>{{ $ingreso->categoria }}</td>
                                    <td>${{ number_format($ingreso->monto, 2) }}</td>
                                    <td>
                                        <span class="badge {{ $ingreso->estado === 'Recibido' ? 'badge-success' : 'badge-warning' }}">
                                            {{ ucfirst($ingreso->estado) }}
                                        </span>
                                    </td>
                                    <td class="action-buttons d-flex gap-1">
                                        {{-- Botón editar --}}
                                        <a href="{{ route('finanzas.ingresos.create', ['edit' => $ingreso->id]) }}" class="btn btn-sm btn-warning">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>

                                        {{-- Formulario eliminar --}}
                                        <form action="{{ route('finanzas.eliminar', $ingreso->id) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este ingreso?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
        </div>

        {{-- Egresos Tab Content (image_1c7773.png) --}}
        <div class="tab-pane fade {{ request()->is('finanzas/egresos') ? 'show active' : '' }}"
             id="egresos" role="tabpanel" aria-labelledby="egresos-tab">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold text-danger m-0">Resumen de Egresos</h4>
                <a href="{{ route('finanzas.egresos.create') }}" class="btn btn-success">
                    <i class="fas fa-plus-circle me-2"></i> Agregar Egreso
                </a>
            </div>

            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card-summary">
                        <div class="title">Total Egresos</div>
                        <div class="value text-danger">${{ number_format($totalEgresos, 2) }}</div>
                        <div class="description"><i class="fas fa-arrow-down text-danger"></i> {{ $variacionMensual }} este mes</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-summary">
                        <div class="title">Egresos Promedio Mensual</div>
                        <div class="value">${{ number_format($promedioMensual, 2) }}</div>
                        <div class="description">Últimos 3 meses</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-summary">
                        <div class="title">Pagos Pendientes</div>
                        <div class="value text-warning">${{ number_format($montoPendiente, 2) }}</div>
                        <div class="description">{{ $totalPendientes }} facturas</div>
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
                    @foreach($egresos as $egreso)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($egreso->fecha)->format('Y-m-d') }}</td>
                            <td>{{ $egreso->descripcion }}</td>
                            <td>{{ $egreso->categoria }}</td>
                            <td>${{ number_format($egreso->monto, 2) }}</td>
                            <td>
                                @php
                                    $estado = strtolower($egreso->estado);
                                    $badgeClass = match($estado) {
                                        'pagado' => 'badge-success',
                                        'pendiente' => 'badge-warning',
                                        default => 'badge-secondary'
                                    };
                                @endphp
                                <span class="badge {{ $badgeClass }}">{{ ucfirst($estado) }}</span>
                            </td>
                            <td class="action-buttons d-flex gap-1">
                                {{-- Botón editar --}}
                                <a href="{{ route('finanzas.egresos.create', ['edit' => $egreso->id]) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>

                                {{-- Formulario eliminar --}}
                                <form action="{{ route('finanzas.eliminar', $egreso->id) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este egreso?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>


                </table>
            </div>
        </div>

        {{-- Pagos Tab Content (image_1c7752.png) --}}
        <div class="tab-pane fade {{ request()->is('finanzas/pagos') ? 'show active' : '' }}"
             id="pagos" role="tabpanel" aria-labelledby="pagos-tab">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold text-info m-0">Resumen de Pagos</h4>
                <a href="{{ route('finanzas.pagos.create') }}" class="btn btn-success">
                    <i class="fas fa-plus-circle me-2"></i> Agregar Pago
                </a>

            </div>

            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card-summary">
                        <div class="title">Total Pagado</div>
                        <div class="value text-success">${{ number_format($totalPagado, 2) }}</div>
                        <div class="description"><i class="fas fa-check-circle text-success"></i> Pagado este mes</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-summary">
                        <div class="title">Pagos Pendientes</div>
                        <div class="value text-warning">${{ number_format($pagosPendientes, 2) }}</div>
                        <div class="description">{{ $cantidadPagosPendientes }} pagos</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-summary">
                        <div class="title">Pagos Atrasados</div>
                        <div class="value text-danger">${{ number_format($pagosAtrasados, 2) }}</div>
                        <div class="description">{{ $cantidadPagosAtrasados }} pagos</div>
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
                        @foreach($pagos as $pago)
                            <tr>
                                <td>{{ $pago->fecha }}</td>
                                <td>{{ $pago->beneficiario }}</td>
                                <td>{{ $pago->concepto }}</td>
                                <td>${{ number_format($pago->monto, 2) }}</td>
                                <td>
                                    @php
                                        $estado = strtolower($pago->estado);
                                        $badgeClass = match($estado) {
                                            'pagado' => 'badge-success',
                                            'pendiente' => 'badge-warning',
                                            'atrasado' => 'badge-danger',
                                            default => 'badge-secondary'
                                        };
                                    @endphp
                                    <span class="badge {{ $badgeClass }}">{{ ucfirst($estado) }}</span>
                                </td>
                                <td class="action-buttons">
                                    <a href="{{ route('finanzas.pagos.create', $pago->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>

                                    <form action="{{ route('finanzas.eliminar', $pago->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar este pago?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>

        {{-- Facturación Tab Content --}}
        <div class="tab-pane fade {{ request()->is('finanzas/facturacion') ? 'show active' : '' }}"
            id="facturacion" role="tabpanel" aria-labelledby="facturacion-tab">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold text-primary m-0">Resumen de Facturación</h4>
                <a href="{{ route('finanzas.facturacion.create') }}" class="btn btn-success">
                    <i class="fas fa-plus-circle me-2"></i> Agregar Factura
                </a>
            </div>

            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card-summary">
                        <div class="title">Total Facturado</div>
                        <div class="value text-success">${{ number_format($totalFacturado, 2) }}</div>
                        <div class="description"><i class="fas fa-dollar-sign text-success"></i> Este mes</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-summary">
                        <div class="title">Facturas Pendientes</div>
                        <div class="value text-warning">${{ number_format($facturasPendientes, 2) }}</div>
                        <div class="description">{{ $cantidadFacturasPendientes }} facturas</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-summary">
                        <div class="title">Facturas Vencidas</div>
                        <div class="value text-danger">${{ number_format($facturasVencidas, 2) }}</div>
                        <div class="description">{{ $cantidadFacturasVencidas }} facturas</div>
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
                            {{-- Opciones de cliente podrían generarse dinámicamente si tienes la lista --}}
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
                        @foreach($facturaciones as $factura)
                            <tr>
                                <td>{{ $factura->fecha_emision }}</td>
                                <td>{{ $factura->cliente }}</td>
                                <td>{{ $factura->concepto }}</td>
                                <td>${{ number_format($factura->monto, 2) }}</td>
                                <td>
                                    @php
                                        $estado = strtolower($factura->estado);
                                        $badgeClass = match($estado) {
                                            'pagada' => 'badge-success',
                                            'pendiente' => 'badge-warning',
                                            'vencida' => 'badge-danger',
                                            default => 'badge-secondary'
                                        };
                                    @endphp
                                    <span class="badge {{ $badgeClass }}">{{ ucfirst($estado) }}</span>
                                </td>
                                <td class="action-buttons">
                                    <a href="{{ route('finanzas.facturacion.create', $factura->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>

                                    <form action="{{ route('finanzas.eliminar', $factura->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" 
                                                onclick="return confirm('¿Estás seguro de eliminar esta factura?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


        {{-- Utilidades Tab Content (image_1c76fd.png) --}}
        <div class="tab-pane fade {{ request()->is('finanzas/utilidades') ? 'show active' : '' }}"
             id="utilidades" role="tabpanel" aria-labelledby="utilidades-tab">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold text-success m-0">Resumen de Utilidades</h4>
                <a href="{{ route('finanzas.utilidades.create') }}" class="btn btn-success">
                    <i class="fas fa-plus-circle me-2"></i> Agregar Utilidad
                </a>
            </div>

            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card-summary">
                        <div class="title">Ganancia Neta</div>
                        <div class="value text-success">${{ number_format($gananciaNetaUtilidades, 2) }}</div>
                        <div class="description"><i class="fas fa-arrow-up text-success"></i> {{ $variacionMensual }} este mes</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-summary">
                        <div class="title">Margen de Utilidad</div>
                        <div class="value">{{ number_format($margenUtilidad, 1) }}%</div>
                        <div class="description">% Objetivo: 40%</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-summary">
                        <div class="title">Proyección Anual</div>
                        <div class="value">${{ number_format($proyeccionAnual, 2) }}</div>
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
                        @foreach($utilidades as $utilidad)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($utilidad->fecha)->format('Y-m-d') }}</td>
                            <td>{{ $utilidad->concepto }}</td>
                            <td>{{ $utilidad->categoria }}</td>
                            <td>
                                @if(strtolower($utilidad->tipo_utilidad) == 'ingreso')
                                    <span class="badge badge-success">Ingreso</span>
                                @else
                                    <span class="badge badge-danger">Egreso</span>
                                @endif
                            </td>
                            <td>${{ number_format($utilidad->monto, 2) }}</td>
                            <td>
                                @if($utilidad->estado == 'completado')
                                    <span class="badge badge-secondary">Completado</span>
                                @else
                                    <span class="badge badge-warning">{{ ucfirst($utilidad->estado) }}</span>
                                @endif
                            </td>
                            <td class="action-buttons">
                                <a href="{{ route('finanzas.utilidades.create', $utilidad->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>

                                <form action="{{ route('finanzas.eliminar', $utilidad->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta utilidad?')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    {{-- Deudas Tab Content --}}
    <div class="tab-pane fade {{ request()->is('finanzas/deudas') ? 'show active' : '' }}"
        id="deudas" role="tabpanel" aria-labelledby="deudas-tab">
        
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold text-success m-0">Resumen de Deudas</h4>
            <a href="{{ route('finanzas.deudas.create') }}" class="btn btn-success">
                <i class="fas fa-plus-circle me-2"></i> Agregar Deuda
            </a>
        </div>

        {{-- Tarjetas resumen --}}
        <div class="row">
            <div class="col-md-4">
                <div class="card-summary total-debt">
                    <i class="fas fa-hand-holding-usd icon"></i>
                    <div>
                        <div class="title">Total Deuda</div>
                        <div class="value">${{ number_format($totalDeuda, 2) }}</div>
                        <div class="description">Saldo pendiente</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-summary pending-payments">
                    <i class="fas fa-hourglass-half icon"></i>
                    <div>
                        <div class="title">Pagos Atrasados</div>
                    <div class="value">
                    ${{ number_format(collect($deudas)->where('estado', 'Atrasado')->sum('monto_original'), 2) }}
                    </div>
                        <div class="description">Hasta hoy</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-summary paid-payments">
                    <i class="fas fa-check-circle icon"></i>
                    <div>
                        <div class="title">Último Pago</div>
                        <div class="value">${{ number_format($ultimoPago, 2) }}</div>
            <div class="description">
                @if ($fechaUltimoPago && strtotime($fechaUltimoPago) !== false)
                    {{ \Carbon\Carbon::parse($fechaUltimoPago)->format('d M Y') }}
                @else
                    No disponible
                @endif
            </div>


                    </div>
                </div>
            </div>

        </div>

        {{-- Tabla de deudas en formato unificado --}}
        <h4 class="mt-4">Listado de Deudas</h4>
        <div class="details-section">
            <div class="details-item fw-bold text-muted" style="border-bottom: 2px solid #ddd;">
                <div class="icon" style="width: 5%;"></div>
                <div class="info" style="width: 15%;">Fecha</div>
                <div class="info" style="width: 20%;">Proveedor</div>
                <div class="info" style="width: 20%;">Concepto</div>
                <div class="info" style="width: 10%;">Monto</div>
                <div class="info" style="width: 15%;">F. Vencimiento</div>
                <div class="info" style="width: 10%;">Estado</div>
                <div class="col-action-icon-debt" style="width: 5%;">Acciones</div>
            </div>

            @forelse ($deudas as $deuda)
                <div class="details-item debt-item">
                    <i class="fas fa-file-invoice-dollar icon 
                        @if($deuda->estado == 'Atrasado') text-warning 
                        @elseif($deuda->estado == 'Pagado') text-success 
                        @else text-danger @endif" style="width: 5%;"></i>

                    <div class="info" style="width: 15%;">{{ \Carbon\Carbon::parse($deuda->fecha)->format('Y-m-d') }}</div>
                    <div class="info" style="width: 20%;">{{ $deuda->proveedor ?? '---' }}</div>
                    <div class="info" style="width: 20%;">{{ $deuda->concepto ?? '---' }}</div>
                    <div class="info" style="width: 10%;">${{ number_format($deuda->monto_original, 2) }}</div>
                    <div class="info" style="width: 15%;">{{ \Carbon\Carbon::parse($deuda->fecha_vencimiento)->format('Y-m-d') }}</div>
                    <div class="info" style="width: 10%;">
                        <span class="badge 
                            @if($deuda->estado == 'Pendiente') bg-danger 
                            @elseif($deuda->estado == 'Pagado') bg-success 
                            @else bg-warning text-dark @endif">
                            {{ ucfirst($deuda->estado) }}
                        </span>
                    </div>
                    <div class="col-action-icon-debt" style="width: 5%;">
                        <td class="action-buttons">
                            <a href="{{ route('finanzas.deudas.create', $deuda->id) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-pencil-alt"></i>
                            </a>

                            <form action="{{ route('finanzas.eliminar', $deuda->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta deuda?')">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </div>
                </div>
            @empty
                <div class="details-item text-center">
                    <div class="info w-100">No hay deudas registradas.</div>
                </div>
            @endforelse
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