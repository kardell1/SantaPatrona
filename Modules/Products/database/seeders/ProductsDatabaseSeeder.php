<?php

namespace Modules\Products\Database\Seeders;

use Illuminate\Database\Seeder;

class ProductsDatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // los productos se crean desde el recetario
        // poner o crear otro seeder para los productos que no parten de ese lugar
        $this->call([MenuCategorySeeder::class, MenuProductSeeder::class]);
    }
}
