<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //

    function index(){
        $myposts = [
        ["title" => "I am Post 1", "body" => "I am body 1"],
        ["title" => "I am Post 2", "body" => "I am body 2"],
        ["title" => "I am Post 3", "body" => "I am body 3"],

        ];
        // compact 
        return view("Posts.posts", compact("myposts"));
    }


    function show($post){
         $myposts = [
        ["title" => "I am Post 1", "body" => "I am body 1"],
        ["title" => "I am Post 2", "body" => "I am body 2"],
        ["title" => "I am Post 3", "body" => "I am body 3"],
    ];

    // return $myposts[$post];
    return view("Posts.show", ["key" => $myposts[$post]]);
    }
}
