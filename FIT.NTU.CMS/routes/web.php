<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get("/", function () {
    return view("welcome");
});
Route::get("/dashboard", function () {
    return view("dashboard");
});

Route::get("/admin/user", [UserController::class, "show"]);
Route::get("/api/users", [UserController::class, "fetchUsers"]);
Route::put("/api/users/{id}", [UserController::class, "update"]);
Route::delete("/api/users/{id}", [UserController::class, "destroy"]);
Route::post("/api/users", [UserController::class, "create"]);
