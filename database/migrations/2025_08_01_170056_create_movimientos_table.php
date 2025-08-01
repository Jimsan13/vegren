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
        Schema::create('movimientos', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->string('beneficiario')->nullable(); // Persona / Entidad / Factura
            $table->decimal('monto', 12, 2);
            $table->date('fecha');
            $table->string('tipo'); // Cobro, Pago, Recepción, Envío, Cheque
            $table->string('estado')->nullable(); // Pagado, Pendiente, Anulado
            $table->string('cuenta')->nullable(); // Solo para transferencia
            $table->string('numero_cheque')->nullable(); // Solo para cheques
            $table->string('origen')->nullable(); // efectivo, transferencia, cheque
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
        Schema::dropIfExists('movimientos');
    }
};
