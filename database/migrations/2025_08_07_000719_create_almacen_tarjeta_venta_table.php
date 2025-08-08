<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlmacenTarjetaVentaTable extends Migration
{
    public function up()
    {
        Schema::create('almacen_tarjeta_venta', function (Blueprint $table) {
            $table->id();
            $table->string('producto'); // Nombre del producto
            $table->decimal('precio_sugerido', 15, 2);
            $table->integer('existencia_actual')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('almacen_tarjeta_venta');
    }
}