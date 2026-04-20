<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\AuthController;

Route::get("/articles", [ArticleController::class, "index"])->middleware('check.app');
Route::apiResource("articles", ArticleController::class)->middleware('auth:sanctum')->except([ "index"]);


Route::post('register',[AuthController::class, 'register']);

Route::post('login', [AuthController::class, 'login']);



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


