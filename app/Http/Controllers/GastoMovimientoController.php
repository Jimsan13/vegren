<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GastoMovimiento;

class GastoMovimientoController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'fecha' => 'required|date',
            'descripcion' => 'required|string|max:255',
            'monto' => 'required|numeric',
            'tipo' => 'nullable|string|max:100',
            'categoria' => 'required|string|max:50',
        ]);

        GastoMovimiento::create($validated);

        return redirect()->back()->with('success', 'Movimiento guardado correctamente.');
    }

public function destroy($id)
{
    $movimiento = GastoMovimiento::findOrFail($id);
    $movimiento->delete();

    return redirect()->back()->with('success', 'Movimiento eliminado correctamente.');
}

    public function edit($id)
    {
        $movimiento = GastoMovimiento::findOrFail($id);
        return view('rol.admin.editMovimientos', compact('movimiento'));
    }   

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'fecha' => 'required|date',
            'descripcion' => 'required|string|max:255',
            'monto' => 'required|numeric',
            'tipo' => 'nullable|string|max:100',
            'categoria' => 'required|string|max:50',
        ]);

        $movimiento = GastoMovimiento::findOrFail($id);
        $movimiento->update($validated);

return redirect()->route('admin.campo', ['tab' => $movimiento->categoria])
    ->with('success', 'Movimiento actualizado correctamente.');
    }


}