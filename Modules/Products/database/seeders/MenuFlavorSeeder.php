<?php

namespace Modules\Products\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Products\Models\MenuFlavor;

class MenuFlavorSeeder extends Seeder
{
    public function run(): void
    {
        $data = [

            [
                "name" => "Frutilla",
                "description" => "Sabor dulce de frutilla fresca"
            ],

            [
                "name" => "Chocolate",
                "description" => "Sabor intenso a chocolate"
            ],

            [
                "name" => "Vainilla",
                "description" => "Sabor clásico de vainilla"
            ],

            [
                "name" => "Limón",
                "description" => "Sabor cítrico y refrescante"
            ],

            [
                "name" => "Menta",
                "description" => "Sabor fresco de menta"
            ],

            [
                "name" => "Coco",
                "description" => "Sabor tropical de coco"
            ],

            [
                "name" => "Caramelo",
                "description" => "Sabor dulce de caramelo"
            ],

            [
                "name" => "Maracuyá",
                "description" => "Sabor exótico de maracuyá"
            ],

            [
                "name" => "Naranja",
                "description" => "Sabor cítrico de naranja"
            ],

            [
                "name" => "Dulce de leche",
                "description" => "Sabor tradicional de dulce de leche"
            ],

        ];

        foreach ($data as $item) {
            MenuFlavor::create($item);
        }
    }
}
