<?php

namespace Modules\Sales\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Products\Models\MenuProduct;

// use Modules\Sales\Database\Factories\SaleLineFactory;

class SaleLine extends Model
{
    use HasFactory;

    protected $fillable = ['sale_id' , 'menu_product_id' , 'price' , 'combo' , 'is_combo'];

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

    public function menuProduct()
    {
        return $this->belongsTo(MenuProduct::class);
    }

    public function saleLineDetails()
    {
        return $this->hasMany(SaleLineDetail::class);
    }
}
