<?php

namespace Modules\Products\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Products\Database\Factories\CategoryFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description' , 'unit_type_id'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function componentProducts()
    {
        return $this->belongsToMany(ComponentProduct::class);
    }

    public function unitType()
    {
        return $this->belongsTo(UnitType::class);
    }
}
