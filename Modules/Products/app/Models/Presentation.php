<?php

namespace Modules\Products\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// use Modules\Products\Database\Factories\ProductVariantFactory;

class Presentation extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'presentation', 'sold_suggest'];

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

    public function specifications()
    {
        return $this->hasMany(Specification::class);
    }
}
