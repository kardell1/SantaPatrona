<?php

namespace Modules\Products\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\HumanResources\Models\Brand;

// use Modules\Products\Database\Factories\ProductFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['gender', 'brand_id'  , 'status' , 'name' , 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function productVariants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function styles()
    {
        return $this->belongsToMany(Style::class);
    }
    // colores disponibles
    public function colors()
    {
        return $this->belongsToMany(Color::class);
    }

    public function materials()
    {
        return $this->belongsToMany(Material::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
