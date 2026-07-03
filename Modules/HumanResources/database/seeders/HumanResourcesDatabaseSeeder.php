<?php

namespace Modules\HumanResources\Database\Seeders;

use Illuminate\Database\Seeder;

class HumanResourcesDatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            PositionSeeder::class,
            EmployeeTypeSeeder::class,
            EmployeeSeeder::class
        ]);
    }
}
