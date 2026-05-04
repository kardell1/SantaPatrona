<?php

namespace Modules\IAM\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\IAM\Database\Factories\ProfileFactory;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = [
        "person_id",
        "paternal_lastname",
        "maternal_lastname",
        "gender",
        "identification_type",
        "identification_number",
    ];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}
