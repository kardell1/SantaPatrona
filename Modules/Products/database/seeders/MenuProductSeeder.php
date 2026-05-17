<?php

namespace Modules\Products\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Products\Models\MenuCategory;
use Modules\Products\Models\MenuProduct;
use Modules\Products\Models\MenuProductUnit;

class MenuProductSeeder extends Seeder
{
    public function run(): void
    {

        $products = [
            [
                'name' => "mate calma",
                'menu_category' => "beverages",
                'presentation' => [
                    [
                        "name" => "unico",
                        "equivalence" => "entero",
                        "price" => 10
                    ]
                ]
            ],
            [
                'name' => "mate bienestar",
                'menu_category' => "beverages",
                'presentation' => [
                    [
                        "name" => "unico",
                        "equivalence" => "entero",
                        "price" => 10
                    ]
                ]
            ],
            [
                'name' => "mate defensas",
                'menu_category' => "beverages",
                'presentation' => [
                    [
                        "name" => "unico",
                        "equivalence" => "entero",
                        "price" => 10
                    ]
                ]
            ],
            [
                'name' => "cafe de la casa",
                'menu_category' => "beverages",
                'presentation' => [
                    [
                        "name" => "unico",
                        "equivalence" => "entero",
                        "price" => 10
                    ]
                ]
            ],
            [
                'name' => "cafe con leche",
                'menu_category' => 'beverages',
                'presentation' => [
                    [
                        "name" => "unico",
                        "equivalence" => "entero",
                        "price" => 12
                    ]
                ]
            ],
            [
                'name' => "te tradicional",
                'menu_category' => 'beverages',
                'presentation' => [
                    [
                        "name" => "unico",
                        "equivalence" => "entero",
                        "price" => 12
                    ]
                ]
            ],
            [
                'name' => "te matcha",
                'menu_category' => 'beverages',
                'presentation' => [
                    [
                        "name" => "unico",
                        "equivalence" => "entero",
                        "price" => 12
                    ]
                ]
            ],
            [
                'name' => "latte matcha",
                'menu_category' => 'beverages',
                'presentation' => [
                    [
                        "name" => "unico",
                        "equivalence" => "entero",
                        "price" => 12
                    ]
                ]
            ],
            [
                'name' => "latte pina colada",
                'menu_category' => 'beverages',
                'presentation' => [
                    [
                        "name" => "unico",
                        "equivalence" => "entero",
                        "price" => 12
                    ]
                ]
            ],
            [
                'name' => "submarino chocolate",
                'menu_category' => 'beverages',
                'presentation' => [
                    [
                        "name" => "unico",
                        "equivalence" => "entero",
                        "price" => 12
                    ]
                ]
            ],
            [
                'name' => "chicha morada",
                'menu_category' => 'beverages',
                'presentation' => [
                    [
                        "name" => "unico",
                        "equivalence" => "entero",
                        "price" => 10
                    ]
                ]
            ],
            [
                'name' => "mocochinchi",
                'menu_category' => 'beverages',
                'presentation' => [
                    [
                        "name" => "unico",
                        "equivalence" => "entero",
                        "price" => 10
                    ]
                ]
            ],
            [
                'name' => "limonada de matcha",
                'menu_category' => 'beverages',
                'presentation' => [

                    [
                        "name" => "unico",
                        "equivalence" => "entero",
                        "price" => 12
                    ]
                ]
            ],
            [
                'name' => "soda jamaica frutilla",
                'menu_category' => 'beverages',
                'presentation' => [
                    [
                        "name" => "unico",
                        "equivalence" => "entero",
                        "price" => 15
                    ]
                ]
            ],
            [
                'name' => "soda maracupina",
                'menu_category' => 'beverages',
                'presentation' => [
                    [
                        "name" => "unico",
                        "equivalence" => "entero",
                        "price" => 15
                    ]
                ]
            ],
            [
                'name' => "affogato de vino",
                'menu_category' => 'beverages',
                'presentation' => [
                    [
                        "name" => "unico",
                        "equivalence" => "entero",
                        "price" => 20
                    ]
                ]
            ],

            [
                'name' => "affogato de matcha",
                'menu_category' => 'beverages',
                'presentation' => [
                    [
                        "name" => "unico",
                        "equivalence" => "entero",
                        "price" => 20
                    ]
                ]
            ],


            [
                'name' => "affogato de cafe",
                'menu_category' => 'beverages',
                'presentation' => [
                    [
                        "name" => "unico",
                        "equivalence" => "entero",
                        "price" => 20
                    ]
                ]
            ],

            [
                'name' => "hidromiel 20%",
                'menu_category' => 'beverages',
                'presentation' => [
                    [
                        "name" => "unico",
                        "equivalence" => "entero",
                        "price" => 20
                    ]
                ]
            ],

            [
                'name' => "hidromiel 15%",
                'menu_category' => 'beverages',
                'presentation' => [
                    [
                        "name" => "unico",
                        "equivalence" => "entero",
                        "price" => 24
                    ]
                ]
            ],

            [
                'name' => "vine brule",
                'menu_category' => 'beverages',
                'presentation' => [
                    [
                        "name" => "unico",
                        "equivalence" => "entero",
                        "price" => 20
                    ]
                ]
            ],

            [
                'name' => "gaseosas",
                'menu_category' => 'beverages',
                'presentation' => [
                    [
                        "name" => "unico",
                        "equivalence" => "entero",
                        "price" => 12
                    ]
                ]
            ],
            [
                'name' => "agua sin/con gas",
                'menu_category' => 'beverages',
                'presentation' => [
                    [
                        "name" => "unico",
                        "equivalence" => "entero",
                        "price" => 10
                    ]
                ]
            ],

            [
                'name' => "pino",
                'menu_category' => "empanadas",
                'presentation' => [
                    [
                        "name" => "bite",
                        "equivalence" => "entero",
                        "price" => 10
                    ]
                ]
            ],

            [
                'name' => "camaron",
                'menu_category' => "empanadas",
                'presentation' => [
                    [
                        "name" => "bite",
                        "equivalence" => "entero",
                        "price" => 10
                    ]
                ]
            ],

            [
                'name' => "caprese",
                'menu_category' => "empanadas",
                'presentation' => [
                    [
                        "name" => "bite",
                        "equivalence" => "entero",
                        "price" => 10
                    ]
                ]
            ],

            [
                'name' => "vaggie",
                'menu_category' => "empanadas",
                'presentation' => [
                    [
                        "name" => "bite",
                        "equivalence" => "entero",
                        "price" => 10
                    ]
                ]
            ],

            [
                'name' => "apple pie",
                'menu_category' => "empanadas",
                'presentation' => [
                    [
                        "name" => "bite",
                        "equivalence" => "entero",
                        "price" => 10
                    ]
                ]
            ],

            [
                'name' => "lechon tradicional",
                'menu_category' => "sandwiches",
                'presentation' => [
                    [
                        "name" => "unico",
                        "equivalence" => "entero",
                        "price" => 25
                    ]
                ]
            ],

            [
                'name' => "lomo salteado",
                'menu_category' => "sandwiches",
                'presentation' => [
                    [
                        "name" => "unico",
                        "equivalence" => "entero",
                        "price" => 25
                    ]
                ]
            ],

            [
                'name' => "milanesa de pollo",
                'menu_category' => "sandwiches",
                'presentation' => [
                    [
                        "name" => "unico",
                        "equivalence" => "entero",
                        "price" => 25
                    ]
                ]
            ],

            [
                'name' => "capresse al pesto",
                'menu_category' => "sandwiches",
                'presentation' => [
                    [
                        "name" => "unico",
                        "equivalence" => "entero",
                        "price" => 22
                    ]
                ]
            ],

            [
                'name' => "pack vites",
                'menu_category' => "empanadas",
                'presentation' => [
                    [
                        "name" => "pack",
                        "equivalence" => "entero",
                        "price" => 30
                    ]
                ]
            ],
            [
                'name' => "granizado de setas",
                'menu_category' => "ice_cream",
                'presentation' => [
                    [
                        "name" => "simple",
                        "equivalence" => "2 esferas de helado",
                        "price" => 12
                    ],
                    [
                        "name" => "doble",
                        "equivalence" => "4 esferas de helado",
                        "price" => 18
                    ],
                    [
                        "name" => "triple",
                        "equivalence" => "8 esferas de helado",
                        "price" => 25
                    ],
                    [
                        "name" => "medio kilo",
                        "equivalence" => "esferas de helado",
                        "price" => 50
                    ],
                    [
                        "name" => "kilo",
                        "equivalence" => "2 esferas de helado",
                        "price" => 100
                    ]
                ]
            ],

            [
                'name' => "algarrobo",
                'menu_category' => "ice_cream",
                'presentation' => [
                    [
                        "name" => "simple",
                        "equivalence" => "2 esferas de helado",
                        "price" => 12
                    ],
                    [
                        "name" => "doble",
                        "equivalence" => "4 esferas de helado",
                        "price" => 18
                    ],
                    [
                        "name" => "triple",
                        "equivalence" => "8 esferas de helado",
                        "price" => 25
                    ],
                    [
                        "name" => "medio kilo",
                        "equivalence" => "esferas de helado",
                        "price" => 50
                    ],
                    [
                        "name" => "kilo",
                        "equivalence" => "2 esferas de helado",
                        "price" => 100
                    ]
                ]
            ],

            [
                'name' => "zucchini",
                'menu_category' => "ice_cream",
                'presentation' => [
                    [
                        "name" => "simple",
                        "equivalence" => "2 esferas de helado",
                        "price" => 12
                    ],
                    [
                        "name" => "doble",
                        "equivalence" => "4 esferas de helado",
                        "price" => 18
                    ],
                    [
                        "name" => "triple",
                        "equivalence" => "8 esferas de helado",
                        "price" => 25
                    ],
                    [
                        "name" => "medio kilo",
                        "equivalence" => "esferas de helado",
                        "price" => 50
                    ],
                    [
                        "name" => "kilo",
                        "equivalence" => "2 esferas de helado",
                        "price" => 100
                    ]
                ]
            ],

            [
                'name' => "espirulina",
                'menu_category' => "ice_cream",
                'presentation' => [
                    [
                        "name" => "simple",
                        "equivalence" => "2 esferas de helado",
                        "price" => 12
                    ],
                    [
                        "name" => "doble",
                        "equivalence" => "4 esferas de helado",
                        "price" => 18
                    ],
                    [
                        "name" => "triple",
                        "equivalence" => "8 esferas de helado",
                        "price" => 25
                    ],
                    [
                        "name" => "medio kilo",
                        "equivalence" => "esferas de helado",
                        "price" => 50
                    ],
                    [
                        "name" => "kilo",
                        "equivalence" => "2 esferas de helado",
                        "price" => 100
                    ]
                ]
            ],

            [
                'name' => "blueberry",
                'menu_category' => "ice_cream",
                'presentation' => [
                    [
                        "name" => "simple",
                        "equivalence" => "2 esferas de helado",
                        "price" => 12
                    ],
                    [
                        "name" => "doble",
                        "equivalence" => "4 esferas de helado",
                        "price" => 18
                    ],
                    [
                        "name" => "triple",
                        "equivalence" => "8 esferas de helado",
                        "price" => 25
                    ],
                    [
                        "name" => "medio kilo",
                        "equivalence" => "esferas de helado",
                        "price" => 50
                    ],
                    [
                        "name" => "kilo",
                        "equivalence" => "2 esferas de helado",
                        "price" => 100
                    ]
                ]
            ],

            [
                'name' => "chirimoya",
                'menu_category' => "ice_cream",
                'presentation' => [
                    [
                        "name" => "simple",
                        "equivalence" => "2 esferas de helado",
                        "price" => 12
                    ],
                    [
                        "name" => "doble",
                        "equivalence" => "4 esferas de helado",
                        "price" => 18
                    ],
                    [
                        "name" => "triple",
                        "equivalence" => "8 esferas de helado",
                        "price" => 25
                    ],
                    [
                        "name" => "medio kilo",
                        "equivalence" => "esferas de helado",
                        "price" => 50
                    ],
                    [
                        "name" => "kilo",
                        "equivalence" => "2 esferas de helado",
                        "price" => 100
                    ]
                ]
            ],

            [
                'name' => "maracuya",
                'menu_category' => "ice_cream",
                'presentation' => [
                    [
                        "name" => "simple",
                        "equivalence" => "2 esferas de helado",
                        "price" => 12
                    ],
                    [
                        "name" => "doble",
                        "equivalence" => "4 esferas de helado",
                        "price" => 18
                    ],
                    [
                        "name" => "triple",
                        "equivalence" => "8 esferas de helado",
                        "price" => 25
                    ],
                    [
                        "name" => "medio kilo",
                        "equivalence" => "esferas de helado",
                        "price" => 50
                    ],
                    [
                        "name" => "kilo",
                        "equivalence" => "2 esferas de helado",
                        "price" => 100
                    ]
                ]
            ],

            [
                'name' => "guayaba",
                'menu_category' => "ice_cream",
                'presentation' => [
                    [
                        "name" => "simple",
                        "equivalence" => "2 esferas de helado",
                        "price" => 12
                    ],
                    [
                        "name" => "doble",
                        "equivalence" => "4 esferas de helado",
                        "price" => 18
                    ],
                    [
                        "name" => "triple",
                        "equivalence" => "8 esferas de helado",
                        "price" => 25
                    ],
                    [
                        "name" => "medio kilo",
                        "equivalence" => "esferas de helado",
                        "price" => 50
                    ],
                    [
                        "name" => "kilo",
                        "equivalence" => "2 esferas de helado",
                        "price" => 100
                    ]
                ]
            ],

            [
                'name' => "copoazu",
                'menu_category' => "ice_cream",
                'presentation' => [
                    [
                        "name" => "simple",
                        "equivalence" => "2 esferas de helado",
                        "price" => 12
                    ],
                    [
                        "name" => "doble",
                        "equivalence" => "4 esferas de helado",
                        "price" => 18
                    ],
                    [
                        "name" => "triple",
                        "equivalence" => "8 esferas de helado",
                        "price" => 25
                    ],
                    [
                        "name" => "medio kilo",
                        "equivalence" => "esferas de helado",
                        "price" => 50
                    ],
                    [
                        "name" => "kilo",
                        "equivalence" => "2 esferas de helado",
                        "price" => 100
                    ]
                ]
            ],

            [
                'name' => "oreo",
                'menu_category' => "ice_cream",
                'presentation' => [
                    [
                        "name" => "simple",
                        "equivalence" => "2 esferas de helado",
                        "price" => 12
                    ],
                    [
                        "name" => "doble",
                        "equivalence" => "4 esferas de helado",
                        "price" => 18
                    ],
                    [
                        "name" => "triple",
                        "equivalence" => "8 esferas de helado",
                        "price" => 25
                    ],
                    [
                        "name" => "medio kilo",
                        "equivalence" => "esferas de helado",
                        "price" => 50
                    ],
                    [
                        "name" => "kilo",
                        "equivalence" => "2 esferas de helado",
                        "price" => 100
                    ]
                ]
            ],

            [
                'name' => "chocolate",
                'menu_category' => "ice_cream",
                'presentation' => [
                    [
                        "name" => "simple",
                        "equivalence" => "2 esferas de helado",
                        "price" => 12
                    ],
                    [
                        "name" => "doble",
                        "equivalence" => "4 esferas de helado",
                        "price" => 18
                    ],
                    [
                        "name" => "triple",
                        "equivalence" => "8 esferas de helado",
                        "price" => 25
                    ],
                    [
                        "name" => "medio kilo",
                        "equivalence" => "esferas de helado",
                        "price" => 50
                    ],
                    [
                        "name" => "kilo",
                        "equivalence" => "2 esferas de helado",
                        "price" => 100
                    ]
                ]
            ],

            [
                'name' => "limon",
                'menu_category' => "ice_cream",
                'presentation' => [
                    [
                        "name" => "simple",
                        "equivalence" => "2 esferas de helado",
                        "price" => 12
                    ],
                    [
                        "name" => "doble",
                        "equivalence" => "4 esferas de helado",
                        "price" => 18
                    ],
                    [
                        "name" => "triple",
                        "equivalence" => "8 esferas de helado",
                        "price" => 25
                    ],
                    [
                        "name" => "medio kilo",
                        "equivalence" => "esferas de helado",
                        "price" => 50
                    ],
                    [
                        "name" => "kilo",
                        "equivalence" => "2 esferas de helado",
                        "price" => 100
                    ]
                ]
            ],

            [
                'name' => "frutilla",
                'menu_category' => "ice_cream",
                'presentation' => [
                    [
                        "name" => "simple",
                        "equivalence" => "2 esferas de helado",
                        "price" => 12
                    ],
                    [
                        "name" => "doble",
                        "equivalence" => "4 esferas de helado",
                        "price" => 18
                    ],
                    [
                        "name" => "triple",
                        "equivalence" => "8 esferas de helado",
                        "price" => 25
                    ],
                    [
                        "name" => "medio kilo",
                        "equivalence" => "esferas de helado",
                        "price" => 50
                    ],
                    [
                        "name" => "kilo",
                        "equivalence" => "2 esferas de helado",
                        "price" => 100
                    ]
                ]
            ],

            [
                'name' => "tumbo",
                'menu_category' => "ice_cream",
                'presentation' => [
                    [
                        "name" => "simple",
                        "equivalence" => "2 esferas de helado",
                        "price" => 12
                    ],
                    [
                        "name" => "doble",
                        "equivalence" => "4 esferas de helado",
                        "price" => 18
                    ],
                    [
                        "name" => "triple",
                        "equivalence" => "8 esferas de helado",
                        "price" => 25
                    ],
                    [
                        "name" => "medio kilo",
                        "equivalence" => "esferas de helado",
                        "price" => 50
                    ],
                    [
                        "name" => "kilo",
                        "equivalence" => "2 esferas de helado",
                        "price" => 100
                    ]
                ]
            ]
        ];

        foreach ($products as $index => $product) {

            $foundCategory = MenuCategory::where('code', $product['menu_category'])->first();

            if (!$foundCategory) {

                dump([
                    'iteration' => $index,
                    'product_name' => $product['name'],
                    'searched_category' => $product['menu_category'],
                ]);

                continue;
            }

            $newProduct = MenuProduct::create([
                "name" => $product['name'],
                "menu_category_id" => $foundCategory->id
            ]);

            foreach ($product['presentation'] as $presentation) {
                MenuProductUnit::create([
                    'name' =>  $presentation['name'],
                    'equivalence' =>  $presentation['equivalence'],
                    'price' => $presentation['price'],
                    'menu_product_id' => $newProduct->id,
                ]);
            }
        }
    }
}
