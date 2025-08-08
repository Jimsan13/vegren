<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlmacenVentasTable extends Migration
{
    public function up()
    {
        Schema::create('almacen_ventas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->foreignId('cliente_id')->nullable(); // O simplemente un string si prefieres
            $table->text('descripcion_productos');
            $table->decimal('total', 15, 2);
            $table->string('condicion_pago'); // Contado, Crédito, etc.
            $table->string('estado_entrega'); // Entregado, Pendiente
            $table->date('fecha_entrega')->nullable();
            $table->string('estado_pago'); // Pendiente, Recibido, Parcial
            $table->date('fecha_recepcion_pago')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('almacen_ventas');
    }
}