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


    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function sections()
    {
        return $this->belongsToMany(Section::class);
    }
}
