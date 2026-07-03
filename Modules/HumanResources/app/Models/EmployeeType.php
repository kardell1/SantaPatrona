<?php

namespace Modules\HumanResources\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\HumanResources\Database\Factories\EmployeeTypeFactory;

class EmployeeType extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'description'];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
