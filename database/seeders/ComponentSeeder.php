<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\component;

class ComponentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $components = [
            [
                'component'     => 'ButtonDelete',
                'description'   => 'Button para eliminar registros',
                'message'       => 'Eliminar'
            ],
            [
                'component'     => 'ButtonDetail',
                'description'   => 'Button para ver detalle de registro',
                'message'       => 'Ver'
            ],
            [
                'component'     => 'ButtonEdit',
                'description'   => 'Button para editar registro',
                'message'       => 'Editar'
            ]
        ];


        // Utiliza un bucle foreach para insertar cada conjunto de datos
        foreach ($components as $data) {
            component::create($data);
        }
    }
}
