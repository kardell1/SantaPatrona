<?php

namespace Modules\Production\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Products\Models\MenuProduct;

// use Modules\Production\Database\Factories\RecipeBookFactory;

class RecipeBook extends Model
{
    use HasFactory;

    // el detials puede que solo sea , masa , relleno
    protected $fillable = ["menu_product_id", "raw_product_id", "detail"];
    public function rawProduct()
    {
        return $this->belongsTo(RawProduct::class);
    }
    public function menuProducts()
    {
        return $this->belongsTo(MenuProduct::class);
    }
}
