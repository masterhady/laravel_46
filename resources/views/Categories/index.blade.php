@extends('home')

@section('title', 'Categories')

@section('navbar')
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">Home</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('books.index') }}">Books</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
@endsection

@section('pageTitle', 'Categories')

@section('body')
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{--  can in blade == allows in controller --}}
    {{-- @can('The name of the Gate') --}}
    @can('admin')
        <div class="mb-3 text-end">
            <a href="{{ route('categories.create') }}" class="btn btn-primary">Create Category</a>
        </div>
    @endcan

    {{-- cannot in blade == denies in controller --}}

    @cannot('admin')
        <h1>You are not allowed to see this page</h1>
    @endcannot
    

    @if($categories->isEmpty())
        <p>No categories yet.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description ?? '-' }}</td>
                        <td>{{ $category->created_at->diffForHumans() }}</td>
                        <td>
                            <a href="{{ route('categories.show', $category->id) }}" class="btn btn-sm btn-outline-secondary">Show</a>
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this category?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
