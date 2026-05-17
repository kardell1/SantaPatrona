<?php

namespace Modules\Sales\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Production\Models\RawProduct;

// use Modules\Sales\Database\Factories\SaleLineDetailFactory;

class SaleLineDetail extends Model
{
    use HasFactory;

    protected $fillable = ['sale_line_id' , 'raw_product_id' , 'action'];

    public function saleLine()
    {
        return $this->belongsTo(SaleLine::class);
    }
    public function rawProduct()
    {
        return $this->belongsTo(RawProduct::class);
    }
}
