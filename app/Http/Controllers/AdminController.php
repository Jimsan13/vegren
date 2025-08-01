<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carga;
use App\Models\Gasto; 
use App\Models\GastoMovimiento;
use App\Models\Cotizacion;

class AdminController extends Controller
{
    public function index()
    {
        return view('rol.admin.dashboard');
    }

    public function cargas()
    {
        $cargas = Carga::all();
        return view('rol.admin.cargas', compact('cargas'));
    }

    public function gastos()
    {
        $gastos = Gasto::all();
        return view('rol.admin.gastos', compact('gastos'));
    }

    public function ventas()
    {
        return view('rol.admin.ventas');
    }

    public function almacen()
    {
        return view('rol.admin.almacen');
    }

    public function nomina()
    {
        return view('rol.admin.nomina');
    }

    public function utilidades()
    {
        return view('rol.admin.utilidades');
    }

    public function efectivo()
    {
        return view('rol.admin.efectivo');
    }

    public function proveedores()
    {
        return view('rol.admin.proveedores');
    }

    public function resultados()
    {
        return view('rol.admin.resultados');
    }

    public function finanzas()
    {
        return view('rol.admin.finanzas');
    }

    public function campo()
    {
        $movimientos = GastoMovimiento::orderBy('fecha', 'desc')->get();
        return view('rol.admin.campo', compact('movimientos'));
    }

    public function productos()
    {
        $cotizaciones = Cotizacion::orderBy('fecha', 'desc')->get();
        return view('rol.admin.productos', compact('cotizaciones'));
    }
}
