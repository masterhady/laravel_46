<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get("/posts", [PostController::class, "index"]);
Route::get("/posts/create",[PostController::class, "create"]);
Route::get("/posts/{post}", [PostController::class, "show"]);
Route::post("/posts",[PostController::class, "store"] );


Route::get("/books", [BookController::class, "index"])->name("books.index");
Route::get("/books/create", [BookController::class, "create"])->middleware("auth");
Route::get("/books/edit/{id}", [BookController::class, "edit"]);
Route::put("/books/{id}", [BookController::class, "update"]);
Route::post("/books", [BookController::class, "store"])->middleware("auth");
// Route::delete("/books/{id}", [BookController::class, "store"])


Route::get("/books/{id}", [BookController::class, "show"]);

Route::resource("categories", CategoryController::class)->middleware("auth");


use App\Http\Controllers\Auth\SocialAuthController;
Route::get('/auth/google', [SocialAuthController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [SocialAuthController::class, 'handleGoogleCallback']);