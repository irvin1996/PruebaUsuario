<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClienteDestinosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente_destinos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idUser')->unsigned();
            $table->integer('idDestino')->unsigned();
            $table->integer('cantidad');
            $table->timestamps();
            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('idDestino')->references('id')->on('destinos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('cliente_destinos', function (Blueprint $table) {
      $table->dropForeign('cliente_destinos_idUser_foreign');
      $table->dropColumn('idUser');
      $table->dropForeign('cliente_destinos_idDestino_foreign');
      $table->dropColumn('idDestino');
  });
        Schema::dropIfExists('cliente_destinos');
    }
}
