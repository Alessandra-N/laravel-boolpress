@foreach($articles as $article)
<h1>{{$article->title}}</h1>
<p>{{$article->content}}</p>
@endforeach