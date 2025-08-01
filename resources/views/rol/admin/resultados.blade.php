@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/resultados.css') }}">
@endsection

@section('title', 'Dashboard de Administración')

@section('sidebar')
    <x-admin.sidebar />
@endsection

@section('navbar')
    <x-admin.navbar />
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4 content-header">
        <h3>Estado de Resultados</h3>
    </div>
    
    <div class="row g-4">
        <x-resultados-tabs
            :ventas="$ventas"
            :costos="$costos"
            :gastos="$gastos"
            :total-ventas="$totalVentas"
            :total-costos="$totalCostos"
            :total-gastos="$totalGastos"
            :utilidad-bruta="$utilidadBruta"
            :utilidad-antes-impuestos="$utilidadAntesImpuestos"
        />
    </div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var sidebarToggle = document.getElementById('sidebarToggle');
        var wrapper = document.getElementById('wrapper');

        if (sidebarToggle && wrapper) {
            sidebarToggle.addEventListener('click', function () {
                wrapper.classList.toggle('toggled');
            });
        }
    });
</script>
@endsection
