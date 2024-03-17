<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\tables;
class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tables = [
            [
                'table'        => 'Usuarios',
                'description'  => "Listado de usuarios",
                'icon'     => 'mdi-account-circle',
            ],
            [
                'table'        => 'Cursos',
                'description'  => "Cursos disponibles",
                'icon'     => 'mdi-book-alphabet',
            ],
            [
                'table'        => 'Asignaciones',
                'description'  => "Asignación de cursos",
                'icon'     => 'mdi-book-check-outline',
            ],
            [
                'table'        => 'Roles',
                'description'  => "Módulo de roles | perfiles",
                'icon'     => 'mdi-account-tie',
            ],
            [
                'table'        => 'Permisos',
                'description'  => "Listado de permisos",
                'icon'     => 'mdi-shield-account-outline'
            ]
        ];

        // Utiliza un bucle foreach para insertar cada conjunto de datos
        foreach ($tables as $data) {
            tables::create($data);
        }
    }
}
