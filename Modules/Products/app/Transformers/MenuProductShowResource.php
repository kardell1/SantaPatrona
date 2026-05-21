<?php

namespace Modules\Products\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MenuProductShowResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [

            "id" => $this->id,
            "name" => $this->name,
            "category" => $this->menuCategory->name ?? "",
            "extras" => $this->menuProductExtras,
            "menu_product_variants" => $this->menuProductVariants->map(function ($variant) {
                return [
                    "id" => $variant->id,
                    "name" => $variant->name,
                    "divisions" => $variant->divisions,
                    "created_at" => $variant->created_at,
                    "sold_price" => $variant->sold_price,
                    "menu_product_portions" => $variant->menuProductPortions->map(function ($portion) {
                        return [
                            "portion_name" => $portion->portion_name,
                            "price" => $portion->price,
                            "consumed_division" => $portion->consumed_division,
                        ];
                    }),
                    "combos" => $variant->comboItems->map(function($combo){
                        return [
                            "created_at" => $combo->created_at,
                            "amount" => $combo->amount,
                            "price" => $combo->price,
                            "name" => $combo->combo->name,
                            "status" => $combo->combo->status,
                            "description" => $combo->combo->description
                        ];
                    })
                ];
            })
        ];
    }
}
