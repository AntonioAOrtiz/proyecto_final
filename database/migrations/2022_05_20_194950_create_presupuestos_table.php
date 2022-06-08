<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresupuestosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presupuestos', function (Blueprint $table) {
            $table->bigIncrements('id');
            //$table->unsignedBigInteger('cliente_id');
            $table->string('nombre');
            $table->string('dni');
            $table->string('movil');
            $table->string('email')->nullable();
            $table->string('direccion')->nullable();
            $table->string('producto')->nullable();
            $table->string('marca')->nullable();
            $table->string('modelo')->nullable();
            $table->string('nserie')->nullable();
            $table->text('averia_reportada')->nullable();
            $table->string('componente');
            $table->string('importe');
            $table->string('cantidad');
            //$table->foreign('cliente_id')->references('id')->on('clientes');
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
        Schema::dropIfExists('presupuestos');
    }
}
