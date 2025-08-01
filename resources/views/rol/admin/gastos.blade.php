@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/gastos.css') }}">
@endsection
@section('title', 'Dashboard de Administración') {{-- Esto establecerá el título en el <head> --}}

@section('sidebar')
    <x-admin.sidebar />
@endsection

@section('navbar')
    <x-admin.navbar />
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4 content-header">
        <h3>Gastos por categoría</h3>
   <div class="row g-4">
    <x-gastos-tabs />

    <div class="tab-content w-100">
        @foreach(['maquinaria','extras','gasolina','deudores','nomina','pagonotas','cliente'] as $categoria)
            <x-gastos-table :categoria="$categoria" />
          
        @endforeach
        <x-modal_gastos/>
    </div>



@endsection
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="{{ asset('js/gastos.js') }}"></script>

    <script>
        const modal = document.getElementById('gastosEditModal');

        if (modal) {
            modal.addEventListener('hide.bs.modal', function () {
                if (modal.contains(document.activeElement)) {
                    document.activeElement.blur();
                }
            });
        }
        // Asegúrate de que este script se ejecute después de que el DOM esté completamente cargado
document.addEventListener('DOMContentLoaded', function() {

    // --- Lógica para mostrar/ocultar campos por categoría (ya deberías tenerla, si no, aquí un ejemplo básico) ---
    const categoriaSelect = document.getElementById('gastoCategoria'); // Asumo que tienes un select para la categoría o la configuras dinámicamente
    const categoriaFields = document.querySelectorAll('.categoria-fields');

    function toggleCategoriaFields() {
        const categoriaActual = categoriaSelect.value;
        categoriaFields.forEach(div => {
            div.classList.add('d-none'); // Oculta todos los campos de categoría
        });
        if (categoriaActual) {
            const targetDiv = document.getElementById(`fields-${categoriaActual}`);
            if (targetDiv) {
                targetDiv.classList.remove('d-none'); // Muestra solo los de la categoría actual
            }
        }
    }

    // Llama a la función si el campo de categoría cambia (si es un select)
    // O llama a esta función cuando el modal se abra y se configure la categoría
    if (categoriaSelect) {
        categoriaSelect.addEventListener('change', toggleCategoriaFields);
    }

    // --- Lógica para el envío del formulario con FETCH ---
    const gastoForm = document.getElementById('gastoForm');
    const gastoIdInput = document.getElementById('gastoId'); // Para saber si es edición o nuevo
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content'); // Obtener el token CSRF

    gastoForm.addEventListener('submit', function(event) {
        event.preventDefault(); // Detiene el envío predeterminado del formulario HTML

        const formData = new FormData(gastoForm); // Crea un objeto FormData con los datos del formulario

        // Obtener el ID del gasto para determinar si es crear o actualizar
        const gastoId = gastoIdInput.value;

        let url = '';
        let method = '';

        if (gastoId) {
            // Modo edición (PUT)
            url = `/gastos/${gastoId}`; // Usa la ruta con {id}
            method = 'PUT';
            formData.append('_method', 'PUT'); // Laravel necesita esto para reconocer PUT
        } else {
            // Modo creación (POST)
            url = `/gastos`; // La ruta para guardar nuevo
            method = 'POST';
        }

        if (gastoId) {
       url = `/admin/gastos/${gastoId}`;
        } else {
            url = `/admin/gastos`;
    


        fetch(url, {
            method: method,
            headers: {
                'X-CSRF-TOKEN': csrfToken, // Envía el token CSRF para seguridad
                // 'Content-Type': 'application/json', // No es necesario con FormData, Fetch lo configura automáticamente
                'Accept': 'application/json' // Para indicar que esperamos JSON de vuelta
            },
            body: formData // Envía los datos del formulario
        })
        .then(response => {
            if (!response.ok) {
                // Si la respuesta no es 2xx (ej. 4xx o 5xx)
                // Lanzamos un error para que sea capturado por el .catch
                return response.json().then(errorData => {
                    throw new Error(errorData.message || 'Error en la petición');
                });
            }
            return response.json(); // Parsea la respuesta JSON
        })
        .then(data => {
            // Aquí 'data' es la respuesta JSON de tu controlador
            if (data.success) {
                alert(data.message || 'Operación exitosa.');
                $('#gastoEditModal').modal('hide'); // Cierra el modal de Bootstrap

                
                 window.location.reload();
                // Si tienes una función para recargar la tabla de gastos, llámala aquí
                 cargarGastos();
                location.reload(); // Recarga toda la página para ver los cambios
            } else {
                alert(data.message || 'Hubo un problema con la operación.');
            }
        })
        .catch(error => {
            // Manejo de errores de red o errores lanzados desde .then(response => ...)
            console.error('Error al enviar el formulario:', error);
            alert('Error: ' + error.message || 'No se pudo conectar con el servidor.');

            // Si necesitas ver errores de validación, puedes inspeccionar error.response (si usas axios)
            // Con fetch, el error.message suele contener lo que tu controlador envíe si no fue `response.ok`
        });
    });

    // --- Lógica para abrir el modal y precargar datos (Ejemplo básico para agregar/editar) ---
    // Tendrás botones en tu tabla de gastos que llamen a esta función
    window.openGastoModal = function(gasto = null) {
        // Limpiar formulario al abrir
        gastoForm.reset();
        gastoIdInput.value = ''; // Asegúrate de que el ID esté vacío para nuevos gastos
        document.getElementById('gastoEditModalLabel').innerText = 'Agregar Gasto';
        document.querySelectorAll('.categoria-fields').forEach(div => div.classList.add('d-none')); // Ocultar todos

        if (gasto) {
            // Modo edición: Llenar los campos con los datos del gasto
            document.getElementById('gastoEditModalLabel').innerText = 'Editar Gasto';
            gastoIdInput.value = gasto.id;
            document.getElementById('fecha').value = gasto.fecha;
            document.getElementById('gastoCategoria').value = gasto.categoria; // Asigna la categoría
            // Llenar campos específicos de cada categoría
            // Ejemplo:
            if (gasto.categoria === 'maquinaria') {
                document.getElementById('monto').value = gasto.monto;
                document.getElementById('pagos_realizados').value = gasto.pagos_realizados;
                document.getElementById('total_acumulado').value = gasto.total_acumulado;
            } else if (gasto.categoria === 'extras') {
                document.getElementById('entrega').value = gasto.entrega;
                document.getElementById('recibe').value = gasto.recibe;
                document.getElementById('descripcion').value = gasto.descripcion;
                document.getElementById('monto_extras').value = gasto.monto; // Asegúrate de que 'monto' se mapea al campo correcto
            }
            // ... Repite para cada categoría ...

            toggleCategoriaFields(); // Asegúrate de que los campos correctos se muestren
        }
        $('#gastoEditModal').modal('show'); // Mostrar el modal
    };

    // Puedes necesitar un listener para cuando el modal se cierra, por ejemplo, para limpiar el formulario
    $('#gastoEditModal').on('hidden.bs.modal', function () {
        gastoForm.reset(); // Limpiar el formulario
        gastoIdInput.value = '';
        document.querySelectorAll('.categoria-fields').forEach(div => div.classList.add('d-none')); // Ocultar todos
        document.getElementById('gastoEditModalLabel').innerText = 'Agregar Gasto';
    });


});
    </script>
@endsection
