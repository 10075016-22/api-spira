<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;

use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin = Role::create(['name' => 'Administrador']);
        $roleAlumno = Role::create(['name' => 'Alumno']);


        $administrador = User::find(1);
        $alumno = User::find(2);

        if($administrador) $administrador->assignRole($roleAdmin);

        if($alumno) $alumno->assignRole($roleAlumno);

    }
}
