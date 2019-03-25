<?php

use Illuminate\Database\Seeder;

class PaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $pais= new \App\Pais();
      $pais->nombrePais = 'Mexico';
      $pais->save();

      $pais= new \App\Pais();
      $pais->nombrePais = 'Peru';
      $pais->save();

      $pais= new \App\Pais();
      $pais->nombrePais = 'Guatemala';
      $pais->save();
    }
}
