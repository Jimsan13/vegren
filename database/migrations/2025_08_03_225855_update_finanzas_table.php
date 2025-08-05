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
        Schema::table('finanzas', function (Blueprint $table) {
            $table->string('estado')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('finanzas', function (Blueprint $table) {
            $table->enum('estado', ['Pendiente', 'Pagado', 'Recibido', 'Atrasado', 'Vencida', 'Completado', 'Cancelado'])->nullable()->change();
        });
    }
};
