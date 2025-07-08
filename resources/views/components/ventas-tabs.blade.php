<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resumen de Ventas y Estado Financiero</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 20px;
        }

        .ventana {
            background-color: #fff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            max-width: 100%;
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #2c3e50;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ccc;
            text-align: center;
        }

        th {
            background-color: #2c3e50;
            color: white;
        }

        .positivo {
            color: #28a745; /* A slightly darker green for positive */
            font-weight: bold;
        }

        .negativo {
            color: #dc3545; /* A slightly darker red for negative */
            font-weight: bold;
        }

        .badge {
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 0.9em;
        }

        .pagado {
            background-color: #2ecc71;
            color: white;
        }

        .credito {
            background-color: #f1c40f;
            color: black;
        }

        .resumen {
            display: flex;
            justify-content: space-around;
            margin-top: 30px;
        }

        .card {
            background-color: #ecf0f1;
            padding: 20px;
            width: 45%;
            text-align: center;
            border-radius: 10px;
            box-shadow: 2px 2px 8px rgba(0,0,0,0.1);
        }

        .card h4 {
            margin-bottom: 10px;
        }

        .btn {
            padding: 6px 10px;
            margin: 2px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            color: white;
        }

        .btn-editar {
            background-color: #3498db;
        }

        .btn-borrar {
            background-color: #e74c3c;
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 10;
            left: 0; top: 0;
            width: 100%; height: 100%;
            background-color: rgba(0,0,0,0.5);
            display: flex; /* Added for centering */
            align-items: center; /* Added for centering */
            justify-content: center; /* Added for centering */
        }

        .modal-content {
            background-color: #fcfcfc; /* Slightly off-white background */
            margin: auto; /* Removed top margin, replaced with flex centering */
            padding: 30px; /* Increased padding */
            border-radius: 15px; /* Increased border-radius for softer edges */
            width: 450px; /* Slightly wider */
            text-align: center;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2); /* Stronger, softer shadow */
            position: relative; /* Needed for absolute positioning of close button */
        }

        .modal-content h3 {
            color: #34495e; /* Darker title color */
            margin-bottom: 25px;
            font-size: 1.5em;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px; /* Space between icon and text */
        }

        .modal-content form label {
            display: block;
            text-align: left;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        .modal-content form input[type="text"],
        .modal-content form input[type="number"],
        .modal-content form input[type="date"],
        .modal-content form input[type="month"] {
            width: calc(100% - 22px); /* Adjust width considering padding and border */
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box; /* Include padding and border in the element's total width and height */
        }

        .modal-content form button[type="submit"] {
            padding: 10px 20px;
            margin-top: 15px;
            font-size: 1em;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        .close {
            color: #888;
            position: absolute; /* Position relative to modal-content */
            top: 15px;
            right: 15px;
            font-size: 24px;
            font-weight: normal; /* Less bold */
            cursor: pointer;
            transition: color 0.2s ease;
        }

        .close:hover {
            color: #333;
        }

        /* Styles for Tabs */
        .tab-buttons {
            display: flex;
            margin-bottom: 20px;
            border-bottom: 2px solid #ccc;
        }
        .tab-button {
            padding: 10px 20px;
            cursor: pointer;
            border: 1px solid #ccc;
            border-bottom: none;
            border-radius: 5px 5px 0 0;
            background-color: #f0f0f0;
            margin-right: 5px;
            display: flex; /* For icon alignment */
            align-items: center; /* For icon alignment */
            gap: 8px; /* Space between icon and text */
        }
        .tab-button.active {
            background-color: #fff;
            border-bottom: 2px solid #2c3e50;
            font-weight: bold;
        }
        .tab-content {
            display: none;
            padding: 20px;
            border: 1px solid #ccc;
            border-top: none;
            border-radius: 0 0 10px 10px;
            background-color: #fff;
        }
        .tab-content.active {
            display: block;
        }

        /* Styles for Add buttons within sections */
        .add-button-container {
            text-align: right;
            margin-bottom: 15px;
        }
        .add-button {
            background-color: #28a745; /* A more pleasant green */
            color: white;
            padding: 10px 20px; /* Slightly larger padding */
            border: none;
            border-radius: 8px; /* Slightly more rounded */
            cursor: pointer;
            font-size: 1em; /* Slightly larger font */
            transition: background-color 0.3s ease; /* Smooth transition */
        }
        .add-button:hover {
            background-color: #218838; /* Darker green on hover */
        }
    </style>
</head>
<body>

<div class="ventana">
    <h2>Resumen de Ventas y Estado Financiero</h2>

    <div class="tab-buttons">
        <div class="tab-button active" onclick="openTab(event, 'general-providers')"><i class="fas fa-chart-pie"></i> Resumen General y Proveedores</div>
        <div class="tab-button" onclick="openTab(event, 'transacciones')"><i class="fas fa-exchange-alt"></i> Detalle de Transacciones</div>
        <div class="tab-button" onclick="openTab(event, 'ingresos-mes')"><i class="fas fa-chart-line"></i> Reporte de Ingresos por Mes</div>
        <div class="tab-button" onclick="openTab(event, 'deudas')"><i class="fas fa-hand-holding-usd"></i> Deudas Acumuladas</div>
    </div>

    <div id="general-providers" class="tab-content active">
        <div style="display: flex; justify-content: space-around; margin-bottom: 20px;">
            <div class="card" style="width: 48%;">
                <h4><i class="fas fa-info-circle"></i> Resumen General</h4>
                <p>Pérdida o Ganancia: <span class="positivo">$1,250.00</span></p>
                <p>Saldos Disponibles: $8,750.00</p>
            </div>
            <div class="card" style="width: 48%;">
                <h4><i class="fas fa-truck"></i> Proveedores</h4>
                <p>Proveedores Pagados: $5,000.00</p>
                <p>Proveedores en Crédito: $1,500.00</p>
            </div>
        </div>
    </div>

    <div id="transacciones" class="tab-content">
        <div class="add-button-container">
            <button class="add-button" onclick="abrirModal('agregar-transaccion')">
                <i class="fas fa-plus"></i> Añadir Transacción
            </button>
        </div>
        <table>
            <thead>
                <tr>
                    <th><i class="fas fa-calendar-alt"></i> Fecha</th>
                    <th><i class="fas fa-box"></i> Lote</th>
                    <th><i class="fas fa-cash-register"></i> Caja</th>
                    <th><i class="fas fa-file-alt"></i> Descripción</th>
                    <th><i class="fas fa-coins"></i> Costo (Prod. y M.O.)</th>
                    <th><i class="fas fa-dollar-sign"></i> Ingresos</th>
                    <th><i class="fas fa-money-bill-wave"></i> Egresos</th>
                    <th><i class="fas fa-cogs"></i> Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>2023-10-26</td>
                    <td>L001</td>
                    <td>C101</td>
                    <td>Venta de productos A</td>
                    <td>$150.00</td>
                    <td>$300.00</td>
                    <td>$0.00</td>
                    <td>
                        <button class="btn btn-editar" onclick="abrirModal('editar-transaccion')"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-borrar" onclick="abrirModal('borrar-transaccion')"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>2023-10-26</td>
                    <td>L002</td>
                    <td>C102</td>
                    <td>Compra de insumos</td>
                    <td>$0.00</td>
                    <td>$0.00</td>
                    <td>$200.00</td>
                    <td>
                        <button class="btn btn-editar" onclick="abrirModal('editar-transaccion')"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-borrar" onclick="abrirModal('borrar-transaccion')"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>2023-10-25</td>
                    <td>L005</td>
                    <td>C101</td>
                    <td>Pago nómina</td>
                    <td>$0.00</td>
                    <td>$0.00</td>
                    <td>$500.00</td>
                    <td>
                        <button class="btn btn-editar" onclick="abrirModal('editar-transaccion')"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-borrar" onclick="abrirModal('borrar-transaccion')"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>2023-10-24</td>
                    <td>L004</td>
                    <td>C103</td>
                    <td>Venta de productos B</td>
                    <td>$200.00</td>
                    <td>$450.00</td>
                    <td>$0.00</td>
                    <td>
                        <button class="btn btn-editar" onclick="abrirModal('editar-transaccion')"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-borrar" onclick="abrirModal('borrar-transaccion')"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div id="ingresos-mes" class="tab-content">
        <div class="add-button-container">
            <button class="add-button" onclick="abrirModal('agregar-ingreso-mes')">
                <i class="fas fa-plus"></i> Añadir Ingreso Mensual
            </button>
        </div>
        <div class="resumen" style="flex-direction: column; align-items: center;">
            <div class="card" style="width: 90%; margin-bottom: 20px;">
                <h4><i class="fas fa-chart-bar"></i> Gráfico de Ingresos (Mes Actual vs. Anterior)</h4>
                <div style="height: 200px; background-color: #dde1e6; display: flex; align-items: center; justify-content: center;">
                    [Gráfico Placeholder]
                </div>
            </div>
            <div style="display: flex; justify-content: space-around; width: 90%;">
                <div class="card" style="width: 48%;">
                    <h4><i class="fas fa-money-check-alt"></i> Ingresos Mes Actual</h4>
                    <p class="positivo">$750.00</p>
                </div>
                <div class="card" style="width: 48%;">
                    <h4><i class="fas fa-calendar-alt"></i> Ingresos Mes Anterior</h4>
                    <p class="positivo">$1,200.00</p>
                </div>
            </div>
            <div style="display: flex; justify-content: space-around; width: 90%; margin-top: 20px;">
                <div class="card" style="width: 48%;">
                    <h4><i class="fas fa-hand-holding-usd"></i> Total Ingresos</h4>
                    <p class="positivo">$1,950.00</p>
                </div>
                <div class="card" style="width: 48%;">
                    <h4><i class="fas fa-money-bill-wave-alt"></i> Total Egresos</h4>
                    <p class="negativo">$700.00</p>
                </div>
            </div>
        </div>
    </div>

    <div id="deudas" class="tab-content">
        <div class="add-button-container">
            <button class="add-button" onclick="abrirModal('agregar-deuda')">
                <i class="fas fa-plus"></i> Añadir Deuda
            </button>
        </div>
        <div class="card" style="width: 50%; margin: 0 auto; text-align: left; padding: 20px;">
            <h4><i class="fas fa-receipt"></i> Deudas Acumuladas</h4>
            <p>Insumos: <span class="negativo">$300.00</span></p>
            <p>Nómina: <span class="negativo">$1,000.00</span></p>
            <p>Proveedores: <span class="negativo">$1,500.00</span></p>
            <p>Transferencias: <span class="negativo">$200.00</span></p>
            <hr>
            <p>Total Deudas: <span class="negativo">$3,000.00</span></p>
        </div>
    </div>
</div>

<div id="modal-agregar-transaccion" class="modal">
    <div class="modal-content">
        <span class="close" onclick="cerrarModal('agregar-transaccion')">&times;</span>
        <h3><i class="fas fa-plus-circle"></i> Añadir Nueva Transacción</h3>
        <form>
            <label for="fecha-transaccion"><i class="fas fa-calendar-alt"></i> Fecha:</label><br>
            <input type="date" id="fecha-transaccion" name="fecha-transaccion"><br><br>
            <label for="descripcion-transaccion"><i class="fas fa-file-alt"></i> Descripción:</label><br>
            <input type="text" id="descripcion-transaccion" name="descripcion-transaccion"><br><br>
            <label for="costo-prod-transaccion"><i class="fas fa-coins"></i> Costo Producto:</label><br>
            <input type="number" id="costo-prod-transaccion" name="costo-prod-transaccion"><br><br>
            <label for="ingreso-transaccion"><i class="fas fa-dollar-sign"></i> Ingreso:</label><br>
            <input type="number" id="ingreso-transaccion" name="ingreso-transaccion"><br><br>
            <label for="egreso-transaccion"><i class="fas fa-money-bill-wave"></i> Egreso:</label><br>
            <input type="number" id="egreso-transaccion" name="egreso-transaccion"><br><br>
            <button type="submit" class="btn btn-editar">Guardar Transacción</button>
        </form>
    </div>
</div>

<div id="modal-editar-transaccion" class="modal">
    <div class="modal-content">
        <span class="close" onclick="cerrarModal('editar-transaccion')">&times;</span>
        <h3><i class="fas fa-edit"></i> Editar Transacción</h3>
        <p>Aquí puedes modificar la información de la transacción seleccionada.</p>
        <button onclick="cerrarModal('editar-transaccion')" class="btn btn-editar">Guardar Cambios</button>
    </div>
</div>

<div id="modal-borrar-transaccion" class="modal">
    <div class="modal-content">
        <span class="close" onclick="cerrarModal('borrar-transaccion')">&times;</span>
        <h3><i class="fas fa-trash-alt"></i> Confirmar Eliminación</h3>
        <p>¿Estás seguro de eliminar este registro de transacción? Esta acción no se puede deshacer.</p>
        <button onclick="cerrarModal('borrar-transaccion')" class="btn btn-borrar">Eliminar</button>
    </div>
</div>

<div id="modal-agregar-ingreso-mes" class="modal">
    <div class="modal-content">
        <span class="close" onclick="cerrarModal('agregar-ingreso-mes')">&times;</span>
        <h3><i class="fas fa-chart-line"></i> Añadir Ingreso Mensual</h3>
        <form>
            <label for="mes-ingreso"><i class="fas fa-calendar-alt"></i> Mes:</label><br>
            <input type="month" id="mes-ingreso" name="mes-ingreso"><br><br>
            <label for="monto-ingreso-mes"><i class="fas fa-dollar-sign"></i> Monto:</label><br>
            <input type="number" id="monto-ingreso-mes" name="monto-ingreso-mes"><br><br>
            <button type="submit" class="btn btn-editar">Guardar Ingreso</button>
        </form>
    </div>
</div>

<div id="modal-agregar-deuda" class="modal">
    <div class="modal-content">
        <span class="close" onclick="cerrarModal('agregar-deuda')">&times;</span>
        <h3><i class="fas fa-hand-holding-usd"></i> Añadir Nueva Deuda</h3>
        <form>
            <label for="tipo-deuda"><i class="fas fa-tag"></i> Tipo de Deuda:</label><br>
            <input type="text" id="tipo-deuda" name="tipo-deuda"><br><br>
            <label for="monto-deuda"><i class="fas fa-dollar-sign"></i> Monto:</label><br>
            <input type="number" id="monto-deuda" name="monto-deuda"><br><br>
            <button type="submit" class="btn btn-editar">Guardar Deuda</button>
        </form>
    </div>
</div>


<script>
    function openTab(evt, tabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tab-content");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tab-button");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(tabName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    function abrirModal(modalId) {
        document.getElementById(`modal-${modalId}`).style.display = 'flex'; /* Changed to flex for centering */
    }

    function cerrarModal(modalId) {
        document.getElementById(`modal-${modalId}`).style.display = 'none';
    }

    // Close the modal when clicking outside of it
    window.onclick = function(event) {
        const modals = document.querySelectorAll('.modal');
        modals.forEach(modal => {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        });
    }

    // Set the first tab as active by default on page load
    document.addEventListener('DOMContentLoaded', (event) => {
        document.querySelector('.tab-button').click();
    });
</script>

</body>
</html>