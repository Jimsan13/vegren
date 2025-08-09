@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 90vh;">
    <div class="card shadow border-0 rounded-4" style="width: 100%; max-width: 550px;">
        <div class="card-body p-5">
            <h3 class="text-center mb-4 text-primary fw-bold">✎ Editar Movimiento</h3>

            <form method="POST" action="{{ route('gastos-movimientos.update', $movimiento->id) }}">
                @csrf
                @method('PUT')

                <div class="form-floating mb-3">
                    <input type="date" name="fecha" id="fecha" value="{{ old('fecha', $movimiento->fecha) }}" class="form-control rounded-3" required>
                    <label for="fecha">Fecha</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="descripcion" id="descripcion" value="{{ old('descripcion', $movimiento->descripcion) }}" class="form-control rounded-3" placeholder="Descripción" required>
                    <label for="descripcion">Descripción</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="number" step="0.01" name="monto" id="monto" value="{{ old('monto', $movimiento->monto) }}" class="form-control rounded-3" placeholder="Monto" required>
                    <label for="monto">Monto</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="tipo" id="tipo" value="{{ old('tipo', $movimiento->tipo) }}" class="form-control rounded-3" placeholder="Tipo">
                    <label for="tipo">Tipo (opcional)</label>
                </div>

                <div class="form-floating mb-4">
                    <select name="categoria" id="categoria" class="form-select rounded-3" required>
                        <option value="planta" {{ $movimiento->categoria == 'planta' ? 'selected' : '' }}>Planta</option>
                        <option value="insumos" {{ $movimiento->categoria == 'insumos' ? 'selected' : '' }}>Insumos</option>
                        <option value="gastosextras" {{ $movimiento->categoria == 'gastosextras' ? 'selected' : '' }}>Gastos Extras</option>
                        <option value="campo" {{ $movimiento->categoria == 'campo' ? 'selected' : '' }}>Campo</option>
                    </select>
                    <label for="categoria">Categoría</label>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.campo') }}" class="btn btn-outline-secondary w-45">← Cancelar</a>
                    <button type="submit" class="btn btn-primary w-45">💾 Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
