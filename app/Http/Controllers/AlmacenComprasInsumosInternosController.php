<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlmacenComprasInsumosInternos;

class AlmacenComprasInsumosInternosController extends Controller
{
    public function store(Request $request)
    {
        // Validar datos principales
        $validatedData = $request->validate([
            'fecha' => 'required|date',
            'nota' => 'nullable|string',
            'proveedor_id' => 'required|exists:almacen_proveedores,id',
            'tipo_pago' => 'required|string|max:50',
            'total' => 'required|numeric',
            'facturado' => 'required|boolean',
            'fecha_factura' => 'nullable|date',
            'credito_liquidado' => 'required|boolean',
            // Datos de insumos en array
            'insumos' => 'required|array',
            'insumos.*.insumo' => 'required|string',
            'insumos.*.cantidad' => 'required|numeric',
            'insumos.*.precio_unitario' => 'required|numeric',
        ]);

        // Crear compra
        $compra = AlmacenComprasInsumosInternos::create([
            'fecha' => $validatedData['fecha'],
            'nota' => $validatedData['nota'],
            'proveedor_id' => $validatedData['proveedor_id'],
            'tipo_pago' => $validatedData['tipo_pago'],
            'total' => $validatedData['total'],
            'facturado' => $validatedData['facturado'],
            'fecha_factura' => $validatedData['fecha_factura'],
            'credito_liquidado' => $validatedData['credito_liquidado'],
        ]);

        // Crear detalles de insumos en relación
        $insumos = $validatedData['insumos'];
        foreach($insumos as $item) {
            // Asumiendo que tienes un modelo de relación o detalles
            $compra->detalles()->create([
                'insumo' => $item['insumo'],
                'cantidad' => $item['cantidad'],
                'precio_unitario' => $item['precio_unitario'],
            ]);
        }

        return response()->json(['message'=>'Compra registrada', 'compra'=>$compra], 201);
    }

    public function index()
    {
        $compras = AlmacenComprasInsumosInternos::with('proveedor', 'detalles')->get();
        return response()->json($compras);
    }
}