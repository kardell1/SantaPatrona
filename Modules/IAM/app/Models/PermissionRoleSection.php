<?php

namespace Modules\IAM\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// use Modules\IAM\Database\Factories\PermissionRoleSectionFactory;

class PermissionRoleSection extends Model
{
    use HasFactory;

    protected $fillable = ['permission_id', 'role_id', 'section_id'];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function sections()
    {
        return $this->belongsToMany(Section::class);
    }
}
