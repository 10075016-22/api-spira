<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\actionTable;

class ActionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $actions = [
            [
                'table_id'     => 1,
                'component_id' => 1,
                'order'       => 1
            ],
            [
                'table_id'     => 1,
                'component_id' => 2,
                'order'       => 2
            ],
            [
                'table_id'     => 1,
                'component_id' => 3,
                'order'       => 3
            ],
            [
                'table_id'     => 2,
                'component_id' => 1,
                'order'       => 1
            ],
            [
                'table_id'     => 2,
                'component_id' => 2,
                'order'       => 2
            ],
            [
                'table_id'     => 2,
                'component_id' => 3,
                'order'       => 3
            ],
            [
                'table_id'     => 4,
                'component_id' => 1,
                'order'       => 1
            ],
            [
                'table_id'     => 4,
                'component_id' => 2,
                'order'       => 2
            ],
            [
                'table_id'     => 4,
                'component_id' => 3,
                'order'       => 3
            ],
            [
                'table_id'     => 5,
                'component_id' => 1,
                'order'       => 1
            ],
            [
                'table_id'     => 5,
                'component_id' => 2,
                'order'       => 2
            ],
            [
                'table_id'     => 5,
                'component_id' => 3,
                'order'       => 3
            ]
        ];


        // Utiliza un bucle foreach para insertar cada conjunto de datos
        foreach ($actions as $data) {
            actionTable::create($data);
        }
    }
}
