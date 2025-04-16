<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class ThemeModel extends Model
{
    protected $connection = "mongodb";
    protected $collection = "themes";
    protected $fillable = ["name", "description", "folder", "widget_positions"];
    protected $casts = [
        "widget_positions" => "array",
    ];
}
