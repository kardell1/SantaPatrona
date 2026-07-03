<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\HumanResources\Database\Seeders\HumanResourcesDatabaseSeeder;
use Modules\IAM\Database\Seeders\IAMDatabaseSeeder;
use Modules\Products\Database\Seeders\ProductsDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $this->call([
            IAMDatabaseSeeder::class,
            HumanResourcesDatabaseSeeder::class,
            BranchSeeder::class,
            ProductsDatabaseSeeder::class
        ]);
    }
}
