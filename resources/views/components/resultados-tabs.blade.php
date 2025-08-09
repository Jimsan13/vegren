<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estado de Resultados</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
   @section('styles')
<link rel="stylesheet" href="{{ asset('css/resultados.css') }}">
@endsection
</head>
<body>

<div class="container-fluid mt-5">
    <div class="resultados-container">
        <h3 class="fw-bold text-success mb-4"></h3>

        <h4 class="mt-4">Resumen</h4>
        <div class="row">
            <div class="col-md-4">
                <div class="card-summary sales-summary">
                    <i class="fas fa-shopping-cart icon"></i>
                    <div>
                        <div class="title">Total Ventas</div>
                        <div class="value" id="totalVentas">$0</div>
                        <div class="description"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-summary cost-summary">
                    <i class="fas fa-dollar-sign icon"></i>
                    <div>
                        <div class="title">Costos Producto</div>
                        <div class="value" id="costosProducto">$0</div>
                        <div class="description"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-summary profit-summary">
                    <i class="fas fa-money-bill-alt icon"></i>
                    <div>
                        <div class="title">Utilidad Bruta</div>
                        <div class="value" id="utilidadBruta">$0</div>
                        <div class="description"></div>
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
                    <tr>
                        <td>2025-06-25</td>
                        <td>Venta de Tomate Lote B</td>
                        <td class="text-right">$500,000</td>
                        <td class="text-center">
                            <button class="btn btn-info btn-sm btn-edit" data-type="sale" data-id="1"><i class="fas fa-pencil-alt"></i></button>
                            <button class="btn btn-danger btn-sm btn-delete" data-type="sale" data-id="1"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>2025-06-28</td>
                        <td>Venta de Chile Serrano C-03</td>
                        <td class="text-right">$700,000</td>
                        <td class="text-center">
                            <button class="btn btn-info btn-sm btn-edit" data-type="sale" data-id="2"><i class="fas fa-pencil-alt"></i></button>
                            <button class="btn btn-danger btn-sm btn-delete" data-type="sale" data-id="2"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr class="table-total-row">
                        <td colspan="2">Total Ventas</td>
                        <td class="text-right" id="totalSalesTable">$1,200,000</td>
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
                    <tr>
                        <td>2025-06-20</td>
                        <td>Fertilizante para Lote A</td>
                        <td class="text-right">$300,000</td>
                        <td class="text-center">
                            <button class="btn btn-info btn-sm btn-edit" data-type="product-cost" data-id="1"><i class="fas fa-pencil-alt"></i></button>
                            <button class="btn btn-danger btn-sm btn-delete" data-type="product-cost" data-id="1"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>2025-06-22</td>
                        <td>Mano de obra (cosecha tomate)</td>
                        <td class="text-right">$500,000</td>
                        <td class="text-center">
                            <button class="btn btn-info btn-sm btn-edit" data-type="product-cost" data-id="2"><i class="fas fa-pencil-alt"></i></button>
                            <button class="btn btn-danger btn-sm btn-delete" data-type="product-cost" data-id="2"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr class="table-total-row">
                        <td colspan="2">Total Costos Producto</td>
                        <td class="text-right" id="totalProductCostsTable">$800,000</td>
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
                    <tr>
                        <td>2025-06-30</td>
                        <td>Nómina</td>
                        <td>Pago quincenal de personal</td>
                        <td class="text-right">$120,000</td>
                        <td class="text-center">
                            <button class="btn btn-info btn-sm btn-edit" data-type="expense" data-id="1"><i class="fas fa-pencil-alt"></i></button>
                            <button class="btn btn-danger btn-sm btn-delete" data-type="expense" data-id="1"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>2025-06-28</td>
                        <td>Ventas</td>
                        <td>Comisiones de venta</td>
                        <td class="text-right">$60,000</td>
                        <td class="text-center">
                            <button class="btn btn-info btn-sm btn-edit" data-type="expense" data-id="2"><i class="fas fa-pencil-alt"></i></button>
                            <button class="btn btn-danger btn-sm btn-delete" data-type="expense" data-id="2"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>2025-06-27</td>
                        <td>Fletes</td>
                        <td>Transporte de producto a mercado</td>
                        <td class="text-right">$30,000</td>
                        <td class="text-center">
                            <button class="btn btn-info btn-sm btn-edit" data-type="expense" data-id="3"><i class="fas fa-pencil-alt"></i></button>
                            <button class="btn btn-danger btn-sm btn-delete" data-type="expense" data-id="3"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>2025-06-26</td>
                        <td>Varios</td>
                        <td>Materiales de oficina</td>
                        <td class="text-right">$10,000</td>
                        <td class="text-center">
                            <button class="btn btn-info btn-sm btn-edit" data-type="expense" data-id="4"><i class="fas fa-pencil-alt"></i></button>
                            <button class="btn btn-danger btn-sm btn-delete" data-type="expense" data-id="4"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>2025-06-25</td>
                        <td>Gasolina</td>
                        <td>Combustible para maquinaria</td>
                        <td class="text-right">$10,000</td>
                        <td class="text-center">
                            <button class="btn btn-info btn-sm btn-edit" data-type="expense" data-id="5"><i class="fas fa-pencil-alt"></i></button>
                            <button class="btn btn-danger btn-sm btn-delete" data-type="expense" data-id="5"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>2025-06-24</td>
                        <td>Reparticiones</td>
                        <td>Regalos a clientes</td>
                        <td class="text-right">$8,000</td>
                        <td class="text-center">
                            <button class="btn btn-info btn-sm btn-edit" data-type="expense" data-id="6"><i class="fas fa-pencil-alt"></i></button>
                            <button class="btn btn-danger btn-sm btn-delete" data-type="expense" data-id="6"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr class="table-total-row">
                        <td colspan="3">Total de Gastos</td>
                        <td class="text-right" id="totalExpensesTable">$238,000</td>
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
                        <div class="value" id="utilidadAntesImpuestos">$0</div>
                        <div class="description"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addSaleModal" tabindex="-1" aria-labelledby="addSaleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSaleModalLabel">Agregar Nueva Venta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="saleForm">
                    <div class="form-group">
                        <label for="saleDate">Fecha:</label>
                        <input type="date" class="form-control" id="saleDate" required>
                    </div>
                    <div class="form-group">
                        <label for="saleDescription">Descripción:</label>
                        <input type="text" class="form-control" id="saleDescription" placeholder="Ej: Venta de Maíz Lote C" required>
                    </div>
                    <div class="form-group">
                        <label for="saleAmount">Monto:</label>
                        <input type="number" class="form-control" id="saleAmount" step="0.01" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary" form="saleForm">Guardar Venta</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addProductCostModal" tabindex="-1" aria-labelledby="addProductCostModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductCostModalLabel">Agregar Nuevo Costo por Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="productCostForm">
                    <div class="form-group">
                        <label for="productCostDate">Fecha:</label>
                        <input type="date" class="form-control" id="productCostDate" required>
                    </div>
                    <div class="form-group">
                        <label for="productCostConcept">Concepto:</label>
                        <input type="text" class="form-control" id="productCostConcept" placeholder="Ej: Semilla de Tomate, Jornaleros" required>
                    </div>
                    <div class="form-group">
                        <label for="productCostAmount">Monto:</label>
                        <input type="number" class="form-control" id="productCostAmount" step="0.01" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary" form="productCostForm">Guardar Costo</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addExpenseModal" tabindex="-1" aria-labelledby="addExpenseModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addExpenseModalLabel">Agregar Nuevo Gasto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="expenseForm">
                    <div class="form-group">
                        <label for="expenseDate">Fecha:</label>
                        <input type="date" class="form-control" id="expenseDate" required>
                    </div>
                    <div class="form-group">
                        <label for="expenseCategory">Categoría:</label>
                        <select class="form-control" id="expenseCategory" required>
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
                        <input type="text" class="form-control" id="expenseDescription" placeholder="Ej: Recibo de luz oficina" required>
                    </div>
                    <div class="form-group">
                        <label for="expenseAmount">Monto:</label>
                        <input type="number" class="form-control" id="expenseAmount" step="0.01" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary" form="expenseForm">Guardar Gasto</button>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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


        // --- INITIAL RENDER ---
        updateFinancialSummary(); // Renderizar y calcular al cargar la página por primera vez
    });
</script>

</body>
</html>