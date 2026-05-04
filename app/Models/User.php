<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Modules\IAM\Models\Permission;
use Modules\IAM\Models\Role;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    protected $fillable = ["email", "password", "username"];
    protected $hidden = ["password", "remember_token"];

    protected function casts(): array
    {
        return [
            "email_verified_at" => "datetime",
            "password" => "hashed",
        ];
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    // modificar esto para que solo devuelva los view
    public function effectivePermissions()
    {
        return Permission::select("permissions.*")
            ->join(
                "permission_role",
                "permissions.id",
                "=",
                "permission_role.permission_id",
            )
            ->join(
                "role_user",
                "permission_role.role_id",
                "=",
                "role_user.role_id",
            )
            ->where("role_user.user_id", $this->id)
            ->distinct();
    }
}
