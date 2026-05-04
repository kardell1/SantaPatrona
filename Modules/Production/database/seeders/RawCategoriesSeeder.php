<?php

namespace Modules\Production\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Production\Models\RawCategory;

class RawCategoriesSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ["name" => "Proteínas", "code" => "proteins"],
            ["name" => "Verduras y hortalizas", "code" => "vegetables"],
            ["name" => "Frutas", "code" => "fruits"],
            ["name" => "Granos y cereales", "code" => "grains"],
            ["name" => "Harinas y derivados", "code" => "flours"],
            ["name" => "Lácteos", "code" => "dairy"],
            ["name" => "Condimentos y especias", "code" => "spices"],
            ["name" => "Aceites y grasas", "code" => "oils"],
            ["name" => "Azúcares y endulzantes", "code" => "sweeteners"],
            ["name" => "Procesados y conservas", "code" => "processed"],
            ["name" => "Congelados", "code" => "frozen"],
            ["name" => "Insumos", "code" => "supplies"],
        ];
        foreach ($data as $item) {
            RawCategory::create($item);
        }
    }
}
