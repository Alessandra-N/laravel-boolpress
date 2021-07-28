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

    <form action="{{route('admin.articles.update', $article->id)}}" method="POST" enctype="multipart/form-data">
      {{ csrf_field() }}
       @method('PUT')
      <div class="form-group">
        <label for=""></label>
        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" aria-describedby="titleHelper" value="{{$article->title}}" minlength="2" maxlength="255" required>
        <small id="titleHelper" class="text-muted">inserisci il titolo minimo 1, massimo 255 caratteri</small>
      </div>

      <div class="form-group">
        <label for="category_id">Categories</label>
        <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
          <option value="">Select a category</option>
          @foreach($categories as $category)
          <option value="{{ $category->id }}" {{ $category->id == old('category_id', $article->category_id) ? 'selected' : '' }} > {{ $category->name }} </option>
          @endforeach
        </select>
      </div>
      @error('category_id')
      <div class="alert alert-danger">{{message}}</div>
      @enderror
        
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

      <div class="form-group">
        <label for="tags"></label>
        <select multiple class="form-control @error('tags') is-invalid @enderror" name="tags[]" id="tags">
          <option value="" disabled>Select Tags</option>
          @if($tags)
            @foreach($tags as $tag)
              @if($errors->any())
                <option value="{{ $tag->id }}" {{ in_array($tag->id, old('tags')) ? 'selected' : '' }}> {{$tag->name}} </option>
              @else
                <option value="{{ $tag->id }}" {{$article->tags->contains($tag) ? 'selected' : ''}}> {{$tag->name}} </option>
              @endif
            @endforeach
          @endif
        </select>
      </div>
      @error('tags')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
        
      <div class="submit">
        <button>Submit</button>
      </div>

    </form>

    
  </div>

@endsection