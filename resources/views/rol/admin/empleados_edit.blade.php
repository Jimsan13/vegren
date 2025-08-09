@extends('layouts.app')

@section('title', 'Editar Empleado')

@section('content')
<div class="container py-5">
    <div class="card shadow-sm mx-auto" style="max-width: 700px;">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0 text-center">Editar Empleado</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('empleados.update', $empleado->id) }}" method="POST" class="needs-validation" novalidate>
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="nombre_completo" class="form-label fw-semibold">Nombre Completo <span class="text-danger">*</span></label>
                    <input 
                        type="text" 
                        class="form-control form-control-lg @error('nombre_completo') is-invalid @enderror" 
                        id="nombre_completo" 
                        name="nombre_completo" 
                        value="{{ old('nombre_completo', $empleado->nombre_completo) }}" 
                        required
                        placeholder="Ej. Juan Pérez"
                    >
                    <div class="invalid-feedback">Por favor ingresa el nombre completo.</div>
                    @error('nombre_completo')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="puesto" class="form-label fw-semibold">Puesto <span class="text-danger">*</span></label>
                    <input 
                        type="text" 
                        class="form-control form-control-lg @error('puesto') is-invalid @enderror" 
                        id="puesto" 
                        name="puesto" 
                        value="{{ old('puesto', $empleado->puesto) }}" 
                        required
                        placeholder="Ej. Administrativo"
                    >
                    <div class="invalid-feedback">Por favor ingresa el puesto.</div>
                    @error('puesto')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="salario_base" class="form-label fw-semibold">Salario Base ($) <span class="text-danger">*</span></label>
                    <input 
                        type="number" 
                        step="0.01" 
                        min="0" 
                        class="form-control form-control-lg @error('salario_base') is-invalid @enderror" 
                        id="salario_base" 
                        name="salario_base" 
                        value="{{ old('salario_base', $empleado->salario_base) }}" 
                        required
                        placeholder="Ej. 12000.00"
                    >
                    <div class="invalid-feedback">Por favor ingresa el salario base.</div>
                    @error('salario_base')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="fecha_contratacion" class="form-label fw-semibold">Fecha de Contratación <span class="text-danger">*</span></label>
                    <input 
                        type="date" 
                        class="form-control form-control-lg @error('fecha_contratacion') is-invalid @enderror" 
                        id="fecha_contratacion" 
                        name="fecha_contratacion" 
                        value="{{ old('fecha_contratacion', $empleado->fecha_contratacion) }}"
                        required
                    >
                    <div class="invalid-feedback">Por favor ingresa la fecha de contratación.</div>
                    @error('fecha_contratacion')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="telefono" class="form-label fw-semibold">Teléfono</label>
                    <input 
                        type="tel" 
                        class="form-control form-control-lg @error('telefono') is-invalid @enderror" 
                        id="telefono" 
                        name="telefono" 
                        value="{{ old('telefono', $empleado->telefono) }}" 
                        placeholder="Ej. 5551234567"
                    >
                    @error('telefono')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="form-label fw-semibold">Correo Electrónico</label>
                    <input 
                        type="email" 
                        class="form-control form-control-lg @error('email') is-invalid @enderror" 
                        id="email" 
                        name="email" 
                        value="{{ old('email', $empleado->email) }}" 
                        placeholder="Ej. correo@ejemplo.com"
                    >
                    @error('email')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end gap-3">
                    <a href="{{ route('admin.nomina') }}" class="btn btn-outline-secondary btn-lg">Cancelar</a>
                    <button type="submit" class="btn btn-primary btn-lg">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
// Bootstrap validation
(() => {
  'use strict'
  const forms = document.querySelectorAll('.needs-validation')
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', e => {
      if (!form.checkValidity()) {
        e.preventDefault()
        e.stopPropagation()
      }
      form.classList.add('was-validated')
    }, false)
  })
})()
</script>
@endsection
