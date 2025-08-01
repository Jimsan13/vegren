<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros de Proveedores</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
     @section('styles')
<link rel="stylesheet" href="{{ asset('css/proveedores.css') }}">
@endsection
</head>
<body>

<div class="container-fluid">
    <div class="main-content">
        <ul class="nav nav-tabs mb-4" id="proveedoresTabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="todos-tab" data-toggle="tab" href="#todos" role="tab" aria-controls="todos" aria-selected="true">Todos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="activos-tab" data-toggle="tab" href="#activos" role="tab" aria-controls="activos" aria-selected="false">Activos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="facturados-tab" data-toggle="tab" href="#facturados" role="tab" aria-controls="facturados" aria-selected="false">Facturados</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pendientes-tab" data-toggle="tab" href="#pendientes" role="tab" aria-controls="pendientes" aria-selected="false">Pendientes</a>
            </li>
        </ul>

        <div class="tab-content" id="proveedoresTabsContent">

      @props([
          'todos',
          'activos',
          'facturados',
          'pendientes',
          'totalCajasTodos',
          'totalMontoTodos',
      ])

            <!-- TODOS -->
            <div class="tab-pane fade show active" id="todos" role="tabpanel" aria-labelledby="todos-tab">

                <div class="list-header d-flex justify-content-between align-items-center mb-3">
                    <h5 class="mb-0">Lista de registros</h5>
                    <button class="btn btn-success" data-toggle="modal" data-target="#addRecordModal">
                        <i class="fas fa-plus-circle"></i> Agregar
                    </button>
                </div>

                <div class="total-summary bg-light p-3 rounded shadow-sm mb-4 d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="mb-1 text-muted">Total de cajas entregadas</h6>
                        <h5 class="mb-0 text-primary">{{ $totalCajasTodos }}</h5>
                    </div>
                    <div>
                        <h6 class="mb-1 text-muted">Total facturado</h6>
                        <h5 class="mb-0 text-success">${{ number_format($totalMontoTodos, 2) }}</h5>
                    </div>
                </div>

                <div class="details-section">
                    @foreach($todos as $proveedor)
                        <div class="card border-0 mb-3 shadow-sm p-3">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h6 class="mb-1 text-dark">{{ $proveedor->nombre }}</h6>
                                    <small class="text-muted">Empacador: {{ $proveedor->empacador ?? '-' }}</small>
                                    <div class="mt-2">
                                        <span class="badge bg-primary text-white me-2">Entregadas: {{ $proveedor->cajas_entregadas ?? 0 }}</span>
                                        <span class="badge bg-info text-dark">Empacadas: {{ $proveedor->cajas_empacadas ?? 0 }}</span>
                                    </div>
                                    <div class="mt-2">
                                        <small>Fecha: {{ $proveedor->fecha ?? '-' }} | Estado: {{ $proveedor->estado ?? '-' }}</small><br>
                                        <strong class="text-success">Monto: ${{ number_format($proveedor->monto ?? 0, 2) }}</strong>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <a href="{{ route('proveedores.edit', $proveedor->id) }}" class="btn btn-sm btn-warning mb-1">Editar</a>
                                    <form action="{{ route('proveedores.destroy', $proveedor->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este proveedor?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>



            <!-- ACTIVOS -->
            <div class="tab-pane fade" id="activos" role="tabpanel" aria-labelledby="activos-tab">
                <div class="list-header d-flex justify-content-between align-items-center mb-3">
                    <h5 class="mb-0">Proveedores Activos</h5>
                    <button class="btn btn-success" data-toggle="modal" data-target="#addActiveProviderModal">
                        <i class="fas fa-plus-circle"></i> Agregar
                    </button>
                </div>

                <div class="details-section">
                @foreach($activos as $proveedor)
                    <div class="card border-0 mb-3 shadow-sm p-3">
                        <h6 class="mb-1">{{ $proveedor->nombre }}</h6>
                        <small class="text-muted">Empacadas: {{ $proveedor->cajas_empacadas ?? 0 }} | Entregadas: {{ $proveedor->cajas_entregadas ?? 0 }}</small><br>
                        <small class="text-muted">Última entrega: {{ $proveedor->fecha ?? '-' }}</small>

                        <div class="mt-2">
                            <a href="{{ route('proveedores.edit', $proveedor->id) }}" class="btn btn-sm btn-primary">Editar</a>
                            <form action="{{ route('proveedores.destroy', $proveedor->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Deseas eliminar este proveedor?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </div>
                    </div>
                @endforeach

                </div>
            </div>


            <!-- FACTURADOS -->
            <div class="tab-pane fade" id="facturados" role="tabpanel" aria-labelledby="facturados-tab">
                <div class="list-header d-flex justify-content-between align-items-center mb-3">
                    <h5 class="mb-0">Facturación</h5>
                    <button class="btn btn-success" data-toggle="modal" data-target="#addInvoiceModal">
                        <i class="fas fa-plus-circle"></i> Agregar
                    </button>
                </div>

                <div class="details-section">
                @foreach($facturados as $proveedor)
                    <div class="card border-0 mb-3 shadow-sm p-3">
                        <h6 class="mb-1">{{ $proveedor->nombre }}</h6>
                        <small class="text-muted">Factura #: {{ $proveedor->numero_factura ?? '-' }} | Monto: ${{ number_format($proveedor->monto ?? 0, 2) }}</small><br>
                        <small class="text-muted">Fecha: {{ $proveedor->fecha ?? '-' }} | Estado: {{ $proveedor->estado_factura ?? '-' }}</small>

                        <div class="mt-2">
                            <a href="{{ route('proveedores.edit', $proveedor->id) }}" class="btn btn-sm btn-primary">Editar</a>
                            <form action="{{ route('proveedores.destroy', $proveedor->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Deseas eliminar este proveedor?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </div>
                    </div>
                @endforeach

                </div>
            </div>


          <!-- PENDIENTES -->
          <div class="tab-pane fade" id="pendientes" role="tabpanel" aria-labelledby="pendientes-tab">
              <div class="list-header d-flex justify-content-between align-items-center mb-3">
                  <h5 class="mb-0">Pendientes</h5>
                  <button class="btn btn-success" data-toggle="modal" data-target="#addPendingModal">
                      <i class="fas fa-plus-circle"></i> Agregar
                  </button>
              </div>

              <div class="details-section">
              @foreach($pendientes as $proveedor)
                  <div class="card border-0 mb-3 shadow-sm p-3">
                      <h6 class="mb-1">{{ $proveedor->nombre }}</h6>
                      <small class="text-muted">Empacador: {{ $proveedor->empacador ?? '-' }}</small><br>
                      <small class="text-muted">Pendientes: {{ $proveedor->cajas_entregadas ?? 0 }} / {{ $proveedor->cajas_empacadas ?? 0 }}</small><br>
                      <small class="text-muted">Fecha esperada: {{ $proveedor->fecha ?? '-' }} | Monto estimado: ${{ number_format($proveedor->monto ?? 0, 2) }}</small>

                      <div class="mt-2">
                          <a href="{{ route('proveedores.edit', $proveedor->id) }}" class="btn btn-sm btn-primary">Editar</a>
                          <form action="{{ route('proveedores.destroy', $proveedor->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Deseas eliminar este proveedor?');">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-sm btn-danger">Eliminar</button>
                          </form>
                      </div>
                  </div>
              @endforeach

              </div>
          </div>


        </div>
    </div>
</div>

<!-- Modal Agregar Nuevo Registro (Todos) -->
<div class="modal fade" id="addRecordModal" tabindex="-1" role="dialog" aria-labelledby="addRecordModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addRecordModalLabel"><i class="fas fa-clipboard-list"></i> Agregar Nuevo Registro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('proveedores.store') }}">
          @csrf
          <input type="hidden" name="tipo" value="todos">

          <div class="form-group">
            <label for="supplierName">Nombre del Proveedor</label>
            <input type="text" class="form-control" name="nombre_proveedor" id="supplierName" placeholder="Ej. Proveedor E" required>
          </div>

          <div class="form-group">
            <label for="packerName">Empacador</label>
            <input type="text" class="form-control" name="empacador" id="packerName" placeholder="Ej. Emp. Carlos S." required>
          </div>

          <div class="form-group">
            <label for="deliveredBoxes">Número de Cajas Entregadas</label>
            <input type="number" class="form-control" name="cajas_entregadas" id="deliveredBoxes" placeholder="Ej. 15" min="0" required>
          </div>

          <div class="form-group">
            <label for="packedTotalBoxes">Total de Cajas Empacadas</label>
            <input type="number" class="form-control" name="cajas_empacadas" id="packedTotalBoxes" placeholder="Ej. 18" min="0" required>
          </div>

          <div class="form-group">
            <label for="recordDate">Fecha</label>
            <input type="date" class="form-control" name="fecha" id="recordDate" required>
          </div>

          <div class="form-group">
            <label for="recordStatus">Estado</label>
            <select class="form-control" name="estado" id="recordStatus" required>
              <option value="Facturado">Facturado</option>
              <option value="Pendiente">Pendiente</option>
            </select>
          </div>

          <div class="form-group">
            <label for="recordAmount">Monto</label>
            <input type="number" class="form-control" name="monto" id="recordAmount" placeholder="Ej. 1500.00" step="0.01" min="0" required>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Guardar Registro</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Agregar Proveedor Activo -->
<div class="modal fade" id="addActiveProviderModal" tabindex="-1" role="dialog" aria-labelledby="addActiveProviderModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addActiveProviderModalLabel"><i class="fas fa-user-plus"></i> Agregar Proveedor Activo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('proveedores.store') }}">
          @csrf
          <input type="hidden" name="tipo" value="activos">

          <div class="form-group">
            <label>Nombre del Proveedor</label>
            <input type="text" class="form-control" name="nombre_proveedor" placeholder="Ej. Proveedor F" required>
          </div>

          <div class="form-group">
            <label>Total de Cajas Empacadas (Histórico)</label>
            <input type="number" class="form-control" name="cajas_empacadas" placeholder="Ej. 200" min="0" required>
          </div>

          <div class="form-group">
            <label>Total de Cajas Entregadas (Histórico)</label>
            <input type="number" class="form-control" name="cajas_entregadas" placeholder="Ej. 180" min="0" required>
          </div>

          <div class="form-group">
            <label>Última Fecha de Entrega</label>
            <input type="date" class="form-control" name="fecha" required>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Guardar Proveedor</button>
          </div>
        </form>
        </div>
      </div>
    </div>
</div>

<!-- Modal Agregar Factura -->
<div class="modal fade" id="addInvoiceModal" tabindex="-1" role="dialog" aria-labelledby="addInvoiceModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addInvoiceModalLabel"><i class="fas fa-file-invoice-dollar"></i> Agregar Factura</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('proveedores.store') }}">
          @csrf
          <input type="hidden" name="tipo" value="facturados">

          <div class="form-group">
            <label>Nombre del Proveedor</label>
            <input type="text" class="form-control" name="nombre_proveedor" placeholder="Ej. Proveedor G" required>
          </div>

          <div class="form-group">
            <label>Número de Factura</label>
            <input type="text" class="form-control" name="numero_factura" placeholder="Ej. #126" required>
          </div>

          <div class="form-group">
            <label>Monto</label>
            <input type="number" class="form-control" name="monto" placeholder="Ej. 2500.00" step="0.01" min="0" required>
          </div>

          <div class="form-group">
            <label>Fecha de Factura</label>
            <input type="date" class="form-control" name="fecha" required>
          </div>

          <div class="form-group">
            <label>Estado de Factura</label>
            <select class="form-control" name="estado" required>
              <option value="Pagado">Pagado</option>
              <option value="Pendiente">Pendiente</option>
            </select>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Guardar Factura</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Agregar Pendiente -->
<div class="modal fade" id="addPendingModal" tabindex="-1" role="dialog" aria-labelledby="addPendingModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addPendingModalLabel"><i class="fas fa-hourglass-half"></i> Agregar Pendiente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('proveedores.store') }}">
          @csrf
          <input type="hidden" name="tipo" value="pendientes">

          <div class="form-group">
            <label>Nombre del Proveedor</label>
            <input type="text" class="form-control" name="nombre_proveedor" placeholder="Ej. Proveedor H" required>
          </div>

          <div class="form-group">
            <label>Empacador</label>
            <input type="text" class="form-control" name="empacador" placeholder="Ej. Emp. David M." required>
          </div>

          <div class="form-group">
            <label>Número de Cajas Entregadas (Pendiente)</label>
            <input type="number" class="form-control" name="cajas_entregadas" placeholder="Ej. 7" min="0" required>
          </div>

          <div class="form-group">
            <label>Total de Cajas Empacadas (Pendiente)</label>
            <input type="number" class="form-control" name="cajas_empacadas" placeholder="Ej. 10" min="0" required>
          </div>

          <div class="form-group">
            <label>Fecha Esperada</label>
            <input type="date" class="form-control" name="fecha" required>
          </div>

          <div class="form-group">
            <label>Monto Estimado</label>
            <input type="number" class="form-control" name="monto" placeholder="Ej. 850.00" step="0.01" min="0" required>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Guardar Pendiente</button>
          </div>
        </form>
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