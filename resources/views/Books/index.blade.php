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
            <th>Category</th>
            <th>Author</th>
            <th>Image</th>
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
                
                <td>
                <a href={{ route('categories.show', $value->category->id) }}> 
                    {{ $value->category->name }}
                </a>
                </td>
                <td>
                    {{$value->user->name}}
                </td>
                <td>
                    @if($value->image)
                        <img src="{{asset('storage/'.$value->image)}}" alt="" width="100">
                    @endif
                </td>

                <td><a href="/books/{{$value->id}}" class="btn btn-info"> Show </a></td>
                <td><a href="/books/edit/{{$value->id}}" class="btn btn-warning"> Edit </a></td>
                <td>
                 <form action="{{ route('books.destroy', $value->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this book?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                </td>
                {{-- <form action="">
                <td><a href="/books/delete/{{$value->id}}" class="btn btn-danger"> Delete </a></td>

                </form> --}}


            
            </tr>

            @endforeach
       


    </table>

@endsection