@extends('layouts.app')

@section('content')
    <div class="p-5 bg-dark text-center">
        <img src="{{ Gravatar::src($user->email, 30) . '&d=mm' }}" alt="" class="img-circle" style="border-radius: 20px;"> 
        <h2 class="font-weight-normal text-light">{{ $user->name }}</h2>
        <p class="lead mt-3 text-light"><i class="fas fa-quote-left text-white-50 mr-3"></i>{{ $user->content }}<i class="fas fa-quote-right text-white-50 ml-3"></i></p>
    </div>
    <h1 class='text-center'>Your Item List</h1>
    
    <div class="container">
        @include('items.items')
        
    </div>
    <div class="container text-center">
    @if(Auth::user()->id == $user->id)
        <a href="{{ route('users.edit', Auth::user()->id) }}">Profile Setting</a>
    @endif
    </div>

@endsection
