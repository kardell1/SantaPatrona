<?php

namespace Modules\Products\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Products\Models\Style;

class StyleSeeder extends Seeder
{
    public function run(): void
    {
        $styles = [
            ['name' => 'Casual', 'description' => 'Estilo diario y relajado'],
            ['name' => 'Deportivo', 'description' => 'Diseñado para actividad física'],
            ['name' => 'Formal', 'description' => 'Para eventos elegantes o trabajo'],
            ['name' => 'Streetwear', 'description' => 'Estilo urbano moderno'],
            ['name' => 'Minimalista', 'description' => 'Diseño simple y limpio'],
            ['name' => 'Retro', 'description' => 'Inspirado en diseños clásicos'],
            ['name' => 'Outdoor', 'description' => 'Para actividades al aire libre'],
            ['name' => 'Elegante', 'description' => 'Look sofisticado'],
            ['name' => 'Running', 'description' => 'Enfocado en correr'],
            ['name' => 'Training', 'description' => 'Entrenamiento en gimnasio'],
            ['name' => 'Skate', 'description' => 'Estilo skateboarding'],
            ['name' => 'Business', 'description' => 'Uso profesional de oficina'],
            ['name' => 'Vintage', 'description' => 'Estética antigua o clásica'],
            ['name' => 'Sportwear', 'description' => 'Ropa deportiva casual'],
            ['name' => 'Fashion', 'description' => 'Enfocado en tendencia']
        ];

        foreach($styles as $style){
            Style::create($style);
        }
    }
}
