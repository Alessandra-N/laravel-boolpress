@foreach($articles as $article)

<a href="{{route('articles.show', $article->id)}}">
    <h1>{{$article->title}}</h1>
</a>

<p>{{$article->content}}</p>
@endforeach