@extends('layouts.app')

@section('title', 'Registro de Cargas') {{-- El título de esta página --}}

@section('sidebar')
    <x-admin.sidebar />
@endsection

@section('navbar')
    <x-admin.navbar />
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4 content-header">
        <h3>Registro de cargas</h3>
    </div>
    <div class="row g-4">
        {{-- Tabla de cargas --}}
        <div class="col-lg-8"> {{-- Ocupa más espacio para la tabla --}}
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Tabla de cargas</h6>
                    <button class="btn btn-success" id="btnAgregarCarga">Agregar</button> {{-- Botón para abrir el modal --}}
                </div>
                <div class="card-body">
                    <p>Complete los datos para registrar o editar una operación de carga.</p>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Lote</th>
                                    <th>Cliente</th>
                                    <th>Bultos</th>
                                    <th>Precio</th>
                                    <th>Total Envío</th>
                                    <th>Anticipo</th>
                                    <th>Saldo</th>
                                    <th>Acciones</th> {{-- Columna para botones de editar/eliminar --}}
                                </tr>
                            </thead>
                            <tbody>
                                {{-- Aquí se mostrarán los datos de tus cargas. ¡La clave es que la variable $cargas llegue aquí! --}}
                                @forelse ($cargas as $carga)
                                    <tr>
                                        <td>{{ $carga->fecha }}</td>
                                        <td>{{ $carga->lote }}</td>
                                        <td>{{ $carga->cliente }}</td>
                                        <td>{{ $carga->bultosCaja }}</td>
                                        <td>${{ number_format($carga->precioUnidad, 2) }}</td>
                                        <td>${{ number_format($carga->totalEnvio, 2) }}</td>
                                        <td>{{ $carga->facturasPagadas ? 'Sí' : 'No' }}</td>
                                        <td>${{ number_format($carga->saldoCarga, 2) }}</td>
                                        <td>
                                            <button class="btn btn-primary btn-sm" title="Editar"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-danger btn-sm" title="Eliminar"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center">No hay cargas registradas todavía.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- Indicadores de carga --}}
            <div class="row">
                <div class="col-md-4">
                    <div class="card bg-success text-white shadow">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <i class="fas fa-chart-line fa-2x"></i>
                                </div>
                                <div class="col">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1">Ventas mensuales</div>
                                    {{-- ¡AQUÍ ES DONDE DEBE ESTAR LA VARIABLE DINÁMICA! --}}
                                    <div class="h5 mb-0 font-weight-bold">${{ number_format($ventas_mensuales, 2) }}</div>
                                    <div class="text-xs">Total ventas este mes</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-warning text-white shadow">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <i class="fas fa-hourglass-half fa-2x"></i>
                                </div>
                                <div class="col">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1">Estado de pago</div>
                                    {{-- ¡AQUÍ ES DONDE DEBE ESTAR LA VARIABLE DINÁMICA! --}}
                                    <div class="h5 mb-0 font-weight-bold">{{ $estado_pago_texto }}</div>
                                    <div class="text-xs">Pagos por recibir</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-danger text-white shadow">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <i class="fas fa-money-bill-wave fa-2x"></i>
                                </div>
                                <div class="col">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1">Adeudos</div>
                                    {{-- ¡AQUÍ ES DONDE DEBE ESTAR LA VARIABLE DINÁMICA! --}}
                                    <div class="h5 mb-0 font-weight-bold">${{ number_format($adeudos, 2) }}</div>
                                    <div class="text-xs">Saldo pendiente</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal para el formulario de Registro de Carga (Todo el código del modal permanece igual) --}}
        <div class="modal fade" id="cargaModal" tabindex="-1" role="dialog" aria-labelledby="cargaModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cargaModalLabel">Datos de carga</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="formCarga" action="{{ route('admin.cargas.store') }}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="fecha">Fecha</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" id="fecha" name="fecha" value="{{ old('fecha') }}">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="lote">Lote</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="lote" name="lote" placeholder="Ingrese el lote" value="{{ old('lote') }}">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-th"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="cliente">Cliente</label>
                                    <div class="input-group">
                                        <select class="form-control" id="cliente" name="cliente">
                                            <option value="">seleccione cliente</option>
                                            <option value="Cliente A" {{ old('cliente') == 'Cliente A' ? 'selected' : '' }}>Cliente A</option>
                                            <option value="Cliente B" {{ old('cliente') == 'Cliente B' ? 'selected' : '' }}>Cliente B</option>
                                        </select>
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="bultosCaja">Bultos de caja</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="bultosCaja" name="bultosCaja" placeholder="cantidad de bultos" value="{{ old('bultosCaja') }}">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-box"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="precioUnidad">Precio por unidad</label>
                                    <div class="input-group">
                                        <input type="number" step="0.01" class="form-control" id="precioUnidad" name="precioUnidad" placeholder="precio unitario" value="{{ old('precioUnidad') }}">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="totalEnvio">Total del envío</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="totalEnvio" name="totalEnvio" value="calculo automático" readonly>
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-boxes"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="remate">Remate</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="remate" name="remate" placeholder="Monto o %" value="{{ old('remate') }}">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-chart-line"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="descuentoAplicado">Descuento aplicado</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="descuentoAplicado" name="descuentoAplicado" placeholder="5 %" value="{{ old('descuentoAplicado') }}">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-tag"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="facturacion">Facturación</label>
                                    <div class="input-group">
                                        <select class="form-control" id="facturacion" name="facturacion">
                                            <option value="pendiente/facturada" {{ old('facturacion') == 'pendiente/facturada' ? 'selected' : '' }}>pendiente/facturada</option>
                                            <option value="facturada" {{ old('facturacion') == 'facturada' ? 'selected' : '' }}>facturada</option>
                                            <option value="pendiente" {{ old('facturacion') == 'pendiente' ? 'selected' : '' }}>pendiente</option>
                                        </select>
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="saldoCarga">Saldo de carga</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="saldoCarga" name="saldoCarga" value="calculo automático" readonly>
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-calculator"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="cintaTransporte">Cinta de Transporte</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="cintaTransporte" name="cintaTransporte" placeholder="ingrese cinta" value="{{ old('cintaTransporte') }}">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-truck"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="facturasPagadas">Facturas pagadas</label>
                                    <div class="input-group">
                                        <div class="form-check form-check-inline mt-2"> {{-- Ajuste para alinear checkbox --}}
                                            <input class="form-check-input" type="checkbox" id="facturasPagadas" name="facturasPagadas" value="1" {{ old('facturasPagadas') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="facturasPagadas">
                                                Sí / No
                                            </label>
                                        </div>
                                        <div class="input-group-append ml-3"> {{-- Margen para el ícono --}}
                                            <span class="input-group-text"><i class="fas fa-receipt"></i></span> {{-- Icono de recibo --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="cajaExtra">Caja extra</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="cajaExtra" name="cajaExtra" placeholder="monto extra/opcional" value="{{ old('cajaExtra') }}">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-plus-circle"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="representanteResponsable">Representante responsable</label>
                                <div class="input-group">
                                    <select class="form-control" id="representanteResponsable" name="representanteResponsable">
                                        <option value="">seleccione representante</option>
                                        <option value="Representante X" {{ old('representanteResponsable') == 'Representante X' ? 'selected' : '' }}>Representante X</option>
                                        <option value="Representante Y" {{ old('representanteResponsable') == 'Representante Y' ? 'selected' : '' }}>Representante Y</option>
                                    </select>
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" form="formCarga" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {{-- Script para el toggle del sidebar --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var sidebarToggle = document.getElementById('sidebarToggle');
            var wrapper = document.getElementById('wrapper');

            if (sidebarToggle && wrapper) {
                sidebarToggle.addEventListener('click', function () {
                    wrapper.classList.toggle('toggled');
                });
            }

            // Script para abrir el modal de carga
            var btnAgregarCarga = document.getElementById('btnAgregarCarga');
            if (btnAgregarCarga) {
                btnAgregarCarga.addEventListener('click', function () {
                    // Limpiar el formulario cada vez que se abre el modal para una nueva carga
                    document.getElementById('formCarga').reset();
                    $('#cargaModal').modal('show'); // Usa jQuery para abrir el modal de Bootstrap
                });
            }

            // Lógica para autocalcular Total del Envío y Saldo de Carga
            const bultosCajaInput = document.getElementById('bultosCaja');
            const precioUnidadInput = document.getElementById('precioUnidad');
            const totalEnvioInput = document.getElementById('totalEnvio');
            const saldoCargaInput = document.getElementById('saldoCarga');
            const remateInput = document.getElementById('remate');

            function calcularTotales() {
                const bultos = parseFloat(bultosCajaInput.value) || 0;
                const precio = parseFloat(precioUnidadInput.value) || 0;
                const remate = parseFloat(remateInput.value) || 0;

                let totalEnvio = bultos * precio;
                let saldoCarga = totalEnvio - remate;

                totalEnvioInput.value = totalEnvio.toFixed(2);
                saldoCargaInput.value = saldoCarga.toFixed(2);
            }

            // Escuchar cambios en los campos relevantes para recalcular
            bultosCajaInput.addEventListener('input', calcularTotales);
            precioUnidadInput.addEventListener('input', calcularTotales);
            remateInput.addEventListener('input', calcularTotales);
        });
    </script>
@endsection
