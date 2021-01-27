<?php

use App\Http\Controllers\Blog\PostController;
use App\Http\Controllers\Blog\CategoryController;
use App\Http\Controllers\Blog\TagController;

// Category Routes
Route::get("/blog/categories/list", [CategoryController::class, "index"])->middleware('auth')->name("Category.index");
Route::get("/blog/category/create", [CategoryController::class, "create"])->middleware("auth")->name("Category.create");
Route::post("/blog/category/create", [CategoryController::class, "store"])->middleware("auth")->name("Category.store");
Route::get("/blog/category/{slug}/edit", [CategoryController::class, "edit"])->middleware("auth")->name("Category.edit");
Route::put("/blog/category/{id}", [CategoryController::class, "update"])->middleware("auth")->name("Category.update");
Route::delete("/blog/category/{id}", [CategoryController::class, "destroy"])->middleware("auth")->name("Category.destroy");
Route::get("/blog/category/{slug}", [CategoryController::class, "show"])->name("Category.show");


// Tag Routes
Route::get("/blog/tags/list", [TagController::class, "index"])->middleware('auth')->name("Tag.index");
Route::get("/blog/tag/create", [TagController::class, "create"])->middleware("auth")->name("Tag.create");
Route::post("/blog/tag/create", [TagController::class, "store"])->middleware("auth")->name("Tag.store");
Route::get("/blog/tag/{slug}/edit", [TagController::class, "edit"])->middleware("auth")->name("Tag.edit");
Route::put("/blog/tag/{id}", [TagController::class, "update"])->middleware("auth")->name("Tag.update");
Route::delete("/blog/tag/{id}", [TagController::class, "destroy"])->middleware("auth")->name("Tag.destroy");
Route::get("/blog/tag/{slug}", [TagController::class, "show"])->name("Tag.show");

// Post Routes
Route::get("/blog", [PostController::class, "index"])->name("Post.index");
Route::get("/blog/posts", [PostController::class, "list"])->middleware("auth")->name("Post.list");
Route::get("/blog/create", [PostController::class, "create"])->middleware("auth")->name("Post.create");
Route::post("/blog/create", [PostController::class, "store"])->middleware("auth")->name("Post.store");
Route::get("/blog/search", [PostController::class, "search"])->name("Post.search");
Route::get("/blog/{slug}/edit", [PostController::class, "edit"])->middleware("auth")->name("Post.edit");
Route::put("/blog/{id}", [PostController::class, "update"])->middleware("auth")->name("Post.update");
Route::delete("/blog/{id}/delete", [PostController::class, "destroy"])->middleware("auth")->name("Post.destroy");
Route::get("/blog/{slug}", [PostController::class, "show"])->name("Post.show");