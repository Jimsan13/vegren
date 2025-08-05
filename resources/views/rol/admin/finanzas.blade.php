@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/finanzas.css') }}">
@endsection
@section('sidebar')
    <x-admin.sidebar />
@endsection

@section('navbar')
    <x-admin.navbar />
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4 content-header">
        <h3>Estado Financiero</h3>
    </div>
    <div class="row g-4">
        <x-finanzas-tabs 
            :saldoDisponible="$saldoDisponible ?? 0"
            :gananciaNeta="$gananciaNeta ?? 0"
            :deudasAcumuladas="$deudasAcumuladas ?? 0"
            :movimientosRecientes="$movimientosRecientes ?? []"
            :ingresos="$ingresos ?? []"
            :egresos="$egresos ?? []"
            :pagos="$pagos ?? []"
            :facturaciones="$facturaciones ?? []"
            :utilidades="$utilidades ?? []"
            :deudas="$deudas ?? []"
            :totalIngresos="$totalIngresos ?? 0"
            :promedioIngresos="$promedioIngresos ?? 0"
            :ingresosPendientes="$ingresosPendientes ?? 0"
            :cantidadIngresosPendientes="$cantidadIngresosPendientes ?? 0"
            :totalEgresos="$totalEgresos ?? 0"
            :promedioEgresos="$promedioEgresos ?? 0"
            :egresosPendientes="$egresosPendientes ?? 0"
            :cantidadEgresosPendientes="$cantidadEgresosPendientes ?? 0"
            :totalPagado="$totalPagado ?? 0"
            :pagosPendientes="$pagosPendientes ?? 0"
            :cantidadPagosPendientes="$cantidadPagosPendientes ?? 0"
            :pagosAtrasados="$pagosAtrasados ?? 0"
            :cantidadPagosAtrasados="$cantidadPagosAtrasados ?? 0"
            :totalFacturado="$totalFacturado ?? 0"
            :facturasPendientes="$facturasPendientes ?? 0"
            :cantidadFacturasPendientes="$cantidadFacturasPendientes ?? 0"
            :facturasVencidas="$facturasVencidas ?? 0"
            :cantidadFacturasVencidas="$cantidadFacturasVencidas ?? 0"
            :gananciaNetaUtilidades="$gananciaNetaUtilidades ?? 0"
            :margenUtilidad="$margenUtilidad ?? 0"
            :proyeccionAnual="$proyeccionAnual ?? 0"
            :totalDeuda="$totalDeuda ?? 0"
            :proximosVencimientos="$proximosVencimientos ?? []"
            :ultimoPago="$ultimoPago ?? 0"
            :fechaUltimoPago="$fechaUltimoPago ?? 'N/A'"
            :variacionMensual="$variacionMensual ?? 'N/A'"
            :promedioMensual="$promedioMensual ?? 0"
            :montoPendiente="$montoPendiente ?? 0"
            :totalPendientes="$totalPendientes ?? 0"


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
