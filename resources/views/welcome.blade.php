<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Veggreen - Tu Fuente Verde</title>

    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background: linear-gradient(to right, #e8f5e9, #dcedc8); /* Degradado suave de verde */
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #333;
        }
        .welcome-container {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            padding: 40px;
            text-align: center;
            max-width: 800px;
            width: 90%;
        }
        .welcome-title {
            color: #28a745; /* Verde vibrante */
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 20px;
        }
        .welcome-subtitle {
            color: #4CAF50; /* Verde más suave */
            font-size: 1.5rem;
            margin-bottom: 30px;
        }
        .btn-green-custom {
            background-color: #28a745;
            border-color: #28a745;
            color: white;
            padding: 12px 30px;
            border-radius: 50px; /* Botones redondeados */
            font-size: 1.1rem;
            font-weight: 600;
            transition: all 0.3s ease;
            margin: 0 10px;
        }
        .btn-green-custom:hover {
            background-color: #218838;
            border-color: #218838;
            transform: translateY(-3px);
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        }
        .logo-img {
            max-width: 150px;
            margin-bottom: 30px;
        }
        .footer-links {
            margin-top: 30px;
            font-size: 0.9rem;
            color: #666;
        }
        .footer-links a {
            color: #4CAF50;
            text-decoration: none;
            margin: 0 10px;
            transition: color 0.3s ease;
        }
        .footer-links a:hover {
            color: #218838;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        {{-- Aquí puedes poner un logo si tienes uno --}}
        {{-- <img src="{{ asset('images/veggreen_logo.png') }}" alt="Veggreen Logo" class="logo-img"> --}}

        <h1 class="welcome-title">
            <i class="bi bi-tree-fill me-2"></i>Veggreen<i class="bi bi-seedling ms-2"></i>
        </h1>
        <p class="welcome-subtitle">
            Tu conexión con lo natural: Productos frescos, orgánicos y sostenibles.
        </p>

        <div class="mt-4">
            @if (Route::has('login'))
                @auth
                    {{-- Si el usuario está autenticado, el botón lo lleva a su dashboard (ruta /home que redirige por rol) --}}
                    <a href="{{ url('/home') }}" class="btn btn-green-custom">
                        <i class="bi bi-house-door-fill me-2"></i>Ir al Dashboard
                    </a>
                @else
                    {{-- Si el usuario NO está autenticado, muestra el botón para Iniciar Sesión --}}
                    <a href="{{ route('login') }}" class="btn btn-green-custom">
                        <i class="bi bi-box-arrow-in-right me-2"></i>Iniciar Sesión
                    </a>

                    {{-- Muestra el botón de Registrarse solo si la ruta de registro existe --}}
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-outline-success btn-green-custom">
                            <i class="bi bi-person-plus-fill me-2"></i>Registrarse
                        </a>
                    @endif
                @endauth
            @endif
        </div>

        <div class="footer-links">
            <p class="mt-4 mb-2">Conoce más sobre nuestra misión:</p>
            <a href="#">Sobre Nosotros</a> |
            <a href="#">Nuestros Productos</a> |
            <a href="#">Contacto</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcOdihz+8dAy313K+AY7g0qfB" crossorigin="anonymous"></script>
</body>
</html>