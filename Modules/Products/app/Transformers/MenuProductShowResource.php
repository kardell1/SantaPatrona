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
            "presentation" => $this->menuProductUnits->map(function ($unit) {
                return [
                    "id" => $unit->id,
                    "name" => $unit->name,
                    "equivalence" => $unit->equivalence,
                    "price" => $unit->price,
                ];
            })->values(),
            "extras" => $this->menuProductExtras,
            "combos" => $this->combos,
        ];
    }

}
