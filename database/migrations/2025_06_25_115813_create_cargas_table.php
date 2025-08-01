<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
     /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('cargas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->string('lote')->nullable();
            $table->string('cliente')->nullable();
            $table->integer('bultosCaja')->nullable();
            $table->decimal('precioUnidad', 10, 2)->nullable();
            $table->decimal('totalEnvio', 10, 2)->nullable();
            $table->decimal('remate', 10, 2)->nullable();
            $table->decimal('descuentoAplicado', 10, 2)->nullable();
            $table->string('facturacion')->nullable();
            $table->decimal('saldoCarga', 10, 2)->nullable();
            $table->string('cintaTransporte')->nullable();
            $table->boolean('facturasPagadas')->default(false);
            $table->decimal('cajaExtra', 10, 2)->nullable();
            $table->string('representanteResponsable')->nullable();
             $table->rememberToken();
            $table->timestamps();
        });
    }
 /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('cargas');
    }
};
