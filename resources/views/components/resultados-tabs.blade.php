<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estado de Resultados</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/resultados.css') }}">
</head>
<body>
@props([
    'ventas',
    'costos',
    'gastos',
    'totalVentas',
    'totalCostos',
    'totalGastos',
    'utilidadBruta',
    'utilidadAntesImpuestos',
])
<div class="container-fluid mt-5">
    <div class="resultados-container">
        <h3 class="fw-bold text-success mb-4">Estado de Resultados</h3>

        <h4 class="mt-4">Resumen</h4>
        <div class="row">
            <div class="col-md-4">
                <div class="card-summary sales-summary">
                    <i class="fas fa-shopping-cart icon"></i>
                    <div>
                        <div class="title">Total Ventas</div>
                        <div class="value" id="totalVentas">${{ number_format($totalVentas, 2) }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-summary cost-summary">
                    <i class="fas fa-dollar-sign icon"></i>
                    <div>
                        <div class="title">Costos Producto</div>
                        <div class="value" id="costosProducto">${{ number_format($totalCostos, 2) }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-summary profit-summary">
                    <i class="fas fa-money-bill-alt icon"></i>
                    <div>
                        <div class="title">Utilidad Bruta</div>
                        <div class="value" id="utilidadBruta">${{ number_format($utilidadBruta, 2) }}</div>
                    </div>
                </div>
            </div>
        </div>

        <h4 class="mt-4">Detalle de Ventas
            <button class="btn-add-movement" data-toggle="modal" data-target="#addSaleModal">
                <i class="fas fa-plus-circle"></i> Agregar Venta
            </button>
        </h4>
        <div class="details-section">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Descripción</th>
                        <th class="text-right">Monto</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody id="salesTableBody">
                    @foreach ($ventas as $venta)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($venta->fecha)->format('Y-m-d') }}</td>
                        <td>{{ $venta->descripcion }}</td>
                        <td class="text-right">${{ number_format($venta->monto, 2) }}</td>
                        <td class="text-center">
                            <!-- Botón Editar -->
                            <button 
                                type="button" 
                                class="btn btn-sm btn-primary" 
                                data-toggle="modal" 
                                data-target="#editSaleModal{{ $venta->id }}"
                                title="Editar Venta"
                            >
                                <i class="fas fa-edit"></i>
                            </button>

                            <!-- Formulario Eliminar -->
                            <form 
                                action="{{ route('ventas.eliminar', $venta->id) }}" 
                                method="POST" 
                                style="display:inline-block;"
                                onsubmit="return confirm('¿Seguro que deseas eliminar esta venta?');"
                            >
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" title="Eliminar Venta">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>

                    <!-- Modal Editar Venta -->
                    <div class="modal fade" id="editSaleModal{{ $venta->id }}" tabindex="-1" aria-labelledby="editSaleModalLabel{{ $venta->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <form action="{{ route('ventas.actualizar', $venta->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editSaleModalLabel{{ $venta->id }}">Editar Venta</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="fecha{{ $venta->id }}">Fecha:</label>
                                            <input type="date" name="fecha" class="form-control" id="fecha{{ $venta->id }}" value="{{ $venta->fecha->format('Y-m-d') }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="descripcion{{ $venta->id }}">Descripción:</label>
                                            <input type="text" name="descripcion" class="form-control" id="descripcion{{ $venta->id }}" value="{{ $venta->descripcion }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="monto{{ $venta->id }}">Monto:</label>
                                            <input type="number" name="monto" step="0.01" class="form-control" id="monto{{ $venta->id }}" value="{{ $venta->monto }}" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </tbody>

                <tfoot>
                    <tr class="table-total-row">
                        <td colspan="2">Total Ventas</td>
                        <td class="text-right">${{ number_format($totalVentas, 2) }}</td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <h4 class="mt-4">Detalle de Costos por Producto
            <button class="btn-add-movement" data-toggle="modal" data-target="#addProductCostModal">
                <i class="fas fa-plus-circle"></i> Agregar Costo
            </button>
        </h4>
        <div class="details-section">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Concepto</th>
                        <th class="text-right">Monto</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody id="productCostsTableBody">
                    @foreach ($costos as $costo)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($costo->fecha)->format('Y-m-d') }}</td>
                        <td>{{ $costo->concepto }}</td>
                        <td class="text-right">${{ number_format($costo->monto, 2) }}</td>
                        <td class="text-center">
                            <!-- Editar -->
                            <button 
                                type="button" 
                                class="btn btn-sm btn-primary" 
                                data-toggle="modal" 
                                data-target="#editCostModal{{ $costo->id }}"
                                title="Editar Costo"
                            >
                                <i class="fas fa-edit"></i>
                            </button>

                            <!-- Eliminar -->
                            <form action="{{ route('costos.eliminar', $costo->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Eliminar este costo?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" title="Eliminar Costo">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>

                    <!-- Modal Editar Costo -->
                    <div class="modal fade" id="editCostModal{{ $costo->id }}" tabindex="-1" aria-labelledby="editCostModalLabel{{ $costo->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <form action="{{ route('costos.actualizar', $costo->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editCostModalLabel{{ $costo->id }}">Editar Costo</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="fechaCosto{{ $costo->id }}">Fecha:</label>
                                            <input type="date" name="fecha" class="form-control" id="fechaCosto{{ $costo->id }}" value="{{ $costo->fecha->format('Y-m-d') }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="conceptoCosto{{ $costo->id }}">Concepto:</label>
                                            <input type="text" name="concepto" class="form-control" id="conceptoCosto{{ $costo->id }}" value="{{ $costo->concepto }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="montoCosto{{ $costo->id }}">Monto:</label>
                                            <input type="number" name="monto" step="0.01" class="form-control" id="montoCosto{{ $costo->id }}" value="{{ $costo->monto }}" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </tbody>

                <tfoot>
                    <tr class="table-total-row">
                        <td colspan="2">Total Costos Producto</td>
                        <td class="text-right">${{ number_format($totalCostos, 2) }}</td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <h4 class="mt-4">Detalle de Gastos
            <button class="btn-add-movement" data-toggle="modal" data-target="#addExpenseModal">
                <i class="fas fa-plus-circle"></i> Agregar Gasto
            </button>
        </h4>
     <div class="details-section">
    <table class="table table-sm">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Categoría</th>
                <th>Descripción</th>
                <th class="text-right">Monto</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody id="expensesTableBody">
            @foreach ($gastos as $gasto)
            <tr>
                <td>{{ \Carbon\Carbon::parse($gasto->fecha)->format('Y-m-d') }}</td>
                <td>{{ $gasto->categoria }}</td>
                <td>{{ $gasto->descripcion }}</td>
                <td class="text-right">${{ number_format($gasto->monto, 2) }}</td>
                <td class="text-center">
                    <!-- Botón Editar -->
                    <button 
                        type="button" 
                        class="btn btn-sm btn-primary" 
                        data-toggle="modal" 
                        data-target="#editExpenseModal{{ $gasto->id }}"
                        title="Editar Gasto"
                    >
                        <i class="fas fa-edit"></i>
                    </button>

                    <!-- Formulario Eliminar -->
                    <form 
                        action="{{ route('gastos.eliminar', $gasto->id) }}" 
                        method="POST" 
                        style="display:inline-block;" 
                        onsubmit="return confirm('¿Seguro que deseas eliminar este gasto?');"
                    >
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" title="Eliminar Gasto">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </td>
            </tr>

            <!-- Modal Editar Gasto -->
            <div class="modal fade" id="editExpenseModal{{ $gasto->id }}" tabindex="-1" aria-labelledby="editExpenseModalLabel{{ $gasto->id }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form action="{{ route('gastos.actualizar', $gasto->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-header">
                                <h5 class="modal-title" id="editExpenseModalLabel{{ $gasto->id }}">Editar Gasto</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="fechaGasto{{ $gasto->id }}">Fecha:</label>
                                    <input type="date" name="fecha" class="form-control" id="fechaGasto{{ $gasto->id }}" value="{{ $gasto->fecha->format('Y-m-d') }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="categoriaGasto{{ $gasto->id }}">Categoría:</label>
                                    <input type="text" name="categoria" class="form-control" id="categoriaGasto{{ $gasto->id }}" value="{{ $gasto->categoria }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="descripcionGasto{{ $gasto->id }}">Descripción:</label>
                                    <input type="text" name="descripcion" class="form-control" id="descripcionGasto{{ $gasto->id }}" value="{{ $gasto->descripcion }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="montoGasto{{ $gasto->id }}">Monto:</label>
                                    <input type="number" step="0.01" name="monto" class="form-control" id="montoGasto{{ $gasto->id }}" value="{{ $gasto->monto }}" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            @endforeach
        </tbody>
        <tfoot>
            <tr class="table-total-row">
                <td colspan="3">Total de Gastos</td>
                <td class="text-right">${{ number_format($totalGastos, 2) }}</td>
                <td></td>
            </tr>
        </tfoot>
    </table>
</div>


        <h4 class="mt-4">Utilidad antes de impuestos</h4>
        <div class="row">
            <div class="col-md-4">
                <div class="card-summary profit-before-tax">
                    <i class="fas fa-calculator icon"></i>
                    <div>
                        <div class="title">Utilidad antes de impuestos</div>
                        <div class="value" id="utilidadAntesImpuestos">${{ number_format($utilidadAntesImpuestos, 2) }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- MODAL VENTA -->
<div class="modal fade" id="addSaleModal" tabindex="-1" aria-labelledby="addSaleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agregar Nueva Venta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="saleForm" method="POST" action="{{ route('ventas.guardar') }}">
                    @csrf
                    <div class="form-group">
                        <label for="saleDate">Fecha:</label>
                        <input type="date" class="form-control" name="fecha" id="saleDate" required>
                    </div>
                    <div class="form-group">
                        <label for="saleDescription">Descripción:</label>
                        <input type="text" class="form-control" name="descripcion" id="saleDescription" required>
                    </div>
                    <div class="form-group">
                        <label for="saleAmount">Monto:</label>
                        <input type="number" class="form-control" name="monto" id="saleAmount" step="0.01" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar Venta</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- MODAL COSTO PRODUCTO -->
<div class="modal fade" id="addProductCostModal" tabindex="-1" aria-labelledby="addProductCostModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agregar Nuevo Costo por Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="productCostForm" method="POST" action="{{ route('costos.guardar') }}">
                    @csrf
                    <div class="form-group">
                        <label for="productCostDate">Fecha:</label>
                        <input type="date" class="form-control" name="fecha" id="productCostDate" required>
                    </div>
                    <div class="form-group">
                        <label for="productCostConcept">Concepto:</label>
                        <input type="text" class="form-control" name="concepto" id="productCostConcept" required>
                    </div>
                    <div class="form-group">
                        <label for="productCostAmount">Monto:</label>
                        <input type="number" class="form-control" name="monto" id="productCostAmount" step="0.01" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar Costo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- MODAL GASTO -->
<div class="modal fade" id="addExpenseModal" tabindex="-1" aria-labelledby="addExpenseModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agregar Nuevo Gasto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="expenseForm" method="POST" action="{{ route('gastos.guardar') }}">
                    @csrf
                    <div class="form-group">
                        <label for="expenseDate">Fecha:</label>
                        <input type="date" class="form-control" name="fecha" id="expenseDate" required>
                    </div>
                    <div class="form-group">
                        <label for="expenseCategory">Categoría:</label>
                        <select class="form-control" name="categoria" id="expenseCategory" required>
                            <option value="">Selecciona una categoría</option>
                            <option value="Nómina">Nómina</option>
                            <option value="Ventas">Ventas</option>
                            <option value="Fletes">Fletes</option>
                            <option value="Varios">Varios</option>
                            <option value="Gasolina">Gasolina</option>
                            <option value="Reparticiones">Reparticiones</option>
                            <option value="Otros">Otros</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="expenseDescription">Descripción:</label>
                        <input type="text" class="form-control" name="descripcion" id="expenseDescription" required>
                    </div>
                    <div class="form-group">
                        <label for="expenseAmount">Monto:</label>
                        <input type="number" class="form-control" name="monto" id="expenseAmount" step="0.01" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar Gasto</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- SCRIPTS CORRECTOS PARA BOOTSTRAP 4 -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<!-- MODAL
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // --- DATA STORAGE (Simulado) ---
        // En una aplicación real, estos datos se cargarían desde un backend.
        // Usamos un array de objetos para cada tipo de movimiento.
        let salesData = [
            { id: 1, date: '2025-06-25', description: 'Venta de Tomate Lote B', amount: 500000 },
            { id: 2, date: '2025-06-28', description: 'Venta de Chile Serrano C-03', amount: 700000 }
        ];

        let productCostsData = [
            { id: 1, date: '2025-06-20', concept: 'Fertilizante para Lote A', amount: 300000 },
            { id: 2, date: '2025-06-22', concept: 'Mano de obra (cosecha tomate)', amount: 500000 }
        ];

        let expensesData = [
            { id: 1, date: '2025-06-30', category: 'Nómina', description: 'Pago quincenal de personal', amount: 120000 },
            { id: 2, date: '2025-06-28', category: 'Ventas', description: 'Comisiones de venta', amount: 60000 },
            { id: 3, date: '2025-06-27', category: 'Fletes', description: 'Transporte de producto a mercado', amount: 30000 },
            { id: 4, date: '2025-06-26', category: 'Varios', description: 'Materiales de oficina', amount: 10000 },
            { id: 5, date: '2025-06-25', category: 'Gasolina', description: 'Combustible para maquinaria', amount: 10000 },
            { id: 6, date: '2025-06-24', category: 'Reparticiones', description: 'Regalos a clientes', amount: 8000 }
        ];

        let nextSaleId = salesData.length > 0 ? Math.max(...salesData.map(s => s.id)) + 1 : 1;
        let nextProductCostId = productCostsData.length > 0 ? Math.max(...productCostsData.map(pc => pc.id)) + 1 : 1;
        let nextExpenseId = expensesData.length > 0 ? Math.max(...expensesData.map(e => e.id)) + 1 : 1;

        // --- UTILITY FUNCTIONS ---
        // Formato de moneda
        function formatCurrency(value) {
            return '$' + value.toLocaleString('es-MX', { minimumFractionDigits: 0, maximumFractionDigits: 0 });
        }

        // --- RENDERING FUNCTIONS ---
        function renderSalesTable() {
            const tableBody = document.getElementById('salesTableBody');
            tableBody.innerHTML = ''; // Limpiar tabla
            let totalSales = 0;

            salesData.forEach(sale => {
                totalSales += sale.amount;
                const row = `
                    <tr>
                        <td>${sale.date}</td>
                        <td>${sale.description}</td>
                        <td class="text-right">${formatCurrency(sale.amount)}</td>
                        <td class="text-center">
                            <button class="btn btn-info btn-sm btn-edit" data-type="sale" data-id="${sale.id}"><i class="fas fa-pencil-alt"></i></button>
                            <button class="btn btn-danger btn-sm btn-delete" data-type="sale" data-id="${sale.id}"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                `;
                tableBody.insertAdjacentHTML('beforeend', row);
            });
            document.getElementById('totalSalesTable').textContent = formatCurrency(totalSales);
            return totalSales;
        }

        function renderProductCostsTable() {
            const tableBody = document.getElementById('productCostsTableBody');
            tableBody.innerHTML = '';
            let totalProductCosts = 0;

            productCostsData.forEach(cost => {
                totalProductCosts += cost.amount;
                const row = `
                    <tr>
                        <td>${cost.date}</td>
                        <td>${cost.concept}</td>
                        <td class="text-right">${formatCurrency(cost.amount)}</td>
                        <td class="text-center">
                            <button class="btn btn-info btn-sm btn-edit" data-type="product-cost" data-id="${cost.id}"><i class="fas fa-pencil-alt"></i></button>
                            <button class="btn btn-danger btn-sm btn-delete" data-type="product-cost" data-id="${cost.id}"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                `;
                tableBody.insertAdjacentHTML('beforeend', row);
            });
            document.getElementById('totalProductCostsTable').textContent = formatCurrency(totalProductCosts);
            return totalProductCosts;
        }

        function renderExpensesTable() {
            const tableBody = document.getElementById('expensesTableBody');
            tableBody.innerHTML = '';
            let totalExpenses = 0;

            expensesData.forEach(expense => {
                totalExpenses += expense.amount;
                const row = `
                    <tr>
                        <td>${expense.date}</td>
                        <td>${expense.category}</td>
                        <td>${expense.description}</td>
                        <td class="text-right">${formatCurrency(expense.amount)}</td>
                        <td class="text-center">
                            <button class="btn btn-info btn-sm btn-edit" data-type="expense" data-id="${expense.id}"><i class="fas fa-pencil-alt"></i></button>
                            <button class="btn btn-danger btn-sm btn-delete" data-type="expense" data-id="${expense.id}"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                `;
                tableBody.insertAdjacentHTML('beforeend', row);
            });
            document.getElementById('totalExpensesTable').textContent = formatCurrency(totalExpenses);
            return totalExpenses;
        }

        // --- MAIN CALCULATION FUNCTION ---
        function updateFinancialSummary() {
            const totalVentas = renderSalesTable();
            const costosProducto = renderProductCostsTable();
            const totalGastos = renderExpensesTable();

            const utilidadBruta = totalVentas - costosProducto;
            const utilidadAntesImpuestos = utilidadBruta - totalGastos;

            document.getElementById('totalVentas').textContent = formatCurrency(totalVentas);
            document.getElementById('costosProducto').textContent = formatCurrency(costosProducto);
            document.getElementById('utilidadBruta').textContent = formatCurrency(utilidadBruta);
            document.getElementById('utilidadAntesImpuestos').textContent = formatCurrency(utilidadAntesImpuestos);
        }

        // --- MODAL SUBMISSION HANDLERS ---
        // Handle Add Sale Form Submission
        document.getElementById('saleForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const newSale = {
                id: nextSaleId++,
                date: document.getElementById('saleDate').value,
                description: document.getElementById('saleDescription').value,
                amount: parseFloat(document.getElementById('saleAmount').value)
            };
            salesData.push(newSale);
            updateFinancialSummary(); // Recalcular y renderizar
            $('#addSaleModal').modal('hide');
            this.reset(); // Limpiar el formulario
        });

        // Handle Add Product Cost Form Submission
        document.getElementById('productCostForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const newProductCost = {
                id: nextProductCostId++,
                date: document.getElementById('productCostDate').value,
                concept: document.getElementById('productCostConcept').value,
                amount: parseFloat(document.getElementById('productCostAmount').value)
            };
            productCostsData.push(newProductCost);
            updateFinancialSummary();
            $('#addProductCostModal').modal('hide');
            this.reset();
        });

        // Handle Add Expense Form Submission
        document.getElementById('expenseForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const newExpense = {
                id: nextExpenseId++,
                date: document.getElementById('expenseDate').value,
                category: document.getElementById('expenseCategory').value,
                description: document.getElementById('expenseDescription').value,
                amount: parseFloat(document.getElementById('expenseAmount').value)
            };
            expensesData.push(newExpense);
            updateFinancialSummary();
            $('#addExpenseModal').modal('hide');
            this.reset();
        });

        // --- EDIT AND DELETE HANDLERS (Delegation) ---
        // Usamos delegación de eventos para los botones de editar y eliminar,
        // ya que se añadirán dinámicamente.
        document.addEventListener('click', function(event) {
            if (event.target.closest('.btn-delete')) {
                const button = event.target.closest('.btn-delete');
                const type = button.dataset.type;
                const id = parseInt(button.dataset.id);

                if (confirm('¿Estás seguro de que quieres eliminar este movimiento?')) {
                    if (type === 'sale') {
                        salesData = salesData.filter(item => item.id !== id);
                    } else if (type === 'product-cost') {
                        productCostsData = productCostsData.filter(item => item.id !== id);
                    } else if (type === 'expense') {
                        expensesData = expensesData.filter(item => item.id !== id);
                    }
                    updateFinancialSummary(); // Recalcular después de eliminar
                }
            }
            // Implementación de Editar sería similar, abriendo el modal con datos pre-cargados
            // y guardando los cambios en el array correspondiente.
        });


        updateFinancialSummary();
    });
</script>
    
    GASTO -->


</body>
</html>