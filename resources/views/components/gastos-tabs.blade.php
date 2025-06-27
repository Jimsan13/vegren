<ul class="nav nav-tabs mb-4 gastos-tabs">
  <li class="nav-item">
    <a class="nav-link {{ request()->is('gastos/maquinaria') ? 'active' : '' }}" href="{{ url('gastos/maquinaria') }}">
      Maquinaria y Transporte
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ request()->is('gastos/extras') ? 'active' : '' }}" href="{{ url('gastos/extras') }}">
      Gastos extras
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ request()->is('gastos/gasolina') ? 'active' : '' }}" href="{{ url('gastos/gasolina') }}">
      Gasolina
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ request()->is('gastos/deudores') ? 'active' : '' }}" href="{{ url('gastos/deudores') }}">
      Deudores
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ request()->is('gastos/nomina') ? 'active' : '' }}" href="{{ url('gastos/nomina') }}">
      Nómina
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ request()->is('gastos/pago-notas') ? 'active' : '' }}" href="{{ url('gastos/pago-notas') }}">
      Pago de notas
    </a>
  </li>
   <li class="nav-item">
    <a class="nav-link {{ request()->is('gastos/utilidades') ? 'active' : '' }}" href="{{ url('gastos/utilidades') }}">
      Repartición de utilidades
    </a>
  </li>
   <li class="nav-item">
    <a class="nav-link {{ request()->is('gastos/campo') ? 'active' : '' }}" href="{{ url('gastos/campo') }}">
      Campo
    </a>
  </li>
   <li class="nav-item">
    <a class="nav-link {{ request()->is('gastos/cliente') ? 'active' : '' }}" href="{{ url('gastos/cliente') }}">
      Gastos del cliente
    </a>
  </li>
</ul>
