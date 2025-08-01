<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empacador;
use App\Models\Enhielador;
use App\Models\Encargado;
use App\Models\Empleado;

class NominaController extends Controller
{
    public function index()
    {
        // Empacadores
        $empacadores = Empacador::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->get();
        $totalCajas = $empacadores->sum('cajas_semanal');
        $totalReempaques = $empacadores->sum('reempaques');
        $totalNomina = $empacadores->sum('total_pagar');
        $activos = $empacadores->count();

        // Enhieladores
        $enhieladores = Enhielador::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->get();
        $total_tarimas = $enhieladores->sum('tarimas_trabajadas');
        $total_rengeladas = $enhieladores->sum('rengeladas');
        $total_nomina_enhieladores = $enhieladores->sum('total_pagar');
        $activos_enhieladores = $enhieladores->count();

        // Encargados
        $encargados = Encargado::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->get();
        $total_termos = $encargados->sum('termos_realizados');
        $total_reportes = $encargados->sum('reportes_generados');
        $total_nomina_encargados = $encargados->sum('total_pagar');
        $activos_encargados = $encargados->count();

        // Empleados
        $empleados = Empleado::orderBy('created_at', 'desc')->get();
        $totalDescuentosEmpacadores = $empacadores->sum('descuentos');
        $totalDescuentosEnhieladores = $enhieladores->sum('descuentos');
        $totalDescuentosEncargados = $encargados->sum('descuentos');

        $totalDescuentos = $totalDescuentosEmpacadores + $totalDescuentosEnhieladores + $totalDescuentosEncargados;

        $totalNominaGeneral = $totalNomina + $total_nomina_enhieladores + $total_nomina_encargados - $totalDescuentos;

        // Valores estimados o simulados
        $cajasEnAlmacen = 6; // Si no tienes tabla, puedes dejarlo manual
        $efectivoReportado = 6; // Ejemplo, si no lo calculas de una tabla real
        $nominaEstimada = $empleados->count() * 0; // Promedio ejemplo


        return view('rol.admin.nomina', compact(
            'empacadores', 'totalCajas', 'totalReempaques', 'totalNomina', 'activos',
            'enhieladores', 'total_tarimas', 'total_rengeladas', 'total_nomina_enhieladores', 'activos_enhieladores',
            'encargados', 'total_termos', 'total_reportes', 'total_nomina_encargados', 'activos_encargados',
            'empleados',
            'totalDescuentos', 'totalNominaGeneral',
            'cajasEnAlmacen', 'efectivoReportado', 'nominaEstimada'
        ));

    }

    // === EMPACADORES ===

    public function editEmpacador($id)
    {
        $empacador = Empacador::findOrFail($id);
        return view('rol.admin.empacadores_edit', compact('empacador'));
    }

    public function updateEmpacador(Request $request, $id)
    {
        $validated = $request->validate([
            'empleado' => 'required|string|max:255',
            'cajas_semanal' => 'required|integer',
            'reempaques' => 'required|integer',
            'descargas' => 'required|integer',
            'descuentos' => 'required|numeric',
            'total_pagar' => 'required|numeric',
        ]);

        Empacador::findOrFail($id)->update($validated);

        return redirect('/admin/nomina')->with('success', 'Empacador actualizado correctamente.');
    }

    public function destroyEmpacador($id)
    {
        Empacador::findOrFail($id)->delete();
        return redirect('/admin/nomina')->with('success', 'Empacador eliminado correctamente.');
    }

    // === ENHIELADORES ===

    public function editEnhielador($id)
    {
        $enhielador = Enhielador::findOrFail($id);
        return view('rol.admin.enhieladores_edit', compact('enhielador'));
    }

    public function updateEnhielador(Request $request, $id)
    {
        $validated = $request->validate([
            'empleado' => 'required|string|max:255',
            'tarimas_trabajadas' => 'required|integer',
            'rengeladas' => 'required|integer',
            'actividades_adicionales' => 'nullable|string|max:255',
            'descuentos' => 'required|numeric',
            'total_pagar' => 'required|numeric',
        ]);

        Enhielador::findOrFail($id)->update($validated);

        return redirect('/admin/nomina')->with('success', 'Enhielador actualizado correctamente.');
    }

    public function destroyEnhielador($id)
    {
        Enhielador::findOrFail($id)->delete();
        return redirect('/admin/nomina')->with('success', 'Enhielador eliminado correctamente.');
    }

    // === ENCARGADOS ===

    public function editEncargado($id)
    {
        $encargado = Encargado::findOrFail($id);
        return view('rol.admin.encargados_edit', compact('encargado'));
    }

    public function updateEncargado(Request $request, $id)
    {
        $validated = $request->validate([
            'empleado' => 'required|string|max:255',
            'termos_realizados' => 'required|integer',
            'actividades_adicionales' => 'nullable|string|max:255',
            'descuentos' => 'required|numeric',
            'total_pagar' => 'required|numeric',
        ]);

        Encargado::findOrFail($id)->update($validated);

        return redirect('/admin/nomina')->with('success', 'Encargado actualizado correctamente.');
    }

    public function destroyEncargado($id)
    {
        Encargado::findOrFail($id)->delete();
        return redirect('/admin/nomina')->with('success', 'Encargado eliminado correctamente.');
    }

    // === EMPLEADOS ===
    public function editEmpleado($id)
    {
        $empleado = Empleado::findOrFail($id);

        if ($empleado->fecha_contratacion) {
            $empleado->fecha_contratacion = date('Y-m-d', strtotime($empleado->fecha_contratacion));
        }

        return view('rol.admin.empleados_edit', compact('empleado'));
    }


    public function updateEmpleado(Request $request, $id)
    {
        $validated = $request->validate([
            'nombre_completo' => 'required|string|max:255',
            'puesto' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'fecha_contratacion' => 'required|date',
            'salario_base' => 'required|numeric',
        ]);

        Empleado::findOrFail($id)->update($validated);

        return redirect('/admin/nomina')->with('success', 'Empleado actualizado correctamente.');
    }

    public function destroyEmpleado($id)
    {
        Empleado::findOrFail($id)->delete();
        return redirect('/admin/nomina')->with('success', 'Empleado eliminado correctamente.');
    }
    public function storeEmpleado(Request $request)
    {
        $validated = $request->validate([
            'empleadoNombre' => 'required|string|max:255',
            'empleadoPuesto' => 'required|string|max:255',
            'empleadoTelefono' => 'nullable|string|max:20',
            'empleadoEmail' => 'nullable|email|max:255',
            'empleadoFechaContratacion' => 'required|date',
            'empleadoSalario' => 'required|numeric',
        ]);

        Empleado::create([
            'nombre_completo' => $validated['empleadoNombre'],
            'puesto' => $validated['empleadoPuesto'],
            'telefono' => $validated['empleadoTelefono'] ?? null,
            'email' => $validated['empleadoEmail'] ?? null,
            'fecha_contratacion' => $validated['empleadoFechaContratacion'],
            'salario_base' => $validated['empleadoSalario'],
        ]);

        return redirect()->route('admin.nomina')->with('success', 'Empleado registrado correctamente.');
    }

}
