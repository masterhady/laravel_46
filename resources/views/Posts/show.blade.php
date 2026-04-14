@extends('navbar')


@section('pageTitle')
    Show Post
@endsection

@section('title')
    Single Post
@endsection

@section('body')
    <ul>
        {{-- @dd($key) --}}
        <li>Title: {{ $key["title"] }} </li>
        <li>Body: {{ $key["body"] }} </li>
    </ul>
@endsection