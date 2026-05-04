<?php

namespace Modules\Budgeting\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Budgeting\Database\Factories\BudgetClassifierFactory;

class BudgetClassifier extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): BudgetClassifierFactory
    // {
    //     // return BudgetClassifierFactory::new();
    // }
}
