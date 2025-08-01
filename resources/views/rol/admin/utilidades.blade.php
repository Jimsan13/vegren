@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/utilidades.css') }}">
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
        <h3>Módulo de Utilidades</h3>
    </div>
    <div class="row g-4">
        <x-utilidades-tabs :socios="$socios" :ingresos="$ingresos" :diferencias="$diferencias" />
    </div>

    {{-- Modal Editar Socio --}}
    <div id="modal-editar-socio" class="editar-modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('modal-editar-socio')">&times;</span>
            <h3>Editar Socio</h3>
            <form id="form-editar-socio" method="POST" action="">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="edit-socio-id">
                <div class="form-group">
                    <label for="edit-nombre">Nombre:</label>
                    <input type="text" class="form-control" id="edit-nombre" name="nombre" required>
                </div>
                <div class="form-group">
                    <label for="edit-aportacion">Aportación:</label>
                    <input type="number" class="form-control" id="edit-aportacion" name="aportacion" required>
                </div>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
        </div>
    </div>

    {{-- Modal Editar Ingreso --}}
    <div id="modal-editar-ingreso" class="editar-modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('modal-editar-ingreso')">&times;</span>
            <h3>Editar Ingreso</h3>
            <form id="form-editar-ingreso" method="POST" action="">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="edit-ingreso-id">
                <div class="form-group">
                    <label for="edit-concepto">Concepto:</label>
                    <input type="text" class="form-control" id="edit-concepto" name="concepto" required>
                </div>
                <div class="form-group">
                    <label for="edit-monto">Monto:</label>
                    <input type="number" class="form-control" id="edit-monto" name="monto" required>
                </div>
                <div class="form-group">
                    <label for="edit-fecha">Fecha:</label>
                    <input type="date" class="form-control" id="edit-fecha" name="fecha" required>
                </div>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
        </div>
    </div>

    {{-- Modal Editar Diferencia --}}
    <div id="modal-editar-diferencia" class="editar-modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('modal-editar-diferencia')">&times;</span>
            <h3>Editar Diferencia</h3>
            <form id="form-editar-diferencia" method="POST" action="">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="edit-diferencia-id">
                <div class="form-group">
                    <label for="edit-motivo">Motivo:</label>
                    <input type="text" class="form-control" id="edit-motivo" name="motivo" required>
                </div>
                <div class="form-group">
                    <label for="edit-socio-id">Socio:</label>
                    <select class="form-control" id="edit-socio-id" name="socio_id" required>
                        @foreach($socios as $socio)
                            <option value="{{ $socio->id }}">{{ $socio->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="edit-monto-dif">Monto:</label>
                    <input type="number" class="form-control" id="edit-monto-dif" name="monto" required>
                </div>
                <div class="form-group">
                    <label for="edit-tipo">Tipo:</label>
                    <select class="form-control" id="edit-tipo" name="tipo" required>
                        <option value="favor">A favor</option>
                        <option value="contra">En contra</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
        </div>
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

    function openModal(id) {
        document.getElementById(id).style.display = 'block';
    }

    function closeModal(id) {
        document.getElementById(id).style.display = 'none';
    }

    function openModalEditarSocio(id) {
        // Aquí deberías obtener los datos por AJAX o usar datos ya disponibles
        const row = document.querySelector(`[onclick="openModalEditarSocio(${id})"]`).closest('tr');
        document.getElementById('edit-socio-id').value = id;
        document.getElementById('edit-nombre').value = row.children[0].innerText;
        document.getElementById('edit-aportacion').value = row.children[1].innerText.replace(/[^0-9.]/g, '');
        document.getElementById('form-editar-socio').action = `/utilidades/socio/${id}`;
        openModal('modal-editar-socio');
    }

    function openModalEditarIngreso(id) {
        const row = document.querySelector(`[onclick="openModalEditarIngreso(${id})"]`).closest('tr');
        document.getElementById('edit-ingreso-id').value = id;
        document.getElementById('edit-concepto').value = row.children[0].innerText;
        document.getElementById('edit-monto').value = row.children[1].innerText.replace(/[^0-9.]/g, '');
        document.getElementById('edit-fecha').value = row.children[2].innerText;
        document.getElementById('form-editar-ingreso').action = `/utilidades/ingreso/${id}`;
        openModal('modal-editar-ingreso');
    }

function openModalEditarDiferencia(id) {
    const row = document.querySelector(`[onclick="openModalEditarDiferencia(${id})"]`).closest('tr');
    document.getElementById('edit-diferencia-id').value = id;
    document.getElementById('edit-motivo').value = row.children[0].innerText;
    const socioName = row.children[1].innerText;

    // Selecciona la opción correcta
    document.querySelectorAll('#edit-socio-id option').forEach(opt => {
        opt.selected = (opt.textContent === socioName);
    });

    document.getElementById('edit-monto-dif').value = row.children[2].innerText.replace(/[^0-9.]/g, '');
    document.getElementById('edit-tipo').value = row.children[3].innerText.toLowerCase();
    document.getElementById('form-editar-diferencia').action = `/utilidades/diferencia/${id}`;
    openModal('modal-editar-diferencia');
}

</script>


@endsection
