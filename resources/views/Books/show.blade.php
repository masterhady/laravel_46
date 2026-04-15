@extends('navbar')


@section('pageTitle')
    Show Book
@endsection

@section('title')
    Single Book
@endsection

@section('body')
    <ul>
        {{-- @dd($key) --}}
        <li>Title: {{ $book->title }} </li>
        <li>Content: {{ $book->content }} </li>
    </ul>
@endsection