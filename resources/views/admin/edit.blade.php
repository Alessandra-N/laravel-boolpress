@extends('layouts.admin')
@section('main_content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


  <div class="container_form">

    <form action="{{route('admin.articles.update', $article->id)}}" method="POST">
      {{ csrf_field() }}
       @method('PUT')
      <div class="form-group">
        <label for=""></label>
        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" aria-describedby="titleHelper" value="{{$article->title}}" minlength="2" maxlength="255" required>
        <small id="titleHelper" class="text-muted">inserisci il titolo minimo 1, massimo 255 caratteri</small>
      </div>
        
      <div class="form-group">
        <img src="{{asset('storage/' . $article->image)}}" width="100" alt="">
        <input type="file" class="form-control-file" name="image" id="image" placeholder="Add a cover image" aria-describedby="imageHelper">
        <small id="imageHelper" class="form-text text-muted">Change the cover image</small>
      </div>

      <div class="form-group">
        <label for=""></label>
        <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" aria-describedby="helpId" rows="5" minlength="2" required>{{$article->content}}</textarea>
        <small id="helpId" class="text-muted">inserisci il contenuto</small>
      </div>
        
      <div class="submit">
        <button>Submit</button>
      </div>

    </form>

    
  </div>

@endsection