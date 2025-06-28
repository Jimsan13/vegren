<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Navbar</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        /* Custom styles for the navbar */
        .navbar-custom {
            background-color: #ffffff; /* White background for the navbar */
            border-bottom: 1px solid #e0e0e0; /* Subtle border at the bottom */
            box-shadow: 0 2px 4px rgba(0,0,0,.05); /* Light shadow for depth */
        }

        .navbar-brand img {
            height: 40px; /* Adjust as needed */
        }

        .header-top-right p {
            line-height: 1.2; /* Adjust line spacing */
        }

        .header-top-right .text-dark {
            font-weight: bold;
        }

        /* Style for the sidebar toggle button */
        #sidebarToggle {
            background-color: #28a745; /* Green button */
            border-color: #28a745;
            color: white;
            /* Added margin-right to separate it from other elements */
            margin-right: 15px; 
        }
        #sidebarToggle:hover {
            background-color: #218838;
            border-color: #218838;
        }

        /* Adjustments for the layout if the sidebar is fixed/toggled */
        /* This assumes the sidebar is hidden on smaller screens and toggled by this button */
        /* If you have a specific JS for sidebar toggling, ensure it works with this button */
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light navbar-custom">
    <div class="container-fluid">
        <button class="btn btn-success" id="sidebarToggle" type="button">
            <i class="fas fa-bars"></i> Menu </button>

        <div class="ms-auto d-flex align-items-center">
            <div class="header-top-right me-3 text-end d-none d-md-block">
                <p class="mb-0 text-dark">
                    <i class="bi bi-person-fill me-1"></i> {{ Auth::user()->name ?? 'Invitado' }}
                </p>
                <p class="mb-0 text-muted">
                    <i class="bi bi-calendar-check me-1"></i> {{ date('d/m/Y') }}
                </p>
            </div>

            <div class="dropdown">
                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-circle fs-3 text-success"></i> </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="#">Perfil</a></li>
                    <li><a class="dropdown-item" href="#">Configuración</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">Cerrar Sesión</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    document.getElementById('sidebarToggle').addEventListener('click', function() {
        // Assuming your sidebar and wrapper elements have specific IDs or classes
        // You'll need to adapt this based on how your sidebar is implemented.
        // For example, if you're using a class on the body to hide/show the sidebar:
        document.body.classList.toggle('sb-sidenav-toggled'); // Example from SB Admin 2 template
        // Or if you're toggling a specific sidebar element:
        // document.getElementById('wrapper').classList.toggle('toggled');
    });
</script>

</body>
</html>