@extends('layouts.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="container-fluid">
    <div class="main-content">
        
        <p>Complete los datos para registrar o editar una operación de carga.</p>

        <div class="table-header">
            Tabla de cargas
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
                <div class="col-anticipo header-col"><i class="fas fa-hand-holding-usd"></i> Anticipo</div>
                <div class="col-total-envio header-col"><i class="fas fa-shipping-fast"></i> Total Envío</div>
                <div class="col-saldo header-col"><i class="fas fa-wallet"></i> Saldo</div>
                <div class="action-buttons header-col"><i class="fas fa-cogs"></i> Acciones</div>
            </div>

            @foreach($cargas as $carga)
            <div class="details-item" data-id="{{ $carga->id }}">
                <div class="info col-fecha">{{ $carga->fecha }}</div>
                <div class="info col-lote">{{ $carga->lote }}</div>
                <div class="info col-cliente">{{ $carga->cliente }}</div>
                <div class="info col-bultos">{{ $carga->bultosCaja }}</div>
                <div class="info col-precio">${{ number_format($carga->precioUnidad, 2) }}</div>
                <div class="info col-anticipo">${{ $carga->anticipo ?? 0 }} ({{ $carga->facturasPagadas ? 'Sí' : 'No' }})</div>
                <div class="info col-total-envio">${{ number_format($carga->totalEnvio, 2) }}</div>
                <div class="info col-saldo text-right">${{ number_format($carga->saldoCarga, 2) }}</div>
                <div class="action-buttons">
                    <button class="btn btn-danger btn-delete"><i class="fas fa-times"></i></button>
                    <button class="btn btn-info btn-edit" data-toggle="modal" data-target="#cargaEditModal" data-modal-type="edit">
                        <i class="fas fa-pencil-alt"></i>
                    </button>
                </div>
            </div>
            @endforeach
        </div>

        <div class="indicators-section row">
            <div class="col-md-4">
                <div class="card-indicator">
                    <i class="fas fa-chart-line icon"></i>
                    <div>
                        <div class="title">Ventas mensuales</div>
                        <div class="value">$120,000</div>
                        <div class="description">Total ventas este mes</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-indicator">
                    <i class="fas fa-hourglass-half icon orange"></i>
                    <div>
                        <div class="title">Estado de pago</div>
                        <div class="value">Pendiente</div>
                        <div class="description">Pagos por recibir</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-indicator">
                    <i class="fas fa-exclamation-triangle icon red"></i>
                    <div>
                        <div class="title">Adeudos</div>
                        <div class="value">$8,500</div>
                        <div class="description">Saldo pendiente</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
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
@endsection
