<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Módulo de Almacén VEGGREEN</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
   @section('styles')
<link rel="stylesheet" href="{{ asset('css/almacen.css') }}">
@endsection
</head>
<body>

   <div class="container-fluid">
    <h3 class="fw-bold text-success mb-4"></h3>

    <ul class="nav nav-tabs mb-4 almacen-tabs" id="almacenTabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link {{ request()->is('almacen/interno/compras') ? 'active' : '' }}" id="compraInsumos-tab" data-bs-toggle="tab" href="#compraInsumos" role="tab" aria-controls="compraInsumos" aria-selected="{{ request()->is('almacen/interno/compras') ? 'true' : 'false' }}">
                Compras de Insumos Internos
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('almacen/interno/tarjeta') ? 'active' : '' }}" id="tarjetaAlmacenInterno-tab" data-bs-toggle="tab" href="#tarjetaAlmacenInterno" role="tab" aria-controls="tarjetaAlmacenInterno" aria-selected="{{ request()->is('almacen/interno/tarjeta') ? 'true' : 'false' }}">
                Tarjeta de Almacén Interno
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('almacen/interno/proveedores') ? 'active' : '' }}" id="relacionProveedores-tab" data-bs-toggle="tab" href="#relacionProveedores" role="tab" aria-controls="relacionProveedores" aria-selected="{{ request()->is('almacen/interno/proveedores') ? 'true' : 'false' }}">
                Relación con Proveedores (Interno)
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('almacen/venta/compras') ? 'active' : '' }}" id="compraProductosVenta-tab" data-bs-toggle="tab" href="#compraProductosVenta" role="tab" aria-controls="compraProductosVenta" aria-selected="{{ request()->is('almacen/venta/compras') ? 'true' : 'false' }}">
                Compras de Productos para Venta
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('almacen/venta/tarjeta') ? 'active' : '' }}" id="tarjetaAlmacenVenta-tab" data-bs-toggle="tab" href="#tarjetaAlmacenVenta" role="tab" aria-controls="tarjetaAlmacenVenta" aria-selected="{{ request()->is('almacen/venta/tarjeta') ? 'true' : 'false' }}">
                Tarjeta de Almacén de Venta
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('almacen/venta/ventas') ? 'active' : '' }}" id="ventas-tab" data-bs-toggle="tab" href="#ventas" role="tab" aria-controls="ventas" aria-selected="{{ request()->is('almacen/venta/ventas') ? 'true' : 'false' }}">
                Ventas
            </a>
        </li>
    </ul>

    <div class="tab-content" id="almacenTabsContent">
        <div class="tab-pane fade {{ request()->is('almacen/interno/compras') ? 'show active' : '' }}" id="compraInsumos" role="tabpanel" aria-labelledby="compraInsumos-tab">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Compras de Insumos Internos</h5>
                    <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#modalRegistrarCompraInsumo">
                        <i class="fas fa-plus-circle"></i> Registrar Nueva Compra
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped" id="tablaComprasInsumos">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Nota</th>
                                    <th>Descripción</th>
                                    <th>Proveedor</th>
                                    <th>Total</th>
                                    <th>Condición</th>
                                    <th>Facturado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2025-06-25</td>
                                    <td>NTA-001</td>
                                    <td>Compra de 1000 pz Playos</td>
                                    <td>Proveedor A</td>
                                    <td>$5,000.00</td>
                                    <td>Crédito</td>
                                    <td>No</td>
                                    <td>
                                        <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#modalVerDetalleCompraInsumo"><i class="fas fa-eye"></i></button>
                                        <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2025-06-20</td>
                                    <td>NTA-002</td>
                                    <td>500 Bolsas y 200 Esquineros</td>
                                    <td>Proveedor B</td>
                                    <td>$2,500.00</td>
                                    <td>Contado</td>
                                    <td>Sí</td>
                                    <td>
                                        <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#modalVerDetalleCompraInsumo"><i class="fas fa-eye"></i></button>
                                        <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                                    </td>
                                </tr>
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane fade {{ request()->is('almacen/interno/tarjeta') ? 'show active' : '' }}" id="tarjetaAlmacenInterno" role="tabpanel" aria-labelledby="tarjetaAlmacenInterno-tab">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">Tarjeta de Almacén Interno</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="selectInsumoTarjeta" class="form-label">Seleccionar Insumo:</label>
                            <select class="form-select" id="selectInsumoTarjeta">
                                <option value="">-- Seleccione un insumo --</option>
                                <option value="playos">Playos</option>
                                <option value="tarimas">Tarimas</option>
                                <option value="bolsas">Bolsas</option>
                                <option value="esquineros">Esquineros</option>
                                <option value="grapa">Grapa</option>
                                <option value="termografo">Termógrafo</option>
                                <option value="candado">Candado</option>
                                </select>
                        </div>
                        <div class="col-md-6 text-end">
                            <button class="btn btn-primary mt-4" data-bs-toggle="modal" data-bs-target="#modalRegistrarConsumoViaje">
                                <i class="fas fa-truck"></i> Registrar Consumo por Viaje
                            </button>
                        </div>
                    </div>

                    <div id="detalleTarjetaInsumo" style="display: none;">
                        <h6 class="fw-bold mt-4">Detalles para: <span id="nombreInsumoTarjeta"></span></h6>
                        <p><strong>Existencias al inicio del mes:</strong> <span id="existenciasInicioMes">0</span></p>
                        <p><strong>Existencia Actual:</strong> <span id="existenciaActualInsumo">0</span></p>

                        <h6 class="mt-4">Compras Mensuales</h6>
                        <div class="table-responsive mb-4">
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Tipo Movimiento</th>
                                        <th>Cantidad</th>
                                        <th>Referencia</th>
                                    </tr>
                                </thead>
                                <tbody id="tablaComprasMensualesInsumo">
                                    <tr><td>2025-06-25</td><td>Entrada por Compra</td><td>1000</td><td>NTA-001</td></tr>
                                    <tr><td>2025-06-10</td><td>Entrada por Compra</td><td>500</td><td>NTA-005</td></tr>
                                </tbody>
                            </table>
                        </div>

                        <h6 class="mt-4">Control de Insumos por Viaje</h6>
                        <div class="table-responsive mb-4">
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr>
                                        <th>Fecha Viaje</th>
                                        <th>Número Viaje</th>
                                        <th>Cantidad Utilizada</th>
                                        <th>Observaciones</th>
                                    </tr>
                                </thead>
                                <tbody id="tablaControlInsumosViaje">
                                    <tr><td>2025-06-26</td><td>VJE-101</td><td>50</td><td>Carga de producto X</td></tr>
                                    <tr><td>2025-06-27</td><td>VJE-102</td><td>30</td><td>Carga de producto Y</td></tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="alert alert-info">
                            <label for="insumoFisico" class="form-label"><strong>Total de Insumos Físicos:</strong></label>
                            <input type="number" class="form-control d-inline-block w-auto me-2" id="insumoFisico" placeholder="Cantidad física">
                            <button class="btn btn-outline-secondary" id="btnCompararInsumos">Comparar</button>
                            <span class="ms-3" id="diferenciaInsumos"></span>
                            <button class="btn btn-danger ms-2" id="btnRealizarAjuste" style="display: none;"><i class="fas fa-exclamation-triangle"></i> Realizar Ajuste</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane fade {{ request()->is('almacen/interno/proveedores') ? 'show active' : '' }}" id="relacionProveedores" role="tabpanel" aria-labelledby="relacionProveedores-tab">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Relación con Proveedores de Insumos Internos</h5>
                    <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#modalRegistrarProveedor">
                        <i class="fas fa-user-plus"></i> Registrar Nuevo Proveedor
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped" id="tablaProveedoresInternos">
                            <thead>
                                <tr>
                                    <th>Nombre/Razón Social</th>
                                    <th>RFC</th>
                                    <th>Teléfono</th>
                                    <th>Email</th>
                                    <th>Total Crédito Acumulado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Proveedor A SA de CV</td>
                                    <td>PROVA123456ABC</td>
                                    <td>5512345678</td>
                                    <td>contacto@proveedora.com</td>
                                    <td class="text-danger fw-bold">$10,000.00</td>
                                    <td>
                                        <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#modalVerComprasProveedor"><i class="fas fa-list-alt"></i> Ver Compras</button>
                                        <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#modalRegistrarPagoProveedor"><i class="fas fa-money-bill-wave"></i> Registrar Pago</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Proveedor B</td>
                                    <td>PROVB654321DEF</td>
                                    <td>5587654321</td>
                                    <td>info@proveedorb.com</td>
                                    <td class="text-success fw-bold">$0.00</td>
                                    <td>
                                        <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#modalVerComprasProveedor"><i class="fas fa-list-alt"></i> Ver Compras</button>
                                        <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#modalRegistrarPagoProveedor"><i class="fas fa-money-bill-wave"></i> Registrar Pago</button>
                                    </td>
                                </tr>
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane fade {{ request()->is('almacen/venta/compras') ? 'show active' : '' }}" id="compraProductosVenta" role="tabpanel" aria-labelledby="compraProductosVenta-tab">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Compras de Productos para Venta</h5>
                    <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#modalRegistrarCompraProductoVenta">
                        <i class="fas fa-plus-circle"></i> Registrar Nueva Compra
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped" id="tablaComprasProductosVenta">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Nota</th>
                                    <th>Descripción</th>
                                    <th>Proveedor</th>
                                    <th>Total</th>
                                    <th>Condición</th>
                                    <th>Facturado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2025-06-28</td>
                                    <td>PRD-001</td>
                                    <td>Compra de 500 unidades Producto A</td>
                                    <td>Mayorista X</td>
                                    <td>$15,000.00</td>
                                    <td>Crédito</td>
                                    <td>No</td>
                                    <td>
                                        <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#modalVerDetalleCompraProductoVenta"><i class="fas fa-eye"></i></button>
                                        <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                                    </td>
                                </tr>
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane fade {{ request()->is('almacen/venta/tarjeta') ? 'show active' : '' }}" id="tarjetaAlmacenVenta" role="tabpanel" aria-labelledby="tarjetaAlmacenVenta-tab">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Tarjeta de Almacén de Venta</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="selectProductoTarjeta" class="form-label">Seleccionar Producto:</label>
                            <select class="form-select" id="selectProductoTarjeta">
                                <option value="">-- Seleccione un producto --</option>
                                <option value="productoA">Producto A (Electrónica)</option>
                                <option value="productoB">Producto B (Hogar)</option>
                                </select>
                        </div>
                    </div>

                    <div id="detalleTarjetaProductoVenta" style="display: none;">
                        <h6 class="fw-bold mt-4">Detalles para: <span id="nombreProductoTarjeta"></span></h6>
                        <p><strong>Precio de Venta Sugerido:</strong> <span id="precioVentaProducto"></span></p>
                        <p><strong>Existencia Actual:</strong> <span id="existenciaActualProducto">0</span></p>

                        <h6 class="mt-4">Entradas (Compras)</h6>
                        <div class="table-responsive mb-4">
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Tipo Movimiento</th>
                                        <th>Cantidad</th>
                                        <th>Referencia</th>
                                    </tr>
                                </thead>
                                <tbody id="tablaEntradasProductoVenta">
                                    <tr><td>2025-06-28</td><td>Entrada por Compra</td><td>500</td><td>PRD-001</td></tr>
                                </tbody>
                            </table>
                        </div>

                        <h6 class="mt-4">Salidas (Ventas)</h6>
                        <div class="table-responsive mb-4">
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Tipo Movimiento</th>
                                        <th>Cantidad</th>
                                        <th>Referencia</th>
                                    </tr>
                                </thead>
                                <tbody id="tablaSalidasProductoVenta">
                                    <tr><td>2025-06-29</td><td>Salida por Venta</td><td>10</td><td>VENTA-001</td></tr>
                                    <tr><td>2025-06-29</td><td>Salida por Venta</td><td>5</td><td>VENTA-002</td></tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="alert alert-info">
                            <label for="productoFisico" class="form-label"><strong>Total de Productos Físicos:</strong></label>
                            <input type="number" class="form-control d-inline-block w-auto me-2" id="productoFisico" placeholder="Cantidad física">
                            <button class="btn btn-outline-secondary" id="btnCompararProductos">Comparar</button>
                            <span class="ms-3" id="diferenciaProductos"></span>
                            <button class="btn btn-danger ms-2" id="btnRealizarAjusteProducto" style="display: none;"><i class="fas fa-exclamation-triangle"></i> Realizar Ajuste</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane fade {{ request()->is('almacen/venta/ventas') ? 'show active' : '' }}" id="ventas" role="tabpanel" aria-labelledby="ventas-tab">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Ventas Registradas</h5>
                    <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#modalRegistrarNuevaVenta">
                        <i class="fas fa-cart-plus"></i> Registrar Nueva Venta
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped" id="tablaVentas">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Cliente</th>
                                    <th>Descripción (Productos)</th>
                                    <th>Total</th>
                                    <th>Condición Pago</th>
                                    <th>Estado Entrega</th>
                                    <th>Estado Pago</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2025-06-29</td>
                                    <td>Cliente A S.A.</td>
                                    <td>10x Producto A, 2x Producto C</td>
                                    <td>$2,500.00</td>
                                    <td>Crédito</td>
                                    <td>Entregado</td>
                                    <td>Pendiente</td>
                                    <td>
                                        <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#modalVerDetalleVenta"><i class="fas fa-eye"></i></button>
                                        <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-sm btn-success"><i class="fas fa-money-bill-wave"></i> Registrar Pago</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2025-06-29</td>
                                    <td>Cliente B</td>
                                    <td>5x Producto B</td>
                                    <td>$1,200.00</td>
                                    <td>Contado</td>
                                    <td>Entregado</td>
                                    <td>Recibido</td>
                                    <td>
                                        <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#modalVerDetalleVenta"><i class="fas fa-eye"></i></button>
                                        <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                                    </td>
                                </tr>
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modalRegistrarCompraInsumo" tabindex="-1" aria-labelledby="modalRegistrarCompraInsumoLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="modalRegistrarCompraInsumoLabel">Registrar Nueva Compra de Insumos</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="compraInsumoFecha" class="form-label">Fecha:</label>
                        <input type="date" class="form-control" id="compraInsumoFecha" required>
                    </div>
                    <div class="mb-3">
                        <label for="compraInsumoNota" class="form-label">Nota:</label>
                        <input type="text" class="form-control" id="compraInsumoNota" placeholder="Número de nota o referencia" required>
                    </div>
                    <div class="mb-3">
                        <label for="compraInsumoProveedor" class="form-label">Proveedor:</label>
                        <select class="form-select" id="compraInsumoProveedor" required>
                            <option value="">Seleccionar Proveedor</option>
                            <option value="1">Proveedor A</option>
                            <option value="2">Proveedor B</option>
                            </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tipo de Pago:</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tipoPagoInsumo" id="pagoContadoInsumo" value="Contado" checked>
                            <label class="form-check-label" for="pagoContadoInsumo">Contado</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tipoPagoInsumo" id="pagoCreditoInsumo" value="Crédito">
                            <label class="form-check-label" for="pagoCreditoInsumo">Crédito</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tipoPagoInsumo" id="pagoLiquidacionInsumo" value="Liquidacion">
                            <label class="form-check-label" for="pagoLiquidacionInsumo">Liquidación</label>
                        </div>
                    </div>

                    <h6 class="mt-4">Detalle de Insumos:</h6>
                    <div class="table-responsive mb-3">
                        <table class="table table-bordered" id="tablaDetalleInsumosCompra">
                            <thead>
                                <tr>
                                    <th>Insumo</th>
                                    <th>Cantidad</th>
                                    <th>Precio Unitario</th>
                                    <th>Total</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <select class="form-select insumo-select" required>
                                            <option value="">Seleccionar Insumo</option>
                                            <option value="playos">Playos</option>
                                            <option value="tarimas">Tarimas</option>
                                            </select>
                                    </td>
                                    <td><input type="number" class="form-control insumo-cantidad" min="0.01" step="0.01" value="1" required></td>
                                    <td><input type="number" class="form-control insumo-precio-unitario" min="0.01" step="0.01" value="0.00" required></td>
                                    <td><input type="text" class="form-control insumo-total" value="0.00" readonly></td>
                                    <td><button type="button" class="btn btn-danger btn-sm remove-row"><i class="fas fa-trash"></i></button></td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5" class="text-end">
                                        <button type="button" class="btn btn-sm btn-outline-success" id="addInsumoRow"><i class="fas fa-plus"></i> Añadir Insumo</button>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="mb-3 text-end">
                        <label for="totalCompraInsumos" class="form-label fw-bold">Total de la Compra:</label>
                        <input type="text" class="form-control d-inline-block w-auto" id="totalCompraInsumos" value="0.00" readonly>
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="facturarAhoraInsumo">
                        <label class="form-check-label" for="facturarAhoraInsumo">
                            ¿Facturar ahora?
                        </label>
                    </div>
                    <div class="mb-3" id="numeroFacturaInsumoDiv" style="display: none;">
                        <label for="numeroFacturaInsumo" class="form-label">Número de Factura:</label>
                        <input type="text" class="form-control" id="numeroFacturaInsumo" placeholder="Ingrese el número de factura">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success">Guardar Compra</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalVerDetalleCompraInsumo" tabindex="-1" aria-labelledby="modalVerDetalleCompraInsumoLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="modalVerDetalleCompraInsumoLabel">Detalles de Compra de Insumo</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Fecha:</strong> <span id="detalleCompraFecha"></span></p>
                <p><strong>Nota:</strong> <span id="detalleCompraNota"></span></p>
                <p><strong>Proveedor:</strong> <span id="detalleCompraProveedor"></span></p>
                <p><strong>Descripción General:</strong> <span id="detalleCompraDescripcion"></span></p>
                <p><strong>Tipo de Pago:</strong> <span id="detalleCompraTipoPago"></span></p>
                <p><strong>Total de la Compra:</strong> <span id="detalleCompraTotal"></span></p>
                <p><strong>Facturado:</strong> <span id="detalleCompraFacturado"></span></p>
                <p><strong>Fecha Facturación:</strong> <span id="detalleCompraFechaFactura"></span></p>
                <p><strong>Crédito Liquidado:</strong> <span id="detalleCompraCreditoLiquidado"></span></p>

                <h6 class="mt-4">Insumos Comprados:</h6>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Insumo</th>
                                <th>Cantidad</th>
                                <th>Precio Unitario</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody id="tablaDetalleCompraInsumosModal">
                            <tr><td>Playos</td><td>1000</td><td>$5.00</td><td>$5,000.00</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-warning" id="btnEditarCompraInsumo">Editar Compra</button>
                <button type="button" class="btn btn-primary" id="btnMarcarFacturadoInsumo">Marcar como Facturado</button>
                <button type="button" class="btn btn-success" id="btnLiquidarCreditoInsumo">Liquidar Crédito</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalRegistrarConsumoViaje" tabindex="-1" aria-labelledby="modalRegistrarConsumoViajeLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modalRegistrarConsumoViajeLabel">Registrar Consumo de Insumo por Viaje</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="consumoViajeFecha" class="form-label">Fecha del Viaje:</label>
                        <input type="date" class="form-control" id="consumoViajeFecha" required>
                    </div>
                    <div class="mb-3">
                        <label for="consumoViajeNumero" class="form-label">Número de Viaje:</label>
                        <input type="text" class="form-control" id="consumoViajeNumero" placeholder="Ingrese el número de viaje" required>
                    </div>

                    <h6 class="mt-4">Insumos Utilizados:</h6>
                    <div class="table-responsive mb-3">
                        <table class="table table-bordered" id="tablaDetalleConsumoViaje">
                            <thead>
                                <tr>
                                    <th>Insumo</th>
                                    <th>Cantidad Utilizada</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <select class="form-select insumo-select" required>
                                            <option value="">Seleccionar Insumo</option>
                                            <option value="playos">Playos</option>
                                            <option value="grapa">Grapa</option>
                                            </select>
                                    </td>
                                    <td><input type="number" class="form-control insumo-cantidad" min="0.01" step="0.01" value="1" required></td>
                                    <td><button type="button" class="btn btn-danger btn-sm remove-row"><i class="fas fa-trash"></i></button></td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3" class="text-end">
                                        <button type="button" class="btn btn-sm btn-outline-success" id="addConsumoInsumoRow"><i class="fas fa-plus"></i> Añadir Insumo</button>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="mb-3">
                        <label for="consumoViajeObservaciones" class="form-label">Observaciones:</label>
                        <textarea class="form-control" id="consumoViajeObservaciones" rows="3"></textarea>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Registrar Consumo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalRegistrarProveedor" tabindex="-1" aria-labelledby="modalRegistrarProveedorLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="modalRegistrarProveedorLabel">Registrar Nuevo Proveedor (Insumos Internos)</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="proveedorNombre" class="form-label">Nombre/Razón Social:</label>
                        <input type="text" class="form-control" id="proveedorNombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="proveedorRfc" class="form-label">RFC:</label>
                        <input type="text" class="form-control" id="proveedorRfc">
                    </div>
                    <div class="mb-3">
                        <label for="proveedorTelefono" class="form-label">Teléfono:</label>
                        <input type="tel" class="form-control" id="proveedorTelefono">
                    </div>
                    <div class="mb-3">
                        <label for="proveedorEmail" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="proveedorEmail">
                    </div>
                    <div class="mb-3">
                        <label for="proveedorDireccion" class="form-label">Dirección:</label>
                        <textarea class="form-control" id="proveedorDireccion" rows="3"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success">Guardar Proveedor</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalVerComprasProveedor" tabindex="-1" aria-labelledby="modalVerComprasProveedorLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="modalVerComprasProveedorLabel">Compras de Insumos por Proveedor: <span id="nombreProveedorModal"></span></h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Total Crédito Pendiente:</strong> <span class="fw-bold text-danger" id="totalCreditoProveedorModal"></span></p>
                <div class="table-responsive">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Nota</th>
                                <th>Descripción</th>
                                <th>Total</th>
                                <th>Tipo Pago</th>
                                <th>Facturado</th>
                                <th>Crédito Liquidado</th>
                            </tr>
                        </thead>
                        <tbody id="tablaComprasProveedorModal">
                            <tr><td>2025-06-25</td><td>NTA-001</td><td>1000 Playos</td><td>$5,000.00</td><td>Crédito</td><td>No</td><td>No</td></tr>
                            <tr><td>2025-05-15</td><td>NTA-003</td><td>200 Tarimas</td><td>$8,000.00</td><td>Crédito</td><td>Sí</td><td>No</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalRegistrarPagoProveedor" tabindex="-1" aria-labelledby="modalRegistrarPagoProveedorLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="modalRegistrarPagoProveedorLabel">Registrar Pago a Proveedor: <span id="pagoProveedorNombre"></span></h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <p><strong>Crédito Pendiente Actual:</strong> <span class="fw-bold text-danger" id="creditoActualPagoProveedor"></span></p>
                    <div class="mb-3">
                        <label for="pagoMonto" class="form-label">Monto del Pago:</label>
                        <input type="number" class="form-control" id="pagoMonto" min="0.01" step="0.01" required>
                    </div>
                    <div class="mb-3">
                        <label for="pagoFecha" class="form-label">Fecha del Pago:</label>
                        <input type="date" class="form-control" id="pagoFecha" required>
                    </div>
                    <div class="mb-3">
                        <label for="pagoMetodo" class="form-label">Método de Pago:</label>
                        <select class="form-select" id="pagoMetodo" required>
                            <option value="">Seleccione</option>
                            <option value="transferencia">Transferencia</option>
                            <option value="efectivo">Efectivo</option>
                            <option value="cheque">Cheque</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success">Registrar Pago</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modalRegistrarCompraProductoVenta" tabindex="-1" aria-labelledby="modalRegistrarCompraProductoVentaLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modalRegistrarCompraProductoVentaLabel">Registrar Nueva Compra de Productos para Venta</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="compraProductoFecha" class="form-label">Fecha:</label>
                        <input type="date" class="form-control" id="compraProductoFecha" required>
                    </div>
                    <div class="mb-3">
                        <label for="compraProductoNota" class="form-label">Nota:</label>
                        <input type="text" class="form-control" id="compraProductoNota" placeholder="Número de nota o referencia" required>
                    </div>
                    <div class="mb-3">
                        <label for="compraProductoProveedor" class="form-label">Proveedor:</label>
                        <select class="form-select" id="compraProductoProveedor" required>
                            <option value="">Seleccionar Proveedor</option>
                            <option value="1">Mayorista X</option>
                            <option value="2">Distribuidor Y</option>
                            </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tipo de Pago:</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tipoPagoProducto" id="pagoContadoProducto" value="Contado" checked>
                            <label class="form-check-label" for="pagoContadoProducto">Contado</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tipoPagoProducto" id="pagoCreditoProducto" value="Crédito">
                            <label class="form-check-label" for="pagoCreditoProducto">Crédito</label>
                        </div>
                    </div>

                    <h6 class="mt-4">Detalle de Productos:</h6>
                    <div class="table-responsive mb-3">
                        <table class="table table-bordered" id="tablaDetalleProductosCompra">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio Unitario Compra</th>
                                    <th>Total</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <select class="form-select producto-select" required>
                                            <option value="">Seleccionar Producto</option>
                                            <option value="productoA">Producto A (Electrónica)</option>
                                            <option value="productoB">Producto B (Hogar)</option>
                                            </select>
                                    </td>
                                    <td><input type="number" class="form-control producto-cantidad" min="1" value="1" required></td>
                                    <td><input type="number" class="form-control producto-precio-unitario" min="0.01" step="0.01" value="0.00" required></td>
                                    <td><input type="text" class="form-control producto-total" value="0.00" readonly></td>
                                    <td><button type="button" class="btn btn-danger btn-sm remove-row"><i class="fas fa-trash"></i></button></td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5" class="text-end">
                                        <button type="button" class="btn btn-sm btn-outline-primary" id="addProductoCompraRow"><i class="fas fa-plus"></i> Añadir Producto</button>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="mb-3 text-end">
                        <label for="totalCompraProductos" class="form-label fw-bold">Total de la Compra:</label>
                        <input type="text" class="form-control d-inline-block w-auto" id="totalCompraProductos" value="0.00" readonly>
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="facturarAhoraProducto">
                        <label class="form-check-label" for="facturarAhoraProducto">
                            ¿Facturar ahora?
                        </label>
                    </div>
                    <div class="mb-3" id="numeroFacturaProductoDiv" style="display: none;">
                        <label for="numeroFacturaProducto" class="form-label">Número de Factura:</label>
                        <input type="text" class="form-control" id="numeroFacturaProducto" placeholder="Ingrese el número de factura">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar Compra</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalVerDetalleCompraProductoVenta" tabindex="-1" aria-labelledby="modalVerDetalleCompraProductoVentaLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="modalVerDetalleCompraProductoVentaLabel">Detalles de Compra de Productos para Venta</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Fecha:</strong> <span id="detalleCompraProductoFecha"></span></p>
                <p><strong>Nota:</strong> <span id="detalleCompraProductoNota"></span></p>
                <p><strong>Proveedor:</strong> <span id="detalleCompraProductoProveedor"></span></p>
                <p><strong>Descripción General:</strong> <span id="detalleCompraProductoDescripcion"></span></p>
                <p><strong>Tipo de Pago:</strong> <span id="detalleCompraProductoTipoPago"></span></p>
                <p><strong>Total de la Compra:</strong> <span id="detalleCompraProductoTotal"></span></p>
                <p><strong>Facturado:</strong> <span id="detalleCompraProductoFacturado"></span></p>
                <p><strong>Fecha Facturación:</strong> <span id="detalleCompraProductoFechaFactura"></span></p>
                <p><strong>Crédito Liquidado:</strong> <span id="detalleCompraProductoCreditoLiquidado"></span></p>

                <h6 class="mt-4">Productos Comprados:</h6>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio Unitario Compra</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody id="tablaDetalleCompraProductosVentaModal">
                            <tr><td>Producto A</td><td>500</td><td>$30.00</td><td>$15,000.00</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-warning" id="btnEditarCompraProductoVenta">Editar Compra</button>
                <button type="button" class="btn btn-primary" id="btnMarcarFacturadoProductoVenta">Marcar como Facturado</button>
                <button type="button" class="btn btn-success" id="btnLiquidarCreditoProductoVenta">Liquidar Crédito</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalRegistrarNuevaVenta" tabindex="-1" aria-labelledby="modalRegistrarNuevaVentaLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modalRegistrarNuevaVentaLabel">Registrar Nueva Venta</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="ventaFecha" class="form-label">Fecha:</label>
                        <input type="date" class="form-control" id="ventaFecha" required>
                    </div>
                    <div class="mb-3">
                        <label for="ventaCliente" class="form-label">Cliente:</label>
                        <select class="form-select" id="ventaCliente" required>
                            <option value="">Seleccionar Cliente</option>
                            <option value="1">Cliente A S.A.</option>
                            <option value="2">Cliente B</option>
                            </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Condición de Pago:</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="condicionPagoVenta" id="pagoContadoVenta" value="Contado" checked>
                            <label class="form-check-label" for="pagoContadoVenta">Contado</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="condicionPagoVenta" id="pagoCreditoVenta" value="Crédito">
                            <label class="form-check-label" for="pagoCreditoVenta">Crédito</label>
                        </div>
                    </div>

                    <h6 class="mt-4">Productos Vendidos:</h6>
                    <div class="table-responsive mb-3">
                        <table class="table table-bordered" id="tablaDetalleVenta">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio Unitario Venta</th>
                                    <th>Total</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <select class="form-select producto-select" required>
                                            <option value="">Seleccionar Producto</option>
                                            <option value="productoA">Producto A (Electrónica)</option>
                                            <option value="productoB">Producto B (Hogar)</option>
                                            </select>
                                    </td>
                                    <td><input type="number" class="form-control producto-cantidad" min="1" value="1" required></td>
                                    <td><input type="number" class="form-control producto-precio-unitario-venta" min="0.01" step="0.01" value="0.00" required></td>
                                    <td><input type="text" class="form-control producto-total" value="0.00" readonly></td>
                                    <td><button type="button" class="btn btn-danger btn-sm remove-row"><i class="fas fa-trash"></i></button></td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5" class="text-end">
                                        <button type="button" class="btn btn-sm btn-outline-primary" id="addProductoVentaRow"><i class="fas fa-plus"></i> Añadir Producto</button>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="mb-3 text-end">
                        <label for="totalVenta" class="form-label fw-bold">Total de la Venta:</label>
                        <input type="text" class="form-control d-inline-block w-auto" id="totalVenta" value="0.00" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="estadoEntregaVenta" class="form-label">Estado de Entrega:</label>
                        <select class="form-select" id="estadoEntregaVenta">
                            <option value="Pendiente">Pendiente</option>
                            <option value="Entregado">Entregado</option>
                        </select>
                    </div>
                    <div class="mb-3" id="fechaEntregaVentaDiv" style="display: none;">
                        <label for="fechaEntregaVenta" class="form-label">Fecha de Entrega:</label>
                        <input type="date" class="form-control" id="fechaEntregaVenta">
                    </div>

                    <div class="mb-3">
                        <label for="estadoPagoVenta" class="form-label">Estado de Pago:</label>
                        <select class="form-select" id="estadoPagoVenta">
                            <option value="Pendiente">Pendiente</option>
                            <option value="Recibido">Recibido</option>
                            <option value="Parcial">Parcial</option>
                        </select>
                    </div>
                    <div class="mb-3" id="fechaRecepcionPagoVentaDiv" style="display: none;">
                        <label for="fechaRecepcionPagoVenta" class="form-label">Fecha de Recepción de Pago:</label>
                        <input type="date" class="form-control" id="fechaRecepcionPagoVenta">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Registrar Venta</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalVerDetalleVenta" tabindex="-1" aria-labelledby="modalVerDetalleVentaLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="modalVerDetalleVentaLabel">Detalles de Venta</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Fecha:</strong> <span id="detalleVentaFecha"></span></p>
                <p><strong>Cliente:</strong> <span id="detalleVentaCliente"></span></p>
                <p><strong>Total de la Venta:</strong> <span id="detalleVentaTotal"></span></p>
                <p><strong>Condición de Pago:</strong> <span id="detalleVentaCondicionPago"></span></p>
                <p><strong>Estado de Entrega:</strong> <span id="detalleVentaEstadoEntrega"></span></p>
                <p><strong>Fecha de Entrega:</strong> <span id="detalleVentaFechaEntrega"></span></p>
                <p><strong>Estado de Pago:</strong> <span id="detalleVentaEstadoPago"></span></p>
                <p><strong>Fecha de Recepción de Pago:</strong> <span id="detalleVentaFechaRecepcionPago"></span></p>

                <h6 class="mt-4">Productos Vendidos:</h6>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio Unitario Venta</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody id="tablaDetalleVentaModal">
                            <tr><td>Producto A</td><td>10</td><td>$200.00</td><td>$2,000.00</td></tr>
                            <tr><td>Producto C</td><td>2</td><td>$250.00</td><td>$500.00</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-warning" id="btnEditarVenta">Editar Venta</button>
                <button type="button" class="btn btn-primary" id="btnMarcarEntregadoVenta">Marcar como Entregado</button>
                <button type="button" class="btn btn-success" id="btnRegistrarPagoVenta">Registrar Pago</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/your-font-awesome-kit-id.js" crossorigin="anonymous"></script> <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Inicializar pestañas de Bootstrap 5
        var triggerTabList = [].slice.call(document.querySelectorAll('#almacenTabs a'))
        triggerTabList.forEach(function (triggerEl) {
            var tabTrigger = new bootstrap.Tab(triggerEl)

            triggerEl.addEventListener('click', function (event) {
                event.preventDefault()
                tabTrigger.show()
            })
        });

        // Lógica para mostrar/ocultar el campo de Número de Factura
        document.getElementById('facturarAhoraInsumo').addEventListener('change', function() {
            var facturaDiv = document.getElementById('numeroFacturaInsumoDiv');
            if (this.checked) {
                facturaDiv.style.display = 'block';
                document.getElementById('numeroFacturaInsumo').setAttribute('required', 'required');
            } else {
                facturaDiv.style.display = 'none';
                document.getElementById('numeroFacturaInsumo').removeAttribute('required');
            }
        });

        document.getElementById('facturarAhoraProducto').addEventListener('change', function() {
            var facturaDiv = document.getElementById('numeroFacturaProductoDiv');
            if (this.checked) {
                facturaDiv.style.display = 'block';
                document.getElementById('numeroFacturaProducto').setAttribute('required', 'required');
            } else {
                facturaDiv.style.display = 'none';
                document.getElementById('numeroFacturaProducto').removeAttribute('required');
            }
        });

        // Lógica para mostrar/ocultar el campo de Fecha de Entrega en Ventas
        document.getElementById('estadoEntregaVenta').addEventListener('change', function() {
            var fechaEntregaDiv = document.getElementById('fechaEntregaVentaDiv');
            if (this.value === 'Entregado') {
                fechaEntregaDiv.style.display = 'block';
                document.getElementById('fechaEntregaVenta').setAttribute('required', 'required');
            } else {
                fechaEntregaDiv.style.display = 'none';
                document.getElementById('fechaEntregaVenta').removeAttribute('required');
            }
        });

        // Lógica para mostrar/ocultar el campo de Fecha de Recepción de Pago en Ventas
        document.getElementById('estadoPagoVenta').addEventListener('change', function() {
            var fechaPagoDiv = document.getElementById('fechaRecepcionPagoVentaDiv');
            if (this.value === 'Recibido') {
                fechaPagoDiv.style.display = 'block';
                document.getElementById('fechaRecepcionPagoVenta').setAttribute('required', 'required');
            } else {
                fechaPagoDiv.style.display = 'none';
                document.getElementById('fechaRecepcionPagoVenta').removeAttribute('required');
            }
        });

        // Lógica para añadir/eliminar filas dinámicas en modales de compra de insumos
        document.getElementById('addInsumoRow').addEventListener('click', function() {
            var tableBody = document.querySelector('#tablaDetalleInsumosCompra tbody');
            var newRow = `
                <tr>
                    <td>
                        <select class="form-select insumo-select" required>
                            <option value="">Seleccionar Insumo</option>
                            <option value="playos">Playos</option>
                            <option value="tarimas">Tarimas</option>
                            <option value="bolsas">Bolsas</option>
                            <option value="esquineros">Esquineros</option>
                            <option value="grapa">Grapa</option>
                            <option value="termografo">Termógrafo</option>
                            <option value="candado">Candado</option>
                        </select>
                    </td>
                    <td><input type="number" class="form-control insumo-cantidad" min="0.01" step="0.01" value="1" required></td>
                    <td><input type="number" class="form-control insumo-precio-unitario" min="0.01" step="0.01" value="0.00" required></td>
                    <td><input type="text" class="form-control insumo-total" value="0.00" readonly></td>
                    <td><button type="button" class="btn btn-danger btn-sm remove-row"><i class="fas fa-trash"></i></button></td>
                </tr>
            `;
            tableBody.insertAdjacentHTML('beforeend', newRow);
            addEventListenersToDynamicRows();
            calculateTotalCompraInsumos();
        });

        // Lógica para añadir/eliminar filas dinámicas en modales de consumo por viaje
        document.getElementById('addConsumoInsumoRow').addEventListener('click', function() {
            var tableBody = document.querySelector('#tablaDetalleConsumoViaje tbody');
            var newRow = `
                <tr>
                    <td>
                        <select class="form-select insumo-select" required>
                            <option value="">Seleccionar Insumo</option>
                            <option value="playos">Playos</option>
                            <option value="tarimas">Tarimas</option>
                            <option value="bolsas">Bolsas</option>
                            <option value="esquineros">Esquineros</option>
                            <option value="grapa">Grapa</option>
                            <option value="termografo">Termógrafo</option>
                            <option value="candado">Candado</option>
                        </select>
                    </td>
                    <td><input type="number" class="form-control insumo-cantidad" min="0.01" step="0.01" value="1" required></td>
                    <td><button type="button" class="btn btn-danger btn-sm remove-row"><i class="fas fa-trash"></i></button></td>
                </tr>
            `;
            tableBody.insertAdjacentHTML('beforeend', newRow);
            addEventListenersToDynamicRowsConsumo();
        });

        // Lógica para añadir/eliminar filas dinámicas en modales de compra de productos para venta
        document.getElementById('addProductoCompraRow').addEventListener('click', function() {
            var tableBody = document.querySelector('#tablaDetalleProductosCompra tbody');
            var newRow = `
                <tr>
                    <td>
                        <select class="form-select producto-select" required>
                            <option value="">Seleccionar Producto</option>
                            <option value="productoA">Producto A (Electrónica)</option>
                            <option value="productoB">Producto B (Hogar)</option>
                        </select>
                    </td>
                    <td><input type="number" class="form-control producto-cantidad" min="1" value="1" required></td>
                    <td><input type="number" class="form-control producto-precio-unitario" min="0.01" step="0.01" value="0.00" required></td>
                    <td><input type="text" class="form-control producto-total" value="0.00" readonly></td>
                    <td><button type="button" class="btn btn-danger btn-sm remove-row"><i class="fas fa-trash"></i></button></td>
                </tr>
            `;
            tableBody.insertAdjacentHTML('beforeend', newRow);
            addEventListenersToDynamicRowsProductosCompra();
            calculateTotalCompraProductos();
        });

        // Lógica para añadir/eliminar filas dinámicas en modales de venta
        document.getElementById('addProductoVentaRow').addEventListener('click', function() {
            var tableBody = document.querySelector('#tablaDetalleVenta tbody');
            var newRow = `
                <tr>
                    <td>
                        <select class="form-select producto-select" required>
                            <option value="">Seleccionar Producto</option>
                            <option value="productoA">Producto A (Electrónica)</option>
                            <option value="productoB">Producto B (Hogar)</option>
                        </select>
                    </td>
                    <td><input type="number" class="form-control producto-cantidad" min="1" value="1" required></td>
                    <td><input type="number" class="form-control producto-precio-unitario-venta" min="0.01" step="0.01" value="0.00" required></td>
                    <td><input type="text" class="form-control producto-total" value="0.00" readonly></td>
                    <td><button type="button" class="btn btn-danger btn-sm remove-row"><i class="fas fa-trash"></i></button></td>
                </tr>
            `;
            tableBody.insertAdjacentHTML('beforeend', newRow);
            addEventListenersToDynamicRowsVenta();
            calculateTotalVenta();
        });

        // Función para añadir event listeners a filas dinámicas de compra de insumos
        function addEventListenersToDynamicRows() {
            document.querySelectorAll('#tablaDetalleInsumosCompra .remove-row').forEach(button => {
                button.onclick = function() {
                    this.closest('tr').remove();
                    calculateTotalCompraInsumos();
                };
            });
            document.querySelectorAll('#tablaDetalleInsumosCompra .insumo-cantidad, #tablaDetalleInsumosCompra .insumo-precio-unitario').forEach(input => {
                input.oninput = function() {
                    var row = this.closest('tr');
                    var cantidad = parseFloat(row.querySelector('.insumo-cantidad').value) || 0;
                    var precioUnitario = parseFloat(row.querySelector('.insumo-precio-unitario').value) || 0;
                    row.querySelector('.insumo-total').value = (cantidad * precioUnitario).toFixed(2);
                    calculateTotalCompraInsumos();
                };
            });
        }

        // Función para añadir event listeners a filas dinámicas de consumo por viaje
        function addEventListenersToDynamicRowsConsumo() {
            document.querySelectorAll('#tablaDetalleConsumoViaje .remove-row').forEach(button => {
                button.onclick = function() {
                    this.closest('tr').remove();
                };
            });
        }

        // Función para añadir event listeners a filas dinámicas de compra de productos para venta
        function addEventListenersToDynamicRowsProductosCompra() {
            document.querySelectorAll('#tablaDetalleProductosCompra .remove-row').forEach(button => {
                button.onclick = function() {
                    this.closest('tr').remove();
                    calculateTotalCompraProductos();
                };
            });
            document.querySelectorAll('#tablaDetalleProductosCompra .producto-cantidad, #tablaDetalleProductosCompra .producto-precio-unitario').forEach(input => {
                input.oninput = function() {
                    var row = this.closest('tr');
                    var cantidad = parseFloat(row.querySelector('.producto-cantidad').value) || 0;
                    var precioUnitario = parseFloat(row.querySelector('.producto-precio-unitario').value) || 0;
                    row.querySelector('.producto-total').value = (cantidad * precioUnitario).toFixed(2);
                    calculateTotalCompraProductos();
                };
            });
        }

        // Función para añadir event listeners a filas dinámicas de venta
        function addEventListenersToDynamicRowsVenta() {
            document.querySelectorAll('#tablaDetalleVenta .remove-row').forEach(button => {
                button.onclick = function() {
                    this.closest('tr').remove();
                    calculateTotalVenta();
                };
            });
            document.querySelectorAll('#tablaDetalleVenta .producto-cantidad, #tablaDetalleVenta .producto-precio-unitario-venta').forEach(input => {
                input.oninput = function() {
                    var row = this.closest('tr');
                    var cantidad = parseFloat(row.querySelector('.producto-cantidad').value) || 0;
                    var precioUnitario = parseFloat(row.querySelector('.producto-precio-unitario-venta').value) || 0;
                    row.querySelector('.producto-total').value = (cantidad * precioUnitario).toFixed(2);
                    calculateTotalVenta();
                };
            });
        }

        // Funciones para calcular totales
        function calculateTotalCompraInsumos() {
            let total = 0;
            document.querySelectorAll('#tablaDetalleInsumosCompra .insumo-total').forEach(input => {
                total += parseFloat(input.value) || 0;
            });
            document.getElementById('totalCompraInsumos').value = total.toFixed(2);
        }

        function calculateTotalCompraProductos() {
            let total = 0;
            document.querySelectorAll('#tablaDetalleProductosCompra .producto-total').forEach(input => {
                total += parseFloat(input.value) || 0;
            });
            document.getElementById('totalCompraProductos').value = total.toFixed(2);
        }

        function calculateTotalVenta() {
            let total = 0;
            document.querySelectorAll('#tablaDetalleVenta .producto-total').forEach(input => {
                total += parseFloat(input.value) || 0;
            });
            document.getElementById('totalVenta').value = total.toFixed(2);
        }

        // Lógica para la Tarjeta de Almacén Interno - selección de insumo y comparación física
        document.getElementById('selectInsumoTarjeta').addEventListener('change', function() {
            const insumoSeleccionado = this.value;
            const detalleDiv = document.getElementById('detalleTarjetaInsumo');
            const nombreInsumo = document.getElementById('nombreInsumoTarjeta');
            const existenciasInicioMes = document.getElementById('existenciasInicioMes');
            const existenciaActual = document.getElementById('existenciaActualInsumo');
            const tablaComprasMensuales = document.getElementById('tablaComprasMensualesInsumo');
            const tablaControlInsumosViaje = document.getElementById('tablaControlInsumosViaje');

            if (insumoSeleccionado) {
                // Simulación de carga de datos (en un entorno real, harías una llamada AJAX)
                nombreInsumo.textContent = this.options[this.selectedIndex].text;
                existenciasInicioMes.textContent = '1500'; // Datos de ejemplo
                existenciaActual.textContent = '1300';    // Datos de ejemplo
                tablaComprasMensuales.innerHTML = `<tr><td>2025-06-25</td><td>Entrada por Compra</td><td>1000</td><td>NTA-001</td></tr>
                                                   <tr><td>2025-06-10</td><td>Entrada por Compra</td><td>500</td><td>NTA-005</td></tr>`;
                tablaControlInsumosViaje.innerHTML = `<tr><td>2025-06-26</td><td>VJE-101</td><td>50</td><td>Carga de producto X</td></tr>
                                                      <tr><td>2025-06-27</td><td>VJE-102</td><td>30</td><td>Carga de producto Y</td></tr>
                                                      <tr><td>2025-06-28</td><td>VJE-103</td><td>120</td><td>Carga de producto Z</td></tr>`;
                detalleDiv.style.display = 'block';
            } else {
                detalleDiv.style.display = 'none';
            }
        });

        document.getElementById('btnCompararInsumos').addEventListener('click', function() {
            const existenciaRegistrada = parseFloat(document.getElementById('existenciaActualInsumo').textContent) || 0;
            const insumoFisico = parseFloat(document.getElementById('insumoFisico').value) || 0;
            const diferenciaSpan = document.getElementById('diferenciaInsumos');
            const btnAjuste = document.getElementById('btnRealizarAjuste');

            const diferencia = insumoFisico - existenciaRegistrada;
            if (diferencia > 0) {
                diferenciaSpan.textContent = `Sobran: ${diferencia}`;
                diferenciaSpan.className = 'ms-3 text-success fw-bold';
                btnAjuste.style.display = 'block';
            } else if (diferencia < 0) {
                diferenciaSpan.textContent = `Faltan: ${Math.abs(diferencia)}`;
                diferenciaSpan.className = 'ms-3 text-danger fw-bold';
                btnAjuste.style.display = 'block';
            } else {
                diferenciaSpan.textContent = `Coinciden`;
                diferenciaSpan.className = 'ms-3 text-primary fw-bold';
                btnAjuste.style.display = 'none';
            }
        });

        // Lógica para la Tarjeta de Almacén de Venta - selección de producto y comparación física
        document.getElementById('selectProductoTarjeta').addEventListener('change', function() {
            const productoSeleccionado = this.value;
            const detalleDiv = document.getElementById('detalleTarjetaProductoVenta');
            const nombreProducto = document.getElementById('nombreProductoTarjeta');
            const precioVenta = document.getElementById('precioVentaProducto');
            const existenciaActual = document.getElementById('existenciaActualProducto');
            const tablaEntradas = document.getElementById('tablaEntradasProductoVenta');
            const tablaSalidas = document.getElementById('tablaSalidasProductoVenta');

            if (productoSeleccionado) {
                // Simulación de carga de datos (en un entorno real, harías una llamada AJAX)
                nombreProducto.textContent = this.options[this.selectedIndex].text;
                precioVenta.textContent = '$200.00'; // Datos de ejemplo
                existenciaActual.textContent = '485';    // Datos de ejemplo (500 comprados - 15 vendidos)
                tablaEntradas.innerHTML = `<tr><td>2025-06-28</td><td>Entrada por Compra</td><td>500</td><td>PRD-001</td></tr>`;
                tablaSalidas.innerHTML = `<tr><td>2025-06-29</td><td>Salida por Venta</td><td>10</td><td>VENTA-001</td></tr>
                                          <tr><td>2025-06-29</td><td>Salida por Venta</td><td>5</td><td>VENTA-002</td></tr>`;
                detalleDiv.style.display = 'block';
            } else {
                detalleDiv.style.display = 'none';
            }
        });

        document.getElementById('btnCompararProductos').addEventListener('click', function() {
            const existenciaRegistrada = parseFloat(document.getElementById('existenciaActualProducto').textContent) || 0;
            const productoFisico = parseFloat(document.getElementById('productoFisico').value) || 0;
            const diferenciaSpan = document.getElementById('diferenciaProductos');
            const btnAjuste = document.getElementById('btnRealizarAjusteProducto');

            const diferencia = productoFisico - existenciaRegistrada;
            if (diferencia > 0) {
                diferenciaSpan.textContent = `Sobran: ${diferencia}`;
                diferenciaSpan.className = 'ms-3 text-success fw-bold';
                btnAjuste.style.display = 'block';
            } else if (diferencia < 0) {
                diferenciaSpan.textContent = `Faltan: ${Math.abs(diferencia)}`;
                diferenciaSpan.className = 'ms-3 text-danger fw-bold';
                btnAjuste.style.display = 'block';
            } else {
                diferenciaSpan.textContent = `Coinciden`;
                diferenciaSpan.className = 'ms-3 text-primary fw-bold';
                btnAjuste.style.display = 'none';
            }
        });


        // Llamar a las funciones de inicialización para filas existentes (si hay)
        addEventListenersToDynamicRows();
        addEventListenersToDynamicRowsConsumo();
        addEventListenersToDynamicRowsProductosCompra();
        addEventListenersToDynamicRowsVenta();
        calculateTotalCompraInsumos();
        calculateTotalCompraProductos();
        calculateTotalVenta();

    });
</script>

</body>
</html>