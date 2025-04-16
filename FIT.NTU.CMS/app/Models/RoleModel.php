<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class RoleModel extends Model
{
    protected $connection = "mongodb";
    protected $collection = "roles";
    protected $fillable = ["name", "slug", "permissions"];
    protected $casts = [
        "permissions" => "array",
    ];
}
