@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/provedores.css') }}">
@endsection

@section('sidebar')
    <x-admin.sidebar />
@endsection

@section('navbar')
    <x-admin.navbar />
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4 content-header">
        <h3>Registro de proveedores</h3>
    </div>
    <div class="row g-4">
        <x-provedores-tabs 
            :todos="$todos" 
            :activos="$activos" 
            :facturados="$facturados" 
            :pendientes="$pendientes"
            :totalCajasTodos="$totalCajasTodos"
            :totalMontoTodos="$totalMontoTodos"
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
