<?php

namespace Modules\HumanResources\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\HumanResources\Database\Factories\PersonTypeFactory;

class PersonType extends Model
{
    use HasFactory;

    protected $fillable = ['name','description' ];

    public function people()
    {
        return $this->belongsToMany(Person::class);
    }
}
