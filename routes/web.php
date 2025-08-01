<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CargaController;
use App\Http\Controllers\GastoController;
use App\Http\Controllers\UtilidadesController;
use App\Http\Controllers\NominaActividadController;
use App\Http\Controllers\NominaController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\GastoMovimientoController;
use App\Http\Controllers\CotizacionController;
use App\Http\Controllers\EstadoResultadosController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\MovimientoController;






/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Grupo para rutas con autenticación y rol de administrador
Route::middleware(['auth', 'role:admin'])->group(function () {
    // Dashboard
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // === RUTAS DE CARGAS ===
    Route::get('/admin/cargas', [AdminController::class, 'cargas'])->name('admin.cargas');
    Route::post('/admin/cargas', [CargaController::class, 'store'])->name('admin.cargas.store');
    Route::delete('/admin/cargas/{id}', [CargaController::class, 'destroy'])->name('admin.cargas.destroy');

    // === RUTAS DE GASTOS ===
    Route::get('/admin/gastos', [GastoController::class, 'index'])->name('admin.gastos.index');
    Route::get('/gastos', [GastoController::class, 'index']); // Duplicada, pero se deja si es accesible fuera de admin
    Route::post('/gastos', [GastoController::class, 'store'])->name('admin.gastos.store');
    Route::put('/gastos/{id}', [GastoController::class, 'update'])->name('admin.gastos.update');
    Route::delete('/gastos/{id}', [GastoController::class, 'destroy'])->name('admin.gastos.destroy');

    // === OTRAS VISTAS DEL PANEL ADMIN ===
    Route::get('/admin/almacen', [AdminController::class, 'almacen'])->name('admin.almacen');
    Route::get('/admin/campo', [AdminController::class, 'campo'])->name('admin.campo');
    Route::get('/admin/efectivo', [AdminController::class, 'efectivo'])->name('admin.efectivo');
    Route::get('/admin/finanzas', [AdminController::class, 'finanzas'])->name('admin.finanzas');
    Route::get('/admin/nomina', [AdminController::class, 'nomina'])->name('admin.nomina');
    Route::get('/admin/productos', [AdminController::class, 'productos'])->name('admin.productos');
    Route::get('/admin/proveedores', [AdminController::class, 'proveedores'])->name('admin.proveedores');
    Route::get('/admin/resultados', [AdminController::class, 'resultados'])->name('admin.resultados');
    Route::get('/admin/utilidades', [AdminController::class, 'utilidades'])->name('admin.utilidades');
    Route::get('/admin/ventas', [AdminController::class, 'ventas'])->name('admin.ventas');











    // == U T I L I D A D E S ==
Route::post('/utilidades/socio', [UtilidadesController::class, 'storeSocio'])->name('utilidades.socio.store');
Route::post('/utilidades/ingreso', [UtilidadesController::class, 'storeIngreso'])->name('utilidades.ingreso.store');
Route::post('/utilidades/diferencia', [UtilidadesController::class, 'storeDiferencia'])->name('utilidades.diferencia.store');
Route::get('/utilidades', [UtilidadesController::class, 'index'])->name('utilidades.index');
Route::get('/admin/utilidades', [UtilidadesController::class, 'index'])->name('admin.utilidades');

// Eliminar mediante ID ;v (DELETE)
Route::delete('/utilidades/socio/{id}', [UtilidadesController::class, 'destroySocio'])->name('utilidades.socio.destroy');
Route::delete('/utilidades/ingreso/{id}', [UtilidadesController::class, 'destroyIngreso'])->name('utilidades.ingreso.destroy');
Route::delete('/utilidades/diferencia/{id}', [UtilidadesController::class, 'destroyDiferencia'])->name('utilidades.diferencia.destroy');

// Mostrar formulario de edición (GET)
Route::get('/utilidades/socio/{id}/edit', [UtilidadesController::class, 'editSocio'])->name('utilidades.socio.edit');
Route::get('/utilidades/ingreso/{id}/edit', [UtilidadesController::class, 'editIngreso'])->name('utilidades.ingreso.edit');
Route::get('/utilidades/diferencia/{id}/edit', [UtilidadesController::class, 'editDiferencia'])->name('utilidades.diferencia.edit');

// Actualizar datos (PUT/PATCH)
Route::put('/utilidades/socio/{id}', [UtilidadesController::class, 'updateSocio'])->name('utilidades.socio.update');
Route::put('/utilidades/ingreso/{id}', [UtilidadesController::class, 'updateIngreso'])->name('utilidades.ingreso.update');
Route::put('/utilidades/diferencia/{id}', [UtilidadesController::class, 'updateDiferencia'])->name('utilidades.diferencia.update');



    // == N O M I N A S ==

// Nomina
Route::get('/admin/nomina', [NominaController::class, 'index'])->name('admin.nomina');
Route::post('/nomina/actividad', [NominaActividadController::class, 'store'])->name('nomina.actividad.store');
Route::post('/admin/nomina/empleados', [NominaController::class, 'storeEmpleado'])->name('empleado.store');

// Empacadores
Route::get('/admin/nomina/empacadores/{id}/edit', [NominaController::class, 'editEmpacador'])->name('empacadores.edit');
Route::put('/admin/nomina/empacadores/{id}', [NominaController::class, 'updateEmpacador'])->name('empacadores.update');
Route::delete('/admin/nomina/empacadores/{id}', [NominaController::class, 'destroyEmpacador'])->name('empacadores.destroy');

// Enhieladores
Route::get('/admin/nomina/enhieladores/{id}/edit', [NominaController::class, 'editEnhielador'])->name('enhieladores.edit');
Route::put('/admin/nomina/enhieladores/{id}', [NominaController::class, 'updateEnhielador'])->name('enhieladores.update');
Route::delete('/admin/nomina/enhieladores/{id}', [NominaController::class, 'destroyEnhielador'])->name('enhieladores.destroy');

// Encargados
Route::get('/admin/nomina/encargados/{id}/edit', [NominaController::class, 'editEncargado'])->name('encargados.edit');
Route::put('/admin/nomina/encargados/{id}', [NominaController::class, 'updateEncargado'])->name('encargados.update');
Route::delete('/admin/nomina/encargados/{id}', [NominaController::class, 'destroyEncargado'])->name('encargados.destroy');

// Empleados
Route::get('/admin/nomina/empleados/{id}/edit', [NominaController::class, 'editEmpleado'])->name('empleados.edit');
Route::put('/admin/nomina/empleados/{id}', [NominaController::class, 'updateEmpleado'])->name('empleados.update');
Route::delete('/admin/nomina/empleados/{id}', [NominaController::class, 'destroyEmpleado'])->name('empleados.destroy');

Route::get('/admin/empleados/{id}/edit', [NominaController::class, 'editEmpleado'])->name('empleados.edit');
Route::delete('/admin/empleados/{id}', [NominaController::class, 'destroyEmpleado'])->name('empleados.destroy');


    // == C A M P O ==
Route::post('/gastos-movimientos', [GastoMovimientoController::class, 'store']);
Route::get('/admin/campo', [AdminController::class, 'campo'])->name('admin.campo');
Route::resource('gastos-movimientos', GastoMovimientoController::class);

    // == C O T I Z A C I O N    P R O D U C T O
Route::get('/cotizaciones', [CotizacionController::class, 'productos'])->name('cotizaciones.index');
Route::post('/cotizaciones', [CotizacionController::class, 'store'])->name('cotizaciones.store');
Route::get('/cotizaciones/{id}/edit', [CotizacionController::class, 'edit'])->name('cotizaciones.edit');
Route::put('/cotizaciones/{id}', [CotizacionController::class, 'update'])->name('cotizaciones.update');
Route::delete('/cotizaciones/{id}', [CotizacionController::class, 'destroy'])->name('cotizaciones.destroy');

    //  == R E S U L T A D O S 
Route::post('/guardar-venta', [EstadoResultadosController::class, 'guardarVenta'])->name('ventas.guardar');
Route::post('/guardar-costo', [EstadoResultadosController::class, 'guardarCostoProducto'])->name('costos.guardar');
Route::post('/guardar-gasto', [EstadoResultadosController::class, 'guardarGasto'])->name('gastos.guardar');  
Route::get('/admin/resultados', [EstadoResultadosController::class, 'index'])->name('admin.resultados');
// Ventas
Route::put('/ventas/{id}', [EstadoResultadosController::class, 'actualizarVenta'])->name('ventas.actualizar');
Route::delete('/ventas/{id}', [EstadoResultadosController::class, 'eliminarVenta'])->name('ventas.eliminar');
// Costos
Route::put('/costos/{id}', [EstadoResultadosController::class, 'actualizarCostoProducto'])->name('costos.actualizar');
Route::delete('/costos/{id}', [EstadoResultadosController::class, 'eliminarCostoProducto'])->name('costos.eliminar');
// Gastos
Route::put('/gastos/{id}', [EstadoResultadosController::class, 'actualizarGasto'])->name('gastos.actualizar');
Route::delete('/gastos/{id}', [EstadoResultadosController::class, 'eliminarGasto'])->name('gastos.eliminar');




    // == P R O V E E D O  R E S 
Route::post('/proveedores', [ProveedorController::class, 'store'])->name('proveedores.store');
Route::get('/admin/proveedores', [ProveedorController::class, 'index'])->name('admin.proveedores');
Route::get('/admin/proveedores', [ProveedorController::class, 'index'])->name('admin.proveedores');
Route::get('/proveedores/{id}/edit', [ProveedorController::class, 'edit'])->name('proveedores.edit');
Route::put('/proveedores/{id}', [ProveedorController::class, 'update'])->name('proveedores.update');
Route::delete('/proveedores/{id}', [ProveedorController::class, 'destroy'])->name('proveedores.destroy');


        // ==  M O  V I M I E N T O S
Route::post('/movimientos', [MovimientoController::class, 'store'])->name('movimientos.store');
Route::get('/admin/efectivo', [MovimientoController::class, 'index'])->name('admin.efectivo');

Route::put('/movimientos/{id}', [MovimientoController::class, 'update'])->name('movimientos.update');
Route::delete('/movimientos/{id}', [MovimientoController::class, 'destroy'])->name('movimientos.destroy');

/*
// Grupo para rol "contador" (si decides implementarlo después)
Route::middleware(['auth', 'role:contador'])->group(function () {
    Route::get('/finanzas', [ContadorController::class, 'index'])->name('contador.finanzas');
    // Otras rutas para contador...
});
*/
}); 