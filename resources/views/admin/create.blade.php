@extends('layouts.admin')
@section('main_content')
<div class="container_form">
    <div class="form-group">

      <form action="{{route('adminarticles.store')}}" method="POST">
        {{ csrf_field() }}

        <label for=""></label>
        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="" aria-describedby="helpId" minlength="2" maxlength="255" required>
        <small id="helpId" class="text-muted">inserisci il titolo</small>

        <label for=""></label>
        <textarea name="content" id="content" class="form-control @error('title') is-invalid @enderror" placeholder="" aria-describedby="helpId" rows="5" minlength="2" maxlength="255" required></textarea>
        <small id="helpId" class="text-muted">inserisci il contenuto</small>
        
        <div class="submit">
          <button>Submit</button>
        </div>

      </form>

    </div>
  </div>
@endsection