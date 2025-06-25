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
     public function up(): void
    {
        Schema::create('cargas', function (Blueprint $table) {
            $table->id(); // ID único para cada carga
            $table->date('fecha');
            $table->string('lote')->nullable(); // nullable significa que puede estar vacío
            $table->string('cliente')->nullable();
            $table->integer('bultosCaja')->nullable();
            $table->decimal('precioUnidad', 10, 2)->nullable(); // 10 dígitos en total, 2 después del punto
            $table->decimal('totalEnvio', 10, 2)->nullable();
            $table->decimal('remate', 10, 2)->nullable();
            $table->decimal('descuentoAplicado', 10, 2)->nullable();
            $table->string('facturacion')->nullable();
            $table->decimal('saldoCarga', 10, 2)->nullable();
            $table->string('cintaTransporte')->nullable();
            $table->boolean('facturasPagadas')->default(false); // true/false, por defecto falso
            $table->decimal('cajaExtra', 10, 2)->nullable();
            $table->string('representanteResponsable')->nullable();
            $table->timestamps(); // Columnas 'created_at' y 'updated_at' automáticas
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cargas');
    }
};
