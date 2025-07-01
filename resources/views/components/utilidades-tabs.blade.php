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
    h2 {
      border-bottom: 2px solid #ccc;
      padding-bottom: 5px;
      color: #333;
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
    }
    .summary-grid {
      display: flex;
      gap: 20px;
      flex-wrap: wrap;
    }
    .summary-box {
      flex: 1;
      min-width: 250px;
      background: #e6f0ff;
      padding: 20px;
      border-radius: 10px;
      text-align: center;
    }
    .summary-box i {
      font-size: 30px;
      color:rgb(39, 181, 51);
    }
    .summary-box h4 {
      margin: 10px 0 5px;
      font-size: 22px;
    }
    .table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
    }
    .table th, .table td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
    .table th {
      background-color: #f5f5f5;
    }
    .text-success { color: green; }
    .text-danger { color: red; }
    .btn {
      background:rgb(9, 182, 55);
      color: white;
      padding: 8px 16px;
      text-decoration: none;
      border-radius: 5px;
      display: inline-block;
      margin-top: 10px;
      cursor: pointer;
    }
    .action-btn {
      background: none;
      border: none;
      color:rgb(22, 193, 76);
      cursor: pointer;
      margin-right: 8px;
    }

    /* Modal Styles */
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
      padding: 20px;
      border-radius: 10px;
      width: 400px;
      position: relative;
    }
    .modal-content h4 {
      margin-top: 0;
    }
    .close {
      position: absolute;
      top: 10px; right: 15px;
      font-size: 20px;
      cursor: pointer;
    }
    .modal input, .modal select {
      width: 100%;
      padding: 8px;
      margin: 8px 0;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
  </style>
</head>
<body>

<div class="container">
  <h2>4.3. Módulo de Repartición de Utilidades</h2>

  <!-- Resumen -->
  <div class="card">
    <h3>Resumen de Utilidades</h3>
    <div class="summary-grid">
      <div class="summary-box">
        <i class="fas fa-sack-dollar"></i>
        <h4>$0</h4>
        <p>Utilidades Repartidas</p>
      </div>
      <div class="summary-box">
        <i class="fas fa-users"></i>
        <h4>2</h4>
        <p>Socios Registrados</p>
      </div>
    </div>
  </div>

  <!-- Socios -->
  <div class="card">
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
            <button class="action-btn"><i class="fas fa-edit"></i></button>
            <button class="action-btn"><i class="fas fa-trash"></i></button>
          </td>
        </tr>
        <tr>
          <td>Socio 2</td>
          <td>$4,500</td>
          <td><i class="fas fa-eye"></i></td>
          <td>
            <button class="action-btn"><i class="fas fa-edit"></i></button>
            <button class="action-btn"><i class="fas fa-trash"></i></button>
          </td>
        </tr>
      </tbody>
    </table>
    <button class="btn" onclick="openModal('modal-socio')">Agregar Socio</button>
  </div>

  <!-- Ingresos -->
  <div class="card">
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
            <button class="action-btn"><i class="fas fa-edit"></i></button>
            <button class="action-btn"><i class="fas fa-trash"></i></button>
          </td>
        </tr>
        <tr>
          <td>Inversión maquinaria</td>
          <td class="text-danger">$10,000</td>
          <td>05/08/2024</td>
          <td>
            <button class="action-btn"><i class="fas fa-edit"></i></button>
            <button class="action-btn"><i class="fas fa-trash"></i></button>
          </td>
        </tr>
      </tbody>
    </table>
    <button class="btn" onclick="openModal('modal-ingreso')">Agregar Uso de Ingreso</button>
  </div>

  <!-- Diferencias -->
  <div class="card">
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
            <button class="action-btn"><i class="fas fa-edit"></i></button>
            <button class="action-btn"><i class="fas fa-trash"></i></button>
          </td>
        </tr>
        <tr>
          <td>Diferencia proyecto X</td>
          <td>Socio 2</td>
          <td class="text-danger">-$200</td>
          <td>En contra</td>
          <td>
            <button class="action-btn"><i class="fas fa-edit"></i></button>
            <button class="action-btn"><i class="fas fa-trash"></i></button>
          </td>
        </tr>
      </tbody>
    </table>
    <button class="btn" onclick="openModal('modal-diferencia')">Agregar Diferencia</button>
  </div>
</div>

<!-- MODALES -->

<!-- Socio -->
<div id="modal-socio" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeModal('modal-socio')">&times;</span>
    <h4>Agregar Socio</h4>
    <input type="text" placeholder="Nombre del Socio">
    <input type="number" placeholder="Aportación">
    <button class="btn">Guardar</button>
  </div>
</div>

<!-- Ingreso -->
<div id="modal-ingreso" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeModal('modal-ingreso')">&times;</span>
    <h4>Agregar Uso de Ingreso</h4>
    <input type="text" placeholder="Concepto">
    <input type="number" placeholder="Monto">
    <input type="date">
    <button class="btn">Guardar</button>
  </div>
</div>

<!-- Diferencia -->
<div id="modal-diferencia" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeModal('modal-diferencia')">&times;</span>
    <h4>Agregar Diferencia</h4>
    <input type="text" placeholder="Motivo">
    <input type="text" placeholder="Nombre del Socio">
    <input type="number" placeholder="Monto">
    <select>
      <option value="favor">A favor</option>
      <option value="contra">En contra</option>
    </select>
    <button class="btn">Guardar</button>
  </div>
</div>

<!-- JS para modales -->
<script>
  function openModal(id) {
    document.getElementById(id).style.display = "flex";
  }
  function closeModal(id) {
    document.getElementById(id).style.display = "none";
  }
</script>

</body>
</html>
