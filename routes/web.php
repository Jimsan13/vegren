<?php

 use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContadorController;
use App\Http\Controllers\CampoController;
use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\NominaController;
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



 Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
//Rutas de Admin
Route::middleware(['auth', 'role:admin'])->get('/admin/dashboard', [AdminController::class, 'index']);
//Rutas de Contador
Route::middleware(['auth', 'role:contador'])->get('/finanzas', [ContadorController::class, 'index']);
//Rutas de Campo
Route::middleware(['auth', 'role:campo'])->get('/campo', [CampoController::class, 'index']);
//Rutas de almacen
Route::middleware(['auth', 'role:almacen'])->get('/almacen', [AlmacenController::class, 'index']);
//Rutas nomina
Route::middleware(['auth', 'role:nomina'])->get('/nomina', [NominaController::class, 'index']); 

