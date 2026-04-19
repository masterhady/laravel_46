<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Book;
use App\Http\Requests\StoreCategoryRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


// use Illuminate\Routing\Controllers\HasMiddleware;
// use Illuminate\Routing\Controllers\Middleware;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use AuthorizesRequests;
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
        // allows == check --> can user do this
        // denies --> can't user do this
        if(Gate::allows('admin')){
            return view('Categories.create');
        }
        abort(401);
        // return redirect()->route('categories.index');
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
        // if(Gate::allows('user') || Gate::allows('author'))
        if(Gate::allows('accecc-content')){
            $books = $category->books;
            return view('Categories.show', ['category' => $category, 'books' => $books]);
        }
        abort(401);
        
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
        // use the policy:
        $this->authorize('delete', $category);
        $category->delete();
        return redirect()->route('categories.index');
    }
}
