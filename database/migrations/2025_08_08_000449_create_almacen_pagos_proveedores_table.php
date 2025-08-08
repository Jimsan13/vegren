<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlmacenPagosProveedoresTable extends Migration
{
    public function up()
    {
        Schema::create('almacen_pagos_proveedores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('proveedor_id');
            $table->decimal('monto', 10, 2);
            $table->date('fecha_pago');
            $table->string('metodo_pago'); // transferencia, efectivo, cheque
            $table->timestamps();

            $table->foreign('proveedor_id')->references('id')->on('almacen_proveedores')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('almacen_pagos_proveedores');
    }
}
