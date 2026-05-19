<?php

namespace Modules\Products\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MenuFlavor extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'description'];

    public function menuInventories()
    {
        return $this->hasMany(MenuInventory::class);
    }
}
