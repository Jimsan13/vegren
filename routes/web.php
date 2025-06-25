<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CargaController; // Asegúrate de que esta línea esté presente

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

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

   
      Route::get('/admin/cargas', [AdminController::class, 'cargas'])->name('admin.cargas');

     Route::post('/admin/cargas/store', [CargaController::class, 'store'])->name('admin.cargas.store');
  
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
// REMOVIDO: Las rutas duplicadas o fuera de su grupo
// Route::post('/cargas', [CargaController::class, 'store'])->name('cargas.store'); // Esta estaba duplicada o mal ubicada
// Route::get('/cargas', [CargaController::class, 'index'])->name('cargas.index'); // Esta también

/*
// Ejemplo de cómo agregarías las rutas para Contador más adelante:
Route::middleware(['auth', 'role:contador'])->group(function () {
    Route::get('/finanzas', [ContadorController::class, 'index'])->name('contador.finanzas');
    // Otras rutas para contador...
});
*/