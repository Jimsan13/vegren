<?php

namespace App\Http\Controllers;

use App\Models\Carga;
use Illuminate\Http\Request;

class CargaController extends Controller
{
    public function index()
    {
        $cargas = Carga::all();
        return view('rol.admin.cargas', compact('cargas'));
    }

    // Mostrar formulario para crear (con la misma vista que usas para modal pero sin modal)
    public function create()
    {
        return view('rol.admin.modal_carga'); // vista sin modal, la adaptas para mostrar el formulario solo
    }

    // Guardar carga nueva
    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'lote' => 'nullable|string|max:255',
            'cliente' => 'nullable|string|max:255',
            'bultos' => 'nullable|integer',
            'precio' => 'nullable|numeric',
            'total_envio' => 'nullable|numeric',
            'remate' => 'nullable|numeric',
            'descuento_aplicado' => 'nullable|numeric',
            'facturacion' => 'nullable|string|max:255',
            'saldo' => 'nullable|numeric',
            'cinta_transporte' => 'nullable|string|max:255',
            'facturas_pagadas' => 'nullable|string',
            'caja_extra' => 'nullable|numeric',
            'representante_responsable' => 'nullable|string|max:255',
        ]);

        Carga::create([
            'fecha' => $request->fecha,
            'lote' => $request->lote,
            'cliente' => $request->cliente,
            'bultosCaja' => $request->bultos,
            'precioUnidad' => $request->precio,
            'totalEnvio' => $request->total_envio,
            'remate' => $request->remate,
            'descuentoAplicado' => $request->descuento_aplicado,
            'facturacion' => $request->facturacion,
            'saldoCarga' => $request->saldo,
            'cintaTransporte' => $request->cinta_transporte,
            'facturasPagadas' => $request->facturas_pagadas === 'true',
            'cajaExtra' => $request->caja_extra,
            'representanteResponsable' => $request->representante_responsable,
        ]);

        return redirect()->route('admin.cargas')->with('success', '¡Carga registrada exitosamente!');
    }

    // Mostrar formulario para editar, pasando datos a la vista
    public function edit($id)
    {
        $carga = Carga::findOrFail($id);
        return view('rol.admin.modal_carga', compact('carga')); // misma vista pero con datos para editar
    }

    // Actualizar carga existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'fecha' => 'required|date',
            'lote' => 'nullable|string|max:255',
            'cliente' => 'nullable|string|max:255',
            'bultos' => 'nullable|integer',
            'precio' => 'nullable|numeric',
            'total_envio' => 'nullable|numeric',
            'remate' => 'nullable|numeric',
            'descuento_aplicado' => 'nullable|numeric',
            'facturacion' => 'nullable|string|max:255',
            'saldo' => 'nullable|numeric',
            'cinta_transporte' => 'nullable|string|max:255',
            'facturas_pagadas' => 'nullable|string',
            'caja_extra' => 'nullable|numeric',
            'representante_responsable' => 'nullable|string|max:255',
        ]);

        $carga = Carga::findOrFail($id);

        $carga->update([
            'fecha' => $request->fecha,
            'lote' => $request->lote,
            'cliente' => $request->cliente,
            'bultosCaja' => $request->bultos,
            'precioUnidad' => $request->precio,
            'totalEnvio' => $request->total_envio,
            'remate' => $request->remate,
            'descuentoAplicado' => $request->descuento_aplicado,
            'facturacion' => $request->facturacion,
            'saldoCarga' => $request->saldo,
            'cintaTransporte' => $request->cinta_transporte,
            'facturasPagadas' => $request->facturas_pagadas === 'true',
            'cajaExtra' => $request->caja_extra,
            'representanteResponsable' => $request->representante_responsable,
        ]);

        return redirect()->route('admin.cargas')->with('success', '¡Carga actualizada exitosamente!');
    }

    public function destroy($id)
    {
        $carga = Carga::findOrFail($id);
        $carga->delete();

        return response()->json(['message' => 'Carga eliminada correctamente']);
    }
}
