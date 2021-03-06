<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReparacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reparaciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('dni');
            $table->string('movil');
            $table->string('email')->nullable();
            $table->string('producto')->nullable();
            $table->string('estado')->default('0');
            $table->string('marca')->nullable();
            $table->string('modelo')->nullable();
            $table->string('nserie')->nullable();
            $table->string('pin')->nullable();
            $table->string('contraseña')->nullable();
            $table->string('clave_codigo_barras')->nullable();
            $table->string('presupuesto')->nullable();
            $table->text('averia_reportada')->nullable();
            $table->text('cierre_averia')->nullable();
            $table->timestamp('fecha_cierre', 0)->nullable();
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
        Schema::dropIfExists('reparaciones');
    }
}
