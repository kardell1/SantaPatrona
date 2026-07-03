<?php

namespace Modules\IAM\Database\Seeders;

use Illuminate\Database\Seeder;

class IAMDatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            ScopeSeeder::class,
            PermissionSeeder::class,
            SectionSeeder::class,
            RolesSeeder::class,
        ]);
    }
}
