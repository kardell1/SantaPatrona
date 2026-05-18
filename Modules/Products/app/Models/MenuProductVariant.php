<?php

namespace Modules\Products\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Products\Database\Factories\MenuProductVariantFactory;

class MenuProductVariant extends Model
{
    use HasFactory;

    protected $fillable = ['menu_product_id' , 'name' , 'divisions'];

    public function menuProduct()
    {
        return $this->belongsTo(MenuProduct::class);
    }

    public function menuProductPortions()
    {
        return $this->hasMany(MenuProductPortions::class);
    }

    public function comboItems()
    {
        return $this->hasMany(ComboItem::class);
    }
}
