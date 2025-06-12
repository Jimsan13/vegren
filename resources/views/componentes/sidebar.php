<?php
// Este archivo solo contiene el HTML de la barra lateral (sidebar)
// y está diseñado para ser incluido en un archivo PHP principal.
?>
<div class="bg-light border-right" id="sidebar-wrapper">
    <div class="sidebar-heading text-center py-4 primary-color-bg text-white">
        <!-- Asegúrate de que esta ruta sea correcta para tu logo -->
        <!-- La ruta de la imagen debe ser relativa al archivo que la sirve (veggreen_dashboard.php) -->
        <img src="images/logo_veggreen.png" alt="VEGGREEN Logo" width="100">
        <h5 class="mt-2">VEGGREEN</h5>
    </div>
    <nav class="nav flex-column list-group list-group-flush">
        <a class="list-group-item list-group-item-action active" href="#">
            <i class="bi bi-speedometer"></i> Dashboard
        </a>
        <a class="list-group-item list-group-item-action" href="#">
            <i class="bi bi-truck"></i> Cargas
        </a>
        <a class="list-group-item list-group-item-action" href="#">
            <i class="bi bi-box-seam"></i> Gastos
        </a>
        <a class="list-group-item list-group-item-action" href="#">
            <i class="bi bi-graph-up"></i> Ventas
        </a>
        <a class="list-group-item list-group-item-action" href="#">
            <i class="bi bi-shop"></i> Almacén
        </a>
        <a class="list-group-item list-group-item-action" href="#">
            <i class="bi bi-people"></i> Nómina
        </a>
        <a class="list-group-item list-group-item-action" href="#">
            <i class="bi bi-cash-stack"></i> Utilidades
        </a>
        <a class="list-group-item list-group-item-action" href="#">
            <i class="bi bi-currency-dollar"></i> Efectivo
        </a>
        <a class="list-group-item list-group-item-action" href="#">
            <i class="bi bi-box"></i> Productos
        </a>
        <a class="list-group-item list-group-item-action" href="#">
            <i class="bi bi-truck-flatbed"></i> Proveedores
        </a>
        <a class="list-group-item list-group-item-action" href="#">
            <i class="bi bi-bar-chart"></i> Resultado
        </a>
        <a class="list-group-item list-group-item-action" href="#">
            <i class="bi bi-cash"></i> Finanzas
        </a>
        <a class="list-group-item list-group-item-action" href="#">
            <i class="bi bi-geo-alt"></i> Campo
        </a>
    </nav>
</div>
