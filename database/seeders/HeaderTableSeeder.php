<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\headerTables;
class HeaderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $headers = [
            [
                'table_id'  => 1,
                'dataField' => 'id',
                'caption'   => '',
                'order'     => 1,
                'visible'   => 0,
            ],
            [
                'table_id'  => 1,
                'dataField' => 'name',
                'caption'   => 'Usuario',
                'order'     => 1,
            ],
            [
                'table_id'  => 1,
                'dataField' => 'email',
                'caption'   => 'Correo electronico',
                'order'     => 2,
            ],
            [
                'table_id'  => 1,
                'dataField' => 'phone',
                'caption'   => 'Télefono',
                'order'     => 3,
            ],
            [
                'table_id'  => 1,
                'dataField' => 'perfil',
                'caption'   => 'Perfil | Rol',
                'order'     => 4,
            ],
            [
                'table_id'  => 1,
                'dataField' => 'status',
                'caption'   => 'Estado',
                'order'     => 5,
                'visible'   => 0
            ],

            // courses
            [
                'table_id'  => 2,
                'dataField' => 'id',
                'caption'   => '',
                'order'     => 1,
                'visible'   => 0
            ],
            [
                'table_id'  => 2,
                'dataField' => 'name',
                'caption'   => 'Curso',
                'order'     => 1,
            ],
            [
                'table_id'  => 2,
                'dataField' => 'hour_intensity',
                'caption'   => 'Intensidad horaria',
                'order'     => 2,
            ],

            // asignaciones
            [
                'table_id'   => 3,
                'dataField'  => 'user.name',
                'caption'    => 'Usuario',
                'order'      => 1,
                'groupIndex' => 0
            ],
            [
                'table_id'  => 3,
                'dataField' => 'course.name',
                'caption'   => 'Curso',
                'order'     => 4,
            ],
            [
                'table_id'  => 3,
                'dataField' => 'user.email',
                'caption'   => 'Email',
                'order'     => 2,
            ],
            [
                'table_id'  => 3,
                'dataField' => 'user.phone',
                'caption'   => 'Tel',
                'order'     => 3,
            ],
            [
                'table_id'  => 3,
                'dataField' => 'course.hour_intensity',
                'caption'   => 'Intensidad horaria',
                'order'     => 5,
            ],

            // roles
            [
                'table_id'  => 4,
                'dataField' => 'name',
                'caption'   => 'Rol',
                'order'     => 1,
            ],

            // permisos
            [
                'table_id'  => 5,
                'dataField' => 'name',
                'caption'   => 'Permiso',
                'order'     => 1,
            ]
        ];

        // Utiliza un bucle foreach para insertar cada conjunto de datos
        foreach ($headers as $data) {
            headerTables::create($data);
        }
    }
}
