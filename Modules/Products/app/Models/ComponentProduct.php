<?php

namespace Modules\Products\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Products\Database\Factories\ComponentProductFactory;

class ComponentProduct extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function category()
    {
        return $this->belongsToMany(Category::class);
    }
}
