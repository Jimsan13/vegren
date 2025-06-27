<ul class="nav nav-tabs mb-4 gastos-tabs">
  <li class="nav-item">
    <a class="nav-link {{ request()->is('gastos/maquinaria') ? 'active' : '' }}" href="{{ url('gastos/maquinaria') }}">
      Compra de insumos 
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ request()->is('gastos/extras') ? 'active' : '' }}" href="{{ url('gastos/extras') }}">
      Resumen
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ request()->is('gastos/gasolina') ? 'active' : '' }}" href="{{ url('gastos/gasolina') }}">
      Insumo por provedor 
    </a>
  </li> 
    <li class="nav-item">
    <a class="nav-link {{ request()->is('gastos/gasolina') ? 'active' : '' }}" href="{{ url('gastos/gasolina') }}">
      Historico
    </a>
  </li> 
</ul>
