@extends('layouts.app')

<style>
    body {
        background: #f0f2f5;
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
        color: #2c3e50;
        gap: 10px;
        border-bottom: 1px solid #ddd;
        padding-bottom: 15px;
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
        color: #27ae60;
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
        border-color: #27ae60;
        box-shadow: 0 0 0 3px rgba(39, 174, 96, 0.15);
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
        background-color: #27ae60;
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
        background-color: #219150;
    }

</style>

@section('content')
<div class="form-wrapper">
    <div class="form-card">
        <div class="form-header">
            <i class="fas fa-plus-circle"></i> Agregar Ingreso
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

        <form method="POST" action="{{ route('finanzas.ingresos.store') }}">
            @csrf

            <label for="fecha"><i class="fas fa-calendar-alt"></i> Fecha</label>
            <input type="date" name="fecha" id="fecha" required>

            <label for="descripcion"><i class="fas fa-align-left"></i> Descripción</label>
            <input type="text" name="descripcion" id="descripcion" placeholder="Ej: Venta de Producto X" required>

            <label for="categoria"><i class="fas fa-tags"></i> Categoría</label>
            <select name="categoria" id="categoria" required>
                <option value="">Seleccione una categoría</option>
                <option value="Ventas">Ventas</option>
                <option value="Servicios">Servicios</option>
                <option value="Inversiones">Inversiones</option>
                <option value="Otros">Otros</option>
            </select>

            <label for="monto"><i class="fas fa-dollar-sign"></i> Monto ($)</label>
            <input type="number" name="monto" id="monto" step="0.01" placeholder="Ej: 1500.00" required>

            <label for="estado"><i class="fas fa-info-circle"></i> Estado</label>
            <select name="estado" id="estado" required>
                <option value="">Seleccione el estado</option>
                <option value="Recibido">Recibido</option>
                <option value="Pendiente">Pendiente</option>
            </select>

            <div class="form-actions">
                <a href="{{ route('finanzas.index') }}" class="btn-cancel"><i class="fas fa-arrow-left"></i> Cancelar</a>
                <button type="submit" class="btn-submit"><i class="fas fa-check-circle"></i> Guardar Ingreso</button>
            </div>
        </form>
    </div>
</div>
@endsection
