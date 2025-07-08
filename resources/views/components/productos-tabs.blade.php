<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cotizaciones y Recepción de Brócoli</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Variables CSS */
        :root {
            --primary-green: #28a745; /* Verde principal para el color de acento */
            --dark-green: #1e7e34; /* Verde más oscuro para quizás hover o estados activos */
            --light-green: #E8F5E9; /* Un verde muy claro para fondos de sidebar/dashboard */
            --lighter-green: #DCEDC8; /* Otro verde claro, un poco más oscuro que light-green */
            --text-dark: #444444; /* Texto oscuro general */
            --text-light: #666; /* Texto más claro para descripciones */
            --card-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15); /* Sombra de tarjeta */
            --black-icons-text: #000; /* Asegura que los iconos y algunos textos sean negros */
        }

        /* Estilos generales del cuerpo */
        body {
            font-family: 'Nunito', sans-serif; /* Asumiendo que Nunito está disponible o importado */
            background-color: var(--light-green); /* Fondo verde claro del dashboard */
            margin: 0;
            padding: 20px;
            overflow-x: hidden; /* Evita el scroll horizontal */
            min-height: 100vh; /* Asegura que el body ocupe al menos el alto de la vista */
        }

        /* Contenedor principal del módulo */
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: var(--card-shadow); /* Sombra para el contenedor principal */
        }

        /* Estilos para encabezados */
        h2, h3 {
            color: var(--black-icons-text);
            margin-bottom: 15px;
        }

        /* Estilos de botones personalizados */
        .btn-primary-custom {
            background-color: var(--primary-green);
            border-color: var(--primary-green);
            color: white;
            border-radius: 0.5rem;
            padding: 0.5rem 1.5rem;
            font-weight: 500;
            transition: background-color 0.2s ease-in-out, border-color 0.2s ease-in-out;
        }
        .btn-primary-custom:hover {
            background-color: var(--dark-green);
            border-color: var(--dark-green);
            color: white;
        }

        /* Botón de cerrar para el modal (rojo) */
        .modal-header .close {
            background-color: var(--danger-color, #dc3545); /* Color rojo para el botón de cerrar */
            border: none;
            color: white;
            opacity: 1; /* Asegura que no tenga transparencia por defecto */
            font-size: 1.5rem;
            padding: 0.5rem 1rem;
            border-radius: 0.25rem;
            cursor: pointer;
            line-height: 1; /* Ajusta la altura de línea para centrar la X */
        }
        .modal-header .close:hover {
            background-color: var(--danger-dark-color, #c82333);
        }

        /* Estilos de la tabla */
        .table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        .table th, .table td {
            border: 1px solid #dee2e6; /* Color de borde más claro */
            padding: 12px;
            text-align: left;
        }
        .table th {
            background-color: #e9ecef; /* Fondo más claro para los encabezados */
            color: var(--text-dark);
            font-weight: 600;
        }
        .table tbody tr:nth-child(odd) {
            background-color: #f8f9fa; /* Rayas alternas para mejor legibilidad */
        }
        .table tbody tr:hover {
            background-color: #e2e6ea; /* Resaltar fila al pasar el ratón */
        }

        /* Estilos del Modal */
        .modal-content {
            border-radius: 0.75rem;
            overflow: hidden; /* Para que los bordes del header/footer se ajusten al border-radius */
        }
        .modal-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
            padding: 1.25rem 1.5rem;
        }
        .modal-title {
            color: var(--black-icons-text);
            font-weight: 600;
        }
        .modal-body {
            padding: 1.5rem;
        }
        .modal-footer {
            border-top: 1px solid #dee2e6;
            padding: 1rem 1.5rem;
            justify-content: flex-end; /* Alinea los botones a la derecha */
        }
        .form-group {
            margin-bottom: 1rem;
        }
        .form-group label {
            font-weight: 500;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
        }
        .form-control {
            border-radius: 0.35rem;
            border: 1px solid #ced4da;
            padding: 0.75rem 1rem;
        }
        .form-control:focus {
            border-color: var(--primary-green);
            box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
        }
        .input-group-prepend .input-group-text {
            background-color: #e9ecef;
            border: 1px solid #ced4da;
            border-right: none;
            color: var(--text-dark);
            border-radius: 0.35rem 0 0 0.35rem;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2></h2>
        <h3>Resumen de Cotizaciones</h3>

        <table class="table">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Total de cajas</th>
                    <th>Total de kilos</th>
                    <th>Precio por kilo</th>
                    <th>Nombre del proveedor</th>
                    <th>Total a pagar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>2024-06-10</td>
                    <td>120</td>
                    <td>1800</td>
                    <td>$1.20</td>
                    <td>AgroFresco S.A.</td>
                    <td>$2160.00</td>
                </tr>
                <tr>
                    <td>2024-06-09</td>
                    <td>95</td>
                    <td>1425</td>
                    <td>$1.18</td>
                    <td>CampoVerde S. de R.L.</td>
                    <td>$1681.50</td>
                </tr>
                <tr>
                    <td>2024-06-08</td>
                    <td>110</td>
                    <td>1650</td>
                    <td>$1.22</td>
                    <td>Hortalizas MX</td>
                    <td>$2013.00</td>
                </tr>
            </tbody>
        </table>

        <button class="btn btn-primary-custom mt-3" data-toggle="modal" data-target="#nuevaCotizacionModal">Agregar cotización</button>
    </div>

    <div class="modal fade" id="nuevaCotizacionModal" tabindex="-1" role="dialog" aria-labelledby="nuevaCotizacionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="nuevaCotizacionModalLabel">Nueva Cotización de Brócoli</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="nuevaCotizacionForm">
                        <div class="form-group">
                            <label for="fecha">Fecha</label>
                            <input type="date" class="form-control" id="fecha" name="fecha" required>
                        </div>
                        <div class="form-group">
                            <label for="total_cajas">Total de cajas</label>
                            <input type="number" class="form-control" id="total_cajas" name="total_cajas" min="0" required>
                        </div>
                        <div class="form-group">
                            <label for="total_kilos">Total de kilos</label>
                            <input type="number" class="form-control" id="total_kilos" name="total_kilos" min="0" required>
                        </div>
                        <div class="form-group">
                            <label for="precio_kilo">Precio por kilo</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="number" step="0.01" class="form-control" id="precio_kilo" name="precio_kilo" min="0" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="proveedor">Nombre del proveedor</label>
                            <input type="text" class="form-control" id="proveedor" name="proveedor" required>
                        </div>
                        <div class="form-group">
                            <label for="total_pagar">Total a pagar</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="text" class="form-control" id="total_pagar" name="total_pagar" readonly>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" form="nuevaCotizacionForm" class="btn btn-primary-custom">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            // Función para calcular el total a pagar
            function calcularTotalPagar() {
                var totalKilos = parseFloat($('#total_kilos').val()) || 0;
                var precioKilo = parseFloat($('#precio_kilo').val()) || 0;
                var totalPagar = totalKilos * precioKilo;
                $('#total_pagar').val(totalPagar.toFixed(2));
            }

            // Detectar cambios en los campos que afectan el cálculo del total
            $('#total_kilos, #precio_kilo').on('input', calcularTotalPagar);

            // Limpiar el formulario y el total a pagar al mostrar el modal
            $('#nuevaCotizacionModal').on('show.bs.modal', function () {
                $('#nuevaCotizacionForm')[0].reset(); // Restablece todos los campos del formulario
                $('#total_pagar').val(''); // Asegura que el campo de total esté vacío
            });

            // Manejo del envío del formulario (simulado)
            $('#nuevaCotizacionForm').on('submit', function(e) {
                e.preventDefault(); // Evita el envío tradicional del formulario
                
                // Aquí iría la lógica para enviar los datos a tu backend (usando AJAX, fetch, etc.)
                // Por ejemplo:
                var formData = {
                    fecha: $('#fecha').val(),
                    total_cajas: $('#total_cajas').val(),
                    total_kilos: $('#total_kilos').val(),
                    precio_kilo: $('#precio_kilo').val(),
                    proveedor: $('#proveedor').val(),
                    total_pagar: $('#total_pagar').val()
                };
                console.log("Datos a guardar:", formData);

                // Cierra el modal después de "guardar"
                $('#nuevaCotizacionModal').modal('hide');
                alert('Cotización guardada exitosamente (simulación)');

                // En una aplicación real, aquí recargarías la tabla o agregarías la nueva fila dinámicamente
            });
        });
    </script>
</body>
</html>