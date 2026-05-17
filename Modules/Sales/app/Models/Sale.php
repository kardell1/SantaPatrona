<?php

namespace Modules\Sales\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\IAM\Models\Employee;
use Modules\IAM\Models\Person;

// use Modules\Sales\Database\Factories\SaleFactory;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = ['client_id' , 'employee_id' , 'total_amount' , 'type_payment'];

    public function saleLines()
    {
        return $this->hasMany(SaleLine::class);
    }
    public function client()
    {
        return $this->belongsTo(Person::class);
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
