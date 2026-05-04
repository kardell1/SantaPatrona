<?php

namespace Modules\Production\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Production\Database\Factories\RawCategoryFactory;

class RawCategory extends Model
{
    use HasFactory;

    protected $fillable = ["name", "code"];

    public function rawProducts()
    {
        return $this->hasMany(RawProduct::class);
    }
}
