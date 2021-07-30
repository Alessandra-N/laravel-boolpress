@extends('layouts.app')

@section('content')

  <div id="app">

    <h3>Articles in Vue</h3>

    <div class="card" v-for="article in articles">
      <img class="card-img-top" :src="'/storage/article_images/' + article.image" width="100" alt="article.title">
      <div class="card-body">
        <h4 class="card-title">@{{article.title}}</h4>
        <p class="card-text">@{{article.content}}</p>
      </div>
    </div>

  </div>

@endsection