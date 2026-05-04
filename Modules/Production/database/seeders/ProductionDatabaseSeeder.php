<?php

namespace Modules\Production\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Products\Database\Seeders\ProductsDatabaseSeeder;

class ProductionDatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RawCategoriesSeeder::class,
            RawMaterialProductsSeeder::class,
            ProductsDatabaseSeeder::class,
            RecipeBooksSeeder::class,
        ]);
    }
}
