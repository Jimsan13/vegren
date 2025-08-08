<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlmacenComprasProductosTable extends Migration
{
    public function up()
    {
        Schema::create('almacen_compras_productos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->string('nota');
            $table->foreignId('proveedor_id')->constrained('almacen_proveedores');
            $table->string('tipo_pago'); // Contado, Crédito
            $table->decimal('total', 15, 2);
            $table->boolean('facturado')->default(false);
            $table->date('fecha_factura')->nullable();
            $table->boolean('credito_liquidado')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('almacen_compras_productos');
    }
}