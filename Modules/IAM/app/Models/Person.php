<?php

namespace Modules\IAM\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\IAM\Database\Factories\PersonFactory;

class Person extends Model
{
    use HasFactory;

    protected $fillable = ["cellphone", "name"];

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
    public function people()
    {
        return $this->belongsToMany(Person::class);
    }

    public function employee()
    {
        return $this->hasOne(Employee::class);
    }
    public function personType()
    {
        return $this->belongsToMany(PersonType::class);
    }
}
