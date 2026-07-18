<?php

namespace Modules\Products\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Products\Database\Factories\SizeFactory;

class Size extends Model
{
    use HasFactory;

    protected $fillable = ['size', 'description', 'size_system', 'equivalence_id', 'gender'];
    protected $hidden = ['pivot'];
    public function equivalence()
    {
        return $this->belongsTo(self::class, 'equivalence_id');
    }

    public function productVariants()
    {
        return $this->belongsToMany(ProductVariant::class);
    }


}
