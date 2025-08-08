<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlmacenProveedor;

class AlmacenProveedorInternoController extends Controller
{
    // Mostrar la vista con proveedores
    public function index()
    {
        $proveedores = AlmacenProveedor::all();
        return view('rol.admin.almacen', compact('proveedores'));  // O la ruta correcta de la vista principal
    }

    // Guardar nuevo proveedor
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre_razon_social' => 'required|string|max:255',
            'rfc' => 'nullable|string|max:20',
            'telefono' => 'nullable|string|max:20',
            'email' => 'nullable|email',
            'direccion' => 'nullable|string',
        ]);

        AlmacenProveedor::create($validated);

        return redirect()
            ->back()
            ->with('success', 'Proveedor registrado correctamente.');
    }

    // Eliminar proveedor
    public function destroy($id)
    {
        $proveedor = AlmacenProveedor::findOrFail($id);
        $proveedor->delete();

        return redirect()
            ->back()
            ->with('success', 'Proveedor eliminado correctamente.');
    }
}
