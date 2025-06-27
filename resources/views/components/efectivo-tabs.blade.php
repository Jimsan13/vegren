<ul class="nav nav-tabs mb-4 gastos-tabs">
  <li class="nav-item">
    <a class="nav-link {{ request()->is('gastos/maquinaria') ? 'active' : '' }}" href="{{ url('gastos/maquinaria') }}">
      Efectivo
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ request()->is('gastos/extras') ? 'active' : '' }}" href="{{ url('gastos/extras') }}">
      Transferencia
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ request()->is('gastos/gasolina') ? 'active' : '' }}" href="{{ url('gastos/gasolina') }}">
      Cheque
    </a>
  </li> 
</ul>
