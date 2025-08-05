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
        Schema::create('finanzas', function (Blueprint $table) {
            $table->id();

            // Campos comunes
            $table->date('fecha')->nullable();                // Para: Ingresos, Egresos, Pagos, Utilidades, Deudas
            $table->string('descripcion')->nullable();        // Para: Ingresos, Egresos
            $table->string('concepto')->nullable();           // Para: Pagos, Utilidades, Facturación, Deudas
            $table->string('categoria')->nullable();          // Para: Ingresos, Egresos, Utilidades
            $table->decimal('monto', 10, 2)->nullable();      // Para todos

            // Facturación
            $table->string('cliente')->nullable();            // Solo Facturación
            $table->date('fecha_emision')->nullable();        // Solo Facturación

            // Deudas
            $table->string('proveedor')->nullable();          // Solo Deudas
            $table->date('fecha_vencimiento')->nullable();    // Solo Deudas
            $table->decimal('monto_original', 10, 2)->nullable(); // Solo Deudas

            // Pagos
            $table->string('beneficiario')->nullable();       // Solo Pagos

            // Utilidades
            $table->enum('tipo_utilidad', ['Ingreso', 'Egreso'])->nullable(); // Solo Utilidades

            // Estado común
            $table->enum('estado', ['Pendiente', 'Pagado', 'Recibido', 'Atrasado', 'Vencida', 'Completado', 'Cancelado'])->nullable();

            // Tipo de registro
            $table->enum('tipo', ['ingreso', 'egreso', 'pago', 'facturacion', 'utilidad', 'deuda']);

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
        Schema::dropIfExists('finanzas');
    }
};
