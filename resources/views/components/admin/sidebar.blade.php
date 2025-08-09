<div class="bg-light border-right" id="sidebar-wrapper">
    <div class="sidebar-heading text-center py-4 primary-color-bg text-white">
        <img src="{{ asset('images/logo.png') }}" alt="VEGGREEN Logo" class="mb-3" style="max-width: 100px;">
    </div>
    <nav class="nav flex-column list-group list-group-flush">
        <a class="list-group-item list-group-item-action {{ request()->is('admin/dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
            <i class="bi bi-speedometer"></i> Dashboard
        </a>
        <a class="list-group-item list-group-item-action {{ request()->is('admin/cargas*') ? 'active' : '' }}" href="{{route('admin.cargas') }}">
            <i class="bi bi-truck"></i> Cargas
        </a>
        <a class="list-group-item list-group-item-action {{ request()->is('admin/gastos.*') ? 'active' : '' }}" href="{{route('admin.gastos.index') }}">
            <i class="bi bi-box-seam"></i> Gastos
        </a>
        <a class="list-group-item list-group-item-action {{ request()->is('admin/ventas*') ? 'active' : '' }}" href="{{route('admin.ventas') }}">
            <i class="bi bi-graph-up"></i> Ventas
        </a>
        <a class="list-group-item list-group-item-action {{ request()->is('admin/almacen*') ? 'active' : '' }}" href="{{route('admin.almacen') }}">
            <i class="bi bi-shop"></i> Almacén
        </a>
        <a class="list-group-item list-group-item-action {{ request()->is('admin/nomina*') ? 'active' : '' }}" href="{{route('admin.nomina')}}">
            <i class="bi bi-people"></i> Nómina
        </a>
        <a class="list-group-item list-group-item-action {{ request()->is('admin/utilidades*') ? 'active' : '' }}" href="{{route('admin.utilidades')}}">
            <i class="bi bi-cash-stack"></i> Utilidades
        </a>
        <a class="list-group-item list-group-item-action {{ request()->is('admin/efectivo*') ? 'active' : '' }}" href="{{route('admin.efectivo')}}">
            <i class="bi bi-currency-dollar"></i> Efectivo
        </a>
        <a class="list-group-item list-group-item-action {{ request()->is('admin/productos*') ? 'active' : '' }}" href="{{route('admin.productos')}}">
            <i class="bi bi-box"></i> Productos
        </a>
        <a class="list-group-item list-group-item-action {{ request()->is('admin/proveedores*') ? 'active' : '' }}" href="{{route('admin.proveedores')}}">
            <i class="bi bi-truck-flatbed"></i> Proveedores
        </a>
        <a class="list-group-item list-group-item-action {{ request()->is('admin/resultados*') ? 'active' : '' }}" href="{{route('admin.resultados')}}">
            <i class="bi bi-bar-chart"></i> Resultado
        </a>
        <a class="list-group-item list-group-item-action {{ request()->is('admin/finanzas*') ? 'active' : '' }}" href="{{route('admin.finanzas')}}">
            <i class="bi bi-cash"></i> Finanzas
        </a>
        <a class="list-group-item list-group-item-action {{ request()->is('admin/campo*') ? 'active' : '' }}" href="{{route('admin.campo')}}">
            <i class="bi bi-geo-alt"></i> Campo
        </a>
    </nav>
</div>