<?php

namespace Modules\Products\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Production\Models\RecipeBook;

// use Modules\Products\Database\Factories\MenuProductFactory;

class MenuProduct extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'menu_category_id',
    ];
    public function menuCategory()
    {
        return $this->belongsTo(MenuCategory::class);
    }
    //
    public function recipeBooks()
    {
        return $this->hasMany(RecipeBook::class);
    }
    //
    public function combos()
    {
        return $this->belongsToMany(Combo::class);
    }

    public function menuProductUnits()
    {
        return $this->hasMany(MenuProductUnit::class);
    }

    public function menuProductExtras()
    {
        return $this->hasMany(MenuProductExtra::class);
    }


}
