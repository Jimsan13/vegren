<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlmacenVenta;

class AlmacenVentasController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'fecha' => 'required|date',
            'cliente_id' => 'required|exists:clientes,id',
            'descripcion' => 'nullable|string',
            'total' => 'required|numeric',
            'condicion_pago' => 'required|string|max:50',
            'estado_entrega' => 'required|string|max:50',
            'fecha_entrega' => 'nullable|date',
            'estado_pago' => 'required|string|max:50',
            'fecha_recepcion_pago' => 'nullable|date',
            'productos' => 'required|array',
            'productos.*.producto' => 'required|string',
            'productos.*.cantidad' => 'required|numeric',
            'productos.*.precio_unitario' => 'required|numeric',
        ]);

        $venta = AlmacenVenta::create([
            'fecha' => $validated['fecha'],
            'cliente_id' => $validated['cliente_id'],
            'descripcion' => $validated['descripcion'],
            'total' => $validated['total'],
            'condicion_pago' => $validated['condicion_pago'],
            'estado_entrega' => $validated['estado_entrega'],
            'fecha_entrega' => $validated['fecha_entrega'],
            'estado_pago' => $validated['estado_pago'],
            'fecha_recepcion_pago' => $validated['fecha_recepcion_pago'],
        ]);

        // Guardar productos vendidos
        foreach($validated['productos'] as $prod) {
            $venta->productos()->create([
                'producto' => $prod['producto'],
                'cantidad' => $prod['cantidad'],
                'precio_unitario' => $prod['precio_unitario'],
            ]);
        }

        return response()->json(['message'=>'Venta registrada', 'venta'=>$venta], 201);
    }

    public function index()
    {
        $ventas = AlmacenVenta::with('cliente', 'productos')->get();
        return response()->json($ventas);
    }
}