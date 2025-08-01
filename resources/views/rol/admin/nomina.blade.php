@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/nomina.css') }}">
@endsection
@section('sidebar')
    <x-admin.sidebar />
@endsection

@section('navbar')
    <x-admin.navbar />
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4 content-header">
        <h3>Módulo de control de empleados y nómina</h3>
    </div>
    <div class="row g-4">
<x-nomina-tabs
    :empacadores="$empacadores"
    :total-cajas="$totalCajas"
    :total-reempaques="$totalReempaques"
    :total-nomina="$totalNomina"
    :activos="$activos"
    :enhieladores="$enhieladores"
    :total-tarimas="$total_tarimas"
    :total-rengeladas="$total_rengeladas"
    :total-nomina-enhieladores="$total_nomina_enhieladores"
    :activos-enhieladores="$activos_enhieladores"
    :encargados="$encargados"
    :total-termos="$total_termos"
    :total-reportes="$total_reportes"
    :total-nomina-encargados="$total_nomina_encargados"
    :activos-encargados="$activos_encargados"
    :empleados="$empleados"

    :total-descuentos="$totalDescuentos"
    :total-nomina-general="$totalNominaGeneral"
    :cajas-en-almacen="$cajasEnAlmacen"
    :efectivo-reportado="$efectivoReportado"
    :nomina-estimada="$nominaEstimada"

/>

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