<?php

namespace Modules\Products\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Products\Database\Factories\ColorFactory;

class Color extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'hexa' , 'description'];
    protected $hidden = ['pivot'];
    public function compositionProducts()
    {
        return $this->hasMany(CompositionProduct::class);
    }

}
