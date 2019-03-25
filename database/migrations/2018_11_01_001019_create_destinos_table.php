<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDestinosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destinos', function (Blueprint $table) {
            $table->increments('id');
            //Aqui va el ID pais
            $table->integer('idPais')->unsigned();
            $table->foreign('idPais')->references('id')->on('pais')->ondelete('cascade');
            $table->string('lugar');
            $table->string('tourDescripcion')->nullable();
            $table->string('fechaIda');
            $table->string('fechaLlegada');
            $table->softDeletes();
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
      Schema::table('users', function (Blueprint $table) {
      $table->dropForeign('destinos_idPais_foreign');
      $table->dropColumn('idPais');

  });
        Schema::dropIfExists('destinos');
    }
}
