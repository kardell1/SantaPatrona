<?php

namespace Modules\Products\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Products\Database\Factories\ProductVariantFactory;

class ProductVariant extends Model
{
    use HasFactory;

    protected $fillable = ['product_id' , 'name' , 'sold_suggest' ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function sizes()
    {
        return $this->belongsToMany(Size::class);
    }

    public function measuryUnits()
    {
        return $this->belongsToMany(MeasurementUnit::class);
    }
}
