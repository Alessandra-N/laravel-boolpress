@extends('layouts.app')

@section('content')

<main>
    <div class="container">
        <div class="card">
            <img class="card-img-top" src="{{asset('storage/' . $article->image)}}" alt="{{$article->title}}">
            <div class="card-body">
                <h4 class="card-title">{{$article->title}}</h4>
                <h5>Category: {{ $article->category ? $article->category->name : 'Uncategorized' }}</h5>
                <p class="card-text">{{$article->content}}</p>
                
                <div class="tags">
                    Tags:
                    @forelse($article->tags as $tag)
                    <span>{{ $tag->name }}</span>
                    @empty
                    <span>no tags</span>
                    @endforelse
                </div>
                
            </div>
        </div>
    </div>
</main>

@endsection
