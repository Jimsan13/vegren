@extends('layouts.app')

@section('title', 'Editar Enhielador')

@section('content')
<div class="container py-5">
    <div class="card shadow-sm mx-auto" style="max-width: 700px;">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Editar Enhielador</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('enhieladores.update', $enhielador->id) }}" method="POST" class="needs-validation" novalidate>
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="empleado" class="form-label fw-semibold">Nombre del Empleado</label>
                    <input 
                        type="text" 
                        class="form-control form-control-lg @error('empleado') is-invalid @enderror" 
                        id="empleado" 
                        name="empleado" 
                        value="{{ old('empleado', $enhielador->empleado) }}" 
                        required
                    >
                    <div class="invalid-feedback">Por favor ingresa el nombre del empleado.</div>
                </div>

                <div class="row g-4">
                    <div class="col-md-4">
                        <label for="tarimas_trabajadas" class="form-label fw-semibold">Tarimas Trabajadas</label>
                        <input 
                            type="number" min="0" 
                            class="form-control form-control-lg @error('tarimas_trabajadas') is-invalid @enderror" 
                            id="tarimas_trabajadas" 
                            name="tarimas_trabajadas" 
                            value="{{ old('tarimas_trabajadas', $enhielador->tarimas_trabajadas) }}" 
                            required
                        >
                        <div class="invalid-feedback">Por favor ingresa la cantidad de tarimas trabajadas.</div>
                    </div>
                    <div class="col-md-4">
                        <label for="rengeladas" class="form-label fw-semibold">Rengeladas</label>
                        <input 
                            type="number" min="0" 
                            class="form-control form-control-lg @error('rengeladas') is-invalid @enderror" 
                            id="rengeladas" 
                            name="rengeladas" 
                            value="{{ old('rengeladas', $enhielador->rengeladas) }}" 
                            required
                        >
                        <div class="invalid-feedback">Por favor ingresa la cantidad de rengeladas.</div>
                    </div>
                    <div class="col-md-4">
                        <label for="actividades_adicionales" class="form-label fw-semibold">Actividades Adicionales</label>
                        <input 
                            type="text" 
                            class="form-control form-control-lg @error('actividades_adicionales') is-invalid @enderror" 
                            id="actividades_adicionales" 
                            name="actividades_adicionales" 
                            value="{{ old('actividades_adicionales', $enhielador->actividades_adicionales) }}"
                        >
                    </div>
                </div>

                <div class="mt-4">
                    <label for="descuentos" class="form-label fw-semibold">Descuentos ($)</label>
                    <input 
                        type="number" step="0.01" min="0" 
                        class="form-control form-control-lg @error('descuentos') is-invalid @enderror" 
                        id="descuentos" 
                        name="descuentos" 
                        value="{{ old('descuentos', $enhielador->descuentos) }}" 
                        required
                    >
                    <div class="invalid-feedback">Por favor ingresa los descuentos.</div>
                </div>

                <div class="mt-4">
                    <label for="total_pagar" class="form-label fw-semibold">Total a Pagar ($)</label>
                    <input 
                        type="number" step="0.01" min="0" 
                        class="form-control form-control-lg @error('total_pagar') is-invalid @enderror" 
                        id="total_pagar" 
                        name="total_pagar" 
                        value="{{ old('total_pagar', $enhielador->total_pagar) }}" 
                        required
                    >
                    <div class="invalid-feedback">Por favor ingresa el total a pagar.</div>
                </div>

                <div class="d-flex justify-content-end mt-5 gap-3">
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
