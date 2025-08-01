<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Socio;
use App\Models\Ingreso;
use App\Models\Diferencia;

class UtilidadesController extends Controller
{

public function index()
{
    $socios = Socio::all();
    $ingresos = Ingreso::all();
    $diferencias = Diferencia::all();

    return view('rol.admin.utilidades', compact('socios', 'ingresos', 'diferencias'));
}


    public function storeSocio(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'aportacion' => 'required|numeric|min:0',
        ]);

        Socio::create([
            'nombre' => $request->nombre,
            'aportacion' => $request->aportacion,
        ]);

        return redirect()->back()->with('success', 'Socio guardado correctamente');
    }

    public function storeIngreso(Request $request)
    {
        $request->validate([
            'concepto' => 'required|string|max:255',
            'monto' => 'required|numeric|min:0',
            'fecha' => 'required|date',
        ]);

        Ingreso::create($request->only('concepto', 'monto', 'fecha'));

        return redirect()->back()->with('success', 'Ingreso guardado correctamente');
    }

    public function storeDiferencia(Request $request)
    {
        $request->validate([
            'motivo' => 'required|string|max:255',
            'socio_id' => 'required|exists:socios,id',
            'monto' => 'required|numeric',
            'tipo' => 'required|in:favor,contra',
        ]);

        Diferencia::create($request->only('motivo', 'socio_id', 'monto', 'tipo'));

        return redirect()->back()->with('success', 'Diferencia guardada correctamente');
    }

    // R L I M I N A R   U T I L I D A D E S
        public function destroySocio($id)
    {
        Socio::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Socio eliminado correctamente.');
    }

    public function destroyIngreso($id)
    {
        Ingreso::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Ingreso eliminado correctamente.');
    }

    public function destroyDiferencia($id)
    {
        Diferencia::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Diferencia eliminada correctamente.');
    }

    // E D I T A R   Y M O S T R A R   U T O L I D A D E S

    // Mostrar formulario de edición con datos del socio
    public function editSocio($id)
    {
        $socio = Socio::findOrFail($id);
        $socios = Socio::all();
        $ingresos = Ingreso::all();
        $diferencias = Diferencia::all();
        return view('rol.admin.utilidades', compact('socio', 'socios', 'ingresos', 'diferencias'));
    }

    // Actualizar socio
    public function updateSocio(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'aportacion' => 'required|numeric|min:0',
        ]);

        $socio = Socio::findOrFail($id);
        $socio->nombre = $request->nombre;
        $socio->aportacion = $request->aportacion;
        $socio->save();

        return redirect()->route('utilidades.index')->with('success', 'Socio actualizado correctamente');
    }

    // Ingreso

    public function editIngreso($id)
    {
        $ingreso = Ingreso::findOrFail($id);
        $socios = Socio::all();
        $ingresos = Ingreso::all();
        $diferencias = Diferencia::all();
        return view('rol.admin.utilidades', compact('ingreso', 'socios', 'ingresos', 'diferencias'));
    }

    public function updateIngreso(Request $request, $id)
    {
        $request->validate([
            'concepto' => 'required|string|max:255',
            'monto' => 'required|numeric|min:0',
            'fecha' => 'required|date',
        ]);

        $ingreso = Ingreso::findOrFail($id);
        $ingreso->concepto = $request->concepto;
        $ingreso->monto = $request->monto;
        $ingreso->fecha = $request->fecha;
        $ingreso->save();

        return redirect()->route('utilidades.index')->with('success', 'Ingreso actualizado correctamente');
    }

    // Diferencia

    public function editDiferencia($id)
    {
        $diferencia = Diferencia::findOrFail($id);
        $socios = Socio::all();
        $ingresos = Ingreso::all();
        $diferencias = Diferencia::all();
        return view('rol.admin.utilidades', compact('diferencia', 'socios', 'ingresos', 'diferencias'));
    }

    public function updateDiferencia(Request $request, $id)
    {
        $request->validate([
            'motivo' => 'required|string|max:255',
            'socio_id' => 'required|exists:socios,id',
            'monto' => 'required|numeric',
            'tipo' => 'required|in:favor,contra',
        ]);

        $diferencia = Diferencia::findOrFail($id);
        $diferencia->motivo = $request->motivo;
        $diferencia->socio_id = $request->socio_id;
        $diferencia->monto = $request->monto;
        $diferencia->tipo = $request->tipo;
        $diferencia->save();

        return redirect()->route('utilidades.index')->with('success', 'Diferencia actualizada correctamente');
    }



}

