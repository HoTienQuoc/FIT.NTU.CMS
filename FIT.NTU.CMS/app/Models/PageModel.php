<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class PageModel extends Model
{
    protected $connection = "mongodb";
    protected $collection = "pages";
    protected $fillable = [
        "title",
        "slug",
        "content",
        "status",
        "meta",
        "widgets",
    ];
    protected $casts = [
        "meta" => "array",
        "widgets" => "array",
    ];
}
