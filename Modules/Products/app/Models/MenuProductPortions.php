<?php

namespace Modules\Products\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Products\Database\Factories\MenuProductPortionsFactory;

class MenuProductPortions extends Model
{
    use HasFactory;

    protected $fillable = ['menu_product_variant_id' , 'portion_name' , 'price' , 'consumed_division' ];

    public function menuProductVariant()
    {
        return $this->belongsTo(MenuProductVariant::class);
    }



}
