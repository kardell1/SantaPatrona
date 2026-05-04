<?php

namespace Modules\Production\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Production\Database\Factories\RawMaterialFactory;

class RawMaterial extends Model
{
    use HasFactory;

    protected $fillable = [
        "product_id",
        "provider_id",
        "adquisition_date",
        "reception_date",
        "expired_date",
        // "category_id",
    ];

    public function rawProduct()
    {
        return $this->belongsTo(RawProduct::class);
    }
}
