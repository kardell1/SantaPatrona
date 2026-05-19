<?php

namespace Modules\Products\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\IAM\Models\Employee;

// use Modules\Products\Database\Factories\MenuInventoryFactory;

class MenuInventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'menu_product_variant_id',
        'manufacturing_cost',
        'amount',
        'reception_date',
        'expired_date',
        'employee_id',
        'menu_flavor_id',
    ];

    public function menuProductVariant()
    {
        return $this->belongsTo(MenuProductVariant::class);
    }

    public function menuFlavor()
    {
        return $this->belongsTo(MenuFlavor::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
