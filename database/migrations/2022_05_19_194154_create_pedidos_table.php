<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('componente');
            $table->string('unidad')->nullable();
            $table->string('marca');
            $table->string('modelo');
            $table->string('estado')->default('0');
            $table->string('color')->nullable();
            $table->string('movil')->nullable();
            $table->string('fianza')->nullable();
            $table->string('precio_final')->nullable();
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
        Schema::dropIfExists('pedidos');
    }
}
