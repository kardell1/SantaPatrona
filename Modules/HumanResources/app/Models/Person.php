<?php

namespace Modules\HumanResources\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\HumanResources\Database\Factories\PersonFactory;

class Person extends Model
{
    use HasFactory;

    protected $fillable = ['first_name' , 'email','phone'];

    public function personTypes()
    {
        return $this->belongsToMany(PersonType::class);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function personDetails()
    {
        return $this->hasMany(PersonDetail::class);
    }

    public function brands()
    {
        return $this->belongsToMany(Brand::class);
    }
}
