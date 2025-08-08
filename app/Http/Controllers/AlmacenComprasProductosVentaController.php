<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlmacenComprasProductosVenta;

class AlmacenComprasProductosVentaController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'fecha' => 'required|date',
            'nota' => 'nullable|string',
            'proveedor_id' => 'required|exists:almacen_proveedores,id',
            'tipo_pago' => 'required|string|max:50',
            'total' => 'required|numeric',
            'facturado' => 'required|boolean',
            'fecha_factura' => 'nullable|date',
            'credito_liquidado' => 'required|boolean',
            'productos' => 'required|array',
            'productos.*.producto' => 'required|string',
            'productos.*.cantidad' => 'required|numeric',
            'productos.*.precio_unitario' => 'required|numeric',
        ]);

        $compra = AlmacenComprasProductosVenta::create([
            'fecha' => $validated['fecha'],
            'nota' => $validated['nota'],
            'proveedor_id' => $validated['proveedor_id'],
            'tipo_pago' => $validated['tipo_pago'],
            'total' => $validated['total'],
            'facturado' => $validated['facturado'],
            'fecha_factura' => $validated['fecha_factura'],
            'credito_liquidado' => $validated['credito_liquidado'],
        ]);

        // Guardar detalles
        foreach($validated['productos'] as $prod) {
            $compra->detalles()->create([
                'producto' => $prod['producto'],
                'cantidad' => $prod['cantidad'],
                'precio_unitario' => $prod['precio_unitario'],
            ]);
        }

        return response()->json(['message'=>'Compra de productos registrada', 'compra'=>$compra], 201);
    }

    public function index()
    {
        $compras = AlmacenComprasProductosVenta::with('proveedor', 'detalles')->get();
        return response()->json($compras);
    }
}