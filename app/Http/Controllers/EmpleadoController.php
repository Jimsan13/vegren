<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;

class EmpleadoController extends Controller
{
public function store(Request $request)
{
    $validated = $request->validate([
        'empleadoNombre' => 'required|string|max:255',
        'empleadoPuesto' => 'required|string|max:255',
        'empleadoSalario' => 'required|numeric|min:0',
        'empleadoFechaContratacion' => 'required|date',
        'empleadoTelefono' => 'nullable|string|max:20',
        'empleadoEmail' => 'nullable|email|max:255',
    ]);

    if (!empty($request->empleadoId)) {
        // Editar existente
        $empleado = Empleado::findOrFail($request->empleadoId);
        $empleado->update([
            'nombre_completo' => $validated['empleadoNombre'],
            'puesto' => $validated['empleadoPuesto'],
            'salario_base' => $validated['empleadoSalario'],
            'fecha_contratacion' => $validated['empleadoFechaContratacion'],
            'telefono' => $validated['empleadoTelefono'],
            'email' => $validated['empleadoEmail'],
        ]);
    } else {
        // Crear nuevo
        Empleado::create([
            'nombre_completo' => $validated['empleadoNombre'],
            'puesto' => $validated['empleadoPuesto'],
            'salario_base' => $validated['empleadoSalario'],
            'fecha_contratacion' => $validated['empleadoFechaContratacion'],
            'telefono' => $validated['empleadoTelefono'],
            'email' => $validated['empleadoEmail'],
        ]);
    }

    return redirect()->back()->with('success', 'Empleado guardado correctamente.');
}



    public function destroy($id)
    {
        $empleado = Empleado::findOrFail($id);
        $empleado->delete();

        return redirect()->back()->with('success', 'Empleado eliminado correctamente.');
    }
}
