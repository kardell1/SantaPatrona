<?php

namespace Modules\Products\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Products\Database\Factories\ColorFactory;

class Color extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'hexa' , 'description'];

    public function productVariants()
    {
        return $this->hasMany(ProductVariant::class);
    }

}
