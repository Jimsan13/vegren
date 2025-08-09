<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\CostoProducto;
use App\Models\RegistroGasto;
use Illuminate\Http\Request;

class EstadoResultadosController extends Controller
{
    
public function index()
{
    // Obtener todas las ventas, costos y gastos
    $ventas = Venta::all();
    $costos = CostoProducto::all();
    $gastos = RegistroGasto::all();

    // Calcular totales
    $totalVentas = $ventas->sum('monto');
    $totalCostos = $costos->sum('monto');
    $totalGastos = $gastos->sum('monto');

    // Calcular utilidad bruta y utilidad antes de impuestos
    $utilidadBruta = $totalVentas - $totalCostos;
    $utilidadAntesImpuestos = $utilidadBruta - $totalGastos;

    // Retornar la vista con variables
    return view('rol.admin.resultados', compact(
        'ventas',
        'costos',
        'gastos',
        'totalVentas',
        'totalCostos',
        'totalGastos',
        'utilidadBruta',
        'utilidadAntesImpuestos'
    ));
}
    public function guardarVenta(Request $request)
    {
        Venta::create($request->all());
        return redirect()->back()->with('success', 'Venta guardada.');
    }

    public function guardarCostoProducto(Request $request)
    {
        CostoProducto::create($request->all());
        return redirect()->back()->with('success', 'Costo guardado.');
    }

    public function guardarGasto(Request $request)
    {
        RegistroGasto::create($request->all());
        return redirect()->back()->with('success', 'Gasto guardado.');
    }
    // Ventas
    public function actualizarVenta(Request $request, $id)
    {
        $venta = Venta::findOrFail($id);
        $validated = $request->validate([
            'fecha' => 'required|date',
            'descripcion' => 'required|string',
            'monto' => 'required|numeric',
        ]);
        $venta->update($validated);
        return redirect()->back()->with('success', 'Venta actualizada correctamente.');
    }

    public function eliminarVenta($id)
    {
        $venta = Venta::findOrFail($id);
        $venta->delete();
        return redirect()->back()->with('success', 'Venta eliminada correctamente.');
    }

    // Costos
    public function actualizarCostoProducto(Request $request, $id)
    {
        $costo = CostoProducto::findOrFail($id);
        $validated = $request->validate([
            'fecha' => 'required|date',
            'concepto' => 'required|string',
            'monto' => 'required|numeric',
        ]);
        $costo->update($validated);
        return redirect()->back()->with('success', 'Costo actualizado correctamente.');
    }

    public function eliminarCostoProducto($id)
    {
        $costo = CostoProducto::findOrFail($id);
        $costo->delete();
        return redirect()->back()->with('success', 'Costo eliminado correctamente.');
    }

    // Gastos
    public function actualizarGasto(Request $request, $id)
    {
        $gasto = RegistroGasto::findOrFail($id);
        $validated = $request->validate([
            'fecha' => 'required|date',
            'categoria' => 'required|string',
            'descripcion' => 'required|string',
            'monto' => 'required|numeric',
        ]);
        $gasto->update($validated);
        return redirect()->back()->with('success', 'Gasto actualizado correctamente.');
    }

    public function eliminarGasto($id)
    {
        $gasto = RegistroGasto::findOrFail($id);
        $gasto->delete();
        return redirect()->back()->with('success', 'Gasto eliminado correctamente.');
    }

}
