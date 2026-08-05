<?php

namespace Modules\Products\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// use Modules\Products\Database\Factories\UnitTypeFactory;

class UnitType extends Model
{
    use HasFactory;

    protected $fillable = ['measurement_unit_id', 'name', 'acronym'];

    public function measurementUnit()
    {
        return $this->belongsTo(MeasurementUnit::class);
    }

    public function specifications()
    {
        return $this->hasMany(Specification::class);
    }
}
