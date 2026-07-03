<?php

namespace Modules\Products\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Products\Models\Tag;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        $tags = [
            "Nuevo",
            "Oferta",
            "Más Vendido",
            "Edición Limitada",
            "Premium",
            "Ligero",
            "Impermeable",
            "Transpirable",
            "Antideslizante",
            "Confort",
            "Outdoor",
            "Running",
            "Gym",
            "Casual",
            "Formal",
            "Vintage",
            "Minimalista",
            "Urbano",
            "Eco Friendly",
            "Vegano",
            "Hecho a Mano",
            "Unisex",
            "Invierno",
            "Verano",
            "Colección 2026"
        ];
        foreach($tags as $tag){
            Tag::create([
                'name' => $tag,
            ]);
        }
    }
}
