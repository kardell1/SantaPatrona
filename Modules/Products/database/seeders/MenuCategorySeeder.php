<?php

namespace Modules\Products\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Products\Models\MenuCategory;

class MenuCategorySeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ["name" => "Entradas", "code" => "starters"],
            ["name" => "Platos principales", "code" => "main_courses"],
            ["name" => "Guarniciones", "code" => "sides"],
            ["name" => "Postres", "code" => "desserts"],
            ["name" => "Bebidas", "code" => "beverages"],
            ["name" => "Desayunos", "code" => "breakfast"],
            ["name" => "Snacks", "code" => "snacks"],
            ["name" => "Comida rápida", "code" => "fast_food"],
            ["name" => "Menús / combos", "code" => "combos"],
            ["name" => "Especiales del día", "code" => "daily_specials"],
        ];
        foreach ($data as $category) {
            MenuCategory::create($category);
        }
    }
}
