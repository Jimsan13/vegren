<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Repartición de Utilidades</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    @section('styles')
<link rel="stylesheet" href="{{ asset('css/utilidades.css') }}">
@endsection
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
            <h4>2</h4>
            <p>Socios Registrados</p>
        </div>
    </div>

    <div class="tab-nav">
        <button class="tab-button" onclick="openTab(event, 'socios')">Socios</button>
        <button class="tab-button" onclick="openTab(event, 'ingresos')">Detalle de Uso de Ingresos</button>
        <button class="tab-button" onclick="openTab(event, 'diferencias')">Diferencias de Reparto</button>
    </div>

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
                <tr>
                    <td>Socio 1</td>
                    <td>$5,000</td>
                    <td><i class="fas fa-eye"></i></td>
                    <td>
                        <button class="action-btn blue-edit"><i class="fas fa-pencil-alt"></i></button>
                        <button class="action-btn red-x"><i class="fas fa-times"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>Socio 2</td>
                    <td>$4,500</td>
                    <td><i class="fas fa-eye"></i></td>
                    <td>
                        <button class="action-btn blue-edit"><i class="fas fa-pencil-alt"></i></button>
                        <button class="action-btn red-x"><i class="fas fa-times"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="add-button-container">
            <button class="btn btn-primary" onclick="openModal('modal-socio')"><i class="fas fa-plus"></i> Agregar Socio</button>
        </div>
    </div>

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
                <tr>
                    <td>Pago servicios básicos</td>
                    <td class="text-danger">$1,500</td>
                    <td>01/08/2024</td>
                    <td>
                        <button class="action-btn blue-edit"><i class="fas fa-pencil-alt"></i></button>
                        <button class="action-btn red-x"><i class="fas fa-times"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>Inversión maquinaria</td>
                    <td class="text-danger">$10,000</td>
                    <td>05/08/2024</td>
                    <td>
                        <button class="action-btn blue-edit"><i class="fas fa-pencil-alt"></i></button>
                        <button class="action-btn red-x"><i class="fas fa-times"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="add-button-container">
            <button class="btn btn-primary" onclick="openModal('modal-ingreso')"><i class="fas fa-plus"></i> Agregar Uso de Ingreso</button>
        </div>
    </div>

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
                <tr>
                    <td>Ajuste capital inicial</td>
                    <td>Socio 1</td>
                    <td class="text-success">$500</td>
                    <td>A favor</td>
                    <td>
                        <button class="action-btn blue-edit"><i class="fas fa-pencil-alt"></i></button>
                        <button class="action-btn red-x"><i class="fas fa-times"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>Diferencia proyecto X</td>
                    <td>Socio 2</td>
                    <td class="text-danger">-$200</td>
                    <td>En contra</td>
                    <td>
                        <button class="action-btn blue-edit"><i class="fas fa-pencil-alt"></i></button>
                        <button class="action-btn red-x"><i class="fas fa-times"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="add-button-container">
            <button class="btn btn-primary" onclick="openModal('modal-diferencia')"><i class="fas fa-plus"></i> Agregar Diferencia</button>
        </div>
    </div>

</div>

<div id="modal-socio" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h4>Agregar Socio</h4>
            <span class="modal-close" onclick="closeModal('modal-socio')">&times;</span>
        </div>
        <div class="modal-body">
            <div class="form-row">
                <div class="form-column">
                    <label for="socio-nombre">Nombre del Socio</label>
                    <input type="text" id="socio-nombre" placeholder="Ingrese nombre">
                </div>
            </div>
            <div class="form-row">
                <div class="form-column">
                    <label for="socio-aportacion">Aportación</label>
                    <div class="input-with-icon">
                        <input type="number" id="socio-aportacion" placeholder="0.00">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="button-group">
            <button class="btn btn-cancel" onclick="closeModal('modal-socio')">Cancelar</button>
            <button class="btn btn-save">Guardar</button>
        </div>
    </div>
</div>

<div id="modal-ingreso" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h4>Agregar Uso de Ingreso</h4>
            <span class="modal-close" onclick="closeModal('modal-ingreso')">&times;</span>
        </div>
        <div class="modal-body">
            <div class="form-row">
                <div class="form-column">
                    <label for="ingreso-concepto">Concepto</label>
                    <input type="text" id="ingreso-concepto" placeholder="Ingrese concepto">
                </div>
            </div>
            <div class="form-row">
                <div class="form-column">
                    <label for="ingreso-monto">Monto</label>
                    <div class="input-with-icon">
                        <input type="number" id="ingreso-monto" placeholder="0.00">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                </div>
                <div class="form-column">
                    <label for="ingreso-fecha">Fecha</label>
                    <div class="input-with-icon">
                        <input type="date" id="ingreso-fecha">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="button-group">
            <button class="btn btn-cancel" onclick="closeModal('modal-ingreso')">Cancelar</button>
            <button class="btn btn-save">Guardar</button>
        </div>
    </div>
</div>

<div id="modal-diferencia" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h4>Agregar Diferencia</h4>
            <span class="modal-close" onclick="closeModal('modal-diferencia')">&times;</span>
        </div>
        <div class="modal-body">
            <div class="form-row">
                <div class="form-column">
                    <label for="diferencia-motivo">Motivo</label>
                    <input type="text" id="diferencia-motivo" placeholder="Ingrese motivo">
                </div>
            </div>
            <div class="form-row">
                <div class="form-column">
                    <label for="diferencia-socio">Socio</label>
                    <div class="input-with-icon select-wrapper">
                        <select id="diferencia-socio">
                            <option value="">Seleccione Socio</option>
                            <option value="socio1">Socio 1</option>
                            <option value="socio2">Socio 2</option>
                        </select>
                        <i class="fas fa-user"></i>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-column">
                    <label for="diferencia-monto">Monto</label>
                    <div class="input-with-icon">
                        <input type="number" id="diferencia-monto" placeholder="0.00">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                </div>
                <div class="form-column">
                    <label for="diferencia-tipo">Tipo</label>
                    <div class="input-with-icon select-wrapper">
                        <select id="diferencia-tipo">
                            <option value="favor">A favor</option>
                            <option value="contra">En contra</option>
                        </select>
                        <i class="fas fa-right-left"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="button-group">
            <button class="btn btn-cancel" onclick="closeModal('modal-diferencia')">Cancelar</button>
            <button class="btn btn-save">Guardar</button>
        </div>
    </div>
</div>

<script>
    function openModal(id) {
        document.getElementById(id).style.display = "flex";
    }
    function closeModal(id) {
        document.getElementById(id).style.display = "none";
    }

    function openTab(evt, tabName) {
        var i, tabcontent, tabbuttons;

        tabcontent = document.getElementsByClassName("tab-content");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        tabbuttons = document.getElementsByClassName("tab-button");
        for (i = 0; i < tabbuttons.length; i++) {
            tabbuttons[i].className = tabbuttons[i].className.replace(" active", "");
        }

        document.getElementById(tabName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    // Abrir la primera pestaña (Socios) por defecto al cargar la página
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelector(".tab-nav .tab-button:first-child").click();
    });
</script>

</body>
</html>