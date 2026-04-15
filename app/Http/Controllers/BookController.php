<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    function index(){
        $books = Book::all();
        return view("Books.index", ["books" => $books]);
    }


    function show($id){
        $book = Book::findOrFail($id);
        return  view("Books.show", ["book" => $book]);
    }

    function create(){
        return view("Books.create");
    }

    function store(){
        $book = new Book();
        // dd(request()->all());
        request()->validate([
            "title" => "required|max:255|min:3",
            "content" => "required|max:255|min:3"
        ]);
        $book->title = request()->title;
        $book->content = request()->content;
        $book->save();
        // return view("Books.index", ["books" => $books]);
        return redirect("/books");
    }


    function edit($id){
        $book = Book::findOrFail($id);
        return view("Books.edit", ["book" => $book]);
    }

    function update($id){
        $book = Book::findOrFail($id);
        $book->title = request()->title;
        $book->content = request()->content;
        $book->save();
        return redirect("/books");
    }


}
