@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{route('contacts.send')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">full_name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Mario Bross" aria-describedby="nameHelp">
            <small id="nameHelp" class="text-muted">Type your name above</small>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Mario Bross" aria-describedby="emailHelp">
            <small id="emailHelp" class="text-muted">Type your email above</small>
        </div>
        <div class="form-group">
            <label for="message">Message message</label>
            <textarea class="form-control" name="message" id="message" rows="5"></textarea>
        </div>

        <button type="submit" class="btn btn-primary"><i class="fas fa-envelope-open fa-lg fa-fw"></i> Send</button>
        @if(session('message'))
        <div class="alert alert-success" role="alert">
            <strong>{{session('message')}}</strong>
        </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        
    </form>
</div>
@endsection