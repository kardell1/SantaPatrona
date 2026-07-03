<?php

namespace Modules\HumanResources\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\HumanResources\Database\Factories\PersonDetailFactory;

class PersonDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'person_id' ,
        'identifier_type',
        'identifier_id'
    ];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}
