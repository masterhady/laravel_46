@extends('navbar')


@section('pageTitle')
    Edit book
@endsection

@section('title')
    Edit book
@endsection

@section('body')
    <form method="POST" action="/books/{{$book->id}}">
        @csrf
        @method('PUT')
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Title</label>
        <input  class="form-control" id="exampleInputEmail1" name="title" 
        value="{{$book->title}}">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Content</label>
        <input type="text" class="form-control" id="exampleInputPassword1"
        value="{{$book->content}}"
         name="content">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

