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
                'relation' => 'productVariants.tags',
                'callback' =>   fn($query, $value) =>
                $query->where('name', 'ilike', "%{$value}%")
            ],

            'category' => [
                'relation' => 'category',
                'callback' =>   fn($query, $value) =>
                $query->whereHas('category', fn($query) => $query->where('id', $value)),
            ],

            'tag' => [
                'relation' => 'productVariants.tags',
                'callback' =>   fn($query, $value) =>
                $query->whereHas('productVariants.tags', fn($query) => $query->where('tag_id', $value)),
            ],

            'color' => [
                'relation' => 'colors',
                'callback' =>   fn($query, $value) =>
                $query->whereHas('colors', fn($query) => $query->where('color_id', $value)),
            ],

            'material' => [
                'relation' => 'materials',
                'callback' =>
                fn($query, $value) =>
                $query->whereHas('materials', fn($query) => $query->where('material_id', $value)),
            ],

            'style' => [
                'relation' => 'styles',
                'callback' =>  fn($query, $value) =>
                $query->whereHas('styles', fn($query) => $query->where('style_id', $value))
            ],
            'brand' => [
                'relation' => 'brand',
                'callback' =>  fn($query, $value) =>
                $query->whereHas('brand', fn($query) => $query->where('brand_id', $value))
            ],
            'price' => [
                'relation' => 'productVariants',
                'callback' =>  fn($query, $value) =>
                $query->whereHas('productVariants', fn($query) => $query->where('sold_suggest', $value))
            ],
            'size' => [
                'relation' => 'productVariants.sizes',
                'callback' =>  fn($query, $value) =>
                $query->whereHas('productVariants.sizes', fn($query) => $query->where('size_id', $value))
            ],
        ];
    }

    public static function apply($query, array $filters)
    {
        $rules = static::filters();
        //$relations = [];

        foreach ($filters as $key => $value) {

            if (! isset($rules[$key])) {
                continue;
            }

            //$relations[] = $rules[$key]['relation'];

            $rules[$key]['callback'](
                $query,
                $value
            );
        }
        // aplicamos las relaciones
        //$query->with(array_unique($relations));
        $query->with([
            'productVariants:id,name,sold_suggest,product_id',
            'productVariants.sizes:id,size',
            'productVariants.tags:id,name',
            'colors:id,name',
            'materials:id,name',
            'styles:id,name',
            'category:id,name',
            'brand:id,name'
        ]);
        return $query;
    }
}
