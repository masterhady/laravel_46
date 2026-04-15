<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //
     private $myposts = [
        ["title" => "I am Post 1", "body" => "I am body 1"],
        ["title" => "I am Post 2", "body" => "I am body 2"],
        ["title" => "I am Post 3", "body" => "I am body 3"],
        ];

    function index(){
       
        // compact 
        return view("Posts.posts", ["myposts" => $this->myposts]);
    }


    function show($post){
    // return $myposts[$post];
    return view("Posts.show", ["key" => $this->myposts[$post]]);
    }

    function create(){
        return view('Posts.create'); //  redirect form page 
    }

    function store(){
        // dd(request());
        return request();
    }

}
