<?php

namespace Modules\Products\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\HumanResources\Models\Brand;
use Modules\Products\Models\Category;
use Modules\Products\Models\Color;
use Modules\Products\Models\Material;
use Modules\Products\Models\Product;
use Modules\Products\Models\ProductVariant;
use Modules\Products\Models\Size;
use Modules\Products\Models\Style;
use Modules\Products\Models\Tag;

class ProductsSeeder extends Seeder
{
    public function run(): void
    {
        // Insertar 5 productos calzados
        // 5 productos de hormas
        // 5 productos de hilos
        // 5 productos de cartones
        // 5 productos de pegamentos
        // debemos saber si es para hombre o mujer la talla , para devolverle los datos
        $products = [
            [
                "name" => "Runner Pro",
                "category" => "Hormas",
                "styles" => ["Deportivo", "Casual"],
                "tags" => ["Nuevo", "Running", "Confort"],
                "variant" => "Negro/Rojo",
                "gender" => "male",
                "brand" => "Nike",
                "suggest_price_sold" => "450",
                "presentation" => "Both",
                "weight" => "850",
                "tickness" => "2.5",
                "details" => "Calzado deportivo para entrenamiento diario.",
                "materials" => ["Malla", "EVA", "Goma"],
                "colors" => ["Negro", "Rojo"],
                "sizes" => ["39", "40", "41", "42"],
                "hasVariants" => true,
            ],
            [
                "name" => "Urban Classic",
                "category" => "Hormas",
                "styles" => ["Casual", "Streetwear"],
                "tags" => ["Más Vendido", "Casual"],
                "variant" => "Blanco",
                "gender" => "female",
                "brand" => "Adidas",
                "suggest_price_sold" => "390",
                "presentation" => "Both",
                "weight" => "760",
                "tickness" => "2.3",
                "details" => "Calzado casual para uso diario.",
                "materials" => ["Cuero Sintético", "Goma"],
                "colors" => ["Blanco"],
                "sizes" => ["36", "37", "38", "39"],
                "hasVariants" => true,
            ],
            [
                "name" => "Executive Oxford",
                "category" => "Hormas",
                "styles" => ["Formal"],
                "tags" => ["Premium"],
                "variant" => "Cuero Negro",
                "gender" => "male",
                "brand" => "Puma",
                "suggest_price_sold" => "680",
                "presentation" => "Both",
                "weight" => "950",
                "tickness" => "3.0",
                "details" => "Zapato formal de cuero.",
                "materials" => ["Cuero"],
                "colors" => ["Negro"],
                "sizes" => ["40", "41", "42", "43"],
                "hasVariants" => false,
            ],

            // =========================
            // HORMAS
            // =========================
            [
                "name" => "Horma Caballero 40",
                "category" => "Hormas",
                "styles" => [],
                "tags" => [],
                "variant" => "Madera",
                "gender" => "male",
                "brand" => "Converse",
                "suggest_price_sold" => "120",
                "presentation" => "Unit",
                "weight" => "650",
                "tickness" => "0",
                "details" => "Horma de madera para fabricación de calzado.",
                "materials" => ["PVC"],
                "colors" => [],
                "sizes" => ["40"],
                "hasVariants" => false,
            ],
            [
                "name" => "Horma Dama 37",
                "category" => "Hormas",
                "styles" => [],
                "tags" => [],
                "variant" => "Plástico",
                "gender" => "female",
                "brand" => "Vans",
                "suggest_price_sold" => "95",
                "presentation" => "Unit",
                "weight" => "420",
                "tickness" => "0",
                "details" => "Horma plástica para calzado femenino.",
                "materials" => ["PVC"],
                "colors" => [],
                "sizes" => ["37"],
                "hasVariants" => false,
            ],
            [
                "name" => "Horma Infantil 30",
                "category" => "Hormas",
                "styles" => [],
                "tags" => [],
                "variant" => "Madera",
                "gender" => "both",
                "brand" => "Timberland",
                "suggest_price_sold" => "80",
                "presentation" => "Unit",
                "weight" => "300",
                "tickness" => "0",
                "details" => "Horma para calzado infantil.",
                "materials" => ["PVC"],
                "colors" => [],
                "sizes" => [],
                "hasVariants" => false,
            ],

            // =========================
            // CARTONES
            // =========================
            [
                "name" => "Cartón Plantilla 1.5 mm",
                "category" => "Cartones",
                "styles" => [],
                "tags" => [],
                "variant" => "1.5 mm",
                "gender" => "none",
                "brand" => "Converse",
                "suggest_price_sold" => "15",
                "presentation" => "Sheet",
                "weight" => "250",
                "tickness" => "1.5",
                "details" => "Cartón para fabricación de plantillas.",
                "materials" => [],
                "colors" => ["Beige"],
                "sizes" => [],
                "hasVariants" => false,
            ],
            [
                "name" => "Cartón Contrafuerte",
                "category" => "Cartones",
                "styles" => [],
                "tags" => [],
                "variant" => "2 mm",
                "gender" => "none",
                "brand" => "Converse",
                "suggest_price_sold" => "18",
                "presentation" => "Sheet",
                "weight" => "320",
                "tickness" => "2.0",
                "details" => "Cartón rígido para contrafuertes.",
                "materials" => [],
                "colors" => ["Camel"],
                "sizes" => [],
                "hasVariants" => false,
            ],
            [
                "name" => "Cartón Punta",
                "category" => "Cartones",
                "styles" => [],
                "tags" => [],
                "variant" => "1.8 mm",
                "gender" => "none",
                "brand" => "Puma",
                "suggest_price_sold" => "16",
                "presentation" => "Sheet",
                "weight" => "280",
                "tickness" => "1.8",
                "details" => "Cartón para punteras.",
                "materials" => [],
                "colors" => ["Crema"],
                "sizes" => [],
                "hasVariants" => false,
            ],

            // =========================
            // HILOS
            // =========================
            [
                "name" => "Hilo Nylon Nº20",
                "category" => "Hilos",
                "styles" => [],
                "tags" => ["Premium"],
                "variant" => "Negro",
                "gender" => "none",
                "brand" => "Puma",
                "suggest_price_sold" => "35",
                "presentation" => "Roll",
                "weight" => "200",
                "tickness" => "0.8",
                "details" => "Hilo de nylon para costura de calzado.",
                "materials" => ["Textil"],
                "colors" => ["Negro"],
                "sizes" => [],
                "hasVariants" => true,
            ],
            [
                "name" => "Hilo Poliéster Nº30",
                "category" => "Hilos",
                "styles" => [],
                "tags" => [],
                "variant" => "Blanco",
                "gender" => "none",
                "brand" => "Puma",
                "suggest_price_sold" => "30",
                "presentation" => "Roll",
                "weight" => "180",
                "tickness" => "0.7",
                "details" => "Hilo resistente para aparado.",
                "materials" => ["Textil"],
                "colors" => ["Blanco"],
                "sizes" => [],
                "hasVariants" => true,
            ],
            [
                "name" => "Hilo Encerado",
                "category" => "Hilos",
                "styles" => [],
                "tags" => [],
                "variant" => "Marrón",
                "gender" => "none",
                "brand" => "Puma",
                "suggest_price_sold" => "40",
                "presentation" => "Roll",
                "weight" => "220",
                "tickness" => "1.0",
                "details" => "Hilo encerado para costuras decorativas.",
                "materials" => ["Textil"],
                "colors" => ["Marrón"],
                "sizes" => [],
                "hasVariants" => true,
            ],

            // =========================
            // PEGAMENTOS
            // =========================
            [
                "name" => "Pegamento de Contacto",
                "category" => "Pegamentos",
                "styles" => [],
                "tags" => ["Más Vendido"],
                "variant" => "500 ml",
                "gender" => "none",
                "brand" => "Puma",
                "suggest_price_sold" => "65",
                "presentation" => "Bottle",
                "weight" => "500",
                "tickness" => "0",
                "details" => "Pegamento para cuero y goma.",
                "materials" => [],
                "colors" => [],
                "sizes" => [],
                "hasVariants" => false,
            ],
            [
                "name" => "Pegamento PU",
                "category" => "Pegamentos",
                "styles" => [],
                "tags" => ["Premium"],
                "variant" => "1 Litro",
                "gender" => "none",
                "brand" => "Puma",
                "suggest_price_sold" => "120",
                "presentation" => "Bottle",
                "weight" => "1000",
                "tickness" => "0",
                "details" => "Adhesivo de poliuretano para calzado.",
                "materials" => [],
                "colors" => [],
                "sizes" => [],
                "hasVariants" => false,
            ],
            [
                "name" => "Pegamento Instantáneo",
                "category" => "Pegamentos",
                "styles" => [],
                "tags" => [],
                "variant" => "50 ml",
                "gender" => "none",
                "brand" => "Puma",
                "suggest_price_sold" => "25",
                "presentation" => "Bottle",
                "weight" => "50",
                "tickness" => "0",
                "details" => "Adhesivo de secado rápido.",
                "materials" => [],
                "colors" => [],
                "sizes" => [],
                "hasVariants" => false,
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

            $newVariant = ProductVariant::create([
                'product_id' => $newProduct->id,
                'name' => $product['variant'],
                'sold_suggest' => $product['suggest_price_sold'],
            ]);
            // recuperar los id de styles , colors, materials, sizes,
            $colorsIds = [];
            $materialsIds = [];
            $sizesIds = [];
            $stylesIds = [];
            $tagsIds = [];
            foreach ($product['colors'] as $color) {
                $foundColor = Color::where('name', $color)->value('id');
                $colorsIds[] = $foundColor;
            }
            foreach ($product['materials'] as $material) {
                $foundMaterial = Material::where('name', $material)->value('id');
                $materialsIds[] = $foundMaterial;
            }
            foreach ($product['styles'] as $style) {
                $foundStyle = Style::where('name', $style)->value('id');
                $stylesIds[] = $foundStyle;
            }
            foreach ($product['sizes'] as $size) {
                $foundSize = Size::where('size', $size)->value('id');
                $sizesIds[] = $foundSize;
            }
            foreach ($product['tags'] as $tag) {
                $foundTag = Tag::where('name', $tag)->value('id');
                $tagsIds[] = $foundTag;
            }
            $newVariant->sizes()->attach($sizesIds);
            $newProduct->materials()->attach($materialsIds);
            $newProduct->colors()->attach($colorsIds);
            $newProduct->styles()->attach($stylesIds);
            $newVariant->tags()->attach($tagsIds);
        }
    }
}
