<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VEGGREEN - Nómina Operativa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        /* Variables CSS */
        :root {
            --primary-green: #28a745; /* Un verde más intenso */
            --text-dark: #343a40;
            --light-green-bg: #f0fff0;
        }

        /* Estilos generales */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--light-green-bg);
            color: var(--text-dark);
        }
        .container-fluid {
            padding: 30px;
        }
        h3 {
            font-weight: bold;
            color: var(--primary-green);
        }
        h4 {
            color: var(--text-dark);
            margin-bottom: 20px;
        }

        /* Contenedor principal de la sección */
        .section-card {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,.05);
            margin-bottom: 20px;
        }

        /* Estilos para las pestañas de Bootstrap */
        .nav-tabs .nav-link {
            color: var(--text-dark);
            border: none;
            border-bottom: 2px solid transparent;
            padding: 0.75rem 1.25rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        .nav-tabs .nav-link:hover {
            border-color: #eee;
        }
        .nav-tabs .nav-link.active {
            color: var(--primary-green);
            border-color: var(--primary-green);
            background-color: transparent;
            font-weight: 600;
        }
        .tab-content {
            padding-top: 1.5rem;
        }

        /* Estilos de las tarjetas de resumen */
        .card-summary {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,.05);
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            height: 100%; /* Asegura que las tarjetas tengan la misma altura */
        }
        .card-summary .icon {
            font-size: 2.5em;
            margin-right: 15px;
            color: var(--primary-green); /* Default green */
        }
        .card-summary .title {
            font-size: 0.9em;
            color: #6c757d;
            margin-bottom: 5px;
        }
        .card-summary .value {
            font-size: 1.5em;
            font-weight: bold;
            color: var(--text-dark);
        }
        .card-summary .description {
            font-size: 0.8em;
            color: #6c757d;
        }
        /* Colores de iconos específicos para las tarjetas (ejemplo de nómina) */
        .card-summary.sales-summary .icon { color: #28a745; } /* Green for Total Nómina Pagada */
        .card-summary.cost-summary .icon { color: #dc3545; } /* Red for Total Descuentos */
        .card-summary.profit-summary .icon { color: #007bff; } /* Blue for Neto a Pagar */
        .card-summary.profit-before-tax .icon { color: #ffc107; } /* Yellow for Costo Total de Nómina */

        /* Estilos para la sección de detalles (Desglose de Gastos de Nómina) */
        .details-section {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,.05);
            margin-bottom: 20px;
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
            font-size: 1.2em;
            margin-right: 15px;
            color: #6c757d;
            width: 25px;
            text-align: center;
        }
        .details-item .col-concept {
            flex: 1.5;
            padding: 0 5px;
            font-size: 0.95em;
            color: var(--text-dark);
        }
        .details-item .col-amount {
            flex: 1;
            text-align: right;
            font-weight: bold;
            color: var(--text-dark);
        }
        .text-success { color: var(--primary-green) !important; }
        .text-danger { color: #dc3545 !important; }

        /* Estilos para la tabla (general) */
        .table-responsive {
            border-radius: 8px;
            overflow-x: auto;
            border: 1px solid #e0e0e0;
        }
        .table {
            margin-bottom: 0;
        }
        .table thead th {
            background-color: var(--primary-green);
            color: #fff;
            border-bottom: none;
            padding: 1rem 1.25rem;
            font-weight: 600;
        }
        .table tbody td {
            vertical-align: middle;
            padding: 0.75rem 1.25rem;
            color: var(--text-dark);
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f9f9f9;
        }
        .table-hover tbody tr:hover {
            background-color: #f0f0f0;
        }
        .avatar {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            object-fit: cover;
            vertical-align: middle;
            margin-right: 8px;
        }
        .action-icon {
            cursor: pointer;
            margin: 0 5px;
            font-size: 1.1em;
            transition: color 0.2s ease;
        }
        .action-icon:hover {
            opacity: 0.7;
        }
        /* Estilos para los botones "Agregar" en las tablas */
        .btn-add-table {
            background-color: var(--primary-green);
            color: #fff;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            font-size: 0.9em;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }
        .btn-add-table:hover {
            background-color: #218838; /* Un verde un poco más oscuro al pasar el ratón */
            color: #fff;
        }

        /* Estilos específicos para modales (opcional, si quieres un aspecto particular) */
        .modal-header {
            background-color: var(--primary-green);
            color: #fff;
            border-bottom: none;
        }
        .modal-header .btn-close {
            filter: invert(1); /* Hace que la X del botón de cierre sea blanca */
        }
        .modal-footer .btn-primary {
            background-color: var(--primary-green);
            border-color: var(--primary-green);
        }
        .modal-footer .btn-primary:hover {
            background-color: #218838;
            border-color: #218838;
        }
    </style>
</head>
<body>

<div class="container-fluid mt-5">
    <div class="resultados-container">
        <h3 class="fw-bold text-success mb-4"></h3>

        <div class="section-card">
            <ul class="nav nav-tabs mb-4 nomina-tabs" id="nominaSubTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="mano-obra-tab" data-bs-toggle="tab" data-bs-target="#manoObraContent" type="button" role="tab" aria-controls="manoObraContent" aria-selected="false">
                        Mano de Obra (Empacadores)
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
                                    <td><img src="https://via.placeholder.com/30/28a745/FFFFFF?text=JP" alt="Juan Pérez" class="avatar"> Juan Pérez</td>
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
                                    <td><img src="https://via.placeholder.com/30/28a745/FFFFFF?text=AR" alt="Ana Ruiz" class="avatar"> Ana Ruiz</td>
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
                                    <td><img src="https://via.placeholder.com/30/28a745/FFFFFF?text=LM" alt="Luis Morales" class="avatar"> Luis Morales</td>
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
                                    <td><img src="https://via.placeholder.com/30/007bff/FFFFFF?text=CD" alt="Carlos Díaz" class="avatar"> Carlos Díaz</td>
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
                                    <td><img src="https://via.placeholder.com/30/007bff/FFFFFF?text=LG" alt="Luisa Gómez" class="avatar"> Luisa Gómez</td>
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
                                    <td><img src="https://via.placeholder.com/30/ffc107/FFFFFF?text=AT" alt="Ana Torres" class="avatar"> Ana Torres</td>
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
                                    <td><img src="https://via.placeholder.com/30/ffc107/FFFFFF?text=MR" alt="Miguel Rivas" class="avatar"> Miguel Rivas</td>
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
                            <div class="col-concept">Reempaques por Nota (Promedio)</div>
                            <div class="col-amount text-right">1.2 (Normal)</div>
                        </div>
                    </div>
                </div>

                {{-- Contenido de Generación de Sobres de Pago --}}
                <div class="tab-pane fade" id="sobresPagoContent" role="tabpanel" aria-labelledby="sobres-pago-tab">
                    <h4>Generación y Vista Previa de Sobres de Pago</h4>
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label for="selectSemana" class="form-label">Seleccionar Semana/Periodo</label>
                            <select class="form-select" id="selectSemana">
                                <option selected>Semana 24 / Junio / 2025</option>
                                <option>Semana 23 / Junio / 2025</option>
                                <option>Semana 22 / Mayo / 2025</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="selectEmpleado" class="form-label">Seleccionar Empleado</label>
                            <select class="form-select" id="selectEmpleado">
                                <option selected>Todos los Empleados</option>
                                <option>Juan Pérez (Empacador)</option>
                                <option>Carlos Díaz (Enhielador)</option>
                                <option>Ana Torres (Encargado)</option>
                                <option>Ana Ruiz (Empacador)</option>
                            </select>
                        </div>
                        <div class="col-md-4 d-flex align-items-end">
                            <button class="btn btn-primary me-2"><i class="fas fa-search me-2"></i>Cargar Sobres</button>
                            <button class="btn btn-success"><i class="fas fa-print me-2"></i>Imprimir Todos</button>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-12">
                            <h5>Vista Previa del Sobre de Pago</h5>
                            <div class="section-card p-4">
                                <h6>Sobre de Pago #00123</h6>
                                <p><strong>Periodo:</strong> Semana 24 / Junio / 2025</p>
                                <p><strong>Fecha de Emisión:</strong> 01 de Julio de 2025</p>
                                <hr>
                                <p><strong>Nombre del Empleado:</strong> Juan Pérez</p>
                                <p><strong>Puesto:</strong> Empacador</p>
                                <hr>
                                <h6>Detalle de Percepciones:</h6>
                                <ul>
                                    <li>Cajas Empacadas (1200 @ $1.20/caja): <strong>$1,440.00</strong></li>
                                    <li>Reempaques (20 @ $0.50/reemp): <strong>$10.00</strong></li>
                                    <li>Descargas (150 @ $0.30/ud): <strong>$45.00</strong></li>
                                    <li>**Subtotal Percepciones:** <strong>$1,495.00</strong></li>
                                </ul>
                                <h6>Detalle de Descuentos:</h6>
                                <ul>
                                    <li>Préstamo de caja: <strong>-$50.00</strong></li>
                                    <li>**Total Descuentos:** <strong>-$50.00</strong></li>
                                </ul>
                                <hr>
                                <h5 class="text-success">Total Neto a Pagar: <strong>$1,445.00</strong></h5>
                                <p class="text-muted text-end">¡Gracias por tu trabajo!</p>
                            </div>
                            <div class="text-end mt-3">
                                <button class="btn btn-outline-success"><i class="fas fa-download me-2"></i>Descargar PDF</button>
                                <button class="btn btn-outline-primary"><i class="fas fa-envelope me-2"></i>Enviar por Correo</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div> {{-- Fin tab-content --}}
        </div> {{-- Fin section-card --}}
    </div> {{-- Fin resultados-container --}}
</div> {{-- Fin container-fluid --}}

<div class="modal fade" id="nominaEditModal" tabindex="-1" aria-labelledby="nominaEditModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="nominaEditModalLabel">Editar Registro de Nómina</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editNominaForm">
                    <input type="hidden" id="modalEmpleadoId">
                    <input type="hidden" id="modalType">
                    <div class="mb-3">
                        <label for="modalEmpleadoNombre" class="form-label">Nombre del Empleado</label>
                        <input type="text" class="form-control" id="modalEmpleadoNombre" readonly>
                    </div>

                    {{-- Campos específicos para Empacadores --}}
                    <div id="fieldsManoObra" style="display: none;">
                        <div class="mb-3">
                            <label for="modalCajas" class="form-label">Cajas Empacadas</label>
                            <input type="number" class="form-control" id="modalCajas">
                        </div>
                        <div class="mb-3">
                            <label for="modalReempaques" class="form-label">Reempaques</label>
                            <input type="number" class="form-control" id="modalReempaques">
                        </div>
                        <div class="mb-3">
                            <label for="modalDescargas" class="form-label">Descargas (unidades)</label>
                            <input type="number" class="form-control" id="modalDescargas">
                        </div>
                    </div>

                    {{-- Campos específicos para Enhieladores --}}
                    <div id="fieldsEnhieladores" style="display: none;">
                        <div class="mb-3">
                            <label for="modalTarimas" class="form-label">Tarimas Trabajadas</label>
                            <input type="number" class="form-control" id="modalTarimas">
                        </div>
                        <div class="mb-3">
                            <label for="modalRengeladas" class="form-label">Rengeladas</label>
                            <input type="number" class="form-control" id="modalRengeladas">
                        </div>
                    </div>

                    {{-- Campos específicos para Encargados --}}
                    <div id="fieldsEncargados" style="display: none;">
                        <div class="mb-3">
                            <label for="modalTermos" class="form-label">Termos Realizados</label>
                            <input type="number" class="form-control" id="modalTermos">
                        </div>
                    </div>

                    {{-- Campos comunes --}}
                    <div class="mb-3">
                        <label for="modalActividadesAdicionales" class="form-label">Actividades Adicionales (Descripción y Monto)</label>
                        <textarea class="form-control" id="modalActividadesAdicionales" rows="2" placeholder="Ej: Bonificación por turno extra: $50"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="modalDescuentos" class="form-label">Descuentos Aplicados</label>
                        <input type="number" class="form-control" id="modalDescuentos">
                    </div>
                    <div class="mb-3">
                        <label for="modalTotalPagar" class="form-label">Total a Pagar (Calculado)</label>
                        <input type="text" class="form-control" id="modalTotalPagar" readonly>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="guardarCambiosBtn">Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const nominaEditModal = document.getElementById('nominaEditModal');
        nominaEditModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget; // Botón que activó el modal
            const modalType = button.getAttribute('data-modal-type');
            const modalTitle = nominaEditModal.querySelector('.modal-title');
            const modalEmpleadoNombre = nominaEditModal.querySelector('#modalEmpleadoNombre');
            const modalEmpleadoId = nominaEditModal.querySelector('#modalEmpleadoId');
            const modalTypeInput = nominaEditModal.querySelector('#modalType');

            // Ocultar todos los campos específicos primero
            document.getElementById('fieldsManoObra').style.display = 'none';
            document.getElementById('fieldsEnhieladores').style.display = 'none';
            document.getElementById('fieldsEncargados').style.display = 'none';

            // Resetear campos comunes para evitar datos residuales de otro tipo de nómina
            nominaEditModal.querySelector('#modalActividadesAdicionales').value = '';
            nominaEditModal.querySelector('#modalDescuentos').value = '';
            nominaEditModal.querySelector('#modalTotalPagar').value = '';

            modalTypeInput.value = modalType; // Guardar el tipo de modal

            if (modalType === 'manoObra') {
                modalTitle.textContent = 'Editar Nómina Empacador';
                document.getElementById('fieldsManoObra').style.display = 'block';

                modalEmpleadoNombre.value = button.getAttribute('data-empleado') || '';
                modalEmpleadoId.value = button.getAttribute('data-id') || '';
                nominaEditModal.querySelector('#modalCajas').value = button.getAttribute('data-cajas') || '';
                nominaEditModal.querySelector('#modalReempaques').value = button.getAttribute('data-reempaques') || '';
                nominaEditModal.querySelector('#modalDescargas').value = button.getAttribute('data-descargas') || '';
                nominaEditModal.querySelector('#modalDescuentos').value = button.getAttribute('data-descuentos') || '';
                nominaEditModal.querySelector('#modalTotalPagar').value = button.getAttribute('data-total') ? `$${parseFloat(button.getAttribute('data-total')).toFixed(2)}` : '';

            } else if (modalType === 'enhieladores') {
                modalTitle.textContent = 'Editar Nómina Enhielador';
                document.getElementById('fieldsEnhieladores').style.display = 'block';

                modalEmpleadoNombre.value = button.getAttribute('data-empleado') || '';
                modalEmpleadoId.value = button.getAttribute('data-id') || '';
                nominaEditModal.querySelector('#modalTarimas').value = button.getAttribute('data-tarimas') || '';
                nominaEditModal.querySelector('#modalRengeladas').value = button.getAttribute('data-rengeladas') || '';
                nominaEditModal.querySelector('#modalActividadesAdicionales').value = button.getAttribute('data-adicionales') ? `Actividad: $${parseFloat(button.getAttribute('data-adicionales')).toFixed(2)}` : '';
                nominaEditModal.querySelector('#modalDescuentos').value = button.getAttribute('data-descuentos') || '';
                nominaEditModal.querySelector('#modalTotalPagar').value = button.getAttribute('data-total') ? `$${parseFloat(button.getAttribute('data-total')).toFixed(2)}` : '';

            } else if (modalType === 'encargados') {
                modalTitle.textContent = 'Editar Nómina Encargado';
                document.getElementById('fieldsEncargados').style.display = 'block';

                modalEmpleadoNombre.value = button.getAttribute('data-empleado') || '';
                modalEmpleadoId.value = button.getAttribute('data-id') || '';
                nominaEditModal.querySelector('#modalTermos').value = button.getAttribute('data-termos') || '';
                nominaEditModal.querySelector('#modalActividadesAdicionales').value = button.getAttribute('data-adicionales') ? `Actividad: $${parseFloat(button.getAttribute('data-adicionales')).toFixed(2)}` : '';
                nominaEditModal.querySelector('#modalDescuentos').value = button.getAttribute('data-descuentos') || '';
                nominaEditModal.querySelector('#modalTotalPagar').value = button.getAttribute('data-total') ? `$${parseFloat(button.getAttribute('data-total')).toFixed(2)}` : '';
            }
        });

        // Ejemplo de lógica para el botón Guardar Cambios (aquí harías tu lógica de backend)
        document.getElementById('guardarCambiosBtn').addEventListener('click', function() {
            const modalType = document.getElementById('modalType').value;
            const empleadoId = document.getElementById('modalEmpleadoId').value;
            const empleadoNombre = document.getElementById('modalEmpleadoNombre').value;

            let data = {
                id: empleadoId,
                empleado: empleadoNombre,
                type: modalType
            };

            if (modalType === 'manoObra') {
                data.cajas = document.getElementById('modalCajas').value;
                data.reempaques = document.getElementById('modalReempaques').value;
                data.descargas = document.getElementById('modalDescargas').value;
            } else if (modalType === 'enhieladores') {
                data.tarimas = document.getElementById('modalTarimas').value;
                data.rengeladas = document.getElementById('modalRengeladas').value;
            } else if (modalType === 'encargados') {
                data.termos = document.getElementById('modalTermos').value;
            }

            data.actividadesAdicionales = document.getElementById('modalActividadesAdicionales').value;
            data.descuentos = document.getElementById('modalDescuentos').value;
            data.totalPagar = document.getElementById('modalTotalPagar').value; // Esto usualmente se recalcularía en el backend

            console.log('Datos a guardar:', data);
            alert(`Guardando cambios para ${empleadoNombre} (${modalType})... Checa la consola para los datos.`);
            // Aquí iría tu llamada AJAX o fetch para enviar los datos al servidor
            const modal = bootstrap.Modal.getInstance(nominaEditModal);
            modal.hide();
        });
    });
</script>

</body>
</html>