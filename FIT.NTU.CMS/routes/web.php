<?php

use App\Http\Controllers\RoleController;
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

Route::get("/admin/role", [RoleController::class, "show"]);
Route::get("/api/roles", [RoleController::class, "fetchRoles"]);
Route::put("/api/roles/{id}", [RoleController::class, "update"]);
Route::delete("/api/roles/{id}", [RoleController::class, "destroy"]);
Route::post("/api/roles", [RoleController::class, "create"]);
