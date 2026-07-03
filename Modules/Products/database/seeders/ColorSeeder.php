<?php

namespace Modules\Products\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Products\Models\Color;

class ColorSeeder extends Seeder
{
    public function run(): void
    {
        $colors = [
            "Negro",
            "Blanco",
            "Gris",
            "Azul",
            "Azul Marino",
            "Rojo",
            "Verde",
            "Oliva",
            "Amarillo",
            "Naranja",
            "Rosa",
            "Morado",
            "Marrón",
            "Beige",
            "Camel",
            "Crema",
            "Dorado",
            "Plateado",
            "Burdeos",
            "Turquesa"
        ];
        foreach($colors as $color){
            Color::create([
                'name' => $color,
                'description' => null
            ]);
        }
    }
}
