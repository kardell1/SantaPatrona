<?php

namespace Modules\Products\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Products\Database\Factories\MenuProductSizeFactory;

class MenuProductSize extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'description'];

    public function menuProducts()
    {
        $this->hasMany(MenuProduct::class);
    }


}
