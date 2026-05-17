<?php

namespace Modules\IAM\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Sales\Models\Sale;

// use Modules\IAM\Database\Factories\EmployeeFactory;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        "salary",
        "person_id",
        "start_date",
        "end_date",
        "user_id",
    ];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
