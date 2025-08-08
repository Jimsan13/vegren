<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlmacenTarjetaVenta;

class AlmacenTarjetaVentaController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'fecha' => 'required|date',
            'nota' => 'nullable|string',
            'tipo_movimiento' => 'required|string|max:50',
            'cantidad' => 'required|numeric',
            'precio_unitario' => 'required|numeric',
            'venta_id' => 'nullable|exists:almacen_ventas,id',
            'producto' => 'required|string',
        ]);
        $tarjeta = AlmacenTarjetaVenta::create($validated);
        return response()->json(['message'=>'Tarjeta de venta registrada', 'tarjeta'=>$tarjeta], 201);
    }

    public function index()
    {
        $tarjetas = AlmacenTarjetaVenta::with('venta')->get();
        return response()->json($tarjetas);
    }
}