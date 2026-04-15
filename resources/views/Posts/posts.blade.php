{{-- @extends('home') --}}
@extends('navbar')

@section('title')
    Posts
@endsection

@section('part1')
    <h1>Hello My Paosts</h1>
@endsection


@section('pageTitle')
        My Posts
@endsection


@section('body')
    {{-- @dump($myposts) --}}
    <a class="btn btn-primary" href="/posts/create"> Create Post </a> 
    <table class="table table-striped">
        <tr>
            <th>Title</th>
            <th>Content</th>
            <th>Actions</th>
        </tr>

            @foreach ($myposts as $key => $value )
            <tr> 
                <td>{{$loop->iteration}}</td>
                <td>{{ $value["title"] }}</td> 
                <td>{{ $value["body"] }}</td> 
                <td><a href="/posts/{{$loop->index}}" class="btn btn-info"> Show </a></td>
            </tr>

            @endforeach
       


    </table>

@endsection