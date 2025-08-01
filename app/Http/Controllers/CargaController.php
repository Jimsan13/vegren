<?php

namespace App\Http\Controllers;

use App\Models\Carga;
use Illuminate\Http\Request;

class CargaController extends Controller
{
    public function index()
    {
        $cargas = Carga::all();
        return view('rol.admin.cargas_alt', compact('cargas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'lote' => 'nullable|string|max:255',
            'cliente' => 'nullable|string|max:255',
            'bultosCaja' => 'nullable|integer',
            'precioUnidad' => 'nullable|numeric',
            'totalEnvio' => 'nullable|numeric',
            'remate' => 'nullable|numeric',
            'descuentoAplicado' => 'nullable|numeric',
            'facturacion' => 'nullable|string|max:255',
            'saldoCarga' => 'nullable|numeric',
            'cintaTransporte' => 'nullable|string|max:255',
            'facturasPagadas' => 'boolean',
            'cajaExtra' => 'nullable|numeric',
            'representanteResponsable' => 'nullable|string|max:255',
        ]);

        Carga::create($request->all());

        return redirect()->route('admin.cargas')->with('success', '¡Carga registrada exitosamente!');
    }

    // <-- Aquí agregas este método:
    public function destroy($id)
    {
        $carga = Carga::findOrFail($id);
        $carga->delete();

        return response()->json(['message' => 'Carga eliminada correctamente']);
    }
}
