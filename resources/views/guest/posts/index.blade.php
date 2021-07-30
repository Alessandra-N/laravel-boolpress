@extends('layouts.app')

@section('content')

<main>

    <div class="container">
        @foreach($articles as $article)

    <div class="article">
            <a href="{{route('articles.show', $article->id)}}">
                <h1>{{$article->title}}</h1>
            </a>
        </div>

        @endforeach
    </div>
    
</main>

@endsection