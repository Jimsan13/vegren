<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empacador;
use App\Models\Enhielador;
use App\Models\Encargado;

class NominaActividadController extends Controller
{
    public function store(Request $request)
    {
        $tipo = $request->input('modalActivityType');

        if ($tipo === 'manoObra') {
            Empacador::create([
                'empleado'        => $request->empleadoInput,
                'cajas_semanal'   => $request->cajasSemanal,
                'reempaques'      => $request->reempaques,
                'descargas'       => $request->descargas,
                'descuentos'      => $request->descuentos,
                'total_pagar'     => $request->totalPagar,
            ]);
        } elseif ($tipo === 'enhieladores') {
            Enhielador::create([
                'empleado'                 => $request->empleadoInput,
                'tarimas_trabajadas'       => $request->tarimasTrabajadas,
                'rengeladas'               => $request->rengeladas,
                'actividades_adicionales'  => $request->actividadesAdicionalesEnhieladores,
                'descuentos'               => $request->descuentos,
                'total_pagar'              => $request->totalPagar,
            ]);
        } elseif ($tipo === 'encargados') {
            Encargado::create([
                'empleado'                 => $request->empleadoInput,
                'termos_realizados'        => $request->termosRealizados,
                'actividades_adicionales'  => $request->actividadesAdicionalesEncargados,
                'descuentos'               => $request->descuentos,
                'total_pagar'              => $request->totalPagar,
            ]);
        }

        return redirect()->back()->with('success', 'Actividad registrada correctamente.');
    }
}