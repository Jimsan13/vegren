<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>VEGGREEN - Dashboard</title>

    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Bootstrap Icons CSS CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Font Awesome CSS CDN (opcional, solo si usas iconos fas fa-...) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Estilos personalizados -->
    <style>
        /* Aquí irían todos los estilos CSS que tenías en el archivo PHP principal. */
        /* Los he omitido por brevedad para no duplicar un código que no funcionará como esperas */
        /* Debes copiar y pegar el <style> completo del index.php anterior aquí si quieres los estilos. */
        :root {
            --primary-green: #4CAF50;
            --dark-green: #388E3C;
            --light-green: #E8F5E9;
            --lighter-green: #DCEDC8;
            --text-dark: #333;
            --text-light: #666;
            --card-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }

        body {
            font-family: 'Nunito', sans-serif;
            display: flex;
            min-height: 100vh;
            background-color: #f8f9fa;
            overflow-x: hidden;
        }

        #wrapper { display: flex; width: 100%; }
        #sidebar-wrapper {
            width: 250px; transition: all 0.3s ease-in-out; background-color: var(--light-green);
            color: var(--text-dark); border-right: 1px solid rgba(0, 0, 0, 0.1); flex-shrink: 0;
            padding: 20px; box-shadow: 0.5rem 0 1rem rgba(0, 0, 0, 0.05);
        }
        .sidebar-heading {
            background-color: var(--dark-green); color: white; padding: 1.5rem 1rem;
            text-align: center; font-weight: 700; font-size: 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2); margin-bottom: 1rem; border-radius: 0.5rem;
        }
        .sidebar-heading img { height: 50px; margin-bottom: 0.5rem; }
        #sidebar-wrapper .list-group-item {
            color: var(--text-dark); background-color: transparent; border: none; font-weight: 500;
            padding: 0.75rem 1.5rem; display: flex; align-items: center; border-radius: 0.5rem;
            margin-bottom: 0.25rem;
        }
        #sidebar-wrapper .list-group-item i { margin-right: 0.75rem; font-size: 1.2rem; color: var(--primary-green); }
        #sidebar-wrapper .list-group-item.active { background-color: var(--primary-green); color: white; }
        #sidebar-wrapper .list-group-item.active i { color: white; }
        #sidebar-wrapper .list-group-item:hover:not(.active) { background-color: var(--lighter-green); }

        #page-content-wrapper {
            flex-grow: 1; display: flex; flex-direction: column; min-width: 0; padding: 20px;
        }
        .navbar-custom {
            padding: 0.75rem 1.5rem; background-color: white !important; border-bottom: 1px solid #dee2e6;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075); z-index: 1000; margin-bottom: 1.5rem;
            border-radius: 0.5rem;
        }
        .navbar-custom .nav-link { color: var(--text-dark); font-weight: 500; }
        .navbar-custom .nav-link i { margin-right: 0.5rem; }

        #wrapper.toggled #sidebar-wrapper { margin-left: -250px; }

        .card-custom {
            border-radius: 1rem; box-shadow: var(--card-shadow); transition: transform 0.2s ease-in-out;
            border: none; padding: 1.5rem; background-color: #e0ffe0; height: 100%; display: flex;
            flex-direction: column; align-items: center; justify-content: center; text-align: center;
        }
        .card-custom:hover { transform: translateY(-5px); }
        .card-custom i { font-size: 3em; margin-bottom: 1rem; color: #28a745; }
        .card-custom .card-title { font-weight: 600; color: var(--text-dark); margin-bottom: 0.5rem; }
        .card-custom .card-text { font-size: 0.9rem; color: var(--text-light); margin-bottom: 1rem; }
        .btn-custom {
            background-color: #28a745; border-color: #28a745; color: white; border-radius: 0.5rem;
            padding: 0.5rem 1.5rem; font-weight: 500; transition: background-color 0.2s ease-in-out, border-color 0.2s ease-in-out;
        }
        .btn-custom:hover { background-color: #218838; border-color: #1e7e34; color: white; }
        .content-header h3 { color: var(--text-dark); font-weight: 700; margin-bottom: 1.5rem; }
        .header-top-right { text-align: right; font-size: 0.9em; color: #555; }
        .header-top-right .bi { margin-right: 5px; }

        @media (min-width: 768px) {
            #sidebar-wrapper { margin-left: 0; position: relative; }
            #page-content-wrapper { width: auto; margin-left: 0; }
        }
        @media (max-width: 767.98px) {
            #sidebar-wrapper { margin-left: -250px; position: fixed; height: 100vh; z-index: 1001; box-shadow: 0.5rem 0 1rem rgba(0, 0, 0, 0.1); }
            #page-content-wrapper { width: 100vw; margin-left: 0; }
            #wrapper.toggled #sidebar-wrapper { margin-left: 0; }
            #wrapper.toggled #page-content-wrapper { margin-left: 250px; }
            .navbar .container-fluid { padding-right: 0 !important; padding-left: 0 !important; }
            .content-header h3 { padding-left: 0.5rem; }
        }
    </style>
</head>
<body>

    <div class="d-flex" id="wrapper">
        <!-- ADVERTENCIA: Esta sección intenta incluir un archivo PHP, PERO ESTE ARCHIVO ES HTML y NO PROCESARÁ PHP. -->
        <!-- Verás el código PHP sin ejecutar en tu navegador. -->
        <!-- Para que esto funcione, este archivo DEBE ser .php -->
        <!-- Copia y pega el contenido del sidebar.php directamente aquí si quieres que se vea SIN PHP. -->
        <!-- Si quieres que PHP funcione, renombra este archivo a index.php -->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-color-bg text-white">
            <img src="{{ asset('images/logo.png') }}" alt="" class="mb-3" style="max-width: 200px;">
              
           
            </div>
            <nav class="nav flex-column list-group list-group-flush">
                <a class="list-group-item list-group-item-action active" href="#"> <i class="bi bi-speedometer"></i> Dashboard </a>
                <a class="list-group-item list-group-item-action" href="#"> <i class="bi bi-truck"></i> Cargas </a>
                <a class="list-group-item list-group-item-action" href="#"> <i class="bi bi-box-seam"></i> Gastos </a>
                <a class="list-group-item list-group-item-action" href="#"> <i class="bi bi-graph-up"></i> Ventas </a>
                <a class="list-group-item list-group-item-action" href="#"> <i class="bi bi-shop"></i> Almacén </a>
                <a class="list-group-item list-group-item-action" href="#"> <i class="bi bi-people"></i> Nómina </a>
                <a class="list-group-item list-group-item-action" href="#"> <i class="bi bi-cash-stack"></i> Utilidades </a>
                <a class="list-group-item list-group-item-action" href="#"> <i class="bi bi-currency-dollar"></i> Efectivo </a>
                <a class="list-group-item list-group-item-action" href="#"> <i class="bi bi-box"></i> Productos </a>
                <a class="list-group-item list-group-item-action" href="#"> <i class="bi bi-truck-flatbed"></i> Proveedores </a>
                <a class="list-group-item list-group-item-action" href="#"> <i class="bi bi-bar-chart"></i> Resultado </a>
                <a class="list-group-item list-group-item-action" href="#"> <i class="bi bi-cash"></i> Finanzas </a>
                <a class="list-group-item list-group-item-action" href="#"> <i class="bi bi-geo-alt"></i> Campo </a>
            </nav>
        </div>

        <div id="page-content-wrapper">
            <!-- ADVERTENCIA: Esta sección intenta incluir un archivo PHP, PERO ESTE ARCHIVO ES HTML y NO PROCESARÁ PHP. -->
            <!-- Verás el código PHP sin ejecutar en tu navegador. -->
            <!-- Si quieres que PHP funcione, renombra este archivo a index.php -->
            <!-- Copia y pega el contenido del navbar.php directamente aquí si quieres que se vea SIN PHP. -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom navbar-custom">
                <div class="container-fluid">
                    <button class="btn btn-success" id="sidebarToggle">Toggle Menu</button>
                    <div class="ms-auto d-flex align-items-center">
                        <div class="header-top-right me-3">
                            <p class="mb-0">
                                <i class="bi bi-person-fill"></i> Ful Administrador <!-- Este PHP no se ejecutará -->
                                <br>
                                <i class="bi bi-calendar-check"></i> 06/06/2025 <!-- Este PHP no se ejecutará -->
                            </p>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Contenido del Dashboard (las tarjetas) -->
            <!-- Si este contenido viene de un archivo PHP (dashboard.php), TAMPOCO SE INCLUIRÁ AQUÍ. -->
            <!-- Debes copiar y pegar el contenido de las tarjetas directamente aquí si quieres que se vea SIN PHP. -->
            <!-- Si quieres que PHP funcione, renombra este archivo a index.php -->
            <div class="container-fluid py-4">
                <div class="d-flex justify-content-between align-items-center mb-4 content-header">
                    <h3>Resumen General</h3>
                </div>
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="card card-custom">
                            <i class="bi bi-truck"></i>
                            <h5 class="card-title">Carga</h5>
                            <p class="card-text">Registra nueva carga en el sistema</p>
                            <a href="#" class="btn btn-custom">Nueva Carga</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-custom">
                            <i class="bi bi-currency-dollar"></i>
                            <h5 class="card-title">Gastos</h5>
                            <p class="card-text">Añadir Gastos Recientes</p>
                            <a href="#" class="btn btn-custom">Registrar</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-custom">
                            <i class="bi bi-piggy-bank"></i>
                            <h5 class="card-title">Utilidades</h5>
                            <p class="card-text">Gestiona Pagos y Empleados</p>
                            <a href="#" class="btn btn-custom">Ver Utilidades</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-custom">
                            <i class="bi bi-graph-up"></i>
                            <h5 class="card-title">Ventas</h5>
                            <p class="card-text">Consulta el Resumen de Ventas</p>
                            <a href="#" class="btn btn-custom">Ver ventas</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-custom">
                            <i class="bi bi-cash-coin"></i>
                            <h5 class="card-title">Efectivo</h5>
                            <p class="card-text">Visualiza los Gastos Frecuentes</p>
                            <a href="#" class="btn btn-custom">Ver efectivo</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-custom">
                            <i class="bi bi-geo-alt"></i>
                            <h5 class="card-title">Campo</h5>
                            <p class="card-text">Ver los Campos</p>
                            <a href="#" class="btn btn-custom">Ver campo</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-custom">
                            <i class="bi bi-box-seam"></i>
                            <h5 class="card-title">Productos</h5>
                            <p class="card-text">Consulta el Resumen de Productos</p>
                            <a href="#" class="btn btn-custom">Ver productos</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-custom">
                            <i class="bi bi-people"></i>
                            <h5 class="card-title">Proveedores</h5>
                            <p class="card-text">Visualiza los gastos restantes</p>
                            <a href="#" class="btn btn-custom">Ver proveedores</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-custom">
                            <i class="bi bi-building"></i>
                            <h5 class="card-title">Almacén</h5>
                            <p class="card-text">Registra nuevo cargo en el sistema</p>
                            <a href="#" class="btn btn-custom">Inspeccionar almacén</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-custom">
                            <i class="bi bi-cash"></i>
                            <h5 class="card-title">Finanzas</h5>
                            <p class="card-text">Registra nuevo cargo en el sistema</p>
                            <a href="#" class="btn btn-custom">Ver finanzas</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-custom">
                            <i class="bi bi-bar-chart"></i>
                            <h5 class="card-title">Resultado</h5>
                            <p class="card-text">Visualiza el resultado</p>
                            <a href="#" class="btn btn-custom">Ver resultado</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-custom">
                            <i class="bi bi-person-badge"></i>
                            <h5 class="card-title">Nómina</h5>
                            <p class="card-text">Registra nueva carga en el sistema</p>
                            <a href="#" class="btn btn-custom">Visualizar nómina</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcOdihz+8dAy313K+AY7g0qfB" crossorigin="anonymous"></script>

    <!-- Script para el toggle del sidebar -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var sidebarToggle = document.getElementById('sidebarToggle');
            var wrapper = document.getElementById('wrapper');

            if (sidebarToggle && wrapper) {
                sidebarToggle.addEventListener('click', function () {
                    wrapper.classList.toggle('toggled');
                });
            }
        });
    </script>
</body>