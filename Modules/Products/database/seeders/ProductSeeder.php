<?php

namespace Modules\Products\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\HumanResources\Models\Brand;
use Modules\Products\Models\Category;
use Modules\Products\Models\ComponentProduct;
use Modules\Products\Models\Material;
use Modules\Products\Models\Presentation;
use Modules\Products\Models\Product;
use Modules\Products\Models\Specification;
use Modules\Products\Models\UnitType;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            // seccion guatos
            [
                'name' => 'guato',
                'gender' => 'none',
                'brand' => 'Adidas',
                'variant' => '80cm',
                'category' => 'guatos',
                'sold_suggest' => 1,
                'composition' => [
                    [
                        'name' => 'producto',
                        'material' => 'algodon'
                    ],
                ],
                'specifications' => [
                    'name' => 'tamano',
                    'unit_type' => 'Centímetro',
                    'amount' => '80'
                ]
            ],
            [
                'name' => 'guato',
                'gender' => 'none',
                'brand' => 'Adidas',
                'variant' => '50cm',
                'category' => 'guatos',
                'sold_suggest' => 0.50,
                'composition' => [
                    [
                        'name' => 'producto',
                        'material' => 'algodon'
                    ],
                ],
                'specifications' => [
                    'name' => 'tamano',
                    'unit_type' => 'Centímetro',
                    'amount' => '50'
                ]
            ],
            [
                'name' => 'bontex',
                'gender' => 'none',
                'brand' => 'Nike',
                'variant' => null,
                'category' => 'cartones',
                'sold_suggest' => 40,
                'composition' => [
                    [
                        'name' => 'producto',
                        'material' => 'Malla'
                    ],
                ],
                'specifications' => [
                    'name' => 'largo',
                    'unit_type' => 'Metro',
                    'amount' => '1.50'
                ]
            ],
            [
                'name' => 'Pasta',
                'gender' => 'none',
                'brand' => 'Nike', // killing
                'variant' => 'Grande',
                'category' => 'pegamentos',
                'sold_suggest' => 360,
                'composition' => [
                    [
                        'name' => 'envoltorio',
                        'material' => 'aluminio'
                    ],


                ],
                'specifications' => [
                    'name' => 'peso',
                    'unit_type' => 'Kilogramo',
                    'amount' => '3'
                ]
            ],
            [
                'name' => 'Pasta',
                'gender' => 'none',
                'brand' => 'Nike', // killing
                'variant' => 'Mediana',
                'category' => 'pegamentos',
                'sold_suggest' => 180,
                'composition' => [
                    [
                        'name' => 'envoltorio',
                        'material' => 'aluminio'
                    ],


                ],
                'specifications' => [
                    'name' => 'peso',
                    'unit_type' => 'Kilogramo',
                    'amount' => '1.5'
                ]
            ],
            [
                'name' => 'Pasta',
                'gender' => 'none',
                'brand' => 'Nike', // killing
                'variant' => 'pequeno',
                'category' => 'pegamentos',
                'sold_suggest' => 120,
                'composition' => [
                    [
                        'name' => 'envoltorio',
                        'material' => 'aluminio'
                    ],
                ],
                'specifications' => [
                    'name' => 'peso',
                    'unit_type' => 'Kilogramo',
                    'amount' => '1'
                ]
            ],
            [
                'name' => 'Clefa Fuerte',
                'gender' => 'none',
                'brand' => 'Kisafix', // killing
                'variant' => 'Grande',
                'category' => 'pegamentos',
                'sold_suggest' => 700,
                'composition' => [
                    [
                        'name' => 'envoltorio',
                        'material' => 'aluminio'
                    ],
                ],
                'specifications' => [
                    'name' => 'peso',
                    'unit_type' => 'Kilogramo',
                    'amount' => '5'
                ]

            ],
            [
                'name' => 'Timberland',
                'gender' => 'none',
                'brand' => 'Adidas', // killing
                'variant' => 'juvenil',
                'category' => 'hormas',
                'sold_suggest' => 120,
                'composition' => [
                    [
                        'name' => 'producto',
                        'material' => 'plastico'
                    ],
                ],
                'specifications' => [
                    'name' => 'peso',
                    'unit_type' => 'Kilogramo',
                    'amount' => '1'
                ]
            ],
            [
                'name' => 'Mocasin',
                'gender' => 'none',
                'brand' => 'Adidas', // killing
                'variant' => 'juvenil',

                'category' => 'plantas',
                'sold_suggest' => 30,
                'composition' => [
                    [
                        'name' => 'producto',
                        'material' => 'PVC'
                    ],
                ],
                'specifications' => [
                    'name' => 'peso',
                    'unit_type' => 'Gramo',
                    'amount' => '500'
                ]

            ],
        ];
        foreach ($products as $product) {
            $foundBrand = Brand::where('name', $product['brand'])->first();
            $foundCategory = Category::where('name', $product['category'])->first();
            $newProduct = Product::firstOrCreate([
                'gender' => $product['gender'],
                'brand_id' => $foundBrand->id,
                'name' => $product['name'],
                'category_id' => $foundCategory->id
            ]);

            $newPresentation = Presentation::create([
                'product_id' => $newProduct->id,
                'presentation' => $product['variant'],
                'sold_suggest' => $product['sold_suggest']
            ]);

            $specification = $product['specifications'];

            $foundUnitType = UnitType::where('name', $specification['unit_type'])->first();

            Specification::create([
                'presentation_id' => $newPresentation->id,
                'name' => $specification['name'],
                'amount' => $specification['amount'],
                'unit_type_id' => $foundUnitType->id
            ]);

            $compositions = $product['composition'];

            $cleanData = [];
            foreach ($compositions as $component) {
                $foundComponent = ComponentProduct::where('name', $component['name'])->first();
                $foundMaterial = Material::where('name', $component['material'])->first();
                $cleanData[] = [
                    'component_product_id' => $foundComponent->id,
                    'material_id' => $foundMaterial->id,
                    'description' => null
                ];
            }
            $newProduct->compositionProducts()->createMany($cleanData);
        }
    }
}
