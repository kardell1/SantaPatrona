<?php

namespace Modules\Products\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Products\Database\Factories\MaterialFactory;

class Material extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'description'];

    public function productVariants()
    {
        return $this->belongsToMany(ProductVariant::class);
    }
}
