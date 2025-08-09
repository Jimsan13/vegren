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
        Schema::create('proveedores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('empacador')->nullable();
            $table->integer('cajas_entregadas')->nullable();
            $table->integer('cajas_empacadas')->nullable();
            $table->date('fecha')->nullable();
            $table->string('estado')->nullable(); // Facturado o Pendiente
            $table->decimal('monto', 10, 2)->nullable();

            // Campos extra según tipo
            $table->string('tipo')->nullable(); // todos, activos, facturados, pendientes
            $table->string('numero_factura')->nullable(); // solo para facturas
            $table->string('estado_factura')->nullable(); // pagado o pendiente

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
        Schema::dropIfExists('proveedores');
    }
};
