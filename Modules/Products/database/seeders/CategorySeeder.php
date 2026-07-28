<?php

namespace Modules\Products\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Products\Models\Category;
use Modules\Products\Models\UnitType;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        // donde name es el nombre de la categoria
        // y unit sold es la unidad minima para vender de esa categoria
        $categories = [
            [
                'name' => 'pegamentos',
                'specification_unit_sold' => 'mililitro'
            ],
            [
                'name' => 'cartones',
                'specification_unit_sold' => 'unidad'
            ],
            [
                'name' => 'hormas',
                'specification_unit_sold' => 'par',
            ],
            [
                'name' => 'limpiadores',
                'specification_unit_sold' => 'unidad'
            ],
            [
                'name' => 'plantas',
                'specification_unit_sold' => 'par'
            ],
            [
                'name' => 'hilos',
                'specification_unit_sold' => 'unidad'
            ],
            [
                'name' => 'guatos',
                'specification_unit_sold' => 'unidad'
            ]
        ];

        foreach ($categories as $category) {
            $foundUnitType = UnitType::where('name', $category['specification_unit_sold'])->first();

            Category::create([
                'name' => $category['name'],
                'description' => null,
                'unit_type_id' => $foundUnitType->id,
            ]);
        }
    }
}
