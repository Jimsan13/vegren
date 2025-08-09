@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center mt-5">
    <div class="card shadow-sm p-4" style="max-width: 600px; width: 100%;">
        <h4 class="mb-4 text-center text-primary">Editar Cotización</h4>

        <form method="POST" action="{{ route('cotizaciones.update', $cotizacion->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="fecha">Fecha</label>
                <input type="date" class="form-control" id="fecha" name="fecha" value="{{ $cotizacion->fecha }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="total_cajas">Total de cajas</label>
                <input type="number" class="form-control" id="total_cajas" name="total_cajas" value="{{ $cotizacion->total_cajas }}" min="0" required>
            </div>

            <div class="form-group mb-3">
                <label for="total_kilos">Total de kilos</label>
                <input type="number" class="form-control" id="total_kilos" name="total_kilos" value="{{ $cotizacion->total_kilos }}" min="0" required>
            </div>

            <div class="form-group mb-3">
                <label for="precio_kilo">Precio por kilo</label>
                <div class="input-group">
                    <span class="input-group-text">$</span>
                    <input type="number" step="0.01" class="form-control" id="precio_kilo" name="precio_kilo" value="{{ $cotizacion->precio_kilo }}" min="0" required>
                </div>
            </div>

            <div class="form-group mb-3">
                <label for="proveedor">Nombre del proveedor</label>
                <input type="text" class="form-control" id="proveedor" name="proveedor" value="{{ $cotizacion->proveedor }}" required>
            </div>

            <div class="form-group mb-4">
                <label for="total_pagar">Total a pagar</label>
                <div class="input-group">
                    <span class="input-group-text">$</span>
                    <input type="text" class="form-control" id="total_pagar" name="total_pagar" value="{{ number_format($cotizacion->total_pagar, 2) }}" readonly>
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('cotizaciones.index') }}" class="btn btn-outline-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Actualizar Cotización</button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const totalKilos = document.getElementById('total_kilos');
        const precioKilo = document.getElementById('precio_kilo');
        const totalPagar = document.getElementById('total_pagar');

        function calcularTotal() {
            let kilos = parseFloat(totalKilos.value) || 0;
            let precio = parseFloat(precioKilo.value) || 0;
            totalPagar.value = (kilos * precio).toFixed(2);
        }

        totalKilos.addEventListener('input', calcularTotal);
        precioKilo.addEventListener('input', calcularTotal);
    });
</script>
@endsection
