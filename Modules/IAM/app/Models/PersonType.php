<?php

namespace Modules\IAM\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\IAM\Database\Factories\PersonTypeFactory;

class PersonType extends Model
{
    use HasFactory;

    protected $fillable = ["name", "code"];

    public function people()
    {
        return $this->belongsToMany(Person::class);
    }
}
