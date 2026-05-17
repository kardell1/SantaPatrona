<?php

namespace Modules\Production\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Production\Models\RawProduct;
use Modules\Production\Models\RecipeBook;
use Modules\Products\Models\MenuProduct;

class RecipeBooksSeeder extends Seeder
{
    // crear el producto
    // y describir su composicion de materia prima
    public function run(): void
    {
        $recipe = [
            [
                "name" => "apple pie",
                "suggested_selling_price" => 10,
                "items" => [
                    // masa
                    ["code" => "sugar", "detail" => "masa"],
                    ["code" => "wheat_flour", "detail" => "masa"],
                    ["code" => "butter", "detail" => "masa"],
                    ["code" => "salt", "detail" => "masa"],
                    ["code" => "red_wine", "detail" => "masa"],
                    // relleno
                    ["code" => "apple", "detail" => "relleno"],
                    ["code" => "butter", "detail" => "relleno"],
                    ["code" => "walnut", "detail" => "relleno"],
                    ["code" => "brown_sugar", "detail" => "relleno"],
                    ["code" => "cinnamon", "detail" => "relleno"],
                ],
            ],

            [
                "name" => "camaron queso",
                "suggested_selling_price" => 12,
                "items" => [
                    // masa
                    ["code" => "eggs", "detail" => "masa"],
                    ["code" => "butter", "detail" => "masa"],
                    ["code" => "salt", "detail" => "masa"],
                    ["code" => "red_wine", "detail" => "masa"],
                    ["code" => "lard", "detail" => "masa"],
                    // relleno
                    ["code" => "cheese", "detail" => "relleno"],
                    ["code" => "shrimp", "detail" => "relleno"],
                    ["code" => "white_pepper", "detail" => "relleno"],
                    ["code" => "garlic_salt", "detail" => "relleno"],
                    ["code" => "paprika", "detail" => "relleno"],
                ],
            ],
        ];
        foreach ($recipe as $item) {
            $new_menu_product = MenuProduct::create([
                "name" => $item["name"],
                "is_priority" => false,
                "suggested_selling_price" =>$item['suggested_selling_price'] ,
                "manufacturing_cost" => "4.19",
                "adquisition_date" => now(),
                "reception_date" => now(),
                "expired_date" => now(),
                "menu_category_id" => 1,
            ]);
            foreach ($item["items"] as $r) {
                $found_raw_material = RawProduct::where(
                    "code",
                    $r["code"],
                )->first();
                RecipeBook::create([
                    "menu_product_id" => $new_menu_product->id,
                    "raw_product_id" => $found_raw_material->id,
                    "detail" => $r["detail"],
                ]);
            }
        }
    }
}
