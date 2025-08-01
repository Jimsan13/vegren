@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/efectivo.css') }}">
@endsection
@section('sidebar')
    <x-admin.sidebar />
@endsection

@section('navbar')
    <x-admin.navbar />
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4 content-header">
        <h3>Registro de salidas de efectivo</h3>
    </div>
    <div class="row g-4">
    <x-efectivo-tabs
        :totalEfectivo="$totalEfectivo"
        :totalCobrosEfectivo="$totalCobrosEfectivo"
        :totalPagosEfectivo="$totalPagosEfectivo"
        :efectivos="$efectivos"
        :totalTransferenciasRecibidas="$totalTransferenciasRecibidas"
        :totalTransferenciasEnviadas="$totalTransferenciasEnviadas"
        :transferencias="$transferencias"
        :totalChequesEmitidos="$totalChequesEmitidos"
        :valorTotalChequesEmitidos="$valorTotalChequesEmitidos"
        :cheques="$cheques"
    />



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