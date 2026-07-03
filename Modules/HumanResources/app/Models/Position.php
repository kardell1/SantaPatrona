<?php

namespace Modules\HumanResources\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\HumanResources\Database\Factories\PositionFactory;

class Position extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'suggest_salary'];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function countEmployees()
    {
        return $this->employees()->count();
    }
}
