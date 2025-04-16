<?php

use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\WidgetController;

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

Route::get("/admin/roles", [RoleController::class, "show"]);
Route::get("/api/roles", [RoleController::class, "fetchRoles"]);
Route::put("/api/roles/{id}", [RoleController::class, "update"]);
Route::delete("/api/roles/{id}", [RoleController::class, "destroy"]);
Route::post("/api/roles", [RoleController::class, "create"]);

Route::get("/admin/posts", [PostController::class, "show"]);
Route::get("/api/posts", [PostController::class, "fetchPosts"]);
Route::put("/api/posts/{id}", [PostController::class, "update"]);
Route::delete("/api/posts/{id}", [PostController::class, "destroy"]);
Route::post("/api/posts", [PostController::class, "create"]);

Route::get("/admin/pages", [PageController::class, "show"]);
Route::get("/api/pages", [PageController::class, "fetchPages"]);
Route::put("/api/pages/{id}", [PageController::class, "update"]);
Route::delete("/api/pages/{id}", [PageController::class, "destroy"]);
Route::post("/api/pages", [PageController::class, "create"]);

Route::get("/admin/widgets", [WidgetController::class, "show"]);
Route::get("/api/widgets", [WidgetController::class, "fetchWidgets"]);
Route::put("/api/widgets/{id}", [WidgetController::class, "update"]);
Route::delete("/api/widgets/{id}", [WidgetController::class, "destroy"]);
Route::post("/api/widgets", [WidgetController::class, "create"]);
