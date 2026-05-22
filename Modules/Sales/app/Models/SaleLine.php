<?php

namespace Modules\Sales\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Sales\Database\Factories\SaleLineFactory;

class SaleLine extends Model
{
    use HasFactory;

    protected $fillable = ['sale_id','menu_inventory_id','combo','amount','price'];

}
