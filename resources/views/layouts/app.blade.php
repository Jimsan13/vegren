<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VEGGREEN - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <style>
        /* Algunos estilos base para el layout */
        body {
            display: flex;
            min-height: 100vh;
            background-color: #f0f0f0; /* Color de fondo similar al de la imagen */
        }
        #sidebar {
            width: 250px; /* Ancho del sidebar */
            background-color: #e0ffe0; /* Color de fondo del sidebar (verde claro) */
            padding: 20px;
            flex-shrink: 0; /* Evita que el sidebar se encoja */
        }
        #content {
            flex-grow: 1;
            padding: 20px;
            background-color: #ffffff;
            margin: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .sidebar-link {
            display: flex;
            align-items: center;
            padding: 10px 15px;
            margin-bottom: 5px;
            color: #333;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.2s;
        }
        .sidebar-link:hover {
            background-color: #d0efd0;
        }
        .sidebar-link i {
            margin-right: 10px;
            font-size: 1.2em;
        }
        .card-custom {
            background-color: #e0ffe0; /* Color de fondo de las tarjetas (verde claro) */
            border: none;
            border-radius: 8px;
            padding: 15px;
            text-align: center;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
        }
        .card-custom i {
            font-size: 3em; /* Tamaño de los iconos grandes en las tarjetas */
            color: #28a745; /* Color verde de los iconos */
            margin-bottom: 10px;
        }
        .btn-custom {
            background-color: #28a745; /* Verde Bootstrap 'success' */
            border-color: #28a745;
            color: white;
        }
        .btn-custom:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
        .header-top-right {
            text-align: right;
            font-size: 0.9em;
            color: #555;
        }
        .header-top-right .bi {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div id="sidebar">
        <div class="mb-4 text-center">
            <img src="{{ asset('images/logo_veggreen.png') }}" alt="VEGGREEN Logo" width="100">
            <h5 class="mt-2">VEGGREEN</h5>
        </div>
        <nav class="nav flex-column">
            <a class="sidebar-link active" href="#">
                <i class="bi bi-speedometer"></i> Dashboard
            </a>
            <a class="sidebar-link" href="#">
                <i class="bi bi-truck"></i> Cargas
            </a>
            <a class="sidebar-link" href="#">
                <i class="bi bi-box-seam"></i> Gastos
            </a>
            <a class="sidebar-link" href="#">
                <i class="bi bi-graph-up"></i> Ventas
            </a>
            <a class="sidebar-link" href="#">
                <i class="bi bi-shop"></i> Almacén
            </a>
            <a class="sidebar-link" href="#">
                <i class="bi bi-people"></i> Nómina
            </a>
            <a class="sidebar-link" href="#">
                <i class="bi bi-cash-stack"></i> Utilidades
            </a>
            <a class="sidebar-link" href="#">
                <i class="bi bi-currency-dollar"></i> Efectivo
            </a>
            <a class="sidebar-link" href="#">
                <i class="bi bi-box"></i> Productos
            </a>
            <a class="sidebar-link" href="#">
                <i class="bi bi-truck-flatbed"></i> Provedores
            </a>
            <a class="sidebar-link" href="#">
                <i class="bi bi-bar-chart"></i> Resultado
            </a>
            <a class="sidebar-link" href="#">
                <i class="bi bi-cash"></i> Finanzas
            </a>
            <a class="sidebar-link" href="#">
                <i class="bi bi-geo-alt"></i> Campo
            </a>
        </nav>
    </div>

    <div id="content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3>Resumen General</h3>
            <div class="header-top-right">
                <p class="mb-0">
                    <i class="bi bi-person-fill"></i> Ful Administrador
                    <br>
                    <i class="bi bi-calendar-check"></i> 06/06/2025
                </p>
            </div>
        </div>
        