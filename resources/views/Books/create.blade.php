@extends('navbar')


@section('pageTitle')
    Create book
@endsection

@section('title')
    Create book
@endsection


@section('body')
 
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif    
<form method="POST" action="/books" enctype="multipart/form-data">
        @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Title</label>
        <input  class="form-control" id="exampleInputEmail1" name="title"
         value="{{old('title')}}">
        <p class="text-danger"> {{$errors->first('title')}} <p> 
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Content</label>
        <input type="text" value="{{old('content')}}" class="form-control" id="exampleInputPassword1" name="content">
        <p class="text-danger"> {{$errors->first('content')}} <p> 
    </div>
    <select name="category_id">
        @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>  
        @endforeach
    </select>
    <input name="image" type="file">

    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

