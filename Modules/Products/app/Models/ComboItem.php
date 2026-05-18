<?php

namespace Modules\Products\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ComboItem extends Model
{
    use HasFactory;

    protected $fillable = ['combo_id' , 'menu_product_variant_id' , 'amount' , 'price' , 'replaceable'];

    public function combo()
    {
        return $this->belongsTo(Combo::class);
    }

    public function menuProductVariant()
    {
        return $this->belongsTo(MenuProductVariant::class);
    }


    public function comboReplaceament()
    {
        return $this->hasMany(ComboReplaceament::class);
    }

}
