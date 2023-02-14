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
            $table->string('id_codigosocio');
            $table->unsignedBigInteger('id_producto');
            $table->date('fecha_acuerdo');
            $table->date('fecha_contacto');
            $table->string('comentario');
            $table->unsignedBigInteger('usuario_id');
            $table->timestamps();

           // $table->foreign('id_codigosocio')->references('idcodigoasociado')->on('clientes');
            // $table->foreign('id_producto')->references('id')->on('productos');
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
