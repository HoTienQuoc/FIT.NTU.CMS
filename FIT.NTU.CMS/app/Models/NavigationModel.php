<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class NavigationModel extends Model
{
    protected $connection = "mongodb";
    protected $collection = "navigations";
    protected $fillable = ["name", "items"];
    protected $casts = [
        "items" => "array",
    ];
}
