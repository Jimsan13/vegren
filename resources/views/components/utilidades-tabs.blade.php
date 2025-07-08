<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Repartición de Utilidades</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1100px;
            margin: auto;
            padding: 20px;
        }
        .header-title {
            color: #333;
            margin-bottom: 20px;
            font-size: 2em; /* Título más grande */
        }
        .card {
            background: white;
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
        }
        .card h3 {
            margin-top: 0;
            margin-bottom: 15px;
            color: #555;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
        }
        .summary-grid {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            margin-bottom: 20px; /* Espacio después del resumen */
        }
        .summary-box {
            flex: 1;
            min-width: 250px;
            background: #e6f0ff;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .summary-box i {
            font-size: 30px;
            color: rgb(39, 181, 51);
            margin-bottom: 5px;
        }
        .summary-box h4 {
            margin: 5px 0;
            font-size: 24px;
            color: #333;
        }
        .summary-box p {
            margin: 0;
            font-size: 14px;
            color: #666;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        .table th, .table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .table th {
            background-color: #f5f5f5;
            font-weight: bold;
            color: #444;
        }
        .table tbody tr:hover {
            background-color: #f9f9f9;
        }
        .text-success { color: green; }
        .text-danger { color: red; }

        /* Estilo general del botón */
        .btn {
            padding: 8px 16px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin-top: 15px;
            cursor: pointer;
            border: none;
            font-size: 16px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        /* Estilos específicos para diferentes tipos de botones */
        .btn-primary { /* Para botones "Agregar" fuera de los modales */
            background: rgb(9, 182, 55);
            color: white;
            font-size: 14px; /* Botón "Agregar" más pequeño */
            padding: 6px 12px;
        }
        .btn-primary:hover {
            background-color: rgb(7, 140, 42);
        }

        .action-btn {
            background: none;
            border: none;
            cursor: pointer;
            margin-right: 8px;
            font-size: 1.1em;
            transition: color 0.2s ease;
        }
        .action-btn.red-x {
            color: #dc3545; /* Rojo peligro de Bootstrap */
        }
        .action-btn.red-x:hover {
            color: #c82333;
        }
        .action-btn.blue-edit {
            color: #007bff; /* Azul primario de Bootstrap */
        }
        .action-btn.blue-edit:hover {
            color: #0056b3;
        }

        /* Contenedor para el botón "Agregar" a la derecha */
        .add-button-container {
            display: flex;
            justify-content: flex-end; /* Mueve el botón a la derecha */
            margin-top: 15px; /* Espacio arriba del botón */
        }

        /* Estilos del Modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 99;
            left: 0; top: 0;
            width: 100%; height: 100%;
            background-color: rgba(0,0,0,0.5);
            justify-content: center;
            align-items: center;
        }
        .modal-content {
            background: white;
            padding: 0; /* padding handled by modal-body */
            border-radius: 10px;
            width: 550px; /* Ancho para modales estándar */
            max-width: 90%;
            position: relative;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            overflow: hidden; /* Ensure rounded corners */
        }
        .modal-header {
            background-color: rgb(39, 181, 51); /* Encabezado verde */
            color: white;
            padding: 15px 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .modal-header h4 {
            margin: 0;
            font-size: 1.4em;
        }
        .modal-close {
            font-size: 28px;
            cursor: pointer;
            color: white;
            transition: color 0.2s ease;
        }
        .modal-close:hover {
            color: #eee;
        }
        .modal-body {
            padding: 25px;
        }
        .modal input, .modal select {
            width: calc(100% - 20px); /* Ajustar por padding y borde */
            padding: 10px;
            margin: 0; /* Quitar margen por defecto */
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box; /* Incluir padding en el ancho */
        }
        .modal .button-group {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 20px;
            padding: 15px 25px;
            border-top: 1px solid #eee;
            background-color: #f9f9f9;
        }
        .modal .btn-cancel {
            background-color: #f44336; /* Rojo para cancelar */
            color: white;
        }
        .modal .btn-cancel:hover {
            background-color: #d32f2f;
        }
        .modal .btn-save {
            background-color: rgb(9, 182, 55); /* Verde para guardar */
            color: white;
        }
        .modal .btn-save:hover {
            background-color: rgb(7, 140, 42);
        }

        /* Estilos de Navegación por Pestañas */
        .tab-nav {
            display: flex;
            border-bottom: 2px solid #ddd;
            margin-bottom: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
            padding: 5px;
            overflow-x: auto; /* Permite desplazamiento horizontal si hay muchas pestañas */
        }
        .tab-button {
            padding: 10px 20px;
            cursor: pointer;
            border: none;
            background-color: transparent;
            color: #555;
            font-size: 16px;
            transition: color 0.3s, background-color 0.3s;
            border-radius: 8px 8px 0 0;
            margin-right: 2px; /* Pequeño espacio entre pestañas */
            white-space: nowrap; /* Evita que el texto se envuelva */
        }
        .tab-button:hover {
            color: #333;
            background-color: #f0f0f0;
        }
        .tab-button.active {
            background-color: rgb(39, 181, 51); /* Pestaña activa verde */
            color: white;
            font-weight: bold;
        }
        .tab-content {
            display: none;
        }
        .tab-content.active {
            display: block;
        }

        /* Filas de formulario para entradas de modal */
        .form-row {
            display: flex;
            gap: 15px;
            margin-bottom: 10px;
            align-items: flex-end; /* Alinea las entradas/selects en la parte inferior */
        }
        .form-column {
            flex: 1;
            display: flex;
            flex-direction: column;
        }
        .form-column label {
            font-size: 0.9em;
            color: #666;
            margin-bottom: 5px;
            white-space: nowrap; /* Evita que la etiqueta se envuelva */
        }
        .form-column input, .form-column select {
            width: 100%;
            margin: 0; /* Sobreescribir margen por defecto */
        }
        .input-with-icon {
            display: flex;
            align-items: center;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding-right: 8px; /* Espacio para el icono */
            background-color: #fff; /* Asegura fondo blanco para la parte de entrada */
        }
        .input-with-icon input {
            border: none;
            flex-grow: 1;
            padding: 10px;
            margin: 0;
            outline: none; /* Elimina el contorno al enfocar */
        }
        .input-with-icon i {
            color: #888;
            padding: 0 5px;
            cursor: pointer;
        }
        .input-with-icon.select-wrapper {
            position: relative;
        }
        .input-with-icon.select-wrapper select {
            appearance: none; /* Remover flecha por defecto */
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%23666%22%20d%3D%22M287%2069.9a17.6%2017.6%200%200%200-24.7%200L146.2%20186.6%2030.1%2069.9A17.6%2017.6%200%200%200%205.4%2094.6l116.1%20116.1a17.6%2017.6%200%200%200%2024.7%200l116.1-116.1a17.6%2017.6%200%200%200%200-24.7z%22%2F%3E%3C%2Fsvg%3E'); /* Flecha personalizada */
            background-repeat: no-repeat;
            background-position: right 8px center;
            background-size: 10px;
        }
    </style>
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