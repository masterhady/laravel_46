<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;


class BookController extends Controller
{
    use AuthorizesRequests;

    function index(){
        $books = Book::all();
        return view("Books.index", ["books" => $books]);
    }


    function show($id){
        $book = Book::findOrFail($id);
        return  view("Books.show", ["book" => $book]);
    }

    function create(){
        $categories = Category::all();
        return view("Books.create", ["categories" => $categories]);
    }

    function store(){
        $this->authorize('create');

        $book = new Book();
        // dd(Auth::user());
        // dd(request()->all());
        request()->validate([
            "title" => "required|max:255|min:3",
            "content" => "required|max:255|min:3",
            "image" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ], [
            "title.required" => "Title is required from OS track",
        ]);
        $book->title = request()->title;
        $book->content = request()->content;
        $book->category_id = request()->category_id;
        $book->user_id = Auth::id();
        // $book->user->role == "admin" 
            // {

            // } 

        $imagePath = null;

        if(request()->hasFile('image')){
            $imagePath = request()->file('image')->store('imageBooks', 'public');
            $book->image = $imagePath;
        } // 
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

    function destroy(Book $book){

        $booh = Book::findOrFail($book->id);
        $book->delete();

        // $book = Book::findOrFail($);
        // $book->delete();
        // return redirect("/books");
    }


}
