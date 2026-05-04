<?php

namespace Modules\IAM\Database\Seeders;

use Illuminate\Database\Seeder;

class IAMDatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            PersonTypesSeeder::class,
            RolesSeeder::class,
            PermissionsSeeder::class,
            EmployeesSeeder::class,
        ]);
    }
}
