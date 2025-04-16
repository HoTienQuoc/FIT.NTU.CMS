<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class PostModel extends Model
{
    protected $connection = "mongodb";
    protected $collection = "posts";
    protected $fillable = [
        "title",
        "slug",
        "content",
        "tags",
        "status",
        "author_id",
    ];
    protected $casts = [
        "tags" => "array",
    ];
}
