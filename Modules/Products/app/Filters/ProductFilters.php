<?php

namespace Modules\Products\Filters;

class ProductFilters
{
    // product => name
    // product => category
    // product-variant => tag
    // product => color
    // product => material
    // product => style
    // product => brand
    // product-variant => price
    // product-variant => size
    public static function filters(): array
    {
        return [

            'name' => [
                'relation' => 'presentations',
                'callback' => fn ($query, $value) => $query->where('name', 'ilike', "%{$value}%"),
            ],

            'category' => [
                'relation' => 'category',
                'callback' => fn ($query, $value) => $query->whereHas('category', fn ($query) => $query->where('id', $value)),
            ],

            'tag' => [
                'relation' => 'presentations.tags',
                'callback' => fn ($query, $value) => $query->whereHas('presentations.tags', fn ($query) => $query->where('tag_id', $value)),
            ],

            /* 'color' => [ */
            /*     'relation' => 'colors', */
            /*     'callback' =>   fn($query, $value) => */
            /*     $query->whereHas('colors', fn($query) => $query->where('color_id', $value)), */
            /* ], */
            /**/
            'material' => [
                'relation' => 'compositionProducts.material',
                'callback' => fn ($query, $value) => $query->whereHas('material', fn ($query) => $query->where('material_id', $value)),
            ],

            'style' => [
                'relation' => 'styles',
                'callback' => fn ($query, $value) => $query->whereHas('styles', fn ($query) => $query->where('style_id', $value)),
            ],
            'brand' => [
                'relation' => 'brand',
                'callback' => fn ($query, $value) => $query->whereHas('brand', fn ($query) => $query->where('brand_id', $value)),
            ],
            'price' => [
                'relation' => 'presentations',
                'callback' => fn ($query, $value) => $query->whereHas('presentations', fn ($query) => $query->where('sold_suggest', $value)),
            ],
            /* 'size' => [ */
            /*     'relation' => 'presentations.sizes', */
            /*     'callback' =>  fn($query, $value) => */
            /*     $query->whereHas('presentations.sizes', fn($query) => $query->where('size_id', $value)) */
            /* ], */
        ];
    }

    public static function apply($query, array $filters)
    {
        $rules = static::filters();
        // $relations = [];

        foreach ($filters as $key => $value) {

            if (! isset($rules[$key])) {
                continue;
            }

            // $relations[] = $rules[$key]['relation'];

            $rules[$key]['callback'](
                $query,
                $value
            );
        }
        // aplicamos las relaciones
        // $query->with(array_unique($relations));
        $query->with([
            'presentations:id,presentation,sold_suggest,product_id',
            /* 'presentations.sizes:id,size', */
            'presentations.tags:id,name',
            /* 'colors:id,name', */
            'compositionProducts.material:id,name',
            'compositionProducts.componentProduct:id,name',
            'styles:id,name',
            'category:id,name',
            'brand:id,name',
        ]);

        return $query;
    }
}
