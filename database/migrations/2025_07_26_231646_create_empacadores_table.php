<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpacadoresTable extends Migration
{
    public function up()
    {
        Schema::create('empacadores', function (Blueprint $table) {
            $table->id();
            $table->string('empleado');
            $table->integer('cajas_semanal')->nullable();
            $table->integer('reempaques')->nullable();
            $table->integer('descargas')->nullable();
            $table->decimal('descuentos', 10, 2)->nullable();
            $table->decimal('total_pagar', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('empacadores');
    }
}