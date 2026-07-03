<?php

namespace Modules\Products\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Products\Database\Factories\ProductDetailFactory;

class ProductDetail extends Model
{
    use HasFactory;

    protected $fillable = ['product_variant_id' , 'unity' , 'unity_type' , 'description'];

    public function productVariant()
    {
        return $this->belongsTo(ProductVariant::class);
    }

}
