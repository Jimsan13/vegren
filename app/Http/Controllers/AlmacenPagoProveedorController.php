<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlmacenPagoProveedor;

class AlmacenPagoProveedorController extends Controller
{
public function store(Request $request)
{
    $validated = $request->validate([
        'proveedor_id' => 'required|exists:almacen_proveedores,id',
        'monto' => 'required|numeric|min:0.01',
        'fecha_pago' => 'required|date',
        'metodo_pago' => 'required|in:transferencia,efectivo,cheque',
    ]);

    AlmacenPagoProveedor::create($validated);

    return redirect()
        ->back()
        ->with('success', 'Pago registrado correctamente.');
}



    public function index($proveedor_id)
    {
        return response()->json(
            AlmacenPagoProveedor::where('proveedor_id', $proveedor_id)->get()
        );
    }

    public function mostrarPagosProveedor($proveedor_id)
{
    $pagos = AlmacenPagoProveedor::where('proveedor_id', $proveedor_id)->orderBy('fecha_pago', 'desc')->get();

    // Aquí puedes pasar también el proveedor si quieres usar datos suyos en la vista
    // $proveedor = AlmacenProveedor::findOrFail($proveedor_id);

    return view('rol.admin.almacen', compact('pagos', 'proveedor_id'));
}

}
