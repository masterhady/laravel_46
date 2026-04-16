@extends('home')

@section('title', 'Category Details')
{{-- @dd($category) --}}
@section('navbar')
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">Home</a>
        </div>
    </nav>
@endsection

@section('pageTitle', 'Category Details')

@section('body')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $category->name }}</h5>
            <p class="card-text">{{ $category->description ?? 'No description' }}</p>
            <p class="text-muted">Created: {{ $category->created_at->toDayDateTimeString() }}</p>
            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">Edit</a>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back</a>
            <h2> Books in this category </h2>
            @foreach($books as $book)
                <li>{{ $book->title }}</li>
            @endforeach
        </div>
    </div>
@endsection
