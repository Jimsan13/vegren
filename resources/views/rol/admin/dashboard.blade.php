@extends('layouts.app')

@section('title', 'Dashboard de Administración') {{-- Esto establecerá el título en el <head> --}}

@section('sidebar')
    <x-admin.sidebar />
@endsection

@section('navbar')
    <x-admin.navbar />
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4 content-header">
        <h3>Resumen General</h3>
    </div>
    <div class="row g-4">
        <div class="col-md-4">
            <x-admin.dashboard-card icon="bi-truck" title="Carga" text="Registra nueva carga en el sistema" link="{{route('admin.cargas') }}" buttonText="Nueva Carga" />
        </div>
        <div class="col-md-4">
            <x-admin.dashboard-card icon="bi-currency-dollar" title="Gastos" text="Añadir Gastos Recientes" link="{{route('admin.gastos.index') }}" buttonText="Registrar" />
        </div>
        <div class="col-md-4">
            <x-admin.dashboard-card icon="bi-piggy-bank" title="Utilidades" text="Gestiona Pagos y Empleados" link="{{route('admin.utilidades')}}" buttonText="Ver Utilidades" />
        </div>
        <div class="col-md-4">
            <x-admin.dashboard-card icon="bi-graph-up" title="Ventas" text="Consulta el Resumen de Ventas" link="{{route('admin.ventas') }}" buttonText="Ver ventas" />
        </div>
        <div class="col-md-4">
            <x-admin.dashboard-card icon="bi-cash-coin" title="Efectivo" text="Visualiza los Gastos Frecuentes" link="{{route('admin.efectivo')}}" buttonText="Ver efectivo" />
        </div>
        <div class="col-md-4">
            <x-admin.dashboard-card icon="bi-geo-alt" title="Campo" text="Ver los Campos" link="{{route('admin.campo')}}" buttonText="Ver campo" />
        </div>
        <div class="col-md-4">
            <x-admin.dashboard-card icon="bi-box-seam" title="Productos" text="Consulta el Resumen de Productos" link="{{route('admin.productos')}}" buttonText="Ver productos" />
        </div>
        <div class="col-md-4">
            <x-admin.dashboard-card icon="bi-people" title="Proveedores" text="Visualiza los gastos restantes" link="{{route('admin.proveedores')}}" buttonText="Ver proveedores" />
        </div>
        <div class="col-md-4">
            <x-admin.dashboard-card icon="bi-building" title="Almacén" text="Registra nuevo cargo en el sistema" link="{{route('admin.almacen') }}" buttonText="Inspeccionar almacén" />
        </div>
        <div class="col-md-4">
            <x-admin.dashboard-card icon="bi-cash" title="Finanzas" text="Registra nuevo cargo en el sistema" link="{{route('admin.finanzas')}}" buttonText="Ver finanzas" />
        </div>
        <div class="col-md-4">
            <x-admin.dashboard-card icon="bi-bar-chart" title="Resultado" text="Visualiza el resultado" link="{{route('admin.resultados')}}" buttonText="Ver resultado" />
        </div>
        <div class="col-md-4">
            <x-admin.dashboard-card icon="bi-person-badge" title="Nómina" text="Registra nueva carga en el sistema" link="{{route('admin.nomina')}}" buttonText="Visualizar nómina" />
        </div>
    </div>
@endsection

@section('scripts')
    {{-- Script para el toggle del sidebar --}}
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