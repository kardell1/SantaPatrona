<?php

namespace Modules\Products\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Products\Database\Factories\SpecificationFactory;

class Specification extends Model
{
    use HasFactory;

    protected $fillable = ['presentation_id' , 'name','amount','unit_type_id' ];

    public function unitType()
    {
        return $this->belongsTo(UnitType::class);
    }

    public function presentation()
    {
        return $this->belongsTo(Presentation::class);
    }
}
