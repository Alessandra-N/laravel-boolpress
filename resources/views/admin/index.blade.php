@extends('layouts.admin')

@section('main_content')

<div class="container_index bg-white">
        <table style="width:100%">
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Tags</th>
                <th>Image</th>
                <th>Content</th>
                <th>Actions</th>
            </tr>
            @foreach($articles as $article)
            <tr>
                <td>{{$article->title}}</td>
                <td>
                    @foreach($categories as $category)
                        @if($category->id == $article->category_id)
                            {{$category->name}}
                        @endif
                    @endforeach
                
                
                </td>
                <td>
                    @foreach($article->tags as $tag)
                        {{$tag->name}}
                    @endforeach
                </td>
                <td><img src="{{asset('storage/' . $article->image)}}" width="100" alt=""></td>
                <!-- <td>{{$article->title}}</td> -->
                <td>{{$article->content}}</td>
            
                <td>
                    <a href="{{route('admin.articles.show', $article->id)}}">View</a> 
                    | <a href="{{route('admin.articles.edit', $article->id)}}">Edit</a>
                    <form action="{{route('admin.articles.destroy', $article->id)}}" method="post" onsubmit="return confirm('vuoi davvero cancellare questo articolo?')">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger btn-sm">Destroy</button>
                    </form>
                     
                </td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection