<?php

namespace Modules\Products\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MenuProductResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "menu_product_variants" => $this->menuProductVariants->map(function ($item) {
                return [
                    "name" => $item->name,
                    "divisions" => $item->divisions,
                    "sold_price" => $item->sold_price,
                    "menu_product_portions" => $item->menuProductPortions->map(function($portion){
                        return [
                            "portion_name" => $portion->portion_name,
                            "price" => $portion->price,
                            "consumed_divisions" => $portion->consumed_division
                        ];
                    })
                ];
            })->values(),
            "menu_product_category" => $this->menuCategory->name,
            "menu_product_extras" => $this->menuProductExtras
        ];
    }
}
