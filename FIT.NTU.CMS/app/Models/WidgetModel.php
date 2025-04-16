<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class WidgetModel extends Model
{
    protected $connection = "mongodb";
    protected $collection = "widgets";
    protected $fillable = [
        "name",
        "type",
        "position",
        "config",
        "content",
        "enabled",
    ];
    protected $casts = [
        "config" => "array",
    ];
}
