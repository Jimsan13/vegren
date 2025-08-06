<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Finanzas;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class FinanzasController extends Controller
{
    // Mostrar vista general
    public function index()
    {
        $data = $this->obtenerDatosFinancieros();
        return view('rol.admin.finanzas', $data + ['seccionActiva' => 'general']);
    }

    public function ingresos()
    {
        $data = $this->obtenerDatosFinancieros();
        return view('rol.admin.finanzas', $data + ['seccionActiva' => 'ingresos']);
    }

    public function egresos()
    {
        $data = $this->obtenerDatosFinancieros();
        return view('rol.admin.finanzas', $data + ['seccionActiva' => 'egresos']);
    }

    public function pagos()
    {
        $data = $this->obtenerDatosFinancieros();
        return view('rol.admin.finanzas', $data + ['seccionActiva' => 'pagos']);
    }

    public function facturacion()
    {
        $data = $this->obtenerDatosFinancieros();
        return view('rol.admin.finanzas', $data + ['seccionActiva' => 'facturacion']);
    }

    public function utilidades()
    {
        $data = $this->obtenerDatosFinancieros();
        return view('rol.admin.finanzas', $data + ['seccionActiva' => 'utilidades']);
    }

    public function deudas()
    {
        $data = $this->obtenerDatosFinancieros();
        return view('rol.admin.finanzas', $data + ['seccionActiva' => 'deudas']);
    }

    // Función privada reutilizable
    private function obtenerDatosFinancieros()
    {
        $ingresos = Finanzas::where('tipo', 'ingreso')->get();
        $egresos = Finanzas::where('tipo', 'egreso')->get();
        $pagos = Finanzas::where('tipo', 'pago')->get();
        $facturaciones = Finanzas::where('tipo', 'facturacion')->get();
        $utilidades = Finanzas::where('tipo', 'utilidad')->get();
        $deudas = Finanzas::where('tipo', 'deuda')->get();

        // Cálculo de variación mensual de egresos
        $mesActual = Carbon::now()->format('m');
        $anioActual = Carbon::now()->format('Y');
        $mesAnterior = Carbon::now()->subMonth()->format('m');
        $anioAnterior = Carbon::now()->subMonth()->format('Y');

        $egresosMesActual = $egresos->filter(function ($egreso) use ($mesActual, $anioActual) {
            return Carbon::parse($egreso->fecha)->format('m') == $mesActual &&
                   Carbon::parse($egreso->fecha)->format('Y') == $anioActual;
        })->sum('monto');

        $egresosMesAnterior = $egresos->filter(function ($egreso) use ($mesAnterior, $anioAnterior) {
            return Carbon::parse($egreso->fecha)->format('m') == $mesAnterior &&
                   Carbon::parse($egreso->fecha)->format('Y') == $anioAnterior;
        })->sum('monto');

        if ($egresosMesAnterior > 0) {
            $variacion = (($egresosMesActual - $egresosMesAnterior) / $egresosMesAnterior) * 100;
            $variacionMensual = number_format($variacion, 1) . '%';
        } else {
            $variacionMensual = 'N/A';
        }

        // Cálculo del promedio mensual de egresos en los últimos 3 meses
        $periodo = CarbonPeriod::create(
            Carbon::now()->subMonths(2)->startOfMonth(),
            Carbon::now()->endOfMonth()
        );

        $totalUltimos3Meses = 0;
        foreach ($periodo as $mes) {
            $mesString = $mes->format('m');
            $anioString = $mes->format('Y');

            $totalMes = $egresos->filter(function ($egreso) use ($mesString, $anioString) {
                $fecha = Carbon::parse($egreso->fecha);
                return $fecha->format('m') == $mesString && $fecha->format('Y') == $anioString;
            })->sum('monto');

            $totalUltimos3Meses += $totalMes;
        }

        $promedioMensual = $totalUltimos3Meses / 3;

        $saldoDisponible = $ingresos->sum('monto') - $egresos->sum('monto') - $pagos->sum('monto');
        $gananciaNeta = $utilidades->sum('monto');
        $deudasAcumuladas = $deudas->sum('monto_original');

        $totalIngresos = $ingresos->sum('monto');
        $promedioIngresos = $ingresos->avg('monto') ?? 0;
        $ingresosPendientes = $ingresos->where('estado', 'pendiente')->sum('monto');
        $cantidadIngresosPendientes = $ingresos->where('estado', 'pendiente')->count();

        $totalEgresos = $egresos->sum('monto');
        $promedioEgresos = $egresos->avg('monto') ?? 0;
        $egresosPendientes = $egresos->where('estado', 'pendiente')->sum('monto');
        $cantidadEgresosPendientes = $egresos->where('estado', 'pendiente')->count();

        $totalPagado = $pagos->sum('monto');
        $pagosPendientes = $pagos->where('estado', 'pendiente')->sum('monto');
        $cantidadPagosPendientes = $pagos->where('estado', 'pendiente')->count();

        $facturasPendientes = $facturaciones->where('estado', 'pendiente')->sum('monto');
        $cantidadFacturasPendientes = $facturaciones->where('estado', 'pendiente')->count();
        $facturasVencidas = $facturaciones->where('estado', 'vencida')->sum('monto');
        $cantidadFacturasVencidas = $facturaciones->where('estado', 'vencida')->count();

        $gananciaNetaUtilidades = $utilidades->sum('monto');
        $margenUtilidad = $totalIngresos > 0 ? ($gananciaNetaUtilidades / $totalIngresos) * 100 : 0;
        $proyeccionAnual = $gananciaNetaUtilidades * 12;

        // ==== Ajustes para sección de deudas ====

        // Total deuda: suma monto_original donde estado es 'Pendiente'
        $totalDeuda = $deudas->where('estado', 'Pendiente')->sum('monto_original');

        // Próximos vencimientos: deudas pendientes con fecha_vencimiento >= hoy
        $proximosVencimientos = $deudas->where('estado', 'Pendiente')
            ->where('fecha_vencimiento', '>=', now())
            ->sortBy('fecha_vencimiento')
            ->take(5);

        // Pagos atrasados: deudas pendientes con fecha_vencimiento < hoy
        $pagosAtrasados = $deudas->where('estado', 'Pendiente')
            ->where('fecha_vencimiento', '<', now())
            ->sum('monto_original');

        // Último pago: último pago con estado 'pagado' (insensible a mayúsculas/minúsculas)
        $ultimoPagoRegistro = $pagos->filter(function($pago) {
            return strtolower($pago->estado) === 'pagado';
        })->sortByDesc('fecha')->first();

        if ($ultimoPagoRegistro) {
            $ultimoPago = $ultimoPagoRegistro->monto;
            $fechaUltimoPago = $ultimoPagoRegistro->fecha;
        } else {
            $ultimoPago = 0;
            $fechaUltimoPago = null; // null para evitar error con Carbon en la vista
        }

        $movimientosRecientes = Finanzas::orderByDesc('created_at')->take(5)->get();

        $montoPendiente = $egresos->where('estado', 'pendiente')->sum('monto');
        $totalPendientes = $egresos->where('estado', 'pendiente')->count();

        return compact(
            'ingresos', 'egresos', 'pagos', 'facturaciones', 'utilidades', 'deudas',
            'saldoDisponible', 'gananciaNeta', 'deudasAcumuladas', 'movimientosRecientes',
            'totalIngresos', 'promedioIngresos', 'ingresosPendientes', 'cantidadIngresosPendientes',
            'totalEgresos', 'promedioEgresos', 'egresosPendientes', 'cantidadEgresosPendientes',
            'totalPagado', 'pagosPendientes', 'cantidadPagosPendientes',
            'pagosAtrasados', 'totalDeuda', 'proximosVencimientos',
            'ultimoPago', 'fechaUltimoPago',
            'facturasPendientes', 'cantidadFacturasPendientes', 'facturasVencidas', 'cantidadFacturasVencidas',
            'gananciaNetaUtilidades', 'margenUtilidad', 'proyeccionAnual',
            'variacionMensual', 'promedioMensual', 'montoPendiente', 'totalPendientes'
        );
    }

    // --- Formularios y guardado ---

    public function crearIngreso() { return view('rol.admin.FinanzaAgregarIngreso'); }
    public function crearEgreso() { return view('rol.admin.FinanzaAgregarEgreso'); }
    public function crearPago() { return view('rol.admin.FinanzaAgregarPago'); }
    public function crearFactura() { return view('rol.admin.FinanzaAgregarFactura'); }
    public function crearUtilidad() { return view('rol.admin.FinanzaAgregarUtilidad'); }
    public function crearDeuda() { return view('rol.admin.FinanzaAgregarDeuda'); }

    public function guardarIngreso(Request $request)
    {
        Finanzas::create([
            'fecha'       => $request->fecha,
            'descripcion' => $request->descripcion,
            'categoria'   => $request->categoria,
            'monto'       => $request->monto,
            'estado'      => $request->estado,
            'tipo'        => 'ingreso',
        ]);
        return redirect()->route('finanzas.ingresos')->with('success', 'Ingreso agregado correctamente.');
    }

    public function guardarEgreso(Request $request)
    {
        Finanzas::create([
            'fecha'       => $request->fecha,
            'descripcion' => $request->descripcion,
            'categoria'   => $request->categoria,
            'monto'       => $request->monto,
            'estado'      => $request->estado,
            'tipo'        => 'egreso',
        ]);
        return redirect()->route('finanzas.egresos')->with('success', 'Egreso agregado correctamente.');
    }

    public function guardarPago(Request $request)
    {
        Finanzas::create([
            'fecha'        => $request->fecha,
            'beneficiario' => $request->beneficiario,
            'concepto'     => $request->concepto,
            'monto'        => $request->monto,
            'estado'       => $request->estado,
            'tipo'         => 'pago',
        ]);
        return redirect()->route('finanzas.pagos')->with('success', 'Pago agregado correctamente.');
    }

    public function guardarFactura(Request $request)
    {
        Finanzas::create([
            'fecha_emision' => $request->fecha_emision,
            'cliente'       => $request->cliente,
            'concepto'      => $request->concepto,
            'monto'         => $request->monto,
            'estado'        => $request->estado,
            'tipo'          => 'facturacion',
        ]);
        return redirect()->route('finanzas.facturacion')->with('success', 'Factura agregada correctamente.');
    }

    public function guardarUtilidad(Request $request)
    {
        Finanzas::create([
            'fecha'         => $request->fecha,
            'concepto'      => $request->concepto,
            'categoria'     => $request->categoria,
            'tipo_utilidad' => $request->tipo,
            'monto'         => $request->monto,
            'estado'        => $request->estado,
            'tipo'          => 'utilidad',
        ]);
        return redirect()->route('finanzas.utilidades')->with('success', 'Utilidad agregada correctamente.');
    }

    public function guardarDeuda(Request $request)
    {
        Finanzas::create([
            'fecha'             => $request->fecha,
            'proveedor'         => $request->proveedor,
            'concepto'          => $request->concepto,
            'monto_original'    => $request->monto_original,
            'fecha_vencimiento' => $request->fecha_vencimiento,
            'estado'            => $request->estado,
            'tipo'              => 'deuda',
        ]);
        return redirect()->route('finanzas.deudas')->with('success', 'Deuda registrada correctamente.');
    }

        public function eliminarRegistro($id)
    {
        $registro = Finanzas::findOrFail($id);
        $tipo = $registro->tipo; // Guardamos el tipo antes de eliminar
        $registro->delete();

        // Redirigir a la vista correspondiente según el tipo
        switch ($tipo) {
            case 'ingreso':
                return redirect()->route('finanzas.ingresos')->with('success', 'Ingreso eliminado correctamente.');
            case 'egreso':
                return redirect()->route('finanzas.egresos')->with('success', 'Egreso eliminado correctamente.');
            case 'pago':
                return redirect()->route('finanzas.pagos')->with('success', 'Pago eliminado correctamente.');
            case 'facturacion':
                return redirect()->route('finanzas.facturacion')->with('success', 'Factura eliminada correctamente.');
            case 'utilidad':
                return redirect()->route('finanzas.utilidades')->with('success', 'Utilidad eliminada correctamente.');
            case 'deuda':
                return redirect()->route('finanzas.deudas')->with('success', 'Deuda eliminada correctamente.');
            default:
                return redirect()->route('finanzas.index')->with('success', 'Registro eliminado.');
        }
    }


    // E D I T A R    Y A C T U A L I  Z A R
    public function editarIngreso($id)
    {
        $ingreso = Finanzas::findOrFail($id);
        return view('rol.admin.FinanzaAgregarIngreso', compact('ingreso'));
    }

    public function actualizarIngreso(Request $request, $id)
    {
        $ingreso = Finanzas::findOrFail($id);
        $ingreso->update([
            'fecha' => $request->fecha,
            'descripcion' => $request->descripcion,
            'categoria' => $request->categoria,
            'monto' => $request->monto,
            'estado' => $request->estado,
            'tipo' => 'ingreso',
        ]);

        return redirect()->route('finanzas.ingresos')->with('success', 'Ingreso actualizado correctamente.');
    }


}
