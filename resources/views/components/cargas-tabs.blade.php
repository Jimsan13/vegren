@extends('layouts.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

@php
    use Carbon\Carbon;

    $now = Carbon::now();
    $ventasMes = 0;
    $adeudos = 0;
    $pagosPendientes = false;

    foreach($cargas as $carga) {
        $fechaCarga = Carbon::parse($carga->fecha);

        if ($fechaCarga->year == $now->year && $fechaCarga->month == $now->month) {
            $ventasMes += floatval($carga->totalEnvio ?? 0);
        }

        $saldo = floatval($carga->saldoCarga ?? 0);
        if ($saldo > 0) {
            $adeudos += $saldo;
            $pagosPendientes = true;
        }
    }
@endphp


<div class="container-fluid">
    <div class="main-content">

        <div class="indicators-section row mb-4">
            <div class="col-md-4">
                <div class="card-indicator">
                    <i class="fas fa-chart-line icon"></i>
                    <div>
                        <div class="title">Ventas mensuales</div>
                        <div class="value">${{ number_format($ventasMes, 2) }}</div>
                        <div class="description">Total ventas este mes</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-indicator">
                    <i class="fas fa-hourglass-half icon orange"></i>
                    <div>
                        <div class="title">Estado de pago</div>
                        <div class="value">{{ $pagosPendientes ? 'Pendiente' : 'Pagado' }}</div>
                        <div class="description">{{ $pagosPendientes ? 'Pagos por recibir' : 'Sin adeudos' }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-indicator">
                    <i class="fas fa-exclamation-triangle icon red"></i>
                    <div>
                        <div class="title">Adeudos</div>
                        <div class="value">${{ number_format($adeudos, 2) }}</div>
                        <div class="description">Saldo pendiente</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-header">
            <a href="{{ route('admin.cargas.create') }}" class="btn btn-primary">
                <i class="fas fa-plus-circle me-2"></i> Agregar
            </a>
        </div>

        <div class="details-section">
            <div class="details-item header-row">
                <div class="col-fecha header-col"><i class="fas fa-calendar-alt"></i> Fecha</div>
                <div class="col-lote header-col"><i class="fas fa-cubes"></i> Lote</div>
                <div class="col-cliente header-col"><i class="fas fa-user"></i> Cliente</div>
                <div class="col-bultos header-col"><i class="fas fa-box"></i> Bultos</div>
                <div class="col-precio header-col"><i class="fas fa-dollar-sign"></i> Precio/U.</div>
                <div class="col-remate header-col"><i class="fas fa-balance-scale"></i> Remate</div>
                <div class="col-descuento header-col"><i class="fas fa-percent"></i> Descuento</div>
                <div class="col-anticipo header-col"><i class="fas fa-hand-holding-usd"></i> Anticipo</div>
                <div class="col-caja-extra header-col"><i class="fas fa-money-bill-wave"></i> Caja Extra</div>
                <div class="col-total-envio header-col"><i class="fas fa-shipping-fast"></i> Total Envío</div>
                <div class="col-facturacion header-col"><i class="fas fa-file-invoice"></i> Facturación</div>
                <div class="col-facturas-pagadas header-col"><i class="fas fa-check-circle"></i> Facturas Pagadas</div>
                <div class="col-saldo header-col"><i class="fas fa-wallet"></i> Saldo</div>
                <div class="col-cinta-transporte header-col"><i class="fas fa-truck"></i> Cinta Transporte</div>
                <div class="col-representante header-col"><i class="fas fa-user-tie"></i> Representante</div>
                <div class="action-buttons header-col"><i class="fas fa-cogs"></i> Acciones</div>
            </div>

            @foreach($cargas as $carga)
            <div class="details-item" data-id="{{ $carga->id }}">
                <div class="info col-fecha">{{ $carga->fecha }}</div>
                <div class="info col-lote">{{ $carga->lote }}</div>
                <div class="info col-cliente">{{ $carga->cliente }}</div>
                <div class="info col-bultos">{{ $carga->bultosCaja }}</div>
                <div class="info col-precio">${{ number_format($carga->precioUnidad, 2) }}</div>
                <div class="info col-remate">${{ number_format($carga->remate ?? 0, 2) }}</div>
                <div class="info col-descuento">${{ number_format($carga->descuentoAplicado ?? 0, 2) }}</div>
                <div class="info col-anticipo">${{ number_format($carga->anticipo ?? 0, 2) }}</div>
                <div class="info col-caja-extra">${{ number_format($carga->cajaExtra ?? 0, 2) }}</div>
                <div class="info col-total-envio">${{ number_format($carga->totalEnvio ?? 0, 2) }}</div>
                <div class="info col-facturacion">{{ ucfirst($carga->facturacion ?? 'Pendiente') }}</div>
                <div class="info col-facturas-pagadas">{{ $carga->facturasPagadas ? 'Sí' : 'No' }}</div>
                <div class="info col-saldo">${{ number_format($carga->saldoCarga ?? 0, 2) }}</div>
                <div class="info col-cinta-transporte">{{ $carga->cintaTransporte }}</div>
                <div class="info col-representante">{{ $carga->representanteResponsable }}</div>
                <div class="action-buttons">
                    <button class="btn btn-danger btn-delete"><i class="fas fa-times"></i></button>
                    <button class="btn btn-info btn-edit" data-toggle="modal" data-target="#cargaEditModal" data-modal-type="edit">
                        <i class="fas fa-pencil-alt"></i>
                    </button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>


        <div class="card mb-4 p-3">
            <h5 class="mb-3"><i class="fas fa-chart-bar me-2"></i>Resumen por Cliente</h5>
            <canvas id="graficaClientes" height="130"></canvas>
        </div>

<!-- Modal de edición -->
<div class="modal fade" id="cargaEditModal" tabindex="-1" aria-labelledby="cargaEditModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form id="formEditCarga" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-header">
          <h5 class="modal-title" id="cargaEditModalLabel">Editar Carga</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body row g-3">
          <input type="hidden" name="id" id="edit_id">

          <div class="col-md-6">
            <label for="edit_fecha" class="form-label">Fecha</label>
            <input type="date" class="form-control" name="fecha" id="edit_fecha" required>
          </div>
          <div class="col-md-6">
            <label for="edit_lote" class="form-label">Lote</label>
            <input type="text" class="form-control" name="lote" id="edit_lote">
          </div>

          <div class="col-md-6">
            <label for="edit_cliente" class="form-label">Cliente</label>
            <input type="text" class="form-control" name="cliente" id="edit_cliente">
          </div>
          <div class="col-md-6">
            <label for="edit_bultos" class="form-label">Bultos</label>
            <input type="number" class="form-control" name="bultos" id="edit_bultos">
          </div>

          <div class="col-md-4">
            <label for="edit_precio" class="form-label">Precio/U</label>
            <input type="number" step="0.01" class="form-control" name="precio" id="edit_precio">
          </div>
          <div class="col-md-4">
            <label for="edit_remate" class="form-label">Remate</label>
            <input type="number" step="0.01" class="form-control" name="remate" id="edit_remate">
          </div>
          <div class="col-md-4">
            <label for="edit_descuento" class="form-label">Descuento</label>
            <input type="number" step="0.01" class="form-control" name="descuento_aplicado" id="edit_descuento">
          </div>

          <div class="col-md-4">
            <label for="edit_anticipo" class="form-label">Anticipo</label>
            <input type="number" step="0.01" class="form-control" name="anticipo" id="edit_anticipo">
          </div>
          <div class="col-md-4">
            <label for="edit_caja_extra" class="form-label">Caja Extra</label>
            <input type="number" step="0.01" class="form-control" name="caja_extra" id="edit_caja_extra">
          </div>
          <div class="col-md-4">
            <label for="edit_total_envio" class="form-label">Total Envío</label>
            <input type="number" step="0.01" class="form-control" name="total_envio" id="edit_total_envio">
          </div>

          <div class="col-md-6">
            <label for="edit_facturacion" class="form-label">Facturación</label>
            <input type="text" class="form-control" name="facturacion" id="edit_facturacion">
          </div>
          <div class="col-md-6">
            <label for="edit_facturas_pagadas" class="form-label">Facturas Pagadas</label>
            <select class="form-select" name="facturas_pagadas" id="edit_facturas_pagadas">
              <option value="true">Sí</option>
              <option value="false">No</option>
            </select>
          </div>

          <div class="col-md-6">
            <label for="edit_saldo" class="form-label">Saldo</label>
            <input type="number" step="0.01" class="form-control" name="saldo" id="edit_saldo">
          </div>
          <div class="col-md-6">
            <label for="edit_cinta" class="form-label">Cinta Transporte</label>
            <input type="text" class="form-control" name="cinta_transporte" id="edit_cinta">
          </div>

          <div class="col-12">
            <label for="edit_representante" class="form-label">Representante Responsable</label>
            <input type="text" class="form-control" name="representante_responsable" id="edit_representante">
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection


@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$('.btn-edit').click(function () {
    const carga = $(this).closest('.details-item').data('id');
    $.get(`/admin/cargas/${carga}/edit`, function (data) {
        $('#formEditCarga').attr('action', `/admin/cargas/${carga}`);
        $('#edit_id').val(data.id);
        $('#edit_fecha').val(data.fecha);
        $('#edit_lote').val(data.lote);
        $('#edit_cliente').val(data.cliente);
        $('#edit_bultos').val(data.bultosCaja);
        $('#edit_precio').val(data.precioUnidad);
        $('#edit_remate').val(data.remate);
        $('#edit_descuento').val(data.descuentoAplicado);
        $('#edit_anticipo').val(data.anticipo);
        $('#edit_caja_extra').val(data.cajaExtra);
        $('#edit_total_envio').val(data.totalEnvio);
        $('#edit_facturacion').val(data.facturacion);
        $('#edit_facturas_pagadas').val(data.facturasPagadas ? 'true' : 'false');
        $('#edit_saldo').val(data.saldoCarga);
        $('#edit_cinta').val(data.cintaTransporte);
        $('#edit_representante').val(data.representanteResponsable);

        $('#cargaEditModal').modal('show');
    });
});


$(document).ready(function() {
    $('.btn-delete').click(function() {
        if(!confirm('¿Estás seguro de eliminar esta carga?')) {
            return;
        }

        const button = $(this);
        const cargaDiv = button.closest('.details-item');
        const cargaId = cargaDiv.data('id');

        $.ajax({
            url: '/admin/cargas/' + cargaId,
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                cargaDiv.remove();
                alert('Carga eliminada correctamente.');
            },
            error: function() {
                alert('Error al eliminar la carga.');
            }
        });
    });
});


</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const cargas = @json($cargas);

    const resumen = {};
    cargas.forEach(c => {
        const cliente = c.cliente || 'Sin nombre';
        if (!resumen[cliente]) {
            resumen[cliente] = {
                totalEnvio: 0,
                saldo: 0
            };
        }
        resumen[cliente].totalEnvio += parseFloat(c.totalEnvio ?? 0);
        resumen[cliente].saldo += parseFloat(c.saldoCarga ?? 0);
    });

    const clientes = Object.keys(resumen);
    const totalEnvios = clientes.map(c => resumen[c].totalEnvio.toFixed(2));
    const saldos = clientes.map(c => resumen[c].saldo.toFixed(2));

    const ctx = document.getElementById('graficaClientes').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: clientes,
            datasets: [
                {
                    label: 'Total Envío',
                    data: totalEnvios,
                    backgroundColor: 'rgba(0, 255, 21, 0.6)',
                },
                {
                    label: 'Saldo',
                    data: saldos,
                    backgroundColor: 'rgba(255, 0, 55, 0.6)',
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: value => '$' + value
                    }
                }
            },
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return context.dataset.label + ': $' + context.formattedValue;
                        }
                    }
                }
            }
        }
    });
</script>

@endsection
