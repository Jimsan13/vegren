<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carga;
class AdminController extends Controller
{
    public function index()
{
    return view('rol.admin.dashboard');
}   

     public function cargas()
    {
        $cargas = Carga::all(); // Obtiene todas las cargas para la tabla

        // === CALCULO DE INDICADORES (DATOS REALES) ===

        // 1. Ventas mensuales
        $ventas_mensuales = $cargas->sum('totalEnvio');

        // 2. Estado de pago (Contar cargas pendientes de facturación)
        $cargas_pendientes_pago = $cargas->where('facturacion', 'pendiente')->count();
        $estado_pago_texto = ($cargas_pendientes_pago > 0) ? 'Pendiente (' . $cargas_pendientes_pago . ')' : 'Pagado'; // Cambié "Todo pagado" a "Pagado" para ser más conciso


        // 3. Adeudos (Suma de saldoCarga donde facturasPagadas es falso/0)
        $adeudos = $cargas->where('facturasPagadas', false)->sum('saldoCarga');

        // Pasamos todas las variables a la vista
        return view('rol.admin.cargas', compact('cargas', 'ventas_mensuales', 'estado_pago_texto', 'adeudos'));
    }


    public function gastos()
    {
        return view ('rol.admin.gastos');
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

    public function productos()
    {
        return view('rol.admin.productos');
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
        return view('rol.admin.campo');
    }
    
}


