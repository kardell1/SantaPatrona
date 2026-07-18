<?php

namespace Modules\Products\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\HumanResources\Models\Brand;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        $brands = [
            [
                'path' => null,
                'isActive' => true,
                'company_id' => 1,
                'description' => 'Marca de calzado deportivo',
                'name' => 'Nike',
            ],
            [
                'path' => null,
                'isActive' => true,
                'company_id' => 1,
                'description' => 'Marca de calzado deportivo y casual',
                'name' => 'Adidas',
            ],
            [
                'path' => null,
                'isActive' => true,
                'company_id' => 1,
                'description' => 'Marca de calzado deportivo',
                'name' => 'Puma',
            ],
            [
                'path' => null,
                'isActive' => true,
                'company_id' => 1,
                'description' => 'Marca de calzado deportivo',
                'name' => 'Reebok',
            ],
            [
                'path' => null,
                'isActive' => true,
                'company_id' => 1,
                'description' => 'Marca de calzado urbano y casual',
                'name' => 'Converse',
            ],
            [
                'path' => null,
                'isActive' => true,
                'company_id' => 1,
                'description' => 'Marca de calzado urbano',
                'name' => 'Vans',
            ],
            [
                'path' => null,
                'isActive' => true,
                'company_id' => 1,
                'description' => 'Marca de calzado casual y outdoor',
                'name' => 'Skechers',
            ],
            [
                'path' => null,
                'isActive' => true,
                'company_id' => 1,
                'description' => 'Marca de calzado deportivo',
                'name' => 'New Balance',
            ],
            [
                'path' => null,
                'isActive' => true,
                'company_id' => 1,
                'description' => 'Marca de botas y calzado resistente',
                'name' => 'Timberland',
            ],
            [
                'path' => null,
                'isActive' => true,
                'company_id' => 1,
                'description' => 'Marca de botas y calzado casual',
                'name' => 'Dr. Martens',
            ],
            [
                'path' => null,
                'isActive' => true,
                'company_id' => 1,
                'description' => 'Marca de botas y calzado casual',
                'name' => 'Ducati',
            ],
        ];
        foreach($brands as $brand){
            Brand::create($brand);
        }
    }
}
