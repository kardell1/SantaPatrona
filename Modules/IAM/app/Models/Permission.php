<?php

namespace Modules\IAM\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\IAM\Database\Factories\PermissionFactory;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = ["module", "resource", "action"];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
