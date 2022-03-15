<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre', 25)->comment('Nombre');
            $table->string('App', 25)->comment('App');
            $table->string('Apm', 25)->comment('Apm');
            $table->string('Foto', 25)->comment('Foto');
            $table->unsignedBigInteger('Tiendas_Id');
            $table->foreign('Tiendas_Id')->references('id')->on('tiendas');
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
        Schema::dropIfExists('usuarios');
    }
}
