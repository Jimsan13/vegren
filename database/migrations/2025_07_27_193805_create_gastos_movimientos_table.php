<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
        public function up()
        {
            Schema::create('gastos_movimientos', function (Blueprint $table) {
                $table->id();
                $table->date('fecha');
                $table->string('descripcion');
                $table->decimal('monto', 10, 2);
                $table->string('tipo')->nullable(); // Ej: Compra, Servicio, Entrada, Salida
                $table->string('categoria'); // Planta, Insumos, Gastos extras, Campo
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
        Schema::dropIfExists('gastos_movimientos');
    }
};
