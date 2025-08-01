@extends('layouts.app')

@section('title', 'Editar Empacador')

@section('content')
<div class="container py-5">
    <div class="card shadow-sm mx-auto" style="max-width: 700px;">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Editar Empacador</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('empacadores.update', $empacador->id) }}" method="POST" class="needs-validation" novalidate>
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="empleado" class="form-label fw-semibold">Nombre del Empleado</label>
                    <input 
                        type="text" 
                        class="form-control form-control-lg @error('empleado') is-invalid @enderror" 
                        id="empleado" 
                        name="empleado" 
                        value="{{ old('empleado', $empacador->empleado) }}" 
                        required
                    >
                    <div class="invalid-feedback">Por favor ingresa el nombre del empleado.</div>
                </div>

                <div class="row g-4">
                    <div class="col-md-4">
                        <label for="cajas_semanal" class="form-label fw-semibold">Cajas Semanal</label>
                        <input 
                            type="number" min="0" 
                            class="form-control form-control-lg @error('cajas_semanal') is-invalid @enderror" 
                            id="cajas_semanal" 
                            name="cajas_semanal" 
                            value="{{ old('cajas_semanal', $empacador->cajas_semanal) }}" 
                            required
                        >
                        <div class="invalid-feedback">Por favor ingresa la cantidad de cajas semanal.</div>
                    </div>
                    <div class="col-md-4">
                        <label for="reempaques" class="form-label fw-semibold">Reempaques</label>
                        <input 
                            type="number" min="0" 
                            class="form-control form-control-lg @error('reempaques') is-invalid @enderror" 
                            id="reempaques" 
                            name="reempaques" 
                            value="{{ old('reempaques', $empacador->reempaques) }}" 
                            required
                        >
                        <div class="invalid-feedback">Por favor ingresa la cantidad de reempaques.</div>
                    </div>
                    <div class="col-md-4">
                        <label for="descargas" class="form-label fw-semibold">Descargas</label>
                        <input 
                            type="number" min="0" 
                            class="form-control form-control-lg @error('descargas') is-invalid @enderror" 
                            id="descargas" 
                            name="descargas" 
                            value="{{ old('descargas', $empacador->descargas) }}" 
                            required
                        >
                        <div class="invalid-feedback">Por favor ingresa la cantidad de descargas.</div>
                    </div>
                </div>

                <div class="mt-4">
                    <label for="descuentos" class="form-label fw-semibold">Descuentos ($)</label>
                    <input 
                        type="number" step="0.01" min="0" 
                        class="form-control form-control-lg @error('descuentos') is-invalid @enderror" 
                        id="descuentos" 
                        name="descuentos" 
                        value="{{ old('descuentos', $empacador->descuentos) }}" 
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
                        value="{{ old('total_pagar', $empacador->total_pagar) }}" 
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
