<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/iti", function(){
    return "Hello Laravel";
});

Route::get("/posts", [PostController::class, "index"]);

// Route::get("/posts", function(){
//     $myposts = [
//         ["title" => "I am Post 1", "body" => "I am body 1"],
//         ["title" => "I am Post 2", "body" => "I am body 2"],
//         ["title" => "I am Post 3", "body" => "I am body 3"],

//     ];
//     // compact 
//     return view("Posts.posts", compact("myposts"));
    // return view("Posts.posts", ["posts" => $posts]);
    // dump($posts);
    // dd($posts); // dump and die
    // return "Hello Laravel";
    // var_dump($posts);
// });

Route::get("/posts/{post}", [PostController::class, "show"]);

Route::get("/request", function(){
    $serchParams = request()->all();
    dd($serchParams);
});

Route::get("/home", function(){
    $name = "Ahmed";
    $email = "ahmed@it.com";
    return view("home", ["username" => $name, "useremail"  => $email]);
});

Route::get("/names", function(){
    $names = ["ahmed", "mohamed", "ali"];
    return view("home", ["users" => $names]);
});



