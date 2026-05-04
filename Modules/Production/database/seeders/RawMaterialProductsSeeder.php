<?php

namespace Modules\Production\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Production\Models\RawCategory;
use Modules\Production\Models\RawProduct;

class RawMaterialProductsSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            //Proteinas
            [
                "name" => "Carne de res",
                "code" => "beef",
                "unit" => "kg",
                "category" => "proteins",
            ],
            [
                "name" => "Pollo entero",
                "code" => "chicken",
                "unit" => "kg",
                "category" => "proteins",
            ],
            [
                "name" => "Carne de cerdo",
                "code" => "pork",
                "unit" => "kg",
                "category" => "proteins",
            ],
            [
                "name" => "Pescado",
                "code" => "fish",
                "unit" => "kg",
                "category" => "proteins",
            ],
            [
                "name" => "Salchichas",
                "code" => "sausages",
                "unit" => "kg",
                "category" => "proteins",
            ],

            //Verduras
            [
                "name" => "Tomate",
                "code" => "tomato",
                "unit" => "kg",
                "category" => "vegetables",
            ],
            [
                "name" => "Cebolla",
                "code" => "onion",
                "unit" => "kg",
                "category" => "vegetables",
            ],
            [
                "name" => "Zanahoria",
                "code" => "carrot",
                "unit" => "kg",
                "category" => "vegetables",
            ],
            [
                "name" => "Lechuga",
                "code" => "lettuce",
                "unit" => "unit",
                "category" => "vegetables",
            ],
            [
                "name" => "Pimiento",
                "code" => "pepper",
                "unit" => "kg",
                "category" => "vegetables",
            ],

            //Frutas
            [
                "name" => "Banana",
                "code" => "banana",
                "unit" => "kg",
                "category" => "fruits",
            ],
            [
                "name" => "Manzana",
                "code" => "apple",
                "unit" => "kg",
                "category" => "fruits",
            ],
            [
                "name" => "Naranja",
                "code" => "orange",
                "unit" => "kg",
                "category" => "fruits",
            ],
            [
                "name" => "Papaya",
                "code" => "papaya",
                "unit" => "unit",
                "category" => "fruits",
            ],
            [
                "name" => "Piña",
                "code" => "pineapple",
                "unit" => "unit",
                "category" => "fruits",
            ],

            //Granos
            [
                "name" => "Arroz",
                "code" => "rice",
                "unit" => "kg",
                "category" => "grains",
            ],
            [
                "name" => "Quinua",
                "code" => "quinoa",
                "unit" => "kg",
                "category" => "grains",
            ],
            [
                "name" => "Huevos",
                "code" => "eggs",
                "unit" => "unit",
                "category" => "dairy",
            ],
            [
                "name" => "Nuez",
                "code" => "walnut",
                "unit" => "kg",
                "category" => "grains",
            ],
            [
                "name" => "Avena",
                "code" => "oats",
                "unit" => "kg",
                "category" => "grains",
            ],
            [
                "name" => "Trigo",
                "code" => "wheat",
                "unit" => "kg",
                "category" => "grains",
            ],
            [
                "name" => "Maíz",
                "code" => "corn",
                "unit" => "kg",
                "category" => "grains",
            ],

            //Harinas
            [
                "name" => "Harina de trigo",
                "code" => "wheat_flour",
                "unit" => "kg",
                "category" => "flours",
            ],
            [
                "name" => "Harina integral",
                "code" => "whole_flour",
                "unit" => "kg",
                "category" => "flours",
            ],
            [
                "name" => "Fécula de maíz",
                "code" => "corn_starch",
                "unit" => "kg",
                "category" => "flours",
            ],
            [
                "name" => "Harina de arroz",
                "code" => "rice_flour",
                "unit" => "kg",
                "category" => "flours",
            ],
            [
                "name" => "Harina de avena",
                "code" => "oat_flour",
                "unit" => "kg",
                "category" => "flours",
            ],

            //Lacteos
            [
                "name" => "Leche",
                "code" => "milk",
                "unit" => "liter",
                "category" => "dairy",
            ],
            [
                "name" => "Queso",
                "code" => "cheese",
                "unit" => "kg",
                "category" => "dairy",
            ],
            [
                "name" => "Paprika",
                "code" => "paprika",
                "unit" => "g",
                "category" => "spices",
            ],
            [
                "name" => "Sal de ajo",
                "code" => "garlic_salt",
                "unit" => "g",
                "category" => "spices",
            ],
            [
                "name" => "Pimienta blanca",
                "code" => "white_pepper",
                "unit" => "g",
                "category" => "spices",
            ],
            [
                "name" => "Camarón",
                "code" => "shrimp",
                "unit" => "kg",
                "category" => "proteins",
            ],
            [
                "name" => "Mantequilla",
                "code" => "butter",
                "unit" => "kg",
                "category" => "dairy",
            ],
            [
                "name" => "Crema de leche",
                "code" => "cream",
                "unit" => "liter",
                "category" => "dairy",
            ],
            [
                "name" => "Yogur",
                "code" => "yogurt",
                "unit" => "unit",
                "category" => "dairy",
            ],

            //Especias
            [
                "name" => "Sal",
                "code" => "salt",
                "unit" => "kg",
                "category" => "spices",
            ],
            [
                "name" => "Pimienta",
                "code" => "pepper_spice",
                "unit" => "g",
                "category" => "spices",
            ],
            [
                "name" => "Comino",
                "code" => "cumin",
                "unit" => "g",
                "category" => "spices",
            ],
            [
                "name" => "Orégano",
                "code" => "oregano",
                "unit" => "g",
                "category" => "spices",
            ],
            [
                "name" => "Ajo en polvo",
                "code" => "garlic_powder",
                "unit" => "g",
                "category" => "spices",
            ],

            //Aceites
            [
                "name" => "Aceite vegetal",
                "code" => "vegetable_oil",
                "unit" => "liter",
                "category" => "oils",
            ],
            [
                "name" => "Aceite de oliva",
                "code" => "olive_oil",
                "unit" => "liter",
                "category" => "oils",
            ],
            [
                "name" => "Manteca",
                "code" => "lard",
                "unit" => "kg",
                "category" => "oils",
            ],
            [
                "name" => "Aceite de girasol",
                "code" => "sunflower_oil",
                "unit" => "liter",
                "category" => "oils",
            ],
            [
                "name" => "Aceite de soya",
                "code" => "soy_oil",
                "unit" => "liter",
                "category" => "oils",
            ],

            //Endulzantes
            [
                "name" => "Azúcar",
                "code" => "sugar",
                "unit" => "kg",
                "category" => "sweeteners",
            ],
            [
                "name" => "Miel",
                "code" => "honey",
                "unit" => "liter",
                "category" => "sweeteners",
            ],
            [
                "name" => "Stevia",
                "code" => "stevia",
                "unit" => "g",
                "category" => "sweeteners",
            ],
            [
                "name" => "Azúcar morena",
                "code" => "brown_sugar",
                "unit" => "kg",
                "category" => "sweeteners",
            ],
            [
                "name" => "Canela",
                "code" => "cinnamon",
                "unit" => "g",
                "category" => "spices",
            ],
            [
                "name" => "Jarabe",
                "code" => "syrup",
                "unit" => "liter",
                "category" => "sweeteners",
            ],

            //Procesados
            [
                "name" => "Salsa de tomate",
                "code" => "tomato_sauce",
                "unit" => "liter",
                "category" => "processed",
            ],
            [
                "name" => "Mayonesa",
                "code" => "mayonnaise",
                "unit" => "liter",
                "category" => "processed",
            ],
            [
                "name" => "Mostaza",
                "code" => "mustard",
                "unit" => "liter",
                "category" => "processed",
            ],
            [
                "name" => "Atún enlatado",
                "code" => "canned_tuna",
                "unit" => "unit",
                "category" => "processed",
            ],
            [
                "name" => "Pulpa de fruta",
                "code" => "fruit_pulp",
                "unit" => "kg",
                "category" => "processed",
            ],

            //Congelados
            [
                "name" => "Pollo congelado",
                "code" => "frozen_chicken",
                "unit" => "kg",
                "category" => "frozen",
            ],
            [
                "name" => "Carne congelada",
                "code" => "frozen_beef",
                "unit" => "kg",
                "category" => "frozen",
            ],
            [
                "name" => "Papas congeladas",
                "code" => "frozen_fries",
                "unit" => "kg",
                "category" => "frozen",
            ],
            [
                "name" => "Verduras congeladas",
                "code" => "frozen_vegetables",
                "unit" => "kg",
                "category" => "frozen",
            ],
            [
                "name" => "Mariscos congelados",
                "code" => "frozen_seafood",
                "unit" => "kg",
                "category" => "frozen",
            ],

            //Insumos
            [
                "name" => "Envases plásticos",
                "code" => "plastic_containers",
                "unit" => "unit",
                "category" => "supplies",
            ],
            [
                "name" => "Bolsas",
                "code" => "bags",
                "unit" => "unit",
                "category" => "supplies",
            ],
            [
                "name" => "Guantes",
                "code" => "gloves",
                "unit" => "unit",
                "category" => "supplies",
            ],
            [
                "name" => "Detergente",
                "code" => "detergent",
                "unit" => "liter",
                "category" => "supplies",
            ],
            [
                "name" => "Servilletas",
                "code" => "napkins",
                "unit" => "unit",
                "category" => "supplies",
            ],
            // tipos de vinos
            [
                "name" => "Vino tinto",
                "code" => "red_wine",
                "unit" => "unit",
                "category" => "beverages",
            ],
            [
                "name" => "Vino blanco",
                "code" => "white_wine",
                "unit" => "unit",
                "category" => "beverages",
            ],
            [
                "name" => "Vino rosado",
                "code" => "rose_wine",
                "unit" => "unit",
                "category" => "beverages",
            ],
            [
                "name" => "Vino espumoso",
                "code" => "sparkling_wine",
                "unit" => "unit",
                "category" => "beverages",
            ],
            [
                "name" => "Vino de postre",
                "code" => "dessert_wine",
                "unit" => "unit",
                "category" => "beverages",
            ],
        ];
        foreach ($data as $item) {
            $category = RawCategory::where("code", $item["category"])->first();

            RawProduct::create([
                "name" => $item["name"],
                "code" => $item["code"],
                "unit" => $item["unit"],
                "raw_category_id" => $category->id ?? 1,
            ]);
        }
    }
}
