<?php

use Illuminate\Database\Seeder;

class PasaporteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $pasapor= new \App\Pasaporte();
      $pasapor->numeroPasaporte = '123456789';
      $pasapor->fechaEmision = '2017-04-20';
      $pasapor->fechaVencimiento = '2020-01-28';
      $pasapor->save();
    }
}
