<?php

namespace App\Http\Controllers;

use App\Models\Cotizacion;
use Illuminate\Http\Request;

class CotizacionController extends Controller
{
    // Mostrar listado de cotizaciones
    public function productos()
    {
        $cotizaciones = Cotizacion::orderBy('fecha', 'desc')->get();
        return view('rol.admin.productos', compact('cotizaciones'));
    }

    // Guardar nueva cotización
    public function store(Request $request)
    {
        $validated = $request->validate([
            'fecha' => 'required|date',
            'total_cajas' => 'required|integer|min:0',
            'total_kilos' => 'required|numeric|min:0',
            'precio_kilo' => 'required|numeric|min:0',
            'proveedor' => 'required|string|max:255',
        ]);

        $validated['total_pagar'] = $validated['total_kilos'] * $validated['precio_kilo'];

        Cotizacion::create($validated);

        return redirect()->route('cotizaciones.index')->with('success', 'Cotización guardada correctamente.');
    }

    // Mostrar formulario para editar
    public function edit($id)
    {
        $cotizacion = Cotizacion::findOrFail($id);
        return view('rol.admin.editar-cotizacion', compact('cotizacion'));
    }

    // Actualizar cotización existente
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'fecha' => 'required|date',
            'total_cajas' => 'required|integer|min:0',
            'total_kilos' => 'required|numeric|min:0',
            'precio_kilo' => 'required|numeric|min:0',
            'proveedor' => 'required|string|max:255',
        ]);

        $validated['total_pagar'] = $validated['total_kilos'] * $validated['precio_kilo'];

        $cotizacion = Cotizacion::findOrFail($id);
        $cotizacion->update($validated);

        return redirect()->route('cotizaciones.index')->with('success', 'Cotización actualizada correctamente.');
    }

    // Eliminar cotización
    public function destroy($id)
    {
        $cotizacion = Cotizacion::findOrFail($id);
        $cotizacion->delete();

        return redirect()->route('cotizaciones.index')->with('success', 'Cotización eliminada correctamente.');
    }
}
