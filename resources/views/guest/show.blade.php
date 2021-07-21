@extends('layouts.app')

@section('content')

<main>
    <h1>{{$article->title}}</h1>
    <p>{{$article->content}}</p>
</main>

@endsection
