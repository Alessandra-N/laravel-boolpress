@extends('layouts.app')



@section('content')
<main>
    <div class="row">
        <div class="col-2 categories">
            <h1>Categories</h1>
            <ul>
                @foreach($categories as $category)
                <li>
                    <i class="far fa-paper-plane"></i> 
                    {{$category->name}}
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    
</main>
    


@endsection