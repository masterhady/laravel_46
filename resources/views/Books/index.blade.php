{{-- @extends('home') --}}
@extends('navbar')

@section('title')
    Books
@endsection

@section('part1')
    <h1>Hello My Books</h1>
@endsection


@section('pageTitle')
        My Books
@endsection


@section('body')
    {{-- @dump($myposts) --}}
    <a class="btn btn-primary" href="/books/create"> Create Books </a> 
    <table class="table table-striped">
        <tr>
            <th>Title</th>
            <th>Content</th>
            <th>Show</th>
            <th>Edit</th>
        </tr>

            @foreach ($books as  $value )
            <tr> 
                {{-- @dd($value) --}}
                {{-- <td>{{$loop->iteration}}</td> --}}
                {{-- <td>{{ $value["title"] }}</td>  --}}
                <td>{{ $value->title }}</td> 
                <td>{{ $value->content }}</td> 
                <td><a href="/books/{{$value->id}}" class="btn btn-info"> Show </a></td>
                <td><a href="/books/edit/{{$value->id}}" class="btn btn-warning"> Edit </a></td>
            
            </tr>

            @endforeach
       


    </table>

@endsection