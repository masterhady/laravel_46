<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BookController;


Route::get('/', function () {
    return view('welcome');
});

Route::get("/iti", function(){
    return "Hello Laravel";
});

Route::get("/posts", [PostController::class, "index"]);
Route::get("/posts/create",[PostController::class, "create"]);
Route::get("/posts/{post}", [PostController::class, "show"]);
Route::post("/posts",[PostController::class, "store"] );


Route::get("/books", [BookController::class, "index"]);
Route::get("/books/create", [BookController::class, "create"]);
Route::get("/books/edit/{id}", [BookController::class, "edit"]);
Route::put("/books/{id}", [BookController::class, "update"]);
Route::post("/books", [BookController::class, "store"]);
Route::delete("/books/{id}", [BookController::class, "store"]);


Route::get("/books/{id}", [BookController::class, "show"]);
