<?php

namespace Modules\Products\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Products\Models\MenuCategory;
use Modules\Products\Models\MenuProduct;
use Modules\Products\Models\MenuProductPortions;
use Modules\Products\Models\MenuProductVariant;

class MenuProductSeeder extends Seeder
{
    public function run(): void
    {

        $products = [
            // gaseosas =========================================
            [
                'name' => "mate calma",
                'menu_category' => "beverages",
                'type_product' => 'simple',
                "variant" => [
                    [
                        "name" => "mediano",
                        "divisions" => "1",
                        "sold_price" => 10
                    ]
                ],
            ],
            [
                'name' => "mate bienestar",
                'menu_category' => "beverages",
                'type_product' => 'simple',
                "variant" => [
                    [
                        "name" => "mediano",
                        "divisions" => "1",
                        "sold_price" => 10
                    ]
                ],
            ],
            [
                'name' => "mate defensas",
                'menu_category' => "beverages",
                'type_product' => 'simple',
                "variant" => [
                    [
                        "name" => "unico",
                        "divisions" => "1",
                        "sold_price" => 10
                    ]
                ],
            ],
            [
                'name' => "cafe de la casa",
                'menu_category' => "beverages",
                'type_product' => 'simple',
                "variant" => [
                    [
                        "name" => "unico",
                        "divisions" => "1",
                        "sold_price" => 10
                    ]
                ],
            ],
            [
                'name' => "cafe con leche",
                'menu_category' => 'beverages',
                'type_product' => 'simple',
                "variant" => [
                    [
                        "name" => "unico",
                        "divisions" => "1",
                        "sold_price" => 12
                    ]
                ],
            ],
            [
                'name' => "te tradicional",
                'menu_category' => 'beverages',
                'type_product' => 'simple',
                "variant" => [
                    [
                        "name" => "unico",
                        "divisions" => "1",
                        "sold_price" => 12
                    ]
                ],
            ],
            [
                'name' => "te matcha",
                'menu_category' => 'beverages',
                'type_product' => 'simple',
                "variant" => [
                    [
                        "name" => "unico",
                        "divisions" => "1",
                        "sold_price" => 12
                    ]
                ],
            ],
            [
                'name' => "latte matcha",
                'menu_category' => 'beverages',
                'type_product' => 'simple',
                "variant" => [
                    [
                        "name" => "unico",
                        "divisions" => "1",
                        "sold_price" => 12
                    ]
                ],
            ],
            [
                'name' => "latte pina colada",
                'menu_category' => 'beverages',
                'type_product' => 'simple',
                "variant" => [
                    [
                        "name" => "unico",
                        "divisions" => "1",
                        "sold_price" => 12
                    ]
                ],
            ],
            [
                'name' => "submarino chocolate",
                'menu_category' => 'beverages',
                'type_product' => 'simple',
                "variant" => [
                    [
                        "name" => "unico",
                        "divisions" => "1",
                        "sold_price" => 12
                    ]
                ],
            ],
            [
                'name' => "chicha morada",
                'menu_category' => 'beverages',
                'type_product' => 'simple',
                "variant" => [
                    [
                        "name" => "unico",
                        "divisions" => "1",
                        "sold_price" => 10
                    ]
                ],
            ],
            [
                'name' => "mocochinchi",
                'menu_category' => 'beverages',
                'type_product' => 'simple',
                "variant" => [
                    [
                        "name" => "unico",
                        "divisions" => "1",
                        "sold_price" => 10
                    ]
                ],
            ],
            [
                'name' => "limonada de matcha",
                'menu_category' => 'beverages',
                'type_product' => 'simple',
                "variant" => [
                    [
                        "name" => "unico",
                        "divisions" => "1",
                        "sold_price" => 12
                    ]
                ],
            ],
            [
                'name' => "soda jamaica frutilla",
                'menu_category' => 'beverages',
                'type_product' => 'simple',
                "variant" => [
                    [
                        "name" => "unico",
                        "divisions" => "1",
                        "sold_price" => 15
                    ]
                ],
            ],
            [
                'name' => "soda maracupina",
                'menu_category' => 'beverages',
                'type_product' => 'simple',
                "variant" => [
                    [
                        "name" => "unico",
                        "divisions" => "1",
                        "sold_price" => 15
                    ]
                ],
            ],
            [
                'name' => "affogato de vino",
                'menu_category' => 'beverages',
                'type_product' => 'simple',
                "variant" => [
                    [
                        "name" => "unico",
                        "divisions" => "1",
                        "sold_price" => 20
                    ]
                ],
            ],
            [
                'name' => "affogato de matcha",
                'menu_category' => 'beverages',
                'type_product' => 'simple',
                "variant" => [
                    [
                        "name" => "unico",
                        "divisions" => "1",
                        "sold_price" => 20
                    ]
                ],
            ],
            [
                'name' => "affogato de cafe",
                'menu_category' => 'beverages',
                'type_product' => 'simple',
                "variant" => [
                    [
                        "name" => "unico",
                        "divisions" => "1",
                        "sold_price" => 20
                    ]
                ],
            ],
            [
                'name' => "hidromiel 20%",
                'menu_category' => 'beverages',
                'type_product' => 'simple',
                "variant" => [
                    [
                        "name" => "unico",
                        "divisions" => "1",
                        "sold_price" => 20
                    ]
                ],
            ],
            [
                'name' => "hidromiel 15%",
                'menu_category' => 'beverages',
                'type_product' => 'simple',
                "variant" => [
                    [
                        "name" => "unico",
                        "divisions" => "1",
                        "sold_price" => 24
                    ]
                ],
            ],
            [
                'name' => "vine brule",
                'menu_category' => 'beverages',
                'type_product' => 'simple',
                "variant" => [
                    [
                        "name" => "unico",
                        "divisions" => "1",
                        "sold_price" => 20
                    ]
                ],
            ],
            [
                'name' => "gaseosas",
                'menu_category' => 'beverages',
                'type_product' => 'simple',
                "variant" => [
                    [
                        "name" => "unico",
                        "divisions" => "1",
                        "sold_price" => 12
                    ]
                ],
            ],
            [
                'name' => "agua sin/con gas",
                'menu_category' => 'beverages',
                'type_product' => 'simple',
                "variant" => [
                    [
                        "name" => "unico",
                        "divisions" => "1",
                        "sold_price" => 10
                    ]
                ],
            ],
            // ==================================================================================
            // =========================== empanadas  ===============================================
            [
                'name' => "pino",
                'menu_category' => "empanadas",
                'type_product' => 'simple',
                "variant" => [
                    [
                        "name" => "bite",
                        "divisions" => "1",
                        "sold_price" => 10
                    ],
                    [
                        "name" => "coctel",
                        "divisions" => "1",
                        "sold_price" => 15
                    ],
                    [
                        "name" => "grande",
                        "divisions" => "1",
                        "sold_price" => 20
                    ]

                ],
            ],

            [
                'name' => "camaron",
                'menu_category' => "empanadas",
                'type_product' => 'simple',
                "variant" => [
                    [
                        "name" => "bite",
                        "divisions" => "1",
                        "sold_price" => 10
                    ],
                    [
                        "name" => "coctel",
                        "divisions" => "1",
                        "sold_price" => 15
                    ],
                    [
                        "name" => "grande",
                        "divisions" => "1",
                        "sold_price" => 20
                    ]

                ],
            ],

            [
                'name' => "caprese",
                'menu_category' => "empanadas",
                'type_product' => 'simple',
                "variant" => [
                    [
                        "name" => "bite",
                        "divisions" => "1",
                        "sold_price" => 10
                    ],
                    [
                        "name" => "coctel",
                        "divisions" => "1",
                        "sold_price" => 15
                    ],
                    [
                        "name" => "grande",
                        "divisions" => "1",
                        "sold_price" => 20
                    ]

                ],
            ],

            [
                'name' => "vaggie",
                'menu_category' => "empanadas",
                'type_product' => 'simple',
                "variant" => [
                    [
                        "name" => "bite",
                        "divisions" => "1",
                        "sold_price" => 10
                    ],
                    [
                        "name" => "coctel",
                        "divisions" => "1",
                        "sold_price" => 15
                    ],
                    [
                        "name" => "grande",
                        "divisions" => "1",
                        "sold_price" => 20
                    ]

                ],
            ],

            [
                'name' => "apple pie",
                'menu_category' => "empanadas",
                'type_product' => 'simple',
                "variant" => [
                    [
                        "name" => "bite",
                        "divisions" => "1",
                        "sold_price" => 10
                    ],
                    [
                        "name" => "coctel",
                        "divisions" => "1",
                        "sold_price" => 15
                    ],
                    [
                        "name" => "grande",
                        "divisions" => "1",
                        "sold_price" => 20
                    ]

                ],
            ],
            // ==============================================================================
            // =================== sandwiches ====================================
            [
                'name' => "lechon tradicional",
                'menu_category' => "sandwiches",
                'type_product' => 'recipe',
                "variant" => [
                    [
                        "name" => "bite",
                        "divisions" => "1",
                        "sold_price" => 10
                    ],
                    [
                        "name" => "coctel",
                        "divisions" => "1",
                        "sold_price" => 15
                    ],
                    [
                        "name" => "grande",
                        "divisions" => "1",
                        "sold_price" => 20
                    ]

                ],
            ],

            [
                'name' => "lomo salteado",
                'type_product' => 'recipe',
                'menu_category' => "sandwiches",
                "variant" => [
                    [
                        "name" => "bite",
                        "divisions" => "1",
                        "sold_price" => 10
                    ],
                    [
                        "name" => "coctel",
                        "divisions" => "1",
                        "sold_price" => 15
                    ],
                    [
                        "name" => "grande",
                        "divisions" => "1",
                        "sold_price" => 20
                    ]

                ],
            ],

            [
                'name' => "milanesa de pollo",
                'type_product' => 'recipe',
                'menu_category' => "sandwiches",
                "variant" => [
                    [
                        "name" => "bite",
                        "divisions" => "1",
                        "sold_price" => 10
                    ],
                    [
                        "name" => "coctel",
                        "divisions" => "1",
                        "sold_price" => 15
                    ],
                    [
                        "name" => "grande",
                        "divisions" => "1",
                        "sold_price" => 20
                    ]

                ],
            ],

            [
                'name' => "capresse al pesto",
                'type_product' => 'recipe',
                'menu_category' => "sandwiches",
                "variant" => [
                    [
                        "name" => "bite",
                        "divisions" => "1",
                        "sold_price" => 10
                    ],
                    [
                        "name" => "coctel",
                        "divisions" => "1",
                        "sold_price" => 15
                    ],
                    [
                        "name" => "grande",
                        "divisions" => "1",
                        "sold_price" => 20
                    ]

                ],
            ],
            // esto es un combo de todas las empanadas ==============================
            /* [ */
            /*     'name' => "pack vites", */
            /*     'menu_category' => "empanadas", */
            /*     "variant" => [ */
            /*         [ */
            /*             "name" => "bite", */
            /*             "divisions" => "1", */
            /*             "sold_price" => 10 */
            /*         ], */
            /*         [ */
            /*             "name" => "coctel", */
            /*             "divisions" => "1", */
            /*             "sold_price" => 15 */
            /*         ], */
            /*         [ */
            /*             "name" => "grande", */
            /*             "divisions" => "1", */
            /*             "sold_price" => 20 */
            /*         ] */
            /**/
            /*     ], */
            /*     'presentation' => [] */
            /* ], */
            // ================================================================================
            //  ======================== helados ================================
            /* [ */
            /*     'name' => "granizado de setas", */
            /*     'menu_category' => "ice_cream", */
            /*     'presentation' => [ */
            /*         [ */
            /*             "name" => "simple", */
            /*             "equivalence" => "2 esferas de helado", */
            /*             "price" => 12 */
            /*         ], */
            /*         [ */
            /*             "name" => "doble", */
            /*             "equivalence" => "4 esferas de helado", */
            /*             "price" => 18 */
            /*         ], */
            /*         [ */
            /*             "name" => "triple", */
            /*             "equivalence" => "8 esferas de helado", */
            /*             "price" => 25 */
            /*         ], */
            /*         [ */
            /*             "name" => "medio kilo", */
            /*             "equivalence" => "esferas de helado", */
            /*             "price" => 50 */
            /*         ], */
            /*         [ */
            /*             "name" => "kilo", */
            /*             "equivalence" => "2 esferas de helado", */
            /*             "price" => 100 */
            /*         ] */
            /*     ] */
            /* ], */
            /**/
            /* [ */
            /*     'name' => "algarrobo", */
            /*     'menu_category' => "ice_cream", */
            /*     'presentation' => [ */
            /*         [ */
            /*             "name" => "simple", */
            /*             "equivalence" => "2 esferas de helado", */
            /*             "price" => 12 */
            /*         ], */
            /*         [ */
            /*             "name" => "doble", */
            /*             "equivalence" => "4 esferas de helado", */
            /*             "price" => 18 */
            /*         ], */
            /*         [ */
            /*             "name" => "triple", */
            /*             "equivalence" => "8 esferas de helado", */
            /*             "price" => 25 */
            /*         ], */
            /*         [ */
            /*             "name" => "medio kilo", */
            /*             "equivalence" => "esferas de helado", */
            /*             "price" => 50 */
            /*         ], */
            /*         [ */
            /*             "name" => "kilo", */
            /*             "equivalence" => "2 esferas de helado", */
            /*             "price" => 100 */
            /*         ] */
            /*     ] */
            /* ], */
            /**/
            /* [ */
            /*     'name' => "zucchini", */
            /*     'menu_category' => "ice_cream", */
            /*     'presentation' => [ */
            /*         [ */
            /*             "name" => "simple", */
            /*             "equivalence" => "2 esferas de helado", */
            /*             "price" => 12 */
            /*         ], */
            /*         [ */
            /*             "name" => "doble", */
            /*             "equivalence" => "4 esferas de helado", */
            /*             "price" => 18 */
            /*         ], */
            /*         [ */
            /*             "name" => "triple", */
            /*             "equivalence" => "8 esferas de helado", */
            /*             "price" => 25 */
            /*         ], */
            /*         [ */
            /*             "name" => "medio kilo", */
            /*             "equivalence" => "esferas de helado", */
            /*             "price" => 50 */
            /*         ], */
            /*         [ */
            /*             "name" => "kilo", */
            /*             "equivalence" => "2 esferas de helado", */
            /*             "price" => 100 */
            /*         ] */
            /*     ] */
            /* ], */
            /**/
            /* [ */
            /*     'name' => "espirulina", */
            /*     'menu_category' => "ice_cream", */
            /*     'presentation' => [ */
            /*         [ */
            /*             "name" => "simple", */
            /*             "equivalence" => "2 esferas de helado", */
            /*             "price" => 12 */
            /*         ], */
            /*         [ */
            /*             "name" => "doble", */
            /*             "equivalence" => "4 esferas de helado", */
            /*             "price" => 18 */
            /*         ], */
            /*         [ */
            /*             "name" => "triple", */
            /*             "equivalence" => "8 esferas de helado", */
            /*             "price" => 25 */
            /*         ], */
            /*         [ */
            /*             "name" => "medio kilo", */
            /*             "equivalence" => "esferas de helado", */
            /*             "price" => 50 */
            /*         ], */
            /*         [ */
            /*             "name" => "kilo", */
            /*             "equivalence" => "2 esferas de helado", */
            /*             "price" => 100 */
            /*         ] */
            /*     ] */
            /* ], */
            /**/
            /* [ */
            /*     'name' => "blueberry", */
            /*     'menu_category' => "ice_cream", */
            /*     'presentation' => [ */
            /*         [ */
            /*             "name" => "simple", */
            /*             "equivalence" => "2 esferas de helado", */
            /*             "price" => 12 */
            /*         ], */
            /*         [ */
            /*             "name" => "doble", */
            /*             "equivalence" => "4 esferas de helado", */
            /*             "price" => 18 */
            /*         ], */
            /*         [ */
            /*             "name" => "triple", */
            /*             "equivalence" => "8 esferas de helado", */
            /*             "price" => 25 */
            /*         ], */
            /*         [ */
            /*             "name" => "medio kilo", */
            /*             "equivalence" => "esferas de helado", */
            /*             "price" => 50 */
            /*         ], */
            /*         [ */
            /*             "name" => "kilo", */
            /*             "equivalence" => "2 esferas de helado", */
            /*             "price" => 100 */
            /*         ] */
            /*     ] */
            /* ], */
            /**/
            /* [ */
            /*     'name' => "chirimoya", */
            /*     'menu_category' => "ice_cream", */
            /*     'presentation' => [ */
            /*         [ */
            /*             "name" => "simple", */
            /*             "equivalence" => "2 esferas de helado", */
            /*             "price" => 12 */
            /*         ], */
            /*         [ */
            /*             "name" => "doble", */
            /*             "equivalence" => "4 esferas de helado", */
            /*             "price" => 18 */
            /*         ], */
            /*         [ */
            /*             "name" => "triple", */
            /*             "equivalence" => "8 esferas de helado", */
            /*             "price" => 25 */
            /*         ], */
            /*         [ */
            /*             "name" => "medio kilo", */
            /*             "equivalence" => "esferas de helado", */
            /*             "price" => 50 */
            /*         ], */
            /*         [ */
            /*             "name" => "kilo", */
            /*             "equivalence" => "2 esferas de helado", */
            /*             "price" => 100 */
            /*         ] */
            /*     ] */
            /* ], */
            /**/
            /* [ */
            /*     'name' => "maracuya", */
            /*     'menu_category' => "ice_cream", */
            /*     'presentation' => [ */
            /*         [ */
            /*             "name" => "simple", */
            /*             "equivalence" => "2 esferas de helado", */
            /*             "price" => 12 */
            /*         ], */
            /*         [ */
            /*             "name" => "doble", */
            /*             "equivalence" => "4 esferas de helado", */
            /*             "price" => 18 */
            /*         ], */
            /*         [ */
            /*             "name" => "triple", */
            /*             "equivalence" => "8 esferas de helado", */
            /*             "price" => 25 */
            /*         ], */
            /*         [ */
            /*             "name" => "medio kilo", */
            /*             "equivalence" => "esferas de helado", */
            /*             "price" => 50 */
            /*         ], */
            /*         [ */
            /*             "name" => "kilo", */
            /*             "equivalence" => "2 esferas de helado", */
            /*             "price" => 100 */
            /*         ] */
            /*     ] */
            /* ], */
            /**/
            /* [ */
            /*     'name' => "guayaba", */
            /*     'menu_category' => "ice_cream", */
            /*     'presentation' => [ */
            /*         [ */
            /*             "name" => "simple", */
            /*             "equivalence" => "2 esferas de helado", */
            /*             "price" => 12 */
            /*         ], */
            /*         [ */
            /*             "name" => "doble", */
            /*             "equivalence" => "4 esferas de helado", */
            /*             "price" => 18 */
            /*         ], */
            /*         [ */
            /*             "name" => "triple", */
            /*             "equivalence" => "8 esferas de helado", */
            /*             "price" => 25 */
            /*         ], */
            /*         [ */
            /*             "name" => "medio kilo", */
            /*             "equivalence" => "esferas de helado", */
            /*             "price" => 50 */
            /*         ], */
            /*         [ */
            /*             "name" => "kilo", */
            /*             "equivalence" => "2 esferas de helado", */
            /*             "price" => 100 */
            /*         ] */
            /*     ] */
            /* ], */
            /**/
            /* [ */
            /*     'name' => "copoazu", */
            /*     'menu_category' => "ice_cream", */
            /*     'presentation' => [ */
            /*         [ */
            /*             "name" => "simple", */
            /*             "equivalence" => "2 esferas de helado", */
            /*             "price" => 12 */
            /*         ], */
            /*         [ */
            /*             "name" => "doble", */
            /*             "equivalence" => "4 esferas de helado", */
            /*             "price" => 18 */
            /*         ], */
            /*         [ */
            /*             "name" => "triple", */
            /*             "equivalence" => "8 esferas de helado", */
            /*             "price" => 25 */
            /*         ], */
            /*         [ */
            /*             "name" => "medio kilo", */
            /*             "equivalence" => "esferas de helado", */
            /*             "price" => 50 */
            /*         ], */
            /*         [ */
            /*             "name" => "kilo", */
            /*             "equivalence" => "2 esferas de helado", */
            /*             "price" => 100 */
            /*         ] */
            /*     ] */
            /* ], */
            /**/
            /* [ */
            /*     'name' => "oreo", */
            /*     'menu_category' => "ice_cream", */
            /*     'presentation' => [ */
            /*         [ */
            /*             "name" => "simple", */
            /*             "equivalence" => "2 esferas de helado", */
            /*             "price" => 12 */
            /*         ], */
            /*         [ */
            /*             "name" => "doble", */
            /*             "equivalence" => "4 esferas de helado", */
            /*             "price" => 18 */
            /*         ], */
            /*         [ */
            /*             "name" => "triple", */
            /*             "equivalence" => "8 esferas de helado", */
            /*             "price" => 25 */
            /*         ], */
            /*         [ */
            /*             "name" => "medio kilo", */
            /*             "equivalence" => "esferas de helado", */
            /*             "price" => 50 */
            /*         ], */
            /*         [ */
            /*             "name" => "kilo", */
            /*             "equivalence" => "2 esferas de helado", */
            /*             "price" => 100 */
            /*         ] */
            /*     ] */
            /* ], */
            /**/
            /* [ */
            /*     'name' => "chocolate", */
            /*     'menu_category' => "ice_cream", */
            /*     'presentation' => [ */
            /*         [ */
            /*             "name" => "simple", */
            /*             "equivalence" => "2 esferas de helado", */
            /*             "price" => 12 */
            /*         ], */
            /*         [ */
            /*             "name" => "doble", */
            /*             "equivalence" => "4 esferas de helado", */
            /*             "price" => 18 */
            /*         ], */
            /*         [ */
            /*             "name" => "triple", */
            /*             "equivalence" => "8 esferas de helado", */
            /*             "price" => 25 */
            /*         ], */
            /*         [ */
            /*             "name" => "medio kilo", */
            /*             "equivalence" => "esferas de helado", */
            /*             "price" => 50 */
            /*         ], */
            /*         [ */
            /*             "name" => "kilo", */
            /*             "equivalence" => "2 esferas de helado", */
            /*             "price" => 100 */
            /*         ] */
            /*     ] */
            /* ], */
            /**/
            /* [ */
            /*     'name' => "limon", */
            /*     'menu_category' => "ice_cream", */
            /*     'presentation' => [ */
            /*         [ */
            /*             "name" => "simple", */
            /*             "equivalence" => "2 esferas de helado", */
            /*             "price" => 12 */
            /*         ], */
            /*         [ */
            /*             "name" => "doble", */
            /*             "equivalence" => "4 esferas de helado", */
            /*             "price" => 18 */
            /*         ], */
            /*         [ */
            /*             "name" => "triple", */
            /*             "equivalence" => "8 esferas de helado", */
            /*             "price" => 25 */
            /*         ], */
            /*         [ */
            /*             "name" => "medio kilo", */
            /*             "equivalence" => "esferas de helado", */
            /*             "price" => 50 */
            /*         ], */
            /*         [ */
            /*             "name" => "kilo", */
            /*             "equivalence" => "2 esferas de helado", */
            /*             "price" => 100 */
            /*         ] */
            /*     ] */
            /* ], */
            /**/
            /* [ */
            /*     'name' => "frutilla", */
            /*     'menu_category' => "ice_cream", */
            /*     'presentation' => [ */
            /*         [ */
            /*             "name" => "simple", */
            /*             "equivalence" => "2 esferas de helado", */
            /*             "price" => 12 */
            /*         ], */
            /*         [ */
            /*             "name" => "doble", */
            /*             "equivalence" => "4 esferas de helado", */
            /*             "price" => 18 */
            /*         ], */
            /*         [ */
            /*             "name" => "triple", */
            /*             "equivalence" => "8 esferas de helado", */
            /*             "price" => 25 */
            /*         ], */
            /*         [ */
            /*             "name" => "medio kilo", */
            /*             "equivalence" => "esferas de helado", */
            /*             "price" => 50 */
            /*         ], */
            /*         [ */
            /*             "name" => "kilo", */
            /*             "equivalence" => "2 esferas de helado", */
            /*             "price" => 100 */
            /*         ] */
            /*     ] */
            /* ], */
            /**/
            /* [ */
            /*     'name' => "tumbo", */
            /*     'menu_category' => "ice_cream", */
            /*     'presentation' => [ */
            /*         [ */
            /*             "name" => "simple", */
            /*             "equivalence" => "2 esferas de helado", */
            /*             "price" => 12 */
            /*         ], */
            /*         [ */
            /*             "name" => "doble", */
            /*             "equivalence" => "4 esferas de helado", */
            /*             "price" => 18 */
            /*         ], */
            /*         [ */
            /*             "name" => "triple", */
            /*             "equivalence" => "8 esferas de helado", */
            /*             "price" => 25 */
            /*         ], */
            /*         [ */
            /*             "name" => "medio kilo", */
            /*             "equivalence" => "esferas de helado", */
            /*             "price" => 50 */
            /*         ], */
            /*         [ */
            /*             "name" => "kilo", */
            /*             "equivalence" => "2 esferas de helado", */
            /*             "price" => 100 */
            /*         ] */
            /*     ] */
            /* ] */


            [
                'name' => "Torta de red velvet",
                'menu_category' => "cakes_and_pastries",
                'type_product' => 'simple',
                "variant" => [
                    [
                        "name" => "mediana",
                        "divisions" => "1",
                        "sold_price" => 100,
                        "presentation" => []
                    ],
                    [
                        "name" => "pequena",
                        "divisions" => "1",
                        "sold_price" => 50,
                        "presentation" => []
                    ],
                    [
                        "name" => "familiar",
                        "divisions" => "1",
                        "sold_price" => 150,
                        "presentation" => [
                            [
                                "portion_name" => "porcion",
                                "price" => 15,
                                "consumed_division" => 1
                            ]
                        ]
                    ]
                ]
            ],

            [
                'name' => "Torta de chocolate",
                'type_product' => 'simple',
                'menu_category' => "cakes_and_pastries",
                "variant" => [
                    [
                        "name" => "mediana",
                        "divisions" => "1",
                        "sold_price" => 100,
                        "presentation" => []
                    ],
                    [
                        "name" => "pequena",
                        "divisions" => "1",
                        "sold_price" => 50,
                        "presentation" => []
                    ],
                    [
                        "name" => "familiar",
                        "divisions" => "1",
                        "sold_price" => 150,
                        "presentation" => [
                            [
                                "portion_name" => "porcion",
                                "price" => 15,
                                "consumed_division" => 1
                            ]
                        ]
                    ]
                ]
            ],

            [
                'name' => "Torta de zanahoria",
                'type_product' => 'simple',
                'menu_category' => "cakes_and_pastries",
                "variant" => [
                    [
                        "name" => "mediana",
                        "divisions" => "1",
                        "sold_price" => 100,
                        "presentation" => []
                    ],
                    [
                        "name" => "pequena",
                        "divisions" => "1",
                        "sold_price" => 50,
                        "presentation" => []
                    ],
                    [
                        "name" => "familiar",
                        "divisions" => "1",
                        "sold_price" => 150,
                        "presentation" => [
                            [
                                "portion_name" => "porcion",
                                "price" => 15,
                                "consumed_division" => 1
                            ]
                        ]
                    ]
                ]
            ],

            [
                'name' => "Brookie con helado",
                'type_product' => 'simple',
                'menu_category' => "cakes_and_pastries",
                "variant" => [
                    [
                        "name" => "mediana",
                        "divisions" => "1",
                        "sold_price" => 100,
                        "presentation" => []
                    ],
                    [
                        "name" => "pequena",
                        "divisions" => "1",
                        "sold_price" => 50,
                        "presentation" => []
                    ],
                    [
                        "name" => "familiar",
                        "divisions" => "1",
                        "sold_price" => 150,
                        "presentation" => [
                            [
                                "portion_name" => "porcion",
                                "price" => 15,
                                "consumed_division" => 1
                            ]
                        ]
                    ]
                ]
            ],

            [
                'name' => "cheesecake de frutos rojos",
                'type_product' => 'simple',
                'menu_category' => "cakes_and_pastries",
                "variant" => [
                    [
                        "name" => "mediana",
                        "divisions" => "1",
                        "sold_price" => 100,
                        "presentation" => []
                    ],
                    [
                        "name" => "pequena",
                        "divisions" => "1",
                        "sold_price" => 50,
                        "presentation" => []
                    ],
                    [
                        "name" => "familiar",
                        "divisions" => "1",
                        "sold_price" => 150,
                        "presentation" => [
                            [
                                "portion_name" => "porcion",
                                "price" => 15,
                                "consumed_division" => 1
                            ]
                        ]
                    ]
                ]
            ],

            [
                'name' => "cheesecake de maracuya",
                'type_product' => 'simple',
                'menu_category' => "cakes_and_pastries",
                "variant" => [
                    [
                        "name" => "mediana",
                        "divisions" => "1",
                        "sold_price" => 100,
                        "presentation" => []
                    ],
                    [
                        "name" => "pequena",
                        "divisions" => "1",
                        "sold_price" => 50,
                        "presentation" => []
                    ],
                    [
                        "name" => "familiar",
                        "divisions" => "1",
                        "sold_price" => 150,
                        "presentation" => [
                            [
                                "portion_name" => "porcion",
                                "price" => 15,
                                "consumed_division" => 1
                            ]
                        ]
                    ]
                ]
            ],

            [
                'name' => "croissant salado",
                'type_product' => 'simple',
                'menu_category' => "cakes_and_pastries",
                "variant" => [
                    [
                        "name" => "mediana",
                        "divisions" => "1",
                        "sold_price" => 100,
                        "presentation" => []
                    ],
                    [
                        "name" => "pequena",
                        "divisions" => "1",
                        "sold_price" => 50,
                        "presentation" => []
                    ],
                    [
                        "name" => "familiar",
                        "divisions" => "1",
                        "sold_price" => 150,
                        "presentation" => [
                            [
                                "portion_name" => "porcion",
                                "price" => 15,
                                "consumed_division" => 1
                            ]
                        ]
                    ]
                ]
            ],

            [
                'name' => "croissant dulce",
                'type_product' => 'simple',
                'menu_category' => "cakes_and_pastries",
                "variant" => [
                    [
                        "name" => "mediana",
                        "divisions" => "1",
                        "sold_price" => 100,
                        "presentation" => []
                    ],
                    [
                        "name" => "pequena",
                        "divisions" => "1",
                        "sold_price" => 50,
                        "presentation" => []
                    ],
                    [
                        "name" => "familiar",
                        "divisions" => "1",
                        "sold_price" => 150,
                        "presentation" => [
                            [
                                "portion_name" => "porcion",
                                "price" => 15,
                                "consumed_division" => 1
                            ]
                        ]
                    ]
                ]
            ],

            [
                'name' => "panqueque americano",
                'type_product' => 'simple',
                'menu_category' => "cakes_and_pastries",
                "variant" => [
                    [
                        "name" => "mediana",
                        "divisions" => "1",
                        "sold_price" => 100,
                        "presentation" => []
                    ],
                    [
                        "name" => "pequena",
                        "divisions" => "1",
                        "sold_price" => 50,
                        "presentation" => []
                    ],
                    [
                        "name" => "familiar",
                        "divisions" => "1",
                        "sold_price" => 150,
                        "presentation" => [
                            [
                                "portion_name" => "porcion",
                                "price" => 15,
                                "consumed_division" => 1
                            ]
                        ]
                    ]
                ]
            ],

            [
                'name' => "parfait de frutas",
                'type_product' => 'simple',
                'menu_category' => "cakes_and_pastries",
                "variant" => [
                    [
                        "name" => "mediana",
                        "divisions" => "1",
                        "sold_price" => 100,
                        "presentation" => []
                    ],
                    [
                        "name" => "pequena",
                        "divisions" => "1",
                        "sold_price" => 50,
                        "presentation" => []
                    ],
                    [
                        "name" => "familiar",
                        "divisions" => "1",
                        "sold_price" => 150,
                        "presentation" => [
                            [
                                "portion_name" => "porcion",
                                "price" => 15,
                                "consumed_division" => 1
                            ]
                        ]
                    ]
                ]
            ],

            [
                'name' => "pan con chocolate",
                'type_product' => 'simple',
                'menu_category' => "cakes_and_pastries",
                "variant" => [
                    [
                        "name" => "mediana",
                        "divisions" => "1",
                        "sold_price" => 100,
                        "presentation" => []
                    ],
                    [
                        "name" => "pequena",
                        "divisions" => "1",
                        "sold_price" => 50,
                        "presentation" => []
                    ],
                    [
                        "name" => "familiar",
                        "divisions" => "1",
                        "sold_price" => 150,
                        "presentation" => [
                            [
                                "portion_name" => "porcion",
                                "price" => 15,
                                "consumed_division" => 1
                            ]
                        ]
                    ]

                ],
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
                "menu_category_id" => $foundCategory->id,
                "type_product" => $product['type_product']
            ]);

            foreach ($product['variant'] as $presentation) {
                $newVariant = MenuProductVariant::create([
                    "menu_product_id" => $newProduct->id,
                    "name" =>  $presentation['name'],
                    "divisions" => $presentation['divisions'],
                    "sold_price" => $presentation['sold_price'],
                ]);

                if (isset($presentation['presentation'])) {
                    foreach ($presentation['presentation'] as $type_sold) {
                        MenuProductPortions::create([
                            'menu_product_variant_id' => $newVariant->id,
                            'portion_name' => $type_sold['portion_name'],
                            'price' => $type_sold['price'],
                            'consumed_division' => $type_sold['consumed_division'],
                        ]);
                    }
                }
            }
        }
    }
}
