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
        public function up(): void
        {
            Schema::create('diferencias', function (Blueprint $table) {
                $table->id();
                $table->string('motivo');
                $table->foreignId('socio_id')->constrained('socios')->onDelete('cascade');
                $table->decimal('monto', 10, 2);
                $table->enum('tipo', ['favor', 'contra']);
                $table->timestamps();
            });
        }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diferencias');
    }
};
