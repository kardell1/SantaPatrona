<?php

namespace Modules\IAM\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\IAM\Database\Factories\PermissionFactory;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = ['label' , 'code'];

    public function scopes ()
    {
        return $this->belongsToMany(Scope::class);
    }

    public function sections()
    {
        return $this->belongsToMany(Section::class);
    }
}
