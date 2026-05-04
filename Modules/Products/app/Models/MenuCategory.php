<?php

namespace Modules\Products\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Production\Models\MenuProduct;

// use Modules\Products\Database\Factories\MenuCategoryFactory;

class MenuCategory extends Model
{
    use HasFactory;

    protected $fillable = ["name", "code"];

    public function menuProducts()
    {
        return $this->hasMany(MenuProduct::class);
    }
}
