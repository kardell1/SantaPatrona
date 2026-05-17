<?php

namespace Modules\Products\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MenuProductUnit extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'equivalence',
        'price',
        'menu_product_id',
    ];

    public function menuProduct()
    {
        return $this->belongsTo(MenuProduct::class);
    }
}
