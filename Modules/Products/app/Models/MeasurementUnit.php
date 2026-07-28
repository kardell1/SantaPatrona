<?php

namespace Modules\Products\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Products\Database\Factories\MeasurementUnitFactory;

class MeasurementUnit extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'description'];

    public function unitTypes()
    {
        return $this->hasMany(UnitType::class);
    }
}
