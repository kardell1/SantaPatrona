<?php

namespace Modules\Products\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Products\Models\MenuFlavor;
use Modules\Products\Models\MenuInventory;
use Modules\Products\Models\MenuProduct;

class MenuInventorySeeder extends Seeder
{
    public function run(): void
    {

        $inventories = [

            [
                "name" => "pino",
                "variant" => "bite",
                "amount" => 50,
                "reception_date" => "2026-06-02",
                "expired_date" => "2026-06-06",
                "flavor" => null,
                "employee" => 1
            ],
            [
                "name" => "pino",
                "variant" => "coctel",
                "amount" => 40,
                "reception_date" => "2026-06-02",
                "expired_date" => "2026-06-06",
                "flavor" => null,
                "employee" => 1
            ],
            [
                "name" => "pino",
                "variant" => "grande",
                "amount" => 30,
                "reception_date" => "2026-06-02",
                "expired_date" => "2026-06-06",
                "flavor" => null,
                "employee" => 1
            ],

            [
                "name" => "camaron",
                "variant" => "bite",
                "amount" => 50,
                "reception_date" => "2026-06-02",
                "expired_date" => "2026-06-06",
                "flavor" => null,
                "employee" => 1
            ],
            [
                "name" => "camaron",
                "variant" => "coctel",
                "amount" => 40,
                "reception_date" => "2026-06-02",
                "expired_date" => "2026-06-06",
                "flavor" => null,
                "employee" => 1
            ],
            [
                "name" => "camaron",
                "variant" => "grande",
                "amount" => 30,
                "reception_date" => "2026-06-02",
                "expired_date" => "2026-06-06",
                "flavor" => null,
                "employee" => 1
            ],

            [
                "name" => "caprese",
                "variant" => "bite",
                "amount" => 50,
                "reception_date" => "2026-06-02",
                "expired_date" => "2026-06-06",
                "flavor" => null,
                "employee" => 1
            ],
            [
                "name" => "caprese",
                "variant" => "coctel",
                "amount" => 40,
                "reception_date" => "2026-06-02",
                "expired_date" => "2026-06-06",
                "flavor" => null,
                "employee" => 1
            ],
            [
                "name" => "caprese",
                "variant" => "grande",
                "amount" => 30,
                "reception_date" => "2026-06-02",
                "expired_date" => "2026-06-06",
                "flavor" => null,
                "employee" => 1
            ],

            [
                "name" => "vaggie",
                "variant" => "bite",
                "amount" => 50,
                "reception_date" => "2026-06-02",
                "expired_date" => "2026-06-06",
                "flavor" => null,
                "employee" => 1
            ],
            [
                "name" => "vaggie",
                "variant" => "coctel",
                "amount" => 40,
                "reception_date" => "2026-06-02",
                "expired_date" => "2026-06-06",
                "flavor" => null,
                "employee" => 1
            ],
            [
                "name" => "vaggie",
                "variant" => "grande",
                "amount" => 30,
                "reception_date" => "2026-06-02",
                "expired_date" => "2026-06-06",
                "flavor" => null,
                "employee" => 1
            ],

            [
                "name" => "apple pie",
                "variant" => "bite",
                "amount" => 50,
                "reception_date" => "2026-06-02",
                "expired_date" => "2026-06-06",
                "flavor" => null,
                "employee" => 1
            ],
            [
                "name" => "apple pie",
                "variant" => "coctel",
                "amount" => 40,
                "reception_date" => "2026-06-02",
                "expired_date" => "2026-06-06",
                "flavor" => null,
                "employee" => 1
            ],
            [
                "name" => "apple pie",
                "variant" => "grande",
                "amount" => 30,
                "reception_date" => "2026-06-02",
                "expired_date" => "2026-06-06",
                "flavor" => null,
                "employee" => 1
            ],
            [
                "name" => "Torta de red velvet",
                "variant" => "mediana",
                "amount" => 15,
                "reception_date" => "2026-06-02",
                "expired_date" => "2026-06-08",
                "flavor" => null,
                "employee" => 1
            ],
            [
                "name" => "Torta de red velvet",
                "variant" => "pequena",
                "amount" => 20,
                "reception_date" => "2026-06-02",
                "expired_date" => "2026-06-08",
                "flavor" => null,
                "employee" => 1
            ],
            [
                "name" => "Torta de red velvet",
                "variant" => "familiar",
                "amount" => 10,
                "reception_date" => "2026-06-02",
                "expired_date" => "2026-06-08",
                "flavor" => null,
                "employee" => 1
            ],

            [
                "name" => "Torta de chocolate",
                "variant" => "mediana",
                "amount" => 15,
                "reception_date" => "2026-06-02",
                "expired_date" => "2026-06-08",
                "flavor" => null,
                "employee" => 1
            ],
            [
                "name" => "Torta de chocolate",
                "variant" => "pequena",
                "amount" => 20,
                "reception_date" => "2026-06-02",
                "expired_date" => "2026-06-08",
                "flavor" => null,
                "employee" => 1
            ],
            [
                "name" => "Torta de chocolate",
                "variant" => "familiar",
                "amount" => 10,
                "reception_date" => "2026-06-02",
                "expired_date" => "2026-06-08",
                "flavor" => null,
                "employee" => 1
            ],

            [
                "name" => "Torta de zanahoria",
                "variant" => "mediana",
                "amount" => 15,
                "reception_date" => "2026-06-02",
                "expired_date" => "2026-06-08",
                "flavor" => null,
                "employee" => 1
            ],
            [
                "name" => "Torta de zanahoria",
                "variant" => "pequena",
                "amount" => 20,
                "reception_date" => "2026-06-02",
                "expired_date" => "2026-06-08",
                "flavor" => null,
                "employee" => 1
            ],
            [
                "name" => "Torta de zanahoria",
                "variant" => "familiar",
                "amount" => 10,
                "reception_date" => "2026-06-02",
                "expired_date" => "2026-06-08",
                "flavor" => null,
                "employee" => 1
            ],

            [
                "name" => "Brookie con helado",
                "variant" => "mediana",
                "amount" => 15,
                "reception_date" => "2026-06-02",
                "expired_date" => "2026-06-08",
                "flavor" => null,
                "employee" => 1
            ],
            [
                "name" => "Brookie con helado",
                "variant" => "pequena",
                "amount" => 20,
                "reception_date" => "2026-06-02",
                "expired_date" => "2026-06-08",
                "flavor" => null,
                "employee" => 1
            ],
            [
                "name" => "Brookie con helado",
                "variant" => "familiar",
                "amount" => 10,
                "reception_date" => "2026-06-02",
                "expired_date" => "2026-06-08",
                "flavor" => null,
                "employee" => 1
            ],

            [
                "name" => "cheesecake de frutos rojos",
                "variant" => "mediana",
                "amount" => 15,
                "reception_date" => "2026-06-02",
                "expired_date" => "2026-06-08",
                "flavor" => null,
                "employee" => 1
            ],
            [
                "name" => "cheesecake de frutos rojos",
                "variant" => "pequena",
                "amount" => 20,
                "reception_date" => "2026-06-02",
                "expired_date" => "2026-06-08",
                "flavor" => null,
                "employee" => 1
            ],
            [
                "name" => "cheesecake de frutos rojos",
                "variant" => "familiar",
                "amount" => 10,
                "reception_date" => "2026-06-02",
                "expired_date" => "2026-06-08",
                "flavor" => null,
                "employee" => 1
            ],

            [
                "name" => "cheesecake de maracuya",
                "variant" => "mediana",
                "amount" => 15,
                "reception_date" => "2026-06-02",
                "expired_date" => "2026-06-08",
                "flavor" => null,
                "employee" => 1
            ],
            [
                "name" => "cheesecake de maracuya",
                "variant" => "pequena",
                "amount" => 20,
                "reception_date" => "2026-06-02",
                "expired_date" => "2026-06-08",
                "flavor" => null,
                "employee" => 1
            ],
            [
                "name" => "cheesecake de maracuya",
                "variant" => "familiar",
                "amount" => 10,
                "reception_date" => "2026-06-02",
                "expired_date" => "2026-06-08",
                "flavor" => null,
                "employee" => 1
            ],

            [
                "name" => "croissant salado",
                "variant" => "mediana",
                "amount" => 15,
                "reception_date" => "2026-06-02",
                "expired_date" => "2026-06-08",
                "flavor" => null,
                "employee" => 1
            ],
            [
                "name" => "croissant salado",
                "variant" => "pequena",
                "amount" => 20,
                "reception_date" => "2026-06-02",
                "expired_date" => "2026-06-08",
                "flavor" => null,
                "employee" => 1
            ],
            [
                "name" => "croissant salado",
                "variant" => "familiar",
                "amount" => 10,
                "reception_date" => "2026-06-02",
                "expired_date" => "2026-06-08",
                "flavor" => null,
                "employee" => 1
            ],

            [
                "name" => "croissant dulce",
                "variant" => "mediana",
                "amount" => 15,
                "reception_date" => "2026-06-02",
                "expired_date" => "2026-06-08",
                "flavor" => null,
                "employee" => 1
            ],
            [
                "name" => "croissant dulce",
                "variant" => "pequena",
                "amount" => 20,
                "reception_date" => "2026-06-02",
                "expired_date" => "2026-06-08",
                "flavor" => null,
                "employee" => 1
            ],
            [
                "name" => "croissant dulce",
                "variant" => "familiar",
                "amount" => 10,
                "reception_date" => "2026-06-02",
                "expired_date" => "2026-06-08",
                "flavor" => null,
                "employee" => 1
            ],

            [
                "name" => "panqueque americano",
                "variant" => "mediana",
                "amount" => 15,
                "reception_date" => "2026-06-02",
                "expired_date" => "2026-06-08",
                "flavor" => null,
                "employee" => 1
            ],
            [
                "name" => "panqueque americano",
                "variant" => "pequena",
                "amount" => 20,
                "reception_date" => "2026-06-02",
                "expired_date" => "2026-06-08",
                "flavor" => null,
                "employee" => 1
            ],
            [
                "name" => "panqueque americano",
                "variant" => "familiar",
                "amount" => 10,
                "reception_date" => "2026-06-02",
                "expired_date" => "2026-06-08",
                "flavor" => null,
                "employee" => 1
            ],

            [
                "name" => "parfait de frutas",
                "variant" => "mediana",
                "amount" => 15,
                "reception_date" => "2026-06-02",
                "expired_date" => "2026-06-08",
                "flavor" => null,
                "employee" => 1
            ],
            [
                "name" => "parfait de frutas",
                "variant" => "pequena",
                "amount" => 20,
                "reception_date" => "2026-06-02",
                "expired_date" => "2026-06-08",
                "flavor" => null,
                "employee" => 1
            ],
            [
                "name" => "parfait de frutas",
                "variant" => "familiar",
                "amount" => 10,
                "reception_date" => "2026-06-02",
                "expired_date" => "2026-06-08",
                "flavor" => null,
                "employee" => 1
            ],

            [
                "name" => "pan con chocolate",
                "variant" => "mediana",
                "amount" => 15,
                "reception_date" => "2026-06-02",
                "expired_date" => "2026-06-08",
                "flavor" => null,
                "employee" => 1
            ],
            [
                "name" => "pan con chocolate",
                "variant" => "pequena",
                "amount" => 20,
                "reception_date" => "2026-06-02",
                "expired_date" => "2026-06-08",
                "flavor" => null,
                "employee" => 1
            ],
            [
                "name" => "pan con chocolate",
                "variant" => "familiar",
                "amount" => 10,
                "reception_date" => "2026-06-02",
                "expired_date" => "2026-06-08",
                "flavor" => null,
                "employee" => 1
            ],
        ];
        foreach ($inventories as $item) {

            $product = MenuProduct::where('name', $item['name'])->first();

            if (!$product) {
                continue;
            }

            $variant = $product
                ->menuProductVariants()
                ->where('name', $item['variant'])
                ->first();

            if (!$variant) {
                continue;
            }

            $flavor = null;

            if (!empty($item['flavor'])) {
                $flavor = MenuFlavor::where('name', $item['flavor'])->first();
            }

            MenuInventory::create([
                'menu_product_variant_id' => $variant->id,
                'manufacturing_cost' => 0,
                'amount' => (int) $item['amount'],
                'reception_date' => $item['reception_date'],
                'expired_date' => $item['expired_date'],
                'employee_id' => $item['employee'],
                'menu_flavor_id' => $flavor?->id,
            ]);
        }
    }
}
