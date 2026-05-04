<?php

namespace Modules\IAM\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\IAM\Database\Factories\RoleFactory;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ["name", "description"];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
