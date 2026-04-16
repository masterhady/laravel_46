<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Book;
use App\Http\Requests\StoreCategoryRequest;

// use Illuminate\Routing\Controllers\HasMiddleware;
// use Illuminate\Routing\Controllers\Middleware;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // public function __construct(){
    //     $this->middleware('auth');
    // }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('Categories.index', ['categories' => $categories]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        // dd($request);
        $data = $request->validated();
        $category = Category::create($data);
        return redirect()->route('categories.index')->with('success', 'Category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        // dd($category);
        // $books = Book::where('category_id', $category->id)->get();
        $books = $category->books; // books 0---> the relation inside the category model
        // dd($books);
        return view('Categories.show', ['category' => $category, 'books' => $books]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('Categories.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $category->update($request->all());
        return redirect()->route('categories.index');
        // return view('Categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }
}
