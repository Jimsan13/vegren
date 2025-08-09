<?php
namespace App\Http\Controllers;

use App\Models\gasto;
use Illuminate\Http\Request;

class gastoController extends Controller
{
    /**
     * Muestra la vista principal de gastos agrupados por categoría.
     */
    public function index()
    {
        $categorias = [
            'maquinaria', 'extras', 'gasolina', 'deudores',
            'nomina', 'pagonotas', 'cliente'
        ];

        $gastosPorCategoria = [];
        foreach ($categorias as $categoria) {
            $gastosPorCategoria[$categoria] = Gasto::where('categoria', $categoria)->get();
        }

        // Asegúrate de que 'rol.admin.gastos' es la ruta correcta a tu vista principal
        return view('rol.admin.gastos', compact('gastosPorCategoria'));
    }

    /**
     * Almacena un nuevo gasto en la base de datos.
     */
    public function store(Request $request)
    {
        $categoria = $request->input('categoria');

        // Validar los datos de la petición
        $validator = Validator::make($request->all(), $this->rules($categoria));

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Errores de validación.',
                'errors' => $validator->errors()
            ], 422); // Código 422: Unprocessable Entity (Errores de validación)
        }

        try {
            $gasto = new Gasto();
            $gasto->fecha = $request->input('fecha');
            $gasto->categoria = $categoria;

            // Asignar campos específicos según la categoría
            switch ($categoria) {
                case 'maquinaria':
                    $gasto->monto = $request->input('monto');
                    $gasto->pagos_realizados = $request->input('pagos_realizados');
                    $gasto->total_acumulado = $request->input('total_acumulado');
                    break;
                case 'extras':
                    $gasto->monto = $request->input('monto');
                    $gasto->entrega = $request->input('entrega');
                    $gasto->recibe = $request->input('recibe');
                    $gasto->descripcion = $request->input('descripcion');
                    break;
                case 'gasolina':
                    $gasto->monto = $request->input('monto');
                    $gasto->recibe = $request->input('recibe');
                    $gasto->metodo_pago = $request->input('metodo_pago');
                    $gasto->unidad = $request->input('unidad');
                    break;
                case 'deudores':
                    $gasto->monto = $request->input('monto');
                    $gasto->entrega = $request->input('entrega');
                    $gasto->recibe = $request->input('recibe');
                    $gasto->descripcion = $request->input('descripcion');
                    break;
                case 'nomina':
                    $gasto->numero_semana = $request->input('numero_semana');
                    $gasto->total_semanal = $request->input('total_semanal');
                    $gasto->monto = $request->input('total_semanal');
                    break;
                case 'pagonotas':
                    $gasto->monto = $request->input('monto');
                    $gasto->concepto = $request->input('concepto');
                    $gasto->folio_nombre = $request->input('folio_nombre');
                    $gasto->proveedor = $request->input('proveedor');
                    break;
                case 'cliente':
                    $gasto->total = $request->input('total');
                    $gasto->monto = $request->input('total');
                    $gasto->concepto = $request->input('concepto');
                    $gasto->recibe = $request->input('recibe');
                    break;
                default:
                    break;
            }

            $gasto->save();

            return response()->json([
                'success' => true,
                'message' => 'Gasto registrado exitosamente.',
                'gasto' => $gasto
            ], 201); // Código 201: Created

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al guardar el gasto: ' . $e->getMessage()
            ], 500); // Código 500: Internal Server Error
        }
    }

    /**
     * Actualiza un gasto existente.
     */
    public function update(Request $request, $id)
    {
        $categoria = $request->input('categoria');

        // Validar los datos de la petición
        $validator = Validator::make($request->all(), $this->rules($categoria, $id));

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Errores de validación.',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $gasto = Gasto::findOrFail($id);

            $gasto->fecha = $request->input('fecha');
            $gasto->categoria = $categoria;

            // Asignar campos específicos según la categoría
            switch ($categoria) {
                case 'maquinaria':
                    $gasto->monto = $request->input('monto');
                    $gasto->pagos_realizados = $request->input('pagos_realizados');
                    $gasto->total_acumulado = $request->input('total_acumulado');
                    break;
                case 'extras':
                    $gasto->monto = $request->input('monto');
                    $gasto->entrega = $request->input('entrega');
                    $gasto->recibe = $request->input('recibe');
                    $gasto->descripcion = $request->input('descripcion');
                    break;
                case 'gasolina':
                    $gasto->monto = $request->input('monto');
                    $gasto->recibe = $request->input('recibe');
                    $gasto->metodo_pago = $request->input('metodo_pago');
                    $gasto->unidad = $request->input('unidad');
                    break;
                case 'deudores':
                    $gasto->monto = $request->input('monto');
                    $gasto->entrega = $request->input('entrega');
                    $gasto->recibe = $request->input('recibe');
                    $gasto->descripcion = $request->input('descripcion');
                    break;
                case 'nomina':
                    $gasto->numero_semana = $request->input('numero_semana');
                    $gasto->total_semanal = $request->input('total_semanal');
                    $gasto->monto = $request->input('total_semanal');
                    break;
                case 'pagonotas':
                    $gasto->monto = $request->input('monto');
                    $gasto->concepto = $request->input('concepto');
                    $gasto->folio_nombre = $request->input('folio_nombre');
                    $gasto->proveedor = $request->input('proveedor');
                    break;
                case 'cliente':
                    $gasto->total = $request->input('total');
                    $gasto->monto = $request->input('total');
                    $gasto->concepto = $request->input('concepto');
                    $gasto->recibe = $request->input('recibe');
                    break;
                default:
                    break;
            }

            $gasto->save();

            return response()->json([
                'success' => true,
                'message' => 'Gasto actualizado exitosamente.',
                'gasto' => $gasto
            ], 200); // Código 200: OK

        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gasto no encontrado.'
            ], 404); // Código 404: Not Found
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar el gasto: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Elimina un gasto específico.
     */
    public function destroy($id)
    {
        try {
            $gasto = Gasto::findOrFail($id);
            $gasto->delete();

            return response()->json([
                'success' => true,
                'message' => 'Gasto eliminado correctamente.'
            ], 200); // Código 200: OK

        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gasto no encontrado.'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el gasto: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Reglas de validación según la categoría.
     * Ajustadas para los 'name' de los campos del modal.
     */
    private function rules($categoria, $id = null)
    {
        $baseRules = [
            'fecha' => 'required|date',
            'categoria' => 'required|string|in:maquinaria,extras,gasolina,deudores,nomina,pagonotas,cliente',
        ];

        switch ($categoria) {
            case 'maquinaria':
                return array_merge($baseRules, [
                    'monto' => 'required|numeric|min:0',
                    'pagos_realizados' => 'required|numeric|min:0',
                    'total_acumulado' => 'nullable|numeric|min:0', // Puede ser calculado en JS
                ]);
            case 'extras':
                return array_merge($baseRules, [
                    'monto' => 'required|numeric|min:0',
                    'entrega' => 'required|string|max:255',
                    'recibe' => 'required|string|max:255',
                    'descripcion' => 'required|string|max:1000',
                ]);
            case 'gasolina':
                return array_merge($baseRules, [
                    'monto' => 'required|numeric|min:0',
                    'recibe' => 'required|string|max:255',
                    'metodo_pago' => 'required|string|max:255',
                    'unidad' => 'required|string|max:255',
                ]);
            case 'deudores':
                return array_merge($baseRules, [
                    'monto' => 'required|numeric|min:0',
                    'entrega' => 'required|string|max:255',
                    'recibe' => 'required|string|max:255',
                    'descripcion' => 'required|string|max:1000',
                ]);
            case 'nomina':
                return array_merge($baseRules, [
                    'numero_semana' => 'required|integer|min:1',
                    'total_semanal' => 'required|numeric|min:0',
                ]);
            case 'pagonotas':
                return array_merge($baseRules, [
                    'monto' => 'required|numeric|min:0',
                    'concepto' => 'required|string|max:255',
                    'folio_nombre' => 'required|string|max:255',
                    'proveedor' => 'required|string|max:255',
                ]);
            case 'cliente':
                return array_merge($baseRules, [
                    'total' => 'required|numeric|min:0',
                    'concepto' => 'required|string|max:255',
                    'recibe' => 'required|string|max:255',
                ]);
            default:
                return $baseRules;
        }
    }
}