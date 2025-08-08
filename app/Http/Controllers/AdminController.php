<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carga;
use App\Models\Gasto; 
use App\Models\GastoMovimiento;
use App\Models\Cotizacion;
use App\Models\AlmacenProveedor;


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

public function almacen(Request $request)
{
    $proveedores = AlmacenProveedor::all();

    $compras = collect();
    $pagos = collect();
    $proveedorSeleccionado = null;

    $proveedor_id = $request->input('proveedor_id', null); // Valor por defecto null

    if ($proveedor_id) {
        $proveedorSeleccionado = AlmacenProveedor::find($proveedor_id);

        $compras = DB::table('almacen_compras')
            ->where('proveedor_id', $proveedor_id)
            ->get();

        $pagos = AlmacenPagoProveedor::where('proveedor_id', $proveedor_id)
            ->orderBy('fecha_pago', 'desc')
            ->get();
    }

    return view('rol.admin.almacen', compact(
        'proveedores',
        'compras',
        'pagos',
        'proveedorSeleccionado',
        'proveedor_id'  // <--- asegúrate de enviarla
    ));
}

}
