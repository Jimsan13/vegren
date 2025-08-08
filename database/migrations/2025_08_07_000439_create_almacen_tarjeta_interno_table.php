<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlmacenTarjetaInternoTable extends Migration
{
    public function up()
    {
        Schema::create('almacen_tarjeta_interno', function (Blueprint $table) {
            $table->id();
            $table->string('insumo'); // Nombre del insumo
            $table->integer('existencias_inicio')->default(0);
            $table->integer('existencia_actual')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('almacen_tarjeta_interno');
    }
}