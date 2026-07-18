<?php

namespace Modules\Products\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Products\Database\Factories\EquivalenceFactory;

class Equivalence extends Model
{
    use HasFactory;

    protected $fillable = ['base_unit_id' , 'equivalence_id' , 'factor'];

    public function baseUnit()
    {
        return $this->belongsTo(MeasurementUnit::class , 'base_unit_id');
    }

    public function equivalence()
    {
        return $this->belongsTo(MeasurementUnit::class , 'equivalence_id');
    }
}
