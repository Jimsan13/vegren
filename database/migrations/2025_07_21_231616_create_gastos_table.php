<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGastosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gastos', function (Blueprint $table) {
            $table->id();
            $table->string('categoria'); // 'Nómina', 'Maquinaria', 'Gasolina', 'Cliente', 'Cuentas'
            $table->string('concepto');
            $table->date('fecha');
            $table->decimal('monto', 10, 2)->nullable(); // Monto general, puede ser null para Nómina/Cliente

            // Campos específicos para 'Nómina'
            $table->string('nombre_empleado')->nullable();
            $table->decimal('salario_diario')->nullable();
            $table->integer('dias_trabajados')->nullable();
            $table->decimal('total_semanal')->nullable();

            // Campos específicos para 'Maquinaria'
            $table->string('tipo_maquinaria')->nullable();
            $table->string('numero_identificacion_maquinaria')->nullable();
            $table->string('descripcion_maquinaria')->nullable();

            // Campos específicos para 'Gasolina'
            $table->string('tipo_combustible')->nullable();
            $table->decimal('litros')->nullable();
            $table->string('vehiculo_asociado')->nullable();

            // Campos específicos para 'Cliente'
            $table->string('nombre_cliente')->nullable();
            $table->string('descripcion_servicio_cliente')->nullable();
            $table->decimal('total_cliente')->nullable();

            // Campos específicos para 'Cuentas'
            $table->string('tipo_cuenta')->nullable(); // Ej: 'Agua', 'Luz', 'Internet', 'Arriendo'
            $table->string('referencia_cuenta')->nullable(); // Ej: Número de medidor, contrato, etc.

            $table->text('notas')->nullable(); // Campo general para notas adicionales

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gastos');
    }
}