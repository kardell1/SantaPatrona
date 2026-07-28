<?php

namespace Modules\Products\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Products\Models\Category;
use Modules\Products\Models\ComponentProduct;

class ComponentProductSeeder extends Seeder
{
    public function run(): void
    {
        // cada categoria puede tener un componentes especificados por tipo de categoria seleccionado
        // asi como planta es a vira
        $complements = [
            [
                'category' => 'plantas',
                'complements' => [
                    [
                        'name' => 'producto',
                        'description' => 'corresponde al producto fisico que vemos.'
                    ],
                    [
                        'name' => 'vira',
                        'description' => 'adorno que recorre a la planta'
                    ],
                    [
                        'name' => 'taco',
                        'description' => 'parte de la planta, agrega una base al producto'
                    ],
                ]
            ],
            [
                'category' => 'hilos',
                'complements' => [
                    [
                        'name' => 'producto',
                        'description' => 'corresponde al producto fisico que vemos.'
                    ],
                    [
                        'name' => 'carrete',
                        'description' => 'Corresponde a item en donde viene envuelto el hilo.'
                    ]
                ]
            ],
            [
                'category' => 'pegamentos',
                'complements' => [
                    [
                        'name' => 'producto',
                        'description' => 'corresponde al producto fisico que vemos.'
                    ],
                    [
                        'name' => 'envoltorio',
                        'description' => 'Corresponde al contenedor que contiene el producto'
                    ],
                ]
            ],
            [
                'category' => 'hormas',
                'complements' => [
                    [
                        'name' => 'producto',
                        'description' => 'corresponde al producto fisico que vemos.'
                    ],
                ]
            ],
            [
                'category' => 'guatos',
                'complements' => [
                    [
                        'name' => 'producto',
                        'description' => 'corresponde al producto fisico que vemos.'
                    ],
                    [
                        'name' => 'punta',
                        'description' => 'corresponde a la punta final de cada guato.'
                    ]
                ]
            ]
        ];
        foreach($complements as $category){
            $foundCategory = Category::where('name' , $category['category'])->first();

            $complementIds = [];
            foreach($category['complements'] as $complement){
                $foundComplement = ComponentProduct::firstOrCreate([
                    'name' => $complement['name'],
                    'description' => $complement['description']
                ]);
                $complementIds[] = $foundComplement->id;
            }
            $foundCategory->componentProducts()->attach($complementIds);
        }
    }
}
