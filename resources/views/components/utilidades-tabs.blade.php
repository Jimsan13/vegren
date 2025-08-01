<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Repartición de Utilidades</title>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
    />
    <link rel="stylesheet" href="{{ asset('css/utilidades.css') }}" />
</head>
<body>

<div class="container">
    <h2 class="header-title">Módulo de Repartición de Utilidades</h2>

    <div class="summary-grid">
        <div class="summary-box">
            <i class="fas fa-sack-dollar"></i>
            <h4>$0.00</h4>
            <p>Utilidades Repartidas</p>
        </div>
        <div class="summary-box">
            <i class="fas fa-users"></i>
            <h4>{{ count($socios ?? []) }}</h4>
            <p>Socios Registrados</p>
        </div>
    </div>

    <div class="tab-nav">
        <button class="tab-button" onclick="openTab(event, 'socios')">Socios</button>
        <button class="tab-button" onclick="openTab(event, 'ingresos')">Detalle de Uso de Ingresos</button>
        <button class="tab-button" onclick="openTab(event, 'diferencias')">Diferencias de Reparto</button>
    </div>

    <!-- Socios -->
    <div id="socios" class="tab-content card">
        <h3>Socios</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Aportación</th>
                    <th>Repartido</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach($socios as $socio)
                <tr>
                    <td>{{ $socio->nombre }}</td>
                    <td>${{ number_format($socio->aportacion, 2) }}</td>
                    <td><i class="fas fa-eye"></i></td>
                    <td>
                        <!-- Botón Editar -->
                        <button class="action-btn blue-edit" onclick="openModalEditarSocio({{ $socio->id }})">
                            <i class="fas fa-pencil-alt"></i>
                        </button>

                        <!-- Formulario Eliminar -->
                        <form method="POST" action="{{ route('utilidades.socio.destroy', $socio->id) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="action-btn red-x" onclick="return confirm('¿Deseas eliminar este socio?')">
                                <i class="fas fa-times"></i>
                            </button>
                        </form>
                    </td>


                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="add-button-container">
            <button
                class="btn btn-primary"
                onclick="openModal('modal-socio')"
            >
                <i class="fas fa-plus"></i> Agregar Socio
            </button>
        </div>
    </div>

    <!-- Ingresos -->
    <div id="ingresos" class="tab-content card">
        <h3>Detalle de Uso de Ingresos</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Concepto</th>
                    <th>Monto</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ingresos as $ingreso)
                <tr>
                    <td>{{ $ingreso->concepto }}</td>
                    <td class="text-danger">${{ number_format($ingreso->monto, 2) }}</td>
                    <td>{{ $ingreso->fecha }}</td>
                    <td>
                        <!-- Botón Editar -->
                        <button class="action-btn blue-edit" onclick="openModalEditarIngreso({{ $ingreso->id }})">
                            <i class="fas fa-pencil-alt"></i>
                        </button>

                        <!-- Formulario Eliminar -->
                        <form method="POST" action="{{ route('utilidades.ingreso.destroy', $ingreso->id) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="action-btn red-x" onclick="return confirm('¿Deseas eliminar este ingreso?')">
                                <i class="fas fa-times"></i>
                            </button>
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="add-button-container">
            <button
                class="btn btn-primary"
                onclick="openModal('modal-ingreso')"
            >
                <i class="fas fa-plus"></i> Agregar Uso de Ingreso
            </button>
        </div>
    </div>

    <!-- Diferencias -->
    <div id="diferencias" class="tab-content card">
        <h3>Diferencias de Reparto</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Motivo</th>
                    <th>Socio</th>
                    <th>Monto</th>
                    <th>Tipo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($diferencias as $dif)
                <tr>
                    <td>{{ $dif->motivo }}</td>
                    <td>{{ $dif->socio->nombre }}</td>
                    <td class="{{ $dif->tipo == 'favor' ? 'text-success' : 'text-danger' }}">
                        {{ $dif->tipo == 'favor' ? '$' : '-$' }}{{ number_format($dif->monto, 2) }}
                    </td>
                    <td>{{ ucfirst($dif->tipo) }}</td>
                    <td>
                        <!-- Botón Editar -->
                        <button class="action-btn blue-edit" onclick="openModalEditarDiferencia({{ $dif->id }})">
                            <i class="fas fa-pencil-alt"></i>
                        </button>

                        <!-- Formulario Eliminar -->
                        <form method="POST" action="{{ route('utilidades.diferencia.destroy', $dif->id) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="action-btn red-x" onclick="return confirm('¿Deseas eliminar esta diferencia?')">
                                <i class="fas fa-times"></i>
                            </button>
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="add-button-container">
            <button
                class="btn btn-primary"
                onclick="openModal('modal-diferencia')"
            >
                <i class="fas fa-plus"></i> Agregar Diferencia
            </button>
        </div>
    </div>
</div>

<!-- Modal Socio -->
<div id="modal-socio" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h4>Agregar Socio</h4>
            <span class="modal-close" onclick="closeModal('modal-socio')">&times;</span>
        </div>
        <form method="POST" action="{{ route('utilidades.socio.store') }}">
            @csrf
            <div class="modal-body">
                <div class="form-row">
                    <label for="nombre">Nombre del Socio</label>
                    <input type="text" id="nombre" name="nombre" required />
                </div>
                <div class="form-row">
                    <label for="aportacion">Aportación</label>
                    <div class="input-with-icon">
                        <input
                            type="number"
                            name="aportacion"
                            step="0.01"
                            placeholder="0.00"
                            required
                        />
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                </div>
            </div>
            <div class="button-group">
                <button
                    type="button"
                    class="btn btn-cancel"
                    onclick="closeModal('modal-socio')"
                >
                    Cancelar
                </button>
                <button type="submit" class="btn btn-save">Guardar</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Ingreso -->
<div id="modal-ingreso" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h4>Agregar Uso de Ingreso</h4>
            <span class="modal-close" onclick="closeModal('modal-ingreso')">&times;</span>
        </div>
        <form method="POST" action="{{ route('utilidades.ingreso.store') }}">
            @csrf
            <div class="modal-body">
                <div class="form-row">
                    <label for="concepto">Concepto</label>
                    <input type="text" name="concepto" required />
                </div>
                <div class="form-row">
                    <label for="monto">Monto</label>
                    <input
                        type="number"
                        name="monto"
                        step="0.01"
                        placeholder="0.00"
                        required
                    />
                </div>
                <div class="form-row">
                    <label for="fecha">Fecha</label>
                    <input type="date" name="fecha" required />
                </div>
            </div>
            <div class="button-group">
                <button
                    type="button"
                    class="btn btn-cancel"
                    onclick="closeModal('modal-ingreso')"
                >
                    Cancelar
                </button>
                <button type="submit" class="btn btn-save">Guardar</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Diferencia -->
<div id="modal-diferencia" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h4>Agregar Diferencia</h4>
            <span
                class="modal-close"
                onclick="closeModal('modal-diferencia')"
                >&times;</span
            >
        </div>
        <form method="POST" action="{{ route('utilidades.diferencia.store') }}">
            @csrf
            <div class="modal-body">
                <div class="form-row">
                    <label for="motivo">Motivo</label>
                    <input type="text" name="motivo" required />
                </div>
                <div class="form-row">
                    <label for="socio_id">Socio</label>
                    <select name="socio_id" required>
                        <option value="">Seleccione Socio</option>
                        @foreach($socios as $socio)
                        <option value="{{ $socio->id }}">{{ $socio->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-row">
                    <label for="monto">Monto</label>
                    <input type="number" name="monto" step="0.01" required />
                </div>
                <div class="form-row">
                    <label for="tipo">Tipo</label>
                    <select name="tipo" required>
                        <option value="favor">A favor</option>
                        <option value="contra">En contra</option>
                    </select>
                </div>
            </div>
 <button
                    type="button"
                    class="btn btn-cancel"
                    onclick="closeModal('modal-diferencia')"
                >
                    Cancelar
                </button>
                <button type="submit" class="btn btn-save">Guardar</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openModal(id) {
        document.getElementById(id).style.display = 'flex';
    }
    function closeModal(id) {
        document.getElementById(id).style.display = 'none';
    }

    function openTab(evt, tabName) {
        const contents = document.getElementsByClassName("tab-content");
        for (let i = 0; i < contents.length; i++) {
            contents[i].style.display = "none";
        }

        const buttons = document.getElementsByClassName("tab-button");
        for (let i = 0; i < buttons.length; i++) {
            buttons[i].classList.remove("active");
        }

        document.getElementById(tabName).style.display = "block";
        evt.currentTarget.classList.add("active");
    }

    document.addEventListener("DOMContentLoaded", function () {
        // Activate first tab on load
        const firstTab = document.querySelector(".tab-button");
        if (firstTab) {
            firstTab.click();
        }
    });

      function openModalEditarSocio(id) {
        fetch(`/utilidades/socio/${id}/edit`)
            .then(res => res.json())
            .then(data => {
                document.getElementById('edit-nombre').value = data.nombre;
                document.getElementById('edit-aportacion').value = data.aportacion;
                document.getElementById('form-editar-socio').action = `/utilidades/socio/${id}`;
                openModal('modal-editar-socio');
            });
    }

    function openModalEditarIngreso(id) {
        fetch(`/utilidades/ingreso/${id}/edit`)
            .then(res => res.json())
            .then(data => {
                document.getElementById('edit-concepto').value = data.concepto;
                document.getElementById('edit-monto').value = data.monto;
                document.getElementById('edit-fecha').value = data.fecha;
                document.getElementById('form-editar-ingreso').action = `/utilidades/ingreso/${id}`;
                openModal('modal-editar-ingreso');
            });
    }

    function openModalEditarDiferencia(id) {
        fetch(`/utilidades/diferencia/${id}/edit`)
            .then(res => res.json())
            .then(data => {
                document.getElementById('edit-motivo').value = data.motivo;
                document.getElementById('edit-socio-id').value = data.socio_id;
                document.getElementById('edit-monto-dif').value = data.monto;
                document.getElementById('edit-tipo').value = data.tipo;
                document.getElementById('form-editar-diferencia').action = `/utilidades/diferencia/${id}`;
                openModal('modal-editar-diferencia');
            });
    }
</script>

</body>
</html>