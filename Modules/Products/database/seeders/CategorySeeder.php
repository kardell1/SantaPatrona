<?php

namespace Modules\Products\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Products\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            "Casuales",
            "Deportivos",
            "Running",
            "Entrenamiento",
            "Fútbol",
            "Baloncesto",
            "Senderismo",
            "Botas",
            "Botines",
            "Sandalias",
            "Pantuflas",
            "Mocasines",
            "Oxford",
            "Derby",
            "Tacones",
            "Bailarinas",
            "Alpargatas",
            "Zapatillas Urbanas",
            "Slip-On",
            "Seguridad Industrial"
        ];
        foreach($categories as $category){
            Category::create([ 'name' => $category , 'description' => null ]);
        }
    }
}
