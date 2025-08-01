<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEncargadosTable extends Migration
{
    public function up()
    {
        Schema::create('encargados', function (Blueprint $table) {
            $table->id();
            $table->string('empleado');
            $table->integer('termos_realizados')->nullable();
            $table->decimal('actividades_adicionales', 10, 2)->nullable();
            $table->decimal('descuentos', 10, 2)->nullable();
            $table->decimal('total_pagar', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('encargados');
    }
}