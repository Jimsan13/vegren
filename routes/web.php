<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
// Comentadas o eliminadas las importaciones de controladores no usados por ahora:
// use App\Http\Controllers\ContadorController;
// use App\Http\Controllers\CampoController;
// use App\Http\Controllers\AlmacenController;
// use App\Http\Controllers\NominaController;

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Ruta predeterminada de inicio: Muestra la vista 'welcome'.
// Esto se mantiene como lo solicitaste.
Route::get('/', function () {
    return view('welcome');
})->name('welcome');


// Rutas de autenticación de Laravel.
// Esto registra las rutas para /login, /register, /logout, etc.
Auth::routes();

// Ruta '/home'
// Esta ruta es crucial. Es el destino por defecto después del login de Auth::routes(),
// y el HomeController contiene la lógica para redirigir a los dashboards específicos por rol.
Route::get('/home', [HomeController::class, 'index'])->name('home');


// Rutas protegidas para el rol de administrador.
// Estas rutas solo serán accesibles si el usuario está autenticado y tiene el rol 'admin'.
// Si no está autenticado, el middleware 'auth' lo redirigirá automáticamente a /login.
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/cargas', [AdminController::class, 'cargas'])->name('admin.cargas');
    Route::get('/admin/almacen', [AdminController::class, 'almacen'])->name('admin.almacen');
    Route::get('/admin/campo', [AdminController::class,'campo'])->name('admin.campo');
    Route::get('/admin/efectivo', [AdminController::class,'efectivo'])->name('admin.efectivo');
    Route::get('/admin/finanzas', [AdminController::class,'finanzas'])->name('admin.finanzas');
    Route::get('/admin/gastos',[AdminController::class,'gastos'])->name('admin.gastos');
    Route::get('/admin/nomina',[AdminController::class,'nomina'])->name('admin.nomina');
    Route::get('/admin/productos',[AdminController::class,'productos'])->name('admin.productos');
    Route::get('/admin/proveedores',[AdminController::class,'proveedores'])->name('admin.proveedores');
    Route::get('/admin/resultados',[AdminController::class,'resultados'])->name('admin.resultados');
    Route::get('/admin/utilidades',[AdminController::class,'utilidades'])->name('admin.utilidades');
    Route::get('/admin/ventas', [AdminController::class,'ventas'])->name('admin.ventas');
});

// Las rutas para otros roles (Contador, Campo, Almacen, Nomina)
// han sido eliminadas temporalmente como solicitaste,
// ya que aún no las tienes implementadas. Puedes añadirlas de nuevo
// cuando las necesites, siguiendo el mismo patrón.

/*
// Ejemplo de cómo agregarías las rutas para Contador más adelante:
Route::middleware(['auth', 'role:contador'])->group(function () {
    Route::get('/finanzas', [ContadorController::class, 'index'])->name('contador.finanzas');
    // Otras rutas para contador...
});
*/