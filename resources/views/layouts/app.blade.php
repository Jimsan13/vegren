<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

   
    <title>VEGGREEN @yield('title', '')</title> {{-- Título dinámico para cada página --}}

    {{-- BOOTSTRAP 4.5.2 CSS --}}
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    {{-- FONT AWESOME 5.15.4 CSS (CDN, para evitar problemas de CORS del kit.js) --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" xintegrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- Si la integridad de Font Awesome da error, puedes quitar el atributo integrity y crossorigin para probar --}}

    {{-- BOOTSTRAP ICONS (Si lo usas, se mantiene) --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- Tus propios estilos CSS (usando Vite para Laravel moderno). ¡Estos son CRUCIALES! --}}
    @vite(['resources/sass/app.scss'])

    <link href="{{ asset('css/login.css') }}" rel="stylesheet"> 
   <link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
 
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">


    @yield('styles') {{-- Para estilos adicionales específicos de la página --}}
</head>
<body>
    <div id="app">
        <div class="d-flex" id="wrapper"> {{-- Contenedor principal de tu layout de dashboard --}}
            @yield('sidebar')

            <div id="page-content-wrapper">
                @yield('navbar')

                <main class="container-fluid py-4">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>

    {{-- SCRIPTS JAVASCRIPT (¡ORDEN CRÍTICO PARA BOOTSTRAP 4 CON JQUERY!) --}}

    {{-- 1. jQuery (Versión slim, para Bootstrap 4) --}}
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" xintegrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    {{-- 2. Popper.js (Necesario para modales, tooltips, etc. en Bootstrap 4) --}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" xintegrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>

    {{-- 3. Bootstrap 4.5.2 JS (Depende de jQuery y Popper) --}}
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" xintegrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57B+Y1dJwhW4iYpE5a2q51fJz6c/J9u2K" crossorigin="anonymous"></script>

    {{-- Tus propios scripts JS (usando Vite para Laravel moderno). ¡Este es CRUCIAL! --}}
    @vite(['resources/js/app.js'])

    @yield('scripts') {{-- Para scripts adicionales específicos de la página --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>