@extends('navbar')


@section('pageTitle')
    Create Post
@endsection

@section('title')
    Create Post
@endsection

@section('body')
    <form method="POST" action="/posts">
        @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Title</label>
        <input  class="form-control" id="exampleInputEmail1" name="title">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Content</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="body">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

