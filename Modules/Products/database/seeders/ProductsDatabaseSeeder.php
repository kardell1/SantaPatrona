<?php

namespace Modules\Products\Database\Seeders;

use Illuminate\Database\Seeder;

class ProductsDatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            SizeSeeder::class,
            ColorSeeder::class,
            MaterialSeeder::class,
            TagSeeder::class,
            StyleSeeder::class
        ]);
    }
}
