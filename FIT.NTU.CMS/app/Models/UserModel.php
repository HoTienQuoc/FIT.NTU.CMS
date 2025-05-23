<?php
namespace App\Models;
use MongoDB\Laravel\Eloquent\Model;

class UserModel extends Model
{
    protected $connection = "mongodb";
    protected $collection = "users";

    protected $fillable = ["name", "email", "password", "roles"];

    protected $casts = [
        "roles" => "array",
    ];
}
