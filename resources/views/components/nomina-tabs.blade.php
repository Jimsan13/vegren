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
                {{-- Contenido de Mano de Obra (Empacadores) --}}
                <div class="tab-pane fade" id="manoObraContent" role="tabpanel" aria-labelledby="mano-obra-tab">
                    <h4>Resumen Semanal de Empacadores</h4>
                    <div class="row g-4 mb-4">
                        <div class="col-md-3">
                            <div class="card-summary">
                                <i class="fas fa-cubes icon"></i>
                                <div>
                                    <div class="title">Total Cajas Empacadas</div>
                                    <div class="value">5,800</div>
                                    <div class="description">Esta semana</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card-summary">
                                <i class="fas fa-boxes icon"></i>
                                <div>
                                    <div class="title">Total Reempaques</div>
                                    <div class="value">150</div>
                                    <div class="description">Cantidad de reempaques</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card-summary">
                                <i class="fas fa-dollar-sign icon"></i>
                                <div>
                                    <div class="title">Costo Total Mano Obra</div>
                                    <div class="value">$18,500</div>
                                    <div class="description">Nómina pagada empacadores</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card-summary">
                                <i class="fas fa-users icon"></i>
                                <div>
                                    <div class="title">Empacadores Activos</div>
                                    <div class="value">15</div>
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
                                <tr>
                                    <td><img src="https://ui-avatars.com/api/?name=Juan+Perez&background=28a745&color=FFFFFF" alt="Juan Pérez" class="avatar"> Juan Pérez</td>
                                    <td>1200</td>
                                    <td>20</td>
                                    <td>150</td>
                                    <td>$50</td>
                                    <td>$1,550</td>
                                    <td>
                                        <i class="fas fa-eye text-primary action-icon" title="Ver Detalles"></i>
                                        <i class="fas fa-pencil-alt text-warning action-icon" title="Editar" data-bs-toggle="modal" data-bs-target="#nominaEditModal" data-modal-type="manoObra" data-id="1" data-empleado="Juan Pérez" data-cajas="1200" data-reempaques="20" data-descargas="150" data-descuentos="50" data-total="1550"></i>
                                        <i class="fas fa-trash-alt text-danger action-icon" title="Eliminar"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td><img src="https://ui-avatars.com/api/?name=Ana+Ruiz&background=28a745&color=FFFFFF" alt="Ana Ruiz" class="avatar"> Ana Ruiz</td>
                                    <td>1050</td>
                                    <td>15</td>
                                    <td>120</td>
                                    <td>$30</td>
                                    <td>$1,370</td>
                                    <td>
                                        <i class="fas fa-eye text-primary action-icon" title="Ver Detalles"></i>
                                        <i class="fas fa-pencil-alt text-warning action-icon" title="Editar" data-bs-toggle="modal" data-bs-target="#nominaEditModal" data-modal-type="manoObra" data-id="2" data-empleado="Ana Ruiz" data-cajas="1050" data-reempaques="15" data-descargas="120" data-descuentos="30" data-total="1370"></i>
                                        <i class="fas fa-trash-alt text-danger action-icon" title="Eliminar"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td><img src="https://ui-avatars.com/api/?name=Luis+Morales&background=28a745&color=FFFFFF" alt="Luis Morales" class="avatar"> Luis Morales</td>
                                    <td>980</td>
                                    <td>10</td>
                                    <td>90</td>
                                    <td>$20</td>
                                    <td>$1,210</td>
                                    <td>
                                        <i class="fas fa-eye text-primary action-icon" title="Ver Detalles"></i>
                                        <i class="fas fa-pencil-alt text-warning action-icon" title="Editar" data-bs-toggle="modal" data-bs-target="#nominaEditModal" data-modal-type="manoObra" data-id="3" data-empleado="Luis Morales" data-cajas="980" data-reempaques="10" data-descargas="90" data-descuentos="20" data-total="1210"></i>
                                        <i class="fas fa-trash-alt text-danger action-icon" title="Eliminar"></i>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- Contenido de Enhieladores --}}
                <div class="tab-pane fade" id="enhieladoresContent" role="tabpanel" aria-labelledby="enhieladores-tab">
                    <h4>Resumen Semanal de Enhieladores</h4>
                    <div class="row g-4 mb-4">
                        <div class="col-md-3">
                            <div class="card-summary">
                                <i class="fas fa-pallet icon"></i>
                                <div>
                                    <div class="title">Total Tarimas Trabajadas</div>
                                    <div class="value">250</div>
                                    <div class="description">Esta semana</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card-summary">
                                <i class="fas fa-redo-alt icon"></i>
                                <div>
                                    <div class="title">Total Rengeladas</div>
                                    <div class="value">45</div>
                                    <div class="description">Tarimas rengeladas</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card-summary">
                                <i class="fas fa-dollar-sign icon"></i>
                                <div>
                                    <div class="title">Costo Total Enhieladores</div>
                                    <div class="value">$5,800</div>
                                    <div class="description">Nómina pagada enhieladores</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card-summary">
                                <i class="fas fa-users icon"></i>
                                <div>
                                    <div class="title">Enhieladores Activos</div>
                                    <div class="value">4</div>
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
                                <tr>
                                    <td><img src="https://ui-avatars.com/api/?name=Carlos+Diaz&background=007bff&color=FFFFFF" alt="Carlos Díaz" class="avatar"> Carlos Díaz</td>
                                    <td>75</td>
                                    <td>15</td>
                                    <td>Acomodo: $50</td>
                                    <td>$20</td>
                                    <td>$1,880</td>
                                    <td>
                                        <i class="fas fa-eye text-primary action-icon" title="Ver Detalles"></i>
                                        <i class="fas fa-pencil-alt text-warning action-icon" title="Editar" data-bs-toggle="modal" data-bs-target="#nominaEditModal" data-modal-type="enhieladores" data-id="4" data-empleado="Carlos Díaz" data-tarimas="75" data-rengeladas="15" data-adicionales="50" data-descuentos="20" data-total="1880"></i>
                                        <i class="fas fa-trash-alt text-danger action-icon" title="Eliminar"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td><img src="https://ui-avatars.com/api/?name=Luisa+Gomez&background=007bff&color=FFFFFF" alt="Luisa Gómez" class="avatar"> Luisa Gómez</td>
                                    <td>60</td>
                                    <td>10</td>
                                    <td>Limpieza: $30</td>
                                    <td>$10</td>
                                    <td>$1,590</td>
                                    <td>
                                        <i class="fas fa-eye text-primary action-icon" title="Ver Detalles"></i>
                                        <i class="fas fa-pencil-alt text-warning action-icon" title="Editar" data-bs-toggle="modal" data-bs-target="#nominaEditModal" data-modal-type="enhieladores" data-id="5" data-empleado="Luisa Gómez" data-tarimas="60" data-rengeladas="10" data-adicionales="30" data-descuentos="10" data-total="1590"></i>
                                        <i class="fas fa-trash-alt text-danger action-icon" title="Eliminar"></i>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- Contenido de Encargados --}}
                <div class="tab-pane fade" id="encargadosContent" role="tabpanel" aria-labelledby="encargados-tab">
                    <h4>Resumen Semanal de Encargados</h4>
                    <div class="row g-4 mb-4">
                        <div class="col-md-3">
                            <div class="card-summary">
                                <i class="fas fa-thermometer-half icon"></i>
                                <div>
                                    <div class="title">Total Termos Supervisados</div>
                                    <div class="value">120</div>
                                    <div class="description">Esta semana</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card-summary">
                                <i class="fas fa-clipboard-check icon"></i>
                                <div>
                                    <div class="title">Reportes Generados</div>
                                    <div class="value">25</div>
                                    <div class="description">Informes diarios</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card-summary">
                                <i class="fas fa-dollar-sign icon"></i>
                                <div>
                                    <div class="title">Costo Total Encargados</div>
                                    <div class="value">$7,200</div>
                                    <div class="description">Nómina pagada encargados</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card-summary">
                                <i class="fas fa-users icon"></i>
                                <div>
                                    <div class="title">Encargados Activos</div>
                                    <div class="value">3</div>
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
                                <tr>
                                    <td><img src="https://ui-avatars.com/api/?name=Ana+Torres&background=ffc107&color=FFFFFF" alt="Ana Torres" class="avatar"> Ana Torres</td>
                                    <td>45</td>
                                    <td>Capacitación: $100</td>
                                    <td>$15</td>
                                    <td>$2,585</td>
                                    <td>
                                        <i class="fas fa-eye text-primary action-icon" title="Ver Detalles"></i>
                                        <i class="fas fa-pencil-alt text-warning action-icon" title="Editar" data-bs-toggle="modal" data-bs-target="#nominaEditModal" data-modal-type="encargados" data-id="6" data-empleado="Ana Torres" data-termos="45" data-adicionales="100" data-descuentos="15" data-total="2585"></i>
                                        <i class="fas fa-trash-alt text-danger action-icon" title="Eliminar"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td><img src="https://ui-avatars.com/api/?name=Miguel+Rivas&background=ffc107&color=FFFFFF" alt="Miguel Rivas" class="avatar"> Miguel Rivas</td>
                                    <td>38</td>
                                    <td>Reportes: $70</td>
                                    <td>$20</td>
                                    <td>$2,150</td>
                                    <td>
                                        <i class="fas fa-eye text-primary action-icon" title="Ver Detalles"></i>
                                        <i class="fas fa-pencil-alt text-warning action-icon" title="Editar" data-bs-toggle="modal" data-bs-target="#nominaEditModal" data-modal-type="encargados" data-id="7" data-empleado="Miguel Rivas" data-termos="38" data-adicionales="70" data-descuentos="20" data-total="2150"></i>
                                        <i class="fas fa-trash-alt text-danger action-icon" title="Eliminar"></i>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- Contenido de Empleados (NEW) --}}
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
                                    <th>ID Empleado</th>
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
                                <tr>
                                    <td><img src="https://ui-avatars.com/api/?name=Juan+Ramirez&background=007bff&color=FFFFFF" alt="Juan Ramirez" class="rounded-circle" style="width: 40px; height: 40px;"></td>
                                    <td>EMP001</td>
                                    <td>Juan Ramirez</td>
                                    <td>Supervisor de campo</td>
                                    <td>55 1234 5678</td>
                                    <td>juan.ramirez@example.com</td>
                                    <td>2020-01-15</td>
                                    <td>$8,000.00</td>
                                    <td>
                                        <i class="fas fa-eye text-primary action-icon" title="Ver Detalles"></i>
                                        <i class="fas fa-pencil-alt text-warning action-icon" title="Editar" data-bs-toggle="modal" data-bs-target="#empleadoModal"
                                            data-modal-type="edit" data-id="EMP001" data-nombre="Juan Ramirez" data-puesto="Supervisor de campo" data-telefono="55 1234 5678" data-email="juan.ramirez@example.com" data-fecha-contratacion="2020-01-15" data-salario="8000"></i>
                                        <i class="fas fa-trash-alt text-danger action-icon" title="Eliminar"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td><img src="https://ui-avatars.com/api/?name=Ana+Torres&background=007bff&color=FFFFFF" alt="Ana Torres" class="rounded-circle" style="width: 40px; height: 40px;"></td>
                                    <td>EMP002</td>
                                    <td>Ana Torres</td>
                                    <td>Administración</td>
                                    <td>55 8765 4321</td>
                                    <td>ana.torres@example.com</td>
                                    <td>2019-05-20</td>
                                    <td>$9,500.00</td>
                                    <td>
                                        <i class="fas fa-eye text-primary action-icon" title="Ver Detalles"></i>
                                        <i class="fas fa-pencil-alt text-warning action-icon" title="Editar" data-bs-toggle="modal" data-bs-target="#empleadoModal"
                                            data-modal-type="edit" data-id="EMP002" data-nombre="Ana Torres" data-puesto="Administración" data-telefono="55 8765 4321" data-email="ana.torres@example.com" data-fecha-contratacion="2019-05-20" data-salario="9500"></i>
                                        <i class="fas fa-trash-alt text-danger action-icon" title="Eliminar"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td><img src="https://ui-avatars.com/api/?name=Carlos+Mendez&background=007bff&color=FFFFFF" alt="Carlos Méndez" class="rounded-circle" style="width: 40px; height: 40px;"></td>
                                    <td>EMP003</td>
                                    <td>Carlos Méndez</td>
                                    <td>Operador de maquinaria</td>
                                    <td>55 1122 3344</td>
                                    <td>carlos.mendez@example.com</td>
                                    <td>2021-11-01</td>
                                    <td>$7,000.00</td>
                                    <td>
                                        <i class="fas fa-eye text-primary action-icon" title="Ver Detalles"></i>
                                        <i class="fas fa-pencil-alt text-warning action-icon" title="Editar" data-bs-toggle="modal" data-bs-target="#empleadoModal"
                                            data-modal-type="edit" data-id="EMP003" data-nombre="Carlos Méndez" data-puesto="Operador de maquinaria" data-telefono="55 1122 3344" data-email="carlos.mendez@example.com" data-fecha-contratacion="2021-11-01" data-salario="7000"></i>
                                        <i class="fas fa-trash-alt text-danger action-icon" title="Eliminar"></i>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- Contenido de Resumen de Producción (Activo por defecto) --}}
                <div class="tab-pane fade show active" id="resumenContent" role="tabpanel" aria-labelledby="resumen-tab">
                    <h4 class="mb-3">Resumen General de Producción Semanal (Semana 24 - 2025)</h4>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card-summary sales-summary">
                                <i class="fas fa-box-open icon"></i>
                                <div>
                                    <div class="title">Total Cajas Empacadas</div>
                                    <div class="value">5,800</div>
                                    <div class="description">Producción total de empacadores.</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card-summary cost-summary">
                                <i class="fas fa-sync-alt icon"></i>
                                <div>
                                    <div class="title">Total Reempaques</div>
                                    <div class="value">150</div>
                                    <div class="description">Cajas que requirieron reempaque.</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card-summary profit-summary">
                                <i class="fas fa-thermometer-three-quarters icon"></i>
                                <div>
                                    <div class="title">Total Termos Realizados</div>
                                    <div class="value">120</div>
                                    <div class="description">Lotes de frío supervisados.</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h4 class="mt-4">Resumen Financiero de Nómina (Semana 24)</h4>
                    <div class="details-section">
                        <div class="details-item">
                            <i class="fas fa-coins icon"></i>
                            <div class="col-concept">Total Nómina Mano de Obra</div>
                            <div class="col-amount text-right">$18,500</div>
                        </div>
                        <div class="details-item">
                            <i class="fas fa-coins icon"></i>
                            <div class="col-concept">Total Nómina Enhieladores</div>
                            <div class="col-amount text-right">$5,800</div>
                        </div>
                        <div class="details-item">
                            <i class="fas fa-coins icon"></i>
                            <div class="col-concept">Total Nómina Encargados</div>
                            <div class="col-amount text-right">$7,200</div>
                        </div>
                        <div class="details-item">
                            <i class="fas fa-hand-holding-usd icon"></i>
                            <div class="col-concept">Total Descuentos Aplicados</div>
                            <div class="col-amount text-right text-danger">-$115</div>
                        </div>
                        <div class="details-item">
                            <i class="fas fa-money-bill-wave icon"></i>
                            <div class="col-concept fw-bold">Total General de Nómina a Pagar</div>
                            <div class="col-amount text-right fw-bold text-success">$31,385</div>
                        </div>
                    </div>

                    <h4 class="mt-4">Detección de Diferencias (Análisis Rápido)</h4>
                    <div class="details-section">
                        <div class="details-item">
                            <i class="fas fa-balance-scale icon"></i>
                            <div class="col-concept">Cajas Empacadas vs. Cajas en Almacén</div>
                            <div class="col-amount text-right text-success">0 Diferencia</div>
                        </div>
                        <div class="details-item">
                            <i class="fas fa-exclamation-triangle icon"></i>
                            <div class="col-concept">Efectivo Reportado vs. Nómina General</div>
                            <div class="col-amount text-right text-danger">-$250 (Faltante)</div>
                        </div>
                        <div class="details-item">
                            <i class="fas fa-file-invoice-dollar icon"></i>
                            <div class="col-concept">Nómina Estimada vs. Nómina Real</div>
                            <div class="col-amount text-right text-info">Ajuste de $50</div>
                        </div>
                    </div>
                </div>

                {{-- Contenido de Generación de Sobres de Pago --}}
                <div class="tab-pane fade" id="sobresPagoContent" role="tabpanel" aria-labelledby="sobres-pago-tab">
                    <h4>Generación de Sobres de Pago</h4>
                    <p>Aquí puedes generar los sobres de pago para todos los empleados de la semana actual.</p>
                    <button class="btn btn-primary"><i class="fas fa-print me-2"></i>Generar Sobres de Pago</button>

                    <div class="mt-4">
                        <h5>Historial de Sobres Generados</h5>
                        <ul class="list-group">
                            <li class="list-group-item">Sobre de Pago Semana 23 (2025) - <a href="#" class="text-success">Descargar PDF</a></li>
                            <li class="list-group-item">Sobre de Pago Semana 22 (2025) - <a href="#" class="text-success">Descargar PDF</a></li>
                        </ul>
                    </div>
                </div>

            </div> {{-- Fin tab-content --}}
        </div> {{-- Fin section-card --}}
    </div> {{-- Fin resultados-container --}}
</div> {{-- Fin container-fluid --}}

<div class="modal fade" id="nominaEditModal" tabindex="-1" aria-labelledby="nominaEditModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="nominaEditModalLabel">Registrar Actividad</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="nominaActivityForm">
                    <input type="hidden" id="modalActivityType" name="modalActivityType">
                    <input type="hidden" id="activityId" name="activityId">
                    <div class="mb-3">
                        <label for="empleadoSelect" class="form-label">Empleado</label>
                        <select class="form-select" id="empleadoSelect" name="empleadoSelect" required>
                            <option value="">Seleccione un empleado...</option>
                            </select>
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
                        <input type="text" class="form-control" id="totalPagar" name="totalPagar" readonly>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success" form="nominaActivityForm">Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="empleadoModal" tabindex="-1" aria-labelledby="empleadoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="empleadoModalLabel">Registrar Nuevo Empleado</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="empleadoForm">
                    <input type="hidden" id="empleadoId" name="empleadoId">
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
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success" form="empleadoForm">Guardar Empleado</button>
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
            var empleadoSelect = nominaEditModal.querySelector('#empleadoSelect');
            var manoObraFields = document.getElementById('manoObraFields');
            var enhieladoresFields = document.getElementById('enhieladoresFields');
            var encargadosFields = document.getElementById('encargadosFields');
            var activityIdInput = document.getElementById('activityId');
            var modalActivityTypeInput = document.getElementById('modalActivityType');

            // Reset form and hide all specific fields
            document.getElementById('nominaActivityForm').reset();
            manoObraFields.style.display = 'none';
            enhieladoresFields.style.display = 'none';
            encargadosFields.style.display = 'none';
            empleadoSelect.innerHTML = '<option value="">Seleccione un empleado...</option>'; // Clear previous options

            modalActivityTypeInput.value = modalType;

            if (modalType === 'manoObra') {
                modalTitle.textContent = 'Registrar Actividad de Empacador';
                manoObraFields.style.display = 'block';
                // Populate employee select for Empacadores (example data)
                empleadoSelect.innerHTML += `
                    <option value="Juan Pérez">Juan Pérez</option>
                    <option value="Ana Ruiz">Ana Ruiz</option>
                    <option value="Luis Morales">Luis Morales</option>
                `;

                // If editing, populate fields
                if (button.hasAttribute('data-id')) {
                    modalTitle.textContent = 'Editar Actividad de Empacador';
                    activityIdInput.value = button.getAttribute('data-id');
                    empleadoSelect.value = button.getAttribute('data-empleado');
                    document.getElementById('cajasSemanal').value = button.getAttribute('data-cajas');
                    document.getElementById('reempaques').value = button.getAttribute('data-reempaques');
                    document.getElementById('descargas').value = button.getAttribute('data-descargas');
                    document.getElementById('descuentos').value = button.getAttribute('data-descuentos');
                    document.getElementById('totalPagar').value = '$' + button.getAttribute('data-total');
                }

            } else if (modalType === 'enhieladores') {
                modalTitle.textContent = 'Registrar Actividad de Enhielador';
                enhieladoresFields.style.display = 'block';
                // Populate employee select for Enhieladores (example data)
                empleadoSelect.innerHTML += `
                    <option value="Carlos Díaz">Carlos Díaz</option>
                    <option value="Luisa Gómez">Luisa Gómez</option>
                `;

                if (button.hasAttribute('data-id')) {
                    modalTitle.textContent = 'Editar Actividad de Enhielador';
                    activityIdInput.value = button.getAttribute('data-id');
                    empleadoSelect.value = button.getAttribute('data-empleado');
                    document.getElementById('tarimasTrabajadas').value = button.getAttribute('data-tarimas');
                    document.getElementById('rengeladas').value = button.getAttribute('data-rengeladas');
                    document.getElementById('actividadesAdicionalesEnhieladores').value = button.getAttribute('data-adicionales');
                    document.getElementById('descuentos').value = button.getAttribute('data-descuentos');
                    document.getElementById('totalPagar').value = '$' + button.getAttribute('data-total');
                }

            } else if (modalType === 'encargados') {
                modalTitle.textContent = 'Registrar Actividad de Encargado';
                encargadosFields.style.display = 'block';
                // Populate employee select for Encargados (example data)
                empleadoSelect.innerHTML += `
                    <option value="Ana Torres">Ana Torres</option>
                    <option value="Miguel Rivas">Miguel Rivas</option>
                `;

                if (button.hasAttribute('data-id')) {
                    modalTitle.textContent = 'Editar Actividad de Encargado';
                    activityIdInput.value = button.getAttribute('data-id');
                    empleadoSelect.value = button.getAttribute('data-empleado');
                    document.getElementById('termosRealizados').value = button.getAttribute('data-termos');
                    document.getElementById('actividadesAdicionalesEncargados').value = button.getAttribute('data-adicionales');
                    document.getElementById('descuentos').value = button.getAttribute('data-descuentos');
                    document.getElementById('totalPagar').value = '$' + button.getAttribute('data-total');
                }
            }
        });

        // Handle Empleado Modal (Add/Edit Employee)
        var empleadoModal = document.getElementById('empleadoModal');
        empleadoModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var modalType = button.getAttribute('data-modal-type');
            var modalTitle = empleadoModal.querySelector('.modal-title');
            var empleadoForm = document.getElementById('empleadoForm');

            // Clear form fields
            empleadoForm.reset();

            if (modalType === 'add') {
                modalTitle.textContent = 'Registrar Nuevo Empleado';
                document.getElementById('empleadoId').value = ''; // Clear ID for new employee
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

        // Activate the "Resumen de Producción" tab by default
        var resumenTab = document.getElementById('resumen-tab');
        var resumenContent = document.getElementById('resumenContent');
        if (resumenTab && resumenContent) {
            var bsTab = new bootstrap.Tab(resumenTab);
            bsTab.show();
        }
    });
</script>
</body>
</html>