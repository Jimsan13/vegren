@extends('layouts.login')

@section('body-class', 'login-page')

@section('content')

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
