<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlmacenProveedoresTable extends Migration
{
    public function up()
    {
        Schema::create('almacen_proveedores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre_razon_social');
            $table->string('rfc')->nullable();
            $table->string('telefono')->nullable();
            $table->string('email')->nullable();
            $table->text('direccion')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('almacen_proveedores');
    }
}