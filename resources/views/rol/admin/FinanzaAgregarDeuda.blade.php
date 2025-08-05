@extends('layouts.app')

<style>
    body {
        background: #fff;
        font-family: 'Segoe UI', sans-serif;
    }

    .form-wrapper {
        max-width: 700px;
        margin: 50px auto;
        padding: 0 15px;
    }

    .form-card {
        background: #fff;
        border-radius: 12px;
        padding: 35px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
    }

    .form-header {
        margin-bottom: 30px;
        display: flex;
        align-items: center;
        font-size: 1.6rem;
        font-weight: bold;
        color: #c0392b; /* Rojo de deudas */
        gap: 10px;
        border-bottom: 1px solid #ddd;
        padding-bottom: 15px;
    }

    .form-header i {
        color: #c0392b;
    }

    .error-box {
        background: #ffeaea;
        border-left: 4px solid #e74c3c;
        padding: 12px 16px;
        margin-bottom: 20px;
        color: #c0392b;
        border-radius: 6px;
    }

    label {
        display: flex;
        align-items: center;
        font-weight: 600;
        color: #34495e;
        margin-bottom: 8px;
        font-size: 0.95rem;
    }

    label i {
        margin-right: 8px;
        color: #c0392b;
        font-size: 1rem;
    }

    input[type="text"],
    input[type="date"],
    input[type="number"],
    select {
        width: 100%;
        padding: 12px 14px;
        margin-bottom: 22px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 1rem;
        transition: border-color 0.3s, box-shadow 0.3s;
    }

    input:focus,
    select:focus {
        border-color: #e74c3c;
        box-shadow: 0 0 0 3px rgba(231, 76, 60, 0.15);
        outline: none;
    }

    .form-actions {
        display: flex;
        justify-content: space-between;
        margin-top: 35px;
    }

    .btn-cancel {
        background-color: #ecf0f1;
        color: #2c3e50;
        padding: 12px 24px;
        border-radius: 8px;
        font-weight: 600;
        text-decoration: none;
        border: none;
        user-select: none;
        box-shadow: none;
        transition: background-color 0.3s;
    }

    .btn-cancel:hover {
        background-color: #d0d3d4;
    }

    .btn-submit {
        background-color: #c0392b;
        color: white;
        border: none;
        padding: 12px 24px;
        font-weight: 600;
        font-size: 1rem;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-submit:hover {
        background-color: #a93226;
    }
</style>

@section('content')
<div class="form-wrapper">
    <div class="form-card">
        <div class="form-header">
            <i class="fas fa-hand-holding-usd"></i> Agregar Deuda
        </div>

        @if ($errors->any())
            <div class="error-box">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('finanzas.deudas.store') }}">
            @csrf

            <label for="fecha"><i class="fas fa-calendar-alt"></i> Fecha de Registro</label>
            <input type="date" name="fecha" id="fecha" required>

            <label for="proveedor"><i class="fas fa-user"></i> Proveedor / Banco</label>
            <input type="text" name="proveedor" id="proveedor" placeholder="Ej: Banco Rural" required>

            <label for="concepto"><i class="fas fa-align-left"></i> Concepto</label>
            <input type="text" name="concepto" id="concepto" placeholder="Ej: Compra fertilizante" required>

            <label for="monto_original"><i class="fas fa-dollar-sign"></i> Monto Original</label>
            <input type="number" name="monto_original" id="monto_original" step="0.01" required>

            <label for="fecha_vencimiento"><i class="fas fa-calendar-times"></i> Fecha de Vencimiento</label>
            <input type="date" name="fecha_vencimiento" id="fecha_vencimiento" required>

            <label for="estado"><i class="fas fa-info-circle"></i> Estado</label>
            <select name="estado" id="estado" required>
                <option value="">Seleccione estado</option>
                <option value="Pendiente">Pendiente</option>
                <option value="Pagado">Pagado</option>
                <option value="Atrasado">Atrasado</option>
            </select>

            <div class="form-actions">
                <a href="{{ route('finanzas.deudas') }}" class="btn-cancel">
                    <i class="fas fa-arrow-left"></i> Cancelar
                </a>
                <button type="submit" class="btn-submit">
                    <i class="fas fa-check-circle"></i> Guardar Deuda
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
