<?php

namespace Modules\Products\Database\Seeders;

use Illuminate\Database\Seeder;

class ProductsDatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            SizeSeeder::class,
            ColorSeeder::class,
            MaterialSeeder::class,
            TagSeeder::class,
            StyleSeeder::class,
            BrandSeeder::class,
            MeasurementUnitSeeder::class,
            CategorySeeder::class,
            ComponentProductSeeder::class,
            ProductSeeder::class
        ]);
    }
}
