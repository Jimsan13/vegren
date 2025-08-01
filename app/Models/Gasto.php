<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
    use HasFactory;

    protected $fillable = [
        'categoria',
        'concepto',
        'fecha',
        'monto',
        'nombre_empleado',
        'salario_diario',
        'dias_trabajados',
        'total_semanal',
        'tipo_maquinaria',
        'numero_identificacion_maquinaria',
        'descripcion_maquinaria',
        'tipo_combustible',
        'litros',
        'vehiculo_asociado',
        'nombre_cliente',
        'descripcion_servicio_cliente',
        'total_cliente',
        'tipo_cuenta',
        'referencia_cuenta',
        'notas',
          'fecha',
        'categoria',
        'monto',
        'pagos_realizados',
        'total_acumulado',
        'entrega',
        'recibe',
        'descripcion',
        'metodo_pago',
        'unidad',
        'numero_semana',
        'total_semanal',
        'concepto',
        'folio_nombre',
        'proveedor',
        'total'
    ];
       
     protected $table = 'gastos';
}
