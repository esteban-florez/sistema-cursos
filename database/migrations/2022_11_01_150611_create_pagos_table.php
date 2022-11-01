<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->string('estado_pago');
            $table->string('referencia');
            $table->string('monto');
            $table->string('tipo_pago');
            $table->string('modo');
            $table->foreignId('ciclo_id')->constrained('ciclos');
            $table->foreignId('estudiante_id')->constrained('estudiantes');
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
        Schema::dropIfExists('pagos');
    }
}
