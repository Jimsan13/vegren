<?php
// Este es el archivo PHP principal que renderiza el dashboard completo.

// Asegúrate de que la ruta a tu carpeta 'components' sea correcta
// Si 'components' está en el mismo directorio que veggreen_dashboard.php
$sidebar_path = 'components/sidebar.php';
// Si 'components' estuviera en un directorio diferente, por ejemplo, en la raíz de htdocs
// $sidebar_path = 'tu_carpeta_del_proyecto/components/sidebar.php';

// Puedes definir variables PHP aquí para usar en el dashboard
$admin_name = "Ful Administrador";
$current_date = date('d/m/Y');
?>
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

    <!-- Font Awesome CSS CDN (para iconos como fas fa-...) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Estilos personalizados -->
    <style>
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
            font-family: 'Nunito', sans-serif; /* Puedes usar cualquier fuente, Nunito es común */
            display: flex;
            min-height: 100vh;
            background-color: #f8f9fa; /* Fondo general del contenido principal */
            overflow-x: hidden; /* Evita scroll horizontal */
        }

        #wrapper {
            display: flex;
            width: 100%;
        }

        /* Estilos del Sidebar */
        #sidebar-wrapper {
            width: 250px;
            transition: all 0.3s ease-in-out;
            background-color: var(--light-green);
            color: var(--text-dark);
            border-right: 1px solid rgba(0, 0, 0, 0.1);
            flex-shrink: 0;
            padding: 20px;
            box-shadow: 0.5rem 0 1rem rgba(0, 0, 0, 0.05);
        }

        .sidebar-heading {
            background-color: var(--dark-green);
            color: white;
            padding: 1.5rem 1rem;
            text-align: center;
            font-weight: 700;
            font-size: 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            margin-bottom: 1rem;
            border-radius: 0.5rem;
        }

        .sidebar-heading img {
            height: 50px;
            margin-bottom: 0.5rem;
        }

        #sidebar-wrapper .list-group-item {
            color: var(--text-dark);
            background-color: transparent;
            border: none;
            font-weight: 500;
            padding: 0.75rem 1.5rem;
            display: flex;
            align-items: center;
            border-radius: 0.5rem;
            margin-bottom: 0.25rem;
        }

        #sidebar-wrapper .list-group-item i {
            margin-right: 0.75rem;
            font-size: 1.2rem;
            color: var(--primary-green);
        }

        #sidebar-wrapper .list-group-item.active {
            background-color: var(--primary-green);
            color: white;
        }
        #sidebar-wrapper .list-group-item.active i {
            color: white;
        }

        #sidebar-wrapper .list-group-item:hover:not(.active) {
            background-color: var(--lighter-green);
        }

        /* Estilos para el contenido principal */
        #page-content-wrapper {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            min-width: 0;
            padding: 20px;
        }

        /* Navbar personalizado */
        .navbar-custom {
            padding: 0.75rem 1.5rem;
            background-color: white !important;
            border-bottom: 1px solid #dee2e6;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            z-index: 1000;
            margin-bottom: 1.5rem;
            border-radius: 0.5rem;
        }

        .navbar-custom .nav-link {
            color: var(--text-dark);
            font-weight: 500;
        }

        .navbar-custom .nav-link i {
            margin-right: 0.5rem;
        }

        /* Estilos para el toggle del sidebar */
        #wrapper.toggled #sidebar-wrapper {
            margin-left: -250px;
        }

        /* Tarjetas Personalizadas */
        .card-custom {
            border-radius: 1rem;
            box-shadow: var(--card-shadow);
            transition: transform 0.2s ease-in-out;
            border: none;
            padding: 1.5rem;
            background-color: #e0ffe0;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .card-custom:hover {
            transform: translateY(-5px);
        }

        .card-custom i {
            font-size: 3em;
            margin-bottom: 1rem;
            color: #28a745;
        }

        .card-custom .card-title {
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
        }

        .card-custom .card-text {
            font-size: 0.9rem;
            color: var(--text-light);
            margin-bottom: 1rem;
        }

        /* Botones personalizados */
        .btn-custom {
            background-color: #28a745;
            border-color: #28a745;
            color: white;
            border-radius: 0.5rem;
            padding: 0.5rem 1.5rem;
            font-weight: 500;
            transition: background-color 0.2s ease-in-out, border-color 0.2s ease-in-out;
        }

        .btn-custom:hover {
            background-color: #218838;
            border-color: #1e7e34;
            color: white;
        }

        /* Estilos para el título "Resumen General" */
        .content-header h3 {
            color: var(--text-dark);
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        .header-top-right {
            text-align: right;
            font-size: 0.9em;
            color: #555;
        }
        .header-top-right .bi {
            margin-right: 5px;
        }

        /* Responsividad */
        @media (min-width: 768px) {
            #sidebar-wrapper {
                margin-left: 0;
                position: relative;
            }
            #page-content-wrapper {
                width: auto;
                margin-left: 0;
            }
        }

        @media (max-width: 767.98px) {
            #sidebar-wrapper {
                margin-left: -250px;
                position: fixed;
                height: 100vh;
                z-index: 1001;
                box-shadow: 0.5rem 0 1rem rgba(0, 0, 0, 0.1);
            }
            #page-content-wrapper {
                width: 100vw;
                margin-left: 0;
            }
            #wrapper.toggled #sidebar-wrapper {
                margin-left: 0;
            }
            #wrapper.toggled #page-content-wrapper {
                margin-left: 250px;
            }
            .navbar .container-fluid {
                padding-right: 0 !important;
                padding-left: 0 !important;
            }
            .content-header h3 {
                padding-left: 0.5rem;
            }
        }
    </style>
</head>
<body>

    <div class="d-flex" id="wrapper">
        <!-- Incluir la barra lateral (sidebar) -->
        <?php
        // Asegúrate de que la ruta a 'components/sidebar.php' sea correcta desde este archivo.
        if (file_exists($sidebar_path)) {
            include $sidebar_path;
        } else {
            echo '<div class="alert alert-danger m-3" role="alert">Error: No se encontró el archivo del sidebar en ' . $sidebar_path . '</div>';
        }
        ?>

        <!-- Contenedor del contenido de la página -->
        <div id="page-content-wrapper">
            <!-- Barra de navegación superior -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom navbar-custom">
                <div class="container-fluid">
                    <button class="btn btn-success" id="sidebarToggle">Toggle Menu</button>
                    <div class="ms-auto d-flex align-items-center">
                        <div class="header-top-right me-3">
                            <p class="mb-0">
                                <i class="bi bi-person-fill"></i> <?php echo $admin_name; ?>
                                <br>
                                <i class="bi bi-calendar-check"></i> <?php echo $current_date; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Contenido del Dashboard (las tarjetas) -->
            <div class="container-fluid py-4">
                <div class="d-flex justify-content-between align-items-center mb-4 content-header">
                    <h3>Resumen General</h3>
                </div>
                <div class="row g-4">
                    {{-- Tarjeta de Carga --}}
                    <div class="col-md-4">
                        <div class="card card-custom">
                            <i class="bi bi-truck"></i>
                            <h5 class="card-title">Carga</h5>
                            <p class="card-text">Registra nueva carga en el sistema</p>
                            <a href="#" class="btn btn-custom">Nueva Carga</a>
                        </div>
                    </div>

                    {{-- Tarjeta de Gastos --}}
                    <div class="col-md-4">
                        <div class="card card-custom">
                            <i class="bi bi-currency-dollar"></i>
                            <h5 class="card-title">Gastos</h5>
                            <p class="card-text">Añadir Gastos Recientes</p>
                            <a href="#" class="btn btn-custom">Registrar</a>
                        </div>
                    </div>

                    {{-- Tarjeta de Utilidades --}}
                    <div class="col-md-4">
                        <div class="card card-custom">
                            <i class="bi bi-piggy-bank"></i>
                            <h5 class="card-title">Utilidades</h5>
                            <p class="card-text">Gestiona Pagos y Empleados</p>
                            <a href="#" class="btn btn-custom">Ver Utilidades</a>
                        </div>
                    </div>

                    {{-- Tarjeta de Ventas --}}
                    <div class="col-md-4">
                        <div class="card card-custom">
                            <i class="bi bi-graph-up"></i>
                            <h5 class="card-title">Ventas</h5>
                            <p class="card-text">Consulta el Resumen de Ventas</p>
                            <a href="#" class="btn btn-custom">Ver ventas</a>
                        </div>
                    </div>

                    {{-- Tarjeta de Efectivo --}}
                    <div class="col-md-4">
                        <div class="card card-custom">
                            <i class="bi bi-cash-coin"></i>
                            <h5 class="card-title">Efectivo</h5>
                            <p class="card-text">Visualiza los Gastos Frecuentes</p>
                            <a href="#" class="btn btn-custom">Ver efectivo</a>
                        </div>
                    </div>

                    {{-- Tarjeta de Campo --}}
                    <div class="col-md-4">
                        <div class="card card-custom">
                            <i class="bi bi-geo-alt"></i>
                            <h5 class="card-title">Campo</h5>
                            <p class="card-text">Ver los Campos</p>
                            <a href="#" class="btn btn-custom">Ver campo</a>
                        </div>
                    </div>

                    {{-- Tarjeta de Productos --}}
                    <div class="col-md-4">
                        <div class="card card-custom">
                            <i class="bi bi-box-seam"></i>
                            <h5 class="card-title">Productos</h5>
                            <p class="card-text">Consulta el Resumen de Productos</p>
                            <a href="#" class="btn btn-custom">Ver productos</a>
                        </div>
                    </div>

                    {{-- Tarjeta de Proveedores --}}
                    <div class="col-md-4">
                        <div class="card card-custom">
                            <i class="bi bi-people"></i>
                            <h5 class="card-title">Proveedores</h5>
                            <p class="card-text">Visualiza los gastos restantes</p>
                            <a href="#" class="btn btn-custom">Ver proveedores</a>
                        </div>
                    </div>

                    {{-- Tarjeta de Almacén --}}
                    <div class="col-md-4">
                        <div class="card card-custom">
                            <i class="bi bi-building"></i>
                            <h5 class="card-title">Almacén</h5>
                            <p class="card-text">Registra nuevo cargo en el sistema</p>
                            <a href="#" class="btn btn-custom">Inspeccionar almacén</a>
                        </div>
                    </div>

                    {{-- Tarjeta de Finanzas --}}
                    <div class="col-md-4">
                        <div class="card card-custom">
                            <i class="bi bi-cash"></i>
                            <h5 class="card-title">Finanzas</h5>
                            <p class="card-text">Registra nuevo cargo en el sistema</p>
                            <a href="#" class="btn btn-custom">Ver finanzas</a>
                        </div>
                    </div>

                    {{-- Tarjeta de Resultado --}}
                    <div class="col-md-4">
                        <div class="card card-custom">
                            <i class="bi bi-bar-chart"></i>
                            <h5 class="card-title">Resultado</h5>
                            <p class="card-text">Visualiza el resultado</p>
                            <a href="#" class="btn btn-custom">Ver resultado</a>
                        </div>
                    </div>

                    {{-- Tarjeta de Nómina --}}
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
</html>
