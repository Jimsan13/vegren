@extends('layouts.app')

@section('content')
<style>
   body {
    background-image: url('../images/login.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}

    .login-card {
        background-color: white;
        border-radius: 1.5rem;
        padding: 2.5rem;
        box-shadow: 0 0 20px rgba(0,0,0,0.1);
        width: 100%;
        max-width: 450px;
    }

    .form-icon {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #6c757d;
    }

    .form-group {
        position: relative;
    }

    .btn-green {
        background-color: #00994c;
        color: white;
        border-radius: 1.5rem;
        padding: 0.5rem 1.5rem;
        font-weight: bold;
    }

    .btn-green:hover {
        background-color: #007a3a;
    }
</style>

<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="login-card text-center">
        <!-- Logo -->
        <img src="{{ asset('images/logo.png') }}" alt="" class="mb-3" style="max-width: 180px;">

        <!-- Título -->
        <h4 class="text-success mb-1">Bienvenido a Vegreen</h4>
        <p class="mb-4">Sistema Integral de Control Interno</p>

        <!-- Formulario -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Correo electrónico -->
            <div class="mb-3 form-group">
                <input type="email" name="email" id="email"
                    class="form-control @error('email') is-invalid @enderror"
                    placeholder="Ingresa tu correo" value="{{ old('email') }}" required autofocus>
                <i class="fas fa-envelope form-icon"></i>

                @error('email')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Contraseña -->
            <div class="mb-3 form-group">
                <input type="password" name="password" id="password"
                    class="form-control @error('password') is-invalid @enderror"
                    placeholder="Ingresa tu contraseña" required>
                <i class="fas fa-lock form-icon"></i>

                @error('password')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Botón de inicio de sesión -->
            <div class="d-grid mb-3">
                <button type="submit" class="btn btn-green">Iniciar Sesión</button>
            </div>

            <!-- Enlace de contraseña olvidada -->
            @if (Route::has('password.request'))
                <div>
                    <a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
                </div>
            @endif
        </form>
    </div>
</div>

<!-- FontAwesome -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
@endsection
