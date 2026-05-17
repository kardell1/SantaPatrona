<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\IAM\Database\Seeders\IAMDatabaseSeeder;
use Modules\Production\Database\Seeders\ProductionDatabaseSeeder;
use Modules\Products\Database\Seeders\ProductsDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $this->call([
            IAMDatabaseSeeder::class,

          //  ProductionDatabaseSeeder::class,
            ProductsDatabaseSeeder::class
        ]);
    }
}
