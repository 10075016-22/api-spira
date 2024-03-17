<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'      => 'Administrador',
            'email'     => 'admin@email.com',
            'status'    => 1,
            'password'  => Hash::make('admin1234'),
            'phone'     => '1234567890'
        ]);

        User::create([
            'name'      => 'Alumno',
            'email'     => 'alumno@email.com',
            'status'    => 1,
            'password'  => Hash::make('alumno1234'),
            'phone'     => '0987654321'
        ]);
    }
}
