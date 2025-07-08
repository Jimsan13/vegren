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
      color: green;
      font-weight: bold;
    }

    .negativo {
      color: red;
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
    }

    .modal-content {
      background-color: #fff;
      margin: 10% auto;
      padding: 20px;
      border-radius: 10px;
      width: 400px;
      text-align: center;
      box-shadow: 0 0 10px rgba(0,0,0,0.3);
    }

    .close {
      color: #aaa;
      float: right;
      font-size: 20px;
      font-weight: bold;
      cursor: pointer;
    }

    .close:hover {
      color: black;
    }
  </style>
</head>
<body>

<div class="ventana">
  <h2>Resumen de Ventas y Estado Financiero</h2>

  <table>
    <thead>
      <tr>
        <th>Fecha</th>
        <th>Lote</th>
        <th>Caja</th>
        <th>Descripción</th>
        <th>Costo Producto</th>
        <th>Mano de Obra</th>
        <th>Proveedor</th>
        <th>Estado</th>
        <th>Ingresos</th>
        <th>Egresos</th>
        <th>Ganancia/Pérdida</th>
        <th>Deudas</th>
        <th>Saldo</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>2025-07-01</td>
        <td>L-001</td>
        <td>Caja 1</td>
        <td>Venta mayorista</td>
        <td>$1,200</td>
        <td>$300</td>
        <td>Proveedor ABC</td>
        <td><span class="badge pagado">Pagado</span></td>
        <td>$2,500</td>
        <td>$1,700</td>
        <td><span class="positivo">$800</span></td>
        <td>$400</td>
        <td>$600</td>
        <td>
          <button class="btn btn-editar" onclick="abrirModal('editar')"><i class="fas fa-edit"></i></button>
          <button class="btn btn-borrar" onclick="abrirModal('borrar')"><i class="fas fa-trash"></i></button>
        </td>
      </tr>
      <!-- Más filas aquí -->
    </tbody>
  </table>

  <div class="resumen">
    <div class="card">
      <h4>Ingresos Mes Actual</h4>
      <p class="positivo">$3,500.00</p>
    </div>
    <div class="card">
      <h4>Ingresos Mes Anterior</h4>
      <p class="positivo">$4,200.00</p>
    </div>
  </div>
</div>

<!-- Modal de Editar -->
<div id="modal-editar" class="modal">
  <div class="modal-content">
    <span class="close" onclick="cerrarModal('editar')">&times;</span>
    <h3><i class="fas fa-edit"></i> Editar Registro</h3>
    <p>Aquí puedes modificar la información del registro seleccionado.</p>
    <button onclick="cerrarModal('editar')" class="btn btn-editar">Guardar Cambios</button>
  </div>
</div>

<!-- Modal de Borrar -->
<div id="modal-borrar" class="modal">
  <div class="modal-content">
    <span class="close" onclick="cerrarModal('borrar')">&times;</span>
    <h3><i class="fas fa-trash"></i> Confirmar Eliminación</h3>
    <p>¿Estás seguro de eliminar este registro? Esta acción no se puede deshacer.</p>
    <button onclick="cerrarModal('borrar')" class="btn btn-borrar">Eliminar</button>
  </div>
</div>

<script>
  function abrirModal(tipo) {
    document.getElementById(`modal-${tipo}`).style.display = 'block';
  }

  function cerrarModal(tipo) {
    document.getElementById(`modal-${tipo}`).style.display = 'none';
  }

  // Cerrar el modal al hacer clic fuera
  window.onclick = function(event) {
    ['editar', 'borrar'].forEach(tipo => {
      const modal = document.getElementById(`modal-${tipo}`);
      if (event.target == modal) {
        modal.style.display = "none";
      }
    });
  }
</script>

</body>
</html>
