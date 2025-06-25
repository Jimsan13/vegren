<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Veggreen - Tu Fuente Verde</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --primary-green: #28a745; /* Verde principal */
            --darker-green: #1f8a37; /* Verde más oscuro al hover */
            --light-green-bg: #e6ffe6; /* Fondo verde muy claro - ya no se usa directamente para el degradado */
            --medium-green-bg: #d4edda; /* Fondo verde medio - ya no se usa directamente para el degradado */
            --text-dark: #333;
            --text-muted: #6c757d;
            --card-bg: rgba(255, 255, 255, 0.95); /* Fondo de tarjeta casi opaco */
            --shadow-light: 0 8px 20px rgba(0, 0, 0, 0.1);
            --shadow-hover: 0 12px 30px rgba(0, 0, 0, 0.2);
            --border-radius: 12px;
        }

        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-dark);
            overflow: hidden; /* Para el fondo fijo/animado */
            position: relative;
            background-image: url('{{ asset('images/login.jpg') }}'); /* Tu imagen de fondo */
            background-size: cover; /* Cubre todo el área */
            background-position: center; /* Centra la imagen */
            background-attachment: fixed; /* Mantiene la imagen fija al hacer scroll (aunque no hay scroll aquí) */
        }

        /* Overlay semi-transparente sobre la imagen de fondo */
        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(240, 255, 240, 0.6); /* Un overlay verde muy claro y semitransparente */
            z-index: 0;
        }

        /* Animación de fondo sutil con esferas (aún útil para dar profundidad sobre el fondo) */
        .background-spheres {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 0;
        }
        .background-spheres span {
            position: absolute;
            background: rgba(40, 167, 69, 0.15); /* Verde con un poco más de opacidad sobre la imagen */
            border-radius: 50%;
            animation: moveSpheres 20s infinite linear;
        }
        .background-spheres span:nth-child(1) { width: 60px; height: 60px; left: 10%; top: 20%; animation-duration: 18s; }
        .background-spheres span:nth-child(2) { width: 90px; height: 90px; left: 80%; top: 50%; animation-duration: 22s; animation-delay: 2s; }
        .background-spheres span:nth-child(3) { width: 70px; height: 70px; left: 30%; top: 80%; animation-duration: 15s; animation-delay: 1s; }
        .background-spheres span:nth-child(4) { width: 100px; height: 100px; left: 5%; top: 90%; animation-duration: 25s; animation-delay: 3s; }
        .background-spheres span:nth-child(5) { width: 50px; height: 50px; left: 90%; top: 10%; animation-duration: 19s; animation-delay: 0.5s; }
        @keyframes moveSpheres {
            0% { transform: translateY(0) scale(1); opacity: 0.2; }
            50% { transform: translateY(-50px) scale(1.1); opacity: 0.3; }
            100% { transform: translateY(0) scale(1); opacity: 0.2; }
        }

        .welcome-container {
            background-color: var(--card-bg);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-light);
            padding: 40px;
            text-align: center;
            max-width: 800px;
            width: 90%;
            position: relative;
            z-index: 1; /* Para que esté sobre las esferas y el fondo */
            transition: transform 0.6s cubic-bezier(0.2, 0.8, 0.2, 1); /* Curva de animación más suave */
            backdrop-filter: blur(8px); /* Efecto de cristal esmerilado más pronunciado */
            -webkit-backdrop-filter: blur(8px); /* Compatibilidad Safari */
        }
        .welcome-container.hidden {
            transform: scale(0.9) translateY(20px);
            opacity: 0;
            pointer-events: none; /* Deshabilita interacciones mientras está oculto */
        }

        .welcome-title {
            color: var(--primary-green);
            font-size: 3.8rem;
            font-weight: 700;
            margin-bottom: 15px;
            animation: fadeInDown 1s ease-out;
        }
        .welcome-subtitle {
            color: var(--text-muted);
            font-size: 1.6rem;
            margin-bottom: 40px;
            animation: fadeInUp 1.2s ease-out;
        }
        .logo-img {
            max-width: 160px;
            margin-bottom: 30px;
            animation: zoomIn 0.8s ease-out;
        }

        .btn-green-custom {
            background-color: var(--primary-green);
            border-color: var(--primary-green);
            color: white;
            padding: 14px 35px;
            border-radius: 50px;
            font-size: 1.2rem;
            font-weight: 600;
            transition: all 0.3s ease-in-out;
            margin: 0 12px;
            box-shadow: 0 4px 10px rgba(40, 167, 69, 0.3);
            animation: fadeIn 1.5s ease-out;
        }
        .btn-green-custom:hover {
            background-color: var(--darker-green);
            border-color: var(--darker-green);
            transform: translateY(-5px) scale(1.03);
            box-shadow: 0 8px 20px rgba(40, 167, 69, 0.5);
        }

        /* Animaciones para la entrada inicial */
        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes zoomIn {
            from { opacity: 0; transform: scale(0.8); }
            to { opacity: 1; transform: scale(1); }
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* Overlay de redirección profesional */
        .redirect-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.6s ease-out, visibility 0.6s ease-out;
            color: white;
            text-align: center;
            padding: 20px;
        }
        .redirect-overlay.show {
            opacity: 1;
            visibility: visible;
        }
        .redirect-message {
            font-size: 2.2rem;
            font-weight: 600;
            margin-bottom: 25px;
            animation: slideInTop 0.8s ease-out;
        }
        .redirect-subtext {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 30px;
            animation: slideInBottom 1s ease-out;
        }
        .redirect-overlay .spinner-border {
            width: 3.5rem;
            height: 3.5rem;
            border-width: 0.3em;
            color: #4CAF50;
            animation: zoomIn 0.8s ease-out;
        }
        @keyframes slideInTop {
            from { transform: translateY(-50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        @keyframes slideInBottom {
            from { transform: translateY(50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        .footer-links {
            margin-top: 40px;
            font-size: 1rem;
            color: var(--text-muted);
            animation: fadeInUp 1.8s ease-out;
        }
        .footer-links a {
            color: var(--primary-green);
            text-decoration: none;
            margin: 0 15px;
            transition: color 0.3s ease;
        }
        .footer-links a:hover {
            color: var(--darker-green);
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="background-spheres">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>

    <div class="redirect-overlay" id="redirect-overlay">
        <p class="redirect-message">¡Bienvenido de nuevo a Veggreen!</p>
        <p class="redirect-subtext">Tu sesión está activa. Redirigiendo a la página de acceso para continuar...</p>
        <div class="spinner-border text-success" role="status">
            <span class="visually-hidden">Cargando...</span>
        </div>
    </div>

    <div class="welcome-container" id="welcome-container">
        <img src="{{ asset('images/logo.png') }}" alt="Logo Veggreen" class="logo-img"> 
        
        <h1 class="welcome-title">
            <i class="bi bi-tree-fill me-2"></i>Veggreen<i class="bi bi-seedling ms-2"></i>
        </h1>
        <p class="welcome-subtitle">
            Tu conexión directa con la naturaleza: productos frescos, orgánicos y sostenibles, entregados a tu puerta.
        </p>

        <div class="mt-4">
            @if (Route::has('login'))
                @auth
                    {{-- Si el usuario está autenticado, no se muestra un botón; la redirección es automática --}}
                    {{-- El mensaje y el overlay se gestionan con JS --}}
                @else
                    {{-- Si el usuario NO está autenticado, muestra únicamente el botón para Iniciar Sesión --}}
                    <a href="{{ route('login') }}" class="btn btn-green-custom">
                        <i class="bi bi-box-arrow-in-right me-2"></i>Iniciar Sesión
                    </a>
                    {{-- El botón de Registrarse ha sido eliminado aquí --}}
                @endauth
            @endif
        </div>

        <div class="footer-links">
            <p class="mt-4 mb-2">Descubre más sobre nuestro compromiso:</p>
            <a href="#">Sobre Nosotros</a> |
            <a href="#">Nuestros Productos</a> |
            <a href="#">Contacto</a> |
            <a href="#">Privacidad</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcOdihz+8dAy313K+AY7g0qfB" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @auth
                // Si el usuario está autenticado, activamos el overlay y redirigimos
                const overlay = document.getElementById('redirect-overlay');
                const container = document.getElementById('welcome-container');

                setTimeout(() => {
                    container.classList.add('hidden'); // Oculta el contenedor principal con animación
                    setTimeout(() => {
                        overlay.classList.add('show'); // Muestra el overlay de redirección
                    }, 600); // Espera a que termine la animación de ocultar el contenedor

                    setTimeout(() => {
                        window.location.href = "{{ route('login') }}"; // Redirige al login
                    }, 3500); // Espera más tiempo para que el usuario lea el mensaje
                }, 500); // Pequeño retraso inicial
            @else
                // Para usuarios no autenticados, se mantienen las animaciones de entrada CSS por defecto.
            @endauth
        });
    </script>
</body>
</html>