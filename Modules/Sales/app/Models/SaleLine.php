<?php

namespace Modules\Sales\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Products\Models\MenuInventory;

// use Modules\Sales\Database\Factories\SaleLineFactory;

class SaleLine extends Model
{
    use HasFactory;

    protected $fillable = [
        'sale_id',
        'menu_inventory_id',
        'combo',
        'amount',
        'price'
    ];

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }
    // items que se venden
    public function menuInventory()
    {
        return $this->belongsTo(MenuInventory::class);
    }
}
