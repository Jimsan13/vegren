<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;
use Illuminate\Support\Facades\Redirect;


class ProveedorController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre_proveedor' => 'required|string|max:255',
            'empacador' => 'nullable|string|max:255',
            'cajas_entregadas' => 'nullable|integer',
            'cajas_empacadas' => 'nullable|integer',
            'fecha' => 'nullable|date',
            'estado' => 'nullable|string',
            'monto' => 'nullable|numeric',
            'tipo' => 'nullable|string',
            'numero_factura' => 'nullable|string|max:255',
            'estado_factura' => 'nullable|string',
        ]);

        Proveedor::create([
            'nombre' => $data['nombre_proveedor'],
            'empacador' => $data['empacador'] ?? null,
            'cajas_entregadas' => $data['cajas_entregadas'] ?? null,
            'cajas_empacadas' => $data['cajas_empacadas'] ?? null,
            'fecha' => $data['fecha'] ?? null,
            'estado' => $data['estado'] ?? null,
            'monto' => $data['monto'] ?? null,
            'tipo' => $data['tipo'] ?? null,
            'numero_factura' => $data['numero_factura'] ?? null,
            'estado_factura' => $data['estado_factura'] ?? null,
        ]);

        return redirect()->back()->with('success', 'Registro guardado correctamente.');
    }


    public function index()
    {
        $todos = Proveedor::all();
        $activos = Proveedor::where('tipo', 'activos')->get();
        $facturados = Proveedor::where('tipo', 'facturados')->get();
        $pendientes = Proveedor::where('tipo', 'pendientes')->get();

        $totalCajasTodos = Proveedor::sum('cajas_entregadas');
        $totalMontoTodos = Proveedor::sum('monto');

        return view('rol.admin.proveedores', compact(
            'todos', 'activos', 'facturados', 'pendientes',
            'totalCajasTodos', 'totalMontoTodos'
        ));
    }


    public function edit($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        return view('rol.admin.editar_proveedor', compact('proveedor'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nombre_proveedor' => 'required|string|max:255',
            'empacador' => 'nullable|string|max:255',
            'cajas_entregadas' => 'nullable|integer',
            'cajas_empacadas' => 'nullable|integer',
            'fecha' => 'nullable|date',
            'estado' => 'nullable|string',
            'monto' => 'nullable|numeric',
            'tipo' => 'nullable|string',
            'numero_factura' => 'nullable|string|max:255',
            'estado_factura' => 'nullable|string',
        ]);

        $proveedor = Proveedor::findOrFail($id);
        $proveedor->update([
            'nombre' => $data['nombre_proveedor'],
            'empacador' => $data['empacador'] ?? null,
            'cajas_entregadas' => $data['cajas_entregadas'] ?? null,
            'cajas_empacadas' => $data['cajas_empacadas'] ?? null,
            'fecha' => $data['fecha'] ?? null,
            'estado' => $data['estado'] ?? null,
            'monto' => $data['monto'] ?? null,
            'tipo' => $data['tipo'] ?? null,
            'numero_factura' => $data['numero_factura'] ?? null,
            'estado_factura' => $data['estado_factura'] ?? null,
        ]);

        return redirect()->route('admin.proveedores')->with('success', 'Proveedor actualizado correctamente.');
    }

    public function destroy($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->delete();

        return redirect()->route('admin.proveedores')->with('success', 'Proveedor eliminado correctamente.');
    }


}
