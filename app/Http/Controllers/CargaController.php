<?php

namespace App\Http\Controllers;

use App\Models\Carga;
use Illuminate\Http\Request;

class CargaController extends Controller
{
    public function index()
    {
        // Este método 'index' puede que no se use directamente para mostrar tu tabla de cargas ahora,
        // ya que AdminController@cargas lo está haciendo.
        // Lo importante es el método 'store'.
        $cargas = Carga::all(); // Puedes dejar esta línea, pero no será la que alimenta tu tabla principal
        return view('rol.admin.cargas_alt', compact('cargas')); // Podría ser una vista alternativa si existiera
    }

    /**
     * Guarda una nueva carga en la base de datos.
     */
    public function store(Request $request)
    {
        // Validación (igual que antes)
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

        // Redirige al usuario de vuelta a la página de cargas (la que muestra la tabla)
        return redirect()->route('admin.cargas')->with('success', '¡Carga registrada exitosamente!');
    }
}