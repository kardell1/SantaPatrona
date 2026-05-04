<?php

namespace Modules\Production\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Production\Database\Factories\RawProductFactory;

class RawProduct extends Model
{
    use HasFactory;

    protected $fillable = ["name", "code", "unit", "raw_category_id"];

    public function rawMaterial()
    {
        return $this->hasOne(RawMaterial::class);
    }
    public function rawCategory()
    {
        return $this->belongsTo(RawCategory::class);
    }
    public function recipeBooks()
    {
        return $this->hasMany(RecipeBook::class);
    }
}
