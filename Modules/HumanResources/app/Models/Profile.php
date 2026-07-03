<?php

namespace Modules\HumanResources\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\HumanResources\Database\Factories\ProfileFactory;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'person_id',
        'middle_name',
        'maternal_lastname',
        'paternal_lastname',
        'age',
    ];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}
