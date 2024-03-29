<?php

namespace Database\Seeders;

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
        $this->call([
            UserSeeder::class,
            TableSeeder::class,
            HeaderTableSeeder::class,
            ModuleSeeder::class,
            RoleSeeder::class,
            ComponentSeeder::class,
            ActionTableSeeder::class,
            PermissionSeeder::class
        ]);
    }
}
