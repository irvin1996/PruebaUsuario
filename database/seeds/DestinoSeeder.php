<?php

use Illuminate\Database\Seeder;

class DestinoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $destinos= new \App\Destino();
      $destinos->idPais = '1';
      $destinos->lugar = 'Cancún';
      $destinos->tourDescripcion = 'Piramides';
      $destinos->fechaIda = '2019-01-02';
      $destinos->fechaLlegada = '2019-01-28';
      $destinos->save();

      $destinos= new \App\Destino();
      $destinos->idPais = '2';
      $destinos->lugar = 'Machupichu';
      $destinos->tourDescripcion = '';
      $destinos->fechaIda = '2019-01-02';
      $destinos->fechaLlegada = '2019-01-28';
      $destinos->save();

      $destinos= new \App\Destino();
      $destinos->idPais = '3';
      $destinos->lugar = 'Ciudad de Guatemala';
      $destinos->tourDescripcion = 'Tikal';
      $destinos->fechaIda = '2019-01-02';
      $destinos->fechaLlegada = '2019-01-28';
      $destinos->save();
    }
}
