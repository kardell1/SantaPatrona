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

            // Nuevas categorías
            ["name" => "Empanadas", "code" => "empanadas"],
            ["name" => "Tortas y pasteles", "code" => "cakes_and_pastries"],
            ["name" => "Sándwiches", "code" => "sandwiches"],
            ["name" => "Helados", "code" => "ice_cream"],
            ["name" => "Cafetería", "code" => "coffee_shop"],
            ["name" => "Panadería", "code" => "bakery"],
            ["name" => "Jugos y smoothies", "code" => "juices_and_smoothies"],
            ["name" => "Opciones vegetarianas", "code" => "vegetarian"],
            ["name" => "Opciones veganas", "code" => "vegan"],
        ];

        foreach ($data as $category) {
            MenuCategory::create($category);
        }
    }
}
