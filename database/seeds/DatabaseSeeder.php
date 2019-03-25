<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $this->call(RoleSeeder::class);
            $this->call(PaisSeeder::class);
            $this->call(PasaporteSeeder::class);
            $this->call(usuarioTableSeeder::class);
            $this->call(DestinoSeeder::class);
    }
}
