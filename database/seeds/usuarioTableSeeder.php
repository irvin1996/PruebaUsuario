<?php

use Illuminate\Database\Seeder;

class usuarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    $user= new \App\User();
    $user->identificacion = '123456789';
    $user->idPasaporte = '1';
    $user->name = 'Administrador';
    $user->apellido1 = 'Rodriguez';
    $user->apellido2 = 'Benavides';
    $user->fechaNacimiento='1996-11-05';
    $user->telefono = '22684796';
    $user->celular = '89503073';
    $user->email = 'viajesPositivos@gmail.com';
    $user->direccion = 'Heredia,Heredia';
    $user->idRole = '1';
    $user->password= Hash::make('123456');
    $user->save();

    }
}
