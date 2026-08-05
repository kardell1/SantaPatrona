<?php

namespace Modules\IAM\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// use Modules\IAM\Database\Factories\PermissionFactory;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = ['label', 'code'];

    public function scopes()
    {
        return $this->belongsToMany(Scope::class);
    }

    public function sections()
    {
        return $this->belongsToMany(Section::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
