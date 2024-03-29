<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = [
            [
                'name'       => 'home'
            ],
            [
                'name'       => 'user'
            ],
            [
                'name'       => 'addUser'
            ],
            [
                'name'       => 'editUser'
            ],
            [
                'name'       => 'deleteUser'
            ],
            [
                'name'       => 'viewUser'
            ],
            // courses
            [
                'name'       => 'course'
            ],
            [
                'name'       => 'addCourse'
            ],
            [
                'name'       => 'editCourse'
            ],
            [
                'name'       => 'deleteCourse'
            ],
            [
                'name'       => 'viewCourse'
            ],

            // asignaciones
            [
                'name'       => 'assignment'
            ],
            [
                'name'       => 'addAssignment'
            ],
            // perfiles
            [
                'name'       => 'role'
            ],
            [
                'name'       => 'addRole'
            ],
            [
                'name'       => 'editRole'
            ],
            [
                'name'       => 'deleteRole'
            ],
            [
                'name'       => 'viewRole'
            ],

            // permisos
            [
                'name'       => 'permission'
            ],
            [
                'name'       => 'addPermission'
            ],
            [
                'name'       => 'editPermission'
            ],
            [
                'name'       => 'deletePermission'
            ],
            [
                'name'       => 'viewPermission'
            ],
        ];

        // Utiliza un bucle foreach para insertar cada conjunto de datos
        $role = Role::find(1);
        $alumno = Role::find(2);
        foreach ($permission as $data) {
            $permission = Permission::create($data);
            $role->givePermissionTo($permission);
        }

        // se asigna permiso de home y asignaciones
        $alumno->givePermissionTo(1);
        $alumno->givePermissionTo(12);
    }
}
