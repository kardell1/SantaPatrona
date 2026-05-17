<?php

namespace Modules\Products\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Production\Models\RawProduct;

// use Modules\Products\Database\Factories\MenuProductExtraFactory;

class MenuProductExtra extends Model
{
    use HasFactory;

    protected $fillable = ['menu_product_id' , 'price' , 'details' , 'raw_product_id'];

    public function menuProduct()
    {
        return $this->belongsTo(MenuProduct::class);
    }

    public function rawProduct()
    {
        return $this->belongsTo(RawProduct::class);
    }


}
