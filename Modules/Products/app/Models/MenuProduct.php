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
        "name",
        "is_priority",
        "suggested_selling_price",
        "manufacturing_cost",
        "adquisition_date",
        "reception_date",
        "expired_date",
        "menu_category_id",
    ];
    public function menuCategory()
    {
        return $this->belongsTo(MenuCategory::class);
    }
    public function recipeBooks()
    {
        return $this->hasMany(RecipeBook::class);
    }
}
