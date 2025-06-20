<div class="bg-light border-right" id="sidebar-wrapper">
    <div class="sidebar-heading text-center py-4 primary-color-bg text-white">
        <img src="{{ asset('images/logo.png') }}" alt="" class="mb-3" style="max-width: 100px;">
    </div>
    <nav class="nav flex-column list-group list-group-flush">
        <a class="list-group-item list-group-item-action active" href="{{ route('admin.dashboard') }}"> <i class="bi bi-speedometer"></i> Dashboard </a>
        <a class="list-group-item list-group-item-action" href="{{route('admin.cargas') }}"> <i class="bi bi-truck"></i> Cargas </a>
        <a class="list-group-item list-group-item-action" href="{{route('admin.gastos') }}"> <i class="bi bi-box-seam"></i> Gastos </a>
        <a class="list-group-item list-group-item-action" href="{{route('admin.ventas') }}"> <i class="bi bi-graph-up"></i> Ventas </a>
        <a class="list-group-item list-group-item-action" href="{{route('admin.almacen') }}"> <i class="bi bi-shop"></i> Almacén </a>
        <a class="list-group-item list-group-item-action" href="{{route('admin.nomina')}}"> <i class="bi bi-people"></i> Nómina </a>
        <a class="list-group-item list-group-item-action" href="{{route('admin.utilidades')}}"> <i class="bi bi-cash-stack"></i> Utilidades </a>
        <a class="list-group-item list-group-item-action" href="{{route('admin.efectivo')}}"> <i class="bi bi-currency-dollar"></i> Efectivo </a>
        <a class="list-group-item list-group-item-action" href="{{route('admin.productos')}}"> <i class="bi bi-box"></i> Productos </a>
        <a class="list-group-item list-group-item-action" href="{{route('admin.proveedores')}}"> <i class="bi bi-truck-flatbed"></i> Proveedores </a>
        <a class="list-group-item list-group-item-action" href="{{route('admin.resultados')}}"> <i class="bi bi-bar-chart"></i> Resultado </a>
        <a class="list-group-item list-group-item-action" href="{{route('admin.finanzas')}}"> <i class="bi bi-cash"></i> Finanzas </a>
        <a class="list-group-item list-group-item-action" href="{{route('admin.campo')}}"> <i class="bi bi-geo-alt"></i> Campo </a>
    </nav>
</div>