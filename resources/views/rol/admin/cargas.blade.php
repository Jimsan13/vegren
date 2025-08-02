@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/cargas.css') }}">
@endsection

@section('sidebar')
    <x-admin.sidebar />
@endsection

@section('navbar')
    <x-admin.navbar />
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4 content-header">
        <h3>Registro de cargas</h3>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row g-4">
        <x-cargas-tabs :cargas="$cargas" />

    </div>

    @include('rol.admin.modal_carga')
@endsection

@section('scripts')
    {{-- Scripts ESPECÍFICOS para cargas --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    {{-- Evitamos Popper/Bootstrap 5 si ya están en el layout.app con versión 4 --}}
    {{-- Solo carga Bootstrap 5 si NO estás cargando Bootstrap 4 en layouts.app --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    {{-- Script personalizado de cargas --}}
    <script src="{{ asset('js/cargas.js') }}"></script>
<script>
    const modal = document.getElementById('cargaEditModal');

    modal.addEventListener('hide.bs.modal', function () {
        // Si el foco está dentro del modal, quítalo para evitar el error
        if (modal.contains(document.activeElement)) {
            document.activeElement.blur();
        }
    });
</script>

    {{-- Script del sidebar si aplica --}}
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
