<?php

namespace Modules\Products\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Products\Database\Factories\MeasurementUnitFactory;

class MeasurementUnit extends Model
{
    use HasFactory;

    // el is base para q?
    protected $fillable = ['type_unit', 'name', 'acronime', 'isBase'];

    public function productVariants()
    {
        return $this->belongsToMany(ProductVariant::class);
    }

    public function baseEquivalences()
    {
        return $this->hasMany(
            Equivalence::class,
            'base_unit_id'
        );
    }

    public function equivalentEquivalences()
    {
        return $this->hasMany(
            Equivalence::class,
            'equivalence_id'
        );
    }
}
