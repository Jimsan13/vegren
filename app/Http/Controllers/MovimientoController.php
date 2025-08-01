<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movimiento;
use Carbon\Carbon;

class MovimientoController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'descripcion' => 'required|string|max:255',
            'beneficiario' => 'nullable|string|max:255',
            'monto' => 'required|numeric',
            'fecha' => 'required|date',
            'tipo' => 'required|string',
            'estado' => 'nullable|string',
            'cuenta' => 'nullable|string|max:255',
            'numero_cheque' => 'nullable|string|max:50',
            'origen' => 'required|string', 
        ]);

        Movimiento::create($validated);

        return redirect()->back()->with('success', 'Movimiento registrado correctamente.');
    }


    public function index()
    {
        $now = Carbon::now();
        $inicioMes = $now->copy()->startOfMonth()->toDateString();
        $finMes = $now->copy()->endOfMonth()->toDateString();

        // Movimientos por tipo usando 'origen'
        $efectivos = Movimiento::where('origen', 'efectivo')->get();
        $transferencias = Movimiento::where('origen', 'transferencia')->get();
        $cheques = Movimiento::where('origen', 'cheque')->get();

        // Resumen efectivo
        $totalCobrosEfectivo = Movimiento::where('origen', 'efectivo')
            ->where('tipo', 'Cobro')
            ->whereBetween('fecha', [$inicioMes, $finMes])
            ->sum('monto');

        $totalPagosEfectivo = Movimiento::where('origen', 'efectivo')
            ->where('tipo', 'Pago')
            ->whereBetween('fecha', [$inicioMes, $finMes])
            ->sum('monto');

        $totalEfectivo = $totalCobrosEfectivo - $totalPagosEfectivo;

        // Resumen transferencia
        $totalTransferenciasRecibidas = Movimiento::where('origen', 'transferencia')
            ->where('tipo', 'Recepción')
            ->whereBetween('fecha', [$inicioMes, $finMes])
            ->sum('monto');

        $totalTransferenciasEnviadas = Movimiento::where('origen', 'transferencia')
            ->where('tipo', 'Envío')
            ->whereBetween('fecha', [$inicioMes, $finMes])
            ->sum('monto');

        // Resumen cheques
        $totalChequesEmitidos = Movimiento::where('origen', 'cheque')
            ->whereBetween('fecha', [$inicioMes, $finMes])
            ->count();

        $valorTotalChequesEmitidos = Movimiento::where('origen', 'cheque')
            ->whereBetween('fecha', [$inicioMes, $finMes])
            ->sum('monto');
        return view('rol.admin.efectivo', compact(
            'efectivos',
            'transferencias',
            'cheques',
            'totalEfectivo',
            'totalCobrosEfectivo',
            'totalPagosEfectivo',
            'totalTransferenciasRecibidas',
            'totalTransferenciasEnviadas',
            'totalChequesEmitidos',
            'valorTotalChequesEmitidos'
        ));


    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'descripcion' => 'required|string|max:255',
            'beneficiario' => 'nullable|string|max:255',
            'monto' => 'required|numeric',
            'fecha' => 'required|date',
            'tipo' => 'required|string',
            'estado' => 'nullable|string',
            'cuenta' => 'nullable|string|max:255',
            'numero_cheque' => 'nullable|string|max:50',
            'origen' => 'required|string', 
        ]);

        $movimiento = Movimiento::findOrFail($id);
        $movimiento->update($validated);

        return redirect()->back()->with('success', 'Movimiento actualizado correctamente.');
    }


    public function destroy($id)
    {
        Movimiento::destroy($id);
        return redirect()->back()->with('success', 'Movimiento eliminado correctamente.');
    }


}
