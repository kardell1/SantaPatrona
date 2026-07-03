<?php

namespace Modules\Products\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Products\Database\Factories\ImageFactory;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['product_id' , 'path'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
