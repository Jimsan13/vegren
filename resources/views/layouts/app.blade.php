<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>VEGGREEN </title> {{-- Título dinámico para cada página --}}

    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">

    @yield('styles') {{-- Para estilos adicionales específicos de la página --}}
</head>
<body>
    <div id="app">
        <div class="d-flex" id="wrapper"> {{-- Contenedor principal de tu layout de dashboard --}}
            {{-- Aquí se incluirá el sidebar. Usarías un componente Blade, no @yield directamente aquí si es el componente --}}
            @yield('sidebar')

            <div id="page-content-wrapper">
                {{-- Aquí se incluirá el navbar. Usarías un componente Blade, no @yield directamente aquí si es el componente --}}
                @yield('navbar')

                <main class="container-fluid py-4"> {{-- Se ajusta el main para que coincida con tu estructura de dashboard --}}
                    @yield('content')
                </main>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcOdihz+8dAy313K+AY7g0qfB" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    @yield('scripts') {{-- Para scripts adicionales específicos de la página --}}
</body>
</html>