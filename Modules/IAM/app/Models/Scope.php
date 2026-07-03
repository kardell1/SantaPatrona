<?php

namespace Modules\IAM\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\IAM\Database\Factories\ScopeFactory;

class Scope extends Model
{
    use HasFactory;

    protected $fillable = ['label','code'];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
