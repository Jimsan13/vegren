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
    Schema::create('cotizaciones', function (Blueprint $table) {
        $table->id();
        $table->date('fecha');
        $table->integer('total_cajas');
        $table->decimal('total_kilos', 8, 2);
        $table->decimal('precio_kilo', 8, 2);
        $table->string('proveedor');
        $table->decimal('total_pagar', 10, 2);
        $table->timestamps();
    });
}

};
