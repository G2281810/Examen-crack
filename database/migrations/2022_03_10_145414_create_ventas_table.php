<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->date('Fecha', 25)->comment('Fecha');
            $table->string('Total', 25)->comment('Total');
            $table->string('Cantidad', 25)->comment('Cantidad');
            $table->timestamps();

            $table->unsignedBigInteger('Tienda_Id');
            $table->foreign('Tienda_Id')->references('id')->on('tiendas');

            $table->unsignedBigInteger('Producto_id');
            $table->foreign('Producto_id')->references('id')->on('productos');

            $table->unsignedBigInteger('Usuarios_Id');
            $table->foreign('Usuarios_Id')->references('id')->on('usuarios');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas');
    }
}
