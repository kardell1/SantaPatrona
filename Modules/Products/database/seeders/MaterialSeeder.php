<?php

namespace Modules\Products\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Products\Models\Material;

class MaterialSeeder extends Seeder
{
    public function run(): void
    {
        $materials = [
            "Cuero",
            "Cuero Sintético",
            "Gamuza",
            "Lona",
            "Malla",
            "Textil",
            "Nobuck",
            "PVC",
            "Goma",
            "EVA"
        ];
        foreach($materials as $material){
            Material::create([
                'name' => $material,
                'description' => null
            ]);
        }
    }
}
