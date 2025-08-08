<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlmacenTarjetaInterno;

class AlmacenTarjetaInternoController extends Controller
{
    public function store(Request $request)
    {
        // Validar los datos
        $validated = $request->validate([
            'fecha' => 'required|date',
            'nota' => 'nullable|string',
            'tipo_movimiento' => 'required|string|max:50',
            'cantidad' => 'required|numeric',
            'precio_unitario' => 'required|numeric',
            'compra_id' => 'nullable|exists:almacen_compras_insumos,id',
            'insumo' => 'required|string',
            // Otros campos si hay
        ]);

        $tarjeta = AlmacenTarjetaInterno::create($validated);
        return response()->json(['message'=>'Tarjeta registrada', 'tarjeta'=>$tarjeta], 201);
    }

    public function index()
    {
        $tarjetas = AlmacenTarjetaInterno::with('compra')->get();
        return response()->json($tarjetas);
    }
}