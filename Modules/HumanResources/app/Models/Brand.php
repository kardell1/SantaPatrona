<?php

namespace Modules\HumanResources\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Products\Models\Product;

// use Modules\HumanResources\Database\Factories\BrandFactory;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [ 'path','isActive' , 'company_id' , 'description' , 'name'];

    public function people()
    {
        return $this->belongsToMany(Person::class , 'company_id');
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
