<?php

namespace Modules\Products\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Products\Database\Factories\CompositionProductFactory;

class CompositionProduct extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'component_product_id', 'material_id', 'factor', 'description'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function componentProduct()
    {
        return $this->belongsTo(ComponentProduct::class);
    }

    public function material()
    {
        return $this->belongsTo(Material::class);
    }
}
