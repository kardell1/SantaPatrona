<?php

namespace Modules\Products\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Products\Database\Factories\ComboReplaceamentFactory;

class ComboReplaceament extends Model
{
    use HasFactory;

    protected $fillable = ['combo_item_id' , 'menu_product_variant_id' , 'amount' , 'price'];

    public function comboItem()
    {
        return $this->belongsTo(ComboItem::class);
    }

    public function menuProductVariant()
    {
        return $this->belongsTo(MenuProductVariant::class);
    }




}
