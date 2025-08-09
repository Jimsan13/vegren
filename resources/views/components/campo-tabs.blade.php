<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gastos y Movimientos</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    @section('styles')
<link rel="stylesheet" href="{{ asset('css/campo.css') }}">
@endsection
</head>
<body>

<div class="container-fluid">

    <ul class="nav nav-tabs mb-4 gastos-tabs" id="gastosMovimientosTabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link" id="planta-tab" data-toggle="tab" href="#planta" role="tab" aria-controls="planta" aria-selected="false">
                Planta
            </a>
        </li>
      
        <li class="nav-item">
            <a class="nav-link active" id="insumos-tab" data-toggle="tab" href="#insumos" role="tab" aria-controls="insumos" aria-selected="true">
                Insumos
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="gastosextras-tab" data-toggle="tab" href="#gastosextras" role="tab" aria-controls="gastosextras" aria-selected="false">
                Gastos extras
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="campo-tab" data-toggle="tab" href="#campo" role="tab" aria-controls="campo" aria-selected="false">
                Campo
            </a>
        </li>
    </ul>

    <div class="tab-content" id="gastosMovimientosTabsContent">
        <div class="tab-pane fade" id="planta" role="tabpanel" aria-labelledby="planta-tab">
            <h4>Resumen de Planta</h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="card-summary">
                        <i class="fas fa-dollar-sign icon"></i>
                        <div>
                            <div class="title">Total Gastos</div>
                            <div class="value">$120,000</div>
                            <div class="description">Gastos acumulados en planta este mes</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-summary">
                        <i class="fas fa-chart-line icon movement"></i>
                        <div>
                            <div class="title">Movimientos</div>
                            <div class="value">34</div>
                            <div class="description">Movimientos registrados en planta</div>
                        </div>
                    </div>
                </div>
            </div>
            <h4>Detalle de Movimientos</h4>
            <div class="details-section" id="planta-details-section">
                <div class="details-item" data-id="p1" data-fecha="2024-06-05" data-descripcion="Fertilizante" data-monto="8000" data-tipo="Compra" data-categoria="planta">
                    <i class="fas fa-seedling icon"></i>
                    <div class="info description">Fertilizante</div>
                    <div class="info col-date">05/06/2024</div>
                    <div class="info col-amount">$8,000</div>
                    <div class="info col-type">Compra</div>
                    <div class="actions">
                        <button class="btn btn-sm btn-info edit-item-btn" data-toggle="modal" data-target="#movimientoEditModal" data-modal-type="edit"><i class="fas fa-pencil-alt"></i></button>
                        <button class="btn btn-sm btn-danger delete-item-btn"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </div>
                <div class="details-item" data-id="p2" data-fecha="2024-06-03" data-descripcion="Riego" data-monto="2500" data-tipo="Servicio" data-categoria="planta">
                    <i class="fas fa-tint icon"></i>
                    <div class="info description">Riego</div>
                    <div class="info col-date">03/06/2024</div>
                    <div class="info col-amount">$2,500</div>
                    <div class="info col-type">Servicio</div>
                    <div class="actions">
                        <button class="btn btn-sm btn-info edit-item-btn" data-toggle="modal" data-target="#movimientoEditModal" data-modal-type="edit"><i class="fas fa-pencil-alt"></i></button>
                        <button class="btn btn-sm btn-danger delete-item-btn"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </div>
                <div class="details-item" data-id="p3" data-fecha="2024-06-01" data-descripcion="Poda" data-monto="1200" data-tipo="Mano de obra" data-categoria="planta">
                    <i class="fas fa-cut icon"></i>
                    <div class="info description">Poda</div>
                    <div class="info col-date">01/06/2024</div>
                    <div class="info col-amount">$1,200</div>
                    <div class="info col-type">Mano de obra</div>
                    <div class="actions">
                        <button class="btn btn-sm btn-info edit-item-btn" data-toggle="modal" data-target="#movimientoEditModal" data-modal-type="edit"><i class="fas fa-pencil-alt"></i></button>
                        <button class="btn btn-sm btn-danger delete-item-btn"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </div>
            </div>
            <button class="btn-add" data-toggle="modal" data-target="#movimientoEditModal" data-modal-type="add" data-categoria="planta">Agregar</button>
        </div>

        <div class="tab-pane fade" id="nomina" role="tabpanel" aria-labelledby="nomina-tab">
            <h4>Resumen de Nómina</h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="card-summary">
                        <i class="fas fa-money-bill-alt icon"></i>
                        <div>
                            <div class="title">Total Nómina</div>
                            <div class="value">$45,000</div>
                            <div class="description">Pagos acumulados este mes</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-summary">
                        <i class="fas fa-users icon employees"></i>
                        <div>
                            <div class="title">Empleados</div>
                            <div class="value">12</div>
                            <div class="description">Empleados activos en nómina</div>
                        </div>
                    </div>
                </div>
            </div>
            <h4>Detalle de Pagos</h4>
            <div class="details-section" id="nomina-details-section">
                <div class="details-item" data-id="n1" data-fecha="2024-06-05" data-nombre="Juan Pérez" data-monto="4000" data-tipo="Pago quincenal" data-categoria="nomina">
                    <i class="fas fa-user icon"></i>
                    <div class="info col-name">Juan Pérez</div>
                    <div class="info col-date">05/06/2024</div>
                    <div class="info col-amount">$4,000</div>
                    <div class="info col-type">Pago quincenal</div>
                    <div class="actions">
                        <button class="btn btn-sm btn-info edit-item-btn" data-toggle="modal" data-target="#movimientoEditModal" data-modal-type="edit"><i class="fas fa-pencil-alt"></i></button>
                        <button class="btn btn-sm btn-danger delete-item-btn"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </div>
                <div class="details-item" data-id="n2" data-fecha="2024-06-03" data-nombre="Ana López" data-monto="3800" data-tipo="Pago semanal" data-categoria="nomina">
                    <i class="fas fa-user icon"></i>
                    <div class="info col-name">Ana López</div>
                    <div class="info col-date">03/06/2024</div>
                    <div class="info col-amount">$3,800</div>
                    <div class="info col-type">Pago semanal</div>
                    <div class="actions">
                        <button class="btn btn-sm btn-info edit-item-btn" data-toggle="modal" data-target="#movimientoEditModal" data-modal-type="edit"><i class="fas fa-pencil-alt"></i></button>
                        <button class="btn btn-sm btn-danger delete-item-btn"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </div>
                <div class="details-item" data-id="n3" data-fecha="2024-06-01" data-nombre="Carlos Ruiz" data-monto="4200" data-tipo="Pago quincenal" data-categoria="nomina">
                    <i class="fas fa-user icon"></i>
                    <div class="info col-name">Carlos Ruiz</div>
                    <div class="info col-date">01/06/2024</div>
                    <div class="info col-amount">$4,200</div>
                    <div class="info col-type">Pago quincenal</div>
                    <div class="actions">
                        <button class="btn btn-sm btn-info edit-item-btn" data-toggle="modal" data-target="#movimientoEditModal" data-modal-type="edit"><i class="fas fa-pencil-alt"></i></button>
                        <button class="btn btn-sm btn-danger delete-item-btn"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </div>
            </div>
            <button class="btn-add" data-toggle="modal" data-target="#movimientoEditModal" data-modal-type="add" data-categoria="nomina">Agregar</button>
        </div>

        <div class="tab-pane fade show active" id="insumos" role="tabpanel" aria-labelledby="insumos-tab">
            <h4>Resumen de Insumos</h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="card-summary">
                        <i class="fas fa-dollar-sign icon"></i>
                        <div>
                            <div class="title">Total Insumos</div>
                            <div class="value">$18,500</div>
                            <div class="description">Gasto acumulado este mes</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-summary">
                        <i class="fas fa-chart-line icon movement"></i>
                        <div>
                            <div class="title">Movimientos</div>
                            <div class="value">8</div>
                            <div class="description">Entradas y salidas registradas</div>
                        </div>
                    </div>
                </div>
            </div>
            <h4>Detalle de Insumos</h4>
            <div class="details-section" id="insumos-details-section">
                <div class="details-item" data-id="i1" data-fecha="2024-06-04" data-descripcion="Fertilizante NPK" data-monto="2500" data-tipo="Compra" data-categoria="insumos">
                    <i class="fas fa-seedling icon"></i>
                    <div class="info description">Fertilizante NPK</div>
                    <div class="info col-date">04/06/2024</div>
                    <div class="info col-amount">$2,500</div>
                    <div class="info col-type">Compra</div>
                    <div class="actions">
                        <button class="btn btn-sm btn-info edit-item-btn" data-toggle="modal" data-target="#movimientoEditModal" data-modal-type="edit"><i class="fas fa-pencil-alt"></i></button>
                        <button class="btn btn-sm btn-danger delete-item-btn"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </div>
                <div class="details-item" data-id="i2" data-fecha="2024-06-02" data-descripcion="Herbicida Selectivo" data-monto="1200" data-tipo="Compra" data-categoria="insumos">
                    <i class="fas fa-flask icon"></i>
                    <div class="info description">Herbicida Selectivo</div>
                    <div class="info col-date">02/06/2024</div>
                    <div class="info col-amount">$1,200</div>
                    <div class="info col-type">Compra</div>
                    <div class="actions">
                        <button class="btn btn-sm btn-info edit-item-btn" data-toggle="modal" data-target="#movimientoEditModal" data-modal-type="edit"><i class="fas fa-pencil-alt"></i></button>
                        <button class="btn btn-sm btn-danger delete-item-btn"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </div>
                <div class="details-item" data-id="i3" data-fecha="2024-05-30" data-descripcion="Semillas Maíz" data-monto="3000" data-tipo="Entrada" data-categoria="insumos">
                    <i class="fas fa-cereal icon"></i>
                    <div class="info description">Semillas Maíz</div>
                    <div class="info col-date">30/05/2024</div>
                    <div class="info col-amount">$3,000</div>
                    <div class="info col-type">Entrada</div>
                    <div class="actions">
                        <button class="btn btn-sm btn-info edit-item-btn" data-toggle="modal" data-target="#movimientoEditModal" data-modal-type="edit"><i class="fas fa-pencil-alt"></i></button>
                        <button class="btn btn-sm btn-danger delete-item-btn"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </div>
            </div>
            <button class="btn-add" data-toggle="modal" data-target="#movimientoEditModal" data-modal-type="add" data-categoria="insumos">Agregar</button>
        </div>

        <div class="tab-pane fade" id="gastosextras" role="tabpanel" aria-labelledby="gastosextras-tab">
            <h4>Resumen de Gastos Extras</h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="card-summary">
                        <i class="fas fa-dollar-sign icon"></i>
                        <div>
                            <div class="title">Total Gastos</div>
                            <div class="value">$4,200</div>
                            <div class="description">Gasto acumulado este mes</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-summary">
                        <i class="fas fa-chart-line icon movement"></i>
                        <div>
                            <div class="title">Movimientos</div>
                            <div class="value">3</div>
                            <div class="description">Pagos y ajustes registrados</div>
                        </div>
                    </div>
                </div>
            </div>
            <h4>Detalle de Gastos Extras</h4>
            <div class="details-section" id="gastosextras-details-section">
                <div class="details-item" data-id="ge1" data-fecha="2024-06-01" data-descripcion="Reparación tractor" data-monto="2000" data-tipo="Servicio" data-categoria="gastosextras">
                    <i class="fas fa-tractor icon"></i>
                    <div class="info description">Reparación tractor</div>
                    <div class="info col-date">01/06/2024</div>
                    <div class="info col-amount">$2,000</div>
                    <div class="info col-type">Servicio</div>
                    <div class="actions">
                        <button class="btn btn-sm btn-info edit-item-btn" data-toggle="modal" data-target="#movimientoEditModal" data-modal-type="edit"><i class="fas fa-pencil-alt"></i></button>
                        <button class="btn btn-sm btn-danger delete-item-btn"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </div>
                <div class="details-item" data-id="ge2" data-fecha="2024-05-28" data-descripcion="Combustible" data-monto="1500" data-tipo="Compra" data-categoria="gastosextras">
                    <i class="fas fa-gas-pump icon"></i>
                    <div class="info description">Combustible</div>
                    <div class="info col-date">28/05/2024</div>
                    <div class="info col-amount">$1,500</div>
                    <div class="info col-type">Compra</div>
                    <div class="actions">
                        <button class="btn btn-sm btn-info edit-item-btn" data-toggle="modal" data-target="#movimientoEditModal" data-modal-type="edit"><i class="fas fa-pencil-alt"></i></button>
                        <button class="btn btn-sm btn-danger delete-item-btn"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </div>
                <div class="details-item" data-id="ge3" data-fecha="2024-05-25" data-descripcion="Mantenimiento bomba" data-monto="700" data-tipo="Servicio" data-categoria="gastosextras">
                    <i class="fas fa-pump-medical icon"></i>
                    <div class="info description">Mantenimiento bomba</div>
                    <div class="info col-date">25/05/2024</div>
                    <div class="info col-amount">$700</div>
                    <div class="info col-type">Servicio</div>
                    <div class="actions">
                        <button class="btn btn-sm btn-info edit-item-btn" data-toggle="modal" data-target="#movimientoEditModal" data-modal-type="edit"><i class="fas fa-pencil-alt"></i></button>
                        <button class="btn btn-sm btn-danger delete-item-btn"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </div>
            </div>
            <button class="btn-add" data-toggle="modal" data-target="#movimientoEditModal" data-modal-type="add" data-categoria="gastosextras">Agregar</button>
        </div>

        <div class="tab-pane fade" id="campo" role="tabpanel" aria-labelledby="campo-tab">
            <h4>Resumen de Campo</h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="card-summary">
                        <i class="fas fa-dollar-sign icon"></i>
                        <div>
                            <div class="title">Total Gastos</div>
                            <div class="value">$18,500</div>
                            <div class="description">Gastos acumulados en campo este mes</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-summary">
                        <i class="fas fa-chart-line icon movement"></i>
                        <div>
                            <div class="title">Movimientos</div>
                            <div class="value">12</div>
                            <div class="description">Movimientos registrados en campo</div>
                        </div>
                    </div>
                </div>
            </div>
            <h4>Detalle de Movimientos</h4>
            <div class="details-section" id="campo-details-section">
                <div class="details-item" data-id="c1" data-fecha="2024-06-20" data-descripcion="Preparación de suelo" data-monto="5000" data-tipo="Servicio" data-categoria="campo">
                    <i class="fas fa-seedling icon"></i>
                    <div class="info description">Preparación de suelo</div>
                    <div class="info col-date">20/06/2024</div>
                    <div class="info col-amount">$5,000</div>
                    <div class="info col-type">Servicio</div>
                    <div class="actions">
                        <button class="btn btn-sm btn-info edit-item-btn" data-toggle="modal" data-target="#movimientoEditModal" data-modal-type="edit"><i class="fas fa-pencil-alt"></i></button>
                        <button class="btn btn-sm btn-danger delete-item-btn"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </div>
                <div class="details-item" data-id="c2" data-fecha="2024-06-18" data-descripcion="Sistema de riego" data-monto="7500" data-tipo="Mantenimiento" data-categoria="campo">
                    <i class="fas fa-water icon"></i>
                    <div class="info description">Sistema de riego</div>
                    <div class="info col-date">18/06/2024</div>
                    <div class="info col-amount">$7,500</div>
                    <div class="info col-type">Mantenimiento</div>
                    <div class="actions">
                        <button class="btn btn-sm btn-info edit-item-btn" data-toggle="modal" data-target="#movimientoEditModal" data-modal-type="edit"><i class="fas fa-pencil-alt"></i></button>
                        <button class="btn btn-sm btn-danger delete-item-btn"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </div>
                <div class="details-item" data-id="c3" data-fecha="2024-06-15" data-descripcion="Alquiler de tractor" data-monto="3000" data-tipo="Servicio" data-categoria="campo">
                    <i class="fas fa-tractor icon"></i>
                    <div class="info description">Alquiler de tractor</div>
                    <div class="info col-date">15/06/2024</div>
                    <div class="info col-amount">$3,000</div>
                    <div class="info col-type">Servicio</div>
                    <div class="actions">
                        <button class="btn btn-sm btn-info edit-item-btn" data-toggle="modal" data-target="#movimientoEditModal" data-modal-type="edit"><i class="fas fa-pencil-alt"></i></button>
                        <button class="btn btn-sm btn-danger delete-item-btn"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </div>
                <div class="details-item" data-id="c4" data-fecha="2024-06-10" data-descripcion="Jornaleros" data-monto="3000" data-tipo="Mano de obra" data-categoria="campo">
                    <i class="fas fa-hand-holding-usd icon"></i>
                    <div class="info description">Jornaleros</div>
                    <div class="info col-date">10/06/2024</div>
                    <div class="info col-amount">$3,000</div>
                    <div class="info col-type">Mano de obra</div>
                    <div class="actions">
                        <button class="btn btn-sm btn-info edit-item-btn" data-toggle="modal" data-target="#movimientoEditModal" data-modal-type="edit"><i class="fas fa-pencil-alt"></i></button>
                        <button class="btn btn-sm btn-danger delete-item-btn"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </div>
            </div>
            <button class="btn-add" data-toggle="modal" data-target="#movimientoEditModal" data-modal-type="add" data-categoria="campo">Agregar</button>
        </div>

    </div>
</div>

<div class="modal fade" id="movimientoEditModal" tabindex="-1" role="dialog" aria-labelledby="movimientoEditModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="movimientoEditModalLabel">Registrar Movimiento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editMovimientoForm">
                    <input type="hidden" id="movimiento-id" name="id">
                    <input type="hidden" id="movimiento-modal-type" name="modal_type">
                    <input type="hidden" id="movimiento-categoria" name="categoria">

                    <div class="form-group">
                        <label for="movimiento-fecha" class="form-label">Fecha</label>
                        <div class="input-group">
                            <input type="date" class="form-control" id="movimiento-fecha" name="fecha" required>
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                            </div>
                        </div>
                    </div>

                    <div id="general-movimiento-fields">
                        <div class="form-group">
                            <label for="movimiento-descripcion" class="form-label">Descripción</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="movimiento-descripcion" name="descripcion" placeholder="Descripción del movimiento" required>
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-info-circle"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="movimiento-monto" class="form-label">Monto</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="number" step="0.01" class="form-control" id="movimiento-monto" name="monto" placeholder="0.00" required>
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="movimiento-tipo" class="form-label">Tipo</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="movimiento-tipo" name="tipo" placeholder="Ej: Compra, Servicio, Entrada, Salida">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-tag"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="nomina-modal-fields" style="display:none;">
                        <div class="form-group">
                            <label for="movimiento-nombre-empleado" class="form-label">Nombre del Empleado</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="movimiento-nombre-empleado" name="nombre_empleado" placeholder="Nombre completo del empleado">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="movimiento-monto-nomina" class="form-label">Monto</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="number" step="0.01" class="form-control" id="movimiento-monto-nomina" name="monto_nomina" placeholder="0.00">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="movimiento-tipo-nomina" class="form-label">Tipo de Pago</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="movimiento-tipo-nomina" name="tipo_nomina" placeholder="Ej: Pago quincenal, Pago semanal">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-file-invoice-dollar"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" form="editMovimientoForm" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
$(document).ready(function() {
    // Function to hide all specific modal fields
    function hideAllModalFields() {
        $('#general-movimiento-fields').hide();
        $('#nomina-modal-fields').hide();
    }

    // Function to show/hide fields and set modal title based on category and action type
    function setupModal(category, modalType) {
        hideAllModalFields(); // Hide all fields first

        if (category === 'nomina') {
            $('#nomina-modal-fields').show();
            if (modalType === 'add') {
                $('#movimientoEditModalLabel').text('Registrar Pago de Nómina');
            } else {
                $('#movimientoEditModalLabel').text('Editar Pago de Nómina');
            }
        } else {
            $('#general-movimiento-fields').show();
            if (modalType === 'add') {
                $('#movimientoEditModalLabel').text('Registrar Movimiento de ' + category.charAt(0).toUpperCase() + category.slice(1));
            } else {
                $('#movimientoEditModalLabel').text('Editar Movimiento de ' + category.charAt(0).toUpperCase() + category.slice(1));
            }
        }
    }

    // Handle "Agregar" button click
    $('.btn-add').on('click', function() {
        const category = $(this).data('categoria');
        $('#movimiento-modal-type').val('add');
        $('#movimiento-categoria').val(category);
        
        setupModal(category, 'add');

        // Clear form fields for "add" action
        $('#movimiento-id').val('');
        $('#movimiento-fecha').val('');
        $('#movimiento-descripcion').val('');
        $('#movimiento-monto').val('');
        $('#movimiento-tipo').val('');
        $('#movimiento-nombre-empleado').val('');
        $('#movimiento-monto-nomina').val('');
        $('#movimiento-tipo-nomina').val('');
    });

    // Handle "Editar" button click
    $('.edit-item-btn').on('click', function() {
        const item = $(this).closest('.details-item');
        const id = item.data('id');
        const fecha = item.data('fecha');
        const categoria = item.data('categoria'); // Get category from data attribute

        $('#movimiento-id').val(id);
        $('#movimiento-modal-type').val('edit');
        $('#movimiento-categoria').val(categoria); // Set category in hidden field

        setupModal(categoria, 'edit');

        // Populate common fields
        $('#movimiento-fecha').val(fecha);

        // Populate fields based on category
        if (categoria === 'nomina') {
            $('#movimiento-nombre-empleado').val(item.data('nombre'));
            $('#movimiento-monto-nomina').val(item.data('monto'));
            $('#movimiento-tipo-nomina').val(item.data('tipo'));
        } else {
            $('#movimiento-descripcion').val(item.data('descripcion'));
            $('#movimiento-monto').val(item.data('monto'));
            $('#movimiento-tipo').val(item.data('tipo'));
        }
    });

    // Handle "Eliminar" button click
    $('.delete-item-btn').on('click', function() {
        const item = $(this).closest('.details-item');
        const id = item.data('id');
        const categoria = item.data('categoria');
        const confirmDelete = confirm(`¿Estás seguro de que quieres eliminar este movimiento (ID: ${id}) de ${categoria}?`);
        if (confirmDelete) {
            // Here you would typically send an AJAX request to your backend to delete the item
            // For now, we'll just remove the row from the DOM
            item.remove();
            alert(`Movimiento (ID: ${id}) de ${categoria} eliminado.`);
        }
    });

    // Handle form submission (for both add and edit)
    $('#editMovimientoForm').on('submit', function(e) {
        e.preventDefault(); // Prevent default form submission

        const modalType = $('#movimiento-modal-type').val();
        const categoria = $('#movimiento-categoria').val();
        const fecha = $('#movimiento-fecha').val();
        
        let data = {
            id: $('#movimiento-id').val(),
            fecha: fecha,
            categoria: categoria
        };

        if (categoria === 'nomina') {
            data.nombre = $('#movimiento-nombre-empleado').val();
            data.monto = $('#movimiento-monto-nomina').val();
            data.tipo = $('#movimiento-tipo-nomina').val();
        } else {
            data.descripcion = $('#movimiento-descripcion').val();
            data.monto = $('#movimiento-monto').val();
            data.tipo = $('#movimiento-tipo').val();
        }
        
        // Format date for display
        const displayDate = new Date(fecha + 'T00:00:00').toLocaleDateString('es-ES', { day: '2-digit', month: '2-digit', year: 'numeric' });
        
        if (modalType === 'add') {
            // Simulate adding a new item
            const newId = 'new-' + Date.now(); // Generate a unique ID for the new item
            let newItemHtml = '';
            if (categoria === 'nomina') {
                newItemHtml = `
                    <div class="details-item" data-id="${newId}" data-fecha="${data.fecha}" data-nombre="${data.nombre}" data-monto="${data.monto}" data-tipo="${data.tipo}" data-categoria="${categoria}">
                        <i class="fas fa-user icon"></i>
                        <div class="info col-name">${data.nombre}</div>
                        <div class="info col-date">${displayDate}</div>
                        <div class="info col-amount">$${parseFloat(data.monto).toLocaleString('en-US')}</div>
                        <div class="info col-type">${data.tipo}</div>
                        <div class="actions">
                            <button class="btn btn-sm btn-info edit-item-btn" data-toggle="modal" data-target="#movimientoEditModal" data-modal-type="edit"><i class="fas fa-pencil-alt"></i></button>
                            <button class="btn btn-sm btn-danger delete-item-btn"><i class="fas fa-trash-alt"></i></button>
                        </div>
                    </div>
                `;
            } else {
                newItemHtml = `
                    <div class="details-item" data-id="${newId}" data-fecha="${data.fecha}" data-descripcion="${data.descripcion}" data-monto="${data.monto}" data-tipo="${data.tipo}" data-categoria="${categoria}">
                        <i class="fas fa-info-circle icon"></i> <div class="info description">${data.descripcion}</div>
                        <div class="info col-date">${displayDate}</div>
                        <div class="info col-amount">$${parseFloat(data.monto).toLocaleString('en-US')}</div>
                        <div class="info col-type">${data.tipo}</div>
                        <div class="actions">
                            <button class="btn btn-sm btn-info edit-item-btn" data-toggle="modal" data-target="#movimientoEditModal" data-modal-type="edit"><i class="fas fa-pencil-alt"></i></button>
                            <button class="btn btn-sm btn-danger delete-item-btn"><i class="fas fa-trash-alt"></i></button>
                        </div>
                    </div>
                `;
            }
            
            $(`#${categoria}-details-section`).append(newItemHtml);
            alert(`Nuevo movimiento de ${categoria} agregado.`);
            
            // Re-attach event listeners to new buttons
            $(`#${categoria}-details-section .details-item[data-id="${newId}"] .edit-item-btn`).on('click', function() {
                $('.edit-item-btn').off('click'); // Detach previous listeners to prevent duplicates
                $('.delete-item-btn').off('click'); // Detach previous listeners
                $(document).off('click', '.edit-item-btn'); // More robust way to remove delegated events
                $(document).off('click', '.delete-item-btn'); // More robust way to remove delegated events

                attachEventListeners(); // Reattach all listeners
                $(this).trigger('click'); // Re-trigger the click on the specific new button
            });
            $(`#${categoria}-details-section .details-item[data-id="${newId}"] .delete-item-btn`).on('click', function() {
                $('.edit-item-btn').off('click'); // Detach previous listeners to prevent duplicates
                $('.delete-item-btn').off('click'); // Detach previous listeners
                $(document).off('click', '.edit-item-btn'); // More robust way to remove delegated events
                $(document).off('click', '.delete-item-btn'); // More robust way to remove delegated events

                attachEventListeners(); // Reattach all listeners
                $(this).trigger('click'); // Re-trigger the click on the specific new button
            });


        } else if (modalType === 'edit') {
            // Simulate editing an existing item
            const editedItem = $(`#${categoria}-details-section .details-item[data-id="${data.id}"]`);
            if (categoria === 'nomina') {
                editedItem.find('.col-name').text(data.nombre);
                editedItem.find('.col-amount').text('$' + parseFloat(data.monto).toLocaleString('en-US'));
                editedItem.find('.col-type').text(data.tipo);
                editedItem.data('nombre', data.nombre);
                editedItem.data('monto', data.monto);
                editedItem.data('tipo', data.tipo);
            } else {
                editedItem.find('.description').text(data.descripcion);
                editedItem.find('.col-amount').text('$' + parseFloat(data.monto).toLocaleString('en-US'));
                editedItem.find('.col-type').text(data.tipo);
                editedItem.data('descripcion', data.descripcion);
                editedItem.data('monto', data.monto);
                editedItem.data('tipo', data.tipo);
            }
            editedItem.find('.col-date').text(displayDate);
            editedItem.data('fecha', data.fecha);

            alert(`Movimiento de ${categoria} actualizado.`);
        }

        $('#movimientoEditModal').modal('hide'); // Close the modal
    });
    
    // Initial setup for the currently active tab (insumos by default)
    const initialActiveTabId = $('#gastosMovimientosTabs .nav-link.active').attr('id');
    const initialCategory = initialActiveTabId.replace('-tab', '');
    setupModal(initialCategory, 'add'); // Set up for add initially

    // Function to attach all event listeners
    function attachEventListeners() {
        // Handle "Agregar" button click (delegated for dynamically added buttons)
        $(document).on('click', '.btn-add', function() {
            const category = $(this).data('categoria');
            $('#movimiento-modal-type').val('add');
            $('#movimiento-categoria').val(category);
            
            setupModal(category, 'add');

            // Clear form fields for "add" action
            $('#movimiento-id').val('');
            $('#movimiento-fecha').val('');
            $('#movimiento-descripcion').val('');
            $('#movimiento-monto').val('');
            $('#movimiento-tipo').val('');
            $('#movimiento-nombre-empleado').val('');
            $('#movimiento-monto-nomina').val('');
            $('#movimiento-tipo-nomina').val('');
        });

        // Handle "Editar" button click (delegated for dynamically added buttons)
        $(document).on('click', '.edit-item-btn', function() {
            const item = $(this).closest('.details-item');
            const id = item.data('id');
            const fecha = item.data('fecha');
            const categoria = item.data('categoria');

            $('#movimiento-id').val(id);
            $('#movimiento-modal-type').val('edit');
            $('#movimiento-categoria').val(categoria);

            setupModal(categoria, 'edit');

            $('#movimiento-fecha').val(fecha);

            if (categoria === 'nomina') {
                $('#movimiento-nombre-empleado').val(item.data('nombre'));
                $('#movimiento-monto-nomina').val(item.data('monto'));
                $('#movimiento-tipo-nomina').val(item.data('tipo'));
            } else {
                $('#movimiento-descripcion').val(item.data('descripcion'));
                $('#movimiento-monto').val(item.data('monto'));
                $('#movimiento-tipo').val(item.data('tipo'));
            }
        });

        // Handle "Eliminar" button click (delegated for dynamically added buttons)
        $(document).on('click', '.delete-item-btn', function() {
            const item = $(this).closest('.details-item');
            const id = item.data('id');
            const categoria = item.data('categoria');
            const confirmDelete = confirm(`¿Estás seguro de que quieres eliminar este movimiento (ID: ${id}) de ${categoria}?`);
            if (confirmDelete) {
                // Here you would typically send an AJAX request to your backend to delete the item
                // For now, we'll just remove the row from the DOM
                item.remove();
                alert(`Movimiento (ID: ${id}) de ${categoria} eliminado.`);
            }
        });
    }

    // Attach event listeners initially
    attachEventListeners();

    // Re-setup modal fields when tab changes (in case user switches tab while modal is open or about to open)
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        const activeTabId = $(e.target).attr('id');
        const category = activeTabId.replace('-tab', '');
        // When switching tabs, assume the next action will be 'add' unless an 'edit' button is clicked
        setupModal(category, 'add');
    });

});
</script>
</body>
</html>