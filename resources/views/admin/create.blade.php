@extends('layouts.admin')
@section('main_content')
<div class="container_form">
@if($errors->any)
@foreach($errors->all() as $error)
  {{$error}}
@endforeach
@endif
  <form action="{{route('admin.articles.store')}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="form-group">
      <label for=""></label>
      <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="" aria-describedby="helpId" minlength="2" maxlength="255" value="{{old('title')}}" required>
      <small id="helpId" class="text-muted">inserisci il titolo</small>
      @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    

    <div class="form-group">
      <label for="category_id">Categories</label>
      <select class="form-control @error('categories') is-invalid @enderror" name="category_id" id="category_id">
        <option selected>Select a category</option>
        @foreach($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
      </select>
      @error('category_id')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
        
    <div class="form-group">
      <label for="image">Cover Image</label>
      <input type="file" class="form-control-file @error('image') is-invalid @enderror" name="image" id="image" placeholder="Add a cover image" aria-describedby="imageHelper">
      <small id="imageHelper" class="form-text text-muted">Add a cover image</small>
      @error('image')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
        
        
        
    <div class="form-group">
      <label for="content"></label>
      <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" placeholder="" aria-describedby="helpId" rows="5" minlength="2" maxlength="255" required>{{old('content')}}</textarea>
      <small id="helpId" class="text-muted">inserisci il contenuto</small>
      @error('content')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>

    <div class="form-group">
      <label for="tags"></label>
      <select multiple class="form-control @error('tags') is-invalid @enderror" name="tags[]" id="tags">
        <option value="" disabled>Select Tags</option>
          @if($tags)
            @foreach($tags as $tag)
            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach
          @endif
      </select>
      @error('tags')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>

    <div class="submit">
      <button>Submit</button>
    </div>

  </form>
    
</div>
@endsection