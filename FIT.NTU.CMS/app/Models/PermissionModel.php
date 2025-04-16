<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class PermissionModel extends Model
{
    protected $connection = "mongodb";
    protected $collection = "permissions";
    protected $fillable = ["name", "slug", "description"];
}
