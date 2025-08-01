<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VEGGREEN - Nómina Operativa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    @section('styles')
    <link rel="stylesheet" href="{{ asset('css/nomina.css') }}">
    @endsection
    
</head>
<body>


<div class="container-fluid mt-5">
    <div class="resultados-container">
        <h3 class="fw-bold text-success mb-4"></h3>
        
        <!--  M E N U  D E  A P A R T A D O S -->
        <div class="section-card">
            <ul class="nav nav-tabs mb-4 nomina-tabs" id="nominaSubTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="mano-obra-tab" data-bs-toggle="tab" data-bs-target="#manoObraContent" type="button" role="tab" aria-controls="manoObraContent" aria-selected="false">
                        Empacadores
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="enhieladores-tab" data-bs-toggle="tab" data-bs-target="#enhieladoresContent" type="button" role="tab" aria-controls="enhieladoresContent" aria-selected="false">
                        Enhieladores
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="encargados-tab" data-bs-toggle="tab" data-bs-target="#encargadosContent" type="button" role="tab" aria-controls="encargadosContent" aria-selected="false">
                        Encargados
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="empleados-tab" data-bs-toggle="tab" data-bs-target="#empleadosContent" type="button" role="tab" aria-controls="empleadosContent" aria-selected="false">
                        Empleados
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="resumen-tab" data-bs-toggle="tab" data-bs-target="#resumenContent" type="button" role="tab" aria-controls="resumenContent" aria-selected="true">
                        Resumen de Producción
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="sobres-pago-tab" data-bs-toggle="tab" data-bs-target="#sobresPagoContent" type="button" role="tab" aria-controls="sobresPagoContent" aria-selected="false">
                        Generación de Sobres de Pago
                    </button>
                </li>
            </ul>

            <div class="tab-content" id="nominaSubTabsContent">
                <!-- Empacadores -->
                <div class="tab-pane fade" id="manoObraContent" role="tabpanel" aria-labelledby="mano-obra-tab">
                    <h4>Resumen Semanal de Empacadores</h4>
                    <div class="row g-4 mb-4">
                        <div class="col-md-3">
                            <div class="card-summary">
                                <i class="fas fa-cubes icon"></i>
                                <div>
                                    <div class="title">Total Cajas Empacadas</div>
                                    <div class="value">{{ $totalCajas }}</div>
                                    <div class="description">Esta semana</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card-summary">
                                <i class="fas fa-boxes icon"></i>
                                <div>
                                    <div class="title">Total Reempaques</div>
                                    <div class="value">{{ $totalReempaques }}</div>
                                    <div class="description">Cantidad de reempaques</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card-summary">
                                <i class="fas fa-dollar-sign icon"></i>
                                <div>
                                    <div class="title">Costo Total Mano Obra</div>
                                    <div class="value">${{ number_format($totalNomina, 2) }}</div>
                                    <div class="description">Nómina pagada empacadores</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card-summary">
                                <i class="fas fa-users icon"></i>
                                <div>
                                    <div class="title">Empacadores Activos</div>
                                    <div class="value">{{ $activos }}</div>
                                    <div class="description">Empleados en nómina</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mb-3">
                        <button class="btn btn-add-table" data-bs-toggle="modal" data-bs-target="#nominaEditModal" data-modal-type="manoObra">
                            <i class="fas fa-plus me-2"></i>Registrar Actividad
                        </button>
                    </div>
                    <h4>Detalle de Actividades y Pago (Empacadores)</h4>
                    <div class="table-responsive mt-3">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Empleado</th>
                                    <th scope="col">Cajas Semanal</th>
                                    <th scope="col">Reempaques</th>
                                    <th scope="col">Descargas (uds)</th>
                                    <th scope="col">Descuentos</th>
                                    <th scope="col">Total a Pagar</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($empacadores as $empacador)
                                    <tr>
                                        <td>{{ $empacador->empleado }}</td>
                                        <td>{{ $empacador->cajas_semanal }}</td>
                                        <td>{{ $empacador->reempaques }}</td>
                                        <td>{{ $empacador->descargas }}</td>
                                        <td>${{ number_format($empacador->descuentos, 2) }}</td>
                                        <td>${{ number_format($empacador->total_pagar, 2) }}</td>
                                        <td>
                                            <a href="{{ route('empacadores.edit', $empacador->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                            <form action="{{ route('empacadores.destroy', $empacador->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Seguro que deseas eliminar este registro?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Sin registros esta semana.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Enhieladores -->
                <div class="tab-pane fade" id="enhieladoresContent" role="tabpanel" aria-labelledby="enhieladores-tab">
                    <h4>Resumen Semanal de Enhieladores</h4>
                    <div class="row g-4 mb-4">
                        <div class="col-md-3">
                            <div class="card-summary">
                                <i class="fas fa-pallet icon"></i>
                                <div>
                                    <div class="title">Total Tarimas Trabajadas</div>
                                    <div class="value">{{ $totalTarimas ?? 0 }}</div>
                                    <div class="description">Esta semana</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card-summary">
                                <i class="fas fa-redo-alt icon"></i>
                                <div>
                                    <div class="title">Total Rengeladas</div>
                                    <div class="value">{{ $totalRengeladas ?? 0 }}</div>
                                    <div class="description">Tarimas rengeladas</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card-summary">
                                <i class="fas fa-dollar-sign icon"></i>
                                <div>
                                    <div class="title">Costo Total Enhieladores</div>
                                    <div class="value">${{ number_format($totalNominaEnhieladores ?? 0, 2) }}</div>
                                    <div class="description">Nómina pagada enhieladores</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card-summary">
                                <i class="fas fa-users icon"></i>
                                <div>
                                    <div class="title">Enhieladores Activos</div>
                                    <div class="value">{{ $activosEnhieladores ?? 0 }}</div>
                                    <div class="description">Empleados en nómina</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mb-3">
                        <button class="btn btn-add-table" data-bs-toggle="modal" data-bs-target="#nominaEditModal" data-modal-type="enhieladores">
                            <i class="fas fa-plus me-2"></i>Registrar Actividad
                        </button>
                    </div>
                    <h4>Detalle de Actividades y Pago (Enhieladores)</h4>
                    <div class="table-responsive mt-3">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Tarimas Trabajadas</th>
                                    <th scope="col">Rengeladas</th>
                                    <th scope="col">Actividades Adicionales</th>
                                    <th scope="col">Descuentos</th>
                                    <th scope="col">Total a Pagar</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($enhieladores as $enhielador)
                                    <tr>
                                        <td>{{ $enhielador->empleado }}</td>
                                        <td>{{ $enhielador->tarimas_trabajadas }}</td>
                                        <td>{{ $enhielador->rengeladas }}</td>
                                        <td>{{ $enhielador->actividades_adicionales }}</td>
                                        <td>${{ number_format($enhielador->descuentos, 2) }}</td>
                                        <td>${{ number_format($enhielador->total_pagar, 2) }}</td>
                                        <td>
                                            <a href="{{ route('enhieladores.edit', $enhielador->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                            <form action="{{ route('enhieladores.destroy', $enhielador->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Seguro que deseas eliminar este registro?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Sin registros esta semana.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Encargados -->
                <div class="tab-pane fade" id="encargadosContent" role="tabpanel" aria-labelledby="encargados-tab">
                    <h4>Resumen Semanal de Encargados</h4>
                    <div class="row g-4 mb-4">
                        <div class="col-md-3">
                            <div class="card-summary">
                                <i class="fas fa-thermometer-half icon"></i>
                                <div>
                                    <div class="title">Total Termos Supervisados</div>
                                    <div class="value">{{ $totalTermos ?? 0 }}</div>
                                    <div class="description">Esta semana</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card-summary">
                                <i class="fas fa-clipboard-check icon"></i>
                                <div>
                                    <div class="title">Reportes Generados</div>
                                    <div class="value">{{ $totalReportes ?? 0 }}</div>
                                    <div class="description">Informes diarios</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card-summary">
                                <i class="fas fa-dollar-sign icon"></i>
                                <div>
                                    <div class="title">Costo Total Encargados</div>
                                    <div class="value">${{ number_format($totalNominaEncargados ?? 0, 2) }}</div>
                                    <div class="description">Nómina pagada encargados</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card-summary">
                                <i class="fas fa-users icon"></i>
                                <div>
                                    <div class="title">Encargados Activos</div>
                                    <div class="value">{{ $activosEncargados ?? 0 }}</div>
                                    <div class="description">Empleados en nómina</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mb-3">
                        <button class="btn btn-add-table" data-bs-toggle="modal" data-bs-target="#nominaEditModal" data-modal-type="encargados">
                            <i class="fas fa-plus me-2"></i>Registrar Actividad
                        </button>
                    </div>
                    <h4>Detalle de Actividades y Pago (Encargados)</h4>
                    <div class="table-responsive mt-3">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Termos Realizados</th>
                                    <th scope="col">Actividades Adicionales</th>
                                    <th scope="col">Descuentos</th>
                                    <th scope="col">Total a Pagar</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($encargados as $encargado)
                                    <tr>
                                        <td>{{ $encargado->empleado }}</td>
                                        <td>{{ $encargado->termos_realizados }}</td>
                                        <td>{{ $encargado->actividades_adicionales }}</td>
                                        <td>${{ number_format($encargado->descuentos, 2) }}</td>
                                        <td>${{ number_format($encargado->total_pagar, 2) }}</td>
                                        <td>
                                            <a href="{{ route('encargados.edit', $encargado->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                            <form action="{{ route('encargados.destroy', $encargado->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Seguro que deseas eliminar este registro?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Sin registros esta semana.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Empleados -->
                <div class="tab-pane fade" id="empleadosContent" role="tabpanel" aria-labelledby="empleados-tab">
                    <h4>Lista de Empleados</h4>
                    <div class="d-flex justify-content-end mb-3">
                        <button class="btn btn-add-table" data-bs-toggle="modal" data-bs-target="#empleadoModal" data-modal-type="add">
                            <i class="fas fa-user-plus me-2"></i>Agregar Nuevo Empleado
                        </button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Nombre</th>
                                    <th>Puesto</th>
                                    <th>Teléfono</th>
                                    <th>Email</th>
                                    <th>Fecha de Contratación</th>
                                    <th>Salario Base</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($empleados as $empleado)
                                    <tr>
                                        <td><i class="fas fa-user"></i></td>
                                        <td>{{ $empleado->nombre_completo }}</td>
                                        <td>{{ $empleado->puesto }}</td>
                                        <td>{{ $empleado->telefono }}</td>
                                        <td>{{ $empleado->email }}</td>
                                        <td>{{ $empleado->fecha_contratacion }}</td>
                                        <td>${{ number_format($empleado->salario_base, 2) }}</td>
                                        <td>
                                            <a href="{{ route('empleados.edit', $empleado->id) }}" class="btn btn-sm btn-primary">
                                                Editar
                                            </a>
                                            <form action="{{ route('empleados.destroy', $empleado->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Seguro que deseas eliminar este empleado?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    Eliminar
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>

            <!-- Resumen de Producción -->
            <div class="tab-pane fade show active" id="resumenContent" role="tabpanel" aria-labelledby="resumen-tab">
                <h4 class="mb-3">Resumen General de Producción Semanal</h4>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card-summary sales-summary">
                            <i class="fas fa-box-open icon"></i>
                            <div>
                                <div class="title">Total Cajas Empacadas</div>
                                <div class="value">{{ $totalCajas ?? 0 }}</div>
                                <div class="description">Producción total de empacadores.</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card-summary cost-summary">
                            <i class="fas fa-sync-alt icon"></i>
                            <div>
                                <div class="title">Total Reempaques</div>
                                <div class="value">{{ $totalReempaques ?? 0 }}</div>
                                <div class="description">Cajas que requirieron reempaque.</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card-summary profit-summary">
                            <i class="fas fa-thermometer-three-quarters icon"></i>
                            <div>
                                <div class="title">Total Termos Realizados</div>
                                <div class="value">{{ $totalTermos ?? 0 }}</div>
                                <div class="description">Lotes de frío supervisados.</div>
                            </div>
                        </div>
                    </div>
                </div>

                <h4 class="mt-4">Resumen Financiero de Nómina</h4>
                <div class="details-section">
                    <div class="details-item">
                        <i class="fas fa-coins icon"></i>
                        <div class="col-concept">Total Nómina Mano de Obra</div>
                        <div class="col-amount text-right">${{ number_format($totalNomina ?? 0, 2) }}</div>
                    </div>
                    <div class="details-item">
                        <i class="fas fa-coins icon"></i>
                        <div class="col-concept">Total Nómina Enhieladores</div>
                        <div class="col-amount text-right">${{ number_format($totalNominaEnhieladores ?? 0, 2) }}</div>
                    </div>
                    <div class="details-item">
                        <i class="fas fa-coins icon"></i>
                        <div class="col-concept">Total Nómina Encargados</div>
                        <div class="col-amount text-right">${{ number_format($totalNominaEncargados ?? 0, 2) }}</div>
                    </div>
                    <div class="details-item">
                        <i class="fas fa-hand-holding-usd icon"></i>
                        <div class="col-concept">Total Descuentos Aplicados</div>
                        <div class="col-amount text-right text-danger">
                            -${{ number_format($totalDescuentos ?? 0, 2) }}
                        </div>
                    </div>
                    <div class="details-item">
                        <i class="fas fa-money-bill-wave icon"></i>
                        <div class="col-concept fw-bold">Total General de Nómina a Pagar</div>
                        <div class="col-amount text-right fw-bold text-success">
                            ${{ number_format(($totalNomina + $totalNominaEnhieladores + $totalNominaEncargados - $totalDescuentos) ?? 0, 2) }}
                        </div>
                    </div>
                </div>

                <h4 class="mt-4">Detección de Diferencias (Análisis Rápido)</h4>
                <div class="details-section">
                    <div class="details-item">
                        <i class="fas fa-balance-scale icon"></i>
                        <div class="col-concept">Cajas Empacadas vs. Cajas en Almacén</div>
                        <div class="col-amount text-right text-success">
                            {{ $diferenciaCajas ?? '0' }}
                        </div>
                    </div>
                    <div class="details-item">
                        <i class="fas fa-exclamation-triangle icon"></i>
                        <div class="col-concept">Efectivo Reportado vs. Nómina General</div>
                        <div class="col-amount text-right text-danger">
                            {{ $diferenciaEfectivo ?? '0' }}
                        </div>
                    </div>
                    <div class="details-item">
                        <i class="fas fa-file-invoice-dollar icon"></i>
                        <div class="col-concept">Nómina Estimada vs. Nómina Real</div>
                        <div class="col-amount text-right text-info">
                            {{ $diferenciaNomina ?? '0' }}
                        </div>
                    </div>
                </div>
            </div>

                <!-- Generación de Sobres de Pago -->
            <div class="tab-pane fade" id="sobresPagoContent" role="tabpanel" aria-labelledby="sobres-pago-tab" style="margin-top: 0 !important; padding-top: 0 !important;">
                    <h4>Generación de Sobres de Pago</h4>
                    <p>Aquí puedes generar los sobres de pago para todos los empleados de la semana actual.</p>
                    <button class="btn btn-primary"><i class="fas fa-print me-2"></i>Generar Sobres de Pago</button>
                    <div class="mt-4">
                        <h5>Historial de Sobres Generados</h5>
                        <ul class="list-group">
                            <!-- Aquí van los sobres generados dinámicamente -->
                        </ul>
                    </div>
                </div>
            </div>
        </div> 
    </div> 
</div> 


{{-- F O R M U L A R I O   D E  H E N I A L A D O R --}}
<div class="modal fade" id="nominaEditModal" tabindex="-1" aria-labelledby="nominaEditModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="nominaEditModalLabel">Registrar Actividad</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="nominaActivityForm" method="POST" action="{{ route('nomina.actividad.store') }}">
                    @csrf
                    <input type="hidden" id="modalActivityType" name="modalActivityType">
                    <input type="hidden" id="activityId" name="activityId">
                    <div class="mb-3">
                        <label for="empleadoInput" class="form-label">Empleado</label>
                        <input type="text" class="form-control" id="empleadoInput" name="empleadoInput" placeholder="Nombre del empleado" required>
                    </div>
                    <div id="manoObraFields" style="display: none;">
                        <div class="mb-3">
                            <label for="cajasSemanal" class="form-label">Cajas Semanal</label>
                            <input type="number" class="form-control" id="cajasSemanal" name="cajasSemanal">
                        </div>
                        <div class="mb-3">
                            <label for="reempaques" class="form-label">Reempaques</label>
                            <input type="number" class="form-control" id="reempaques" name="reempaques">
                        </div>
                        <div class="mb-3">
                            <label for="descargas" class="form-label">Descargas (uds)</label>
                            <input type="number" class="form-control" id="descargas" name="descargas">
                        </div>
                    </div>
                    <div id="enhieladoresFields" style="display: none;">
                        <div class="mb-3">
                            <label for="tarimasTrabajadas" class="form-label">Tarimas Trabajadas</label>
                            <input type="number" class="form-control" id="tarimasTrabajadas" name="tarimasTrabajadas">
                        </div>
                        <div class="mb-3">
                            <label for="rengeladas" class="form-label">Rengeladas</label>
                            <input type="number" class="form-control" id="rengeladas" name="rengeladas">
                        </div>
                        <div class="mb-3">
                            <label for="actividadesAdicionalesEnhieladores" class="form-label">Actividades Adicionales (Monto)</label>
                            <input type="number" class="form-control" id="actividadesAdicionalesEnhieladores" name="actividadesAdicionalesEnhieladores" step="0.01">
                        </div>
                    </div>
                    <div id="encargadosFields" style="display: none;">
                        <div class="mb-3">
                            <label for="termosRealizados" class="form-label">Termos Realizados</label>
                            <input type="number" class="form-control" id="termosRealizados" name="termosRealizados">
                        </div>
                        <div class="mb-3">
                            <label for="actividadesAdicionalesEncargados" class="form-label">Actividades Adicionales (Monto)</label>
                            <input type="number" class="form-control" id="actividadesAdicionalesEncargados" name="actividadesAdicionalesEncargados" step="0.01">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="descuentos" class="form-label">Descuentos</label>
                        <input type="number" class="form-control" id="descuentos" name="descuentos" step="0.01">
                    </div>
                    <div class="mb-3">
                        <label for="totalPagar" class="form-label">Total a Pagar</label>
                        <input type="number" class="form-control" id="totalPagar" name="totalPagar">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- R E G I S T R A R   E M P L E A D O --}}
<div class="modal fade" id="empleadoModal" tabindex="-1" aria-labelledby="empleadoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="empleadoModalLabel">Registrar Nuevo Empleado</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="empleadoForm" method="POST" action="{{ route('empleado.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="empleadoNombre" class="form-label">Nombre Completo</label>
                        <input type="text" class="form-control" id="empleadoNombre" name="empleadoNombre" required>
                    </div>

                    <div class="mb-3">
                        <label for="empleadoPuesto" class="form-label">Puesto</label>
                        <input type="text" class="form-control" id="empleadoPuesto" name="empleadoPuesto" required>
                    </div>

                    <div class="mb-3">
                        <label for="empleadoSalario" class="form-label">Salario Base</label>
                        <input type="number" class="form-control" id="empleadoSalario" name="empleadoSalario" step="0.01" required>
                    </div>

                    <div class="mb-3">
                        <label for="empleadoFechaContratacion" class="form-label">Fecha de Contratación</label>
                        <input type="date" class="form-control" id="empleadoFechaContratacion" name="empleadoFechaContratacion" required>
                    </div>

                    <div class="mb-3">
                        <label for="empleadoTelefono" class="form-label">Teléfono</label>
                        <input type="tel" class="form-control" id="empleadoTelefono" name="empleadoTelefono">
                    </div>

                    <div class="mb-3">
                        <label for="empleadoEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="empleadoEmail" name="empleadoEmail">
                    </div>

                    <div class="modal-footer px-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Guardar Empleado</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var nominaEditModal = document.getElementById('nominaEditModal');
        nominaEditModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var modalType = button.getAttribute('data-modal-type');
            var modalTitle = nominaEditModal.querySelector('.modal-title');
            var activityIdInput = document.getElementById('activityId');
            var modalActivityTypeInput = document.getElementById('modalActivityType');
            var manoObraFields = document.getElementById('manoObraFields');
            var enhieladoresFields = document.getElementById('enhieladoresFields');
            var encargadosFields = document.getElementById('encargadosFields');

            // Reset form and hide all specific fields
            document.getElementById('nominaActivityForm').reset();
            manoObraFields.style.display = 'none';
            enhieladoresFields.style.display = 'none';
            encargadosFields.style.display = 'none';

            modalActivityTypeInput.value = modalType;

            // Mostrar campos según el tipo de actividad
            if (modalType === 'manoObra') {
                modalTitle.textContent = 'Registrar Actividad de Empacador';
                manoObraFields.style.display = 'block';
            } else if (modalType === 'enhieladores') {
                modalTitle.textContent = 'Registrar Actividad de Enhielador';
                enhieladoresFields.style.display = 'block';
            } else if (modalType === 'encargados') {
                modalTitle.textContent = 'Registrar Actividad de Encargado';
                encargadosFields.style.display = 'block';
            }

            // Si es edición, puedes rellenar los campos aquí si lo deseas
            if (button.hasAttribute('data-id')) {
                activityIdInput.value = button.getAttribute('data-id');
                // Aquí puedes rellenar los campos si lo necesitas, por ejemplo:
                // document.getElementById('empleadoInput').value = button.getAttribute('data-empleado');
                // ...
            }
        });

        // Modal de empleados (sin cambios)
        var empleadoModal = document.getElementById('empleadoModal');
        empleadoModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var modalType = button.getAttribute('data-modal-type');
            var modalTitle = empleadoModal.querySelector('.modal-title');
            var empleadoForm = document.getElementById('empleadoForm');

            empleadoForm.reset();

            if (modalType === 'add') {
                modalTitle.textContent = 'Registrar Nuevo Empleado';
                document.getElementById('empleadoId').value = '';
            } else if (modalType === 'edit') {
                modalTitle.textContent = 'Editar Empleado';
                document.getElementById('empleadoId').value = button.getAttribute('data-id');
                document.getElementById('empleadoNombre').value = button.getAttribute('data-nombre');
                document.getElementById('empleadoPuesto').value = button.getAttribute('data-puesto');
                document.getElementById('empleadoSalario').value = button.getAttribute('data-salario');
                document.getElementById('empleadoFechaContratacion').value = button.getAttribute('data-fecha-contratacion');
                document.getElementById('empleadoTelefono').value = button.getAttribute('data-telefono');
                document.getElementById('empleadoEmail').value = button.getAttribute('data-email');
            }
        });

        // Activar la pestaña de resumen por defecto
        var resumenTab = document.getElementById('resumen-tab');
        var resumenContent = document.getElementById('resumenContent');
        if (resumenTab && resumenContent) {
            var bsTab = new bootstrap.Tab(resumenTab);
            bsTab.show();
        }
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Rellenar datos en el modal al dar clic en "Editar"
        document.querySelectorAll('.editar-empleado').forEach(button => {
            button.addEventListener('click', function () {
                document.getElementById('empleadoId').value = this.dataset.id;
                document.getElementById('empleadoNombre').value = this.dataset.nombre;
                document.getElementById('empleadoPuesto').value = this.dataset.puesto;
                document.getElementById('empleadoSalario').value = this.dataset.salario;
                document.getElementById('empleadoFechaContratacion').value = this.dataset.fecha;
                document.getElementById('empleadoTelefono').value = this.dataset.telefono;
                document.getElementById('empleadoEmail').value = this.dataset.email;
            });
        });
    });
</script>

</body>
</html>