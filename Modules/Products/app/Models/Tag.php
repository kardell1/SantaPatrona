<?php

namespace Modules\Products\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// use Modules\Products\Database\Factories\TagFactory;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    protected $hidden = ['pivot'];

    public function productVariants()
    {
        return $this->belongsToMany(ProductVariant::class);
    }
}
