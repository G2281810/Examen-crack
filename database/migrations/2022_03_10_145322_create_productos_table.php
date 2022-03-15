<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre', 25)->comment('Nombre');
            $table->string('Codigo', 25)->comment('Codigo');
            $table->string('Costo', 25)->comment('Costo');
            $table->string('Foto', 25)->comment('Foto');
            $table->timestamps();

            $table->unsignedBigInteger('Tienda_Id');
            $table->foreign('Tienda_Id')->references('id')->on('tiendas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
