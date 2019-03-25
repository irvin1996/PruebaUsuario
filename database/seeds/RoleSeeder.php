<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $author = \App\Role::create([
      'name'        => 'Administrador',
      'permissions' => json_encode([
          'crear-vp' => true,
          'editar-vp' => true,
            'ver-vp'  => true

      ]),
  ]);

  $author = \App\Role::create([
  'name'        => 'Cliente',
  'permissions' => json_encode([
      'crear-vp' => true,
      'editar-vp' => true,
        'ver-vp'  => true

  ]),
]);

    }
}
