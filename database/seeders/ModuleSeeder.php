<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Module;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modules = [
            [
                'module'      => 'Home',
                'description' => 'Vista inicial',
                'icon'        => 'mdi-home',
                'name'        => 'home',
                'order'       => 1
            ],
            [
                'module'      => 'Usuarios',
                'description' => 'Modulo de usuarios',
                'icon'        => 'mdi-account-circle',
                'name'        => 'user',
                'order'       => 2,
            ],
            [
                'module'      => 'Cursos',
                'description' => 'Modulo de cursos',
                'icon'        => 'mdi-book-alphabet',
                'name'        => 'course',
                'order'       => 3,
            ],
            [
                'module'      => 'Asignaciones',
                'description' => 'Modulo de asignación de cursos',
                'icon'        => 'mdi-calendar-cursor',
                'name'        => 'assignment',
                'order'       => 4,
            ],
            [
                'module'      => 'Roles',
                'description' => 'Modulo de roles | perfiles',
                'icon'        => 'mdi-account-tie',
                'name'        => 'role',
                'order'       => 5,
            ],
            [
                'module'      => 'Permisos',
                'description' => 'Modulo de permisos',
                'icon'        => 'mdi-shield-account-outline',
                'name'        => 'permission',
                'order'       => 6,
            ]
        ];

        // Utiliza un bucle foreach para insertar cada conjunto de datos
        foreach ($modules as $data) {
            Module::create($data);
        }
    }
}
