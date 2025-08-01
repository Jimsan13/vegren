@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 600px; margin: 40px auto; padding: 20px; background: #fff; box-shadow: 0 0 10px rgba(0,0,0,0.1); border-radius: 8px;">
    <h3 class="mb-4 text-center">Editar Proveedor</h3>

    <form method="POST" action="{{ route('proveedores.update', $proveedor->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nombre:</label>
            <input type="text" name="nombre_proveedor" value="{{ old('nombre_proveedor', $proveedor->nombre) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Empacador:</label>
            <input type="text" name="empacador" value="{{ old('empacador', $proveedor->empacador) }}" class="form-control">
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Cajas Entregadas:</label>
                <input type="number" name="cajas_entregadas" value="{{ old('cajas_entregadas', $proveedor->cajas_entregadas) }}" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Cajas Empacadas:</label>
                <input type="number" name="cajas_empacadas" value="{{ old('cajas_empacadas', $proveedor->cajas_empacadas) }}" class="form-control">
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Fecha:</label>
            <input type="date" name="fecha" value="{{ old('fecha', $proveedor->fecha) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Estado:</label>
            <input type="text" name="estado" value="{{ old('estado', $proveedor->estado) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Monto:</label>
            <input type="number" step="0.01" name="monto" value="{{ old('monto', $proveedor->monto) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Tipo:</label>
            <select name="tipo" class="form-select">
                <option value="">-- Seleccionar --</option>
                <option value="activos" {{ $proveedor->tipo == 'activos' ? 'selected' : '' }}>Activo</option>
                <option value="facturados" {{ $proveedor->tipo == 'facturados' ? 'selected' : '' }}>Facturado</option>
                <option value="pendientes" {{ $proveedor->tipo == 'pendientes' ? 'selected' : '' }}>Pendiente</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Número de Factura:</label>
            <input type="text" name="numero_factura" value="{{ old('numero_factura', $proveedor->numero_factura) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Estado de Factura:</label>
            <input type="text" name="estado_factura" value="{{ old('estado_factura', $proveedor->estado_factura) }}" class="form-control">
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('admin.proveedores') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
