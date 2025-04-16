<?php

use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\WidgetController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\ThemeController;

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

Route::get("/admin/permissions", [PermissionController::class, "show"]);
Route::get("/api/permissions", [
    PermissionController::class,
    "fetchPermissions",
]);
Route::put("/api/permissions/{id}", [PermissionController::class, "update"]);
Route::delete("/api/permissions/{id}", [
    PermissionController::class,
    "destroy",
]);
Route::post("/api/permissions", [PermissionController::class, "create"]);

Route::get("/admin/navigations", [NavigationController::class, "show"]);
Route::get("/api/navigations", [
    NavigationController::class,
    "fetchNavigations",
]);
Route::put("/api/navigations/{id}", [NavigationController::class, "update"]);
Route::delete("/api/navigations/{id}", [
    NavigationController::class,
    "destroy",
]);
Route::post("/api/navigations", [NavigationController::class, "create"]);

Route::get("/admin/themes", [ThemeController::class, "show"]);
Route::get("/api/themes", [ThemeController::class, "fetchThemes"]);
Route::put("/api/themes/{id}", [ThemeController::class, "update"]);
Route::delete("/api/themes/{id}", [ThemeController::class, "destroy"]);
Route::post("/api/themes", [ThemeController::class, "create"]);
