<ul class="nav nav-tabs mb-4 gastos-tabs">
  <li class="nav-item">
    <a class="nav-link {{ request()->is('gastos/maquinaria') ? 'active' : '' }}" href="{{ url('gastos/maquinaria') }}">
      Planta
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ request()->is('gastos/extras') ? 'active' : '' }}" href="{{ url('gastos/extras') }}">
      Nómina
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ request()->is('gastos/gasolina') ? 'active' : '' }}" href="{{ url('gastos/gasolina') }}">
      Insumos
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ request()->is('gastos/deudores') ? 'active' : '' }}" href="{{ url('gastos/deudores') }}">
      Gastos extras 
    </a>
  </li>
  
</ul>
